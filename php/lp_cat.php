<?php
    $bd = mysqli_connect('localhost', 'Danil', 'gthctajyf023', 'forumbd') 
      or die("Ошибка " . mysqli_error($bd));    
    $query ="SELECT * FROM posts WHERE category_id!=5   ORDER BY `post_date` DESC";
    $result = mysqli_query($bd, $query) or die("Ошибка " . mysqli_error($bd));
    $rows = mysqli_num_rows($result); // количество полученных стро
    if($result){              
      echo "<table>";
      echo "<caption>Последние посты</caption>";
      for ($i=0; $i < $rows ; ++$i){
        $row = mysqli_fetch_row($result);
        echo "<tr>";
        echo "<td><a href='index.php?page=post_vision&id={$row[0]}'>$row[3]</a></td>";
        $query2 ="SELECT * FROM categories WHERE id=$row[1]";
        $result2 = mysqli_query($bd, $query2) or die("Ошибка " . mysqli_error($bd));
        $row2 = mysqli_fetch_row($result2);
        echo "<td> <a href='index.php?page=sort_cat&id={$row2[0]}'>$row2[1]</a></td>";
        echo "<td>Дата:$row[2]</td>";
        echo "</td>";
        echo "</tr>"; 
     } 
     echo "</table>";
     echo $_POST['id2'];
     
    $query3 ="SELECT * FROM categories WHERE id!=5";
    $result3 = mysqli_query($bd, $query3) or die("Ошибка " . mysqli_error($bd));
    $rows3 = mysqli_num_rows($result3); // количество полученных строк
    
    echo "<div>";
    echo "<div class='post_creation'><a href='index.php?page=new_post'>СОЗДАТЬ ОБСУЖДЕНИЕ</a></div><br/>";
    echo "<form action='index.php?page=sort_cat' method='post' enctype='multipart/form-data'><table id='filtr'>";
    echo "<caption>ФИЛЬТРАЦИЯ ПОЛУЧАЕТСЯ</caption>";
    for ($i = 0 ; $i < $rows3 ; ++$i)
      {
      $row3 = mysqli_fetch_row($result3);

    echo "<tr><td><input type='checkbox' name='id$row3[0]' value=$row3[0]>$row3[1]</input></td></tr>";
    }
    echo "<tr><td><input type='submit'name='submit' value='Применить'></td></tr>";
    echo "</table></form>";
    echo "</div>";
    }
?>