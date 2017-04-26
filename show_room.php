<?php
include '../../connection_DB/connect_db_technician.php';
	$select = "SELECT `name_room` FROM `create_room_technicain` WHERE 1";
	$res = mysqli_query($connect,$select);
			while ($row = mysqli_fetch_assoc($res)) {
			$outres[]=$row;
		}
		print(json_encode($outres));
		mysqli_close($connect);
?>