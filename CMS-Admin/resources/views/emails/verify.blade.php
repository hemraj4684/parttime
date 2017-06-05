<!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <h2>Verify Your Email Address</h2>

        <div>
            Welcome to CMS Portal<br/>
            Your Organization : {{ $orgname }}<br/>
            Your Organization Unique id : {{ $uniquecode }}<br/>
            Your account created with mail id: {{ $email }}<br/>
            Login with password: {{ $pwd }}<br/>
            Please follow the link below to verify your email address<br/>
            {{ URL::to('http://52.32.253.191/cmsadmin/register/verify/' . $code) }}<br/>
            
            

        </div>

    </body>
</html>