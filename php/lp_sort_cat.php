<?php
    $bd = mysqli_connect('localhost', 'Danil', 'gthctajyf023', 'forumbd') 
      or die("Ошибка " . mysqli_error($bd)); 
    $id = $_GET['id'];   
    $query ="SELECT * FROM posts WHERE category_id=$id ORDER BY `post_date` DESC";
    $result = mysqli_query($bd, $query) or die("Ошибка " . mysqli_error($bd));
    $rows = mysqli_num_rows($result); // количество полученных строк
    $query2 ="SELECT * FROM categories WHERE id=$id";
        $result2 = mysqli_query($bd, $query2) or die("Ошибка " . mysqli_error($bd));
        $row2 = mysqli_fetch_row($result2);
    if($result){              
      echo "<table>";
      echo "<caption>ПОСТЫ КАТЕГОРИИ $row2[1]</caption>";
      for ($i=0; $i < $rows ; ++$i){
        $row = mysqli_fetch_row($result);
        echo "<tr>";
        echo "<td><a href='index.php?page=post_vision&id={$row[0]}'>$row[3]</a></td>";
        echo "<td> <a href='index.php?page=sort_cat&id={$row2[0]}'>$row2[1]</a></td>";
        echo "<td>Дата:$row[2]</td>";
        echo "</td>";
        echo "</tr>"; 
     } 
     echo "</table>";
     echo "<div>";
    echo "<div class='post_creation'><a href='index.php?page=new_post'>СОЗДАТЬ ОБСУЖДЕНИЕ</a></div><br/>";
    echo "<table id='filtr'>";
    echo "<caption>ФИЛТРАЦИЯ ПОЛУЧАЕТСЯ</caption>";
    echo "<tr><td><input type='checkbox' name='a' value='1417'>ФИЛТРАЦИЯ ПОКА ОТСУТСВТУЕТ И ПОЯВИТСЯ ПОСЛЕ ДОНАТА В 15 ТЫЩ</input></td></tr>";
    echo "</table>";
    echo "</div>";
    }
?>