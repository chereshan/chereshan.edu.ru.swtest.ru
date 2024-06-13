<!--Хедер (+скрипты)-->
<?
$PageTitle="template";
function customPageHeader(){?>
    <title>Привет, меня зовут Чернышев Егор</title>
<?}
include_once $_SERVER['DOCUMENT_ROOT']."/common/header.php";
?>
Подготовка к работе:
Выбор хостинга:
Что он должен поддерживать:
1. PHP
2. MySQL
3. Доступ из терминала telnet или ssh
4. Доступ по ftp
5. установленный phpMyAdmin
fsds
<!--todo: страница конфигурации этого сайта-->
<!--todo: 1. Заведение бесплатного домена на spaceweb-->
<!--todo: 2. Его настройка-->
<!--todo: 3. Новый проект в phpstorm с рабочей ftp-синхронизацие-->
<!--todo: 4. Хостинг картинок-->
<!--todo: 5. Футер и хедер-->

<!--Футер (+скрипты)-->
<?php
include_once $_SERVER['DOCUMENT_ROOT']."/common/footer.php";
?>