<!--Хедер (+скрипты)-->
<?
$PageTitle="Глава 5. Численный тип PHP";
function customPageHeader(){?>
    <title>Глава 5. Численный тип PHP</title>
<?}
include_once $_SERVER['DOCUMENT_ROOT']."/common/header.php";
?>


<h2>Числовой тип</h2>
<p>В PHP численный тип делится на <span class="code">float</span> и <span class="code">int</span>. К счастью  PHP вам редко придется беспокоится об их различиях, т.к. PHP сам производит преобразования между <span class="code">int</span> и <span class="code">float</span>. Это, например, значит, что <span class="code">3/2=1.5</span>, а не 1 как в некоторых языках. PHP также конвертрует при необходимости строки в числа, например, <span class="code">1+"1"=2</span>.</p>
<h2>Проверка, что переменная содержит числоое значение</h2>
<p>Обратитесь к функции <span class="code">is_numeric()</span>:</p>
<pre><code>&lt;?
echo is_numeric('five');
echo is_numeric(5);
echo is_numeric('5');
?></code></pre>
<div class="code-example-output-title"><span>Вывод:</span>
    <div class="code-example-output">
<pre>
<?
echo is_numeric('five').'&#10;';
echo is_numeric(5).'&#10;';
echo is_numeric('5').'&#10;';
?>
</pre>
    </div>
</div>

<p>Проверки для конкретных подтипо численного типа:</p>
<pre><code class="language-php">&lt;?
is_bool(), is_float(),  is_double(),  is_int(), is_long()
?></code></pre>
<p>Продемонстрируем на более навороченном примере:</p>
<pre><code>&lt;?php
foreach ([5, '5', '05', 12.3, '16.7', 'five', 0xDECAFBAD, '10e200']
         as $maybeNumber) {
    $isItNumeric = is_numeric($maybeNumber);
    $actualType = gettype($maybeNumber);
    print "Is the $actualType $maybeNumber numeric? ";
    if (is_numeric($maybeNumber)) {
        print "yes";
    } else {
        print "no";
    }
    print "\n";
}
?></code></pre>
<div class="code-example-output-title"><span>Вывод:</span>
    <div class="code-example-output">
<pre>
<?php
foreach ([5, '5', '05', 12.3, '16.7', 'five', 0xDECAFBAD, '10e200']
         as $maybeNumber) {
    $isItNumeric = is_numeric($maybeNumber);
    $actualType = gettype($maybeNumber);
    print "Is the $actualType $maybeNumber numeric? ";
    if (is_numeric($maybeNumber)) {
        print "yes";
    } else {
        print "no";
    }
    print "&#10;";
}
?>
</pre>
    </div>
</div>

<h2>Сравнение чисел с плавающей точкой</h2>
<p><b>Задача:</b> Необходимо проверить равенство двух чисел с плавающей точкой.</p>
<p><b>Решение:</b> Задайте малую дельту и проверьте числа на равенство в пределах этой дельты:</p>
<pre><code>&lt;?
$delta = 0.00001;
$a = 1.00000001;
$b = 1.00000000;
if (abs($a - $b) &lt; $delta) {print true; /* $a и $b равны */ }
?></code></pre>
<div class="code-example-output-title"><span>Вывод:</span>
    <div class="code-example-output">
<pre>
<?
$delta = 0.00001;
$a = 1.00000001;
$b = 1.00000000;
if (abs($a - $b) < $delta) {print true; /* $a и $b равны */ }
?>
</pre>
    </div>
</div>
<p>При выходе за пределы разрядности происходит переполнение. В результате PHP (а также некоторые другие языки) иногда считают, что два равных числа различны, потому что они различаются в конечных разрядах.</p>

<h2>Округление</h2>
<pre><code>&lt;?php
echo round(2.4)."\n"; // $number = 2
echo ceil(2.4)."\n"; // $number = 3
echo floor(2.4)."\n"; // $number = 2

$delta = 0.0000001;
echo round(2.5 + $delta)."\n";// $number = 3
?></code></pre>
<div class="code-example-output-title"><span>Вывод:</span>
    <div class="code-example-output">
<pre>
<?php
echo round(2.4)."&#10;"; // $number = 2
echo ceil(2.4)."&#10;"; // $number = 3
echo floor(2.4)."&#10;"; // $number = 2

$delta = 0.0000001;
echo round(2.5 + $delta)."&#10;";// $number = 3
?>
</pre>
    </div>
</div>



<h2>Работа с последовательностью целых чисел</h2>
<p><b>Задача:</b> Требуется применить некоторый код к диапазону целых чисел.</p>
<p><b>Решение:</b> Это делается при помощи функции <span class="code">range()</span>, которая возвращает массив, состоящий из целых чисел, или же с помощью цикла <span class="code">for</span>:</p>
<pre><code>&lt;?php
$start = 3;
$end = 7;
for ($i = $start; $i &lt;= $end; $i++) {
    printf("%d squared is %d\n", $i, $i * $i);
}
?></code></pre>
<div class="code-example-output-title"><span>Вывод:</span>
    <div class="code-example-output">
<pre>
<?php
$start = 3;
$end = 7;
for ($i = $start; $i <= $end; $i++) {
    printf("%d squared is %d\n", $i, $i * $i);
}
?>
</pre>
    </div>
</div>

<p>Если вы хотите сохранить числа для использования, помимо перебора воспользуйтесь методом <span class="code">range()</span>:</p>
<pre><code>&lt;?php
$numbers = range(3, 7);
foreach ($numbers as $n) {
    printf("%d squared is %d\n", $n, $n * $n);
}
foreach ($numbers as $n) {
    printf("%d cubed is %d\n", $n, $n * $n * $n);
}
?></code></pre>
<div class="code-example-output-title"><span>Вывод:</span>
    <div class="code-example-output">
<pre>
<?php
$numbers = range(3, 7);
foreach ($numbers as $n) {
    printf("%d squared is %d\n", $n, $n * $n);
}
foreach ($numbers as $n) {
    printf("%d cubed is %d\n", $n, $n * $n * $n);
}
?>
</pre>
    </div>
</div>
<p>Функция <span class="code">range()</span> также может использоваться для генерирования символьных последовательностей:</p>
<pre><code>&lt;?php
print_r(range('l', 'p'));
?></code></pre>
<div class="code-example-output-title"><span>Вывод:</span>
    <div class="code-example-output">
<pre>
<?php
print_r(range('l', 'p'));
?>
</pre>
    </div>
</div>

<p>Для работы с сериями можно использовать генераторы — функции, которые вместо вызова return для возвращения значения вызывает <span class="code">yield</span> (возможно, в цикле). Вызов такой функции может быть применен всюду, где может использоваться массив, и вы работаете с сериями значений, передаваемых ключевому слову <span class="code">yield</span>. В следующем примере генератор используется для построения списка квадратов:</p>
<pre><code>&lt;?php
function squares($start, $stop) {
    if ($start &lt; $stop) {
        for ($i = $start; $i &lt;= $stop; $i++) {
            yield $i => $i * $i;
        }
    }
    else {
        for ($i = $stop; $i >= $start; $i--) {
            yield $i => $i * $i;
        }
    }
}
foreach (squares(3, 15) as $n => $square) {
    printf("%d squared is %d\n", $n, $square);
}
?></code></pre>
<div class="code-example-output-title"><span>Вывод:</span>
    <div class="code-example-output">
<pre>
<?php
function squares($start, $stop) {
    if ($start < $stop) {
        for ($i = $start; $i <= $stop; $i++) {
            yield $i => $i * $i;
        }
    }
    else {
        for ($i = $stop; $i >= $start; $i--) {
            yield $i => $i * $i;
        }
    }
}
foreach (squares(3, 15) as $n => $square) {
    printf("%d squared is %d\n", $n, $square);
}
?>
</pre>
    </div>
</div>

<h2>Случайные числа</h2>
<h3>Генерирование случайных чисел</h3>
<pre><code>&lt;?php
$lower = 65;
$upper = 97;
// Случайное число в диапазоне от $upper до $lower включительно
echo mt_rand($lower, $upper);
?>
</code></pre>
<div class="code-example-output-title"><span>Вывод:</span>
    <div class="code-example-output">
<pre>
<?php
$lower = 65;
$upper = 97;
// Случайное число в диапазоне от $upper до $lower включительно
echo mt_rand($lower, $upper);
?>
</pre>
    </div>
</div>


<h3>Генерирование воспроизводимых случайных чисел</h3>
<p><b>Задача:</b> Требуется генерировать предсказуемые случайные числа, чтобы гарантировать повторяемость поведения программы.</p>
<p><b>Решение:</b> Инициализируйте генератор случайных чисел заранее известным значением с использованием <span class="code">mt_srand()</span> (или <span class="code">srand()</span>):</p>
<pre><code>&lt;?php
function pick_color() {
 $colors = array('red','orange','yellow','blue','green','indigo','violet');
 $i = mt_rand(0, count($colors) - 1);
 return $colors[$i];
}
mt_srand(34534);
$first = pick_color();
$second = pick_color();
// Так как mt_srand() передается конкретное значение, каждый раз
// будут выбираться одни и те же цвета: красный (red) и желтый (yellow)
print "$first is red and $second is yellow.";
?></code></pre>
<div class="code-example-output-title"><span>Вывод:</span>
    <div class="code-example-output">
<pre>
<?php
function pick_color() {
 $colors = array('red','orange','yellow','blue','green','indigo','violet');
 $i = mt_rand(0, count($colors) - 1);
 return $colors[$i];
}
mt_srand(34534);
$first = pick_color();
$second = pick_color();
// Так как mt_srand() передается конкретное значение, каждый раз
// будут выбираться одни и те же цвета: красный (red) и желтый (yellow)
print "$first is red and $second is yellow.";
?>
</pre>
    </div>
</div>


<h3>Генерирование неравномерно распределенных случайных чисел</h3>
<p><b>Задача:</b> Требуется генерировать случайные числа с неравномерным распределением, чтобы некоторые числа появлялись чаще других. Например, серия показов рекламных баннеров должна распределяться пропорционально количеству показов, оставшихся для каждой рекламной кампании.</p>
<p><b>Решение:</b> Воспользуйтесь функцией <span class="code">rand_weighted()</span>, приведенной ниже:</p>
<pre><code>&lt;?php
// Функция возвращает случайно выбранный ключ из взвешенного набора
function rand_weighted($numbers) {
    $total = 0;
    foreach ($numbers as $number => $weight) {
        $total += $weight;
        $distribution[$number] = $total;
    }
    $rand = mt_rand(0, $total - 1);
    foreach ($distribution as $number => $weights) {
        if ($rand &lt; $weights) { return $number; }
    }
}
$ads = array('ford' => 12234, // Реклама, оставшиеся показы
'att' => 33424,
'ibm' => 16823);
echo rand_weighted($ads);
?></code></pre>
<div class="code-example-output-title"><span>Вывод:</span>
    <div class="code-example-output">
<pre>
<?php
// Функция возвращает случайно выбранный ключ из взвешенного набора
function rand_weighted($numbers) {
    $total = 0;
    foreach ($numbers as $number => $weight) {
        $total += $weight;
        $distribution[$number] = $total;
    }
    $rand = mt_rand(0, $total - 1);
    foreach ($distribution as $number => $weights) {
        if ($rand < $weights) { return $number; }
    }
}
$ads = array('ford' => 12234, // Реклама, оставшиеся показы
    'att' => 33424,
    'ibm' => 16823);
echo rand_weighted($ads);
?>
</pre>
    </div>
</div>

<h2>Математические функции</h2>
<h3>Логарифм</h3>
<pre><code>&lt;?php
echo log(10)."\n";
echo  log10(10)."\n";
echo  log10(700)."\n";
echo log(8, 2)."\n";
?></code></pre>
<div class="code-example-output-title"><span>Вывод:</span>
    <div class="code-example-output">
<pre>
<?php
echo log(10)."&#10;";
echo  log10(10)."&#10;";
echo  log10(700)."&#10;";
echo log(8, 2)."&#10;";
?>
</pre>
    </div>
</div>
<h3>Экспонента и возведение в степень</h3>
<pre><code>&lt;?php
// Переменная $exp (e в квадрате) равна примерно 7.389
echo exp(2)."\n";
// $exp (2^e) == примерно 6.58
echo pow( 2, M_E)."\n";
// $pow1 (2^10) == 1024
echo pow( 2, 10)."\n";
// $pow2 (2^-2) == 0.25
echo pow( 2, -2)."\n";
// $pow3 (2^2.5) == примерно 5.656
echo pow( 2, 2.5)."\n";
// $pow4 ( (-2)^10 ) == 1024
echo pow(-2, 10)."\n";
// is_nan($pow5) возвращает true, потому что экспонента
// отрицательного числа 2 с дробным показателем
// не является вещественным числом.
echo pow(-2, -2.5)."\n";
?></code></pre>
<div class="code-example-output-title"><span>Вывод:</span>
    <div class="code-example-output">
<pre>
<?php
// Переменная $exp (e в квадрате) равна примерно 7.389
echo exp(2)."&#10;";
// $exp (2^e) == примерно 6.58
echo pow( 2, M_E)."&#10;";
// $pow1 (2^10) == 1024
echo pow( 2, 10)."&#10;";
// $pow2 (2^-2) == 0.25
echo pow( 2, -2)."&#10;";
// $pow3 (2^2.5) == примерно 5.656
echo pow( 2, 2.5)."&#10;";
// $pow4 ( (-2)^10 ) == 1024
echo pow(-2, 10)."&#10;";
// is_nan($pow5) возвращает true, потому что экспонента
// отрицательного числа 2 с дробным показателем
// не является вещественным числом.
echo pow(-2, -2.5)."&#10;";
?>
</pre>
    </div>
</div>
<h3>Тригонометрические функции</h3>
<p>PHP поддерживает тригонометрические функции <span class="code">sin()</span>, <span class="code">cos()</span>, <span class="code">tan()</span>, <span class="code">asin()</span>, <span class="code">acos()</span>, <span class="code">atan()</span>, <span class="code">sinh()</span>, <span class="code">cosh()</span> и <span class="code">tanh()</span>, <span class="code">asinh()</span>, <span class="code">acosh()</span> и <span class="code">atanh()</span>.</p>
<pre><code>&lt;?php
echo cos(2 * M_PI)."n";
echo atan(M_PI / 4)."n";
?></code></pre>
<div class="code-example-output-title"><span>Вывод:</span>
    <div class="code-example-output">
<pre>
<?php
echo cos(2 * M_PI)."&#10;";
echo atan(M_PI / 4)."&#10;";
?>
</pre>
    </div>
</div>
<p>Заметим, что углы задаются в радианах, а не в градусах. Для перевода из градусов в радианы используется функция <span class="code">deg2rad()</span> (наоборот, <span class="code">rad2deg()</span>).</p>
<pre><code>&lt;?php
$degree = 90;
// Косинус 90 градусов равен 0
echo cos(deg2rad($degree));
?></code></pre>
<div class="code-example-output-title"><span>Вывод:</span>
    <div class="code-example-output">
<pre>
<?php
$degree = 90;
// Косинус 90 градусов равен 0
echo cos(deg2rad($degree));
?>
</pre>
    </div>
</div>

<h2>Форматирование чисел</h2>
<p><b>Задача:</b> Требуется вывести число с разделителями групп разрядов и дробной части. Например, вы хотите вывести количество посетителей страницы или процент людей, проголосовавших в опросе.</p>
<p><b>Решение:</b> Если в качестве разделителей групп разрядов и дробной части всегда используются конкретные символы, воспользуйтесь функцией <span class="code">number_format()</span>:</p>
<pre><code>&lt;?php
$number = 1234.56;
// $formatted1 содержит "1,235" - 1234.56 округляется в большую сторону,
// а символ, является разделителем групп разрядов
echo number_format($number)."n";
// Второй аргумент задает количество знаков в дробной части.
// $formatted2 содержит 1,234.56
echo number_format($number, 2)."n";
// Третий аргумент задает символ разделителя дробной части.
// Четвертый аргумент задает разделитель групп разрядов.
// $formatted3 is 1.234,56
echo number_format($number, 2, ",", ".");
?></code></pre>
<div class="code-example-output-title"><span>Вывод:</span>
    <div class="code-example-output">
<pre>
<?php
$number = 1234.56;
// $formatted1 содержит "1,235" - 1234.56 округляется в большую сторону,
// а символ, является разделителем групп разрядов
echo number_format($number)."&#10;";
// Второй аргумент задает количество знаков в дробной части.
// $formatted2 содержит 1,234.56
echo number_format($number, 2)."&#10;";
// Третий аргумент задает символ разделителя дробной части.
// Четвертый аргумент задает разделитель групп разрядов.
// $formatted3 is 1.234,56
echo number_format($number, 2, ",", ".");
?>
</pre>
    </div>
</div>
<p>Форматирование чисел особенно полезно, если речь идет о денежных суммах. Для этого можно воспользоваться классом <span class="code">NumberFormatter</span>:</p>
<pre><code>&lt;?php
$number = 1234.56;
// В США используются знаки $ , и .
// $formatted1 содержит $1,234.56
$usa = new NumberFormatter("en-US", NumberFormatter::CURRENCY);
echo $usa->format($number)."n";
// Во Франции используются знаки , и €
// $formatted2 содержит 1 234,56 €
$france = new NumberFormatter("fr-FR", NumberFormatter::CURRENCY);
echo $france->format($number);
?></code></pre>
<div class="code-example-output-title"><span>Вывод:</span>
    <div class="code-example-output">
<pre>
<?php
$number = 1234.56;
// В США используются знаки $ , и .
// $formatted1 содержит $1,234.56
$usa = new NumberFormatter("en-US", NumberFormatter::CURRENCY);
echo $usa->format($number)."&#10;";
// Во Франции используются знаки , и €
// $formatted2 содержит 1 234,56 €
$france = new NumberFormatter("fr-FR", NumberFormatter::CURRENCY);
echo $france->format($number);
?>
</pre>
    </div>
</div>

<h2>Использование библиотек <span class="code">BCMath</span> и <span class="code">GMP</span></h2>
<p>Библиотеки <span class="code">BCMath</span> и <span class="code">GMP</span> позволяют легко работать с очень большими и очень малыми числами:</p>
<pre><code>&lt;?php
// $sum = "9999999999999999"
$sum= bcadd('1234567812345678', '8765432187654321')."\n";
$sum= gmp_add('1234567812345678', '8765432187654321')."\n";
// $sum - ресурс GMP, а не строка; для преобразования
// используется функция gmp_strval()
print gmp_strval($sum); // Выводится 9999999999999999
?></code></pre>
<p>Возможности GMP отнюдь не ограничиваются сложением: библиотека позволяет возводить числа в степень, очень быстро вычислять большие факториалы,
находить наибольший общий делитель и выполнять другие математические
операции, как показано ниже:</p>
<?// Возведение числа в степень
echo gmp_pow(2, 10)."&#10;";
// Очень быстрое вычисление больших факториалов
echo  gmp_fact(20)."&#10;";
// Поиск наибольшего общего делителя
echo  gmp_gcd(123, 456)."&#10;";
// Другие экзотические операции
echo  gmp_legendre(1, 7)."&#10;";
?>

<p>Не следует полагать, что библиотеки <span class="code">BCMath</span> и <span class="code">GMP</span> всегда доступны во всех конфигурациях PHP. Библиотека <span class="code">BCMath</span> поставляется с PHP, поэтому, скорее всего, она будет доступна. Однако GMP в поставку PHP не входит, поэтому вам придется загрузить ее, установить и приказать PHP использовать ее в процессе настройки. Чтобы узнать, можно ли использовать BCMath и GMP, проверьте значения <span class="code">function_defined('bcadd')</span> и <span class="code">function_defined('gmp_init')</span>.</p>
<pre><code>&lt;?php
echo function_exists('bcadd');
echo function_exists('gmp_init');
?></code></pre>
<div class="code-example-output-title"><span>Вывод:</span>
    <div class="code-example-output">
<pre>
<?php
echo function_exists('bcadd')."&#10;";
echo function_exists('gmp_init');
?>
</pre>
    </div>
</div>

</pre>
    </div>
</div>


<h2>Системы счисления</h2>
<p><b>Задача:</b> Требуется преобразовать число из одной системы счисления в другую.</p>
<p><b>Решение:</b> Воспользуйтесь функцией <span class="code">base_convert()</span>:</p>
<pre><code>&lt;?php
// Шестнадцатеричное число (по основанию 16)
$hex = 'a1';
// Преобразование из шестнадцатеричной системы счисления в десятичную.
// $decimal содержит '161'
echo base_convert($hex, 16, 10);
?></code></pre>
<div class="code-example-output-title"><span>Вывод:</span>
    <div class="code-example-output">
<pre>
<?php
// Шестнадцатеричное число (по основанию 16)
$hex = 'a1';
// Преобразование из шестнадцатеричной системы счисления в десятичную.
// $decimal содержит '161'
echo base_convert($hex, 16, 10);
?>
</pre>
    </div>
</div>
<p>Также существуют специализированные функции для преобразования из десятичной системы счисления в другие часто используемые системы с основаниями 2, 8 и 16, и обратно. Это функции <span class="code">bindec()</span> и <span class="code">decbin()</span>, <span class="code">octdec()</span> и <span class="code">decoct()</span>, <span class="code">hexdec()</span> и <span class="code">dechex()</span>:</p>
<pre><code>&lt;?php
// Переход от основания 2 к основанию 10
// $a = 27
echo bindec(11011);
// Переход от основания 8 к основанию 10
// $b = 27
echo octdec(33);
// Переход от основания 16 к основанию 10
// $c = 27
echo hexdec('1b');
// Переход от основания 10 к основанию 2
// $d = '11011'
echo decbin(27);
// $e = '33'
echo decoct(27);
// $f = '1b'
echo dechex(27);
?></code></pre>
<div class="code-example-output-title"><span>Вывод:</span>
    <div class="code-example-output">
<pre>
<?php
// Переход от основания 2 к основанию 10
// $a = 27
echo bindec(11011)."&#10;";
// Переход от основания 8 к основанию 10
// $b = 27
echo octdec(33)."&#10;";
// Переход от основания 16 к основанию 10
// $c = 27
echo hexdec('1b')."&#10;";
// Переход от основания 10 к основанию 2
// $d = '11011'
echo decbin(27)."&#10;";
// $e = '33'
echo decoct(27)."&#10;";
// $f = '1b'
echo dechex(27)."&#10;";
?>
</pre>
    </div>
</div>

<!--<p><b>Задача:</b> </p>-->
<!--<p><b>Решение:</b> </p>-->
<h2>Практика: определение расстояния между двумя географическими точками</h2>
<p><b>Задача:</b> Требуется определить расстояние между двумя точками на земной поверхности.</p>
<p><b>Решение:</b> Используйте функцию <span class="code">sphere_distance()</span>, как показано ниже:</p>
<pre><code>&lt;?php
function sphere_distance($lat1, $lon1, $lat2, $lon2, $radius = 6378.135) {
    $rad = doubleval(M_PI/180.0);
    $lat1 = doubleval($lat1) * $rad;
    $lon1 = doubleval($lon1) * $rad;
    $lat2 = doubleval($lat2) * $rad;
    $lon2 = doubleval($lon2) * $rad;
    $theta = $lon2 - $lon1;
    $dist = acos(sin($lat1) * sin($lat2) +
        cos($lat1) * cos($lat2) *
        cos($theta));
    if ($dist &lt; 0) { $dist += M_PI; }
    // По умолчанию используется экваториальный радиус Земли в километрах
    return $dist = $dist * $radius;
}
$lat1 = 40.858704;
$lon1 = -73.928532;
// Сан-Франциско (94144)
$lat2 = 37.758434;
$lon2 = -122.435126;
$dist = sphere_distance($lat1, $lon1, $lat2, $lon2);
// От Нью-Йорка до Сан-Франциско около 2570 миль.
// $formatted содержит 2570.18
echo sprintf("%.2f", $dist * 0.621); // Форматирование
// и преобразование в мили
?></code></pre>
<div class="code-example-output-title"><span>Вывод:</span>
    <div class="code-example-output">
<pre>
<?php
function sphere_distance($lat1, $lon1, $lat2, $lon2, $radius = 6378.135) {
    $rad = doubleval(M_PI/180.0);
    $lat1 = doubleval($lat1) * $rad;
    $lon1 = doubleval($lon1) * $rad;
    $lat2 = doubleval($lat2) * $rad;
    $lon2 = doubleval($lon2) * $rad;
    $theta = $lon2 - $lon1;
    $dist = acos(sin($lat1) * sin($lat2) +
        cos($lat1) * cos($lat2) *
        cos($theta));
    if ($dist < 0) { $dist += M_PI; }
    // По умолчанию используется экваториальный радиус Земли в километрах
    return $dist = $dist * $radius;
}
$lat1 = 40.858704;
$lon1 = -73.928532;
// Сан-Франциско (94144)
$lat2 = 37.758434;
$lon2 = -122.435126;
$dist = sphere_distance($lat1, $lon1, $lat2, $lon2);
// От Нью-Йорка до Сан-Франциско около 2570 миль.
// $formatted содержит 2570.18
echo sprintf("%.2f", $dist * 0.621); // Форматирование
// и преобразование в мили
?>
</pre>
    </div>
</div>









<!--Футер (+скрипты)-->
<?php
include_once $_SERVER['DOCUMENT_ROOT']."/common/footer.php";
?>
