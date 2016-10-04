<div class="row">
    <div class="col s8 offset-s2 m8 offset-m2 l4 offset-l4">
        <div id="login-container">
            <div class="login-header teal lighten-2">
                <h5 class="white-text">Login to <?php echo $application_name; ?></h5>
            </div>
            <div class="z-depth-1 grey lighten-4">
                <?php echo $this->Flash->render(); ?>
                <div class="login-box">
                    <div class="row">
                        <?php
                            echo $this->Form->create('Staff', array('class' => 'col s12'));
                        ?>
                        <div class="row">
                        <?php
                            echo $this->Form->input('Staff.username', array(
                                'div' => 'input-field col s12'
                            ));
                        ?>
                        </div>
                        <div class="row">
                            <?php
                                echo $this->Form->input('Staff.password_hash', array(
                                    'type' => 'password',
                                    'label' => 'Password',
                                    'div' => 'input-field col s12'
                                ));
                            ?>
                        </div>
                        <div class="row">
                            <?php
                                echo $this->Form->submit('Sign in', array(
                                    'div' => 'input-field col s12',
                                    'class' => 'btn'
                                ));
                            ?>
                        </div>
                        <?php
                            echo $this->Form->end();
                        ?>
                    </div>
                </div>
            </div>
            <p class="blue-grey-text text-lighten-2 center-align">
                Swinburne Development Project 2
            </p>
        </div>
    </div>
</div>