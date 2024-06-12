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
<p>Файлы PHP определяются расширением <span class="code">.php</span>. Соответственно, если веб-сервер поддерживает PHP и если он видит файл с расширением <span class="code">.php</span>, то он передаст его на обработку интерпретатору PHP. Интерпретатор выполнит его и вернет результат обратно веб-серверу, который транслирует его в браузер пользователя. Таким образом, результатом интерпретации PHP-кода, передаваемым браузеру не может быть PHP-код.</p>

<h2>Размещение PHP-кода</h2>
<!--TODO: Дать нормальное имя-->
<p>Параметры конфигурации PHP обычно хранятся в файле с именем <span class="code">php.ini</span>. Настройки в этом файле управляют поведением разных функций PHP, таких, как поддержка сеансов и обработка форм.</p>
<p>По умолчанию в конце имен PHP-документов ставится расширение <span class="code">.php</span>. Когда веб-сервер встречает в запрашиваемом файле это расширение, он автоматически передает файл PHP-процессору. Веб-серверы имеют довольно широкий диапазон настроек, и некоторые веб-разработчики выбирают такой режим работы, при котором для разбора PHP-процессору принудительно передаются также файлы с расширениями HTM или HTML. Обычно это связано с тем, что разработчики хотят скрыть факт использования PHP.</p>
<p>Программа на PHP отвечает за возвращение файла в чистом виде, пригодном для отображения в браузере. В простейшем случае на выходе документа PHP будет получаться только код HTML. Чтобы убедиться в этом, можно взять любой HTML-документ и сохранить его в качестве PHP-документа (например, сохраняя файл <span class="code">index.html</span> под именем <span class="code">index.php</span>), и он будет отображаться точно так же, как исходный файл.</p>
<p>Небольшая PHP-программа Hello World может иметь вид, показанный в примере:</p>
<pre><code class="language-php">&lt;?php
 echo "Hello world";
?></code></pre>
<b>Вывод</b>: <?echo "Hello world"; ?>
<p>Существуют 2 распространенных способа размещения <span class="code">&lt;?php?> тэга:</span></p>
<ol>
    <li>Некоторые программисты предпочитают помещать в эти теги как можно меньшие фрагменты кода PHP и именно в тех местах, где нужно воспользоваться динамическими сценариями, а весь остальной документ составлять из стандартного кода HTML. (Такой код выполняется быстрее)</li>
    <li> Другие программисты открывают его в начале документа, а закрывают в самом конце и выводят любой код HTML путем непосредственного использования команды PHP. (увеличение скорости настолько мизерное, что оно не может оправдать дополнительные сложности многочисленных вставок PHP в отдельно взятый документ)</li>
</ol>
<p>Несмотря на то что при выборе <span class="code">&lt;?</span> неочевиден вызов PHP-парсера, это вполне приемлемый альтернативный синтаксис, который, как правило, также работает. Но я не советую его использовать, поскольку он несовместим c XML и в настоящее время его применение не приветствуется (это значит, что он больше не рекомендуется и его поддержка может быть удалена в будущих версиях).</p>
<p>Если в файле содержится только код PHP, то закрывающий тег <span class="code">?></span> можно опустить. Именно так и нужно делать, чтобы гарантировать отсутствие в файлах PHP лишнего пустого пространства (что имеет особую важность при написании объектно-ориентированного кода).</p>

<h2>????</h2>
<p><b>Основные черты PHP:</b></p>
<ul>
    <li>Комментарии: <span class="code">//однострочник</span> и <span class="code">/*многотрочник*/</span></li>
    <li>Команды PHP завершаются точкой с запятой <span class="code">;</span></li>
    <li>Перед именем всех переменных ставится <span class="code">$</span></li>
    <li>В PHP используются стандартные литералы.</li>
    <li>Отсчет индексов начинается с 0</li>
    <li>PHP чувствителен к регистру</li>
    <li>PHP - слабо типизированный язык, т.е. переменные не требуют объявления перед использованием и что PHP всегда преобразует переменные в тот тип, который требуется для их окружения на момент доступа к ним. </li>
    <li>В PHP будет игнорировать любые отступы, кроме простых разделений команд (как во всех языках).</li>
</ul>

<p><b>Серверные скрипты:</b> Язык PHP изначально разрабатывался для создания динамического веб-контента и до сих пор лучше других языков подходит для этой задачи. Для генерирования разметки HTML вам понадобится <i>парсер PHP</i> и <i>веб-сервер для отправки закодированных файлов</i>. PHP также отлично генерирует динамический контент через подключение к БД, документы XML, графику, файлы PDF и т. д.</p>
<p><b>Скрипты командной строки:</b> PHP может выполнять скрипты в режиме командной строки по аналогии с Perl, awk или командной оболочкой Unix. Скрипты командной строки могут использоваться для таких задач системного администрирования, как резервное копирование и разбор журналов, а также для разработки некоторых скриптов в стиле заданий CRON (невизуальных задач PHP).</p>
<p><b>PHP - это интерпретатор, а не компилятор</b>. Компиляторы создают исполняемый код, который может выполняться без самого компилятора. Интерпретатор такого кода не создает, поэтому для выполнения программ, написанных на PHP, вам понадобится интерпретатор PHP — программа, которая будет выполнять ваши PHP-сценарии.</p>




<h2>Переменные</h2>
<p>Символ <span class="code">$</span> используется в разных языках программирования в различных целях. Например, в языке BASIC символ <span class="code">$</span> применялся в качестве завершения имен переменных, чтобы показать, что они относятся к строкам</p>

<p>А в PHP символ <span class="code">$</span> должен ставиться перед именами всех переменных. Это нужно для того, чтобы PHP-парсер работал быстрее, сразу же понимая, что имеет дело с переменной. К какому бы типу ни относились переменные — к числам, строкам или массивам, все они должны выглядеть так, как показано</p>
<pre><code class="language-php">&lt;?php
 $mycounter = 1;
 $mystring = "Hello";
 $myarray = array("One", "Two", "Three");
?></code></pre>
<h3>Правила присваивания имен переменных</h3>
<ul>
    <li>Имена после знака <span class="code">$</span> должны начинаться с буквы или с _</li>
    <li>Имена могут содержать <span class="code">[a-zA-Z0-9_]</span></li>
    <li>Имена не могут включать пробелы</li>
    <li>Имена переменных чувствительны к регистру символов</li>
</ul>



<h3>Первая PHP-программа:</h3>
<pre><code class="language-php">&lt;?php // test1.php
 $username = "Fred Smith";
 echo $username;
 echo "&lt;br>";
 $current_user = $username;
 echo $current_user;
?></code></pre>
<h2>Массивы</h2>
<pre><code class="language-php">&lt;?php
$team = array('Bill', 'Mary', 'Mike', 'Chris', 'Anne');
echo $team[3];/*Эта команда отображает имя Chris*/
/*Двумерный массив*/
$oxo = array(array('x', ' ', 'o'),
        array('o', 'o', 'x'),
        array('x', 'o', ' '));
echo $oxo[1][2]; // Эта команда отображает х
?></code></pre>

<h2>Операторы</h2>
<h3>Арифметические операции</h3>
<p>Отличия от других языков</p>
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

<h3>Операторы присваивания</h3>
<p>Аналогичные другим языкам за исключением <span class="code">.=</span></p>

<h3>Операторы сравнения</h3>
<p>Аналогичные другим языкам за исключением <span class="code">&lt;></span> (второй вариант "не равно"), <span class="code">===</span> (тождественно) и <span class="code">!==</span> (не тождественно)</p>

<h3>Логические операторы</h3>
<pre><code class="language-php">if ($hour > 12 && $hour < 14) dolunch();</code></pre>
<p>Аналогично другим языкам, т.е. PHP имеет следующие логические операторы: <span class="code">and</span> (<span class="code">&&</span>), <span class="code">or</span> (<span class="code">||</span>), <span class="code">!</span>, <span class="code">xor</span> (исключающее ИЛИ).</p>
<h3>Конкатенация строк</h3>
<p>Самый простой способ объединения строк выглядит следующим образом:</p>
<pre><code class="language-php">echo "У вас " . $msgs . " сообщений.";</code></pre>
<p>Так же как с помощью оператора += можно добавить значение к числовой переменной, с помощью оператора .= можно добавить одну строку к другой:</p>
<pre><code class="language-php"><$bulletin .= $newsflash;</code></pre>
<h2>Строки</h2>
<p>если требуется включить в состав строки значение переменной, используется строка, заключенная в двойные кавычки:</p>
<pre><code class="language-php">echo "На этой неделе ваш профиль просмотрело $count человек ";</code></pre>
<p>Инструкция <span class="code">echo</span> может выводить сразу несколько строк</p>
<pre><code class="language-php">&lt;?php
 $author = "Steve Ballmer";
 echo "Developers, Developers, developers, developers,
 developers,developers, developers, developers, developers!
 $author.";
?></code></pre>
<p>Многострочное присваивание</p>
<pre><code class="language-php">&lt;?php
 $author = "Bill Gates";
 $text = "Measuring programming progress by lines of code is like
 measuring aircraft building progress by weight.
 – $author.";
?></code></pre>
<p>Еще один вариант инструкции echo, использующей сразу
    несколько строк</p>
<pre><code class="language-php">&lt;?php
 $author = "Brian W. Kernighan";
 echo &lt;&lt;&lt;_END
 Debugging is twice as hard as writing the code in the first place.
 Therefore, if you write the code as cleverly as possible, you are,
 by definition, not smart enough to debug it.
 $author.
_END;
?></code></pre>
<p>Этот код предписывает PHP вывести все, что находится между двумя тегами
    <span class="code">_END</span>, как будто все это является строкой, заключенной в двойные кавычки (за
    исключением того, что изменять предназначение кавычек в heredoc не нужно). Это означает, что разработчику можно, например, написать целый раздел
    HTML-кода прямо в коде PHP, а затем заменить конкретные динамические
    части переменными PHP.</p>
<p>Присваивание переменной многострочного значения</p>
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
<h3>Типы переменных</h3>
<p>PHP автоматически преобразует типы.</p>
<p>Например, автоматическое преобразование числа в строку</p>
<pre><code class="language-php">&lt;?php
 $number = 12345 * 67890;
 echo substr($number, 3, 1);
?></code></pre>
<p>Когда присваивается значение, $number является числовой переменной. Но во
    второй строке кода вызов значения этой переменной помещен в PHP-функцию
    substr(), которая должна вернуть из переменной $number один символ, стоящий
    на четвертой позиции.  Для выполнения этой задачи PHP превращает $number в строку, состоящую из девяти символов, чтобы функция substr() могла получить к ней
    доступ и вернуть символ, в данном случае 1</p>
<p>Автоматическое преобразование строки в число:</p>
<pre><code class="language-php">&lt;?php
 $pi = "3.1415927";
 $radius = 5;
 echo $pi * ($radius * $radius);
?></code></pre>
<h4>Константы</h4>
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
<p>Важно помнить о двух основных особенностях констант: перед их именами
    не нужно ставить символ $ (в отличие от имен обычных переменных) и их
    можно определить только с помощью функции define().</p>
<p>По общепринятому соглашению считается правилом хорошего тона использовать в именах констант буквы только верхнего регистра, особенно если ваш код
    будет также читать кто-нибудь другой.</p>
<h4>Предопределенные константы</h4>
<p>существуют константы, известные как волшебные, которые могут оказаться для вас полезными с самого начала. У имен волшебных констант в начале
    и в конце всегда стоят два символа подчеркивания, чтобы нельзя было случайно
    назвать одну из собственных констант уже занятым под эти константы именем</p>
<table class="first_column_code">
    <tr>
        <td>Волшебная константа</td>
        <td>Описание</td>
    </tr>
    <tr>
        <td>__line__</td>
        <td>номер текущей строки вфайле</td>
    </tr>
    <tr>
        <td>__file__</td>
        <td>полное путевое имя файла. если используется внутри инструкции include,
            то возвращается имя включенного файла. внекоторых операционных системах
            допускается использование псевдонимов для каталогов, которые называются
            символическими ссылками; в__file__ они всегда заменяются реальными
            каталогами</td>
    </tr>
    <tr>
        <td>__dir__ </td>
        <td>каталог файла. если используется внутри инструкции include, то возвращается каталог включенного файла. такой же результат дает применение функции
            dirname(__file__). вэтом имени каталога отсутствует замыкающий слеш,
            если только этот каталог не является корневым</td>
    </tr>
    <tr>
        <td>__function__ </td>
        <td>имя функции. возвращает имя функции, под которым она была объявлена
            (сучетом регистра символов). вphp 4 возвращаемое значение всегда составлено из символов нижнего регистра </td>
    </tr>
    <tr>
        <td>__class__</td>
        <td>имя класса. возвращает имя класса, под которым он был объявлен (с учетом
            регистра символов). вphp4 возвращаемое значение всегда составлено изсимволов нижнего регистра</td>
    </tr>
    <tr>
        <td>__method__</td>
        <td>имя метода класса. возвращает имя метода, под которым он был объявлен
            (сучетом регистра символов)</td>
    </tr>
    <tr>
        <td>__namespace__</td>
        <td>имя текущего пространства имен (с учетом регистра символов). эта константа
            определена во время компиляции </td>
    </tr>
</table>
<p>Эти константы полезны при отладке, когда нужно вставить строку кода, чтобы
    понять, до какого места дошло выполнение программы:
</p>
<pre><code class="language-php">echo "Это строка " . _LINE_ . " в файле " . _FILE_;</code></pre>
<p>Эта команда выведет в браузер текущую строку программы с указанием текущего
    файла, исполняемого в данный момент (включая путь к нему).</p>

<h3>echo и print</h3>
<p>В общем, команда echo обычно работает при выводе обычного текста быстрее
    print, поскольку она не устанавливает возвращаемое значение. С другой стороны, поскольку она не является функцией, ее, в отличие от print, нельзя использовать как часть более сложного выражения. В следующем примере для
    вывода информации о том, является значение переменной истинным (TRUE) или
    ложным (FALSE), используется функция print, но сделать то же самое с помощью команды echo не представляется возможным, поскольку она выведет на экран
    сообщение об ошибке синтаксического разбора — Parse error:</p>
<pre><code class="language-php">$b ? print "TRUE" : print "FALSE";</code></pre>
<h3>Функции</h3>
<p>Простое объявление функции</p>
<pre><code class="language-php">&lt;?php
 function longdate($timestamp)
 {
 return date("l F jS Y", $timestamp);
 }
?></code></pre>
<p>Эта функция возвращает дату в формате «день_недели месяц число год». Между
    стоящими после имени функции круглыми скобками может размещаться любое количество параметров, но для этой функции выбран прием только одного
    параметра. Весь код, который выполняется при последующем вызове функции,
    заключается в фигурные скобки. Обратите внимание, что в этом примере первой буквой в вызове функции даты является L в нижнем регистре, которую не
    следует путать с цифрой 1.</p>
<p>Чтобы с помощью этой функции вывести сегодняшнюю дату, нужно поместить
    в свой код следующий вызов:</p>
<pre><code class="language-php">echo longdate(time());</code></pre>

<?
function longdate($timestamp)
{
    return date("l F jS Y", $timestamp);
}
?>
<p>Вывод: <?echo longdate(time());?></p>


<h4>Область видимости переменной</h4>
<p>Если программа очень длинная, то с подбором подходящих имен переменных могут возникнуть трудности, но программируя на PHP, можно определить область видимости переменной. Иными словами, можно, к примеру, указать, что переменная <span class="code">$temp</span> будет использоваться только внутри конкретной функции, чтобы забыть о том, что она после возврата из кода функции применяется где-нибудь еще. Фактически именно такой в PHP является по умолчанию область видимости переменных.</p>
<p>В качестве альтернативы можно проинформировать PHP о том, что переменная
    имеет глобальную область видимости и доступ к ней может быть осуществлен
    из любого места программы.</p>
<h5>Локальные переменные</h5>
<p>Локальные переменные создаются внутри функции и к ним имеется доступ
    только из кода этой функции. Обычно это временные переменные, которые
    используются до выхода из функции для хранения частично обработанных
    результатов.</p>
<pre><code class="language-php">&lt;?php
 function longdate($timestamp)
 {
 $temp = date("l F jS Y", $timestamp);
 return "Дата: $temp";
 }
?></code></pre>
<p>Неудачная попытка получить доступ к переменной $temp
    в функции longdate()</p>
<pre><code class="language-php">&lt;?php
 $temp = "Дата: ";
 echo longdate(time());
 function longdate($timestamp)
 {
 return $temp . date("l F jS Y", $timestamp);
 }
?></code></pre>
<p>Но поскольку переменная $temp не была создана внутри функции longdate,
    а также не была передана ей в качестве параметра, функция longdate не может
    получить к ней доступ. Поэтому этот фрагмент кода выведет только дату без
    предшествующего ей текста. На самом деле в зависимости от параметров конфигурации PHP сначала может быть отображено сообщение об ошибке, предупреждающее об использовании неопределенной переменной (Notice: Undefined
    variable: temp), показывать которое пользователям не хотелось бы.</p>
<p>. Решить проблему можно путем переноса ссылки на переменную
    $temp в ее локальную область видимости</p>
<pre><code class="language-php">&lt;?php
 $temp = "Дата: ";
 echo $temp . longdate(time());
 function longdate($timestamp)
 {
 return date("l F jS Y", $timestamp);
 }
?></code></pre>
<h5>Глобальные переменные</h5>
<p>Бывают случаи, когда требуется переменная, имеющая глобальную область видимости, поскольку нужно, чтобы к ней имелся доступ из всего кода программы. </p>
<pre><code class="language-php">global $is_logged_in;
</code></pre>
<h5>Статические переменные</h5>
<p>Если функция
    вызывается многократно, то она начинает свою работу со свежей копией переменной и ее прежние установки не имеют никакого значения.
    Интересно, а что, если внутри функции есть такая локальная переменная,
    к которой не должно быть доступа из других частей программы, но значение оторой желательно сохранять до следующего вызова функции? Зачем? Возможно, потому, что нужен некий счетчик, чтобы следить за количеством вызовов функции. Решение, показанное в примере 3.17, заключается в объявлении
    статической переменной.
</p>
<pre><code class="language-php">&lt;?php
 function test()
 {
 static $count = 0;
 echo $count;
 $count++;
 }
?></code></pre>
<p>В этом примере в самой первой строке функции создается статическая переменная по имени $count, которой присваивается нулевое начальное значение.
    В следующей строке выводится значение переменной, а в последней строке это
    значение увеличивается на единицу.</p>
<pre><code class="language-php">&lt;?php
 static $int = 0; // Допустимо
 static $int = 1+2; // Верно (в PHP 5.6)
 static $int = sqrt(144); // Недопустимо
?></code></pre>
<h5>Суперглобальные переменные</h5>
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
        <td>$GLOBALS</td>
        <td>все переменные, которые на данный момент определены в глобальной области видимости сценария. Имена переменных служат ключами массива</td>
    </tr>
    <tr>
        <td>$_SERVER</td>
        <td>информация озаголовках, путях, местах расположения сценариев. элементы
            этого массива создаются веб-сервером, иэто не дает гарантии, что каждый
            веб-сервер будет предоставлять какую-то часть информации или ее всю</td>
    </tr>
    <tr>
        <td>$_GET</td>
        <td>переменные, которые передаются текущему сценарию http-методом get
        </td>
    </tr>
    <tr>
        <td>$_POST</td>
        <td>переменные, которые передаются текущему сценарию http-методом post
        </td>
    </tr>
    <tr>
        <td>$_FILES</td>
        <td>элементы, подгруженные ктекущему сценарию http-методом post</td>
    </tr>
    <tr>
        <td>$_COOKIE</td>
        <td>переменные, переданные текущему сценарию посредством http cookies</td>
    </tr>
    <tr>
        <td>$_SESSION</td>
        <td>переменные сессии, доступные текущему сценарию</td>
    </tr>
    <tr>
        <td>$_REQUEST</td>
        <td>содержимое информации, переданной от браузера; по умолчанию <span class="code">$_get</span>,
            <span class="code">$_post</span> и <span class="code">$_cookie</span></td>
    </tr>
    <tr>
        <td>$_ENV</td>
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
<p></p>
<p></p>
<p></p>
<p></p>
<p></p>

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

<!--Футер (+скрипты)-->
<?php
include_once $_SERVER['DOCUMENT_ROOT']."/common/footer.php";
?>