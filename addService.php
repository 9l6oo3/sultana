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
<html>
<head>
<style>
.hint, [data-hint] {
  position: relative;
  display: inline-block;
  /**
	 * tooltip arrow
	 */
  /**
	 * tooltip body
	 */ }
 .hint:before, .hint:after, [data-hint]:before, [data-hint]:after {
    position: absolute;
    opacity: 0;
    z-index: 1000000;
    pointer-events: none;
    -webkit-transition: 0.3s ease;
    -moz-transition: 0.3s ease;
    transition: 0.3s ease; }
  .hint:hover:before, .hint:hover:after, [data-hint]:hover:before, [data-hint]:hover:after {
    opacity: 1; }
  .hint:before, [data-hint]:before {
    content: '';
    position: absolute;
    background: transparent;
    border: 6px solid transparent;
    z-index: 1000001; }
  .hint:after, [data-hint]:after {
    content: attr(data-hint);
    background: #383838;
    color: white;
    text-shadow: 0 -1px 0px black;
    padding: 8px 10px;
    font-size: 12px;
    line-height: 12px;
    white-space: pre;
    box-shadow: 4px 4px 8px rgba(0, 0, 0, 0.3); }

/**
 * source: hint-position.scss
 *
 * Defines the positoning logic for the tooltips.
 * 
 * Classes added:
 * 	1) hint--top
 * 	2) hint--bottom
 * 	3) hint--left
 * 	4) hint--right
 */
/**
 * set default color for tooltip arrows
 */
.hint--top:before {
  border-top-color: #383838; }

.hint--bottom:before {
  border-bottom-color: #383838; }

.hint--left:before {
  border-left-color: #383838; }

.hint--right:before {
  border-right-color: #383838; }

/**
 * top tooltip
 */
.hint--top:before {
  margin-bottom: -12px; }
.hint--top:after {
  margin-left: -18px; }
.hint--top:before, .hint--top:after {
  bottom: 100%;
  left: 50%; }
.hint--top:hover:before, .hint--top:hover:after {
  -webkit-transform: translateY(-8px);
  -moz-transform: translateY(-8px);
  transform: translateY(-8px); }

/**
 * bottom tooltip
 */
.hint--bottom:before {
  margin-top: -12px; }
.hint--bottom:after {
  margin-left: -18px; }
.hint--bottom:before, .hint--bottom:after {
  top: 100%;
  left: 50%; }
.hint--bottom:hover:before, .hint--bottom:hover:after {
  -webkit-transform: translateY(8px);
  -moz-transform: translateY(8px);
  transform: translateY(8px); }

/**
 * right tooltip
 */
.hint--right:before {
  margin-left: -12px;
  margin-bottom: -6px; }
.hint--right:after {
  margin-bottom: -14px; }
.hint--right:before, .hint--right:after {
  left: 100%;
  bottom: 50%; }
.hint--right:hover:before, .hint--right:hover:after {
  -webkit-transform: translateX(8px);
  -moz-transform: translateX(8px);
  transform: translateX(8px); }

/**
 * left tooltip
 */
.hint--left:before {
  margin-right: -12px;
  margin-bottom: -6px; }
.hint--left:after {
  margin-bottom: -14px; }
.hint--left:before, .hint--left:after {
  right: 100%;
  bottom: 50%; }
.hint--left:hover:before, .hint--left:hover:after {
  -webkit-transform: translateX(-8px);
  -moz-transform: translateX(-8px);
  transform: translateX(-8px); }
	 </style>
<div >
	<div class="col-md-3"></div>
	<div class="col-md-6">
		<div class="newTask">
			<form method="post"  enctype="multipart/form-data" >
			
			<?php
			if(isset($_POST['uploadBtn']))
			{
				$discription=$_POST['discription'];
				$task_id =$_POST['task_id'];
				$center_id =$_POST['center_id'];
				$dep_id =$_POST['dep_id'];
				$school_id =$_POST['school_id'];
				$schooltype_id =$_POST['schooltype_id'];
				$gu_id =$_POST['gu_id'];
				$viewr_id =$_POST['viewr_id'];
				$other_id =$_POST['other_id'];
				$id =$_POST['id'];
				
				$service_id =$_POST['service_id'];
				$recieve_date =$_POST['recieve_date'];
				$submit_at =$_POST['submit_at'];
				$communicate_id =$_POST['communicate_id'];
				$status_id =$_POST['status_id'];
				$notes =$_POST['notes'];
				
	
	$q = "INSERT INTO tbl_newtask VALUES(NULL,'$discription','$task_id','$center_id','$dep_id','$school_id','$schooltype_id','$gu_id','$viewr_id','$other_id','$id','$service_id','$recieve_date','$submit_at','$communicate_id','$status_id','$notes')";

	$res = mysqli_query($connection,$q);	

	if($res) {
		echo '<div class="alert alert-success" role="alert" style="margin:10px auto;text-align:center">';
		echo "<span>تم اضافة المهمة بنجاح !</span>";
		echo '</div>';

		echo '<meta http-equiv="refresh" content="1;url=index.php" />';	
		exit();
	} else {
		echo 'Error Occurred';
	} 
	
			}
			
			?>
			
			
			<div class="panel panel-default" style="width:600px; margin:0px auto">
					<div class="panel-heading" >
						<h3 class="panel-title">اضافة مهمة جديدة</h3>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-md-12">
								<label>وصف الخدمة</label>
								<div class="form-group">
									<input type="text" name="discription" class="form-control" placeholder="discription " autofocus required>
								</div>
							</div>
							</div>
							</div>
							<div class="form-group">
						<div class="row">
							<div class="col-md-12">
								<label>اختر الجهة الطالبة للخدمة</label>
								
									<select id="mobile" name="task_id" class="form-control">
										<?php 
										$query = "SELECT * FROM tbl_tasks";
										$result = mysqli_query($connection,$query);
										while($row = mysqli_fetch_array($result)) {
										?>
											<option value="<?php echo $row['task_id']; ?>">
												<?php echo $row['task_name']; ?>
											</option>
										<?php
										}
										?>
									</select>
								
							</div>
							</div>
						</div>
						
						<div class="form-group">
						<div class="row">
							<div class="col-md-12">
								<label class="hint--right" data-hint=" يرجى اختيار اسم الدائرة في حال كانت الجهة الطالبة للخدمة (دائرة)">اسم الدائرة </label>
								
									<select id="mobile" name="center_id" class="form-control">
										<?php 
										$query = "SELECT * FROM tbl_centers";
										$result = mysqli_query($connection,$query);
										while($row = mysqli_fetch_array($result)) {
										?>
											<option value="<?php echo $row['center_id']; ?>">
												<?php echo $row['center_name']; ?>
											</option>
										<?php
										}
										?>
									</select>
								</div>
							</div>
							
						</div>
						<br>
						<div class="row">
							<div class="col-md-12">
								<label class="hint--right" data-hint=" يرجى اختيار أحد الأقسام في حال اخترت دائرة بالأعلى ">اسم القسم </label>
								<div class="form-group">
									<select id="mobile" name="dep_id" class="form-control">
										<?php 
										$query = "SELECT * FROM tbl_departments";
										$result = mysqli_query($connection,$query);
										while($row = mysqli_fetch_array($result)) {
										?>
											<option value="<?php echo $row['dep_id']; ?>">
												<?php echo $row['dep_name']; ?>
											</option>
										<?php
										}
										?>
									</select>
								</div>
							</div>
							
						</div>
						
						<div class="row">
							<div class="col-md-12">
								<label>تصنيف المدرسة </label>
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
						
						<div class="row">
							<div class="col-md-12">
								<label>اسم المدرسة</label>
								<div class="form-group">
									<select id="mobile" name="schooltype_id" class="form-control">
										<?php 
										$query = "SELECT * FROM tbl_schoolstype";
										$result = mysqli_query($connection,$query);
										while($row = mysqli_fetch_array($result)) {
										?>
											<option value="<?php echo $row['schooltype_id']; ?>">
												<?php echo $row['schoolname']; ?>
											</option>
										<?php
										}
										?>
									</select>
								</div>
							</div>
							
						</div>
						
						<div class="row">
							<div class="col-md-12">
								<label>اسم ولي الأمر </label>
								<div class="form-group">
									<select id="mobile" name="gu_id" class="form-control">
										<?php 
										$query = "SELECT * FROM tbl_guardians";
										$result = mysqli_query($connection,$query);
										while($row = mysqli_fetch_array($result)) {
										?>
											<option value="<?php echo $row['gu_id']; ?>">
												<?php echo $row['gu_name']; ?>
											</option>
										<?php
										}
										?>
									</select>
								</div>
							</div>
							
						</div>
						
						<div class="row">
							<div class="col-md-12">
								<label>اسم المراجع </label>
								<div class="form-group">
									<select id="mobile" name="viewr_id" class="form-control">
										<?php 
										$query = "SELECT * FROM tbl_viewrs";
										$result = mysqli_query($connection,$query);
										while($row = mysqli_fetch_array($result)) {
										?>
											<option value="<?php echo $row['viewr_id']; ?>">
												<?php echo $row['viewr_name']; ?>
											</option>
										<?php
										}
										?>
									</select>
								</div>
							</div>
							
						</div>
						
						<div class="row">
							<div class="col-md-12">
								<label>أخرى  </label>
								<div class="form-group">
									<select id="mobile" name="other_id" class="form-control">
										<?php 
										$query = "SELECT * FROM tbl_others";
										$result = mysqli_query($connection,$query);
										while($row = mysqli_fetch_array($result)) {
										?>
											<option value="<?php echo $row['other_id']; ?>">
												<?php echo $row['other_name']; ?>
											</option>
										<?php
										}
										?>
									</select>
								</div>
							</div>
							
						</div>
						
						<div class="row">
							<div class="col-md-12">
								<label>مستلم الطلب </label>
								<div class="form-group">
									<select id="mobile" name="id" class="form-control">
										<?php 
										$query = "SELECT * FROM tbl_users";
										$result = mysqli_query($connection,$query);
										while($row = mysqli_fetch_array($result)) {
										?>
											<option value="<?php echo $row['id']; ?>">
												<?php echo $row['name']; ?>
											</option>
										<?php
										}
										?>
									</select>
								</div>
							</div>
							
						</div>
						
						<div class="row">
							<div class="col-md-12">
								<label>نوع الخدمة </label>
								<div class="form-group">
									<select id="mobile" name="service_id" class="form-control">
										<?php 
										$query = "SELECT * FROM tbl_services";
										$result = mysqli_query($connection,$query);
										while($row = mysqli_fetch_array($result)) {
										?>
											<option value="<?php echo $row['service_id']; ?>">
												<?php echo $row['service_name']; ?>
											</option>
										<?php
										}
										?>
									</select>
								</div>
							</div>
							
						</div>
						
						<div class="row">
							<div class="col-md-12">
								<label>تاريخ استلام الطلب</label>
								<div class="form-group">
									<input type="date" name="recieve_date" />
								</div>
							</div>
							
						</div>
						
						<div class="row">
							<div class="col-md-12">
								<label>تاريخ انجاز الطلب</label>
								<div class="form-group">
									<input type="date" name="submit_at" />
								</div>
							</div>
							
						</div>
						
						<div class="row">
							<div class="col-md-12">
								<label>تم التواصل من خلال</label>
								<div class="form-group">
									<select id="mobile" name="communicate_id" class="form-control">
										<?php 
										$query = "SELECT * FROM tbl_communication";
										$result = mysqli_query($connection,$query);
										while($row = mysqli_fetch_array($result)) {
										?>
											<option value="<?php echo $row['communicate_id']; ?>">
												<?php echo $row['communication_name']; ?>
											</option>
										<?php
										}
										?>
									</select>
								</div>
							</div>
							
						</div>
						
						<div class="row">
							<div class="col-md-6">
								<label>حالة الطلب</label>
								<div class="form-group">
									<select id="mobile" name="status_id" class="form-control">
										<?php 
										$query = "SELECT * FROM tbl_orderstatus";
										$result = mysqli_query($connection,$query);
										while($row = mysqli_fetch_array($result)) {
										?>
											<option value="<?php echo $row['status_id']; ?>">
												<?php echo $row['status_name']; ?>
											</option>
										<?php
										}
										?>
									</select>
								</div>
							</div>
							
						</div>
						
						<div class="row">
							<div class="col-md-12">
								<label>ملاحظات</label>
								<div class="form-group">
									<input type="text" name="notes" class="form-control" placeholder="اكتب هنا" autofocus required>
								</div>
							</div>
						</div>
						
						
					</div>
					<div class="panel-footer">
						<input type="submit" name="uploadBtn" class="btn btn-sm btn-success pull-right" value="Save"><br><br>
					</div>
				</div>
			</form>
		</div>
	</div>
	<div class="col-md-3"></div>
</div>

  <?php
  include 'inc/footer.php';

  ?>
