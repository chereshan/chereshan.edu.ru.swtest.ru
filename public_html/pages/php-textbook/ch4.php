<!--Хедер (+скрипты)-->
<?
$PageTitle="Глава 4. Циклы, условные операторы и функции PHP";
function customPageHeader(){?>
    <title>Глава 4. Циклы, условные операторы и функции PHP</title>
<?}
include_once $_SERVER['DOCUMENT_ROOT']."/common/header.php";
?>
<h2>Условный оператор</h2>
<pre><code class="language-php">&lt;?
if ($bank_balance &lt; 100) {
    $money = 1000;
    $bank_balance += $money;
}
elseif ($bank_balance > 200) {
    $savings += 100;
    $bank_balance -= 100;
}
else {
    $savings += 50;
    $bank_balance -= 50;
}
?></code></pre>

<pre><code class="language-php">&lt;?php
switch ($page) {
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
    default:
        echo "Нераспознанный выбор";
        break;
}
        default:
 echo "Нераспознанный выбор";
 break;
?></code></pre>

<pre><code class="language-php">&lt;?php
echo $fuel &lt;= 1 ? "Требуется дозаправка" : "Топлива еще достаточно";
?></code></pre>

<h2>Циклы PHP</h2>
<h3>WHILE</h3>
<pre><code class="language-php">&lt;?php
$fuel = 10;
while ($fuel > 1)
{
    // Продолжение поездки...
    echo "Топлива еще достаточно";
}
?></code></pre>
<pre><code class="language-php">&lt;?php
$count = 1;
while ($count &lt;= 12)
{
    echo "Число $count, умноженное на 12, равно " . $count * 12 . "&lt;br>";
    ++$count;
}
?></code></pre>
<?php
$count = 1;
while ($count <= 12)
{
    echo "Число $count, умноженное на 12, равно " . $count * 12 . "<br>";
    ++$count;
}
?>

<h3>DO</h3>
<p>Цикл do...while представляет собой небольшую модификацию цикла while,
    используемую в том случае, когда нужно, чтобы блок кода был исполнен хотя
    бы один раз, а условие проверялось только после этого.</p>
<pre><code class="language-php">&lt;?php
$count = 1;
do
    echo "Число $count, умноженное на 12, равно " . $count * 12 . "&lt;br>";
while (++$count &lt;= 12);
?></code></pre>

<h3>FOR</h3>
<pre><code class="language-php">&lt;?php
for ($count = 1 ; $count &lt;= 12 ; ++$count)
    echo "Число $count, умноженное на 12, равно " . $count * 12 . "&lt;br>";
?></code></pre>
<?php
for ($count = 1 ; $count <= 12 ; ++$count)
    echo "Число $count, умноженное на 12, равно " . $count * 12 . "<br>";
?>

<p>В PHP есть break и continue.</p>
<pre><code class="language-php">&lt;?php
$j = 11;
while ($j > -10)
{
    $j--;
    if ($j == 0) continue;
    echo (10 / $j) . "&lt;br>";
}
?></code></pre>
<?php
 $j = 11;
 while ($j > -10)
 {
 $j--;
 if ($j == 0) continue;
 echo (10 / $j) . "<br>";
 }
?>

<!--Футер (+скрипты)-->
<?php
include_once $_SERVER['DOCUMENT_ROOT']."/common/footer.php";
?>