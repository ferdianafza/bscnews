<?php
	if (isset($_POST['tambah'])) {
		include ('function.php');
		$title_partner            =$_POST['title_partner'];
		$namaFile 				= $_FILES['foto']['name'];
		$namaSementara 		    = $_FILES['foto']['tmp_name'];
		$dirUpload 				= "terupload/";
		$terupload 				= move_uploaded_file($namaSementara, $dirUpload.$namaFile);
		if ($terupload) {
		    // echo "Upload success!<br/>";
		    // echo "Link: <a href='".$dirUpload.$namaFile."'>".$namaFile."</a>";
		} else {
		    // echo "Upload fail!";
		}	
		$sql = "INSERT INTO partners VALUES(NOT NULL ,'$title_partner','$namaFile')";

		if (mysqli_query($conn, $sql)) {
			echo "<script>alert('Partner has been add!');window.location='index.php'</script>";
			// header("location:index.php");
			} else {
				echo "Error: " . $sql . "<br>" . mysqli_error($conn);
			}

			mysqli_close($conn);

		}else{ 
	   echo '<script>window.history.back()</script>';
		}
?>