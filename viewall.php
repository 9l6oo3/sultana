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
	عرض كل [ <?php echo $task_name = $_GET['task_name'] ?> ] متوفرة
	<div class="btn-group pull-right" role="group" aria-label="...">
	</div>
</h3>

<?php
	$task_id = $_GET['task_id'];
	$query = "SELECT * FROM tbl_tasks WHERE task_id={$task_id}";
	$result = mysqli_query($connection,$query);
	$num = mysqli_num_rows($result);
	if($num == 0) {
		echo '<div class="alert alert-danger" role="alert" style="margin:10px auto;text-align:center">';
		echo "<p>عذرًا.. لاتوجد خدمات حاليا</p>";
		echo '</div>';
	}
	else
	{	
?>
<table border="0" align="center" id="example" cellpadding="1" class="table table-bordered" style="background-color:#FFF">
 <thead>
  <tr class="active">
  	<th width="72" nowrap="nowrap">No.</th>
    <th nowrap="nowrap">الإسم</th>
    <th>خيارات إضافية</th>
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
	<td nowrap="nowrap"><?php echo $row['name']; ?></td>
	<td nowrap="nowrap" width="160">	
		<a href="UpdateBookCat.php?cat_id=<?php echo $row['cat_id']; ?>" class="btn btn-xs btn-default"><i class="fa fa-pencil"></i>   تعديل</a>
		<a href="deleteBookCat.php?cat_id=<?php echo $row['cat_id']; ?>" onClick="return confirm('هل تريد إكمال عملية الحذف للخدمة؟')" class="btn btn-xs btn-danger">
			<i class="fa fa-remove"></i>  حذف
		</a>
	</td>
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
