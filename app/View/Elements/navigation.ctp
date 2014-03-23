<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <div class="navbar-brand">
                <?php
                echo $this->Html->image('cake.icon.png', array('alt' => 'T2MS'));
                ?>

            </div>
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <?php
            echo $this->Html->link('Tuk Tuk Management System', '/', array(
                'class' => 'navbar-brand'
            ));
            ?>

        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active">
                    <?php
                    if ($this->Session->check('userid')) {
                        if ($this->Session->read('userid') == 'admin') {
                            $link = '/dashboard';
                        } else
                            $link = '/ownerDashboard';
                        echo $this->Html->link('My Profile', $link);
                    }
                    ?>
                </li>
            </ul>
            <ul class="nav navbar-nav pull-right">
                <li>
                <?php
                if ($this->Session->check('userid')) {
                    echo $this->Html->link('Log out', '/users/logout');
                } else
                    echo $this->Html->link('Log in', '/users/login');

                ?>
            </li>
            </ul>


        </div>
        <!--/.nav-collapse -->
    </div>
</div>