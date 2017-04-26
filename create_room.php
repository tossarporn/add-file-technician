<?php
include '../../connection_DB/connect_db_technician.php';
$return = array();

if (count($_GET ==2) && isset($_GET['user_id']) && isset($_GET['name_room'])) {
	
}

$select = "SELECT * FROM `create_room_technicain` WHERE `name_room`='{$_GET['name_room']}' AND `ref_rt`= '{$_GET['user_id']}' ";
if ($res = mysqli_query($connect,$select)) {

		if (mysqli_num_rows($res)>0) {
			$return['message']="มีชื่อห้องซ้ำกันครับ";	
		}
		else{
			
			$insert = "INSERT INTO `create_room_technicain` (`id`, `name_room`, `ref_rt`)"; 
			$insert .= "VALUES (NULL, '{$_GET['name_room']}', '{$_GET['user_id']}');";
			
		}
			if (mysqli_query($connect,$insert)) {
				$return['message']="สร้างห้องสำเร็จ";
			}
			else{
				$return['message']="สร้างห้องไม่สำเร็จ";
			}
	}
	else{
		$return['message']="ไมาสามารถเชื่อมต่อกับข้อมูลได้ครับ";
	}
	echo json_encode($return);
	mysqli_close($connect);
?>