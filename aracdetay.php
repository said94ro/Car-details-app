<?php include('baglan.php');?>
<?php 

if (isset($_POST['sil'])) {
	$model_id=$_POST['model_id'];
	$sql3="DELETE FROM modeller WHERE model_id=:model_id";
	$query3=$dbh->prepare($sql3);
	$query3->bindParam(':model_id',$model_id,PDO::PARAM_STR);
	$query3->execute();
	$sayi=$query3->rowCount();
	if ($sayi>0) {
		header("location:araclar.php");
	}

}


if (isset($_POST['duzenle'])) {

	
	$model_marka=$_POST['model_marka'];
	$model_isim=$_POST['model_isim'];
	$model_motor=$_POST['model_motor'];
	$model_yt=$_POST['model_yt'];
	$model_yil=$_POST['model_yil'];
	$model_yakit=$_POST['model_yakit'];
	$model_id=$_POST['model_id'];

	
	$sql2="UPDATE modeller SET model_marka=:model_marka,model_isim=:model_isim,model_motor=:model_motor,model_yt=:model_yt,model_yil=:model_yil,model_yakit=:model_yakit  WHERE model_id=:model_id";

	$query2=$dbh->prepare($sql2);
	$query2->bindParam(':model_marka',$model_marka,PDO::PARAM_STR);
	$query2->bindParam(':model_isim',$model_isim,PDO::PARAM_STR);
	$query2->bindParam(':model_motor',$model_motor,PDO::PARAM_STR);
	$query2->bindParam(':model_yt',$model_yt,PDO::PARAM_STR);
	$query2->bindParam(':model_yil',$model_yil,PDO::PARAM_STR);
	$query2->bindParam(':model_yakit',$model_yakit,PDO::PARAM_STR);
	$query2->bindParam(':model_id',$model_id,PDO::PARAM_STR);
	$query2->execute();

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
		<form action="" method="POST">
			<input type="hidden" name="model_id" value="<?php echo $sonuclar->model_id ?>">
			<p>Marka</p>
			<select name="model_marka">
				<option value="<?php echo $sonuclar->model_marka ?>" ><?php echo $sonuclar->model_marka ?></option>
				<option value="audi">Audi</option>
				<option value="mercedes">Mercedes</option>
				<option value="renault">Renault</option>
				<option value="volkswagen">Volkswagen</option>
				<option value="toyota">Toyota</option>
				<option value="hyundai">Hyundai</option>
				<option value="fiat">Fiat</option>
				<option value="bmw">BMW</option>
			</select>
			<p>Model</p>
			<input type="text" name="model_isim" value="<?php echo $sonuclar->model_isim ?>" placeholder="Model İsmi Giriniz">

			<p>Motor Hacmi</p>
			<select name="model_motor">
				<option value="<?php echo $sonuclar->model_motor ?>"><?php echo $sonuclar->model_motor ?></option>
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
			<p>Yakıt Tüketimi</p>
			<input type="text" name="model_yt" value="<?php echo $sonuclar->model_yt ?>" placeholder="100 Kilometredeki Yakıt Tüketimi">

			<p>Yıl</p>
			<input type="number" name="model_yil" value="<?php echo $sonuclar->model_yil ?>" placeholder="Model Yılı">

			<label class="yakit">
				<?php echo $sonuclar->model_yakit ?>:<input type="radio" name="model_yakit" value="<?php echo $sonuclar->model_yakit ?>" checked>
				Benzin:<input type="radio" name="model_yakit" value="benzin">
				Dizel:<input type="radio" name="model_yakit" value="dizel">
				LPG:<input type="radio" name="model_yakit" value="lpg">
				Elektirik:<input type="radio" name="model_yakit" value="elektrik">

			</label>
			<br><br>
			<input class="buton" type="submit" name="duzenle" value="Düzenle">
		</form>

		<form action="" method="POST" style="margin-top:5px">
			<input type="hidden" name="model_id" value="<?php echo $sonuclar->model_id ?>">
			<input type="submit" name="sil" class="silbuton" style="height:45px;" value="Modeli Sil"> 
		</form>
		
		
		
	</div>

</body>
</html>