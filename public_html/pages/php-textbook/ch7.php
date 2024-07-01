<!--Хедер (+скрипты)-->
<?
$PageTitle="Глава 7. Обработка форм";
function customPageHeader(){?>
    <title>Глава 7. Обработка форм</title>
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

<pre><code>&lt;? // formtest.php
echo &lt;&lt;&lt; _END
 &lt;form method="post" action="../formtest.php">
 Как вас зовут?
 &lt;input type="text" name="name">
 &lt;input type="submit">
 &lt;/form>
_END;
?></code></pre>
<div class="code-example-output-title"><span>Вывод:</span>
    <div class="code-example-output">
<pre>
<? // formtest.php
echo <<< _END
 <form method="post" action="../formtest.php">
 Как вас зовут?
 <input type="text" name="name">
 <input type="submit">
 </form>
_END;
?>
</pre>
    </div>
</div>

<h2>Получение данных из формы</h2>

<pre><code>&lt;form action="&lt;?=$_SERVER['DOCUMENT_ROOT']."/common/scripts/sayHello.php"?>" method="POST">
    &lt;fieldset>
        &lt;label for="first_name">Имя:&lt;/label>
        &lt;input type="text" name="first_name" size="20" />&lt;br />
        &lt;label for="last_name">Фамилия:&lt;/label>
        &lt;input type="text" name="last_name" size="20" />&lt;br />
        &lt;label for="email">Адрес электронной почты:&lt;/label>
        &lt;input type="text" name="email" size="50" />&lt;br />
        &lt;label for="facebook_url">URL в Facebook:&lt;/label>
        &lt;input type="text" name="facebook_url" size="50" />&lt;br />
        &lt;label for="twitter_handle">Идентификатор в Twitter:&lt;/label>
        &lt;input type="text" name="twitter_handle" size="20" />&lt;br />
    &lt;/fieldset>
    &lt;br />
    &lt;fieldset class="center">
        &lt;input type="submit" value="Вступить в клуб" />
        &lt;input type="reset" value="Очистить и начать все сначала" />
    &lt;/fieldset>
&lt;/form></code></pre>

<div class="code-example-output-title"><span>Вывод:</span>
    <div class="code-example-output">
<pre>
<!--    todo: tip в html надо указывать URL, а не путь в файловой системе как в случае PHP-->
<form action="<?=(!empty($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] ."/common/scripts/getFormInfo.php"?>" method="POST">
    <fieldset>
        <label for="first_name">Имя:</label>
        <input type="text" name="first_name" size="20" /><br />
        <label for="last_name">Фамилия:</label>
        <input type="text" name="last_name" size="20" /><br />
        <label for="email">Адрес электронной почты:</label>
        <input type="text" name="email" size="50" /><br />
        <label for="facebook_url">URL в Facebook:</label>
        <input type="text" name="facebook_url" size="50" /><br />
        <label for="twitter_handle">Идентификатор в Twitter:</label>
        <input type="text" name="twitter_handle" size="20" /><br />
    </fieldset>
    <fieldset class="center">
        <input type="submit" value="Вступить в клуб" />
        <input type="reset" value="Очистить и начать все сначала" />
    </fieldset>
</form>
</pre>
    </div>
</div>
<p>Файл <span class="code">getFormInfo.php</span> содержит следующий код:</p>
<pre><code>&lt;html>
&lt;body>
&lt;div id="content">
    &lt;p>Это структура с данными, получаемыми из формы:&lt;/p>
    &lt;p>
        Имя: &lt;?php echo $_REQUEST['first_name']; ?>&lt;br />
        Фамилия: &lt;?php echo $_REQUEST['last_name']; ?>&lt;br />
        Адрес электронной почты: &lt;?php echo $_REQUEST['email']; ?>&lt;br />
        URL в Facebook: &lt;?php echo $_REQUEST['facebook_url']; ?>&lt;br />
        Идентификатор в Twitter: &lt;?php echo $_REQUEST['twitter_handle']; ?>&lt;br />
    &lt;/p>
&lt;/div>
&lt;div id="footer">&lt;/div>
&lt;/body>
&lt;/html></code></pre>
<p>Для получения значений из форм принято использовать инструкцию следующего рода: </p>
<pre><code>&lt;?php
echo $_REQUEST['name'];
?></code></pre>
<p><span class="code">$_REQUEST</span> — это специальная PHP-переменная,
    позволяющая получать информацию из веб-запроса.</p>
<h3>Практика: более интерактивный скрипт сбора данных с формы</h3>
<p>На примере скрипта getFormInfo.php отработанные полученные знания PHP.</p>
<p><b>1.</b> Добавим значения по умолчанию, если пользователем не было ничего введено некоторое поле. Для этого используем тернарный оператор:</p>
<pre><code>&lt;?php echo $_REQUEST['email'] ? $_REQUEST['email']: "Ничего не введено в поле"; ?></code></pre>
<p>Эту инструкцию можно сократить:</p>
<pre><code>&lt;?php echo $_REQUEST['email'] ? : "Ничего не введено в поле"; ?></code></pre>
<p>Вмето того, чтобы проверять непустоту каждой функции можно написать следующую функцию:</p>
<pre><code>&lt;?php
function checkForEmpty($var){
    echo $var ? : "Ничего не введено в поле";
}
?></code></pre>
<p>Используем стандартную проверку пустоты поля:</p>
<pre><code>&lt;?php
if (!isset($var) || trim($var) == ''){
//    если поле пусто
}
?></code></pre>

<p><b>2.</b> Для того, чтобы свободнее использовать содержимое полей вынесем их в переменные:</p>
<pre><code>&lt;?php
$first_name=$_REQUEST['first_name'];
$last_name=$_REQUEST['last_name'];
$email=$_REQUEST['email'];
$facebook_url=$_REQUEST['facebook_url'];
$twitter_handle=$_REQUEST['twitter_handle'];
?></code></pre>

<p><b>3.</b> Переменные полей можно использовать для добавления текста, который зависит от содержания полей. Например, вот так:</p>
<pre><code>&lt;p>&lt;b>Ну, здравствуй, человек, которого зовут &lt;?=$first_name?:"никак"?> по фамилии &lt;?=$last_name?:"никак"?>.&lt;/b>&lt;/p></code></pre>

<p><b>4.</b> Как можно заметить в нашей форме используются поля не очень релевантные для рунета. Заменим их, а также преобразуем вывод, так чтобы он выдавал рабочие гиперссылки.</p>
<pre><code>&lt;?php
function checkForLink($var):string{
    return  "&lt;a href='$var'>$var&lt;/a>" ? : "Ничего не введено в поле";
}
?></code></pre>

<p><b>5.</b> Добавим рудиментарную валидацию для электронной почты (проверка наличия <span class="code">@</span>):</p>
<pre><code>&lt;?php
function valiadateMail($var){
    if ($var!="Ничего не введено в поле"){
        if (strpos($var, '@')!==false){
            return "Введена не валидная почта";
        }
    }
    else {
        return $var;
    }
}
?>
&lt;p>Адрес электронной почты: &lt;?=valiadateMail(checkForEmpty($email)); ?>&lt;br />&lt;/p></code></pre>
<p>Итак, итоге мы получаем следующий скрипт PHP:</p>
<pre><code>&lt;?php
$first_name=trim($_REQUEST['first_name']);
$last_name=trim($_REQUEST['last_name']);
$email=trim($_REQUEST['email']);
$vk_url=trim($_REQUEST['vk_url']);
$github_username=trim($_REQUEST['github_username']);

function checkForEmpty($var):string{
    if (!isset($var) || $var == ''){
        return  "Ничего не введено в поле";
    }
    else {
        return $var;
    }
}
function checkForLink($var):string{
    if (!isset($var) || $var == ''){
        return  "Ничего не введено в поле";
    }
    else {
        $var=$var;
        return  "&lt;a href='$var'>$var&lt;/a>";
    }
}
function checkForUserName($username, $domain):string{
    if (!isset($username) || $username == ''){
        return  "Ничего не введено в поле";
    }
    else {
        $username=$username;
        return  "&lt;a href='$domain/$username'>$username&lt;/a>";
    }
}

function valiadateMail($var){
    if ($var!="Ничего не введено в поле"){
        if (strpos($var, '@')!==false){
            return "Введена не валидная почта";
        }
    }
    else {
        return $var;
    }
}

?>
&lt;html>
&lt;body>
&lt;div id="content">
    &lt;p>Это структура с данными, получаемыми из формы:&lt;/p>
    &lt;p>
        Имя: &lt;?=checkForEmpty($first_name);?>&lt;br />
        Фамилия: &lt;?=checkForEmpty($last_name); ?>&lt;br />
        Адрес электронной почты: &lt;?=valiadateMail(checkForEmpty($email)); ?>&lt;br />
        URL Вконтакте: &lt;?=checkForLink($vk_url); ?>&lt;br />
        Имя юзера Github: &lt;?= checkForUserName($github_username, 'https://github.com')?> &lt;br/>
    &lt;/p>
    &lt;p>&lt;b>Ну, здравствуй, человек, которого зовут &lt;?=$first_name?:"никак"?> по фамилии &lt;?=$last_name?:"никак"?>.&lt;/b>&lt;/p>
&lt;/div>
&lt;/body>
&lt;/html></code></pre>


<h3>Переменная <span class="code">$_REQUEST</span> — это массив</h3>
<p>Специальная переменная PHP, снабжающая вас всей информацией из веб-формы,
    называется <span class="code">$_REQUEST</span>. Она также является массивом. Когда вы напишете код вида
    <span class="code">$_REQUEST['first_name']</span>, вы просто извлечете конкретный фрагмент информации
    из этого массива.</p>
<p>Вы видели, что информацию из массива можно извлечь не только по имени,
    то есть по ярлыку на папке, но и по номеру. Поэтому для ее извлечения можно
    указать <span class="code">$file_cabinet['first_name']</span> или <span class="code">$file_cabinet[0]</span>. То же самое справедливо
    и для <span class="code">$_REQUEST</span>, поскольку это всего лишь массив. Таким образом, указание
    <span class="code">$_REQUEST[0]</span> в PHP вполне допустимо</p>
<p>В качестве демонстрации получим все значения переменных массива <span class="code">$_REQUEST</span>:</p>
<pre><code>&lt;?php
foreach($_REQUEST as $value) {
    echo "&lt;p>" . $value . "&lt;/p>";
}
?></code></pre>
<p>Для вывода пар ключ-значение массива <span class="code">$_REQUEST</span> применяется следующая конструкция:</p>
<pre><code>&lt;?php
foreach($_REQUEST as $key => $value) {
    echo "&lt;p>Для " . $key . ", имеется значение '" . $value . "'.&lt;/p>";
}
?></code></pre>





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