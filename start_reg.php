
    <?php
    //  вся процедура работает на сессиях. Именно в ней хранятся данные  пользователя, пока он находится на сайте. Очень важно запустить их в  самом начале странички!!!
    session_start();
    require_once ("php/bd.php") ;
    ?>
    <html>
    <head>
    <link rel="stylesheet" href="style/style.css">
    <title>Главная страница</title>
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
    </header>
    <div class="registr_window" >
    <div class="form_pos">
    <form action="php/testreg.php" method="post">

 <p>
    <label>Ваш логин:<br></label>
    <input name="name" type="text" size="15" maxlength="15">
    </p>

 
    <p >

    <label>Ваш пароль:<br></label>
    <input name="password" type="password" size="15" maxlength="15">
    </p>


    <p id="button">
    <input type="submit" name="submit" value="Войти">
                </p>
<br>

<a href="php/reg.php" id="reg" >Зарегистрироваться</a> 
    </p></form>
    <br>
    <?php

   
    if (empty($_SESSION['name']) or empty($_SESSION['id']))
    {
    // Если пусты, то мы не выводим ссылку
    }
    else
    {

        echo  "Вы    вошли на сайт, как $_SESSION[name] (<a    href='php/exit.php'>выход</a>)<br>";
    }
    ?>
    </div>
    </div>
    </body>
    </html>