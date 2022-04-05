<?php include('baglan.php');

$sql="SELECT * FROM modeller";
$query=$dbh->prepare($sql);
$query->execute();
$sonuclar=$query->fetchAll(PDO::FETCH_OBJ);
$aracsayisi=$query->rowCount();




?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="icon/css/all.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Noto+Sans&display=swap" rel="stylesheet">
</head>
<body>
	<?php include('menu.php'); ?>


	<div class="aracliste">
		<table>
			<tr>
				<th>Marka</th>
				<th>Model</th>
				<th>Motor</th>
				<th>Yakıt Tüketimi</th>
				<th>Yıl</th>
				<th>Yakıt Tipi</th>
				<th>Araç Detay</th>
				<th>Tüketim Hesapla</th>
			</tr>
			<?php foreach($sonuclar as $sonuc):  ?>
			<tr>

				
				<td><?php echo $sonuc->model_marka ?></td>
				<td><?php echo $sonuc->model_isim ?></td>
				<td><?php echo $sonuc->model_motor ?></td>
				<td><?php echo $sonuc->model_yt ?></td>
				<td><?php echo $sonuc->model_yil ?></td>
				<td><?php echo $sonuc->model_yakit ?></td>
				<td><a href="aracdetay.php?model_id=<?php echo $sonuc->model_id ?>"><i class="fas fa-edit"></i></a></td>

				<td><a href="tuketim.php?model_id=<?php echo $sonuc->model_id ?>"><i class="fas fa-calculator"></i></a></td>
				
			</tr>
			<?php endforeach;  ?>

		</table>
		
	</div>


</body>
</html>