<?php  
unset($_COOKIE['user_id']);
unset($_COOKIE['username']);
unset($_COOKIE['FIO']);
unset($_COOKIE['Doljnost']);
unset($_COOKIE['Otdel']);
setcookie('FIO','', -1, '/');						
setcookie('Doljnost','', -1, '/');						
setcookie('Otdel','', -1, '/');		
setcookie('user_id', '', -1, '/');
setcookie('username', '', -1, '/');
header('Location: index.php');
?>