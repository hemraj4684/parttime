<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="login-wrapper row">
        <div id="login" class="login loginpage col-lg-offset-4 col-md-offset-3 col-sm-offset-3 col-xs-offset-0 col-xs-12 col-sm-6 col-lg-4">
            <h1><a href="#" title="Login Page" tabindex="-1"><?php echo e(trans('login.heading')); ?></a></h1>
    
            <form name="loginform" id="loginform" action="<?php echo e(url('/login')); ?>" method="post">

                        <?php echo e(csrf_field()); ?>


                <p>
                    <label for="user_login">Username<br />

                        <input type="email" name="email" id="user_login" class="input" placeholder="yourid@company.com" size="20" value="<?php echo e(old('email')); ?>"/></label>
                                <?php if($errors->has('email')): ?>
                                    <span class="help-block" style="color:red;">
                                        <strong><?php echo e($errors->first('email')); ?></strong>
                                    </span>
                                <?php endif; ?>

                </p>
                <p>
                    <label for="user_pass">Password<br />
                        <input type="password" name="password" id="user_pass" class="input" size="20" /></label>
                                <?php if($errors->has('password')): ?>
                                    <span class="help-block" style="color:red;">
                                        <strong><?php echo e($errors->first('password')); ?></strong>
                                    </span>
                                <?php endif; ?>

                </p>
				<p>
                    <label for="user_pass">Select your Language<br />
					<select class="form-control input input-lg m-bot15" name="lang">
                <option>English</option>
                <option>Hindi</option>
                <option>Telugu</option>
            </select>
                </p>
				
				<div class="row">
				<div class="col-xs-6"> 
				 <p>
                    <label class="icheck-label form-label" for="rememberme"><input name="rememberme" type="checkbox" id="rememberme" value="forever" class="icheck-minimal-aero" checked> Remember me</label>
                </p>
				
				</div>
				
				<div class="col-xs-6"> 
				<p id="nav">
                <a class="pull-right" href="<?php echo e(url('/password/forgot')); ?>" title="Password Lost and Found">Forgot password?</a>
               
            </p>

				
				</div>
				
				</div>
				
               
				
				 


                <p class="submit">
                    <input type="submit" name="wp-submit" id="wp-submit" class="btn btn-accent btn-block" value="Sign In" />
                </p>
            </form>

           
			<div class="clearfix"></div>
			


        </div>
    </div>
	<div class=" text-center login loginpage col-lg-offset-4 col-md-offset-3 col-sm-offset-3 col-xs-offset-0 col-xs-12 col-sm-6 col-lg-4"  >
				 Copyright © 2016 CMS, Powerd By Aadhya Analytics. All rights reserved.
				 <br>
			</div>
</div>




<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.login', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>