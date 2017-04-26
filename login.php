<?php session_start(); ?>
<?php
include'../../connection_DB/connect_db_technician.php';
$return = array();
		$user = $_GET['user'];
		$password = $_GET['password'];
		$status = $_GET['status'];
//detect injection
$user = mysqli_escape_string($connect,$user);
$password = mysqli_escape_string($connect,$password);

$select = "SELECT * FROM `register_technician` WHERE `user`= '{$user}' AND `password`='{$password}' AND `status`= '{$status}'";

if ($res = mysqli_query($connect,$select)) {

	if (mysqli_num_rows($res)<=0) {
		$return['message']='รหัสผู้ใช่หรือรหัสผ่านอาจจะผิด';
	}

	else{

		while ($row = mysqli_fetch_array($res)) {
			
			if ($status['status'] ==1) {

				$_SESSION['login_user']=$user;
				$_SESSION['status']= 'customer';
				$return['message']='ยินดีต้อนรับเข้าสู่ระบบ';
				// echo header("location: show_detail.php");
			}
			elseif ($status['status'] ==2) {
				$_SESSION['login_user']=$user;
				$_SESSION['status']= 'technician';
				$return['message']='ยินดีต้อนรับเข้าสู่ระบบ';
				//echo header("location: detail_thenicain.php");
			}
		}
	}	
}
print (json_encode($return));
mysqli_close($connect);
?>