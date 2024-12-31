<?php 
try{
    $db = new PDO('mysql:dbname=;host=;charset=utf8','root','');
    $uri = rtrim($_SERVER["REQUEST_URI"], '/');
    $uri = substr($uri, strrpos($uri, '/') + 1);
    echo(urldecode($uri));
    $titleId = $db->query('SELECT title_id FROM news WHERE title_name = "'.urldecode($uri).'"');
    } catch(PDOException $e){
    echo 'DB ERROR' . $e->getMessage();
    }
?>
