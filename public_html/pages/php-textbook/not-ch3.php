<!--Хедер (+скрипты)-->
<?
$PageTitle="Глава -1. Численный тип PHP";
function customPageHeader(){?>
    <title>Глава -2. Численный тип PHP</title>
<?}
include_once $_SERVER['DOCUMENT_ROOT']."/common/header.php";
?>


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

<!--Футер (+скрипты)-->
<?php
include_once $_SERVER['DOCUMENT_ROOT']."/common/footer.php";
?>
