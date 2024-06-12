<!--Хедер (+скрипты)-->
<?
$PageTitle="Глава 0. Не сортировано";
function customPageHeader(){?>
    <title>Глава 0. Не сортировано</title>
<?}
include_once $_SERVER['DOCUMENT_ROOT']."/common/header.php";
?>


<h2>Формы</h2>
<p>Листинг ниже создает и обрабатывает форму. Когда пользователь отправляет данные формы, информация, введенная в поле name, возвращается этой странице действием формы $_SERVER['PHP_SELF']. Код PHP проверяет поле name, и если оно обнаружено, выводит приветствие.</p>

<pre><code class="language-php">&lt;body>
&lt;?php if(!empty($_POST['name'])) {
    echo "Greetings, {$_POST['name']}, and welcome.";
} ?>
&lt;form action="&lt;?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    Enter your name: &lt;input type="text" name="name" />
    &lt;input type="submit" />
&lt;/form>
&lt;/body></code></pre>

<h2>Работа с БД</h2>
<p>PHP поддерживает все популярные системы управления БД, включая MySQL,
    PostgreSQL, Oracle, Sybase, SQLite и ODBC-совместимые БД. На рис. 1.5 изображена часть запроса MySQL, выполненного из скрипта PHP: запрос выводит
    результаты поиска книги на сайте с рецензиями. В нем отображается название
    книги, год издания и код ISBN.</p>
<p>Код в листинге 1.4 подключается к БД, выдает запрос на выборку всех доступных
    книг (с использованием секции WHERE), а также строит таблицу для отображения
    всех возвращенных результатов в цикле while.</p>
<pre><code class="language-html">&lt;?php
$db = new mysqli("localhost", "petermac", "password", "library");
// Проверьте соответствие данных
// параметрам вашей среды
if ($db->connect_error) {
 die("Connect Error ({$db->connect_errno}) {$db->connect_error}");
}
$sql = "SELECT * FROM books WHERE available = 1 ORDER BY title";
$result = $db->query($sql);
?>
&lt;html>
&lt;body>
&lt;table cellSpacing="2" cellPadding="6" align="center" border="1">
 &lt;tr>
 &lt;td colspan="4">
 &lt;h3 align="center">These Books are currently available&lt;/h3>
 &lt;/td>
 &lt;/tr>
 &lt;tr>
 &lt;td align="center">Title&lt;/td>
 &lt;td align="center">Year Published&lt;/td>
 &lt;td align="center">ISBN&lt;/td>
 &lt;/tr>
    &lt;?php while ($row = $result->fetch_assoc()) { ?>
 &lt;tr>
 &lt;td>&lt;?php echo stripslashes($row['title']); ?>&lt;/td>
 &lt;td align="center">&lt;?php echo $row['pub_year']; ?>&lt;/td>
 &lt;td>&lt;?php echo $row['ISBN']; ?>&lt;/td>
 &lt;/tr>
    &lt;?php } ?>
&lt;/table>
&lt;/body>
&lt;/html></code></pre>
<h2>Кнопка с графикой</h2>
<p>PHP позволяет легко создавать и обрабатывать графические изображения при
    помощи расширения GD. В листинге 1.5 создается поле для ввода текста, в котором пользователь вводит текст надписи на кнопке. Код берет графический
    файл с изображением пустой кнопки и выравнивает на ней текст, переданный
    в параметре GET 'message'. Затем результат передается браузеру в виде изображения PNG.</p>
<pre><code class="language-php">&lt;?php
if (isset($_GET['message'])) {
 // Загрузка шрифта и изображения, вычисление ширины текста
 $font = dirname(__FILE__) . '/fonts/blazed.ttf';
 $size = 12;
 $image = imagecreatefrompng("button.png");
 $tsize = imagettfbbox($size, 0, $font, $_GET['message']);
 // Определение центра
 $dx = abs($tsize[2] - $tsize[0]);
 $dy = abs($tsize[5] - $tsize[3]);
 $x = (imagesx($image) - $dx) / 2;
 $y = (imagesy($image) - $dy) / 2 + $dy;
 // Вывод текста
 $black = imagecolorallocate($im,0,0,0);
 imagettftext($image, $size, 0, $x, $y, $black, $font, $_GET['message']);
 // Возврат изображения
 header("Content-type: image/png");
 imagepng($image);
 exit;
} ?>
    &lt;html>
 &lt;head>
 &lt;title>Button Form&lt;/title>
 &lt;/head>
 &lt;body>
 &lt;form action="&lt;?php echo $_SERVER['PHP_SELF']; ?>" method="GET">
 Enter message to appear on button:
 &lt;input type="text" name="message" />&lt;br />
 &lt;input type="submit" value="Create Button" />
 &lt;/form>
 &lt;/body>
&lt;/html></code></pre>

<!--Футер (+скрипты)-->
<?php
include_once $_SERVER['DOCUMENT_ROOT']."/common/footer.php";
?>
