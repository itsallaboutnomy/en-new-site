<html>
<head></head>
<body>
    <div style='padding-top: 25px; padding-bottom: 25px; margin: 0 auto;'>
        <h2 >Greetings from Enablers!</h2>

        <h2 style='font-family: arial; mso-ansi-font-size: 20px;'><strong> Dear {{ $consent->name }}, </strong></h2>
        <p style='font-family: arial; mso-ansi-font-size: 18px; line-height: 25px;color: #000;'>At Enablers, we believe in handling all concerns and protecting your confidentiality. For this reason, you were asked to sign the student consent to confirm your enrollment and to comply with the general training rules and understanding for
           @if($type === 'Student Consent')
                <strong style="font-weight: bold;">{{$consent->training->title}}</strong>
            @else
            <strong style="font-weight: bold;">{{$type}}</strong>
            @endif
        </p>
        <p>By duly signing this consent form, you have confirmed that you have read and accepted the terms. Enablers is fulfilling its duties to provide trainings in accordance with the contents of the policies and admittance thereto.</p>

        <p>Please find the link signed copy of your consent for reference.
            <strong><a href="{{ _asset($consent->consent_pdf_path) }}" target="_blank" download> Download Your {{$type}} from here</a></strong>
        </p>

        <p>If you have any questions regarding the Services, the terms, or wish to report any issue relating to the service trainings provided, please feel free to contact us by call at +9242 - 111 123 111.</p>

        <p style='font-family: arial; mso-ansi-font-size: 18px;'><strong> Thanks &amp; Regards, </strong></p>
        <p style='font-family: arial; mso-ansi-font-size: 18px;'>Enablers Support Team: +9242 - 111 123 111</p>
        <p style='font-family: arial; mso-ansi-font-size: 18px;'><a href="https://www.enablers.org/" target="_blank">www.enablers.org</a></p>
        <p style='font-family: arial; mso-ansi-font-size: 18px;'>Follow us on: <strong> <a href="https://www.facebook.com/EnablersTeam/" target="_blank">https://www.facebook.com/EnablersTeam/</a></strong></p>
    </div>
</body>
</html>
