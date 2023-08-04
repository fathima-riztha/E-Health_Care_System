<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Habeeba Medical Center</title>
	<link rel="stylesheet" type="text/css" href="Admin/assets/css/bootstrap.min.css">
	<style>
		.logo {
			display: inline-block;
			margin-right: 10px;
		}

		.heading {
			display: inline-block;
		}

		
		.table-bordered {
			border: 1px solid #dee2e6;
		}

		.table-bordered th,
		.table-bordered td {
			border: 1px solid #dee2e6;
			padding: 8px;
		}

	</style>
</head>

<body>
	<div class="container">
		<div class="row center">
			<div class="col">
				
				<h1 class="heading">Habeeba Medical Center</h1>
				
				<h2>Payment Receipt</h2>
			</div>
		</div>
		<hr>
	<table  class="table table-bordered table-striped custom-table mb-0" style="border: 1px solid black;">
			
			<tbody>
				
				<tr>
					<td>Appointment Id</td>
					<td>{{$appointment->appointment_id}}</td>
					
				</tr>
				<tr>
					<td>Patient Name</td>
					<td>{{$appointment->patient_name}}</td>
					
				</tr>
				<tr>
					<td>Doctor Name</td>
					<td>{{$appointment->doctor_name}}</td>
					
				</tr>
				<tr>
					<td>Date</td>
					<td>{{$appointment->appointment_date}}</td>
					
				</tr>
				<tr>
					<td>Appointment Time</td>
					<td>{{$appointment->appointment_time}}</td>
					
				</tr>
				<tr>
					<td>Amount</td>
					<td>{{$appointment->amount}}</td>
					
				</tr>
				<tr>
					<td>Payment Time</td>
					<td>{{$appointment->payment_time}}</td>
					
				</tr>
				
			
			</tbody>
		</table>
	</div>
</body>

</html>
