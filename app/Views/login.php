<div class="bg-white" style="margin-top:15px;">
    <div class="content content-boxed overflow-hidden">
        <?php if (session()->getFlashdata('msg')): ?>
            <div class='row'>
                <div class="alert alert-warning">
                    <?php echo session()->getFlashdata('msg'); ?>
                </div>
            </div>
        <?php endif; ?>
        <?php if (session()->getFlashdata('success')): ?>
            <div class='row'>
                <div class="alert alert-success">
                    <?php echo session()->getFlashdata('success'); ?>
                </div>
            </div>
        <?php endif; ?>
        <?php if (isset($regResult)) { ?>
        <?php } ?>
        <div class='row'>
            <div class='col-sm-4 col-sm-offset-4'>
                <div class="push-30-t push-20 animated fadeIn">
                    <div class="text-center">
                        <span class="h4 font-w600"><span class="text-primary">Y</span><span class="sidebar-mini-hide">GDB</span></span>
                        <p class="text-muted push-15-t"><?php echo lang('General.site_tagline'); ?></p>
                    </div>
                </div>
            </div>

            <div class="row">

                <div class="col-sm-6 col-lg-4 col-lg-offset-2">
                    <div class="push-30-t push-50 animated fadeIn">
                        <div class="text-center">
                            <span class="h4 font-w600"><?php echo lang('Security.login'); ?></span>
                        </div>
                        <form class="js-validation-login form-horizontal push-30-t" action="<?php echo base_url(); ?>/login/loginAuth" method="post">
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <div class="form-material form-material-primary floating">
                                        <input class="form-control" type="text" id="login-username" name="login-username">
                                        <label for="login-username"><?php echo lang('Security.user_name'); ?></label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <div class="form-material form-material-primary floating">
                                        <input class="form-control" type="password" id="login-password" name="login-password">
                                        <label for="login-password"><?php echo lang('Security.password'); ?></label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <!--<div class="col-xs-6">
                                    <label class="css-input switch switch-sm switch-primary">
                                        <input type="checkbox" id="login-remember-me" name="login-remember-me"><span></span> Remember Me?
                                    </label>
                                </div>
                                <div class="col-xs-6">
                                    <div class="font-s13 text-right push-5-t">
                                        <a href="base_pages_reminder_v2.html">Forgot Password?</a>
                                    </div>
                                </div> 
                            </div> -->
                                <div class="form-group push-30-t">
                                    <div class="col-xs-12 col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
                                        <button class="btn btn-sm btn-block btn-primary" type="submit"><?php echo lang('Security.login_button'); ?></button>
                                    </div>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-sm-6  col-lg-4">
                <div class="push-30-t push-20 animated fadeIn">
                    <!-- Register Title -->
                    <div class="text-center">
                        <h1 class="h3 push-10-t"><?php echo lang('Security.create_account'); ?></h1>
                    </div>

                    <form class="js-validation-register form-horizontal push-50-t push-50" action="<?php echo base_url(); ?>/register" method="post">
                        <div class="form-group">
                            <div class="col-xs-12">
                                <div class="form-material form-material-success">
                                    <input class="form-control" type="text" id="register-username" name="register-username" placeholder="<?php echo lang('Security.user_name_prompt'); ?>">
                                    <label for="register-username"><?php echo lang('Security.user_name'); ?></label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <div class="form-material form-material-success">
                                    <input class="form-control" type="email" id="register-email" name="register-email" placeholder="<?php echo lang('Security.email_prompt'); ?>">
                                    <label for="register-email"><?php echo lang('Security.email'); ?></label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <div class="form-material form-material-success">
                                    <input class="form-control" type="password" id="register-password" name="register-password" placeholder="<?php echo lang('Security.password_prompt'); ?>">
                                    <label for="register-password"><?php echo lang('Security.password'); ?></label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <div class="form-material form-material-success">
                                    <input class="form-control" type="password" id="register-password2" name="register-password2" placeholder="<?php echo lang('Security.confirm_password_prompt'); ?>">
                                    <label for="register-password2"><?php echo lang('Security.confirm_password'); ?></label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-7 col-sm-8">
                                <label class="css-input switch switch-sm switch-success">
                                    <input type="checkbox" id="register-terms" name="register-terms"><span></span> <?php echo lang('Security.terms_text'); ?>
                                </label>
                            </div>
                            <div class="col-xs-5 col-sm-4">
                                <div class="font-s13 text-right push-5-t">
                                   <!-- <a href="#" data-toggle="modal" data-target="#modal-terms"><?php echo lang('Security.view_terms'); ?></a>-->
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12 col-sm-6 col-sm-offset-3">
                                <button class="btn btn-sm btn-block btn-success" type="submit"><?php echo lang('Security.create_account'); ?></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="js/core/jquery.min.js"></script>
<script src="js/core/bootstrap.min.js"></script>
<script src="js/core/jquery.slimscroll.min.js"></script>
<script src="js/core/jquery.scrollLock.min.js"></script>
<script src="js/core/jquery.appear.min.js"></script>
<script src="js/core/jquery.countTo.min.js"></script>
<script src="js/core/jquery.placeholder.min.js"></script>
<script src="js/core/js.cookie.min.js"></script>
<script src="js/app.js"></script>
<script src="js/plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="js/pages/base_pages_register.js"></script>