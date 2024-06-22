<!--Хедер (+скрипты)-->
<?
$PageTitle="Глава 8. Аутентификация";
function customPageHeader(){?>
    <title>Глава 8. Аутентификация</title>
<?}
include_once $_SERVER['DOCUMENT_ROOT']."/common/header.php";
?>

<h2>Использование аутентификации HTTP</h2>
<p><b>Задача:</b>Требуется использовать PHP для защиты частей сайта паролями. Вместо того чтобы хранить пароли во внешнем файле и поручить аутентификацию веб-серверу, вы хотите реализовать логику проверки пароля в программе PHP.
</p>
<p><b>Решение:</b> Суперглобальные переменные <span class="code">$_SERVER['PHP_AUTH_USER']</span> и <span class="code">$_SERVER['PHP_AUTH_PW']</span> содержат имя пользователя и пароль (если они были предоставлены пользователем). Чтобы запретить доступ к странице, отправьте заголовок <span class="code">WWWAuthenticate</span>, идентифицирующий защищенную область как часть ответа с кодом статуса HTTP 401:</p>
<pre><code>&lt;?php
http_response_code(401);
header('WWW-Authenticate: Basic realm="My Website"');
echo "You need to enter a valid username and password.";
exit();
?></code></pre>

<?php
http_response_code(401);
header('WWW-Authenticate: Basic realm="My Website"');
echo "You need to enter a valid username and password.";
exit();
?>


fsfsfsfsfsd


<!--Футер (+скрипты)-->
<?php
include_once $_SERVER['DOCUMENT_ROOT']."/common/footer.php";
?>
