<html>
<head></head>
<body>
<div style='background: #f3f3f3; padding-top: 25px; padding-bottom: 25px; margin: 0 auto;'>
    <table style='margin: 0 auto; border: 1px solid #000; padding: 15px; background: #fff;'>
        <tbody>
        <tr>
            <td style='background: #f15b2f; color: #fff; width: 600px;'>
                <h2 style='text-align: center; font-family: arial; padding: 2px;'>Deposit Payment to Confirm your Seat</h2>
            </td>
        </tr>
        <tr>
            <td>
                <h2 style='font-family: arial; mso-ansi-font-size: 20px;'><strong> Dear {{ $user->name }}, </strong></h2>
                <p style='font-family: arial; mso-ansi-font-size: 18px; line-height: 25px;color: #000;'>Thank you for signing up on the upcoming Enablers Seminar <strong>{{ $enrollFor }}</strong>. Your seat is on hold for the next 24 hours until we confirm your payment has been received. In the meantime.<br><br>

                    Please note Your unique registration number is: <strong>{{ $uniqueCode }}</strong> and follow the following steps for successful registration: </p>

                <ol style="font-family: arial; mso-ansi-font-size: 18px; color: #000;">
                    <li>Pay the mentioned fee to the below mentioned Bank Account.</li>
                    <li>Upload the Payment Proof to the link: www.enablers.org/proof (Important)</li>
                    <li>After submitting Payment proof, you will get the confirmation email within 24 hours.</li>
                </ol>

                <p><strong>Training Seminar Fee: No of Seats : {{ $seats }} x 1000 Per Person = PKR {{ number_format($seats*1000) }}</strong></p>

                <h2 style='font-family: arial; mso-ansi-font-size: 20px;'><strong>Bank Account Details </strong> </h2>
                <p style='font-family: arial; mso-ansi-font-size: 18px;'>
                    Bank Name: <span style="font-weight: bold;">{{ $account1->bank_name }}</span><br>
                    Acc Title: <span style="font-weight: bold;">{{ $account1->account_title }}</span><br>
                    Acc Number:<span style="font-weight: bold;">{{ $account1->account_number }}</span><br>
                    IBAN : <span style="font-weight: bold;">{{ $account1->iban }}</span><br><br><br>
                </p>

                <p style="font-family: arial; mso-ansi-font-size: 18px;"><strong> Your Details in our record :</strong></p>
                <table style="border: 1px solid #999999; padding: 5px; width: 600px;">
                    <tbody>
                    <tr>
                        <td>
                            <p style="font-family: arial; mso-ansi-font-size: 18px;"><strong>Name: {{ $user->name }}</strong></p>
                            <p style="font-family: arial; mso-ansi-font-size: 18px;"><strong>Email: {{ $user->email }}</strong></p>
                            <p style="font-family: arial; mso-ansi-font-size: 18px;"><strong>No of Seats : {{ $seats }} </strong></p>
                            <p style="font-family: arial; mso-ansi-font-size: 18px;"><strong>Seminar: {{ $enrollFor }} </strong></p>
                        </td>
                    </tr>
                    </tbody>
                </table>

                <p style='font-family: arial; mso-ansi-font-size: 18px;  line-height: 25px;color: #000;'>
                    We look forward to receiving your confirmation.
                    If you have any questions, then please give us a call on <strong> 042-111-123-111</strong><br>
                    Or for chat support, reach out to our Official Enablers Facebook Page here
                    <strong><a href="https://www.facebook.com/EnablersTeam">https://www.facebook.com/EnablersTeam</a></strong>
                </p><br>

                <p style='font-family: arial; mso-ansi-font-size: 18px;'><strong> Thanks &amp; Regards, </strong></p>
                <p style='font-family: arial; mso-ansi-font-size: 18px;'>
                    Enablers Support Team: <a href="https://www.enablers.org/support" target="_blank">www.enablers.org/support</a><br>
                    Helpline: 9:00 AM to 6:00 PM (Mon to Fri), 9:00 AM to 1:00 PM (Sat): +92 42 - 111 123 111
                </p>

                <p style='font-family: arial; mso-ansi-font-size: 18px;  line-height: 25px;color: #000;'>Join our <a href="https://www.enablers.org/group" target="_blank">eCommerce by Enablers Facebook Group</a> for further updates.</p>
            </td>
        </tr>
        </tbody>
    </table>
</div>
</body>
</html>
