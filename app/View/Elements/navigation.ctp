    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
            <?php
            echo $this->Html->link('Tuk Tuk Management System','/',array(
                'class' => 'navbar-brand'
            ));
            ?>

        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
              <li class="active">
              <?php
              if($this->Session->check('userid')){
                  if($this->Session->read('userid')=='admin'){
                      $link='/dashboard';
                  }
                  else
                      $link='/ownerDashboard';
              }
              else
                    $link='/users/login';
              echo $this->Html->link('My Profile',$link);
              ?>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>