<?php
session_start();
if (isset($_POST['text'])) { $text = $_POST['text']; if ($text == '') { unset($text);} }
if (empty($text)) //если пользователь не ввел логин или пароль, то выдаем ошибку и останавливаем скрипт
    {
    exit ("Вы ввели не всю информацию, вернитесь назад и заполните все поля!");
    }
    $name = $_SESSION['name'];
    $text = stripslashes($text);
    $text = htmlspecialchars($text);
    $fd = fopen('tbd\s'.$_GET['id'], "a+") or die("не удалось открыть файл");
    $data=date('l jS \of F Y h:i:s A');
    fputs($fd,"(|$name||$text|:|$date|)");
    fclose($fd);


    header ("Location:http://localhost/kursach/index.php?page=post_vision&id=".$_GET['id']);

?>