<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="common/css/styles.css">
    <title>Чернышев Егор. Обо мне и об это сайте</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../modules/jquery-3.7.1.min.js"><'+'/script>')</script>
    <script src="common/js/body_scripts.js"></script>
    <script src="common/counters/counters_head.js"></script>
</head>
<body>
<script src="common/counters_body.js"></script>
<h1>Привет, меня зовут Чернышев Егор</h1>
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

<?echo $_SERVER['DOCUMENT_ROOT']?>
<p></p>
<?echo __DIR__?>
<p></p>
<?echo dirname(__FILE__)?>
<p></p>
<?echo (!empty($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . '/';?>
<p></p>
<?echo "http://" . $_SERVER['SERVER_NAME']
?>
aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa
</body>
</html>
