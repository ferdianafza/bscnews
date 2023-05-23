<?php

$host = "us-cdbr-east-06.cleardb.net";
$user = "bbbdb24a8ea83a";
$pass = "06cf931a";
$name = "heroku_d622690b4f1d505";


// $host = "localhost";
// $user = "root";
// $pass = "";
// $name = "bscnewspaper";

$conn = mysqli_connect($host, $user, $pass, $name) or die("Koneksi ke database gagal");
mysqli_select_db($conn, $name) or die('Database is not found!');



function query($query) {
	global $conn;
	$result = mysqli_query($conn, $query);
	$row = [];
	while ( $row = mysqli_fetch_assoc($result) ) {
		$rows[] = $row;
	}
    return $rows;
}

$apiKey = 'bc3cfbd0-a635-4d91-bb90-1835e0569363';

// Fungsi untuk mengambil harga crypto dari CoinMarketCap
function getCryptoPrice($symbol) {
    global $apiKey;
    
    $url = "https://pro-api.coinmarketcap.com/v1/cryptocurrency/quotes/latest";
    $parameters = [
        'symbol' => $symbol
    ];

    $headers = [
        'Accepts: application/json',
        'X-CMC_PRO_API_KEY: ' . $apiKey
    ];

    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url . '?' . http_build_query($parameters));
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($curl);
    curl_close($curl);

    $data = json_decode($response, true);

    // Ambil harga dari data yang diterima
    if (isset($data['data'][$symbol]['quote']['USD']['price'])) {
        $price = $data['data'][$symbol]['quote']['USD']['price'];
        return $price;
    } else {
        return false;
    }
}




function registrasi($data) {
	global $conn;

	$username = strtolower(stripslashes($data["username"]));
	$email = strtolower(stripslashes($data["email"]));
	$password = mysqli_real_escape_string($conn, $data["password"]);
	$password2 = mysqli_real_escape_string($conn, $data["password2"]);


    // cek username sudah ada atau belum
    $sql = "SELECT email FROM user WHERE email = '$email'";
    $result = $conn->query($sql);
    
      if ( mysqli_fetch_assoc($result) ) {
      	   echo "<script>
      	         alert('email sudah ada')
      	         </script>";
      	    return false;     
      }

	// cek konfirmasi password
	if ($password !== $password2) {
		echo "<script>
		        alert('konfirmasi password tidak sesuai!')
		      </script>";
		return false;      
      }


      // enkripsi password
      $password = password_hash($password, PASSWORD_DEFAULT);

      // tambah user bari ke database
      $sql = "INSERT INTO user VALUES(NULL, '$username', '$email', '$password')";
		if (mysqli_query($conn, $sql)) {
			    
			} 

      return mysqli_affected_rows($conn);
      mysql_close($conn);
}

?>