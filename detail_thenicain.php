<?php
include '../../connection_DB/connect_db_technician.php';
$return = array();
if (count($_GET) == 6 && isset($_GET['name_t']) && isset($_GET['surname_t']) && isset($_GET['nickname_t']) && isset($_GET['res_t']) && isset($_GET['user_id'])) {
}

$select = "SELECT * FROM `detail_technician` WHERE `name_technician`='{$_GET['name_t']}' AND `surname_technician`='{$_GET['surname_t']}'AND`nickname`='{$_GET['nickname_t']}'AND`residence_technician`='{$_GET['res_t']}'AND`id_ref_cr`='{$_GET['user_id']}'";

if (mysqli_query($connect,$select)) {

	$insert = "INSERT INTO `detail_technician` (`id`, `name_technician`, `surname_technician`, `nickname`, `residence_technician`, `equipment`, `id_ref_cr`)";

	$insert.="VALUES (NULL, '{$_GET['name_t']}', '{$_GET['surname_t']}', '{$_GET['nickname_t']}', '{$_GET['res_t']}','{$_GET['equip_t']}', '{$_GET['user_id']}');";

		if (mysqli_query($connect,$insert)) {
		$return['message']="บันทึกข้อมุลสำเร็จ";
	}
		else{
		$return['message']="บันทึกข้อมุลไม่สำเร็จ";
	}
}
else{
		$return['message']="ค้นหาข้อมูลไม่สำเร็จ";
}
echo json_encode($return);
mysqli_close($connect);
?>