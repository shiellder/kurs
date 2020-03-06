<?php
    session_start();
    if (isset($_POST['texxt'])) { $texxt = $_POST['texxt']; if ($texxt == '') { unset($texxt);} }
    if (isset($_POST['selection'])) { $selection = htmlspecialchars ($_POST["selection"]); if ($selection == '') { unset($selection);} }
    if (empty($texxt) or empty($selection)) //если пользователь не ввел логин или пароль, то выдаем ошибку и останавливаем скрипт
    {
    exit ("Вы ввели не всю информацию, вернитесь назад и заполните все поля!");
    }
    $bd = mysqli_connect('localhost', 'Danil', 'gthctajyf023', 'forumbd') 
    or die("Ошибка " . mysqli_error($bd)); 
    $name_of_post = "'".$_POST["post_name"]."'";
    echo $query = 'INSERT INTO posts(category_id,post_name) VALUES ('.$selection.','.$name_of_post.')';
    $bd->query($query);
    $fd = fopen('tbd\s'.$_GET['id'], "w") or die("не удалось открыть файл");
    $name = $_SESSION['name'];
    fputs($fd,"(|$name||$texxt|:|$date|)");
    fclose($fd);

    header ("Location:http://localhost/kursach/index.php?page=post_vision&id=".$_GET['id']);

?>