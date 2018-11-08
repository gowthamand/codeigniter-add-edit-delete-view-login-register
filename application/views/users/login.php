<p>
    <?php echo $this->session->flashdata('verify_msg'); ?>
</p>
<style>
    p {
        margin: 0 0 0px;
    }
</style>
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Please Sign In</h3>
                </div>
                <div class="panel-body">
                    <?php $attributes = array("name" => "loginform", "role" => "form" );
                        echo form_open("users/login", $attributes);?>
                        <fieldset>
                            <div class="form-group <?php echo form_error('email') ? 'has-error' : '' ?>">
                                <label class="control-label" for="inputError"><?php echo form_error('email'); ?></label>
                                <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus>
                            </div>
                            <div class="form-group <?php echo form_error('password') ? 'has-error' : '' ?>">
                                <label class="control-label" for="inputError"><?php echo form_error('password'); ?></label>
                                <input class="form-control" placeholder="Password" name="password" type="password" value="">
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                </label>
                            </div>
                            <button class="btn btn-success btn-block">Login</button>
                            <div style="padding-top: 10px;">
                                <a href=""><label style="cursor: pointer;">Forgot Password</label></a> <a href="/users/register" class="pull-right"><label style="cursor: pointer;">Register</label></a>
                            </div>
                        </fieldset>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<p style="color:green; font-style:normal"><?php echo $this->session->flashdata('msg_success'); ?></p>
<p style="color:red; font-style:normal"><?php echo $this->session->flashdata('msg_error'); ?></p>
