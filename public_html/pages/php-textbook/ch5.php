<!--Хедер (+скрипты)-->
<?
$PageTitle="Глава 5. Обработка форм";
function customPageHeader(){?>
    <title>Глава 5. Обработка форм</title>
<?}
include_once $_SERVER['DOCUMENT_ROOT']."/common/header.php";
?>
<h2>Создание форм</h2>
<p>Сначала создается форма, в которую пользователь может вводить необходимые данные. Затем эти данные отправляются веб-серверу, где происходит их разбор, зачастую совмещаемый с проверкой на отсутствие ошибок. Если код PHP найдет одно или несколько полей, требующих повторного ввода, форма может быть заново отображена вместе с сообщением об ошибке. Когда качество введенных данных удовлетворяет программу, она предпринимает некоторые действия, часто привлекая для этого базы данных, к примеру для ввода сведений о покупке</p>
<p>Для создания форм понадобятся, как минимум, следующие элименты: </p>
<ul>
    <li>открывающий и закрывающий теги — <span class="code">&lt;form></span> и <span class="code">&lt;/form></span> соответственно;</li>
    <li>тип передачи данных, задаваемый одним из двух методов — <span class="code">GET</span> или <span class="code">POST</span>;
    </li>
    <li>одно или несколько полей для ввода данных;
    </li>
    <li>URL-адрес назначения, по которому будут отправлены данные формы.</li>
</ul>

<pre><code class="language-php">&lt;? // formtest.php
echo &lt;&lt;&lt; _END
 &lt;form method="post" action="../formtest.php">
 Как вас зовут?
 &lt;input type="text" name="name">
 &lt;input type="submit">
 &lt;/form>
_END;
?></code></pre>
<? // formtest.php
echo <<< _END
 <form method="post" action="../formtest.php">
 Как вас зовут?
 <input type="text" name="name">
 <input type="submit">
 </form>
_END;
?>

<h2>Значения по умолчанию</h2>
<form method="post" action="calc.php"><pre>
Сумма заимствования <input type="text" name="principal">
 Количество лет <input type="text" name="years" value="15">
 Процент годовых <input type="text" name="interest" value="3">
 <input type="submit">
</pre></form>
<p>Значения по умолчанию используются также для скрытых полей, которые применяются тогда, когда вы хотите наряду с данными, введенными пользователем, отправить из веб-страницы в свою программу какую-нибудь дополнительную информацию.</p>
<h2>Типы элементов ввода данных</h2>
<h3>Текстовое поле</h3>
<pre><code class="language-php">&lt;input type="text" name="имя" size="pa3Mep" maxlength=20 value="значение"></code></pre>
<input type="text" name="имя" size=20 maxlength=20 value="значение">
<h3>Текстовая область</h3>
<pre><code class="language-php">&lt;textarea name="имя" соls="ширина" rows="высота" wrap="тип">
 Это текст, отображаемый по умолчанию.
&lt;/textarea></code></pre>
<textarea name="имя" соls="ширина" rows="высота" wrap="тип">
 Это текст, отображаемый по умолчанию.
</textarea>
<h3>Флажки</h3>
<pre><code class="language-php">Я согласен &lt;input type="checkbox" name="agree">
Подписаться? &lt;input type="checkbox" name="news" checked="checked"></code></pre>
Я согласен <input type="checkbox" name="agree"><br>
Подписаться? <input type="checkbox" name="news" checked="checked">
<p>Предложение сделать выбор, установив сразу несколько флажков</p>
<pre><code class="language-php">Ванильное &lt;input type="checkbox" name="ice" value="Vanilla">
Шоколадное &lt;input type="checkbox" name="ice" value="Chocolate">
Земляничное &lt;input type="checkbox" name="ice" value="Strawberry"></code></pre>
Ванильное <input type="checkbox" name="ice" value="Vanilla">
Шоколадное <input type="checkbox" name="ice" value="Chocolate">
Земляничное <input type="checkbox" name="ice" value="Strawberry">
<p>Отправка нескольких значений с помощью массива</p>
<form>
Ванильное <input type="checkbox" name="ice[]" value="Vanilla">
Шоколадное <input type="checkbox" name="ice[]" value="Chocolate">
Земляничное <input type="checkbox" name="ice[]" value="Strawberry">
    <input type="submit" method="post" action="">
</form>
<?
foreach($_POST as $item) echo "$item<br>";
?>
<h3>Скрытые поля</h3>
<p>Иногда бывает удобно пользоваться скрытыми полями формы, чтобы получить возможность отслеживать состояние ее ввода. Например, может потребоваться узнать, отправлена форма или нет. Эти сведения можно получить, добавив к PHP-коду фрагмент кода HTML:</p>
<pre><code class="language-php">&lt;?echo '&lt;input type="hidden" name="submitted" value="yes">'?></code></pre>
<?echo '<input type="hidden" name="submitted" value="yes">'?>
<p>Это простая PHP-инструкция echo, добавленная к полю ввода HTML-формы. Предположим, форма была создана вне программы и показана пользователю. При первом получении PHP-программой введенных данных эта строка кода не будет запущена, поэтому поля с именем submitted не будет. Программа PHP воссоздает форму, добавляя к ней поле ввода.</p>
<label>8.00-12.00<input type="radio" name="time" value="1"></label>

<h2>Обезвреживание ввода</h2>
<?php
function sanitizeString($var)
{
    if (get_magic_quotes_gpc())
        $var = stripslashes($var);
    $var = strip_tags($var);
    $var = htmlentities($var);
    return $var;
}
function sanitizeMySQL($pdo, $var)
{
    $var = $pdo->quote($var);
    $var = sanitizeString($var);
    return $var;
}
?>


<h2>Перевод между Фаренгейтом и Цельсием</h2>
<?php // convert.php
$f = $c = '';
if (isset($_POST['f'])) $f = sanitizeString($_POST['f']);
if (isset($_POST['c'])) $c = sanitizeString($_POST['c']);
if (is_numeric($f))
{
    $c = intval((5 / 9) * ($f - 32));
 $out = "$f &deg;f соответствует $c &deg;c";
 }
elseif(is_numeric($c))
{
    $f = intval((9 / 5) * $c + 32);
    $out = "$c &deg;c equals $f &deg;f";
}
else $out = "";
echo <<<_END
 <title>Программа перевода температуры</title>
 </head>
 <body>
 <pre>
 Введите температуру по Фаренгейту или по Цельсию
 и нажмите кнопку Перевести
<b>$out</b>
 <form method="post" action=" ">
 По Фаренгейту <input type="text" name="f" size="7">
 По Цельсию <input type="text" name="c" size="7">
 <input type="submit" value="Перевести">
 </form>
 </pre>
_END;
?>
<h2>Усовершенствования, появившиеся в HTML5</h2>
<h3>autocomplete</h3>
<pre><code class="language-html">&lt;form action='myform.php' method='post' autocomplete='on'>
    &lt;input type='text' name='username'>
    &lt;input type='password' name='password' autocomplete='off'>
&lt;/form></code></pre>
<form action='myform.php' method='post' autocomplete='on'>
    <input type='text' name='username'>
    <input type='password' name='password' autocomplete='off'>
</form>
<h3>autofocus</h3>
<input type='text' name='query' autofocus='autofocus'>
<p>Браузеры, использующие интерфейсы сенсорных экранов (Android или iOS), обычно игнорируют атрибут autofocus, оставляя за пользователем право прикоснуться к изображению элемента, чтобы он получил фокус. Если бы это было не так, то генерируемые включением этого атрибута увеличения элемента, фокусировки и появления экранной клавиатуры очень скоро стали бы сильно раздражать пользователей.</p>
<h3>placeholder</h3>
<input type='text' name='name' size='50' placeholder='Имя и фамилия'>

<form action='url1.php' method='post'>
    <input type='text' name='field'>
    <input type='submit' formaction='url2.php'>
</form>





<!--Футер (+скрипты)-->
<?php
include_once $_SERVER['DOCUMENT_ROOT']."/common/footer.php";
?>