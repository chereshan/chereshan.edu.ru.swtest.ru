<!--Хедер (+скрипты)-->
<?
$PageTitle="Глава -8. Функции и обработка ошибок";
function customPageHeader(){?>
    <title>Глава -8. Функции и обработка ошибок</title>
<?}
include_once $_SERVER['DOCUMENT_ROOT']."/common/header.php";
?>





<h2>Указатель <span class="code">declare</span></h2>
<p>Команда <span class="code">declare</span> позволяет назначить указатели для выполнения блока кода. Структура команды <span class="code">declare</span>:</p>
<pre><code>&lt;?php
declare (указатель)команда
?></code></pre>
<p>В настоящее время существуют всего три формы объявления: указатели <span class="code">ticks</span>, <span class="code">encoding</span> и <span class="code">strict_types</span>. Указатель <span class="code">ticks</span> определяет, с какой частотой (измеряемой приблизительно в количестве команд) будет регистрироваться функция <span class="code">tick</span> при вызове <span class="code">register_tick_function()</span>. Пример:</p>
<pre><code>&lt;?php
register_tick_function("someFunction");
declare(ticks = 3) {
    for($i = 0; $i &lt; 10; $i++) {
        // ...
    }
}
?></code></pre>
<p>В этом коде <span class="code">someFunction()</span> вызывается после выполнения каждой третьей команды в блоке.</p>
<p>Указатель <span class="code">encoding</span> задает выходную кодировку для скрипта PHP. Пример:</p>
<pre><code>declare(encoding = "UTF-8");</code></pre>
<p>Эта форма команды declare игнорируется, если вы не компилируете PHP
с ключом <span class="code">--enable-zend-multibyte</span>.</p>
<p>Наконец, указатель <span class="code">strict_types</span> включает принудительное использование строгих типов данных при определении и использовании переменных.</p>

<h2>Команды <span class="code">exit</span> и <span class="code">return</span></h2>
<p>Как только в скрипте будет достигнута команда <span class="code">exit</span>, выполнение скрипта немедленно прервется. Команда <span class="code">return</span> возвращает управление из функции (на верхнем уровне программы — из скрипта).</p>
<p>Команда <span class="code">exit</span> получает необязательное значение: либо число, которое определяет код завершения процесса, либо строку, которая выводится перед завершением процесса. Функция <span class="code">die()</span> является псевдонимом для следующей формы команды <span class="code">exit</span>:</p>
<pre><code>&lt;?php
$db = mysql_connect("localhost", $USERNAME, $PASSWORD);
if (!$db) {
    die("Could not connect to database");
}
?></code></pre>
<p>Чаще используется запись следующего вида:</p>
<pre><code>&lt;?php
$db = mysql_connect("localhost", $USERNAME, $PASSWORD)
or die("Could not connect to database");
?></code></pre>

<h2>Команда <span class="code">goto</span></h2>
Команда <span class="code">goto</span> позволяет выполнить непосредственный переход к другой точке программы. Точка перехода определяется при помощи метки — идентификатора, за которым следует двоеточие (<span class="code">:</span>). После этого к метке можно перейти из другой точки программы с помощью <span class="code">goto</span>:
<pre><code>&lt;?php
for ($i = 0; $i &lt; $count; $i++) {
    // обнаружена ошибка
    if ($error) {
        goto cleanup;
    }
}
cleanup:
// завершающие действия
?></code></pre>
<p>Такой переход может проводиться только в области видимости, доступной
команде <span class="code">goto</span>, при этом точка перехода не может находиться в цикле или конструкции <span class="code">switch</span>. Как правило, везде, где может использоваться <span class="code">goto</span> (или многоуровневая команда <span class="code">break</span>), код можно переписать чище без этой команды.</p>



<!--Футер (+скрипты)-->
<?php
include_once $_SERVER['DOCUMENT_ROOT']."/common/footer.php";
?>
