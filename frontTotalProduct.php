
<?php
 require("DBConfig.php");
$from = $_REQUEST['FROM'];
		$to = $_REQUEST['TO'];
		$Fname = $_REQUEST["NAME"];
		$sql = "SELECT t.TeamLeadID
				FROM tSalesTeamInformation t
				WHERE t.TeamName = '$Fname' ";
				
				$result  = mysqli_query($conn,$sql);
				$count = mysqli_num_rows($result);
		if($count == 0 )
		{
			echo "USER NOT EXIST";
		}
		else
		{
				$row=mysqli_fetch_array($result);
				$UID=$row['TeamLeadID'];
				//echo $UID;
				$sql = "SELECT t.Code
						FROM tproductinfromations t
						WHERE t.Name = '$Pname'";
				
				$result  = mysqli_query($conn,$sql);
				$row=mysqli_fetch_array($result);
				$PID=$row['Code'];
				
		/*		
				
		$sql = "SELECT sum(a.Total) as T 
		FROM (SELECT p.ProductCode ,sum(p.SalesCount) as Total
			FROM tproductsalesdataprocessed p , tproductsalesdatasubmitted s , tUserReportingHierarchy t
			WHERE p.submitionID = s.ID 
			and s.ID = t.MembersUserID
			and t.LeadsUserID = '$UID'
			GROUP BY p.ProductCode)a";
		$result  = mysqli_query($conn,$sql);
		$row=mysqli_fetch_array($result);
		$total = $row['T'];	
		//echo $total;
		*/
?>
<!DOCTYPE HTML>
<html>
<head>
 <meta charset="utf-8">
 <title>
Pie chart
 </title>
 <script type="text/javascript" src="https://www.google.com/jsapi"></script>
 <script type="text/javascript">
 google.load("visualization", "1", {packages:["corechart"]});
 google.setOnLoadCallback(drawChart);
 function drawChart() {

 var data = google.visualization.arrayToDataTable([
 ['ProductCode', 'Total'],
 <?php 

		
 $query = "SELECT p.ProductCode ,sum(p.SalesCount) as Total
FROM tproductsalesdataprocessed p , tproductsalesdatasubmitted s , tUserReportingHierarchy t
WHERE p.submitionID = s.ID 
and s.ID = t.MembersUserID
and t.LeadsUserID = '$UID'
and s.SubmittedDate between '$from' and '$to'
GROUP BY p.ProductCode";

 $exec = mysqli_query($conn,$query);
 while($row = mysqli_fetch_array($exec)){

 echo "['".$row['ProductCode']."',".$row['Total']."],";
 }
 ?>
 ]);

 var options = {
 title: 'Product',
 colors: [<?php
 
	$total;
	$exec = mysqli_query($conn,$query);
	$count = mysqli_num_rows($exec);
	while($row = mysqli_fetch_array($exec)){
		if(($row['Total']/$total)*100  > 60)
			echo "'blue'";
		elseif(($row['Total']/$total)*100  > 40)
			echo "'green'";
		else
			echo "'red'";
		$count--;
		if($count != 0)
			echo ",";
 }
 
 
 ?>]
 };

 var chart = new google.visualization.PieChart(document.getElementById('piechart'));

 chart.draw(data, options);
 }
 </script>
</head>
<body>
 <h3>Pie Chart</h3>
 <div id="piechart" style="width: 900px; height: 500px;"></div>
</body>
</html>
<?php

		}
?>
