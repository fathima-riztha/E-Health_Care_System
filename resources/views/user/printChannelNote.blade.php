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
				<h2>Channel-Note</h2>
			</div>
		</div>
		<hr>
	<table  class="table table-bordered">
			
			<tbody>
				<tr>
					<td>Appointment Id</td>
					<td>{{$channelNote->appointment_id}}</td>
					
				</tr>
				<tr>
					<td>Name</td>
					<td>{{$channelNote->patient_name}}</td>
					
				</tr>
				<tr>
					<td>Age</td>
					<td>{{$channelNote->age}}</td>
					
				</tr>
				<tr>
					<td>Date</td>
					<td>{{$channelNote->date}}</td>
					
				</tr>
				<tr>
					<td>Gender</td>
					<td>{{$channelNote->gender}}</td>
					
				</tr>
				<tr>
					<td>Height</td>
					<td>{{$channelNote->height}}</td>
					
				</tr>
				<tr>
					<td>Weight</td>
					<td>{{$channelNote->weight}}</td>
					
				</tr>
				<tr>
					<td>Reason</td>
					<td>{{$channelNote->reason}}</td>
					
				</tr>
				<tr>
					<td>Prescription</td>
					<td>{{$channelNote->prescription}}</td>
					
				</tr>
				<tr>
					<td>Testings</td>
					<td>{{$channelNote->testings}}</td>
					
				</tr>
			</tbody>
		</table>
	</div>
</body>

</html>


