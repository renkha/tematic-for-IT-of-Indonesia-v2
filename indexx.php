<?php

	include 'connect.php';
	include 'proses.php';
	$i = isset($_POST['id'])?$_POST['id']:''; 
	$j = isset($_POST['judul'])?$_POST['judul']:''; 
	$a = isset($_POST['abstrak'])?$_POST['abstrak']:''; 
	$t = isset($_POST['tema'])?$_POST['tema']:''; 
	//$n = isset($_POST['tambahtema'])?$_POST['tambahtema']:''; 
	//$k = isset($_POST['tambahkeyword'])?$_POST['tambahkeyword']:''; 

?>
<!DOCTYPE html>
<html>
<head>
	<title>Text</title>
	<link rel="stylesheet" type="text/css" href="Assets\css\font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="Assets\css\style.css">
	<link href="Assets/css/bootstrap.min.css" rel="stylesheet">
	<script src="Assets/js/jquery-3.2.1.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<style type="text/css">
		body{
			margin: 0;
			padding: 0;
		}

		div{
			margin: 50px 0px -70px 350px;	
			width: 50%;
			height: 50%;
			text-align: left;
			border-radius: 5px;
		    background-color: #f2f2f2;
		    padding: 20px;
		}
		.ab
		{
			text-align: center;
			font-size: 13px;
		}
		.sub
		{
			text-align: center;
		}
		input[type=text], select {
		    width: 100%;
		    padding: 12px 20px;
		    margin: 8px 0;
		    display: inline-block;
		    border: 1px solid #ccc;
		    border-radius: 4px;
		    box-sizing: border-box;
		    text-align: left;
		}

		.proses{
			width: 100%;
		    background-color: #4CAF50;
		    color: white;
		    padding: 5px 20px;
		    margin: 8px 0;
		    border: none;
		    border-radius: 4px;
		    cursor: pointer;
		}

		.submit{
		    width: 70%;
		    background-color: #4CAF50;
		    color: white;
		    padding: 14px 20px;
		    margin: 8px 0;
		    border: none;
		    border-radius: 4px;
		    cursor: pointer;
		}

		input[type=submit]:hover {
		    background-color: #45a049;
		}
				
		textarea
		{
			min-width: 95%;
			min-height: 30vh;
			resize: none;
			border-radius: 4px;
			padding: 12px 20px;
		}
		.dropbtn {
		    background-color: #4CAF50;
		    color: white;
		    padding: 16px;
		    font-size: 16px;
		    border: none;
		    cursor: pointer;
		}

		.dropdown {
		    position: relative;
		    display: inline-block;
		}

		.dropdown-content {
		    display: none;
		    position: absolute;
		    background-color: #f9f9f9;
		    min-width: 160px;
		    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
		    z-index: 1;
		}

		.dropdown-content a {
		    color: black;
		    padding: 12px 16px;
		    text-decoration: none;
		    display: block;
		}

		.dropdown-content a:hover {background-color: #f1f1f1}

		.dropdown:hover .dropdown-content {
		    display: block;
		}

		.dropdown:hover .dropbtn {
		    background-color: #3e8e41;
		}


	</style>
</head>
<body>
	<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
		<div class="in">	
			<label>Id :</label>
			<input class="id" 
				   type="text" 
				   name="id"
				   value="<?php echo $i; ?>"
				   placeholder="Masukkan Id">
			<label>Judul :</label>
			<input class="judul" 
			       type="text" 
			       name="judul"
			       value="<?php echo $j; ?>" 
			       placeholder="Masukkan Judul Skripsi">
			<label>Abstrak :</label>
		</div>
		<div class="ab">
			<textarea class="abstrak" 
					  name="abstrak[]"
					  value="<?php echo $a; ?>" 
					  placeholder="Masukkan Abstrak untuk memilih Tema & masukkan Abstrak lagi setelah memilih Tema untuk Submit" ></textarea>
			<br>
				<input class="proses" type="submit" name="proses" value="Proses Tema">

				<?php
										
					if(isset($_POST['proses']))
					{		
						$as = $_POST['abstrak'];
						$c = p($as,$at,$kata_hubung,$kata_dasar,$id_tema,$nama_tema);
						
						echo "<label>Pilih Tema :</label></br>";
						// print_r($cc);
							foreach ($c as $key => $value) 
							{
								foreach ($value as $key1 => $value1) 
								{
									$value1 = round($value1*100);	
									echo 
									"<input type=radio
			       							name=tema
			      							value=".$key.">".$key1." = ".$value1."</br>"; 
								}
							}
				?>
		</div>
		<div class="sub">
			<input class="submit" type="submit" name="submit" value="Submit" >
		</div>
				<?php
					}
					// elseif (isset($_POST['submit']))
					// {
					// 	$id_skripsi = $i;
					// 	$judul = $j;
					// 	$abstrak = '';
					// 	foreach($a as $key => $value) 
					// 	{
					// 		$abstrak = $value;
					// 	}
					// 	$id_tema = $t;
							
					// 		if(empty($id_skripsi))
					// 		{
					// 	    	echo '<script>alert("ID belum diisi")</script>';
					// 	    }
					// 	    else if (empty($judul))
					// 	    {
					// 	    	echo '<script>alert("Judul belum diisi")</script>';
					// 	    }
					// 	    else if (empty($abstrak))
					// 	    {
					// 	    	echo '<script>alert("Abstrak belum diisi")</script>';
					// 	    }
					// 	    else if (empty($id_tema))
					// 	    {
					// 	    	echo '<script>alert("Tema belum dipilih")</script>';
					// 	    }
					// 	    else 
					// 	    { 
					// 	    	sent_skripsi($id_skripsi, $judul, $abstrak, $id_tema, $connect);
					// 	    }
					// }
				?>		
<br>
<br>
		<div class="in">
			<label>Tambah Tema :</label>
			<input class="id" 
					   type="text" 
					   name="tambahtema"
					   value="<?php $n; ?>"
					   placeholder="Masukkan nama tema">
		</div>
		<div class="sub">
			<input class="submit" type="submit" name="tambahtema" value="Tambah" >
		</div>
<br>
<br>
		<div class="in">
			<label>Tambah Keyword :</label>
				<?php
							echo "<select name = tambahkeyword > Pilih Tema ";
								foreach ($idt_nt as $key => $value) 
								{
									echo "<option value=".$key.">".$value."</option>";
								}
							echo "</select>";
				?>
		</div>
		<div class="sub">
				<input class="submit" type="submit" name="tambahkeyword" value="Tambah" >
		</div>
		<div class="ab">
				<?php 
							foreach ($at as $key => $value) 
							{
								foreach ($value as $key1 => $value1) 
								{
									foreach ($value1 as $key2 => $value2) 
									{
										echo 
										"<input type=checkbox
					       						name=tema
					      						value=".$key.">".$value2.""; 
									}	
								}
							}
				?>
		</div>
				<?php
					
					// elseif (isset($_POST['tambahtema']))
					// {
					// 	$nama_t = $n;
					// 	//echo $n;

					// 		if(empty($nama_t))
					// 		{
					// 	    	echo '<script>alert("Nama tema belum diisi")</script>';
					// 	    }
					// 	    else 
					// 	    { 
					// 	    	tambahtema($nama_t, $connect);
					// 	    }
					// }
					// elseif (isset($_POST['tambahkeyword']))
					// {
					// 	$nama_tem = $n;
					// 	//echo $n;

					// 		if(empty($nama_tem))
					// 		{
					// 	    	echo '<script>alert("Nama tema belum diisi")</script>';
					// 	    }
					// 	    else 
					// 	    { 
					// 	    	//tambahtema($nama_tem, $connect);
					// 	    }
					// }
				
				?>	
	</form>
</body>
</html>