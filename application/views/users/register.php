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

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-6 col-lg-8 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                                </div>
                                <?php $attributes = array("name" => "registrationform", "role" => "form"); ?>
                                <?php echo form_open("users/register", $attributes); ?>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label class="control-label text-danger" for="inputError"><?php echo form_error('firstname'); ?></label>
                                        <input class="form-control form-control-user" placeholder="First Name" name="firstname" type="text" value="<?php echo set_value('firstname'); ?>" autofocus>
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="control-label text-danger" for="inputError"><?php echo form_error('lastname'); ?></label>
                                        <input class="form-control form-control-user" placeholder="Last Name" name="lastname" type="text" value="<?php echo set_value('lastname'); ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label text-danger" for="inputError"><?php echo form_error('email'); ?></label>
                                    <input class="form-control form-control-user" placeholder="E-mail" name="email" type="email" value="<?php echo set_value('email'); ?>">
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label class="control-label text-danger" for="inputError"><?php echo form_error('password'); ?></label>
                                        <input class="form-control form-control-user" placeholder="Password" name="password" type="password" value="">
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="control-label text-danger" for="inputError"><?php echo form_error('cpassword'); ?></label>
                                        <input class="form-control form-control-user" placeholder="Confirm Password" name="cpassword" type="password" value="">
                                    </div>
                                </div>
                                <button class="btn btn-primary btn-user btn-block">
                                    Register Account
                                </button>
                                <?php echo form_close(); ?>
                                <hr>
                                <div class="text-center">
                                    <a class="small" href="#">Forgot Password?</a>
                                </div>
                                <div class="text-center">
                                    <a class="small" href="<?php echo site_url('users/login'); ?>">Already have an account? Login!</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>
