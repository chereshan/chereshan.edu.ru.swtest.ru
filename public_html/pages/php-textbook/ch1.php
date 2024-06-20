<!--Хедер (+скрипты)-->
<?
$PageTitle="Глава 1. Введение в PHP";
function customPageHeader(){?>
  <title>Глава 1. Введение в PHP</title>
<?}
include_once $_SERVER['DOCUMENT_ROOT']."/common/header.php";
?>


<h2>Краткая история PHP</h2>
<!--todo: write history of PHP-->
<p><abbr title="Rasmus Lerdorf">Расмус Лердорф</abbr> начал задумываться о создании PHP в 1994 году, но PHP, который используется сегодня, сильно отличается от исходной версии.</p>
<h2>Зачем нужен PHP?</h2>
<p><b>Серверные скрипты:</b> Язык PHP изначально разрабатывался для создания динамического веб-контента и до сих пор лучше других языков подходит для этой задачи. Для генерирования разметки HTML вам понадобится <i>парсер PHP</i> и <i>веб-сервер для отправки закодированных файлов</i>. PHP также отлично генерирует динамический контент через подключение к БД, документы XML, графику, файлы PDF и т. д.</p>
<p><b>Скрипты командной строки:</b> PHP может выполнять скрипты в режиме командной строки по аналогии с Perl, awk или командной оболочкой Unix. Скрипты командной строки могут использоваться для таких задач системного администрирования, как резервное копирование и разбор журналов, а также для разработки некоторых скриптов в стиле заданий CRON (невизуальных задач PHP).</p>
<p><b>PHP - это интерпретатор, а не компилятор</b>. Компиляторы создают исполняемый код, который может выполняться без самого компилятора. Интерпретатор такого кода не создает, поэтому для выполнения программ, написанных на PHP, вам понадобится интерпретатор PHP — программа, которая будет выполнять ваши PHP-сценарии.</p>
<h2>Клиентская и серверная стороны веб-приложения</h2>
<p>Вспомним написание HTML-страниц. Браузер имеет все необходимое, чтобы загрузить и отобразить HTML-страницу. Дополнительных внешних программ не требуется. То же самое касалось стилей и JS-скриптов. Все это треовало не более, чем браузера. </p>
<p>На рисунке ниже показана реализация клиентской стороны веб-сайта.</p>
<img src="https://ltdfoto.ru/images/2024/06/12/imagebcaa841dfa00901d.png" alt="client-side"/>
<p>Картина меняется когда сайт перестает быть статическим. Загружая браузер мы получаем HTML, CSS и JS, но не PHP. PHP-скрипты должны интерпретироваться программой интерпретатором, которая и называется php. И просто так добавить PHP-интерпретатор к браузеру нельзя, он просто не предназначен для интерпретации PHP.</p>
<p>Вместо этого PHP должен быть на веб-сервере. Именно он, а не браузер может взаимодействовать с интерпретатором PHP. Этот сервер берет наши PHP-сценарии и выполняет их, а потом отправляет полученный результат обратно браузеру. При таком сценарии браузер формирует запросы к серверу, получает от него ответы и отображает их.</p>
<p>В общем случае процесс имеет следующий вид:</p>
<div style="display: flex">
    <img src="https://ltdfoto.ru/images/2024/06/12/imageb1bc83933fdf557f.png" alt="server-side with php" style="margin: 0px;height: 300px;align-items: center;"/>
    <ol>
        <li>Браузер формирует запрос для очередной страницы. Эта страница может быть URL-ссылкой на ресурс на удаленном сервере либо локальным файлом на компьютере.</li>
        <li>Запрос поступил на сервер. Сервер возвращает запрошенный HTML и передает PHP-запрос в интерпретатор PHP.</li>
        <li>Интерпретатор интерпретирует PHP-скрипт. Результатом будет нечто понятное браузеру, например, HTML. Интерпретатор возвращает ответ веб-серверу</li>
        <li>Веб-сервер передает браузеру нечто понятное ему - результат выполнения PHP в виде HTML, CSS, JS или их сочетания.</li>
    </ol>
</div>
<p>Таким образом, если вы желаете писать на PHP и видеть результат своих скриптов, то у вас 2 варианта:</p>
<ol>
    <li>Установить PHP на локальный компьютер. Для этого нужен локальный веб-сервер, чтобы дирижировать интерпретатором PHP. </li>
    <li>Развернуть тестовый сайт на хостинге и выгружать на него все нововведения для тестирования. </li>
</ol>
<!--todo: написать про wamp-установку-->
<!--todo: написать инструкцию по настройке spaceweb бесплатного сайта с работающей синхронизацией ftp-->
<h2>Hello, world!</h2>
<p>Начнем с традиционного<span class="code">Hello, world!</span>.</p>
<pre><code>&lt;?php
echo 'Hello, world!'
?></code></pre>
<div class="code-example-output-title"><span>Вывод:</span>
<div class="code-example-output">
    <?php
    echo 'Hello, world!'
    ?>
</div>
</div>


<h2>PHP и HTML</h2>
<p>Подходя к изучению серверной части веб-приложений у вас, должно быть, уже на сетчатке глаз отпечатолось четкое разделение технологий по функциям: HTML - разметка и структура; CSS - стили страницы; JS - интерактивность элементов страницы. Однако, имея дело с PHP, придется забыть эти категории. PHP смешивает их без разбору. Можно написать PHP-скрипт, который будет выолнять запрограммированную задачу, а затем возвращать на выход HTML, CSS и JS.</p>

<h3>Расширение <span class="code">.php</span></h3>
<p>Параметры конфигурации PHP обычно хранятся в файле с именем <span class="code">php.ini</span>. Настройки в этом файле управляют поведением разных функций PHP, таких, как поддержка сеансов и обработка форм.</p>
<p>По умолчанию в конце имен PHP-документов ставится расширение <span class="code">.php</span>. Соответственно, если веб-сервер поддерживает PHP и если он видит файл с расширением <span class="code">.php</span>, то он атоматически передаст его на обработку интерпретатору PHP. Интерпретатор выполнит его и вернет результат обратно веб-серверу, который транслирует его в браузер пользователя. Таким образом, результатом интерпретации PHP-кода, передаваемым браузеру не может быть PHP-код.</p>
<p>Веб-серверы имеют довольно широкий диапазон настроек, и некоторые веб-разработчики выбирают такой режим работы, при котором для разбора PHP-процессору принудительно передаются также файлы с расширениями HTM или HTML. Обычно это связано с тем, что разработчики хотят скрыть факт использования PHP.</p>

<h2>Размещение PHP-кода</h2>
<p>Существуют 2 распространенных способа размещения <span class="code">&lt;?php?></span>-тэга:</p>
<ol>
    <li>Помещать в эти теги как можно меньшие фрагменты кода PHP и именно в тех местах, где нужно воспользоваться динамическими сценариями, а весь остальной документ составлять из стандартного кода HTML. (Такой код выполняется быстрее)</li>
    <li>Другие программисты открывают его в начале документа, а закрывают в самом конце и выводят любой код HTML путем непосредственного использования команды PHP. (увеличение скорости настолько мизерное, что оно не может оправдать дополнительные сложности многочисленных вставок PHP в отдельно взятый документ)</li>
</ol>
<p>Несмотря на то что при выборе <span class="code">&lt;?</span> неочевиден вызов PHP-парсера, это вполне приемлемый альтернативный синтаксис, который, как правило, также работает. Но не его использоать не рекомендуется, поскольку он несовместим c XML и в настоящее время его применение не приветствуется (это значит, что его поддержка может быть удалена в будущих версиях).</p>
<p>Если в файле содержится только код PHP, то закрывающий тег <span class="code">?></span> можно опустить. Именно так и нужно делать, чтобы гарантировать отсутствие в файлах PHP лишнего пустого пространства (что имеет особую важность при написании объектно-ориентированного кода).</p>

<!--todo: сократить раздел до минимальной информации-->
<h2>Включение внешнего кода</h2>
<p>PHP поддерживает две конструкции для загрузки кода и HTML из другого модуля: <span class="code">require</span> и <span class="code">include</span>. Они загружают файл в процессе выполнения скрипта PHP, работают в условных командах и циклах и сигнализируют, если файл не удается найти. Для поиска файлов используется либо путь, указанный как часть указателя, либо значение параметра <span class="code">include_path</span> в файлах <span class="code">php.ini</span>. Параметр <span class="code">include_path</span> может быть переопределен функцией <span class="code">set_include_path()</span>. Если файл не найден, PHP ищет файл в каталоге вызывающего скрипта. Попытка выполнения <span class="code">require</span> с несуществующим файлом приводит к неисправимой ошибке, тогда как <span class="code">include</span> выдает предупреждение, не останавливая выполнение скрипта.</p>
<p>Команда <span class="code">include</span> чаще всего используется для отделения контента, специфического для страницы, от общих элементов дизайна сайта. Общие элементы (такие, как заголовки и завершители) хранятся в отдельных файлах HTML, а каждая страница выглядит примерно так:</p>
<pre><code>&lt;?php include "header.html"; ?>
основной контент
&lt;?php include "footer.html"; ?></code></pre>
<p>Мы используем <span class="code">include</span>, потому что эта команда позволяет PHP продолжить обработку страницы, даже если в файле (файлах) дизайна сайта присутствует ошибка. Конструкция <span class="code">require</span> больше подходит для работы с библиотекой, страница которой в случае неудачной загрузки просто не отображается. Пример:</p>
<pre><code>&lt;?php
require "codelib.php";
mysub(); // определяется в codelib.php
?></code></pre>
<p>Существует другой, чуть более эффективный способ реализации заголовков
и завершителей, в котором сначала загружаются одиночные файлы, после чего
вызываются функции, генерирующие стандартизированные элементы сайта:</p>
<pre><code>&lt;?php require "design.php";
header(); ?>
content
&lt;?php footer();</code></pre>
<p>Если PHP не может разобрать какую-либо часть файла, добавленного <span class="code">include</span> или <span class="code">require</span>, выводится предупреждение и выполнение продолжается. Чтобы не получать предупреждение, поставьте перед вызовом оператор <span class="code">@</span> — например,
<span class="code">@include</span>.</p>
<p>Если в файле конфигурации PHP <span class="code">php.ini</span> включен параметр <span class="code">allow_url_fopen</span>, вы сможете добавлять файлы с удаленного сайта, указывая URL-адрес вместо обычного локального пути:</p>
<pre><code>&lt;?php
include "http://www.example.com/codelib.php";
?></code></pre>
<p>Если программа использует <span class="code">include</span> или <span class="code">require</span> для повторного включения файла (например, ошибочно в цикле), файл будет загружен, а хранящийся в нем код выполнен или разметка HTML будет выведена дважды. Это может привести к ошибкам при переопределении функций или отправке нескольких копий заголовков или разметки HTML. Для предотвращения подобных ошибок используются конструкции <span class="code">include_once</span> и <span class="code">require_once</span>, позволяющие загружать конкретный файл только один раз. Это полезно, например, для добавления элементов страницы, хранящихся в отдельных файлах. Библиотеки элементов должны загружать пользовательские настройки командой <span class="code">require_once</span>, чтобы создатель страницы включал элементы, не проверяя, был ли код пользовательских настроек уже загружен ранее.</p>
<p>Код включенного файла импортируется с областью видимости, действующей
на момент обнаружения команды <span class="code">include</span>, поэтому включенный код может увидеть и изменить переменные исходного кода. Данная возможность позволяет, например, библиотеке отслеживания пользователей сохранить имя текущего пользователя в глобальной переменной <span class="code">$user</span>:
</p>
<pre><code>&lt;?php
// главная страница
include "userprefs.php";
echo "Hello, {$user}.";
?></code></pre>
<p>Тот факт, что библиотеки смогут видеть и изменять ваши переменные, также
может создать проблемы. Вы должны знать все глобальные переменные, используемые библиотекой, чтобы случайно не использовать их для собственных
целей и не вмешаться в работу библиотеки.</p>
<p>Если конструкция include или require находится в функции, переменные во
включенном файле становятся переменными, обладающими областью видимости этой функции.</p>
<p>Функция <span class="code">get_included_files()</span> возвращает массив с полными системными
    именами всех файлов, включенных в скрипт посредством <span class="code">include</span> или <span class="code">require</span>.
    Файлы, при разборе которых произошла ошибка, в массив не включаются.</p>


<h2>Каталоги сайта</h2>
<ul>
    <li><span class="code">/</span> - корневой (root), или домашний (home), каталог. Обычно это место, на которую ссылается домашняя страница.</li>
    <li><span class="code">css/</span> - каталог со стилями сайта.</li>
    <li><span class="code">js/</span> - каталог с js-скриптами.</li>
    <li><span class="code">php/</span> или <span class="code">scripts/</span> - каталог с php-скриптами. Применение <span class="code">scripts/</span> является правилом хорошего тона среди разработчиков.</li>
    <li><span class="code">page/</span></li>
</ul>

<h2>Основы PHP</h2>
<p>Теперь перейдем к краткому экскурсу основ PHP.</p>
<p><b>Основные черты PHP:</b></p>
<ul>
    <li>Комментарии: <span class="code">//однострочник</span>, <span class="code">/*многотрочник*/</span> и <span class="code"># </span>
<pre><code>#######################
## Функции Cookie
#######################</code></pre></li>
    <li>Команды PHP завершаются <b>обязательно</b> точкой с запятой <span class="code">;</span>. После блока <span class="code">{...}</span> или перед закрывающим тегом <span class="code">?></span> точки с запятой не требуется.</li>
    <li>Перед именем всех переменных ставится <span class="code">$</span></li>
    <li>В PHP используются стандартные литералы: <span class="code">'string'</span>, <span class="code">456</span>, <span class="code">true</span>, <span class="code">1.4234</span>, <span class="code">null</span>
        <pre><code class="language-php">&lt;?php
$myname = "Brian";
$myage = 37;
echo "a: " . 73 . "&lt;br>"; // Числовой литерал
echo "b: " . "Hello" . "&lt;br>"; // Строковый литерал
echo "c: " . FALSE . "&lt;br>"; // Литерал константы
echo "d: " . $myname . "&lt;br>"; // Строковая переменная
echo "e: " . $myage . "&lt;br>"; // Числовая переменная
?></code></pre>
    </li>
    <li>Отсчет индексов начинается с <span class="code">0</span></li>
    <li>PHP чувствителен к регистру переменных, но не чувствителен к регистру встроенных конструкций и ключевых слов
<!--        todo: переписать пример ниже в tip-->
    <pre><code>&lt;?php
//ниже приведенные строки эквивалентны    
echo("Hello, world");
ECHO("Hello, world");
EcHo("Hello, world");
?></code></pre>
    </li>
    <li>PHP - <b>слабо типизированный язык</b>, т.е. переменные не требуют объявления перед использованием и PHP всегда преобразует переменные в тот тип, который требуется для их окружения на момент доступа к ним. </li>
    <li>PHP будет игнорировать любые отступы, кроме простых разделений команд (как во всех языках).</li>
</ul>


<h3>Переменные</h3>
<p>А в PHP символ <span class="code">$</span> должен ставиться перед именами всех переменных. К какому бы типу ни относились переменные — к числам, строкам или массивам, все они должны выглядеть так, как показано</p>
<pre><code class="language-php">&lt;?php
 $mycounter = 1;
 $mystring = "Hello";
 $myarray = array("One", "Two", "Three");
?></code></pre>
<h4>Правила присваивания имен переменных</h4>
<ul>
    <li>Имена после знака <span class="code">$</span> должны начинаться с буквы или с _</li>
    <li>Имена могут содержать <span class="code">[a-zA-Z0-9_]</span></li>
    <li>Имена не могут включать пробелы</li>
    <li>Имена переменных чувствительны к регистру символов</li>
</ul>
<p>Примеры недопустимых имен:</p>
<pre><code>&lt;?php
$not valid
$|
$3wa
?></code></pre>
<!--todo: сделать все комментарии tip подсказками-->

<h3>Типы данных</h3>
<p>PHP поддерживает 8 типов данных</p>
<ol>
    Скалярные типы (tip: состоящие из одного значения):
    <li>Целые числа (<span class="code">int</span>)</li>
    <li>Числа с плавающей точкой (<span class="code">float</span>)</li>
    <li>Строки (<span class="code">str</span>)</li>
    <li>Булевые переменные (<span class="code">true</span>, <span class="code">false</span>)</li>
    Коллекции:
    <li>Массивы</li>
    <li>Объекты</li>
    Специальные типы:
    <li><span class="code">null</span></li>
    <li>Ресурсы</li>
</ol>

<h4>Преобразование типов</h4>
<style type="text/css">
    .tg  {border-collapse:collapse;border-spacing:0;}
    .tg td{border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;
        overflow:hidden;padding:10px 5px;word-break:normal;}
    .tg th{border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;
        font-weight:normal;overflow:hidden;padding:10px 5px;word-break:normal;}
    .tg .tg-6e8n{background-color:#c0c0c0;border-color:inherit;font-weight:bold;text-align:left;vertical-align:top}
    .tg .tg-0pky{border-color:inherit;text-align:left;vertical-align:top}
</style>
<table class="tg">
    <thead>
    <tr>
        <th class="tg-6e8n">Тип преобразования</th>
        <th class="tg-6e8n">Описание</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td class="tg-0pky"><span class="code">(int)</span> <span class="code">(integer)</span></td>
        <td class="tg-0pky">В целое число через отбрасывание десятичной части.</td>
    </tr>
    <tr>
        <td class="tg-0pky"><span class="code">(bool)</span> <span class="code">(boolean)</span></td>
        <td class="tg-0pky">В логическое значение.</td>
    </tr>
    <tr>
        <td class="tg-0pky"><span class="code">(float)</span> <span class="code">(double)</span> <span class="code">(real)</span></td>
        <td class="tg-0pky">В число с плавающей точкой.</td>
    </tr>
    <tr>
        <td class="tg-0pky"><span class="code">(string)</span></td>
        <td class="tg-0pky">В строку.</td>
    </tr>
    <tr>
        <td class="tg-0pky"><span class="code">(array)</span></td>
        <td class="tg-0pky">В массив.</td>
    </tr>
    <tr>
        <td class="tg-0pky"><span class="code">(object)</span></td>
        <td class="tg-0pky">В объект.<br></td>
    </tr>
    </tbody>
</table>

<h5>Преобразование bool</h5>
<p>Следующие значения интерпретируются как <span class="code">false</span> и <span class="code">true</span>:</p>
<pre><code>&lt;?php
//false
false==false;
0==false;
0.0==false;
''==false;
array()==false;
NULL=false;
//true
true==true;
5==true;

is_bool('');
?></code></pre>
<h5>Число и строка</h5>
<p>PHP автоматически преобразует типы. Например, автоматическое преобразование числа в строку:</p>
<pre><code class="language-php">&lt;?php
 $number = 12345 * 67890;
 echo substr($number, 3, 1);
?></code></pre>
<p>Автоматическое преобразование строки в число:</p>
<pre><code class="language-php">&lt;?php
 $pi = "3.1415927";
 $radius = 5;
 echo $pi * ($radius * $radius);
?></code></pre>


<h3>Строки</h3>
<p>Для строк используются типичные для других языков литералы <span class="code">'</span> и <span class="code">"</span>.</p>
<p>В PHP используются аналогичные JS служебные последовательности, вроде <span class="code">\\</span>, <span class="code">\"</span>, <span class="code">\n</span> и т.д.
</p>
<p>Если требуется включить в состав строки значение переменной (форматировать строку), то используется строка, заключенная в двойные кавычки с просто прописанным именем переменной:</p>
<pre><code class="language-php">echo "На этой неделе ваш профиль просмотрело $count человек ";</code></pre>
<p>Инструкция <span class="code">echo</span> может выводить сразу несколько строк</p>
<pre><code class="language-php">&lt;?php
 $author = "Steve Ballmer";
 echo "Developers, Developers, developers, developers,
 developers,developers, developers, developers, developers!
 $author.";
?></code></pre>
<h4>Многострочное присваивание</h4>
<p>Если необходимо присвоить переменной сразу несколько строк, то в PHP предусмотрено многострочное присваивание:</p>
<pre><code class="language-php">&lt;?php
 $author = "Bill Gates";
 $text = "Measuring programming progress by lines of code is like
 measuring aircraft building progress by weight.
 – $author.";
?></code></pre>
<p>Другой способ присваивания переменной многострочного значения:</p>
<pre><code class="language-php">&lt;?php
 $author = "Scott Adams";
 $out = &lt;&lt;&lt;_END
 Normal people believe that if it ain't broke, don't fix it.
 Engineers believe that if it ain't broke, it doesn't have enough
 features yet.
 – $author.
_END;
echo $out;
?></code></pre>

<h4>Конкатенация строк</h4>
<p>Самый простой способ объединения строк выглядит следующим образом:</p>
<pre><code class="language-php">echo "У вас " . $msgs . " сообщений.";</code></pre>
<p>Так же как с помощью оператора += можно добавить значение к числовой переменной, с помощью оператора .= можно добавить одну строку к другой:</p>
<pre><code class="language-php"><$bulletin .= $newsflash;</code></pre>

<h3>Массивы</h3>
<pre><code class="language-php">&lt;?php
$team = array('Bill', 'Mary', 'Mike', 'Chris', 'Anne');
echo $team[3];/*Эта команда отображает имя Chris*/
/*Двумерный массив*/
$oxo = array(array('x', ' ', 'o'),
        array('o', 'o', 'x'),
        array('x', 'o', ' '));
echo $oxo[1][2]; // Эта команда отображает х
?></code></pre>
<h4>Перебор массива</h4>
<pre><code>&lt;?php
foreach ($person as $name) {
    echo "Hello, {$name}&lt;br/>";
}
foreach ($creator as $invention => $inventor) {
    echo "{$inventor} invented the {$invention}&lt;br/>";
}
?></code></pre>

<pre><code>&lt;?php
$person = array("Edison", "Wankel", "Crapper");
$creator = array('Light bulb' => "Edison",
    'Rotary Engine' => "Wankel",
    'Toilet' => "Crapper");
foreach ($creator as $invention => $inventor) {
    echo "{$inventor} invented the {$invention}&lt;br/>";
}
?></code></pre>
<div class="code-example-output-title"><span>Вывод:</span>
    <div class="code-example-output">
<pre>
<?php
$person = array("Edison", "Wankel", "Crapper");
$creator = array('Light bulb' => "Edison",
    'Rotary Engine' => "Wankel",
    'Toilet' => "Crapper");
foreach ($creator as $invention => $inventor) {
    echo "{$inventor} invented the {$invention}<br/>";
}
?>
</pre>
    </div>
</div>
<h4>Сортировка массива</h4>
<pre><code>&lt;?php
$person = array("Edison", "Wankel", "Crapper");
$creator = array('Light bulb' => "Edison",
    'Rotary Engine' => "Wankel",
    'Toilet' => "Crapper");
sort($person);
print_r($person);
?></code></pre>
<div class="code-example-output-title"><span>Вывод:</span>
    <div class="code-example-output">
<pre>
<?php
$person = array("Edison", "Wankel", "Crapper");
$creator = array('Light bulb' => "Edison",
    'Rotary Engine' => "Wankel",
    'Toilet' => "Crapper");
sort($person);
print_r($person);
?>
</pre>
    </div>
</div>


<h3><span class="code">echo</span> и <span class="code">print</span></h3>
<p>В общем, команда <span class="code">echo</span> обычно работает при выводе обычного текста быстрее <span class="code">print</span>, поскольку она не устанавливает возвращаемое значение. С другой стороны, поскольку она не является функцией, ее, в отличие от <span class="code">print</span>, нельзя использовать как часть более сложного выражения.</p>  
<p>В следующем примере для вывода информации о том, является значение переменной истинным (<span class="code">TRUE</span>) или ложным (<span class="code">FALSE</span>), используется функция <span class="code">print</span>, но сделать то же самое с помощью команды <span class="code">echo</span> не представляется возможным, поскольку она выведет на экран сообщение об ошибке синтаксического разбора — <span class="code">Parse error</span>:</p>
<pre><code class="language-php">$b ? print "TRUE" : print "FALSE";</code></pre>
<p>C помощью инструкции <span class="code">echo</span> можно выводить сразу несколько строк:</p>
<pre><code class="language-php">&lt;?php
 $author = "Brian W. Kernighan";
 echo &lt;&lt;&lt;_END
 Debugging is twice as hard as writing the code in the first place.
 Therefore, if you write the code as cleverly as possible, you are,
 by definition, not smart enough to debug it.
 $author.
_END;
?></code></pre>
<p>Этот код предписывает PHP вывести все, что находится между двумя тегами <span class="code">_END</span>, как будто все это является строкой, заключенной в двойные кавычки (за исключением того, что изменять предназначение кавычек в heredoc не нужно). Это означает, что разработчику можно, например, написать целый раздел HTML-кода прямо в коде PHP, а затем заменить конкретные динамические части переменными PHP.</p>

<h3>Операторы</h3>
<h4>Арифметические операции</h4>
<p>В PHP определены как базовые бинарные арифметические операции, так и унарные такие, как:</p>
<table>
    <tbody>
    <tr>
        <td>Описание</td>
        <td>Пример</td>
    </tr>
    <tr>
        <td>Инкремент</td>
        <td><span class="code">++$j</span></td>
    </tr>
    <tr>
        <td>Декремент</td>
        <td><span class="code">--$j</span></td>
    </tr>
    <tr>
        <td>Возведение в степень</td>
        <td><span class="code">$j**3</span></td>
    </tr>
    </tbody>
</table>

<h4>Операторы присваивания</h4>
<p>Аналогичные другим языкам за исключением <span class="code">.=</span></p>

<h4>Операторы сравнения</h4>
<p>Аналогичные другим языкам за исключением <span class="code">&lt;></span> (второй вариант "не равно"), <span class="code">===</span> (тождественно) и <span class="code">!==</span> (не тождественно)</p>

<h4>Логические операторы</h4>
<pre><code class="language-php">if ($hour > 12 && $hour < 14) dolunch();</code></pre>
<p>Аналогично другим языкам, т.е. PHP имеет следующие логические операторы: <span class="code">and</span> (<span class="code">&&</span>), <span class="code">or</span> (<span class="code">||</span>), <span class="code">!</span>, <span class="code">xor</span> (исключающее ИЛИ).</p>

<h3>Функции</h3>
<p>Простое объявление функции:</p>
<pre><code class="language-php">&lt;?php
 function longdate($timestamp)
 {
 return date("l F jS Y", $timestamp);
 }
?></code></pre>
<p>Важно заметить, что имена функция нечувствительны к регистру:</p>
<pre><code>&lt;?php
howdy HoWdY HOWDY HOWdy howdy #одна и та же функция
?></code></pre>
<p>Эта функция возвращает дату в формате «день_недели месяц число год». Между стоящими после имени функции круглыми скобками может размещаться любое количество параметров, но для этой функции выбран прием только одного параметра. Весь код, который выполняется при последующем вызове функции, заключается в фигурные скобки. Обратите внимание, что в этом примере первой буквой в вызове функции даты является <span class="code">L</span> в нижнем регистре, которую не следует путать с цифрой 1.</p>
<p>Чтобы с помощью этой функции вывести сегодняшнюю дату, нужно поместить свой код следующий вызов:</p>
<pre><code class="language-php">echo longdate(time());</code></pre>

<?
function longdate($timestamp)
{
    return date("l F jS Y", $timestamp);
}
?>
<div class="code-example-output-title"><span>Вывод:</span>
<div class="code-example-output">
<?echo longdate(time());?>
</div>
</div>

<h3>Константы</h3>
<p><b>Константа</b> — идентификатор значения, которое не может изменяться. Присвоенное константе значение остается неизменным. Для определения констант используется функция <span class="code">define()</span>, после чего программа обращается к константам по идентификаторам:</p>
<pre><code>&lt;?php
define('PUBLISHER', "O'Reilly Media");
echo PUBLISHER;
?></code></pre>

<h3>Ключевые слова</h3>
<p>Ключевое слово резервируется в языке для некой функциональности, поэтому функции, классу или константе невозможно присвоить имя, которое является ключевым словом. Список зарезервированных ключевых слов можно посмотреть ниже:</p>
<!--todo: раскрыающийся список зарезервированных слов, который по дефолт закрыт-->

<button id="key_words_table-toggle">Скрыть/показать список</button>
<div id="key_words_table"><table class='no-headers' style="display:none;"></table></div>
<!--todo: функции построения таблиц надо переписать на php, чтобы на них действовал хайлайтинг как минимум-->
<script>
    let key_words=`__CLASS__ echo insteadof
    __DIR__ else interface
    __FILE__ elseif isset()
    __FUNCTION__ empty() list()
    __LINE__ enddeclare namespace
    __METHOD__ endfor new
    __NAMESPACE__ endforeach or
    __TRAIT__ endif print
    __halt_compiler() endswitch private
    abstract endwhile protected
    and eval() public
    array() exit() require
    as extends require_once
    break final return
    callable finally static
    case for switch
    catch foreach throw
    class function trait
    clone global try
    const goto unset()
    continue if use
    declare implements var
    default include while
    die() include_once xor
    do instanceof yield
    yield from`.split(/ |\\n/).filter(str=>str!='').map(str=>str.replace('\n',''))
    key_words=key_words.slice(0,-2).concat(key_words.slice(-2).join(' '))
    $(function(){
        list_to_table(key_words, 3, '#key_words_table')
        $('#key_words_table-toggle').on('click', function(){
            $('#key_words_table table').toggle('display')
        })
    })
</script>

<h3>Объекты</h3>
<p>PHP имеет ООП-функционал. Основным же структурными элементом архитектуры ООП является класс, которые содержат свойства и методы:</p>
<pre><code>&lt;?php
class Person
{
    public $name = '';
    function name ($newname = NULL)
    {
        if (!is_null($newname)) {
            $this->name = $newname;
        }
        return $this->name;
    }
}
?></code></pre>
<p>Когда класс определен, то на его основе можно создавать неограниченное число объектов при помощи ключевого слова <span class="code">new</span>. Для обращения к свойствам и методам объекта используется конструкция <span class="code">-></span>:</p>
<pre><code>&lt;?php
$ed = new Person;
$ed->name('Edison');
echo "Hello, {$ed->name} &lt;br/>";
$tc = new Person;
$tc->name('Crapper');
echo "Look out below {$tc->name} &lt;br/>";
?></code></pre>

<!--Футер (+скрипты)-->
<?php
include_once $_SERVER['DOCUMENT_ROOT']."/common/footer.php";
?>