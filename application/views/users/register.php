<style>
    p {
        margin: 0 0 0px;
    }
</style>
<p><?php echo $this->session->flashdata('verify_msg'); ?></p>
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Register</h3>
                </div>
                <div class="panel-body">
                    <?php $attributes = array("name" => "registrationform", "role" => "form" );
                    echo form_open("users/register", $attributes);?>
                    <fieldset>

                        <div class="form-group <?php echo form_error('firstname') ? 'has-error' : '' ?>">
                            <label class="control-label" for="inputError"><?php echo form_error('firstname'); ?></label>
                            <input class="form-control" placeholder="Enter First Name" name="firstname" type="text" value="<?php echo set_value('firstname'); ?>" autofocus>
                        </div>

                        <div class="form-group <?php echo form_error('lastname') ? 'has-error' : '' ?>">
                            <label class="control-label" for="inputError"><?php echo form_error('lastname'); ?></label>
                            <input class="form-control" placeholder="Enter Last Name" name="lastname" type="text" value="<?php echo set_value('lastname'); ?>">
                        </div>

                        <div class="form-group <?php echo form_error('email') ? 'has-error' : '' ?>">
                            <label class="control-label" for="inputError"><?php echo form_error('email'); ?></label>
                            <input class="form-control" placeholder="E-mail" name="email" type="email" value="<?php echo set_value('email'); ?>">
                        </div>

                        <div class="form-group <?php echo form_error('password') ? 'has-error' : '' ?>">
                            <label class="control-label" for="inputError"><?php echo form_error('password'); ?></label>
                            <input class="form-control" placeholder="Password" name="password" type="password" value="">
                        </div>

                        <div class="form-group <?php echo form_error('cpassword') ? 'has-error' : '' ?>">
                            <label class="control-label" for="inputError"><?php echo form_error('cpassword'); ?></label>
                            <input class="form-control" placeholder="Confirm Password" name="password" type="password" value="">
                        </div>

                        <button class="btn btn-success btn-block">Register</button>
                        <div style="padding-top: 10px;">
                            <a href=""><label style="cursor: pointer;">Forgot Password</label></a> <a href="/users/login" class="pull-right"><label style="cursor: pointer;">Login</label></a>
                        </div>
                    </fieldset>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</div>

<p class="text-success"><?php echo $this->session->flashdata('msg_success'); ?></p>
<p class="text-success"><?php echo $this->session->flashdata('msg_error'); ?></p>
