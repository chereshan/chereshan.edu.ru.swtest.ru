<!--Хедер (+скрипты)-->
<?
$PageTitle="Глава 3. Условные операторы и циклы PHP";
function customPageHeader(){?>
    <title>Глава 3. Условные операторы и циклы PHP</title>
<?}
include_once $_SERVER['DOCUMENT_ROOT']."/common/header.php";
?>
<p>Условные команды (такие, как <span class="code">if</span>…<span class="code">else</span> и <span class="code">switch</span>) позволяют программе выполнять разные ветви кода (или не выполнять их) в зависимости от некоторого условия. Циклы (<span class="code">while</span>, <span class="code">for</span> и т. д.) обеспечивают возможность многократного выполнения отдельных сегментов кода.</p>
<h2>Условные операторы</h2>
<h3>Условный оператор <span class="code">if</span></h3>
<p>Грамматика условного оператор PHP имеет следующий формат:</p>
<pre><code>&lt;?php
//просто if
if (выражение) команда
//if со сложной командой
if (выражение) {несколько команд}
//с оператором "иначе"
if (выражение)
    команда
else команда
?></code></pre>
<p>Вместо того чтобы заключать блок команд в фигурные скобки, поставьте в конце строки <span class="code">if</span> двоеточие (<span class="code">:</span>) и завершите блок конкретным ключевым словом (<span class="code">endif</span> в данном случае). Пример:</p>
<pre><code>&lt;?php
if ($user_validated):
    echo "Добро пожаловать!";
    $greeted = 1;
else:
    echo "Вход воспрещен!";
    exit;
endif;
?></code></pre>
<p>Выгода от использования оператора endif состоит в том, что он позволяет просто интегрировать код PHP и разметку HTML:</p>
<pre><code>&lt;?php
$user_validated=true;
if ($user_validated) : ?>
    &lt;table>
        &lt;tr>
            &lt;td>First Name:&lt;/td>&lt;td>Sophia&lt;/td>
        &lt;/tr>
        &lt;tr>
            &lt;td>Last Name:&lt;/td>&lt;td>Lee&lt;/td>
        &lt;/tr>
    &lt;/table>
&lt;?php else: ?>
    Please log in.
&lt;?php endif ?></code></pre>
<div class="code-example-output-title"><span>Вывод:</span>
    <div class="code-example-output">
<pre>
<?php
$user_validated=true;
if ($user_validated) : ?>
    <table>
        <tr>
            <td>First Name:</td><td>Sophia</td>
        </tr>
        <tr>
            <td>Last Name:</td><td>Lee</td>
        </tr>
    </table>
<?php else: ?>
    Please log in.
<?php endif ?>
</pre>
    </div>
</div>

<p>Вместо использования цепочек вложенных друг в друга операторов <span class="code">else</span> и <span class="code">if</span> можно сэкономить время используя оператор <span class="code">elseif</span>:</p>
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

<h3>Тернарный оператор (<span class="code">?:</span>)</h3>
<p>Для простых проверок истинности можно использовать тернарный оператор. Вместо следующей громоздкой записи:</p>
<pre><code>&lt;td>&lt;?php if($active) { echo "yes"; } else { echo "no"; } ?>&lt;/td></code></pre>
<p>Можно использовать более компактную с идентичным выводом:</p>
<pre><code>&lt;td>&lt;?php echo $active ? "yes" : "no"; ?>&lt;/td></code></pre>
<div class="code-example-output-title"><span>Вывод:</span>
    <div class="code-example-output">
<pre>
<td><?php echo $active ? "yes" : "no"; ?></td>
</pre>
    </div>
</div>


<h3>Условный оператор <span class="code">switch</span></h3>
<p>Команда <span class="code">switch</span> получает выражение и сравнивает его значение со всеми альтернативами в <span class="code">switch</span>. Все команды совпадающего варианта выполняются до первого обнаружения ключевого слова <span class="code">break</span>. Если ни один вариант не совпадет и в команде задан вариант по умолчанию, выполняются все команды за ключевым словом <span class="code">default</span> до обнаружения первого ключевого слова <span class="code">break</span>.</p>
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

<h2>Циклы PHP</h2>
<h3>Цикл <span class="code">while</span></h3>
<p>Команда while представляет простейшую форму цикла:</p>
<pre><code>&lt;?php
while (выражение)команда
?></code></pre>
<p>Если выражение дает результат <span class="code">true</span>, то команда выполняется, после чего выражение вычисляется заново, и если оно по-прежнему равно <span class="code">true</span>, то тело цикла выполняется снова, и т. д. Цикл завершается, когда выражение перестает быть истинным (результатом его вычисления становится <span class="code">false</span>).</p>
<pre><code>&lt;?php
$fuel = 10;
while ($fuel >= 1)
{
    // Продолжение поездки...
    echo "Топлива еще достаточно ($fuel)".'\n';
    $fuel--;
}
?></code></pre>
<div class="code-example-output-title"><span>Вывод:</span>
    <div class="code-example-output">
<pre>
<?php
$fuel = 10;
while ($fuel >= 1)
{
    // Продолжение поездки...
    echo "Топлива еще достаточно ($fuel)".'&#10;';
    $fuel--;
}
?>
</pre>
    </div>
</div>

<p>Альтернативный синтаксис <span class="code">while</span> без использования фигурных скобок:</p>
<pre><code>&lt;?php
$count = 1;
while ($count &lt;= 12):
    echo "Число $count, умноженное на 12, равно " . $count * 12 . "&lt;br>";
    ++$count;
endwhile;
?></code></pre>
<div class="code-example-output-title"><span>Вывод:</span>
    <div class="code-example-output">
<pre>
<?php
$count = 1;
while ($count <= 12):
    echo "Число $count, умноженное на 12, равно " . $count * 12 . "<br>";
    ++$count;
endwhile;
?>
</pre>
    </div>
</div>
<p>Цикл while можно преждевременно прервать ключевым словом <span class="code">break</span>:</p>
<pre><code>&lt;?php
$total = 0;
$i = 1;
while ($i &lt;= 10) {
    echo $total.'&lt;br>';
    if ($i == 5) {
        break; // выход из цикла
    }
    $total += $i;
    $i++;
}
?></code></pre>
<div class="code-example-output-title"><span>Вывод:</span>
    <div class="code-example-output">
<pre>
<?php
$total = 0;
$i = 1;
while ($i <= 10) {
    echo $total.'<br>';
    if ($i == 5) {
        break; // выход из цикла
    }
    $total += $i;
    $i++;
}
?>
</pre>
    </div>
</div>
<p>Также можно указать после ключевого слова <span class="code">break</span> число, определяющее количество уровней прерываемых циклов. Таким образом команда, выполняемая из вложенных циклов, может осуществить выход из внешнего цикла. Пример: </p>
<pre><code>&lt;?php
$i = 0;
$j = 0;
while ($i &lt; 10) {
    while ($j &lt; 10) {
        if ($j == 5) {
            break 2; // Выход из двух циклов while
        }
        $j++;
    }
    $i++;
}
echo "{$i}, {$j}";
?></code></pre>
<div class="code-example-output-title"><span>Вывод:</span>
    <div class="code-example-output">
<pre>
<?php
$i = 0;
$j = 0;
while ($i < 10) {
    while ($j < 10) {
        if ($j == 5) {
            break 2; // Выход из двух циклов while
        }
        $j++;
    }
    $i++;
}
echo "{$i}, {$j}";
?>
</pre>
    </div>
</div>
<p>Команда <span class="code">continue</span> осуществляет ускоренный переход к следующей проверке условия цикла. Как и в случае с ключевым словом <span class="code">break</span>, в команде <span class="code">continue</span> можно указать необязательное количество уровней циклической структуры:</p>
<pre><code>&lt;?php
$i = 0;
$j = 0;
while ($i &lt; 10) {
    echo $i.'&lt;br>';
    $i++;
    while ($j &lt; 10) {
        if ($j == 5) {
            continue 2; // продолжить через два уровня
        }
        $j++;
    }
}
?></code></pre>
<div class="code-example-output-title"><span>Вывод:</span>
    <div class="code-example-output">
<pre>
<?php
$i = 0;
$j = 0;
while ($i < 10) {
    echo $i.'<br>';
    $i++;
    while ($j < 10) {
        if ($j == 5) {
            continue 2; // продолжить через два уровня
        }
        $j++;
    }
}
?>
</pre>
    </div>
</div>




<h3>Цикл <span class="code">do</span></h3>
<p>Цикл <span class="code">do</span>...<span class="code">while</span> представляет собой небольшую модификацию цикла <span class="code">while</span>, используемую в том случае, когда нужно, чтобы блок кода был исполнен хотя бы один раз, а условие проверялось только после этого.</p>
<pre><code class="language-php">&lt;?php
$count = 1;
do
    echo "Число $count, умноженное на 12, равно " . $count * 12 . "&lt;br>";
while (++$count &lt;= 12);
?></code></pre>

<h3>Цикл <span class="code">for</span></h3>
<p>Цикл <span class="code">for</span> похож на цикл <span class="code">while</span>, не считая того, что в нем добавляется инициализированный управляемый счетчик. Часто <span class="code">for</span> читается быстрее и проще <span class="code">while</span>.</p>
<p>Структура цикла for:</p>
<pre><code>&lt;?php
for (начало; условие; изменение) { команда(-ы); }
?></code></pre>
<pre><code>&lt;?php
for ($count = 1 ; $count &lt;= 12 ; ++$count)
    echo "Число $count, умноженное на 12, равно " . $count * 12 . "&lt;br>";
?></code></pre>
<div class="code-example-output-title"><span>Вывод:</span>
    <div class="code-example-output">
<pre>
<?php
for ($count = 1 ; $count <= 12 ; ++$count)
    echo "Число $count, умноженное на 12, равно " . $count * 12 . "<br>";
?>
</pre>
    </div>
</div>

<p>Для цикла <span class="code">for</span> PHP также поддерживаются специальные слова <span class="code">break</span> и <span class="code">continue</span>.</p>
<pre><code>&lt;?php
$j = 11;
while ($j > -10)
{
    $j--;
    if ($j == 0) continue;
    echo (10 / $j) . "&lt;br>";
}
?></code></pre>
<div class="code-example-output-title"><span>Вывод:</span>
    <div class="code-example-output">
<pre>
<?php
$j = 11;
while ($j > -10)
{
    $j--;
    if ($j == 0) continue;
    echo (10 / $j) . "<br>";
}
?>
</pre>
    </div>
</div>
<p>Оператор for также поддерживает альтернативный синтаксис без фигурных скобок:</p>
<pre><code>&lt;?php
$total = 0;
for ($i = 1; $i &lt;= 10; $i++):
    $total += $i;
endfor;
?></code></pre>

<h3>Цикл <span class="code">foreach</span></h3>
<p>Команда <span class="code">foreach</span> предназначена для перебора элементов массива. Чтобы перебрать массив, последовательно обращаясь к значению, связанному с каждым ключом, используйте следующую форму:</p>
<pre><code>&lt;?php
foreach ($array as $current) {
    // ...
}
?></code></pre>
<p>Альтернативный синтаксис:</p>
<pre><code>foreach ($array as $current):
// ...
endforeach;</code></pre>

<p>Для перебора массива с обращением как к ключу, так и к значению используйте
следующую форму:</p>
<pre><code>foreach ($array as $key => $value) {
// ...
}</code></pre>


<!--Футер (+скрипты)-->
<?php
include_once $_SERVER['DOCUMENT_ROOT']."/common/footer.php";
?>