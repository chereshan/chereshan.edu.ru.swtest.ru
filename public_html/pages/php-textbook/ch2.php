<!--Хедер (+скрипты)-->
<?
$PageTitle="Глава 2. Переменные PHP";
function customPageHeader(){?>
  <title>Глава 2. Переменные PHP</title>
<?}
include_once $_SERVER['DOCUMENT_ROOT']."/common/header.php";
?>


<h2>Введение в переменные PHP</h2>
<p>Символ <span class="code">$</span> используется в разных языках программирования в различных целях. Например, в языке BASIC символ <span class="code">$</span> применялся в качестве завершения имен переменных, чтобы показать, что они относятся к строкам</p>
<p>В PHP же символ <span class="code">$</span> должен ставиться перед именами всех переменных. Это нужно для того, чтобы PHP-парсер работал быстрее, сразу же понимая, что он имеет дело с переменной. К какому бы типу ни относились переменные — к числам, строкам или массивам, все они должны выглядеть так, как показано ниже:</p>
<pre><code class="language-php">&lt;?php
 $mycounter = 1;
 $mystring = "Hello";
 $myarray = array("One", "Two", "Three");
?></code></pre>
<h2>Правила присваивания имен переменных</h2>
<ul>
    <li>Имена после знака <span class="code">$</span> должны начинаться с буквы или с <span class="code">_</span></li>
    <li>Имена могут содержать <span class="code">[a-zA-Z0-9_]</span></li>
    <li>Имена не могут включать пробелы</li>
    <li>Имена переменных чувствительны к регистру символов</li>
</ul>


<h2>Определение переменной</h2>
<p>Переменная может находиться в двух состояниях - определенном и неопределенном. Для проверки того, в каком состоянии находится переменная, используется функция <span class="code">isset()</span>.</p>
<pre><code>&lt;?php
function isInitialized($var){
    if (isset($var)){
        print '1'.'&lt;br>';
    }
    else {
        print '0'.'&lt;br>';
    }
}
$vegetables = 'tomato';
print isInitialized($vegetables);
unset($vegetables);
print isInitialized($vegetables);
unset($vegetables, $fruits);
?></code></pre>
<div class="code-example-output-title"><span>Вывод:</span>
    <div class="code-example-output">
<pre>
<?php
function isInitialized($var){
    if (isset($var)){
        print '1'.'<br>';
    }
    else {
        print '0'.'<br>';
    }
}
$vegetables = 'tomato';
print isInitialized($vegetables);
unset($vegetables);
print isInitialized($vegetables);
unset($vegetables, $fruits);
?>
</pre>
    </div>
</div>
<p>Функция <span class="code">unset()</span> преобразует переменную в неопределенную.</p>

<p>Аналогичные другим языкам за исключением <span class="code">.=</span></p>

<h2>Определение значения по умолчанию</h2>
<pre><code>&lt;?php
if (! isset($cars)) {
    $cars = 'Какая-то марка';
}
?></code></pre>
<h3>Практика: дефолтное значение для URI</h3>
<p>Этот метод особенно удобен, когда переменные берутся из URI. Например, вот так::</p>
<pre><code>&lt;?php
$cars = isset($_GET['cars']) ? $_GET['cars'] : $default_cars;
?></code></pre>
<p>Однако эта функция плоха тем, что, если <span class="code">$_GET['cars']</span> содержит <span class="code">0</span>, то присваивается <span class="code">$default_cars</span>, несмотря на то, что <span class="code">0</span> может быть валидным значением.</p>
<p>Поэтому предпочтительно использовать следующий синтаксис:</p>
<pre><code>&lt;?php
$cars = array_key_exists('cars', $_GET) ? $_GET['cars'] : $default_cars;
?></code></pre>
<p>Для задания дефолтных значений для многих переменных можно использовать следующий код: </p>
<pre><code>&lt;?php
$defaults = array('emperors' => array('Rudolf II','Caligula'),
    'vegetable' => 'celery',
    'acres' => 15);
foreach ($defaults as $k => $v) {
    if (! isset($GLOBALS[$k])) { $GLOBALS[$k] = $v; }
}
?></code></pre>

<h2>Переменные в переменных</h2>
<p>Чтобы обратиться к значению переменной, имя которой хранится в другой переменной, поставьте перед именем переменной дополнительный знак <span class="code">$</span></p>
<pre><code>&lt;?php
$foo = "bar";
$$foo = "baz";
?></code></pre>
<p>После выполнения второй команды переменная <span class="code">$bar</span> будет содержать значение <span class="code">"baz"</span>.</p>
<h3>Практика: дефолтные значения для закрытых внутри функции переменных</h3>
<pre><code>&lt;?php
foreach ($defaults as $k => $v) {
    if (! isset($$k)) { $$k = $v; }
}
?></code></pre>

<h2>Обмен значениями между переменными без временных переменных</h2>
<pre><code>&lt;?php
$a = 'Alice';
$b = 'Bob';
list($a,$b) = array($b,$a);
// Теперь $a содержит 'Bob', а $b содержит 'Alice'
?></code></pre>
<p>Функция <span class="code">list()</span> позволяет присваивать значения их массива отдельными переменным. </p>

<h2>Динамическое создание имени переменной</h2>
<p>Используйте синтаксис косвенных переменных PHP — поставьте $ перед переменной, содержащей имя нужной вам переменной:</p>
<pre><code>&lt;?php
$animal = 'turtles';
$turtles = 103;
print $$animal;
?></code></pre>
<div class="code-example-output-title"><span>Вывод:</span>
    <div class="code-example-output">
<pre>
<?php
$animal = 'turtles';
$turtles = 103;
print $$animal;
?>
</pre>
    </div>
</div>
<p>Если перед именем переменной стоят два знака <span class="code">$</span>, PHP берет значение этой переменной и использует его как имя «итоговой» переменной. В приведенном выше примере выводится значение <span class="code">103</span>, потому что <span class="code">$animal</span> содержит <span class="code">'turtles'</span>; следовательно, <span class="code">$$animal</span> соответствует <span class="code">$turtles</span>, а значение этой переменной равно <span class="code">103</span>.</p>
<p>Синтаксис <span class="code">{…}</span> позволяет строить более сложные выражения, обозначающие имена переменных:</p>
<pre><code>&lt;?php
$stooges = array('Moe','Larry','Curly');
$stooge_moe = 'Moses Horwitz';
$stooge_larry = 'Louis Feinberg';
$stooge_curly = 'Jerome Horwitz';
foreach ($stooges as $s) {
    print "$s's real name was ${'stooge_'.strtolower($s)}.\n";
}
?></code></pre>
<div class="code-example-output-title"><span>Вывод:</span>
    <div class="code-example-output">
<pre>
<?php
$stooges = array('Moe','Larry','Curly');
$stooge_moe = 'Moses Horwitz';
$stooge_larry = 'Louis Feinberg';
$stooge_curly = 'Jerome Horwitz';
foreach ($stooges as $s) {
    print "$s's real name was ${'stooge_'.strtolower($s)}.\n";
}
?>
</pre>
    </div>
</div>

<h3>Практика: перебор переменных по имени</h3>
<pre><code>&lt;?php
for ($i = 1; $i &lt;= $n; $i++) {
    $t = "title_$i";
    if ($title == $$t) { /* Есть совпадение */ }
}
?></code></pre>

<h2>Константы</h2>
<p>Константы, как и переменные, хранят информацию для последующего доступа,
    за исключением того, что они оправдывают свое название (постоянные). Иными
    словами, после определения констант их значения устанавливаются для всей
    остальной программы и не могут быть изменены. </p>
<p>К примеру, константа может использоваться для хранения местоположения
    корневого каталога вашего сервера (папки, содержащей основные файлы вашего
    сайта). Определить такую константу можно следующим образом:</p>
<pre><code class="language-php">define("ROOT_LOCATION", "/usr/local/www/");</code></pre>
Затем для чтения содержимого константы нужно просто сослаться на нее как
на обычную переменную (но не предваряя ее имя знаком доллара):
<pre><code class="language-php">$directory = ROOT_LOCATION;</code></pre>
<p>Теперь, как только понадобится запустить ваш PHP-код на другом сервере
    с другой конфигурацией папок, придется изменить только одну строку кода.</p>
<p>Важно помнить о двух основных особенностях констант: перед их именами не нужно ставить символ <span class="code">$</span> (в отличие от имен обычных переменных) и их можно определить только с помощью функции <span class="code">define()</span>.</p>
<p>По общепринятому соглашению считается правилом хорошего тона использовать в именах констант буквы только верхнего регистра, особенно если ваш код
    будет также читать кто-нибудь другой.</p>
<h3>Предопределенные константы</h3>
<p>существуют константы, известные как волшебные, которые могут оказаться для вас полезными с самого начала. У имен волшебных констант в начале
    и в конце всегда стоят два символа подчеркивания, чтобы нельзя было случайно
    назвать одну из собственных констант уже занятым под эти константы именем</p>
<table class="first_column_code">
    <tr>
        <td>Волшебная константа</td>
        <td>Описание</td>
    </tr>
    <tr>
        <td><span class="code">__line__</span></td>
        <td>Номер текущей строки в файле</td>
    </tr>
    <tr>
        <td><span class="code">__file__</span></td>
        <td>Полное путевое имя файла. Если используется внутри инструкции <span class="code">include</span>, то возвращается имя включенного файла. В некоторых операционных системах допускается использование псевдонимов для каталогов, которые называются символическими ссылками; в <span class="code">__file__</span> они всегда заменяются реальными каталогами</td>
    </tr>
    <tr>
        <td><span class="code">__dir__</span></td>
        <td>Каталог файла. Если используется внутри инструкции <span class="code">include</span>, то возвращается каталог включенного файла. Такой же результат дает применение функции <span class="code">dirname(__file__)</span>. В этом имени каталога отсутствует замыкающий слэш, если только этот каталог не является корневым.</td>
    </tr>
    <tr>
        <td><span class="code">__function__</span></td>
        <td>Имя функции. Возвращает имя функции, под которым она была объявлена (с учетом регистра символов). В PHP 4 возвращаемое значение всегда составлено из символов нижнего регистра.</td>
    </tr>
    <tr>
        <td><span class="code">__class__</span></td>
        <td>Имя класса. Возвращает имя класса, под которым он был объявлен (с учетом регистра символов). В php 4 возвращаемое значение всегда составлено из символов нижнего регистра.</td>
    </tr>
    <tr>
        <td><span class="code">__method__</span></td>
        <td>Имя метода класса. Возвращает имя метода, под которым он был объявлен (с учетом регистра символов).</td>
    </tr>
    <tr>
        <td><span class="code">__namespace__</span></td>
        <td>Имя текущего пространства имен (с учетом регистра символов). Эта константа определена во время компиляции </td>
    </tr>
</table>
<p>Эти константы полезны при отладке, когда нужно вставить строку кода, чтобы
    понять, до какого места дошло выполнение программы:
</p>
<pre><code class="language-php">echo "Это строка " . _LINE_ . " в файле " . _FILE_;</code></pre>
<p>Эта команда выведет в браузер текущую строку программы с указанием текущего
    файла, исполняемого в данный момент (включая путь к нему).</p>

<h2>Область видимости переменной</h2>
<p>Если программа очень длинная, то с подбором подходящих имен переменных могут возникнуть трудности, но программируя на PHP, можно определить область видимости переменной. Иными словами, можно, к примеру, указать, что переменная <span class="code">$temp</span> будет использоваться только внутри конкретной функции, чтобы забыть о том, что она после возврата из кода функции применяется где-нибудь еще. Фактически именно такой в PHP является по умолчанию область видимости переменных.</p>
<p>В качестве альтернативы можно проинформировать PHP о том, что переменная имеет глобальную область видимости и доступ к ней может быть осуществлен из любого места программы.</p>
<h3>Локальные переменные</h3>
<p><b>Локальные переменные</b> создаются внутри функции и к ним имеется доступ только из кода этой функции. Обычно это временные переменные, которые используются до выхода из функции для хранения частично обработанных результатов.</p>
<pre><code class="language-php">&lt;?php
function longdate($timestamp)
{
    $temp = date("l F jS Y", $timestamp);
    return "Дата: $temp";
}
?></code></pre>
<p>Более того, по умолчанию переменные, определенные за пределами функции (глобальные переменные), недоступны внутри функции. Например, ниже представлена неудачная попытка получить доступ к переменной <span class="code">$temp</span> в функции <span class="code">longdate()</span></p>
<pre><code class="language-php">&lt;?php
 $temp = "Дата: ";
 echo longdate(time());
 function longdate($timestamp)
 {
 return $temp . date("l F jS Y", $timestamp);
 }
?></code></pre>
<div class="code-example-output-title"><span>Вывод:</span>
    <div class="code-example-output">
<pre>
<?php
$temp = "Дата: ";
echo longdate(time());
function longdate($timestamp)
{
    return $temp . date("l F jS Y", $timestamp);
}
?>
</pre>
    </div>
</div>
<p>Но поскольку переменная <span class="code">$temp</span> не была создана внутри функции <span class="code">longdate</span>, а также не была передана ей в качестве параметра, функция <span class="code">longdate</span> не может получить к ней доступ. Поэтому этот фрагмент кода выведет только дату без предшествующего ей текста. На самом деле в зависимости от параметров конфигурации PHP сначала может быть отображено сообщение об ошибке, предупреждающее об использовании неопределенной переменной (<span class="code">Notice: Undefined variable: temp</span>), показывать которое пользователям не хотелось бы.</p>
<p>Решить проблему можно путем переноса ссылки на переменную <span class="code">$temp</span> в ее локальную область видимости:</p>
<pre><code class="language-php">&lt;?php
 $temp = "Дата: ";
 echo $temp . longdate(time());
 function longdate($timestamp)
 {
 return date("l F jS Y", $timestamp);
 }
?></code></pre>


<h3>Статические переменные</h3>
<p>Если функция вызывается многократно, то она начинает свою работу со свежей копией переменной и ее прежние установки не имеют никакого значения. Интересно, а что, если внутри функции есть такая локальная переменная, к которой не должно быть доступа из других частей программы, но значение которой желательно сохранять до следующего вызова функции? Зачем? Возможно, потому, что нужен некий счетчик, чтобы следить за количеством вызовов функции. Решением служит объявление статической переменной:</p>
<pre><code class="language-php">&lt;?php
 function test()
 {
    static $count = 0;
    echo $count;
    $count++;
 }
?></code></pre>
<p>В этом примере в самой первой строке функции создается статическая переменная по имени <span class="code">$count</span>, которой присваивается нулевое начальное значение. В следующей строке выводится значение переменной, а в последней строке это значение увеличивается на единицу.</p>
<pre><code class="language-php">&lt;?php
 static $int = 0; // Допустимо
 static $int = 1+2; // Верно (в PHP 5.6)
 static $int = sqrt(144); // Недопустимо
?></code></pre>
<h4>Практика: сохранение значения локальной переменной между вызовами функции</h4>
<pre><code>&lt;?php
function check_the_count($pitch) {
    static $strikes = 0;
    static $balls = 0;
    switch ($pitch) {
        case 'foul':
            if (2 == $strikes) break; // Ничего не происходит
        case 'strike':
            $strikes++;
            break;
        case 'ball':
            $balls++;
            break;
    }
    if (3 == $strikes) {
        $strikes = $balls = 0;
        return 'strike out';
    }
    if (4 == $balls) {
        $strikes = $balls = 0;
        return 'walk';
    }
    return 'at bat';
}
$pitches = array('strike', 'ball', 'ball', 'strike', 'foul','strike');
$what_happened = array();
foreach ($pitches as $pitch) {
    $what_happened[] = check_the_count($pitch);
}
// Вывод результатов
var_dump($what_happened);
?></code></pre>
<div class="code-example-output-title"><span>Вывод:</span>
    <div class="code-example-output">
<pre>
<?php
function check_the_count($pitch) {
    static $strikes = 0;
    static $balls = 0;
    switch ($pitch) {
        case 'foul':
            if (2 == $strikes) break; // Ничего не происходит
        case 'strike':
            $strikes++;
            break;
        case 'ball':
            $balls++;
            break;
    }
    if (3 == $strikes) {
        $strikes = $balls = 0;
        return 'strike out';
    }
    if (4 == $balls) {
        $strikes = $balls = 0;
        return 'walk';
    }
    return 'at bat';
}
$pitches = array('strike', 'ball', 'ball', 'strike', 'foul','strike');
$what_happened = array();
foreach ($pitches as $pitch) {
    $what_happened[] = check_the_count($pitch);
}
// Вывод результатов
var_dump($what_happened);
?>
</pre>
    </div>
</div>


<h3>Глобальные переменные</h3>
<p>Бывают случаи, когда требуется переменная, имеющая глобальную область видимости, поскольку нужно, чтобы к ней имелся доступ из всего кода программы.</p>
<p>Переменные, объявленные за пределами функции, являются глобальными. К таким переменным можно обращаться из любой части программы, но по умолччанию они недоступны внутри функций. Чтобы разрешить функции обращаться к глобальной переменной, используется ключевое слово <span class="code">global</span> внутри функции</p>
<pre><code class="language-php">function updateCounter()
{
 global $counter;
 $counter++;
}
$counter = 10;
updateCounter();
</code></pre>
<div class="code-example-output-title"><span>Вывод:</span>
    <div class="code-example-output">
<pre>
<?php
function updateCounter()
{
    global $counter;
    $counter++;
    echo $counter;
}
$counter = 10;
updateCounter();
?>
</pre>
    </div>
</div>
<p>Существует также и более громоздкий метод обновления глобальной переменной на основе массива PHP <span class="code">$GLOBALS</span>:</p>

<pre><code>&lt;?php
function updateCounter2()
{
    $GLOBALS['counter2']++;
    echo $GLOBALS['counter2'];
}
$counter2 = 10;
updateCounter2();
?></code></pre>

<div class="code-example-output-title"><span>Вывод:</span>
    <div class="code-example-output">
<pre>
<?php
function updateCounter2()
{
    $GLOBALS['counter2']++;
    echo $GLOBALS['counter2'];
}
$counter2 = 10;
updateCounter2();
?>
</pre>
    </div>
</div>


<h3>Суперглобальные переменные</h3>
<p> Смысл этого названия заключается в том, что они предоставляются средой окружения PHP
    и имеют глобальную область видимости внутри программы, то есть доступны
    абсолютно из любого ее места. В этих суперглобальных переменных содержится масса полезной информации
    о текущей работающей программе и ее окружении</p>
<table class="first_column_code">
    <tr>
        <td>Имя суперглобальной
            переменной</td>
        <td>Ее содержимое</td>
    </tr>
    <tr>
        <td><span class="code">$GLOBALS</span></td>
        <td>все переменные, которые на данный момент определены в глобальной области видимости сценария. Имена переменных служат ключами массива</td>
    </tr>
    <tr>
        <td><span class="code">$_SERVER</span></td>
        <td>информация озаголовках, путях, местах расположения сценариев. элементы
            этого массива создаются веб-сервером, иэто не дает гарантии, что каждый
            веб-сервер будет предоставлять какую-то часть информации или ее всю</td>
    </tr>
    <tr>
        <td><span class="code">$_GET</span></td>
        <td>переменные, которые передаются текущему сценарию http-методом get
        </td>
    </tr>
    <tr>
        <td><span class="code">$_POST</span></td>
        <td>переменные, которые передаются текущему сценарию http-методом post
        </td>
    </tr>
    <tr>
        <td><span class="code">$_FILES</span></td>
        <td>элементы, подгруженные ктекущему сценарию http-методом post</td>
    </tr>
    <tr>
        <td><span class="code">$_COOKIE</span></td>
        <td>переменные, переданные текущему сценарию посредством http cookies</td>
    </tr>
    <tr>
        <td><span class="code">$_SESSION</span></td>
        <td>переменные сессии, доступные текущему сценарию</td>
    </tr>
    <tr>
        <td><span class="code">$_REQUEST</span></td>
        <td>содержимое информации, переданной от браузера; по умолчанию <span class="code">$_get</span>,
            <span class="code">$_post</span> и <span class="code">$_cookie</span></td>
    </tr>
    <tr>
        <td><span class="code">$_ENV</span></td>
        <td>переменные, полученные из окружения </td>
    </tr>
</table>

<p>Для иллюстрации порядка применения суперглобальных переменных приведен типовой пример. Среди многой другой интересной информации, предоставляемой суперглобальными переменными, есть и URL-адрес той страницы, с которой пользователь был перенаправлен на текущую веб-страницу. Эта информация может быть получена следующим образом:</p>
<pre><code class="language-php">&lt;?
if(isset($_SERVER['HTTP_REFERER'])) {
    print $_SERVER['HTTP_REFERER'];
}
else
{
    print "nothing";
}
?></code></pre>
<?
if(isset($_SERVER['HTTP_REFERER'])) {
    print $_SERVER['HTTP_REFERER'];
}
else
{
    print "nothing";
}
?>
<p>Обратите внимание, что суперглобальные переменные часто используются злоумышленниками, пытающимися отыскать средства для атаки и вмешательства в работу вашего сайта. Они загружают в $_POST, $_GET или в другие суперглобальные переменные вредоносный код, например команды UNIX или MySQL, которые, если вы по незнанию к ним обратитесь, могут разрушить или отобразить незащищенные данные. Именно поэтому перед применением суперглобальных переменных их всегда следует подвергать предварительной обработке. Для этого можно воспользоваться PHP-функцией htmlentities. Она занимается преобразованием всех символов в элементы HTML. Например, символы «меньше» и «больше» (< и >) превращаются в строки &lt; и &gt;, то же самое делается для перевода в безопасное состояние всех кавычек, обратных слешей и т. д.</p>
<p>Более безопасный способ доступа к $_SERVER (и другим суперглобальным переменным) выглядит следующим образом:</p>
<pre><code class="language-php">$came_from = htmlentities($_SERVER['HTTP_REFERRER']);</code></pre>


<pre><code class="language-php">&lt;?php
switch ($page)
{
    case "Home":
        echo "Вы выбрали Home";
        break;
    case "About":
        echo "Вы выбрали About";
        break;
    case "News":
        echo "Вы выбрали News";
        break;
    case "Login":
        echo "Вы выбрали Login";
        break;
    case "Links":
        echo "Вы выбрали Links";
        break;
}
?>   </code></pre>
<pre><code class="language-php">&lt;?php
function getDeviceType() {
    $userAgent = $_SERVER['HTTP_USER_AGENT'];
    $deviceType = 'Компьютер';  // По умолчанию, если тип не определен

    if (strpos($userAgent, 'Mobile') !== false) {
        $deviceType = 'Мобильное устройство';
    } elseif (strpos($userAgent, 'Tablet') !== false || strpos($userAgent, 'iPad') !== false) {
        $deviceType = 'Планшет';
    }

    return $deviceType;
}

// Использование функции для определения типа устройства
$type = getDeviceType();
echo "Тип вашего устройства: " . $type;
?></code></pre>
<?php
function getDeviceType() {
    $userAgent = $_SERVER['HTTP_USER_AGENT'];
    $deviceType = 'Компьютер';  // По умолчанию, если тип не определен

    if (strpos($userAgent, 'Mobile') !== false) {
        $deviceType = 'Мобильное устройство';
    } elseif (strpos($userAgent, 'Tablet') !== false || strpos($userAgent, 'iPad') !== false) {
        $deviceType = 'Планшет';
    }

    return $deviceType;
}

// Использование функции для определения типа устройства
$type = getDeviceType();
echo "Тип вашего устройства: " . $type . "<br>";
?>
<?
echo $_SERVER['HTTP_USER_AGENT'];
?>

<?
$currentPage = $_SERVER['REQUEST_URI'];
echo $currentPage;
?>

<h3>Область видимости параметров функции</h3>
<p>Функция может быть определена по именованным параметрам:</p>

<pre><code>&lt;?php
function greet($name)
{
    echo "Hello, {$name}";
}
greet("Janet");
?></code></pre>
<div class="code-example-output-title"><span>Вывод:</span>
    <div class="code-example-output">
<pre>
<?php
function greet($name)
{
    echo "Hello, {$name}";
}
greet("Janet");
?>
</pre>
    </div>
</div>


<h2>Сборка мусора</h2>
<p>PHP использует подсчет ссылок и копирование при записи для управления памятью. Копирование при записи гарантирует, что память не будет теряться при копировании значений между переменными, а подсчет ссылок обеспечивает возвращение неиспользуемой памяти операционной системе.</p>
<p>Чтобы разобраться в сути управления памятью в PHP, необходимо сначала понять концепцию <b>таблицы символических имен</b>. Переменная включает имя (например, <span class="code">$name</span>) и значение (например, <span class="code">"Fred"</span>). Таблица символических имен представляет собой массив, связывающий имена переменных с расположением их значений в памяти.</p>
<p>Когда вы копируете значение из одной переменной в другую, PHP не выделяет дополнительную память для копии. Вместо этого PHP обновляет таблицу символических имен, чтобы показать, что обе переменные являются именами для одной области памяти. Таким образом, следующий код не создает новый массив:
</p>
<pre><code>&lt;?php
$worker = array("Fred", 35, "Wilma");
$other = $worker; // массив не дублируется в памяти
?></code></pre>
<p>При последующем изменении любой из копий PHP выделяет необходимую память и создает копию:</p>
<pre><code>&lt;?php
$worker[1] = 36; // массив копируется в памяти, значение изменилось
?>
</code></pre>
<p>Отложенное выделение памяти и копирование в PHP экономит время и память. Этот механизм называется <b>копированием при записи</b>.</p>
<p>С каждым значением, на которое указывает таблица символических имен, связывается <b>счетчик ссылок</b> — число, представляющее количество возможных способов обращения к области памяти. После исходного присваивания массива <span class="code">$worker</span> и последующего присваивания <span class="code">$worker</span> переменной <span class="code">$other</span> у массива, на который ссылаются элементы таблицы символических имен для <span class="code">$worker</span> и <span class="code">$othe</span>r, счетчик ссылок будет равен 2.</p>
<p>Это значит, что к переменной можно обратиться двумя способами: через <span class="code">$worker</span> или через <span class="code">$other</span>. Но после изменения <span class="code">$worker[1]</span> PHP создаст новый массив для <span class="code">$worker</span>, и счетчик ссылок каждого массива будет равен 1.</p>
<p>Когда переменная выходит из области видимости в конце функции (как это происходит с параметрами функций и локальными переменными), счетчик ссылок ее значения уменьшается на 1. Когда переменной присваивается значение из другой области памяти, счетчик ссылок старого значения уменьшается на 1. Когда счетчик ссылок значения достигает 0, связанная с ним память освобождается. Этот механизм называется <b>подсчетом ссылок</b>.</p>
<p>Подсчет ссылок считается предпочтительным механизмом управления памятью. Используйте переменные, локальные для функций, передавайте значения, с которыми должны работать функции, и позвольте механизму подсчета ссылок позаботиться об управлении памятью. Если вам захочется получить чуть больше информации или контроля освобождения значений переменной, используйте функции <span class="code">isset()</span> и <span class="code">unset()</span>.</p>
<p>Чтобы проверить, было ли присвоено значение переменной (любое значение, даже пустая строка), используйте функцию <span class="code">isset()</span>:</p>
<pre><code>&lt;?php
$s1 = isset($name); // $s1 содержит false
$name = "Fred";
$s2 = isset($name); // $s2 содержит true
?></code></pre>
<p>Для удаления значений переменных используйте функцию <span class="code">unset()</span>:</p>
<pre><code>&lt;?php
$name = "Fred";
unset($name); // $name содержит NULL
?></code></pre>




<h2>Строковое представление сложных типов данных</h2>
<p><b>Задача:</b> Требуется получить строковое представление массива или объекта для сохранения в файле или базе данных. Такая строка должна обеспечивать простое восстановление исходного массива или объекта.</p>
<p><b>Решение:</b> Воспользуйтесь функцией <span class="code">serialize()</span> для <b>сериализации</b> данных, то есть кодирования переменных и их значений в текстовую форму:</p>
<pre><code>&lt;?php
$pantry = array('sugar' => '2 lbs.','butter' => '3 sticks');
$fp = fopen('/tmp/pantry','w') or die ("Can't open pantry");
fputs($fp,serialize($pantry));
fclose($fp);
?></code></pre>
<p>Восстановление переменных осуществляется функцией unserialize():</p>
<pre><code>&lt;?php
// $new_pantry будет содержать массив:
// array('sugar' => '2 lbs.','butter' => '3 sticks'
$new_pantry = unserialize(file_get_contents('/tmp/pantry'));
?></code></pre>
<p>Чтобы упростить взаимодействие с другими языками (за счет некоторого снижения быстродействия), воспользуйтесь функцией json_encode() для сериализации данных:</p>
<pre><code>&lt;?php
$pantry = array('sugar' => '2 lbs.','butter' => '3 sticks');
$fp = fopen('/tmp/pantry.json','w') or die ("Can't open pantry");
fputs($fp,json_encode($pantry));
fclose($fp);
?></code></pre>
<p>Закодированные данные восстанавливаются функцией json_decode():</p>
<pre><code>&lt;?php
// $new_pantry будет содержать массив:
// array('sugar' => '2 lbs.','butter' => '3 sticks')
$new_pantry = json_decode(file_get_contents('/tmp/pantry.json'), TRUE);
?></code></pre>
<p>Сериализованная строка PHP в $pantry выглядит примерно так:
    <span class="code">a:2:{s:5:"sugar";s:6:"2 lbs.";s:6:"butter";s:8:"3 sticks";}</span></p>
<p>Версия, закодированная по правилам JSON, выглядит так:
    <span class="code">{"sugar":"2 lbs.","butter":"3 sticks"}</span></p>
<p>Дополнительные символы, отсутствующие в JSON-строке, содержат информацию
    о типах и длинах значений. Строка выглядит тяжеловесно, но зато немного быстрее декодируется. Если вы ограничиваетесь передачей данных между приложениями PHP, встроенной сериализации вполне достаточно. Если вам нужно
    работать с другими языками, используйте JSON.</p>
<p>И встроенная сериализация и JSON сохраняют достаточно информации для восстановления всех значений в массиве, но само имя переменной ни в одном из
    сериализованных форматов не сохраняется. JSON не умеет различать объекты
    и ассоциативные массивы в своем формате сериализации, поэтому при вызове
    json_decode() необходимо выбрать, что именно вам нужно. Если второй аргумент
    равен true, как в приведенном примере, вызов строит ассоциативный массив. Без
    аргумента то же представление JSON будет декодировано в объект класса stdClass
    с двумя свойствами: sugar и butter.</p>
<p>Если сериализованные данные передаются между страницами в URL-адресе,
    вызовите для них функцию urlencode(), чтобы обеспечить экранирование URLметасимволов:</p>
<pre><code>&lt;?php
$shopping_cart = array('Poppy Seed Bagel' => 2,
    'Plain Bagel' => 1,
    'Lox' => 4);
print '&lt;a href="next.php?cart='.urlencode(serialize($shopping_cart)).
    '">Next&lt;/a>';
?></code></pre>
<div class="code-example-output-title"><span>Вывод:</span>
    <div class="code-example-output">
<pre>
<?php
$shopping_cart = array('Poppy Seed Bagel' => 2,
    'Plain Bagel' => 1,
    'Lox' => 4);
print '<a href="next.php?cart='.urlencode(serialize($shopping_cart)).
    '">Next</a>';
?>
</pre>
    </div>
</div>
<h2>Вывод содержимого переменной в строковом виде</h2>
<p><b>Задача:</b>Требуется проанализировать значения, хранящиеся в переменной. Переменная может содержать сложный многомерный массив или объект, поэтому просто вывести содержимое переменной или перебрать элементы в цикле не удастся</p>
<p>Воспользуйтесь функцией var_dump(), print_r() или var_export() в зависимости
    от того, что именно нужно сделать. Функции var_dump() и print_r() строят представление переменных в формате, понятном для человека.
    Вывод функции print_r() получается чуть более компактным:
</p>
<pre><code>&lt;?php
$info = array('name' => 'frank', 12.6, array(3, 4));
print_r($info);
?></code></pre>
<div class="code-example-output-title"><span>Вывод:</span>
    <div class="code-example-output">
<pre>
<?php
$info = array('name' => 'frank', 12.6, array(3, 4));
print_r($info);
?>
</pre>
    </div>
</div>

<pre><code>&lt;?php
$info = array('name' => 'frank', 12.6, array(3, 4));
var_dump($info);
?></code></pre>
<div class="code-example-output-title"><span>Вывод:</span>
    <div class="code-example-output">
<pre>
<?php
$info = array('name' => 'frank', 12.6, array(3, 4));
var_dump($info);
?>
</pre>
    </div>
</div>
<p>Функция var_export() генерирует код PHP, при выполнении которого определяется экспортируемая переменная:</p>
<pre><code>&lt;?php
$info = array('name' => 'frank', 12.6, array(3, 4));
var_export($info);
?></code></pre>
<div class="code-example-output-title"><span>Вывод:</span>
    <div class="code-example-output">
<pre>
<?php
$info = array('name' => 'frank', 12.6, array(3, 4));
var_export($info);
?>
</pre>
    </div>
</div>




<h2>Не сортировано</h2>

<h3>Совместный доступ к переменным между процессами</h3>
<p><b>Задача:</b> Требуется организовать совместное использование информации процессами, с быстрым доступом к общим данным</p>
<p><b>Решение:</b> Воспользуйтесь функциональностью хранилища данных из расширения <span class="code">APC</span>.</p>
<pre><code>&lt;?php
// Получение старого значения
$population = apc_fetch('population');
// Работа с данными
$population += ($births + $immigrants - $deaths - $emigrants);
// Запись нового значения на прежнее место
apc_store('population', $population);
?></code></pre>
<p>Если расширение <span class="code">APC</span> недоступно, воспользуйтесь одним из двух расширений для работы с общей памятью, входящих в поставку PHP: <span class="code">shmop</span> или <span class="code">System V shared memory</span>.</p>
<pre><code>&lt;?php
// Создание ключа
$shmop_key = ftok(__FILE__, 'p');
// Создание блока общей памяти из 16384 байт
$shmop_id = shmop_open($shmop_key, "c", 0600, 16384);
// Чтение всего сегмента общей памяти
$population = shmop_read($shmop_id, 0, 0);
// Работа с данными
$population += ($births + $immigrants - $deaths - $emigrants);
// Сохранение значения в сегменте общей памяти
$shmop_bytes_written = shmop_write($shmop_id, $population, 0);
// Проверяем, что данные успешно поместились в сегменте
if ($shmop_bytes_written != strlen($population)) {
    echo "Can't write all of: $population\n";
}
// Закрытие дескриптора
shmop_close($shmop_id);
?></code></pre>
<p>При использовании расширения <span class="code">System V shared memory</span> данные хранятся в общем сегменте памяти, а для обеспечения монопольного доступа к общей памяти используется семафор:</p>
<pre><code>&lt;?php
$semaphore_id = 100;
$segment_id = 200;
// Получение дескриптора семафора, связанного с используемым
// сегментом общей памяти
$sem = sem_get($semaphore_id,1,0600);
// Получение монопольного доступа к семафору
sem_acquire($sem) or die("Can't acquire semaphore");
// Получение дескриптора сегмента общей памяти
$shm = shm_attach($segment_id,16384,0600);
// Каждое значение, хранящееся в сегменте,
// представлено целочисленным идентификатором
$var_id = 3476;
// Получение значения из сегмента общей памяти
if (shm_has_var($shm, $var_id)) {
    $population = shm_get_var($shm,$var_id);
}
// Или инициализация, если значение еще не было присвоено
else {
    $population = 0;
}
// Работа со значением
$population += ($births + $immigrants - $deaths - $emigrants);
// Сохранение значения в сегменте общей памяти
shm_put_var($shm,$var_id,$population);
// Освобождение дескриптора сегмента общей памяти
shm_detach($shm);
// Освобождение семафора, чтобы другие процессы могли захватить его
sem_release($sem);
?></code></pre>
<p>Если расширение <span class="code">APC</span> доступно, то хранилище данных позволяет исключительно удобно организовать обмен информацией между процессами PHP для разных запросов. Функция <span class="code">apc_store()</span> получает ключ и значение и сохраняет значение, связанное с указанным ключом. Также в третьем аргументе <span class="code">apc_store()</span> может передаваться необязательное время жизни (<b>TTL</b>, <i>Time To Live</i>) для ограничения продолжительности хранения значения в кэше в секундах.</p>
<p>Чтобы прочитать сохраненные данные, передайте ключ функции <span class="code">apc_fetch()</span>. Поскольку <span class="code">apc_fetch()</span> возвращает сохраненное значение или <span class="code">false</span> в случае неудачи, результат успешного вызова, вернувший <span class="code">false</span>, может быть трудно отличить от неудачного вызова. Для таких случаев <span class="code">apc_fetch()</span> поддерживает второй аргумент, передаваемый по ссылке; в нем содержится признак успешного вызова (<span class="code">true</span> или <span class="code">false</span>):</p>
<pre><code>&lt;?php
// Тест не пройден!
apc_store('passed the test?', false);
// $results содержит false, потому что хранимое значение ложно.
// $success содержит true, потому что вызов apc_fetch() завершился успешно.
$results = apc_fetch('passed the test?', $success);
?></code></pre>
<p>Кроме хранения и выборки данных, <span class="code">APC</span> также обеспечивает возможность более сложных операций с данными. Функции <span class="code">apc_inc()</span> и <span class="code">apc_dec()</span> выполняют атомарный инкремент и декремент хранимого числа, что делает их очень удобными для реализации быстрых счетчиков. Также можно реализовать упрощенную блокировку с использованием функции <span class="code">apc_add()</span>, которая вставляет переменную в хранилище данных только в том случае, если значение с указанным ключом еще не существует.</p>
<pre><code>&lt;?php
function update_recent_users($current_user) {
    $recent_users = apc_fetch('recent-users', $success);
    if ($success) {
        if (! in_array($current_user, $recent_users)) {
            array_unshift($recent_users, $current_user);
        }
    }
    else {
        $recent_users = array($current_user);
    }
    $recent_users = array_slice($recent_users, 0, 10);
    apc_store('recent-users', $recent_users);
}
$tries = 3;
$done = false;
while ((! $done) && ($tries-- > 0)) {
    if (apc_add('my-lock', true, 5)) {
        update_recent_users($current_user);
        apc_delete('my-lock');
        $done = true;
    }
}
?></code></pre>
<p>Вызов <span class="code">apc_add('my-lock', true, 5)</span> означает «<i>Вставить значение <span class="code">true</span> с ключом <span class="code">my-lock</span> только в том случае, если оно еще не существует, и ограничить срок его жизни пятью секундами</i>».</p>
<p>Итак, если операция выполняется
    успешно, то все последующие запросы, которые попытаются сделать то же самое
    (в ближайшие пять секунд), завершатся неудачей, пока вызов apc_delete('mylock') в первом запросе не удалит запись из хранилища данных. Например, вызов update_recent_users() в цикле, как в приведенном примере, ведет массив
    десяти последних пользователей. Цикл трижды пытается установить блокировку, после чего завершается</p>
<p>Если расширение APC недоступно, используйте расширение общей памяти для
    реализации совместного доступа к данным (хотя это и потребует большего объема работы).</p>
<p>Сегмент общей памяти представляет собой блок оперативной памяти, к которому могут обращаться разные процессы (например, процессы веб-сервера, занимающиеся обработкой запросов). Расширения shmop и System V shared memory
    решают аналогичную задачу, позволяя сохранять информацию и быстро и эффективно использовать ее в разных запросах, но они работают по-разному и в результате используют несколько отличающиеся интерфейсы.</p>
<p>Интерфейс функций shmop напоминает традиционные операции с файлами.
    Вы открываете сегмент, читаете данные, записываете их и закрываете сегмент.
    Как и в случае с файлами, встроенная структура в данных отсутствует — вы работаете с последовательностью символов. В листинге 5.5 сначала создается общий
    блок памяти. В отличие от файла, необходимо заранее объявить максимальный
    размер блока. В данном примере он составляет 16 384 байта:</p>
<p>Если файлы различаются по именам, то сегменты shmop различаются по ключам.
    В отличие от имен файлов, ключи представляют собой не строки, а целые числа,
    и запомнить их нелегко. По этой причине лучше воспользоваться функцией ftok()
    для преобразования удобного и понятного имени (в данном примере имени файла в форме __FILE__) в формат, подходящий для shmop_open(). Функция ftok()
    также получает односимвольный идентификатор проекта. Это позволяет предотвратить конфликты при случайном повторном использовании той же строки.
    В данном примере используется символ p (сокращение от PHP).</p>
<p>Функции shmop_create() передается ключ, флаг, разрешения (в восьмеричной
    форме) и размер блока. Список флагов приведен в таблице 5.2. Разрешения работают по тем же принципам, что и файловые разрешения; значение 0600 означает, что пользователь, создавший блок, может выполнять операции чтения
    и записи с ним. В этом контексте под «пользователем» имеется в виду не только
    процесс, создавший семафор, но и любой процесс с тем же идентификатором
    пользователя. Разрешения 0600 хорошо подходят для большинства ситуаций,
    в которых процессы веб-сервера работают от имени одного пользователя.</p>
<p>Флаг Описание
    a Открыть только для чтения.
    c Создать новый сегмент. Если сегмент уже существует, он открывается для чтения
    и записи.
    w Открыть для чтения и записи.
    n Создать новый сегмент. Если сегмент уже существует, происходит ошибка. Режим
    полезен для предотвращения ситуаций «гонки».</p>
<p>Получив дескриптор, вы можете прочитать данные из сегмента функцией shmop_
    read() и работать с данными:</p>
<pre><code>&lt;?php
// Чтение всего сегмента памяти
$population = shmop_read($shmop_id, 0, 0);
// Обработка данных
$population += ($births + $immigrants - $deaths - $emigrants);
?></code></pre>
<p>Этот код читает весь сегмент. Чтобы прочитать меньшее количество данных, измените второй и третий параметры. Второй параметр определяет начальную
    позицию, а третий — длину читаемых данных. Если длина равна 0, данные читаются до конца сегмента.</p>
<p>ются до конца сегмента.
    Чтобы сохранить модифицированные данные, вызовите функцию shmop_write()
    и освободите дескриптор функцией shmop_close():</p>
<pre><code>&lt;?php
// Сохранение значения в сегменте общей памяти
$shmop_bytes_written = shmop_write($shmop_id, $population, 0);
// Проверяем, что данные успешно поместились в сегменте
if ($shmop_bytes_written != strlen($population)) {
    echo "Can't write all of: $population\n";
}
// Закрытие дескриптора
shmop_close($shmop_id);
?></code></pre>
<p>Сегменты общей памяти имеют фиксированную длину. Если не принять меры
    предосторожности, вы можете попытаться записать больше данных, чем позволяет свободное место. Чтобы выявить такую ситуацию, сравните значение, возвращаемое shmop_write(), с длиной данных. Значения должны совпасть. Если
    функция shmop_write() вернула меньшее значение, значит, ей удалось записать
    это количество байт, прежде чем в сегменте кончилось место.</p>
<p>В отличие от shmop, функции System V shared memory похожи на функции массивов. Чтобы обратиться к части сегмента, вы указываете ключ, после чего операции с данными выполняются напрямую. В зависимости от сохраняемых данных
    этот прямой доступ может оказаться более удобным.</p>
<p>С другой стороны, это приводит к усложнению интерфейса; кроме того, System
    V shared memory также требует организовать управление блокировкой через
    семафор.</p>
<p>Семафор следит за тем, чтобы разные процессы не мешали друг другу при обращении к сегменту общей памяти. Прежде чем процесс сможет использовать
    сегмент, он должен захватить семафор. Завершив работу с сегментом, процесс
    освобождает семафор, и тот становится доступным для других процессов</p>
<p>Чтобы захватить семафор, воспользуйтесь функцией sem_get() для получения
    идентификатора семафора. Первый аргумент sem_get() содержит целочисленный
    ключ семафора. В качестве ключа можно использовать любое целое число при
    условии, что все программы, которым нужен доступ к этому конкретному семафору, будут использовать один ключ. Если семафор с заданным ключом еще не
    существует, он будет создан; максимальное количество процессов, которые могут
    обращаться к семафору, определяется вторым аргументом sem_get() (в данном
    случае 1); разрешения доступа к семафору определяются третьим аргументом
    sem_get() (0600). Разрешения работают так же, как для файлов и shmop, например:</p>
<pre><code>&lt;?php
$semaphore_id = 100;
$segment_id = 200;
// Получение дескриптора семафора, связанного с используемым
// сегментом общей памяти
$sem = sem_get($semaphore_id,1,0600);
// Получение монопольного доступа к семафору
sem_acquire($sem) or die("Can't acquire semaphore");
?></code></pre>
<p>Функция sem_get() возвращает идентификатор, ссылающийся на системный
    семафор. Идентификатор используется для захвата семафора функцией sem_
    acquire(). Функция ожидает до тех пор, пока ей удастся взять семафор под
    контроль (возможно, для этого придется дождаться освобождения семафора
    другим процессом), после чего возвращает true. В случае ошибки возвращается false. Возможными ошибками могут быть недействительные разрешения или
    нехватка памяти для создания семафора. После того как семафор будет захвачен,
    программа может читать данные из сегмента общей памяти:</p>
<pre><code>&lt;?php
// Получение дескриптора сегмента общей памяти
$shm = shm_attach($segment_id,16384,0600);
// Каждое значение, хранящееся в сегменте,
// представлено целочисленным идентификатором
$var_id = 3476;
// Получение значения из сегмента общей памяти
if (shm_has_var($shm, $var_id)) {
    $population = shm_get_var($shm,$var_id);
}
// Или инициализация, если значение еще не было присвоено
else {
    $population = 0;
}
// Работа со значением
$population += ($births + $immigrants - $deaths - $emigrants);

?></code></pre>
<p>Сначала программа устанавливает связь с конкретным сегментом общей памяти
    вызовом shm_attach(). Как и в случае с sem_get(), первый аргумент shm_attach()
    содержит целочисленный ключ, однако на этот раз он определяет нужный сегмент,
    а не семафор. Если сегмент с заданным ключом не существует, он создается другими аргументами. Второй аргумент (16384) содержит размер сегмента в байтах,
    а последний аргумент (0600) определяет разрешения доступа для сегмента. Вызов shm_attach(200,16384,0600) создает 16-килобайтный сегмент общей памяти,
    доступный для чтения и записи только для пользователя, который его создал.
    Функция возвращает идентификатор, необходимый для чтения изаписи в сегмент
    общей памяти.</p>
<p>После присоединения к сегменту для чтения переменных из него используется
    функция shm_get_var($shm, $var_id). Она обращается к сегменту, определяемому $shm, и читает значение переменной с целочисленным ключом $var_id.
    В общей памяти могут храниться любые переменные. После того как переменная
    будет прочитана, с ней можно работать так же, как с любой другой переменной.
    Вызов shm_put_var($shm, $var_id ,$population) записывает значение $population
    обратно в сегмент общей памяти, в переменную $var_id.</p>
<p>Работа с сегментом общей памяти завершена. Отсоединитесь от него вызовом
    shm_detach() и освободите семафор вызовом sem_release(), чтобы он мог использоваться другим процессом:</p>
<pre><code>&lt;?php
// Освобождение дескриптора сегмента общей памяти
shm_detach($shm);
// Освобождение семафора, чтобы другие процессы могли захватить его
sem_release($sem);
?></code></pre>
<p>Главное преимущество этой технологии — скорость. Но поскольку данные хранятся в оперативной памяти, их объем ограничен, и данные не сохраняются при перезагрузке (если только не принять специальных мер для записи информации
    на диск перед загрузкой и их повторной загрузки при запуске).
    System V shared memory не может использоваться вWindows, но функции shmop
    работают нормально.</p>

<h3>Назначение переменной псевдонима</h3>
<p>Чтобы назначить <span class="code">$black</span> псевдонимом переменной <span class="code">$white</span>, используйте следующую команду:</p>
<pre><code>$black =& $white;</code></pre>
<p>Старое значение <span class="code">$black</span>, если оно было, при этом теряется. Вместо этого <span class="code">$black</span> становится другим именем значения, хранящегося в <span class="code">$white</span>:</p>
<pre><code>&lt;?php
$bigLongVariableName = "PHP";
$short =& $bigLongVariableName;
$bigLongVariableName .= " rocks!";
print "\$short is $short &lt;br/>";
print "Long is $bigLongVariableName";
//$short is PHP rocks!
//Long is PHP rocks!
$short = "Programming $short";
print "\$short is $short &lt;br/>";
print "Long is $bigLongVariableName";
//$short is Programming PHP rocks!
//Long is Programming PHP rocks!
?></code></pre>
<p>После присваивания две переменные получают альтернативные имена для одного значения, причем удаление одной из них не повлияет на вторую:</p>
<pre><code>&lt;?php
$white = "snow";
$black =& $white;
unset($white);
print $black;
//snow
?></code></pre>
<p>Функции могут возвращать значения по ссылке, например, чтобы избежать копирования больших строк или массивов:</p>
<pre><code>&lt;?php
function &retRef() // обратите внимание на &
{
    $var = "PHP";
    return $var;
}
$v =& retRef(); // обратите внимание на &
?></code></pre>

<!--Футер (+скрипты)-->
<?php
include_once $_SERVER['DOCUMENT_ROOT']."/common/footer.php";
?>