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

<h3>
	عرض الدوائر المتوفرة <a href="newCenter.php" class="btn btn-sm btn-success pull-right"> إضافة دائرة</a>
	 <a href="departments.php" class="btn btn-sm btn-success pull-right"> عرض الأقسام </a>
	 <a href="index.php?id=<?php  ?>" class="btn btn-primary">عودة</a>
</h3>

<?php
	$query = "SELECT * FROM tbl_centers";
	$result = mysqli_query($connection,$query);
	$num = mysqli_num_rows($result);
	if($num == 0) {
		echo '<div class="alert alert-danger" role="alert" style="margin:10px auto;text-align:center">';
		echo "<p>عذرًا .. لا توجد معلومات حاليًا</p>";
		echo '</div>';
	}
	else
	{
		
?>
<table border="0" align="center" id="example" cellpadding="1" class="table table-bordered" style="background-color:#FFF">
 <thead>
  <tr class="active">
  	<th width="72" nowrap="nowrap">No.</th>
    <th nowrap="nowrap">اسم الدائرة</th>
   
  </tr>
 </thead>
    <?php
		$i = 1;
		while($row = mysqli_fetch_array($result))
		{
	?>
  <tbody>
    <tr>
      <td nowrap="nowrap"><?php echo $i++; ?></td>
	<td nowrap="nowrap"><?php echo $row['center_name']; ?></td>
	
  </tr>
  </tbody>
  <?php } ?>
</table>
<?php
		
	}
  ?>

  <?php
  include 'inc/footer.php';

  ?>
