<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="bootstrap/css/bootstrap.css">
	<script src="js.js" defer></script>
</head>
<body>
<h2 style="float: right; margin-top: -100px;" id="add">Здравствуйте, <a href="account.php"><?php echo $_COOKIE['FIO']; ?></a></h2>
<h1 id="vhod">Сделать заказ</h1>
	<div id="order">
		<form method="POST" action="order.php">
		    <label for="exampleInputEmail1">ФИО</label>
		    <input type="text" name="fio" value="<? echo $_COOKIE['FIO']; ?>"  class="form-control" id="username" aria-describedby="emailHelp" placeholder="Введите имя пользователя">  		  
		    <label for="exampleInputEmail1">Отдел</label>
		    <input type="text" name="Otdel" class="form-control"  value="<? echo $_COOKIE['Otdel'];?>" id="username" aria-describedby="emailHelp" placeholder="Введите имя пользователя">
		    <label for="exampleInputEmail1">Должность</label>
		    <input type="text" name="doljnost" class="form-control"  value="<? echo $_COOKIE['Doljnost']; ?>" id="username" aria-describedby="emailHelp" placeholder="Введите имя пользователя">
		    <label for="exampleInputEmail1">Дата заказа</label>
		    <input type="date" name="Dateoday" class="form-control" id="username" aria-describedby="emailHelp" placeholder="Введите имя пользователя">
		    <label for="exampleInputEmail1">Требуемая дата завершения заказа</label>
		    <input type="date" name="date_end" class="form-control" id="username" aria-describedby="emailHelp" placeholder="Введите имя пользователя">
		    <label for="exampleInputEmail1">Предмет заказа</label>
		    <textarea name="description" id="" cols="48" rows="6"></textarea>
  		    <input type="submit" name="go" id="go" class="btn btn-primary" value="Отправить">
		</form>
	</div>

<?php  
$con = mysqli_connect('project', 'root', '', 'drsu');

		if(isset($_POST['go'])){
			 $fio = $_POST['fio'];
			 $otdel = $_POST['Otdel'];
			 $doljnost = $_POST['doljnost'];
			 $date = $_POST['Dateoday'];
			 $date_end = $_POST['date_end'];
			 $description = $_POST['description'];

			 $sql =  mysqli_query($con, "INSERT INTO `orrder`(`order_id`, `FIO`, `Otdel`, `Doljnost`, `Datetoday`, `date_end`, `Description`, `Status`) VALUES ('','$fio','$otdel','$doljnost','$date','$date_end','$description', 'не выполено')");		
		}
mysqli_close($con);
?>

</body>
</html>

