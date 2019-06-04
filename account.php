<?php require_once('db.php') ?>
<?php  

if(isset($_POST['add'])){
			$object = $_POST['obekt'];
			$type = $_POST['type'];
			$rasst = $_POST['rasst'];
			$date = $_POST['date'];

			$sql = mysqli_query($db, "INSERT INTO remont 
								VALUES ('', '$object', '$type', '$rasst', '$date')");	
			mysqli_close($db);
			header('Location: '.$_SERVER['REQUEST_URI']);
		}
 if(isset($_POST['edit'])){
			$object_edit = $_POST['obektt'];
			$type_edit = $_POST['type_edit'];
			$rasst_edit = $_POST['rasst_edit'];
			$date_edit = $_POST['date_edit'];
			$id_zap = $_POST['id_zap'];

			$sql = mysqli_query($db, "UPDATE `remont` SET `Объект`= '$object_edit',`Тип_ремонта`='$type_edit',`Расстояние (м)`='$rasst_edit',`Дата`='$date_edit' WHERE `id_записи` = '$id_zap' ");	
			mysqli_close($db);
			header('Location: '.$_SERVER['REQUEST_URI']);
		}

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

	<div class="container">
		<h2 style="float: right;" id="add">Здравствуйте <a href="#"><?php echo $_COOKIE['FIO']; ?></a><br> 
		<a id="exit" href="logout.php">Выйти</a></h2> <br><br>
		<a href="down.php"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#userModal">Сгенирировать график в Excel </button></a> <br>

<?php  
	$sql =  mysqli_query($db, "SELECT * FROM remont");
?>
			<table class="table">
					  <thead>
					    <tr>
					      <th scope="col">id_записи</th>
					      <th scope="col">Объект</th>
					      <th scope="col">Тип_ремонта</th>
					      <th scope="col">Расстояние (м)</th>
					      <th scope="col">Дата</th>
					    </tr>
					  </thead>
		  <tbody>
<?php  
while($data = mysqli_fetch_assoc($sql)){
?>
		    <tr>
		      <th scope="row"><?php echo $data['id_записи'] ?></th>
		      <td><?php echo $data['Объект'] ?></td>
		      <td><?php echo $data['Тип_ремонта'] ?></td>
		      <td><?php echo $data['Расстояние (м)'] ?></td>
		      <td><?php echo $data['Дата'] ?></td>
		    </tr>
<?php } ?>
		  </tbody>
	</table>





	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
	  Добавить
	</button>

	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">Добавить запись</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	       
			<form method="POST">
			  <div class="form-group">
			    <label for="exampleInputEmail1">Объект</label><br>
			    	<select name="obekt">
<?php 
	$objects = mysqli_query($db, 'SELECT * FROM objects');
	while ($name= mysqli_fetch_assoc($objects)){
?>
    			<option value="<?php echo $name['объект']; ?>"><? echo $name['объект']; ?></option>
<?php } ?>
    		</select>

			  </div>
			  <div class="form-group">
			    <label for="exampleInputPassword1">Тип Ремонта</label> <br>
			    <!-- <input type="text" name="type" class="form-control" id="exampleInputPassword1"> -->
			    <select name="type" id="">
			    	<option value="Ямочный ремонт">Ямочный ремонт</option>
			    	<option value="Ремонт гравийных участков дорог">Ремонт гравийных участков дорог</option>
			    	<option value="Ремоннт грунтовых автомобильных дорог">Ремоннт грунтовых автомобильных дорог</option>
			    	<option value="В рамках гарантийных обящательств">В рамках гарантийных обящательств</option>
			    	<option value="По муниципальному контракту">По муниципальному контракту</option>
			    </select>
			  </div>
			  <div class="form-group">
			    <label for="exampleInputPassword1">Расстояние</label>
			    <input type="text" name="rasst" class="form-control" id="exampleInputPassword1">
			  </div>
			  <div class="form-group">
			    <label for="exampleInputPassword1">Дата</label>
			    <input type="date" name="date" class="form-control" id="exampleInputPassword1">
			  </div>
			  <input name="add" type="submit" class="btn btn-primary" value="Добавить">
			</form>

	      </div>
	    </div>
	  </div>
	</div>

	
	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editModal">Изменить</button>

	<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">Редактировать запись</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	       
			<form method="POST">
			  <div class="form-group">
			    <label for="exampleInputEmail1">Объект</label><br>
			    <select name="obektt">
<?php 
	$objects_edt = mysqli_query($db, 'SELECT * FROM objects');
	while ($namee= mysqli_fetch_assoc($objects_edt)){
?>
    			<option value="<?php echo $namee['объект']; ?>"><? echo $namee['объект']; ?></option>
<?php } ?>
    		</select>
			  </div>
			  <div class="form-group">
			    <label for="exampleInputPassword1">Тип Ремонта</label> <br>
			    <!-- <input type="text" name="type" class="form-control" id="exampleInputPassword1"> -->
			    <select name="type_edit" id="">
			    	<option value="Ямочный ремонт">Ямочный ремонт</option>
			    	<option value="Ремонт гравийных участков дорог">Ремонт гравийных участков дорог</option>
			    	<option value="Ремоннт грунтовых автомобильных дорог">Ремоннт грунтовых автомобильных дорог</option>
			    	<option value="В рамках гарантийных обязательств">В рамках гарантийных обязательств</option>
			    	<option value="По муниципальному контракту">По муниципальному контракту</option>
			    </select>
			  </div>
			  <div class="form-group">
			    <label for="exampleInputPassword1">Расстояние</label>
			    <input type="text" name="rasst_edit" class="form-control" id="exampleInputPassword1">
			  </div>
			  <div class="form-group">
			    <label for="exampleInputPassword1">Дата</label>
			    <input type="date" name="date_edit" class="form-control" id="exampleInputPassword1">
			  </div>
			   <div class="form-group">
			    <label for="exampleInputEmail1">ID</label><br>
			    <select name="id_zap">
<?php 
	$zapiss = mysqli_query($db, 'SELECT * FROM remont');
	while ($z= mysqli_fetch_assoc($zapiss)){
?>
    			<option value="<?php echo $z['id_записи']; ?>"><? echo $z['id_записи']; ?></option>
<?php } ?>
    		</select>
			  </div>
			  <input name="edit" type="submit" class="btn btn-primary" value="Измениь">
			</form>

	      </div>
	    </div>
	  </div>
	</div>

	</div>
<script src="jquery.js"></script>
<script src="jquery.stackslider.js"></script>
<script src="jquery.slides.min.js"></script>
<script src="bootstrap/js/bootstrap.js"></script>
</body>
</html>