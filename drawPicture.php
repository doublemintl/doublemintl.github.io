<?php
	header ("Content-type:text/html; charset=UTF-8");
	require_once '../jpgraph-4.3.1/src/jpgraph.php';
	require_once '../jpgraph-4.3.1/src/jpgraph_bar.php';
	
	$company = "";
	$year=0;
	$data = array();
	if(isset($_POST['submit'])){
		$company = $_POST['company'];
		$year = $_POST['year'];
		$data = $_POST['money'];
	}

	$graph = new Graph(800, 400);
	$graph->SetScale('textlin');
	$graph->SetShadow();
	$graph->img->SetMargin(50, 50, 50, 50);
	$barplot = new BarPlot($data);
	$barplot->SetFillColor('blue');
	$barplot->value->Show();
	$graph->Add($barplot);
	
	$graph->title->Set(iconv("utf-8", "gb2312", $company.'公司'.$year.'年度收支'));
	$graph->xaxis->title->Set(iconv("utf-8", "gb2312", '月份'));
	$graph->yaxis->title->Set(iconv("utf-8", "gb2312", '总金额（万元）'));
	$graph->title->SetFont(FF_SIMSUN, FS_BOLD);
	$graph->xaxis->title->setFont(FF_SIMSUN, FS_BOLD);
	$graph->yaxis->title->setFont(FF_SIMSUN, FS_BOLD);
	$graph->Stroke();

?>
