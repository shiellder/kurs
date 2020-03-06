<?php
     $bd = mysqli_connect('localhost', 'Danil', 'gthctajyf023', 'forumbd') 
     or die("Ошибка " . mysqli_error($bd));    
     $query ="SELECT * FROM categories";
     $result = mysqli_query($bd, $query) or die("Ошибка " . mysqli_error($bd));
     $rows = mysqli_num_rows($result);
     $query2 ="SELECT * FROM posts ORDER BY id DESC";
     $result2 = mysqli_query($bd, $query2) or die("Ошибка " . mysqli_error($bd));
     $row2 = mysqli_fetch_row($result2);
     $newid = $row2[0] + 1;
     echo "<form action='php/create_post.php?id=$newid' method='post'>";
     echo "<select name='selection'>";  
        for ($i=0; $i < $rows ; ++$i){
          $row = mysqli_fetch_row($result);
        echo "<option value = '$row[0]'> $row[1] </option>";
        }
     echo "</select>";
     echo "<p><label>Название поста:<br></label>";
     echo "<input name='post_name' size='15' maxlength='15'>";
     echo "</p>";
     echo "<div class='ost_com'><TEXTAREA name='texxt'></TEXTAREA><br/>";
     echo "<INPUT type='submit' name='sended' value='Отправить'></div>";   
     echo "</form>";
?>

