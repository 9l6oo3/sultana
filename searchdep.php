<?php
include 'inc/header.php';
include 'connection.php';
Session::CheckSession();

$logMsg = Session::get('logMsg');
if (isset($logMsg)) {
  echo $logMsg;
}
$msg = Session::get('msg');
if (isset($msg)) {
  echo $msg;
}
Session::set("msg", NULL);
Session::set("logMsg", NULL);
?>

<div class="well"  style="margin: 5px; overflow: hidden" >
	<h3 class="text-muted text-center">
		Search Now
	</h3>
<form method="post">
 <div class="row">
 	<div class="col-md-3"></div>
	<div class="col-md-6">
		<div class="form-group">
			<input type="search" name="search" class="form-control" autofocus placeholder="Enter Search Here" required />
		</div>
	 </div>
 </div>
 <div class="row">
 	<div class="col-md-12 text-center">
 		<div class="form-group">
			<button class="btn btn-info" name="submit" type="submit">Search</button>
		</div>
 	</div>
 </div>
</form>
</div>
<div class="clearfix"></div><hr>

<?php
if(isset($_POST['submit'])) {
	$search = $_POST['search'];
	
	$sql = "SELECT * FROM tbl_departments,tbl_centers WHERE dep_name LIKE '%$search%'";
	////echo $sql . "<br>";
	$result = mysqli_query($connection, $sql);	
	if(mysqli_num_rows($result) == 0) {
		echo "<div class='alert alert-danger' role='alert' style='width:50%;margin:20px auto'>";
		echo "<p align='center'>No Search Match - [ $search ]</p>";
		echo "</div>";
	} else {
		
			
 print"
  <table border=\"5\" cellpadding=\"5\" cellspacing=\"0\" style=\"border-  collapse: collapse\" bordercolor=\"#808080\" width=\"100&#37;\"    id=\"AutoNumber2\" bgcolor=\"#C0C0C0\">
   <tr>
<td width=100>اسم الدائرة</td> 
  <td width=100>اسم القسم</td> 

  </tr> ";
  
 while($row = mysqli_fetch_array($result))
 { 

print "<tr>"; 
print "<td>" . $row['center_name'] . "</td>";
print "<td>" . $row['dep_name'] . "</td>"; 


print "</tr>"; 
} 
print "</table>"; 

  
	}
		
	?>
	

<?php
		
	}
  ?>

  <?php
  include 'inc/footer.php';

  ?>