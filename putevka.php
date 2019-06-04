<?php require_once('db.php');
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


<?php 
require_once('vendor/autoload.php'); 

	if (isset($_POST['poisk'])){
		$fio = $_POST['fio'];
		$sql = mysqli_query($db, "SELECT * FROM drivers where ФИО = '$fio' ");
		$res = mysqli_fetch_assoc($sql);
		$id_auto = $res['id_auto'];
		$aut = mysqli_query($db, "SELECT * FROM autos where id_auto = '$id_auto' ");
		$aures = mysqli_fetch_assoc($aut);
	}

	$date = $_POST["dateoday"];
	$auto = $_POST["auto"];
	$nomera = $_POST["nomera"];
	$imya = $_POST["imya"];
	$prava = $_POST["prava"];
	$klass = $_POST["klass"];
	$garage_nom = $_POST["garage_nom"];
	$tab_nom = $_POST["tab_nom"];

	if (isset($_POST['go'])){
		$_doc = new \PhpOffice\PhpWord\TemplateProcessor('templates/template1.docx');
		$_doc->setValue('dateoday', $date); 
		$_doc->setValue('auto', $auto); 
		$_doc->setValue('nomera', $nomera); 
		$_doc->setValue('imya', $imya); 
		$_doc->setValue('prava', $prava); 
		$_doc->setValue('klass', $klass); 
		$_doc->setValue('garage_nom', $garage_nom); 
		$_doc->setValue('tab_nom', $tab_nom); 
		$_doc->saveAs('PuteoyList'.uniqid().'.docx');

		$insert = mysqli_query($db, "INSERT INTO putevki VALUES ('','$imya','$prava','$klass','$tab_nom','$nomera','$garage_nom','$auto','$date')");

	}
 ?>
	<div class="putevka" id="ramka">
		
		<form method="POST">
				<select class="custom-select" id="inputGroupSelect01" name="fio">
					<option selected disabled="" >Выберете водителя ...</option>
<?php 
	$voditels = mysqli_query($db, 'SELECT * FROM drivers');
	while ($driver= mysqli_fetch_assoc($voditels)){
?>
    				<option value="<?php echo $driver['ФИО']; ?>"><? echo $driver['ФИО']; ?></option>

<?php } ?>
    		</select><br>
			<input type="submit" name="poisk" id="go" class="btn btn-primary" value="Найти">
		</form>


		<h2 id="vhod">Путевой лист</h2>
		<form  method="POST">
			<label for="exampleInputEmail1">ФИО</label>
		    <input type="text" name="imya" class="form-control" id="username"   value=<?php echo $res['ФИО']; ?> > 	  
		    <label for="exampleInputEmail1">Водительское удостоверения</label>
		    <input type="text" name="prava" class="form-control" id="username"   aria-describedby="emailHelp" value=<?php echo $res['Водительское удосоверение']; ?>>
		    <label for="exampleInputEmail1">Категории</label>
		    <input type="text" name="klass" class="form-control"   aria-describedby="emailHelp" value=<?php echo $res['Открытые категории']; ?> >
		    <label for="exampleInputEmail1">Табельный номер</label>
		    <input type="text" name="tab_nom" class="form-control"   aria-describedby="emailHelp" value=<?php echo $res['Табельный номер']; ?> >
		    <label for="exampleInputEmail1">Гос.номер автомобиля</label>
		    <input type="text" name="nomera" class="form-control"   aria-describedby="emailHelp" value=<?php echo $aures['ГосНомер']; ?> >
		    <label for="exampleInputEmail1">Гаражный номер автомобиля</label>
		    <input type="text" name="garage_nom" class="form-control"   aria-describedby="emailHelp" value=<?php echo $aures['Гаражный номер'];?> >
		    <label for="exampleInputEmail1">Марка Автомобиля</label>
		    <input type="text" name="auto" class="form-control" aria-describedby="emailHelp" value=<?php echo $aures['Автомобиль']; ?> >
			<label for="exampleInputEmail1">Дата</label>
		    <input type="date" name="dateoday" class="form-control" id="username" aria-describedby="emailHelp"> <br>
  		    <input type="submit" name="go" id="go" class="btn btn-primary" value="Отправить">
		</form>
	</div>
</body>
</html>



