<?php
$bd = mysqli_connect('localhost', 'Danil', 'gthctajyf023', 'forumbd') 
                  or die("Ошибка " . mysqli_error($bd));    
                  $query ="SELECT * FROM users";
                  $result = mysqli_query($bd, $query) or die("Ошибка " . mysqli_error($bd)); 
                    if($result){
                      $rows = mysqli_num_rows($result); // количество полученных строк
     
                      echo "<table id='users_table'>";
                      echo "<caption>Пользователи</caption>";
                      for ($i = 0 ; $i < $rows ; ++$i)
                      {
                        $row = mysqli_fetch_row($result);
                        echo "<tr>";
                        echo "<td id='us_td'><a href=''>";
                        echo "<p id='postst'>$row[1]</p>";
                        echo "<p id='postst'>Количество постов: $row[2]</p>";
                        echo "<p id='reg_date'>Дата регистрации: $row[3]</p>";
                        echo "</a></td>";
                       echo "</tr>"; 
                      }
                     echo "</table>";
                        mysqli_free_result($result);
                    }?>