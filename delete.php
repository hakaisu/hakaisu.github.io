<?php
	header("Content-Type:application/json");
	$servername = "localhost";
	$username = "hakai";
	$password = "123456";
	$dbname = "tokokita";

    $conn = new mysqli($servername, $username, $password, $dbnamea);

	$smethod = $_SERVER['REQUEST_METHOD'];

	if($smethod == $smethod){

		 parse_str(file_get_contents("php://input"),$post_vars);
    	$id_penjualan = $post_vars['id_penjualan'];

		$sql = "DELETE FROM penjualan WHERE id_penjualan = '$id_penjualan'";
		$conn->query($sql);

		$result['status']['code'] = 200;
		$result['status']['description'] = "1 data dihapus";
		$result['result'] = array(
			"id_penjualan" =>$id_penjualan,
		);

	}else{
		$result['status']['code'] = 400;
	}


	echo json_encode($result);
?>