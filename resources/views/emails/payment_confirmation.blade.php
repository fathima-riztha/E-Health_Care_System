<!DOCTYPE html>
<html>
<head>
    <title>Payment Confirmation</title>
</head>
<body>
    <h1>Payment Confirmation</h1>
    <p>Dear {{ $payment->patient_name }},</p>
    <p>Your payment of {{ $payment->amount }} was successful for the appointment with Dr. {{ $payment->doctor_name }} on {{ $payment->appointment_date }} at {{ $payment->appointment_time }}.</p>
    <a class="btn btn-secondary btn-lg btn-block" href="{{ url('user.paymentReceipt',$payment->appointment_id) }}">Print Payment Receipt</a>
    <p>Thank you for using our service.</p>
</body>
</html>
