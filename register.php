<?php
include '../../connection_DB/connect_db_technician.php';
$return =array();
if (count($_GET) == 4 && isset($_GET['user']) && isset($_GET['password']) && isset($_GET['status']) && isset($_GET['image'])) {
	
		$user = $_GET['user'];
		$password = $_GET['password'];
		$status = $_GET['status'];
		$image = $_GET['image'];
}

	
	
$select = "SELECT * FROM `register_technician` WHERE `user`='{$user}' AND `password`='{$password}' AND `status`= '{$status}' AND `part_img`='{$image}'";

if ($res = mysqli_query($connect,$select)) {
		    if(mysqli_num_rows($res)>0){
		    	
		    	$return['message'] = "มีผู้ใช้รหัสหรือรหัสผ่านนี้แล้ว";
		    }
		    else{
		    	$insert = "INSERT INTO `register_technician` (`id`, `user`, `password`, `status`)"; 
 				$insert.= " VALUES (NULL, '{$user}', '{$password}', '{$status}');";
						
				if(mysqli_query($connect,$insert)){
					$return['message'] = "สมัครสมาชิคเสร็จสิ้น";
				}
				else{
					$return['message'] = "สมัครไม่สำเร้จ";
				}
		    }	
}
echo json_encode($return);
mysqli_close($connect);
?>
