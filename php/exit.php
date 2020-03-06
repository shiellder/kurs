<?php
          session_start();
  
          
unset($_SESSION['password']);
            unset($_SESSION['name']); 
            unset($_SESSION['id']);//    уничтожаем переменные в сессиях
        exit("<html><head><meta    http-equiv='Refresh' content='0;    URL=http://localhost/kursach/index.php'></head></html>");
            // отправляем пользователя на главную страницу.
            ?>