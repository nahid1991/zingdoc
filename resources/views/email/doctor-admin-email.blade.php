<!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <h2>You were registered in Zingdoc</h2>

        <div>
            You were registered by {{$name}} as a doctor in Zingdoc. Your registered email is
             {{$email}} and your password was set as {{$password}}. Please goto this link:
            {{ URL::to('/sign_it') }} to sign in with your information.
            Thank you.<br/>

        </div>
    </body>
</html>