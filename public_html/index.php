<!--Хедер (+скрипты)-->
<?
$PageTitle="Привет, меня зовут Чернышев Егор";
function customPageHeader(){?>
    <title>Привет, меня зовут Чернышев Егор</title>
<?}
include_once $_SERVER['DOCUMENT_ROOT']."/common/header.php";
?>
<div id="index-hello_div">
    <img width="200" height="260" src="common/assets/my_facemug.png">
    <div id="index-hello-text">
        <h2>Обо мне</h2>
        <p>Я Егор, сегодня младший веб-аналитик, завтра, надеюсь, веб-разработчик. В 2023 г. закончил экономический факультет НГУ. Вкатываюсь в Web в целом и потому буду использовать эту страницу как испытательный полигон для учебы. Посмотрим, что из этого выйдет.
    </div>
    </p>
</div>
<div>
    <p>Этот сайт представляет собой конспект/учебник по разработке серверной части веб-приложений. </p>
</div>

<!--todo: получение оглавления (списка) из директории-->
<?
$dir    = 'pages/php-textbook/';
$files = array_diff(scandir($dir), array('.', '..'));

function page_title($url) {
    $fp = file_get_contents($url);
    if (!$fp)
        return null;
    $res = preg_match("/<title>(.*)<\/title>/siU", $fp, $title_matches);
    if (!$res)
        return null;
    // Clean up title: remove EOL's and excessive whitespace.
    $title = preg_replace('/\s+/', ' ', $title_matches[1]);
    $title = trim($title);
    return $title;
}
?>
<h2>Учебник PHP</h2>
<ul>
<?
foreach ($files as $key => $value) {
    $files[$key]=page_title('pages/php-textbook/'.$value);
    echo sprintf('<li><a href="pages/php-textbook/%s">%s</a></li>',$value,$files[$key]);
}
?>
</ul>


<!--Футер (+скрипты)-->
<?php
include_once $_SERVER['DOCUMENT_ROOT']."/common/footer.php";
?>
