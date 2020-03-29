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
		$id_produk = $post_vars['id_produk'];
        $nama_produk = $post_vars['nama_produk'];
        $harga = $post_vars['harga'];
        $stock = $post_vars['stock'];

		$sql = "UPDATE penjualan SET
					id_penjualan = '$id_penjualan',
					id_produk = '$id_produk',
					nama_produk = '$nama_produk',
                    harga = '$harga'
                    stock = '$stock'
				WHERE id_penjualan = '$id_penjualan'";
		$conn->query($sql);

		$result['status']['code'] = 200;
		$result['status']['description'] = "1 data di update";
		$result['result'] = array(
			"id_penjualan"=>$id_penjualan,
			"id_produk"=>$id_produk,
            "nama_produk"=>$nama_produk,
            "harga" =>$harga,
            "stock" =>$stock
		);

	}else{
		$result['status']['code'] = 400;
	}

	echo json_encode($result);
?>