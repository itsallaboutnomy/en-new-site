<html>
<head></head>
<body>
<div style='background: #f3f3f3; padding-top: 25px; padding-bottom: 25px; margin: 0 auto;'>
    <table style='margin: 0 auto; border: 1px solid #000; padding: 15px; background: #fff;'>
        <tbody>
        <tr>
            <td style='background: #f15b2f; color: #fff; width: 600px;'>
                <h2 style='text-align: center; font-family: arial; padding: 2px;'>Deposit Payment to Complete your Submission </h2>
            </td>
        </tr>
        <tr>
            <td>
                <h2 style='font-family: arial; mso-ansi-font-size: 20px;'><strong> Dear {{ $user }}, </strong></h2>
                <p style='font-family: arial; mso-ansi-font-size: 18px; line-height: 25px;color: #000;'>
                    Thank you for signing up on Enablers Training Program <strong>{{ $enrollFor }}</strong>.<br><br>

                    Please note your unique registration number is <strong>{{ $uniqueCode }}</strong>.<br><br>

                    Your total enrolment fee: <strong>Rs. {{ number_format($enrollFee,2) }}</strong><br><br>

                    Follow the following steps for successful registration: </p>

                <!-- When payment type is online -->
                @if(!$challanPath)
                <ol style="font-family: arial; mso-ansi-font-size: 18px; color: #000;">
                    <li>Pay the mentioned fee to the below mentioned Bank Account.</li>
                    <li>Upload the Payment Proof to the link: www.enablers.org/proof (Important)</li>
                    <li>After submitting Payment proof, you will get the confirmation email within 24 hours.</li>
                </ol>

                    @if($account->bank_name == 'PayPal')
                    <h3 style='font-family: arial; mso-ansi-font-size: 13px;'><strong>Bank Account Details </strong> </h3>
                    <p style='font-family: arial; mso-ansi-font-size: 18px;'>
                        Account At: &emsp;&emsp;&emsp;<span style="font-weight: bold;">{{ $account->bank_name }}</span><br>
                        Account ID:&emsp;&ensp;<span style="font-weight: bold;">{{ $account->account_title }}</span><br>
                    </p>
                    @else
                    <h3 style='font-family: arial; mso-ansi-font-size: 13px;'><strong>Bank Account Details </strong> </h3>
                    <p style='font-family: arial; mso-ansi-font-size: 18px;'>
                        Bank Name: <span style="font-weight: bold;">{{ $account->bank_name }}</span><br>
                        Acc Title: <span style="font-weight: bold;">{{ $account->account_title }}</span><br>
                        Acc Number:<span style="font-weight: bold;">{{ $account->account_number }}</span><br>
                        IBAN: <span style="font-weight: bold;">{{ $account->iban }}</span><br>
                    </p>
                    @endif
                @else
                <!-- When payment type is cash -->

                    <ol style="font-family: arial; mso-ansi-font-size: 18px; color: #000;">
                        <li>Your Challan Form is attached with this email. Kindly download this Challan and deposit it at your nearest Faysal Bank Branch within the due date mentioned.</li>
                        <li>Upload the Payment Proof to the link: <a href="{{ route('app.enrollment.verify') }}" target="_blank">payment-proof</a> (Important)</li>
                        <li>After submitting Payment proof, you will get the confirmation email within 24 hours.</li>
                    </ol>

                    <p style='font-family: arial; mso-ansi-font-size: 18px;  line-height: 25px;color: #000;'><strong><a href="{{ $challanPath }}" target="_blank" download> Download Your Challan from here</a></strong></p>
                @endif

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
