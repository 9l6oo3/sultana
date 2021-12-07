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
	عرض الخدمات المتوفرة <a href="newService.php" class="btn btn-sm btn-success pull-right"> إضافة خدمة</a>
	<a href="index.php?id=<?php  ?>" class="btn btn-primary">عودة</a>
</h3>

<?php
	$query = "SELECT * FROM tbl_tasks";
	$result = mysqli_query($connection,$query);
	$num = mysqli_num_rows($result);
	if($num == 0) {
		echo '<div class="alert alert-danger" role="alert" style="margin:10px auto;text-align:center">';
		echo "<p> عذرًا.. لاتوجد خدمات حاليا</p>";
		echo '</div>';
	}
	else
	{
		
?>
<table border="0" align="center" id="example" cellpadding="1" class="table table-bordered" style="background-color:#FFF">
 <thead>
  <tr class="active">
  	<th width="72" nowrap="nowrap">No.</th>
    <th nowrap="nowrap">إسم الخدمة</th>

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
	<td nowrap="nowrap"><?php echo $row['task_name']; ?></td>
	
	
  </tr>
  </tbody>
  <?php } ?>
</table>
<div align="right">
<h1 color="red">عرض كل </h1>
<a href="centers.php" class="btn btn-sm btn-success pull-right"> الدوائر</a>
<a href="schools.php" class="btn btn-sm btn-success pull-right"> المدارس </a>
<a href="viewrs.php" class="btn btn-sm btn-success pull-right"> المراجعين</a>
<a href="guardian.php" class="btn btn-sm btn-success pull-right">أولياء الأمور</a>
<a href="others.php" class="btn btn-sm btn-success pull-right"> أخرى</a>
</div>
<?php
		
	}
  ?>

  <?php
  include 'inc/footer.php';

  ?>
