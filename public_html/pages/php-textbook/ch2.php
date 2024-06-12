<!--Хедер (+скрипты)-->
<?
$PageTitle="Глава 2. Типы данных в PHP";
function customPageHeader(){?>
    <title>Глава 2. Типы данных в PHP</title>
<?}
include_once $_SERVER['DOCUMENT_ROOT']."/common/header.php";
?>
<h2>Литералы</h2>
<pre><code class="language-php">&lt;?php
$myname = "Brian";
$myage = 37;
echo "a: " . 73 . "&lt;br>"; // Числовой литерал
echo "b: " . "Hello" . "&lt;br>"; // Строковый литерал
echo "c: " . FALSE . "&lt;br>"; // Литерал константы
echo "d: " . $myname . "&lt;br>"; // Строковая переменная
echo "e: " . $myage . "&lt;br>"; // Числовая переменная
?></code></pre>
<?php
$myname = "Brian";
$myage = 37;
echo "a: " . 73 . "<br>"; // Числовой литерал
echo "b: " . "Hello" . "<br>"; // Строковый литерал
echo "c: " . FALSE . "<br>"; // Литерал константы
echo "d: " . $myname . "<br>"; // Строковая переменная
echo "e: " . $myage . "<br>"; // Числовая переменная
?>
<h2>Строковый тип</h2>
<p>Строка индексирована как массив:</p>
<pre><code class="language-php">&lt;?
$neighbor = 'Hilda';
echo $neighbor[3];
?></code></pre>
<b>Вывод:</b>
<?
$neighbor = 'Hilda';
echo $neighbor[3];
?>
<p>В PHP строку можно задавать одинарными и двойными кавычками. В PHP имеют место уже знакомые нам escape-последовательности. Вот некоторые примеры:</p>
<pre><code class="language-php">&lt;?
echo "I've gone to the store.";
echo "The sauce cost \$10.25.";
$cost = '$10.25';
echo "The sauce cost $cost.";
echo "The sauce cost \$\061\060.\x32\x35.";
?></code></pre>
<div><b>Вывод</b>:
    <?
    echo "I've gone to the store.\n";
    echo "The sauce cost \$10.25.";
    $cost = '$10.25';
    echo "The sauce cost $cost.";
    echo "The sauce cost \$\061\060.\x32\x35.";
    ?></div>
<p>Встренные документы вызываюся следующим образом:</p>
<pre><code class="language-php">&lt;?php
print &lt;&lt;&lt; END
It's funny when signs say things like:
 Original "Root" Beer
 "Free" Gift
 Shoes cleaned while "you" wait
or have other misquoted words.
END;
?></code></pre>
<?php
print <<< END
It's funny when signs say things like:
 Original "Root" Beer
 "Free" Gift
 Shoes cleaned while "you" wait
or have other misquoted words.
END;
?>
<h4>Доступ к подстрокам</h4>
<p><b>Задача</b>:требуется выделить часть строки, начиная с опре деленной позиции. Например, необходимы первые восемь символов имени пользователя, введенного в форму.</p>
<p><b>Решение</b>: Для выделения подстроки применяется функция <span class="code">substr()</span>:</p>
<pre><code class="language-php">&lt;?
$substring = substr($string,$start,$length);
$username = substr($_REQUEST['username'],0,8);
?></code></pre>
<pre><code class="language-php">&lt;?
print substr('watch out for that tree',6,5);
?></code></pre>
<?
print substr('watch out for that tree',6,5);
?>
<h4>Замещение подстрок</h4>
<p><b>Задача</b>:требуется выделить часть строки, начиная с опре деленной позиции. Например, необходимы первые восемь символов имени пользователя, введенного в форму. Требуется заменить подстроку другой строкой. Например, перед тем как напечатать номер кредитной карты, вы хотите скрыть все цифры ее номера, за исключением последних четырех.</p>
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
<?
print substr_replace('My pet is a blue dog.','fish.',12);
print "<br>";
print substr_replace('My pet is a blue dog.','green',12,4);
$credit_card = '4111 1111 1111 1111';
print substr_replace($credit_card,'xxxx ',0,strlen($credit_card)-4);
print "<br>";
?>

<h4>Посимвольная обработка строк</h4>
<p><b>Задача</b>: Нужно обработать каждый символ строки по отдельности.</p>
<p><b>Решение</b>: Цикл по символам строки с помощью оператора for. В этом примере подсчитываются гласные в строке:</p>
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
<?
$string = "This weekend, I'm going shopping for a pet chicken.";
$vowels = 0;
for ($i = 0, $j = strlen($string); $i < $j; $i++) {
    if (strstr('aeiouAEIOU',$string[$i])) {
        $vowels++;
    }
}
print "<b>Вывод: </b>".$vowels;
?>
<p>Второй пример - это посимвольная обработка использлованная для подсчета полседовательности "Смотри и говори":</p>
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
<p>Это называется последовательностью «Смотри и говори», поскольку
    каждый элемент мы получаем, глядя на предыдущие элементы и говоря, сколько их. Например, глядя на первый элемент, 1, мы говорим
    «один». Следовательно, второй элемент – «11», то есть две единицы,
    поэтому третий элемент – «21». Он представляет собой одну двойку и
    одну единицу, поэтому четвертый элемент – «1211» и т. д.</p>


<h4>Пословный или посимвольный переворот строки</h4>
<p><b>Задача</b>: Требуется перевернуть слова или символы в строке</p>
<p><b>Решение</b>: Для посимвольного переворота строки применяется функция <span class="code">strrev()</span>:</p>
<pre><code class="language-php">&lt;? print strrev('This is not a palindrome.'); ?></code></pre>
<? print strrev('This is not a palindrome.'); ?>
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
?></code></pre>
<?
$s = "Once upon a time there was a turtle.";
// разбиваем строку на слова
$words = explode(" ",$s);
// обращаем массив слов
$words = array_reverse($words);
$s= join(' ',$words);
print $s;
?>
<h4>Управление регистром</h4>
<p><b>Задача</b>:</p>
<p><b>Решение</b>:</p>
<pre><code class="language-php">&lt;?
print ucfirst("how do you do today?"); // КАПИТАЛИЗВАТЬ НАЧАЛО ПРЕДЛОЖЕНИЯ
print ucwords("the prince of wales"); //КАПИТАЛИЗОВАТЬ КАЖДОЕ СЛОВО
print strtoupper("i'm not yelling!"); //ВЕРХНИЙ РЕГИСТР
print strtolower('IM YELLING'); //НИЖНИЙ РЕГИСТР
?></code></pre>
<?
print ucfirst("how do you do today?");
print "<br>";
print ucwords("the prince of wales");
print "<br>";
print strtoupper("i'm not yelling!");
print "<br>";
print strtolower('IM YELLING');
?>

<h4>Включение функций и выражений в строки</h4>
<p><b>Решение</b>: Когда значение, которое необходимо вставить в строку, не может быть в нее включено, следует применять оператор конкатенации строк (<span class="code">.</span>):</p>
<pre><code class="language-php">&lt;?
print 'You have '.($_REQUEST['boys'] + $_REQUEST['girls']).' children.';
print "The word '$word' is ".strlen($word).' characters long.';
print 'You owe '.$amounts['payment'].' immediately';
print "My circle's diameter is ".$circle->getDiameter().' inches.';
?></code></pre>

<pre><code class="language-php">&lt;? $children=10;
print "I have $children children.";?></code></pre>
<? $children=10;
print "I have $children children.";?>

<h4>Удаление пробелво из строки</h4>
<p><b>Задача</b>: Надо удалить пробельные символы в начале или в конце строки. Например, привести в порядок данные, введенные пользователем, прежде чем счесть их действительными.
</p>
<p><b>Решение</b>: Следует обратиться к функциям <span class="code">ltrim()</span>, <span class="code">rtrim()</span> или <span class="code">trim()</span>. Функция
    <span class="code">ltrim()</span> удаляет пробельные символы в начале строки, <span class="code">rtrim()</span> – в конце
    строки, а функция <span class="code">trim()</span> – и в начале, и в конце строки:</p>

<pre><code class="language-php">&lt;?
$zipcode = trim($_REQUEST['zipcode']);
$no_linefeed = rtrim($_REQUEST['text']);
$name = ltrim($_REQUEST['name']);
?></code></pre>

<h4>Разбиение строк</h4>
<p><b>Задача</b>: Необходимо разделить строку на части. Например, нужно получить доступ к каждой из строк, которые пользователь вводит в поле &lt;textarea> формы.
</p>
<p><b>Решение</b>:</p>
<p>Если в качестве разделителя частей строк выступает строковая контанта, то следует применять функцию <span class="code">explode()</span>:</p>
<pre><code class="language-php">&lt;?
$words = explode(' ','My sentence is not very complicated');
print_r($words);
?></code></pre>
<p><b>Вывод:</b></p><?
$words = explode(' ','My sentence is not very complicated');
print_r($words);
?>
<p>Разделить строку  с помощью регулярного выражения можно с помощью функции <span class="code">preg_split()</span>:</p>
<pre><code class="language-php">&lt;?
$words = split(' +','This sentence has some extra whitespace in it.');
$words = preg_split('/\d\. /','my day: 1. get up 2. get dressed 3. eat toast');
$lines = preg_split('/[\n\r]+/',$_REQUEST['textarea']);
?></code></pre>

<h2>Числовой тип</h2>
<p>PHP сам производит преобразования между int и float. Это, например, значит, что 3/2=1.5, а не 1 как в некоторых языках. PHP также конвертрует при необходимости строки в числа, например, 1+"1"=2</p>
<h4>Проверка, что это число</h4>
<p>Обратитесь к функции <span class="code">is_numeric()</span>:</p>
<pre><code class="language-php">&lt;?
echo is_numeric('five'); //false
echo is_numeric(5); //True
echo is_numeric('5'); //True
?></code></pre>
<?
echo is_numeric('five');
echo is_numeric(5);
echo is_numeric('5');
?>
<p>Другие проверки:</p>
<pre><code class="language-php">&lt;?
is_bool(), is_float(),  is_double(),  is_int(), is_long()
?></code></pre>
<h4>Сравнение чисел с плавающей точкой</h4>
<p>Необходимо проверить равенство двух чисел с плавающей точкой.</p>
<p>Задайте малую дельту и проверьте числа на равенство в пределах этой
    дельты:</p>
<pre><code class="language-php">&lt;?
$delta = 0.00001;
$a = 1.00000001;
$b = 1.00000000;
if (abs($a - $b) &lt; $delta) {print true; /* $a и $b равны */ }
?></code></pre>
<?
$delta = 0.00001;
$a = 1.00000001;
$b = 1.00000000;
if (abs($a - $b) < $delta) {print true; /* $a и $b равны */ }
?>
<h4>Округление</h4>
<pre><code class="language-php">&lt;?
$number = round(2.4); // $number = 2
$number = ceil(2.4); // $number = 3
$number = floor(2.4); // $number = 2

$delta = 0.0000001;
$number = round(2.5 + $delta);// $number = 3
?></code></pre>
<h4>Работа с последовательностью целых чисел</h4>
<p>Требуется применить некоторый код к диапазону целых чисел.</p>
<p>Это делается при помощи функции range(), которая возвращает мас
    сив, состоящий из целых чисел:</p>
<pre><code class="language-php">&lt;?
foreach(range($start,$end) as $i) {
    plot_point($i);
}
?></code></pre>
<h2>Булевы типы</h2>
<p>Заметим, что FALSE в PHP - это NULL, который не выводится при печати, например: </p>
<pre><code class="language-php">&lt;?php // test2.php
echo "a: [" . TRUE . "]&lt;br>";
echo "b: [" . FALSE . "]&lt;br>";
?></code></pre>
<?php // test2.php
echo "a: [" . TRUE . "]<br>";
echo "b: [" . FALSE . "]<br>";
?>
<pre><code class="language-php">&lt;?php
echo "a: [" . (20 > 9) . "]&lt;br>";
echo "b: [" . (5 == 6) . "]&lt;br>";
echo "c: [" . (1 == 0) . "]&lt;br>";
echo "d: [" . (1 == 1) . "]&lt;br>";
?></code></pre>
<?php
echo "a: [" . (20 > 9) . "]<br>";
echo "b: [" . (5 == 6) . "]<br>";
echo "c: [" . (1 == 0) . "]<br>";
echo "d: [" . (1 == 1) . "]<br>";
?>
<h2>Массивы</h2>
<pre><code class="language-php">&lt;?php
$array[0]="Диван";
$array[1]="Кресло";
$array[2]="Стол";
$array[3]="Стул";
?></code></pre>
<pre><code class="language-php">&lt;?php
$array['Фамилия']='Чернышев';
$array['Имя']='Егор';
$array['Отчество']='Сергеевич';
?></code></pre>
<pre><code class="language-php">&lt;?php
$array["Семенов"] = array("Возраст"=>"34", "Имя"=>"Игорь", "Отчество"=>
    "Онуфриевич");
$array["Козлов"] = array("Возраст"=>"44", "Имя"=>"Егор", "Отчество"=>
    "Тимофеевич");
$array["Федотов"] = array("Возраст"=>"32", "Имя"=>"Степан", "Отчество"=>
    "Лукич");
?></code></pre>

<p></p>
<p></p>


<h2>Преобразование типов</h2>
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
        <td class="tg-0pky">(int) (integer)</td>
        <td class="tg-0pky">В целое число через отбрасывание десятичной части.</td>
    </tr>
    <tr>
        <td class="tg-0pky">(bool) (boolean)</td>
        <td class="tg-0pky">В логическое значение.</td>
    </tr>
    <tr>
        <td class="tg-0pky">(float) (double) (real)</td>
        <td class="tg-0pky">В число с плавающей точкой.</td>
    </tr>
    <tr>
        <td class="tg-0pky">(string)</td>
        <td class="tg-0pky">В строку.</td>
    </tr>
    <tr>
        <td class="tg-0pky">(array)</td>
        <td class="tg-0pky">В массив.</td>
    </tr>
    <tr>
        <td class="tg-0pky">(object)</td>
        <td class="tg-0pky">В объект.<br></td>
    </tr>
    </tbody>
</table>

<!--Футер (+скрипты)-->
<?php
include_once $_SERVER['DOCUMENT_ROOT']."/common/footer.php";
?>