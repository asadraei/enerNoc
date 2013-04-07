
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <title>EnerNOC Data</title>
  <script type="text/javascript" src="http://www.google.com/jsapi"></script>
  <script type="text/javascript">
    google.load('visualization', '1', {packages: ['motionchart']});

    function drawVisualization() {
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Site ID');
        data.addColumn('date', 'Date');
        data.addColumn('number', 'Reading (kWh)');
        data.addColumn('number', 'Area (ft^2)');
        data.addColumn('number', 'Temp (F)');
        data.addColumn('number', 'Rate (cents/kWh)');
        data.addColumn('number', 'Expense ($)');
        data.addColumn('string', 'Industry');
        data.addColumn('string', 'US State');
        data.addRows([
<?php

/*
Spring: 21 March to 20 June
Summer: 21 June to 20 September
Autumn: 21 September to 20 December
Winter: 21 December to 20 March
*/


set_time_limit(900);
require_once('rb.php');

R::setup('mysql:host=localhost; dbname=enerNoc','root','');


$sub = R::findAll('sites','group by sub_industry');

if(isset($_GET['industry']))
	$info = R::find('sites', 'sub_industry = ?', array($_GET['industry']));
else
	$info = R::find('sites','');

foreach($info as $i){
	
	//if($i->id % 2){
		$consumptions = R::find('consumption',' site_id = :id ', array(':id'=> $i->id ));
	
		$j = 0;
		foreach($consumptions as $c){
			//if($j % 2){
				$year = date("Y", strtotime($c->date));
				$month = date("m", strtotime($c->date));
				$day= date("d", strtotime($c->date));
				
				echo "['".$i->id."', new Date(". $year .",". $month .",". $day ."), ".$c->value.",". $i->sq .",". $c->temp. ", ". ($i->rate*100) .",". ($i->rate * $c->value) .", '".  $i->sub_industry."','".$i->state."'], ";
			//}
	
		}
	//}	
}



?>
]);
var motionchart = new google.visualization.MotionChart(
    document.getElementById('visualization'));
motionchart.draw(data, {'width': 1200, 'height':700}); }

google.setOnLoadCallback(drawVisualization);
</script>
</head>
<body style="font-family: Arial;border: 0 none;">
<div id="visualization" style="width: 1200px; height: 800px;"></div>

<?php foreach($sub as $s){
			echo '<a href="?industry='.urlencode($s->sub_industry).'">'.$s->sub_industry .'</a><BR>';
		}
?>
</body>
</html>