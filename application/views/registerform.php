<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="container">
	<section id="content">
            <!-- display the form validation if there is error  -->
                <?php if (validation_errors()) : ?>
                    <div class="col-md-12">
                            <div class="alert alert-danger" role="alert">
                                    <?= validation_errors() ?>
                            </div>
                    </div>
                <?php endif; ?>

                <!--  display the error in create user into database -->
                <?php if (isset($error)) : ?>
                    <div class="col-md-12">
                            <div class="alert alert-danger" role="alert">
                                    <?= $error ?>
                            </div>
                    </div>
                <?php endif; ?>
                <form action="<?php echo base_url() ?>userregister" method="POST">
			<h1>Register Form</h1>
                                         
			<div>
                            <input type="text" name="username" placeholder="Username" required="" id="register-username" />
			</div>
			<div>
                            <input type="email" name="email" placeholder="Email" required="" id="register-email" />
			</div>
			<div>
                            <input type="password" name="password" placeholder="Password" required="" id="register-password" />
			</div>
			<div>
                            <input type="password" name="password_confirm" placeholder="Confirm Password" required="" id="register-confirm-password" />
			</div>
			<div>
                            <input type="submit" value="Sign Up" />

                            <a href="<?php echo base_url() . "login" ?>">Go To Login</a>
			</div>
		 </form><!-- form -->
	
	</section><!-- content -->
</div><!-- container -->
</body>
  
    <script  src="js/index.js"></script>

</body>
</html>
