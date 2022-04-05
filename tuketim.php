<?php include('baglan.php');?>
<?php 




if (isset($_POST['hesapla'])) {
	$km=$_POST['km'];
	$yt=$_POST['yt'];
	$fiyat=8;
	$masraf=$km/100*$yt*$fiyat;
}


$model_id=$_GET['model_id'];

$sql="SELECT * FROM modeller WHERE model_id=:model_id";
$query=$dbh->prepare($sql);
$query->bindValue(':model_id',$model_id);
$query->execute();
$sonuclar=$query->fetch(PDO::FETCH_OBJ);


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

	



	<div class="modelekle" style="margin-top:100px">
		<h2><?php echo $sonuclar->model_marka ?> <?php echo $sonuclar->model_isim ?> Yakıt Tüketimi</h2>
		<form action="" method="POST">
			
			
			<h3><?php echo $sonuclar->model_yt ?>  L/100km YakıtTüketimi</h3>

			<input type="hidden" name="yt" value="<?php echo $sonuclar->model_yt ?>">

			<input type="number" name="km" placeholder="Katetmek İstediğiniz KM'yi Giriniz">

		

			
			<br><br>
			<input class="buton" type="submit" name="hesapla" value="Hesapla">
		</form>

		<h2>
			
			<?php 

				if (isset($_POST['hesapla'])) {
					
					echo "Toplam Yakıt Masrafı $masraf ₺";
				}

			 ?>


		</h2>

		
		
		
		
	</div>

</body>
</html>