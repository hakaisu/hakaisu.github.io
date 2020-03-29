<?php
	header("Content-Type:application/json");
	$servername = "localhost";
	$username = "hakai";
	$password = "123456";
	$dbname = "tokokita";
	    // Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	$sql = "SELECT id_penjualan, id_produk, nama_produk, harga, stock FROM penjualan";
	$result = $conn->query($sql);
	$json = [];
	$i = 1;
	if ($result->num_rows > 0) {
	// output data of each row
		while($row = $result->fetch_assoc()) {
			$json[$i] = [
				'id_penjualan' => $row["id_penjualan"],
				'id_produk' => $row["id_produk"],
				'nama_produk' => $row["nama_produk"],
				'harga' => $row["harga"],
				'stock' => $row["stock"]
			];
			$i = $i + 1;
		}
	} else {
		echo "0 results";
	}
	$conn->close();
	$data = ['data' => $json];
	$tes  = json_encode($data,true);
	print_r($tes)
?>