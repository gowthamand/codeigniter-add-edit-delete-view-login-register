<div class="container">

    <?php if($this->session->flashdata('msg_success')) { ?>
        <div class="alert alert-success">
            <?php echo $this->session->flashdata('msg_success'); ?>
        </div>
    <?php } ?>
    <?php if($this->session->flashdata('msg_error')) { ?>
        <div class="alert alert-danger">
            <?php echo $this->session->flashdata('msg_error'); ?>
        </div>
    <?php } ?>
    <?php if($this->session->flashdata('verify_msg')) { ?>
        <div class="alert alert-info">
            <?php echo $this->session->flashdata('verify_msg'); ?>
        </div>
    <?php } ?>

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-6 col-lg-8 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Please Sign In</h1>
                                </div>
                                <?php $attributes = array("name" => "loginform", "role" => "form"); ?>
                                <?php echo form_open("users/login", $attributes); ?>
                                <div class="form-group <?php echo form_error('email') ? 'has-error' : '' ?>">
                                    <label class="control-label text-danger" for="inputError"><?php echo form_error('email'); ?></label>
                                    <input class="form-control form-control-user" placeholder="E-mail" name="email" type="email" autofocus>
                                </div>
                                <div class="form-group <?php echo form_error('password') ? 'has-error' : '' ?>">
                                    <label class="control-label text-danger" for="inputError"><?php echo form_error('password'); ?></label>
                                    <input class="form-control form-control-user" placeholder="Password" name="password" type="password" value="">
                                </div>
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox small">
                                        <input type="checkbox" class="custom-control-input" id="customCheck" name="remember" value="Remember Me">
                                        <label class="custom-control-label" for="customCheck">Remember Me</label>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Login
                                </button>
                                <?php echo form_close(); ?>
                                <hr>
                                <div class="text-center">
                                    <a class="small" href="#">Forgot Password?</a>
                                </div>
                                <div class="text-center">
                                    <a class="small" href="<?php echo site_url('users/register'); ?>">Create an Account!</a>
                                </div>
                                <div class="mt-4 text-center text-muted small">
                                    <p>Email: gowthaman.nkl1@gmail.com</p>
                                    <p>Password: Welcome@123</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>
