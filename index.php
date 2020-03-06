<?php
session_start();
error_reporting(0); 
header('Content-Type: text/html; charset=utf-8');
$page = (isset($_GET['page']) ? $_GET['page'] : 'main');
require_once ("php/bd.php") ;
?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>Pojiloi forum</title>
  </head>
  <body>
    <header>
      <div class = "head">
            <div class="menu">
              <ul id="navbar">
              <li><a href="index.php">Главная</a></li>
              <li><a href="index.php?page=cat">Посты</a></li>
              <li><a href="index.php?page=users">Пользователи</a></li>
              <li><a href="Main_Site">Основной сайт</a></li>
              </ul> </div>
              <div class="search">
              <input type="search" name="q" placeholder="Поиск по сайту"><input type="submit" value="Найти">
              <a href="start_reg.php"><img src="style/img/au.png" width="20" height="20" ></a>
              
              </div>
      </div>

      <div class ="daily_head">
      
      <?php
                  $query ="SELECT * FROM posts";
                  $result = mysqli_query($db, $query) or die("Ошибка " . mysqli_error($db)); 
                    if($result){
                      $rows = mysqli_num_rows($result); // количество полученных строк
                      
                      echo "<table><th>Последние обсуждения:</th>";
                      for ($i = 0 ; $i < 5 ; ++$i)
                      {
                        $row = mysqli_fetch_row($result);
                        
                       echo "<th><a href='index.php?page=post_vision&id={$row[0]}'>$row[3]</a></th>";
                        
                      }
                      echo "</table>";
                        mysqli_free_result($result);
                    }
                    ?>
      </div>
      <div class="head_pict">
        <?php
        include_once 'php/head_pict.php';
        ?>
       </div>
    </header>

    <main>
        <div class= "main_back">         
          <div class ="change_part">
           <?php
              switch($_GET['page']){
              case '':include_once 'php/lp_main.php';
                  break;
              case 'cat': include_once 'php/lp_cat.php';
                  break;
              case 'users': include_once 'php/lp_users.php';
                  break;
              case 'post_vision': include_once 'php/lp_post_vision.php';
                  break;
              case 'new_post': include_once 'php/lp_new_post.php';
                break;
              case 'sort_cat': include_once 'php/lp_sort_cat.php';
                break;
            }
           ?>
           </div>        
        </div>
    </main>

    <footer></footer>
  </body>
</html>
