<DOCTYPE html>
    <html lang="en-US">
    <head>
        <meta charset="utf-8">
    </head>
    <body>
    @if( $status == 'disapprove' )

        <h2>Dear, {{ $user->name }} <br></h2>
        <p>Sorry, Your Account has been Rejected</p><br>

    @else
        <h2>Dear, {{ $user->name }} <br></h2>
        <p>Congratulations, Your EVS has been approved. Here is your evs credentials: </p><br>


        <h3>Username: {{ $user->email }}</h3>
        <h3>Password: {{ $user->password_str }}</h3><br>

    @endif

    <p style='font-family: arial; mso-ansi-font-size: 18px;'><strong> Thanks &amp; Regards, </strong></p>
    <p style='font-family: arial; mso-ansi-font-size: 18px;'>
        Enablers Support Team: <a href="https://www.enablers.org/support" target="_blank">www.enablers.org/support</a><br>
        Helpline: 9:00 AM to 6:00 PM (Mon to Fri), 9:00 AM to 1:00 PM (Sat): +92 42 - 111 123 111
    </p>

    <p style='font-family: arial; mso-ansi-font-size: 18px;  line-height: 25px;color: #000;'>Join our <a href="https://www.enablers.org/group" target="_blank">eCommerce by Enablers Facebook Group</a> for further updates.</p>

    </body>
    </html>
</DOCTYPE>
