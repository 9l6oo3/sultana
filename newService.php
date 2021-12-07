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
<h4 class="text-center text-muted">إضافة خدمة جديدة</h4>
<a href="index.php?id=<?php  ?>" class="btn btn-primary">عودة</a>
<div class="row">
	<div class="col-md-3"></div>
	<div class="col-md-6 well">
<?php
    
if(isset($_POST['save_button'])) {
	
	$task_name = trim($_POST['name']);
	
	$query1 = "SELECT * FROM tbl_tasks WHERE task_name = '$task_name' LIMIT 1";
	$result1 = mysqli_query($connection, $query1) or die("Query1 failed ... <br />");
	$count = mysqli_num_rows($result1);
	if($count >= 1) {
		echo '<div class="alert alert-warning" role="alert" style="margin:10px auto;text-align:center">';
		echo "<span>يجب أن يكون الإسم غير مكرر!</span>"; 
		echo '</div>';
		return;
	} 
	
	$q = "INSERT INTO tbl_tasks VALUES(NULL,'$task_name')";

	$res = mysqli_query($connection,$q);	

	if($res) {
		echo '<div class="alert alert-success" role="alert" style="margin:10px auto;text-align:center">';
		echo "<span>تم إضافة الجهة الطالبة للخدمة</span>";
		echo '</div>';

		echo '<meta http-equiv="refresh" content="1;url=tasks.php" />';	
		exit();
	} else {
		echo 'Error Occurred';
	} 
}
?>
 	<form method="post">
	<div class="form-group">
    	<label>اسم الجهة الطالبة للخدمة</label>
    	<input type="text" name="name" autofocus required id="name" placeholder="Task Name" class="form-control" />
	</div>
  
	  <div class="form-group">
      	<input type="submit" name="save_button" id="save" value="Save" class="btn pull-right btn-primary"/>
      </div>

  </form>   
	</div>
</div>
 <?php
  include 'inc/footer.php';

  ?>