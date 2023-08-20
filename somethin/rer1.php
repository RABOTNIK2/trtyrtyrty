<?php
session_start();
if (!empty($_SESSION['auth'])): ?>
 <!DOCTYPE html>
 <html>
 <head>
 
 </head>
 <body>
 <p>текст только для авторизованного пользователя</p>
 </body>
 </html>
 <a href=" ./logout.php">выйти</a>
<?php else: ?>
 <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. In excepturi sunt quibusdam incidunt veniam ex temporibus quos tempora, et alias molestiae porro, cupiditate quas quaerat impedit placeat sequi id? Pariatur!</p>
<?php endif; ?>
