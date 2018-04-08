<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>

<head>
    <<?php 
        foreach ($sql as $key => $value) {
            echo $value->bulan;
        }


     ?>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title></title>
	<link rel="stylesheet" href="style.css" type="text/css">
	<script src=" <?php  echo base_url('assets/amcharts/amcharts.js')?>" type="text/javascript"></script>
	<script src=" <?php  echo base_url('assets/amcharts/serial.js')?>" type="text/javascript"></script>

	<script>

		
		var chart;

		var chartData = [
		{
			"bulan": "Januari",
			"pemasukan": 23.5,
			"pengeluaran": 18.1
		},
		{
			"bulan": 2006,
			"pemasukan": 26.2,
			"pengeluaran": 22.8
		},
		{
			"bulan": 2007,
			"pemasukan": 30.1,
			"pengeluaran": 23.9
		},
		{
			"bulan": 2008,
			"pemasukan": 29.5,
			"pengeluaran": 25.1
		},
		{
			"bulan": 2009,
			"pemasukan": 24.6,
			"pengeluaran": 25
		}
		];


		AmCharts.ready(function () {
                // SERIAL CHART
                chart = new AmCharts.AmSerialChart();
                chart.dataProvider = chartData;
                chart.categoryField = "bulan";
                chart.startDuration = 1;
                chart.plotAreaBorderColor = "#DADADA";
                chart.plotAreaBorderAlpha = 1;
                // this single line makes the chart a bar chart
                chart.rotate = true;

                // AXES
                // Category
                var categoryAxis = chart.categoryAxis;
                categoryAxis.gridPosition = "start";
                categoryAxis.gridAlpha = 0.1;
                categoryAxis.axisAlpha = 0;

                // Value
                var valueAxis = new AmCharts.ValueAxis();
                valueAxis.axisAlpha = 0;
                valueAxis.gridAlpha = 0.1;
                valueAxis.position = "top";
                chart.addValueAxis(valueAxis);

                // GRAPHS
                // first graph
                var graph1 = new AmCharts.AmGraph();
                graph1.type = "column";
                graph1.title = "Pemasukan";
                graph1.valueField = "pemasukan";
                graph1.balloonText = "Pemasukan:[[value]]";
                graph1.lineAlpha = 0;
                graph1.fillColors = "#ADD981";
                graph1.fillAlphas = 1;
                chart.addGraph(graph1);

                // second graph
                var graph2 = new AmCharts.AmGraph();
                graph2.type = "column";
                graph2.title = "Pengeluaran";
                graph2.valueField = "pengeluaran";
                graph2.balloonText = "Pengeluaran:[[value]]";
                graph2.lineAlpha = 0;
                graph2.fillColors = "#81acd9";
                graph2.fillAlphas = 1;
                chart.addGraph(graph2);

                // LEGEND
                var legend = new AmCharts.AmLegend();
                chart.addLegend(legend);

                chart.creditsPosition = "top-right";

                // WRITE
                chart.write("chartdiv");
            });
        </script>
    </head>

    <div class="row">
    	<div class="col-md-12">
    		<div class="panel panel-default" >
    			<!-- 			<div class=" panel-heading" align="center">SISTEM INFORMASI PENGOLAHAN DATA KEUANGAN</div> -->
    			<div class="panel-body" align="center" style="font-size: 28px;">DASHBOARD PEMASUKAN DAN PENGELUARAN AMCC </br></br>
    				<div id="chartdiv" style="width:80%; height:500px;"></div>
    			</div>
    		</div>
    	</div>
    </div>


    </html>