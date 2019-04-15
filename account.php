<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="bootstrap/css/bootstrap.css">
</head>
<body><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="bootstrap/css/bootstrap.css">
</head>
<body>

	<div class="container">
		<div class="row">
			<div class="header">
				<a href="logout.php" style="float: right;">Выход</a>
				<div class="img"><h2 style="text-align: center; padding-top: 120px;">ФОТО</h2></div>
				<div class="desc">
					<h3><?php echo $_COOKIE['FIO']; ?></h3>
					<h5><?php echo $_COOKIE['Doljnost']; ?></h5>
					<h5><?php echo $_COOKIE['Otdel']; ?></h5>
				</div>
				
			</div>
		</div>
		<div class="body">
			<ul>
				<li><a href="order.php">Сделать зявку</a></li>
				<li><a href="#">Что-то еще ...</a></li>
				<li><a href="#">Что-то еще ...</a></li>
				<li><a href="#">История активности</a></li>
			</ul>
		</div>
	</div>

</body>
</html>