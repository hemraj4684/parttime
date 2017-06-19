<!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <h2>Verify Your Email Address</h2>

        <div>
            Welcome to CMS Portal<br/>
            Your Organization : <?php echo e($orgname); ?><br/>
            Your Organization Unique id : <?php echo e($uniquecode); ?><br/>
            Your account created with mail id: <?php echo e($email); ?><br/>
            Login with password: <?php echo e($pwd); ?><br/>
            Please follow the link below to verify your email address<br/>
            <?php echo e(URL::to('http://52.32.253.191/cmsadmin/register/verify/' . $code)); ?><br/>
            
            

        </div>

    </body>
</html>