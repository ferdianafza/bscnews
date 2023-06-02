<?php
	require 'function.php';
	$id = $_GET["id"];
	$query = "DELETE FROM partners WHERE id='$id' ";
	$hasil_query = mysqli_query($conn, $query);
	if(!$hasil_query) {
	    die ("Failed To delete!!!: ".mysqli_errno($conn).
	       " - ".mysqli_error($conn));
	} else {
	    echo "<script>alert('Data berhasil dihapus.');window.location='manageArticle.php';</script>";
	}
?>