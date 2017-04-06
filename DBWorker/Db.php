<?php
	
?>


<?php

class Db{

    public static function getConnection(){
        
	$db = new PDO('mysql:dbname=test_task;host=127.0.0.1','oleg','123qwe');
	$db->exec("set names utf8");
		
	return $db;
    }
}
?>