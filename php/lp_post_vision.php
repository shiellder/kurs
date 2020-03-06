<?php

$bd = mysqli_connect('localhost', 'Danil', 'gthctajyf023', 'forumbd') 
                  or die("Ошибка " . mysqli_error($bd)); 
                  $name = $_GET['id'];
                  $query ="SELECT * FROM posts WHERE id=$name";
                  $result = mysqli_query($bd, $query) or die("Ошибка " . mysqli_error($bd));
                  $row = mysqli_fetch_row($result);
                  $fd = file_get_contents('http://localhost/kursach/php/tbd/s'.$name, 'r');

                  echo "<div>";
                  echo "<div class='osn'>";
                  echo "<div class='com_avatar'>";
                  echo "<p id='nume'>".substr($fd,stripos($fd,'(|')+2,stripos($fd,'||')-stripos($fd,'(|')-2)."</p>";
                  echo "<p id ='msgtext'>".substr($fd,stripos($fd,'|:|')+3,stripos($fd,'|)')-stripos($fd,'|:|')-3 )."</p>";
                  echo "</div>";
                  echo "<p id ='msgdate'>".substr($fd,stripos($fd,'||')+2,stripos($fd,'|:|')-stripos($fd,'||')-2)."</p>";
                  
                  echo "</div>";
                  
                  $fd=str_replace(substr($fd,stripos($fd,'(|'),stripos($fd,'|)')-stripos($fd,'(|)')+2),"",$fd);
                  while(strlen($fd)>0)
                { 
                  echo "<div>";
                  echo "<div class='comment'>";
                  echo "<div class='com_avatar'>";
                  echo "<p id='nume'>".substr($fd,stripos($fd,'(|')+2,stripos($fd,'||')-stripos($fd,'(|')-2)."</p>";
                  echo "<p id ='msgtext'>".substr($fd,stripos($fd,'|:|')+3,stripos($fd,'|)')-stripos($fd,'|:|')-3 )."</p>";
                  echo "</div>";
                  echo "<p id ='msgdate'>".substr($fd,stripos($fd,'||')+2,stripos($fd,'|:|')-stripos($fd,'||')-2)."</p>";
                  echo "</div>";                  
                  $fd=str_replace(substr($fd,stripos($fd,'(|'),stripos($fd,'|)')-stripos($fd,'(|)')+2),"",$fd);
                }
              
                if (empty($_SESSION['name']) or empty($_SESSION['id']))
                  {
                  }
                   else
                  {
                    echo "<form action='php/send_msg.php?id=$name' method='post'>";
                    echo "<div class='ost_com'><TEXTAREA name='text'></TEXTAREA><br/>";
                    echo "<INPUT type='submit' name='sended' value='Отправить'></div>";
                    echo "</form>";
                  }   
                 
                  fclose($fd);
                  echo "</div>"; 
                  ?>
                  