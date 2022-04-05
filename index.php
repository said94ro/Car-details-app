<?php session_start(); ?>


<?php if (isset($_SESSION['giris'])) { ?>
	
<?php

include('baglan.php');

$sql="SELECT * FROM modeller";
$query=$dbh->prepare($sql);
$query->execute();
$sonuclar=$query->fetchAll(PDO::FETCH_OBJ);
$aracsayisi=$query->rowCount();

$toplam=0;
foreach ($sonuclar as $sonuc) {
	$yt=$sonuc->model_yt;
	$toplam=$toplam+$yt;
}

$ortyt=$toplam/$aracsayisi;




?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<?php include('menu.php'); ?>

	<div class="dashboardbar">

		<div class="barkutu">

			<div class="toplamarac">
				<h2>Toplam Araç Sayısı</h2>
				<h1><?php echo $aracsayisi; ?></h1>

			</div>

		</div>


		<div class="barkutu">

			<div class="yakittuketim">
				<h2>Ort. Yakıt Tüketimi</h2>
				<h1><?php echo $ortyt; ?> L/100km</h1>

			</div>

		</div>
		

	</div>


</body>
</html>

<?php }else{
	header("location:giris.php");
}

 ?>