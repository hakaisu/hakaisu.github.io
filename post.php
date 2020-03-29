<?php
	header("Content-Type:application/json");
	$servername = "localhost";
    $username = "hakai";
    $password = "123456";
    $dbname = "tokokita";
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

	// tangkap method request
	$smethod = $_SERVER['REQUEST_METHOD'];

	// inisialisasi variable hasil
	$result = array();

	// kondisi metode
	if($smethod == 'POST'){
		// tangkap input
		$id_penjualan = $_POST['id_penjualan'];
		$id_produk = $_POST['id_produk'];
		$nama_produk = $_POST['nama_produk'];
		$harga = $_POST['harga'];
		$stock = $_POST['stock'];

		// insert data
		$sql = "INSERT INTO video (
					id_penjualan,
					id_produk,
					nama_produk,
					harga,
					stock)
				VALUES (
					'$id_penjualan',
					'$id_produk',
					'$nama_produk',
					'$harga',
					'$stock')";
		$conn->query($sql);

		$result['status']['code'] = 200;
		$result['status']['description'] = "1 data terinput";
		$result['result'] = array(
			"id_penjualan"=>$id_penjualan,
			"id_produk"=>$id_produk,
			"nama_produk"=>$nama_produk,
			"harga"=>$harga,
			"stock"=>$stock);

	}else{
		$result['status']['code'] = 400;
	}

	// parse ke format json
	echo json_encode($result);
?>