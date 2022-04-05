<?php include('baglan.php');?>
<?php 


if (isset($_POST['ekle'])) {
	


$model_marka=$_POST['model_marka'];
$model_isim=$_POST['model_isim'];
$model_motor=$_POST['model_motor'];
$model_yt=$_POST['model_yt'];
$model_yil=$_POST['model_yil'];
$model_yakit=$_POST['model_yakit'];

$sql="INSERT INTO modeller (model_marka,model_isim,model_motor,model_yt,model_yil,model_yakit) values (:model_marka,:model_isim,:model_motor,:model_yt,:model_yil,:model_yakit)";

$query=$dbh->prepare($sql);
$query->bindParam(':model_marka',$model_marka,PDO::PARAM_STR);
$query->bindParam(':model_isim',$model_isim,PDO::PARAM_STR);
$query->bindParam(':model_motor',$model_motor,PDO::PARAM_STR);
$query->bindParam(':model_yt',$model_yt,PDO::PARAM_STR);
$query->bindParam(':model_yil',$model_yil,PDO::PARAM_STR);
$query->bindParam(':model_yakit',$model_yakit,PDO::PARAM_STR);
$query->execute();
header('location:ekle.php');

}


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

	<div class="modelekle">
		<form action="" method="POST">
			<select name="model_marka">
				<option>Marka Giriniz</option>
				<option value="audi">Audi</option>
				<option value="mercedes">Mercedes</option>
				<option value="renault">Renault</option>
				<option value="volkswagen">Volkswagen</option>
				<option value="toyota">Toyota</option>
				<option value="hyundai">Hyundai</option>
				<option value="fiat">Fiat</option>
				<option value="bmw">BMW</option>
			</select>

			<input type="text" name="model_isim" placeholder="Model İsmi Giriniz">

			<select name="model_motor">
				<option value="1.0">1.0</option>
				<option value="1.1">1.1</option>
				<option value="1.2">1.2</option>
				<option value="1.3">1.3</option>
				<option value="1.4">1.4</option>
				<option value="1.5">1.5</option>
				<option value="1.6">1.6</option>
				<option value="1.7">1.7</option>
				<option value="1.8">1.8</option>
				<option value="1.9">1.9</option>
				<option value="2.0">2.0</option>
				<option value="2.1">2.1</option>
				<option value="2.2">2.2</option>
				<option value="2.4">2.4</option>
				<option value="2.5">2.5</option>

			</select>

			<input type="text" name="model_yt" placeholder="100 Kilometredeki Yakıt Tüketimi">

			<input type="number" name="model_yil" placeholder="Model Yılı">

			<label class="yakit">
				Benzin:<input type="radio" name="model_yakit" value="benzin">
				Dizel:<input type="radio" name="model_yakit" value="dizel">
				LPG:<input type="radio" name="model_yakit" value="lpg">
				Elektirik:<input type="radio" name="model_yakit" value="elektrik">

			</label>

			<input class="buton" type="submit" name="ekle" value="Model Ekle">
		</form>
		
	</div>

</body>
</html>