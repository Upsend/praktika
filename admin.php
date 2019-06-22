<!-- <a href="logout.php">Выйти</a> -->


<?php require_once('db.php') ?>
<?php  
	if(isset($_GET['del'])) {
		$idauto = $_GET['del']; 
		mysqli_query($db, "DELETE FROM autos WHERE id_auto = $idauto");
	}
	if(isset($_GET['del'])) {
		$iduser = $_GET['del']; 
		mysqli_query($db, "DELETE FROM user WHERE user_id = $iduser");
	}
	if(isset($_GET['del'])) {
		$idobj = $_GET['del']; 
		mysqli_query($db, "DELETE FROM objects WHERE id_оъекта = $idobj");
	}
	if(isset($_GET['del'])) {
		$iddriver = $_GET['del']; 
		mysqli_query($db, "DELETE FROM drivers WHERE id = $iddriver");
	}


	$data_user = mysqli_query($db, "SELECT * FROM user");
	$data_auto =  mysqli_query($db, "SELECT * FROM autos");
	$data_drivers =  mysqli_query($db, "SELECT * FROM drivers");
	$obj =  mysqli_query($db, "SELECT * FROM objects");
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

	<h2 style="float: right;" id="add">Привет <a href="admin.php"><?php echo $_COOKIE['username']; ?></a><br> <a id="exit" href="logout.php">Выйти</a></h2>
    <a href="putevka.php" ><input type="submit" name="use" class="btn btn-primary" value="Выписать Путевой лист"> </a> 
	
	<br> <br> <br>


	<div class="nav-bar">
		
		<ul>
			<li><a href="#" id="auto">Справочник "Автомобили"</a></li>
			<li><a href="#" id="sprav">Справочник "Водители"</a></li>
			<li><a href="#" id="user">Пользователи</a></li>
			<li><a href="#" id="obj">Объекты</a></li>
		</ul>

	</div>
























































<div class="user">
		<p style="float: right; cursor: pointer;" id="close3">&times;</p> 
	<table class="table">
		  <thead>
		    <tr>
		      <th scope="col">id</th>
		      <th scope="col">ФИО</th>
		      <th scope="col">Отдел</th>
		      <th scope="col">Должность</th>
		      <th scope="col">Имя пользователя</th>
		      <th scope="col">Пароль</th>
		    </tr>
		  </thead>
		  <tbody>
<?php  
while($row = mysqli_fetch_assoc($data_user)){
?>
		    <tr>
		      <th scope="row"><?php echo $row['user_id'] ?></th>
		      <td><?php echo $row['FIO'] ?></td>
		      <td><?php echo $row['Otdel'] ?></td>
		      <td><?php echo $row['Doljnost'] ?></td>
		      <td><?php echo $row['username'] ?></td>
		      <td><?php echo $row['password'] ?></td>
		      <th><a href="?del=<?php echo $row['user_id'] ?>">X</a></th>
		    </tr>
<?php } ?>
		  </tbody>
	</table>

<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#userModal">
  Добавить пользователя
</button>
<form method="POST">
<div class="modal fade" id="userModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Добавить пользователя</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
    		<label for="exampleInputPassword1">ФИО</label>
    		<input type="text" name="fioo" class="form-control" id="exampleInputPassword1" >
	   </div>
	   <div class="form-group">
    		<label for="exampleInputPassword1">Должность</label>
    		<input type="text" name="doljn"  class="form-control" id="exampleInputPassword1">
	   </div>
	   <div class="form-group">
    		<label for="exampleInputPassword1"> Отдел</label>
    		<select name="otdell">
    			<option value="Дорожное строительство">Дорожное строительство</option>
    			<option value="Мостовое строительство">Мостовое строительство</option>
    		</select>
	   </div>
	   <div class="form-group">
    		<label for="exampleInputPassword1">Имя пользователя</label>
    		<input type="text" name="usrname" class="form-control" id="exampleInputPassword1" ">
	   </div>
	   <div class="form-group">
    		<label for="exampleInputPassword1">Пароль</label>
    		<input type="password" name="pasw" class="form-control" id="exampleInputPassword1" >
	   </div>
	   <input type="submit" class="btn btn-primary" name="adduser" value="Добавить">
      </div>
    </div>
  </div>
</div>

</div>
</form>
 <?php 

	if (isset($_POST['adduser'])){

		$fioo = $_POST['fioo'];
		$otdell = $_POST['otdell'];
		$doljn = $_POST['doljn'];
		$usrname = $_POST['usrname'];
		$pasw = $_POST['pasw'];

		mysqli_query($db, "INSERT INTO user VALUES ('','$fioo','$otdell','$doljn','$usrname','$pasw')");
	}

 ?>

















































<div class="autos">
	<p style="float: right; cursor: pointer;" id="close4">&times;</p> 
	<table class="table">
		  <thead>
		    <tr>
		      <th scope="col">id</th>
		      <th scope="col">Гаражный номер</th>
		      <th scope="col">Гос номер</th>
		      <th scope="col">Автомобиль</th>
		      
		    </tr>
		  </thead>
		  <tbody>
<?php  
while($auto = mysqli_fetch_assoc($data_auto)){
?>
		    <tr>
		      <th scope="row"><?php echo $auto['id_auto'] ?></th>
		      <td><?php echo $auto['Гаражный номер'] ?></td>
		      <td><?php echo $auto['ГосНомер'] ?></td>
		      <td><?php echo $auto['Автомобиль'] ?></td>
		      <th><a href="?del=<?php echo $auto['id_auto'] ?>">X</a></th>
		    </tr>
<?php } ?>
		  </tbody>
	</table>

	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#avtoModal">
 	 Добавить 
	</button>

<div class="modal fade" id="avtoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Добавить автомобиль</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST">
	      <div class="modal-body">
	        <div class="form-group">
	    		<label for="exampleInputPassword1">Гаражный номер</label>
	    		<input type="text" class="form-control" name="garnum" id="exampleInputPassword1" ">
		   </div>
		   <div class="form-group">
	    		<label for="exampleInputPassword1">ГосНомер</label>
	    		<input type="text" class="form-control" name="gosnum" id="exampleInputPassword1" >
		   </div>
		   <div class="form-group">
	    		<label for="exampleInputPassword1">Автомобиль</label>
	    		<input type="text" class="form-control" name="car" id="exampleInputPassword1" >
		   </div>
		   <input type="submit"  name = "addCar" class="btn btn-primary" value="Добавить">
	   </form>
      </div>
    </div>
  </div>
</div>

<?php  
	if (isset($_POST['addCar'])) {
		$gnum = $_POST['garnum'];
		$gosnum = $_POST['gosnum'];
		$car = $_POST['car'];
		mysqli_query($db, "INSERT INTO autos VALUES ('', '$gnum', '$gosnum', '$car')");
		mysqli_close($db);
	}

?>
	<button type="submit" class="btn btn-primary"  data-toggle="modal" data-target="#avtoModal_edit">
 	 Редактировать 
	</button>

<?php  
	$qauto = mysqli_query($db, "SELECT * FROM autos");
	$qauto_id = mysqli_query($db, "SELECT * FROM autos");
?>
<div class="modal fade" id="avtoModal_edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Редактировать автомобиль</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST">
      <div class="modal-body">
        <div class="form-group">
    		<label for="exampleInputPassword1">Гаражный номер</label>
    		<input type="text" name="garnom" class="form-control" id="exampleInputPassword1" >
	   </div>
	   <div class="form-group">
    		<label for="exampleInputPassword1">ГосНомер</label>
    		<input type="text" name="gosnom" class="form-control" id="exampleInputPassword1" >
	   </div>
	   <div class="form-group">
    		<label for="exampleInputPassword1">Автомобиль</label>
    		<input type="text" name="carname" class="form-control" >
	    </div>
	    <div class="form-group">
    		<label for="exampleInputPassword1">ID</label>
    		<select name="idcar">
<?php 
	$carid = mysqli_query($db, 'SELECT * FROM autos');
	while ($j= mysqli_fetch_assoc($carid)){
?>
    			<option value="<?php echo $j['id_auto']; ?>"><? echo $j['id_auto']; ?></option>
<?php } ?>
    		</select>
	   </div>
	    <input type="submit" name="edt_auto"  class="btn btn-primary" value="Изменить">
	</div>
  </form>
    </div>
  </div>
</div>

</div>
 <?php if (isset($_POST['edt_auto'])) {
	   		$auto =  $_POST['carname'];
	   		$id = $_POST['idcar'];
	   		$garnom = $_POST['garnom'];
	   		$gosnom = $_POST['gosnom'];
	   
	   		mysqli_query($db, "UPDATE `autos` SET `Гаражный номер`='$garnom', `ГосНомер`='$gosnom', `Автомобиль`='$auto' WHERE `id_auto`= '$id' ");
	   } 
 ?>




































<div class="objectss">
	<p style="float: right; cursor: pointer;" id="close2">&times;</p> 
	<table class="table">
		  <thead>
		    <tr>
		      <th scope="col">id</th>
		      <th scope="col">Объект</th>
		     </tr>
		  </thead>
		  <tbody>
<?php  
while($object = mysqli_fetch_assoc($obj)){
?>
	    <tr>
	      <th scope="row"><?php echo $object['id_оъекта'] ?></th>
	      <td><?php echo $object['объект'] ?></td>
	      <th><a href="?del=<?php echo $object['id_оъекта'] ?>">X</a></th>
	    </tr>
<?php } ?>
		  </tbody>
	</table>

	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#objModal">
 	 Добавить 
	</button>

<div class="modal fade" id="objModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
  	<form method="POST">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Добавить Объект</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
    		<label for="exampleInputPassword1">Объект</label>
    		<input type="text" name="obj" class="form-control" id="exampleInputPassword1" ">
	   </div>
	   <input type="submit" name="addobj" class="btn btn-primary" value="Добавить">
      </div>
    </div>
    </form>
  </div>
</div>

<?php  
	if (isset($_POST['addobj'])) {
		$obj = $_POST['obj'];
		mysqli_query($db, " INSERT INTO objects VALUES ( '','$obj' ) ");
		mysqli_close($db);
	}

?>

	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#objModal_edit">
 	 Редактировать объект
	</button>

<div class="modal fade" id="objModal_edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
  	<form method="POST">
    <div class="modal-content"> <!-- ------- -->
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Редактировать объект</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
    		<label for="exampleInputPassword1">Объект</label>
    		<input type="text" name="objct" class="form-control" id="exampleInputPassword1" >
	   </div>
	   
	   <div class="form-group">
    		<label for="exampleInputPassword1">id_оъекта</label>
    		<select name="idobj">
<?php 
	$objid = mysqli_query($db, 'SELECT * FROM objects');
	while ($ob= mysqli_fetch_assoc($objid)){
?>
    			<option value="<?php echo $ob['id_оъекта']; ?>"><? echo $ob['id_оъекта']; ?></option>
<?php } ?>
    		</select>
	   </div>
	   </div>
	     
	   <input type="submit" name="obj_edt" class="btn btn-primary" value="Изменить">
      </div><!--  ------------ -->
  	</form>
    </div>
  </div>
</div>

</div>

<?php  
if (isset($_POST['obj_edt'])) {
		$objct = $_POST['objct'];
		$idobj = $_POST['idobj'];
		mysqli_query($db, " UPDATE `objects` SET `объект`= '$objct' WHERE `id_оъекта` = '$idobj' ");
		mysqli_close($db);
	}
?>










































<div class="drivers">
		<p style="float: right; cursor: pointer;" id="close1">&times;</p> 
	<table class="table">
		  <thead>
		    <tr>
		      <th scope="col">id</th>
		      <th scope="col">Табельный номер</th>
		      <th scope="col">ФИО</th>
		      <th scope="col">Водительское</th>
		      <th scope="col">Открытые категории</th>
		      <th scope="col">Закрепленный автомобиль</th>
		    </tr>
		  </thead>
		  <tbody>
<?php  
while($drivers = mysqli_fetch_assoc($data_drivers)){
?>
		    <tr>
		      <th scope="row"><?php echo $drivers['id'] ?></th>
		      <td><?php echo $drivers['Табельный номер'] ?></td>
		      <td><?php echo $drivers['ФИО'] ?></td>
		      <td><?php echo $drivers['Водительское удосоверение'] ?></td>
		      <td><?php echo $drivers['Открытые категории'] ?></td>
		      <td><?php echo $drivers['id_auto'] ?></td>
		      <th><a href="?del=<?php echo $drivers['id'] ?>">X</a></th>
		    </tr>
<?php } ?>
		  </tbody>
	</table>
	
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#driverModal">
 	 Добавить 
	</button>

<div class="modal fade" id="driverModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Добавить водителя</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST">
      <div class="modal-body">
        <div class="form-group">
    		<label for="exampleInputPassword1">Табельный номер</label>
    		<input type="text" name="d_t_nom" class="form-control" id="exampleInputPassword1" >
	   </div>
	   <div class="form-group">
    		<label for="exampleInputPassword1">ФИО</label>
    		<input type="text" name="d_fio" class="form-control" id="exampleInputPassword1" >
	   </div>
	   <div class="form-group">
    		<label for="exampleInputPassword1">Водительское удостоверение</label>
    		<input type="text" name="d_prava" class="form-control" id="exampleInputPassword1" >
	   </div>
	   <div class="form-group">
    		<label for="exampleInputPassword1">Открытые категории</label>
    		<input type="text" name="d_kat" class="form-control" id="exampleInputPassword1" >
	   </div>
	   <div class="form-group">
    		<label for="exampleInputPassword1">Закрепленный автомобиль</label>
    		<select name="d_avto">
<?php 
	$avtomobilid = mysqli_query($db, 'SELECT * FROM autos');
	while ($aid= mysqli_fetch_assoc($avtomobilid)){
?>
    			<option value="<?php echo $aid['id_auto']; ?>"><? echo $aid['Автомобиль']; ?></option>
<?php } ?>
    		</select>
	   </div>
	   <input type="submit" name="add_driver" class="btn btn-primary" value="Добавить">
      </div>
  	</form>
    </div>
  </div>
</div>

<?php 
if (isset($_POST['add_driver'])) {
		$d_t_nom = $_POST['d_t_nom'];
		$d_fio = $_POST['d_fio'];
		$d_prava = $_POST['d_prava'];
		$d_kat = $_POST['d_kat'];
		$d_avto = $_POST['d_avto'];

		mysqli_query($db, "INSERT INTO `drivers` VALUES ('','$d_t_nom','$d_fio','$d_prava','$d_kat','$d_avto')");
		mysqli_close($db);
	}

?>

<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#driverModal_edit">
 	 Редактировать 
	</button>

<div class="modal fade" id="driverModal_edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Редактировать запись</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST">
      <div class="modal-body">   <!-- --- -->
        <div class="form-group">
    		<label for="exampleInputPassword1">Табельный номер</label>
    		<input type="text" name="dtnom" class="form-control" id="exampleInputPassword1" >
	   </div>
	   <div class="form-group">
    		<label for="exampleInputPassword1">ФИО</label>
    		<input type="text" name="dfio" class="form-control" id="exampleInputPassword1" >
	   </div>
	   <div class="form-group">
    		<label for="exampleInputPassword1">Водительское удостоверение</label>
    		<input type="text" name="dprava" class="form-control" id="exampleInputPassword1" >
	   </div>
	   <div class="form-group">
    		<label for="exampleInputPassword1">Открытые категории</label>
    		<input type="text" name="dkat" class="form-control" id="exampleInputPassword1" >
	   </div>
	   <div class="form-group">
    		<label for="exampleInputPassword1">Закрепленный автомобиль</label>
    		<select name="davto">
<?php 
	$drid = mysqli_query($db, 'SELECT * FROM autos');
	while ($dr= mysqli_fetch_assoc($drid)){
?>
    			<option value="<?php echo $dr['id_auto']; ?>"><? echo $dr['Автомобиль']; ?></option>
<?php } ?>
    		</select>
	   </div>  
	   <div class="form-group">
    		<label for="exampleInputPassword1">ID Записи</label>
    		<select name="id_zapis">
<?php 
	$ord_id = mysqli_query($db, 'SELECT * FROM drivers');
	while ($ord= mysqli_fetch_assoc($ord_id)){
?>
    			<option value="<?php echo $ord['id']; ?>"><? echo $ord['id']; ?></option>
<?php } ?>
    		</select>
	   </div>
	   <input type="submit" name="edt_driver" class="btn btn-primary" value="Изменить">
      </div>  <!-- ---- -->
  </form>
    </div>
  </div>
</div>
	
<?php  
	
	if (isset($_POST['edt_driver'])) {
		$dtnom = $_POST['dtnom'];
		$dfio = $_POST['dfio'];
		$dprava = $_POST['dprava'];
		$dkat = $_POST['dkat'];
		$davto = $_POST['davto'];
		$id_zapis = $_POST['id_zapis'];

		mysqli_query($db, "UPDATE `drivers` SET `Табельный номер`='$dtnom',`ФИО`='$dfio',`Водительское удосоверение`='$dprava',`Открытые категории`='$dkat',`id_auto`='$davto' WHERE `id` = '$id_zapis' ");
		mysqli_close($db);
	}

?>







</div>


<script src="jquery.js"></script>
<script src="jquery.stackslider.js"></script>
<script src="jquery.slides.min.js"></script>
<script src="bootstrap/js/bootstrap.js"></script>
<script src="script.js"></script>
</body>
</html>
























