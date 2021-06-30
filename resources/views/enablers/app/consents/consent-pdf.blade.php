<html>
<head>
    <title>Student Consent {{ \App\Models\Consent::$type[$slug] }}</title>
</head>
<body>
<div id="page_1">

    <div style="float: right;">Date: {{ date('d, F Y g:i A') }}</div>

    <div style="margin-top: 30px;margin-bottom: 40px; vertical-align: center;text-align: center;">
        <img style='margin-top:10px;' src="{{ env('APP_ASSETS') === 'local' ? '' : url('').'/public/' }}assets-app/img/Enablers-footer-logo.jpg">
    </div>

    <h3>Consent for {{ \App\Models\Consent::$type[$slug] }} </h3>
    <p class="p1 ft2"><span class="ft1">{{ $consent->name }}</span><span class="ft1"> </span>agreed to the following terms and conditions</p>
    @foreach ($terms as $term)
    <p class="p2 ft4"><span class="ft2">{{ $loop->iteration  }}.</span><span class="ft3"> {{$term}}</span></p>
    @endforeach
    <h3>Signature Attachment</h3>

    <div style="margin-top: 20px;">
        <img src="{{ (env('APP_ASSETS') === 'local' ? '' : url('').'/public/').$consent->signature_image_path }}" alt="Signature attachment" width="150">
    </div>
</div>
</body>
</html>
