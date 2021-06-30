<!DOCTYPE html>
<html>
<head>
    <title>Enablers Enrollment Challan</title>
</head>
<body>
    <table class='table-bordered' border='3' cellpadding='5' cellspacing='5' style='width:100%;border-collapse: collapse;border: 2px solid #000;font-weight: bold;'>
        <thead>
        <tr style='border: 1px solid #000;'>
            <th>Copy : Enablers <span>Sr No.{{ $serialNumber }}</span></th>
            <th>Copy : Bank <span>Sr No.{{ $serialNumber }}</span></th>
            <th>Copy : Student <span>Sr No.{{ $serialNumber }}</span></th>
        </tr>
        </thead>

        <tbody style="width: 100%;">

        <tr style='border: 1px solid #000;'>
            <td>
                <span style="vertical-align: middle;"><img src="{{ env('APP_ASSETS') === 'local' ? '' : url('').'/public/' }}assets-app/img/enablers-challan-logo.jpg" style='margin-top:10px;max-width: 90px;'> {{ $paymentAccount->account_title }}</span>
            </td>
            <td>
                <span style="vertical-align: middle;"><img src="{{ env('APP_ASSETS') === 'local' ? '' : url('').'/public/' }}assets-app/img/enablers-challan-logo.jpg" style='margin-top:10px;max-width: 90px;'> {{ $paymentAccount->account_title }}</span>
            </td>
            <td>
                <span style="vertical-align: middle;"><img src="{{ env('APP_ASSETS') === 'local' ? '' : url('').'/public/' }}assets-app/img/enablers-challan-logo.jpg" style='margin-top:10px;max-width: 90px;'> {{ $paymentAccount->account_title }}</span>
            </td>
        </tr>

        <tr style='border: 1px solid #000;'>
            <td style='line-height: 20px;'>
                <p style='margin: 0; font-size: 15px;'><span>{{ $paymentAccount->bank_name }} Limited (Nation Wide)</span></p>
                <p style='margin: 0; font-size: 15px;'><span>Account No: {{ $paymentAccount->account_number }} </span></p>
            </td>

            <td style='line-height: 20px;'>
                <p style='margin: 0; font-size: 15px;'><span>{{ $paymentAccount->bank_name }} Limited (Nation Wide)</span></p>
                <p style='margin: 0; font-size: 15px;'><span>Account No: {{ $paymentAccount->account_number }}</span></p>
            </td>

            <td style='line-height: 20px;'>
                <p style='margin: 0; font-size: 15px;'><span>{{ $paymentAccount->bank_name }} Limited (Nation Wide)</span></p>
                <p style='margin: 0; font-size: 15px;'><span>Account No: {{ $paymentAccount->account_number }}</span></p>
            </td>

        </tr>

        <tr style='border: 1px solid #000;'>
            <td style='font-size: 13px;line-height: 25px;'>
                <p style='margin: 0;'> Student Name: {{ $student->name }}</p>
                <p style='margin: 0;'> Father Name: {{ $student->father_name }}</p>
                <p style='margin: 0;'> Registration Number: {{ $enrollment->unique_code }}</p>
                <p style='margin: 0;'> CNIC: {{ $student->cnic }}  </p>
                <p style='margin: 0;'> Training City:  </p>
                <p style='margin: 0; overflow-wrap: break-word; word-wrap:break-word;'> Training/Program: {{ $training->title }}</p>
                <p style='margin: 0;'> Batch / Session:  </p>
            </td>

            <td style='font-size: 13px;line-height: 25px;'>
                <p style='margin: 0;'> Student Name: {{ $student->name }}</p>
                <p style='margin: 0;'> Father Name: {{ $student->father_name }}</p>
                <p style='margin: 0;'> Registration Number: {{ $enrollment->unique_code }}</p>
                <p style='margin: 0;'> CNIC: {{ $student->cnic }}</p>
                <p style='margin: 0;'> Training City:  </p>
                <p style='margin: 0; overflow-wrap: break-word; word-wrap:break-word;'> Training/Program: {{ $training->title }}</p>
                <p style='margin: 0;'> Batch / Session:  </p>
            </td>

            <td style='font-size: 13px;line-height: 25px;'>
                <p style='margin: 0;'> Student Name: {{ $student->name }}</p>
                <p style='margin: 0;'> Father Name: {{ $student->father_name }}</p>
                <p style='margin: 0;'> Registration Number: {{ $enrollment->unique_code }}</p>
                <p style='margin: 0;'> CNIC: {{ $student->cnic }}</p>
                <p style='margin: 0;'> Training City:  </p>
                <p style='margin: 0; overflow-wrap: break-word; word-wrap:break-word;'> Training/Program: {{ $training->title }}</p>
                <p style='margin: 0;'> Batch / Session:  </p>
            </td>
        </tr>

        <tr>
            <td style='padding: 0;'>
                <table class='table-bordered' border='3' cellpadding='5' cellspacing='5' style='width:100%;border-collapse: collapse;font-weight: bold;font-size: 13px;border: none;'>
                    <thead>
                        <tr>
                            <th colspan='1' style='text-align:center;'>Sr No.</th>
                            <th colspan='4' style='text-align:center;'>Particulars</th>
                            <th colspan='1' style='text-align:center;'>Amount (Rs.)</th>
                        </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td colspan='1' style='text-align:center;'>1</td>
                        <td colspan='4' style='text-align:center;'>Coaching Charges</td>
                        <td colspan='1' style='text-align:center;'>{{ number_format($enrollment->payable_price,2) }}</td>
                    </tr >
                    <tr>
                        <td colspan='1' style='text-align:center;'>2</td>
                        <td colspan='4' style='text-align:center;'></td>
                        <td colspan='1' style='text-align:center;'></td>
                    </tr>
                    <tr>
                        <td colspan='1' style='text-align:center;'>3</td>
                        <td colspan='4' style='text-align:center;'></td>
                        <td colspan='1' style='text-align:center;'></td>
                    </tr>
                    <tr>
                        <td colspan='1' style='text-align:center;'>4</td>
                        <td colspan='4' style='text-align:center;'>GRAND TOTAL</td>
                        <td colspan='1' style='text-align:center;'>{{ number_format($enrollment->payable_price,2) }}</td>
                    </tr>
                    <tr style='line-height: 25px;'>
                        <td colspan='6'>Amount in Words: <span style="text-transform: uppercase;">{{ $trainingFeeInWords }}</span> ONLY.</td>
                    </tr>
                    <tr style='line-height: 25px;'>
                        <td colspan='6'>Fee Submission Due Date: @if($training->ending_at){{ date('d-M-Y', strtotime('-2 day', strtotime($training->ending_at))) }}@endif</td>
                    </tr>
                    </tbody>
                </table>
            </td>

            <td style='padding: 0;'>
                <table class='table-bordered' border='3' cellpadding='5' cellspacing='5' style='width:100%;border-collapse: collapse;font-weight: bold;font-size: 13px;border: none;'>
                    <thead>
                        <tr>
                            <th colspan='1' style='text-align:center;'>Sr No.</th>
                            <th colspan='4' style='text-align:center;'>Particulars</th>
                            <th colspan='1' style='text-align:center;'>Amount (Rs.)</th>
                        </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td colspan='1' style='text-align: center;'>1</td>
                        <td colspan='4' style='text-align: center;'>Coaching Charges</td>
                        <td colspan='1' style='text-align: center;'>{{ number_format($enrollment->payable_price,2) }}</td>
                    </tr>
                    <tr>
                        <td colspan='1' style='text-align: center;'>2</td>
                        <td colspan='4' style='text-align: center;'></td>
                        <td colspan='1' style='text-align: center;'></td>
                    </tr>
                    <tr>
                        <td colspan='1' style='text-align: center;'>3</td>
                        <td colspan='4' style='text-align: center;'></td>
                        <td colspan='1' style='text-align: center;'></td>
                    </tr>
                    <tr>
                        <td colspan='1' style='text-align: center;'>4</td>
                        <td colspan='4' style='text-align: center;'>GRAND TOTAL</td>
                        <td colspan='1' style='text-align: center;'>{{ number_format($enrollment->payable_price,2) }}</td>
                    </tr>
                    <tr style='line-height: 25px;'>
                        <td colspan='6'>Amount in Words: <span style="text-transform: uppercase;">{{ $trainingFeeInWords }}</span> ONLY.</td>
                    </tr>
                    <tr style='line-height: 25px;'>
                        <td colspan='6'>Fee Submission Due Date: @if($training->ending_at){{ date('d-M-Y', strtotime('-2 day', strtotime($training->ending_at))) }}@endif</td>
                    </tr>
                    </tbody>
                </table>
            </td>

            <td style='padding: 0;'>
                <table class='table-bordered' border='3' cellpadding='5' cellspacing='5' style='width:100%;border-collapse: collapse;font-weight: bold;font-size: 13px;border: none;'>
                    <thead>
                        <tr>
                            <th colspan='1' style='text-align:center;'>Sr No.</th>
                            <th colspan='4' style='text-align:center;'>Particulars</th>
                            <th colspan='1' style='text-align:center;'>Amount (Rs.)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan='1' style='text-align:center;'>1</td>
                            <td colspan='4' style='text-align:center;'>Coaching Charges</td>
                            <td colspan='1' style='text-align:center;'>{{ number_format($enrollment->payable_price,2) }}</td>
                        </tr>
                        <tr>
                            <td colspan='1' style='text-align:center;'>2</td>
                            <td colspan='4' style='text-align:center;'></td>
                            <td colspan='1' style='text-align:center;'></td>
                        </tr>
                        <tr>
                            <td colspan='1' style='text-align:center;'>3</td>
                            <td colspan='4' style='text-align:center;'></td>
                            <td colspan='1' style='text-align:center;'></td>
                        </tr>
                        <tr>
                            <td colspan='1' style='text-align:center;'>4</td>
                            <td colspan='4' style='text-align:center;'>GRAND TOTAL</td>
                            <td colspan='1' style='text-align:center;'>{{ number_format($enrollment->payable_price,2) }}</td>
                        </tr>
                        <tr style='line-height: 25px;'>
                            <td colspan='6'>Amount in Words: <span style="text-transform: uppercase;">{{ $trainingFeeInWords }}</span> ONLY.</td>
                        </tr>
                        <tr style=' line-height: 25px;'>
                            <td colspan='6'>Fee Submission Due Date: @if($training->ending_at){{ date('d-M-Y', strtotime('-2 day', strtotime($training->ending_at))) }}@endif</td>
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>

        </tbody>
    </table>
</body>
</html>
