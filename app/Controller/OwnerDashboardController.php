<?php

class OwnerDashboardController extends AppController
{
    public function beforeFilter()
    {
        $this->layout = 'bootstrap';
        if($this->getOwnerId() == null){
            return $this->redirect('/users/login');
        }
    }

    public function index()
    {

        $ownerId = $this->getOwnerId();
        $this->set('incomeChartData', $this->getIncomeChartData($ownerId));
        $this->getIncomeData($ownerId);
        $this->set('sessions', $this->getSessionData($ownerId));
    }

    private function getOwnerId()
    {
        $id = $this->Session->read('userid');
        //$role = $this->Session->read('userrole');
        if ($id != null && $id != 'admin') {
            return $id;
        }
        return null;
    }

    public function listVehicles()
    {
        $id = $this->getOwnerId();
        if ($id == null) {

            return $this->redirect('/users/login');
        }


        $this->loadModel('Vehicle');
        $vehicles = $this->Vehicle->findAllByOwnerid($id);
        $this->set('vehicles', $vehicles);
        //$this->Session->setFlash('You are not logged inasdas');
    }

    public function add()
    {
        if ($this->request->is('post')) {
            $this->request->data['Vehicle']['ownerID'] = $this->getOwnerId();
            $this->loadModel('Vehicle');

            $this->Vehicle->create();
            if ($this->Vehicle->save($this->request->data)) {
                $this->Session->setFlash(__('The vehicle has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The vehicle could not be saved. Please, try again.'));
            }
        }
    }

    public function view($id = null)
    {
        $this->loadModel('Vehicle');
        $this->Vehicle->recursive=2;

        //get vehicle
        $options = array('conditions' => array('Vehicle.' . $this->Vehicle->primaryKey => $id, 'Vehicle.ownerID' => $this->getOwnerId()));
        $vehicle = $this->Vehicle->find('first', $options);

        //search for vehicle
        if ($vehicle == null) {
            $this->Session->setFlash(__('You are not authorized to view DAT vehicle.'));
            return $this->redirect(array('action' => 'listVehicles'));
        }
        //get owner list
        $this->loadModel('Owner');
        $owner = $this->Owner->findById($vehicle['Vehicle']['ownerID']);

        //add owner details to the vehicle array
        $vehicle['Vehicle']['ownerName'] = $owner['Owner']['name'];
        $vehicle['Vehicle']['ownerContact'] = $owner['Owner']['contact'];

        $this->set('vehicle', $vehicle);
    }

    public function edit($id = null)
    {
        $this->loadModel('Vehicle');
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Vehicle->save($this->request->data)) {
                $this->Session->setFlash(__('The vehicle has been saved.'));
                return $this->redirect(array('action' => 'listVehicles'));
            } else {
                $this->Session->setFlash(__('The vehicle could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Vehicle.' . $this->Vehicle->primaryKey => $id, 'Vehicle.ownerID' => $this->getOwnerId()));
            $vehicle = $this->request->data = $this->Vehicle->find('first', $options);
        }
        if ($vehicle == null) {
            $this->Session->setFlash(__('You are not authorized to edit DAT vehicle.'));
            return $this->redirect(array('action' => 'listVehicles'));
        }
    }

    public function delete($id = null)
    {
        $this->loadModel('Vehicle');
        //$this->loadModel('Owner');
        $options = array('conditions' => array('Vehicle.' . $this->Vehicle->primaryKey => $id, 'Vehicle.ownerID' => $this->getOwnerId()));
        $vehicle = $this->request->data = $this->Vehicle->find('first', $options);
        //$this->set('owners',$this->Owner->getOwnerList());
        if ($vehicle == null) {
            $this->Session->setFlash(__('You are not authorized to delete DAT vehicle.'));
            return $this->redirect(array('action' => 'listVehicles'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->$vehicle->delete()) {
            $this->Session->setFlash(__('The vehicle has been deleted.'));
        } else {
            $this->Session->setFlash(__('The vehicle could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'listVehicles'));
    }

    public function logout()
    {
        $this->Session->delete('userid');
        $this->Session->setFlash('You have been successfully logged out');
        $this->redirect('/');
    }

    /**
     * Returns processed chart data
     * @param $ownerId
     * @return array
     */
    private function getIncomeChartData($ownerId)
    {
        $this->loadModel('Trip');
        $this->loadModel('Vehicle');

        $results = $this->Trip->find('all', array(
            'fields' => array('DATE(Trip.time) AS date', 'SUM(Trip.fare) AS income'),
            'conditions' => array('Vehicle.ownerID' => $ownerId),
            'group' => array('DATE(Trip.time)')
        ));

        $drivers = $this->Vehicle->find('all', array(
            'fields' => array('Vehicle.driverName As name', 'Vehicle.id As id'),
            'conditions' => array('Vehicle.ownerID' => $ownerId),
            'order' => array('id ASC')
        ));

        $this->set('drivers', $drivers);

        foreach ($drivers as $driver) {
            $driverEarnings[] = $this->Trip->query(
                'SELECT trips.vehicleID, DATE(trips.time) AS date, SUM(trips.fare) AS income
                 FROM trips,vehicles
                 WHERE vehicles.ownerID = ' . $ownerId . ' AND vehicles.id = trips.vehicleID AND trips.vehicleID = ' . $driver['Vehicle']['id'] . '
                 GROUP BY date'
            );
        }
        return $this->processChartData($results, $drivers, $driverEarnings);
    }

    /**
     * Processes raw data from the database and convert to a JavaScript array
     * @param $results
     * @param $drivers
     * @param $driverEarnings
     * @return string
     */
    private function processChartData($results, $drivers, $driverEarnings)
    {

        $incomeChartData['cols'] = array(
            array('id' => 'date', 'label' => 'Date', 'type' => 'date'),
            array('id' => 'total_income', 'label' => 'Total Income', 'type' => 'number')
        );
        //creating a column for each driver
        foreach ($drivers AS $driver) {
            array_push($incomeChartData['cols'], array(
                    'id' => $driver['Vehicle']['id'],
                    'label' => $driver['Vehicle']['name'] . ' Income',
                    'type' => 'number')
            );
        }
        //creating a row for each result
        foreach ($results AS $result) {
            $time = strtotime($result[0]['date']);
            $dateJs = 'Date(' . date("Y", $time) . ', ' . (date('n', $time) - 1) . ', ' . date('j', $time) . ')';
            $row = array(
                'c' => array(
                    array('v' => $dateJs),
                    array('v' => $result[0]['income']),
                )
            );

            //adding default row values to drivers
            for ($i = 0; $i < count($drivers); ++$i) {
                array_push($row['c'], array('v' => 0));
            }

            $incomeChartData['rows'][] = $row;
        }

        //overriding default value from actual value
        foreach ($driverEarnings AS $income) {
            foreach ($income AS $driver_in) {
                $time = strtotime($driver_in[0]['date']);
                $dateJs = 'Date(' . date("Y", $time) . ', ' . (date('n', $time) - 1) . ', ' . date('j', $time) . ')';

                if ($income != null) {
                    for ($i = 0; $i < count($incomeChartData['cols']); ++$i) {
                        if ($incomeChartData['cols'][$i]['id'] == $driver_in['trips']['vehicleID'])
                            $colID = $i;
                    }

                    for ($i = 0; $i < count($incomeChartData['rows']); ++$i) {
                        if ($incomeChartData['rows'][$i]['c']['0']['v'] == $dateJs)
                            $incomeChartData['rows'][$i]['c'][$colID]['v'] = $driver_in['0']['income'];
                    }
                }
            }
        }
        return json_encode($incomeChartData);
    }

    /**
     * Returns daily income, daily income average and monthly income
     * and the income increase/decrease percentage
     * @param $ownerId
     */
    private function getIncomeData($ownerId)
    {
        $this->loadModel('Trip');
        $results = $this->Trip->find('all', array(
            'fields' => array('DATE(Trip.time) AS date', 'SUM(Trip.fare) AS income'),
            'conditions' => array('Vehicle.ownerID' => $ownerId),
            'group' => array('DATE(Trip.time)'),
            'order' => array('DATE(Trip.time) DESC')
        ));
        if ($results != null) {
            $incomeToday = $results[0][0]['income'];


            $totalIncome = 0;
            foreach ($results AS $result) {
                $totalIncome += (int)$result[0]['income'];
            }

            $averageIncome = $totalIncome / count($results);

            $incomePercentage = abs($incomeToday - $averageIncome) * 100 / $averageIncome;
        }
        else{
            $incomeToday = 0;
            $averageIncome = 0;
            $incomePercentage = 0;
        }
        $now = new DateTime();
        $currentMonth = $this->Trip->find('first', array(
            'fields' => array('SUM(Trip.fare) As income'),
            'conditions' => array('Month(Trip.time)' => (int)$now->format('m'), 'Vehicle.ownerID'=>$ownerId)
        ));

        $this->set('incomeToday', $incomeToday);
        $this->set('dailyAverage', $averageIncome);
        $this->set('incomeCurrentMonth', $currentMonth[0]['income']);
        $this->set('incomePercentage', $incomePercentage);

    }

    /**
     * Returns ession information of current day of the drivers belongs to the owner
     * @param $ownerId
     */
    private function getSessionData($ownerId)
    {
        $now = new DateTime();
        $this->loadModel('Tuksession');
        $sessions = $this->Tuksession->find('all', array(
            'fields' => array('Vehicle.driverName', 'Locality.name', 'TIME(Tuksession.startTime) As startTime', 'TIME(Tuksession.endTime) as endTime'),
            'conditions' => array('Vehicle.ownerID' => $ownerId, 'DATE(Tuksession.startTime)' => $now->format('Y-m-d')),
            'order' => array('Tuksession.startTime ASC')
        ));

        return $sessions;
    }
}

?>
