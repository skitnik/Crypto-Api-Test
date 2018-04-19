<!DOCTYPE html>
<html>
<head>
	<title>Single</title>
	<style type="text/css">
		tbody td,thead td{padding:10px;text-transform:uppercase}body,html{margin:0}*{font-family:Open Sans}tr:nth-child(odd){background-color:#4A646C;color:#fff}
	</style>
	<script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
  crossorigin="anonymous"></script>
	<script type="text/javascript" src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.js'></script>
</head>
<body>
	<table>
		<tbody>
			@foreach ($currency as $data)	
			<tr>
				<td>{{$data[0]}}</td>
				<td>{{$data[1]}}</td>		
			</tr>
			@endforeach
		</tbody>
	</table>
	
	<div id="chart">
		<canvas id="myChart" width="100%" ></canvas>
		<script>
			var priceHistory = '<?php echo json_encode($priceHistory); ?>'
			priceHistory = JSON.parse(priceHistory);
			var usdPrice = priceHistory;
			dataHour = [];
			dataPrice = [];

			for (i = 0; i < usdPrice.length; i++) {
				dataHour.push(usdPrice[i].time);
			    dataPrice.push(usdPrice[i].price);
			}

			var ctx = document.getElementById("myChart").getContext('2d');

			var myChart = new Chart(ctx, {
			    type: 'line',
			    data: {
			        labels: dataHour,
			        datasets: [{
			            label: 'USD',
			            data: dataPrice,
			            backgroundColor: ['rgba(95, 186, 125, 0.2)'],
			            borderColor: ['rgba(67, 132, 89,1)'],
			            borderWidth: 1
			        }],
			    },
			
			});
		</script>
	</div>

</body>
</html>

