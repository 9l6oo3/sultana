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
				$id =$_POST['id'];
				
				$service_id =$_POST['service_id'];
				$recieve_date =$_POST['recieve_date'];
				$submit_at =$_POST['submit_at'];
				$communicate_id =$_POST['communicate_id'];
				$status_id =$_POST['status_id'];
				$notes =$_POST['notes'];
				
	
	$q = "INSERT INTO tbl_departments VALUES(NULL,'$discription','$task_id','$center_id','$dep_id','$id','$service_id','$recieve_date','$submit_at','$communicate_id','$status_id','$notes')";

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
			
			
			<div class="panel panel-default">
					<div class="panel-heading" >
						<h3 class="panel-title">Upload New Book</h3>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-md-12">
								<label>وصف الخدمة</label>
								<div class="form-group">
									<input type="text" name="discription" class="form-control" placeholder="discription " autofocus required>
								</div>
							</div>
						<div class="row">
							<div class="col-md-6">
								<label>اختر الجهة الطالبة للخدمة</label>
								<div class="form-group">
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
						<br>
						
						<div class="row">
							<div class="col-md-6">
								<label>اسم الدائرة </label>
								<div class="form-group">
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
							<div class="col-md-6">
								<label>اسم القسم </label>
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
							<div class="col-md-6">
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
							<div class="col-md-6">
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
							<div class="col-md-6">
								<label>تاريخ استلام الطلب</label>
								<div class="form-group">
									<select id="mobile" name="service_id" class="form-control">
									
										<?php 
										$query = "SELECT * FROM tbl_newtask";
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
							<div class="col-md-6">
								<label>تاريخ انجاز الطلب</label>
								<div class="form-group">
									<select id="mobile" name="service_id" class="form-control">
										<?php 
										$query = "SELECT * FROM tbl_newtask";
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
							<div class="col-md-6">
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
									<input type="text" name="notes" class="form-control" placeholder="Book Title" autofocus required>
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
