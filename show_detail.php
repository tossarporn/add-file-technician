<?php
header("content-type:text/javascript;charset=utf-8");  
include '../../connection_DB/connect_db_technician.php';
	mysqli_query($connect,"SET NAMES UTF8");
	$select = "SELECT `name_technician`,`surname_technician`,`nickname`,`residence_technician`,`type_eq` FROM `detail_technician` WHERE 1";
	
	$res = mysqli_query($connect,$select);
		while ($row = mysqli_fetch_assoc($res)) {
			$res_out[] = $row;
		}
		print (json_encode($res_out));
		mysqli_close($connect);
?>