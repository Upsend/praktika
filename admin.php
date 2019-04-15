<!-- <a href="logout.php">Выйти</a> -->


<?php require_once('db.php') ?>
<?php  
	$data = mysqli_query($db, "	SELECT * FROM orrder");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="bootstrap/css/bootstrap.css">
</head>
<body>

	<h2 style="float: right;" id="add">Привет <a href="#"><?php echo $_COOKIE['username']; ?></a><br> <a id="exit" href="logout.php">Выйти</a></h2>
    <a href="putevka.php" ><input type="submit" name="use" class="btn btn-primary" value="Выписать Путевой лист"> </a> 
	<table class="table">
		  <thead>
		    <tr>
		      <th scope="col">id</th>
		      <th scope="col">ФИО</th>
		      <th scope="col">Отдел</th>
		      <th scope="col">Должность</th>
		      <th scope="col">Даты заполения</th>
		      <th scope="col">Даты Выполнения</th>
		      <th scope="col">Описание</th>
		      <th scope="col">Статус</th>
		      <th scope="col"></th>
		    </tr>
		  </thead>
		  <tbody>
<?php  
while($row = mysqli_fetch_assoc($data)){
?>
		    <tr>
		      <th scope="row"><?php echo $row['order_id'] ?></th>
		      <td><?php echo $row['FIO'] ?></td>
		      <td><?php echo $row['Otdel'] ?></td>
		      <td><?php echo $row['Doljnost'] ?></td>
		      <td><?php echo $row['Datetoday'] ?></td>
		      <td><?php echo $row['date_end'] ?></td>
		      <td><?php echo $row['Description'] ?></td>
		      <td><?php echo $row['Status'] ?></td>
		      <!-- <td><input type="submit" name="use" class="btn btn-primary" value="Выполнить"> </td> -->
		    </tr>
<?php } ?>
		  </tbody>
	</table>

</body>
</html>

