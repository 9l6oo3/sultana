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
<h4 class="text-center text-muted">اضافة مدرسة جديدة</h4> <a href="index.php?id=<?php  ?>" class="btn btn-primary">عودة</a>
<div class="row">
	<div class="col-md-3"></div>
	<div class="col-md-6 well">
<?php
    
if(isset($_POST['save_button'])) {
	$school_id =$_POST['school_id'];
	$schoolname = trim($_POST['name']);
	$address =$_POST['address'];
	$query1 = "SELECT * FROM tbl_schoolstype WHERE schoolname = '$schoolname' LIMIT 1";
	$result1 = mysqli_query($connection, $query1) or die("Query1 failed ... <br />");
	$count = mysqli_num_rows($result1);
	if($count >= 1) {
		echo '<div class="alert alert-warning" role="alert" style="margin:10px auto;text-align:center">';
		echo "<span>يجب أن يكون الإسم غير مكرر!</span>"; 
		echo '</div>';
		return;
	} 
	
	$q = "INSERT INTO tbl_schoolstype VALUES(NULL,'$school_id','$schoolname','$address')";

	$res = mysqli_query($connection,$q);	

	if($res) {
		echo '<div class="alert alert-success" role="alert" style="margin:10px auto;text-align:center">';
		echo "<span>تم إضافة الجهة الطالبة للخدمة</span>";
		echo '</div>';

		echo '<meta http-equiv="refresh" content="1;url=schoolstype.php" />';	
		exit();
	} else {
		echo 'Error Occurred';
	} 
}
?>
 	<form method="post">
	<div class="form-group">
    	<label>اسم المدرسة</label>
    	<input type="text" name="name" autofocus required id="name" placeholder="Task Name" class="form-control" />
		<label>الولاية</label>
    	<input type="text" name="address" autofocus required id="address" placeholder="address" class="form-control" />
	</div>
	
	<div class="row">
							<div class="col-md-6">
								<label>تابع لـ</label>
								<div class="form-group">
									<select id="mobile" name="school_id" class="form-control">
										<?php 
										$query = "SELECT * FROM tbl_schools";
										$result = mysqli_query($connection,$query);
										while($row = mysqli_fetch_array($result)) {
										?>
											<option value="<?php echo $row['school_id']; ?>">
												<?php echo $row['school_name']; ?>
											</option>
										<?php
										}
										?>
									</select>
								</div>
							</div>
							
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