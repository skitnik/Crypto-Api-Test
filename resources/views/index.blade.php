<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		tbody td,thead td{padding:10px}body,html{margin:0}*{font-family:Open Sans}thead td{background-color:#4A646C;color:#FFF;text-transform:uppercase}tbody tr:nth-child(even){background-color:#f2f2f2}tbody td a{display:block;text-decoration:none;color:#000;font-weight:700}tbody tr:hover{background-color:#d9d9d9}
	</style>
</head>
<body>
	<table style="width: 100%;" id="all-crypto-table">
		<thead>
			<tr>
				<td style="font-weight: bold;">ID</td>
				<td style="font-weight: bold;">Name</td>
				<td style="font-weight: bold;">Market Cap</td>
				<td style="font-weight: bold;">Price</td>
				<td style="font-weight: bold;">Available Supply</td>
				<td style="font-weight: bold;">Change (24h)</td>
			</tr>
		</thead>
		<tbody>
			@foreach ($currencies as $currency)
				<tr>
					<td>{{$currency->rank}}</td>
					<td><a href="/crypto/{{$currency->name}}">{{$currency->name}}</a></td>
					<td>${{floor($currency->market_cap_usd)}}</td>
					<td>${{$currency->price_usd}}</td>
					<td>{{(int)$currency->available_supply}} {{$currency->symbol}} </td>
					<td>{{$currency->percent_change_24h}}</td>	
				</tr>
			@endforeach
		</tbody>
	</table>
</body>
</html>


