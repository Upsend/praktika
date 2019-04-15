<?php
//Настройки соединения с БД
define("DB_PDODRIVER", 		"mysql");
define("DB_HOST", 			"localhost");
define("DB_DATABASE", 		"");
define("DB_USERNAME", 		"root");
define("DB_PASSWORD", 		"");

function cleanInput($input) {

  $search = array(
    '@<script[^>]*?>.*?</script>@si',   // javascript
    '@<[\/\!]*?[^<>]*?>@si',            // HTML теги
    '@<style[^>]*?>.*?</style>@siU',    // теги style
    '@<![\s\S]*?--[ \t\n\r]*>@'         // многоуровневые комментарии
  );

    $output = preg_replace($search, '', $input);
    return $output;
}
  
function sanitize($input) {
    if (is_array($input)) {
        foreach($input as $var=>$val) {
            $output[$var] = sanitize($val);
        }
    }
    else {
        if (get_magic_quotes_gpc()) {
            $input = stripslashes($input);
        }
        $input  = cleanInput($input);
        $output =  mysql_real_escape_string($input);
    }
    return $output;
}


