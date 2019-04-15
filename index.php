<?php require_once('db.php') ?>
<?php  
	if(!isset($_COOKIE['user_id'])){
		if(isset($_POST['submit'])){
			$user_username = $_POST['username'];
			$user_password = $_POST['password'];
			
			if (!empty($user_username) && !empty($user_password)) {
				$data = mysqli_query($db, "SELECT * FROM user WHERE username = '$user_username' AND password = '$user_password'");
				if (mysqli_num_rows($data) == 1) {
					$row = mysqli_fetch_assoc($data);
					setcookie('user_id', $row['user_id'], time() + (60*60*24*30));
					setcookie('username', $row['username'], time() + (60*60*24*30));						
					setcookie('FIO', $row['FIO'], time() + (60*60*24*30));						
					setcookie('Doljnost', $row['Doljnost'], time() + (60*60*24*30));						
					setcookie('Otdel', $row['Otdel'], time() + (60*60*24*30));						
				}
				else{
					echo '<div class="alert alert-danger" style="text-align:center;" role="alert">
 					 Неверный логин или Пароль
					</div>';
				}	
			}
		}
	}
?>
<?php  
	if (!empty($_COOKIE['username'])) {
		header('Location: http://project/account.php');
	}
	if ($_COOKIE['username'] == 'admin') {
		header('Location: http://project/admin.php');
	}
?>

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
	<h1 id="vhod">Вход</h1>
	<div id="form">
		<form method="POST" action="index.php">
		  <div class="form-group">
		    <label for="exampleInputEmail1">Имя пользователя</label>
		    <input type="text" name="username" class="form-control" id="username" aria-describedby="emailHelp" placeholder="Введите имя пользователя">
		  </div>
		  <div class="form-group">
		    <label for="exampleInputPassword1">Пароль</label>
		    <input type="password" name="password" class="form-control" id="pwd" placeholder="Пароль">
		  </div>
  		 <p><input type="submit" name="submit" class="btn btn-primary" value="Войти"></p>
		</form>
</body>
</html>