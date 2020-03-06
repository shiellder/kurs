<?php

$bd = mysqli_connect('localhost', 'Danil', 'gthctajyf023', 'forumbd') 
                  or die("Ошибка " . mysqli_error($bd));    
                  $query ="SELECT * FROM posts WHERE category_id=5 ORDER BY post_date DESC ";
                  echo "<div class='left_main'>";
                  $result = mysqli_query($bd, $query) or die("Ошибка " . mysqli_error($bd)); 
                    if($result){
                      $rows = mysqli_num_rows($result); // количество полученных строк
                      
                      echo "<table>";
                      echo "<caption>Информационная панель</caption>";
                      for ($i = 0 ; $i < $rows ; ++$i)
                      {
                        $row = mysqli_fetch_row($result);
                        echo "<tr>";
                        echo "<td><a href='index.php?page=post_vision&id={$row[0]}'>$row[3]</a></td>";
                        echo "<td>Дата поста: $row[2]</td>";
                       echo "</tr>"; 
                      }
                     echo "</table><br/>";

                      
                     mysqli_free_result($result);
                    }


                    $query ="SELECT * FROM categories ORDER BY followers DESC ";
                  
                    $result = mysqli_query($bd, $query) or die("Ошибка " . mysqli_error($bd)); 
                      if($result){
                        $rows = mysqli_num_rows($result); // количество полученных строк


                      echo "<table>";
                      echo "<caption>Наиболее популярные категории</caption>";
                      for ($i = 0 ; $i < $rows ; ++$i)
                      {
                        $row = mysqli_fetch_row($result);
                        echo "<tr>";
                        echo "<td><a href='index.php?page=sort_cat&id={$row[0]}'>$row[1]</a>";
                        echo "</td>";
                        echo "<td>Количество подписчиков: $row[2]</td>";
                       echo "</tr>"; 
                      }
                     echo "</table><br/>";

                     mysqli_free_result($result);
                    }

                    $query ="SELECT * FROM posts WHERE category_id!=5 ORDER BY post_date DESC ";
                  
                    $result = mysqli_query($bd, $query) or die("Ошибка " . mysqli_error($bd)); 
                      if($result){
                        $rows = mysqli_num_rows($result); // количество полученных строк

                     echo "<table >";
                     echo "<caption>Последние добавленные темы</caption>";
                     for ($i = 0 ; $i < 5 ; ++$i)
                     {
                       $row = mysqli_fetch_row($result);
                       echo "<tr>";
                       echo "<td><a href='index.php?page=post_vision&id={$row[0]}'>$row[3]</a></td>";
                       echo "<td>Дата поста: $row[2]</td>";
                      echo "</tr>"; 
                     }
                    echo "</table>";

                    mysqli_free_result($result);
                  }
                  echo "</div>";
                  echo "<div class='post_creation'><a href='index.php?page=new_post'>СОЗДАТЬ ОБСУЖДЕНИЕ</a></div>";

                    ?>