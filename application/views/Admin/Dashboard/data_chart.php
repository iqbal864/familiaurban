<figure class="highcharts-figure">
	<div class="table-responsive">
		<div id="container_pengunjung" style="height: auto; width:100%;"></div>
	</div>
</figure>

<?php
$arr_visitor = array();
$sum_visitor = 0;
foreach ($visitor as $vt) {
	$arr_visitor[] = $vt['total'];
	$sum_visitor += $vt['total'];
}

$im_visitor = implode(",", $arr_visitor);
?>

<script>
	Highcharts.setOptions({
		colors: ['#8E44AD']
	});
	Highcharts.chart('container_pengunjung', {
		chart: {
			type: 'line',
			events: {
				load: function(event) {
					event.target.reflow();
				}
			}
		},
		credits: {
			enabled: false
		},
		title: {
			text: ''
		},
		xAxis: {
			categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
		},
		yAxis: {
			allowDecimals: false,
			title: {
				text: 'Total'
			}
		},
		plotOptions: {
			line: {
				dataLabels: {
					enabled: true,
					format: '{y}'
				}

			},
			series: {
				pointStart: 0
			}
		},
		series: [{
			name: 'Pengunjung',
			data: [<?= $im_visitor ?>]
		}]
	});

	document.getElementById("sidebar").addEventListener("transitionend", myEndFunction);

	function myEndFunction() {
		Highcharts.charts.forEach(function(chart, index) {
			chart.reflow();
		})
	}

	$(".sum_visitor").text(<?= $sum_visitor ?>);
</script>
