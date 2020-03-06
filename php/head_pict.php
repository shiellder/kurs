<?php
              switch($_GET['page']){
              case '': echo "<img src='style/img/head_main.png' width='100%' height='100%'>";
                  break;
              case 'cat': echo "<img src='style/img/head_cat.png' width='100%' height='100%'>";
                  break;
              case 'users':echo "<img src='style/img/head_users.png' width='100%' height='100%'>" ;
                  break;
              case 'post_vision': echo "<img src='style/img/head_vision.png' width='100%' height='100%'>";
              $bd = mysqli_connect('localhost', 'Danil', 'gthctajyf023', 'forumbd') 
                  or die("Ошибка " . mysqli_error($bd)); 
                  $name = $_GET['id'];
                  $query ="SELECT * FROM posts WHERE id=$name";
                  $result = mysqli_query($bd, $query) or die("Ошибка " . mysqli_error($bd));
                  $row = mysqli_fetch_row($result);
                  echo "<h1>$row[3]</h1>";
                  break;
              case 'new_post': echo "<img src='style/img/head_post.png' width='100%' height='100%'>";
                break;
              case 'sort_cat':echo "<img src='style/img/head_vision.png' width='100%' height='100%'>";
              $id = $_GET['id'];  
              $bd = mysqli_connect('localhost', 'Danil', 'gthctajyf023', 'forumbd') 
              or die("Ошибка " . mysqli_error($bd)); 
              $query2 ="SELECT * FROM categories WHERE id=$id";
              $result2 = mysqli_query($bd, $query2) or die("Ошибка " . mysqli_error($bd));
              $row2 = mysqli_fetch_row($result2);
              echo "<h1 >$row2[1]</h1>";
                break;
            }
           ?>