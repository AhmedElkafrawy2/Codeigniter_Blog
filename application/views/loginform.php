<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="container">
	<section id="content">
                <?php if (validation_errors()) : ?>
                    <div class="col-md-12">
                            <div class="alert alert-danger" role="alert">
                                    <?= validation_errors() ?>
                            </div>
                    </div>
                <?php endif; ?>
            
                <?php if (isset($error)) : ?>
                    <div class="col-md-12">
                            <div class="alert alert-danger" role="alert">
                                    <?= $error ?>
                            </div>
                    </div>
                <?php endif; ?>
            <form action="<?php echo base_url() ?>/postlogin" method="POST">
			<h1>Login Form</h1>
			<div>
                            <input type="email" name="loginemail" value="<?=set_value('loginemail')?>" placeholder="Email" required="" id="login-email" />
			</div>
			<div>
                            <input type="password" name="loginpassword" placeholder="Password" required="" id="login-password" />
			</div>
			<div>
				<input type="submit" value="Log in" />
				<a href="#">Lost your password?</a>
				<a href="<?php echo base_url() . "register" ?>">Go To Register</a>
			</div>
		</form><!-- form -->
		
	</section><!-- content -->
</div><!-- container -->

