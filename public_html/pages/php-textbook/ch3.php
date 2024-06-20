<!--Хедер (+скрипты)-->
<?
$PageTitle="Глава 3. Строковый тип данных";
function customPageHeader(){?>
    <title>Глава 3. Строковый тип данных</title>
<?}
include_once $_SERVER['DOCUMENT_ROOT']."/common/header.php";
?>
<h2>Строковые литералы</h2>
<pre><code>&lt;?php
// для переноса строки используется символ HTML (\n)
print 'I\'ve gone to the store.'.'\n'; //внутри кавычка экранируется
//для форматирования строк подходят двойные кавычки
$cost = '$10.25';
print "The sauce cost $cost.".'\n';
print 'In double-quoted strings, newline is represented by';
?></code></pre>
<div class="code-example-output-title"><span>Вывод:</span>
<div class="code-example-output">
<pre>
<?php
// для переноса строки используется символ &#10; (\n)
print 'I\'ve gone to the store.'.'&#10;'; //внутри кавычка экранируется
//для форматирования строк подходят двойные кавычки
$cost = '$10.25';
print "The sauce cost $cost.".'&#10;';
print 'In double-quoted strings, newline is represented by';
?>
</pre>
</div>
</div>
<p>PHP также поддерживает <span class="code">heredoc</span>-формат строк, в рамках которого не надо экранировать служебные комбинации. </p>

<pre><code>&lt;?php
print &lt;&lt;&lt; END
It's funny when signs say things like:
 Original "Root" Beer
 "Free" Gift
 Shoes cleaned while "you" wait
or have other misquoted words.
END;
?></code></pre>
<div class="code-example-output-title"><span>Вывод:</span>
<div class="code-example-output">
<pre>
<?php
print <<< END
It's funny when signs say things like:
 Original "Root" Beer
 "Free" Gift
 Shoes cleaned while "you" wait
or have other misquoted words.
END;
?>
</pre>
</div>
</div>
<h2>Практика: вывод разметки HTML с помощью <span class="code">heredoc</span></h2>
<pre><code>&lt;?php
if ($remaining_cards > 0) {
    $url = '/deal.php';
    $text = 'Deal More Cards';
} else {
    $url = '/new-game.php';
    $text = 'Start a New Game';
}
print &lt;&lt;&lt; HTML
There are &lt;b>$remaining_cards&lt;/b> left.
&lt;p>
&lt;a href="$url">$text&lt;/a>
HTML;
?></code></pre>
<p>Этот метод следует использовать в случае, когда есть блок кода (не PHP), который нужно вывести:</p>
<pre><code>&lt;?php
$js = &lt;&lt;&lt;'__JS__'
$.ajax({
 'url': '/api/getStock',
 'data': {
 'ticker': 'LNKD'
 },
 'success': function( data ) {
 $( "#stock-price" ).html( "&lt;strong>$" + data + "&lt;/strong>" );
 }
});
__JS__;
print $js;
?></code></pre>

<h2>Индексирование строк (по позиции в строке)</h2>
<p>Строка индексирована как массив:</p>
<pre><code class="language-php">&lt;?
$neighbor = 'Hilda';
echo $neighbor[3];
?></code></pre>

<div class="code-example-output-title"><span>Вывод:</span>
<div class="code-example-output">
<pre><?
$neighbor = 'Hilda';
echo $neighbor[3];
?></pre>
</div>
</div>

<h2>Подстрока по позиции начала и конца</h2>
<p><b>Задача</b>: требуется выделить часть строки, начиная с определенной позиции. Например, необходимы первые 8 символов имени пользователя, введенного в форму.</p>
<p><b>Решение</b>: Для выделения подстроки применяется функция <span class="code">substr()</span>:</p>
<pre><code class="language-php">&lt;?
$substring = substr($string,$start,$length);
$username = substr($_REQUEST['username'],0,8);
?></code></pre>
<pre><code class="language-php">&lt;?
print substr('watch out for that tree',6,5);
?></code></pre>
<div class="code-example-output-title"><span>Вывод:</span>
<div class="code-example-output">
<pre>
<?
print substr('watch out for that tree',6,5);
?>
</pre>
</div>
</div>

<h2>Поиск позиции первого вхождения в строку</h2>
<p><b>Задача</b>: Требуется узнать, содержит ли строка заданную подстроку, например проверить, содержит ли адрес электронной почты знак @.</p>
<pre><code>&lt;?php
if (strpos($_POST['email'], '@') === false) {
    print 'There was no @ in the e-mail address!';
}    else {
        print <<< END
@ found!
END}
}
?></code></pre>
<pre><code>&lt;?php
check_for_at('chereshan');
check_for_at('@chereshan');
check_for_at('chereshan.github.io@yandex.ru');
?></code></pre>
<div class="code-example-output-title"><span>Вывод:</span>
    <div class="code-example-output">
<pre>
<?php
function check_for_at($str){
    if (strpos($str, '@') === false) {
        print 'There was no @ in the e-mail address!'.'&#10;';
    }
    else {
        print <<< END
@ found!
END.'&#10;';

    }
}
check_for_at('chereshan');
check_for_at('@chereshan');
check_for_at('chereshan.github.io@yandex.ru');
?>
</pre>
    </div>
</div>
<p><b>Важно</b>: т.к. при отсутствии искомой подстроки возвращается <span class="code">false</span>, то надо использовать строгий оператор (не)равенства(<span class="code">!==</span> и <span class="code">===</span>), чтобы учитывать трансмутацию <span class="code">0</span> в <span class="code">false</span>.</p>

<h2>Замена подстрок</h2>
<p><b>Задача</b>: Требуется заменить подстроку другой строкой, например скрыть все цифры номера кредитной карты, кроме четырех последних, перед выводом.</p>
<p><b>Решение</b>: Используйте функцию <span class="code">substr_replace()</span>:</p>
<pre><code class="language-php">&lt;?
// Все, начиная с позиции $start до конца строки $old_string,
// заносится в $new_substring
$new_string = substr_replace($old_string,$new_substring,$start);
// $length символов, начиная с позиции $start, заменяются на $new_substring
$new_string = substr_replace($old_string,$new_substring,$start,$length);
?></code></pre>
<pre><code class="language-php">&lt;?
print substr_replace('My pet is a blue dog.','fish.',12);
print substr_replace('My pet is a blue dog.','green',12,4);
$credit_card = '4111 1111 1111 1111';
print substr_replace($credit_card,'xxxx ',0,strlen($credit_card, 4);
?></code></pre>
<div class="code-example-output-title"><span>Вывод:</span>
    <div class="code-example-output">
<pre>
<?
print substr_replace('My pet is a blue dog.','fish.',12);
print "<br>";
print substr_replace('My pet is a blue dog.','green',12,4);
$credit_card = '4111 1111 1111 1111';
print substr_replace($credit_card,'xxxx ',0,strlen($credit_card)-4);
print "<br>";
?>
</pre>
    </div>
</div>

<h2>Посимвольная обработка строк</h2>
<p><b>Задача</b>: Нужно обработать каждый символ строки по отдельности.</p>
<p><b>Решение</b>: Цикл по символам строки с помощью оператора <span class="code">for</span>. В этом примере подсчитываются гласные в строке:</p>
<pre><code class="language-php">&lt;?
$string = "This weekend, I'm going shopping for a pet chicken.";
$vowels = 0;
for ($i = 0, $j = strlen($string); $i &lt; $j; $i++) {
    if (strstr('aeiouAEIOU',$string[$i])) {
        $vowels++;
    }
}
print $vowels;
?></code></pre>
<div class="code-example-output-title"><span>Вывод:</span>
    <div class="code-example-output">
<pre>
<?
$string = "This weekend, I'm going shopping for a pet chicken.";
$vowels = 0;
for ($i = 0, $j = strlen($string); $i < $j; $i++) {
    if (strstr('aeiouAEIOU',$string[$i])) {
        $vowels++;
    }
}
print $vowels;
?>
</pre>
    </div>
</div>
<p>Здесь используются следующие функции:</p>
<ul>
    <li><span class="code">strlen($string)</span> - длина строки</li>
    <li><span class="code">strstr($string, $symbol)</span> - проверяет содержится ли <span class="code">$symbol</span> в <span class="code">$string</span>.</li>
</ul>
<h2>Практика: подсчет серий символов</h2>
<p>Второй пример - это посимвольная обработка использлованная для подсчета полседовательности <b>"Смотри и говори"</b>:</p>
<pre><code class="language-php">&lt;?
function lookandsay($s): string
{
// инициализируем возвращаемое значение пустой строкой
    $r = '';
// переменная $m, которая содержит подсчитываемые символы,
// инициализируется первым символом * в строке
    $m = $s[0];
    // $n, количество обнаруженных символов $m, инициализируется значением 1
    $n = 1;
    for ($i = 1, $j = strlen($s); $i &lt; $j; $i++) {
        // если символ совпадает с последним символом
        if ($s[$i] == $m) {
            // увеличиваем на единицу значение счетчика этих символов
            $n++;
        } else {
            // иначе добавляем значение счетчика и символа
            //к возвращаемому значению //
            $r .= $n . $m;
            // устанавливаем искомый символ в значение текущего символа //
            $m = $s[$i];
            // и сбрасываем счетчик в 1 //
            $n = 1;
        }
    }
    // возвращаем построенную строку, а также последнее значение
    //счетчика и символ //
    return $r.$n.$m;
}
for ($i = 0, $s = 1; $i &lt; 10; $i++) {
    $s = lookandsay($s);
    print "$s\n";
}
?></code></pre>
<div class="code-example-output-title"><span>Вывод:</span>
    <div class="code-example-output">
<pre>
<?
function lookandsay($s): string
{
// инициализируем возвращаемое значение пустой строкой
    $r = '';
// переменная $m, которая содержит подсчитываемые символы,
// инициализируется первым символом * в строке
    $m = $s[0];
    // $n, количество обнаруженных символов $m, инициализируется значением 1
    $n = 1;
    for ($i = 1, $j = strlen($s); $i < $j; $i++) {
        // если символ совпадает с последним символом
        if ($s[$i] == $m) {
            // увеличиваем на единицу значение счетчика этих символов
            $n++;
        } else {
            // иначе добавляем значение счетчика и символа
            //к возвращаемому значению //
            $r .= $n . $m;
            // устанавливаем искомый символ в значение текущего символа //
            $m = $s[$i];
            // и сбрасываем счетчик в 1 //
            $n = 1;
        }
    }
    // возвращаем построенную строку, а также последнее значение
    //счетчика и символ //
    return $r.$n.$m;
}
for ($i = 0, $s = 1; $i < 10; $i++) {
    $s = lookandsay($s);
    print "$s\n";
}
?>
</pre>
    </div>
</div>
<p>Это называется последовательностью «<b>Смотри и говори</b>», поскольку каждый элемент мы получаем, глядя на предыдущие элементы и говоря, сколько их. Например, глядя на первый элемент, 1, мы говорим «один». Следовательно, второй элемент – «11», то есть две единицы, поэтому третий элемент – «21». Он представляет собой одну двойку и одну единицу, поэтому четвертый элемент – «1211» и т. д.</p>


<h2>Пословный или посимвольный переворот строки</h2>
<p><b>Задача</b>: Требуется перевернуть слова или символы в строке</p>
<p><b>Решение</b>: Для посимвольного переворота строки применяется функция <span class="code">strrev()</span>:</p>
<pre><code class="language-php">&lt;? print strrev('This is not a palindrome.'); ?></code></pre>
<div class="code-example-output-title"><span>Вывод:</span>
    <div class="code-example-output">
<pre>
<? print strrev('This is not a palindrome.'); ?>
</pre>
    </div>
</div>
<p>Чтобы перевернуть строку пословно, надо разобрать строку на слова,
    перевернуть слова, а затем собрать их заново в строку:
</p>
<pre><code class="language-php">&lt;?
$s = "Once upon a time there was a turtle.";
// разбиваем строку на слова
$words = explode(' ',$s);
// обращаем массив слов
$words = array_reverse($words);
$s = join(' ',$words);
print $s;
//тоже самое в компактной форме
$reversed_s = implode(' ',array_reverse(explode(' ',$s)));
?></code></pre>
<div class="code-example-output-title"><span>Вывод:</span>
    <div class="code-example-output">
<pre>
<?
$s = "Once upon a time there was a turtle.";
// разбиваем строку на слова
$words = explode(" ",$s);
// обращаем массив слов
$words = array_reverse($words);
$s= join(' ',$words);
print $s;
?>
</pre>
    </div>
</div>
<p>Здесь используются следующие функции:</p>
<ul>
    <li><span class="code">explode($split_string ,$string)</span> - преобразует строку в массив по разделителю.</li>
    <li><span class="code">array_reverse($array)</span> - разворачивает массив.</li>
    <li><span class="code">implode($split_string, $array)</span> - соединяет массив в строку через разделитель</li>
</ul>

<h2>Практика: генерирование случайной строки</h2>
<pre><code>&lt;?php
function str_rand($length = 32,
                  $characters =
                  '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ') {
    if (!is_int($length) || $length &lt; 0) {
        return false;
    }
    $characters_length = strlen($characters) - 1;
    $string = '';
    for ($i = $length; $i > 0; $i--) {
        $string .= $characters[mt_rand(0, $characters_length)];
    }
    return $string;
}
print str_rand(16, '.-');
?></code></pre>
<div class="code-example-output-title"><span>Вывод:</span>
    <div class="code-example-output">
<pre>
<?php
function str_rand($length = 32,
                  $characters =
                  '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ') {
    if (!is_int($length) || $length < 0) {
        return false;
    }
    $characters_length = strlen($characters) - 1;
    $string = '';
    for ($i = $length; $i > 0; $i--) {
        $string .= $characters[mt_rand(0, $characters_length)];
    }
    return $string;
}
print str_rand(16, '.-');
?>
</pre>
    </div>
</div>
<p>Здесь используются следующие функции:</p>
<ul>
    <li><span class="code">is_int($num)</span> - проверяет является ли переменная числом.</li>
    <li><span class="code">mt_rand($min_num, $max_num)</span> - возвращает случайное число в промежутке включительно.</li>
</ul>

<h2>Практика: сжатие и свертка табуляций</h2>
<p><b>Задача</b>:Требуется заменить пробелы табуляциями (или табуляции — пробелами) в строке с сохранением выравнивания текста по позициям табуляции. Например, такая необходимость может возникнуть для стандартизации вывода отформатированного текста.</p>
<p><b>Решение</b>: Воспользуйтесь функцией <span class="code">str_replace()</span> для замены пробелов символами табуляции или наоборот:</p>
<pre><code>&lt;?php
$rows = $db->query('SELECT message FROM messages WHERE id = 1');
$obj = $rows->fetch(PDO::FETCH_OBJ);
$tabbed = str_replace(' ' , "\t", $obj->message);
$spaced = str_replace("\t", ' ' , $obj->message);
print "With Tabs: &lt;pre>$tabbed&lt;/pre>";
print "With Spaces: &lt;pre>$spaced&lt;/pre>";
?></code></pre>
<p>Однако преобразование функцией <span class="code">str_replace()</span> не сохраняет позиции табуляции. Если вы хотите, чтобы позиции табуляции следовали через восемь символов, то в строке, начинающейся со слова из пяти букв и символа табуляции, последний должен быть заменен тремя пробелами, а не одним. </p>
<pre><code>&lt;?php
function tab_expand($text) {
    while (strstr($text,"\t")) {
        $text = preg_replace_callback('/^([^\t\n]*)(\t+)/m',
            'tab_expand_helper', $text);
    }
    return $text;
}
function tab_expand_helper($matches) {
    $tab_stop = 8;
    return $matches[1] .
        str_repeat(' ',strlen($matches[2]) *
            $tab_stop - (strlen($matches[1]) % $tab_stop));
}
$spaced = tab_expand($obj->message);

function tab_unexpand($text) {
    $tab_stop = 8;
    $lines = explode("\n",$text);
    foreach ($lines as $i => $line) {
        // Преобразование табуляций в пробелы
        $line = tab_expand($line);
        $chunks = str_split($line, $tab_stop);
        $chunkCount = count($chunks);
        // Просмотр всех фрагментов, кроме последнего
        for ($j = 0; $j &lt; $chunkCount - 1; $j++) {
            $chunks[$j] = preg_replace('/ {2,}$/',"\t",$chunks[$j]);
        }
        // Если последний фрагмент содержит пробелы, заполняющие
        // позицию табуляции, преобразовать их в табуляцию. В противном
        // случае оставить их без изменения.
        if ($chunks[$chunkCount-1] == str_repeat(' ', $tab_stop)) {
            $chunks[$chunkCount-1] = "\t";
        }
        // Объединение фрагментов
        $lines[$i] = implode('',$chunks);
    }
    // Объединение строк
    return implode("\n",$lines);
}
$tabbed = tab_unexpand($obj->message);
?></code></pre>


<h2>Управление регистром</h2>
<pre><code class="language-php">&lt;?
print ucfirst("how do you do today?"); // КАПИТАЛИЗВАТЬ НАЧАЛО ПРЕДЛОЖЕНИЯ
print ucwords("the prince of wales"); //КАПИТАЛИЗОВАТЬ КАЖДОЕ СЛОВО
print strtoupper("i'm not yelling!"); //ВЕРХНИЙ РЕГИСТР
print strtolower('IM YELLING'); //НИЖНИЙ РЕГИСТР
?></code></pre>
<div class="code-example-output-title"><span>Вывод:</span>
    <div class="code-example-output">
<pre>
<?
print ucfirst("how do you do today?");
print "<br>";
print ucwords("the prince of wales");
print "<br>";
print strtoupper("i'm not yelling!");
print "<br>";
print strtolower('IM YELLING');
?>
</pre>
    </div>
</div>

<h2>Интерполяция функций и выражений в строках</h2>
<p><b>Задача</b>:Требуется включить в строку результат выполнения функции или выражения.</p>
<pre><code>&lt;?php
// интерполяция через конкатенацию
print 'You have '.($_POST['boys'] + $_POST['girls']).' children.';
print "The word '$word' is ".strlen($word).' characters long.';
print 'You owe '.$amounts['payment'].' immediately.';
print "My circle's diameter is ".$circle->getDiameter().' inches.';
// интерполяция через двойные кавычки
print "I have $children children.";
print "You owe $amounts[payment] immediately.";
print "My circle's diameter is $circle->diameter inches.";
// интерполяция с фигурными скобками в двойных кавычках
print "I have {$children} children.";
print "You owe {$amounts['payment']} immediately.";
print "My circle's diameter is {$circle->getDiameter()} inches.";
// интерполяция в heredoc
?></code></pre>
<pre><code>&lt;?php
print &lt;&lt;&lt; END
Right now, the time is
END
    . strftime('%c') . &lt;&lt;&lt; END
 but tomorrow it will be
END
    . strftime('%c',time() + 86400);
?></code></pre>
<div class="code-example-output-title"><span>Вывод:</span>
    <div class="code-example-output">
<pre>
<?php
print <<< END
Right now, the time is
END
    . strftime('%c') . <<< END
 but tomorrow it will be
END
    . strftime('%c',time() + 86400);
?>
</pre>
    </div>
</div>


<h2>Удаление пробелов из строки</h2>
<p><b>Задача</b>: Надо удалить пробельные символы в начале или в конце строки. Например, привести в порядок данные, введенные пользователем, прежде чем счесть их действительными.</p>
<p><b>Решение</b>: Следует обратиться к функциям <span class="code">ltrim()</span>, <span class="code">rtrim()</span> или <span class="code">trim()</span>. Функция
    <span class="code">ltrim()</span> удаляет пробельные символы в начале строки, <span class="code">rtrim()</span> – в конце
    строки, а функция <span class="code">trim()</span> – и в начале, и в конце строки:</p>

<pre><code class="language-php">&lt;?
$zipcode = trim($_REQUEST['zipcode']);
$no_linefeed = rtrim($_REQUEST['text']);
$name = ltrim($_REQUEST['name']);
?></code></pre>

<div class="code-example-output-title"><span>Вывод:</span>
    <div class="code-example-output">
<pre>
<?
$string = '  chereshan ';
print $string;
print ";<br>";
print trim($string);
print ";<br>";
print rtrim($string);
print ";<br>";
print ltrim($string).';';
?>
</pre>
    </div>
</div>



<h2>Разбиение строк</h2>
<p><b>Задача</b>: Необходимо разделить строку на части. Например, нужно получить доступ к каждой из строк, которые пользователь вводит в поле <span class="code">&lt;textarea></span> формы.
</p>
<p><b>Решение</b>: Если в качестве разделителя частей строк выступает строковая контанта, то следует применять функцию <span class="code">explode()</span>:</p>
<pre><code class="language-php">&lt;?
$words = explode(' ','My sentence is not very complicated');
print_r($words);
?></code></pre>
<div class="code-example-output-title"><span>Вывод:</span>
    <div class="code-example-output">
<pre>
<?
$words = explode(' ','My sentence is not very complicated');
print_r($words);
?>
</pre>
    </div>
</div>
<p>Разделить строку с помощью регулярного выражения можно с помощью функции:<span class="code">preg_split()</span>:</p>
<pre><code class="language-php">&lt;?
$math = "3 + 2 / 7 - 9";
$stack = preg_split('/ *([+\-\/*]) */',$math,-1,PREG_SPLIT_DELIM_CAPTURE);
print_r($stack);
?></code></pre>
<div class="code-example-output-title"><span>Вывод:</span>
    <div class="code-example-output">
<pre>
<?php
$math = "3 + 2 / 7 - 9";
$stack = preg_split('/ *([+\-\/*]) */',$math,-1,PREG_SPLIT_DELIM_CAPTURE);
print_r($stack);
?>
</pre>
    </div>
</div>

<h2>Перенос текста по заданной длине строки</h2>
<p><b>Задача</b>: Требуется организовать перенос текста в строке, например вывести текст в тегах
<span class="code">&lt;pre></span> и <span class="code">&lt;/pre></span>, но так, чтобы он помещался в окне браузера обычного размера.</p>
<pre><code>&lt;?php
$s = "Four score and seven years ago our fathers brought forth on this continent
a new nation, conceived in liberty and dedicated to the proposition
that all men are created equal.";
print "&lt;pre>\n".wordwrap($s)."\n&lt;/pre>";
?></code></pre>
<div class="code-example-output-title"><span>Вывод:</span>
    <div class="code-example-output">
<pre>
<?php
$s = "Four score and seven years ago our fathers brought forth on this continent
a new nation, conceived in liberty and dedicated to the proposition
that all men are created equal.";
print "<pre>\n".wordwrap($s)."\n</pre>";
print 'Для разделения двойным переносом:'.'<br>';
print "wordwrap(\$s,50,'\\n\\n');".'<br>';
print wordwrap($s,50,"\n\n");
?>
</pre>
    </div>
</div>





<!--Футер (+скрипты)-->
<?php
include_once $_SERVER['DOCUMENT_ROOT']."/common/footer.php";
?>