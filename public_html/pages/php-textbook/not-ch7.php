<!--Хедер (+скрипты)-->
<?
$PageTitle="Глава -8. Функции и обработка ошибок";
function customPageHeader(){?>
    <title>Глава -8. Функции и обработка ошибок</title>
<?}
include_once $_SERVER['DOCUMENT_ROOT']."/common/header.php";
?>


<h2>Функции в PHP</h2>
<p><b>Функция</b> — это набор инструкций, который выполняет конкретную задачу
и в дополнение к этому может вернуть какое-нибудь значение.</p>
<p>Преимущество использования функций состоит в частности в сокращении времени выполнения, поскольку каждая функция компилируется только один раз, независимо от частоты ее вызовов.</p>
<h3>Некоторые встроенные функции PHP</h3>
<p>PHP поставляется с несколькими сотнями готовых к работе встроенных функций, превращающих его в язык с очень богатыми возможностями. Например:</p>
<pre><code>&lt;?php
echo date("l"); // Показывает день недели
?></code></pre>
<div class="code-example-output-title"><span>Вывод:</span>
    <div class="code-example-output">
<pre>
<?php
echo date("l"); // Показывает день недели
?>
</pre>
    </div>
</div>
<p>Круглые скобки сообщают PHP, что вы ссылаетесь на функцию. В противном
    случае будет считаться, что вы ссылаетесь на константу или на переменную.</p>
<p>Показанная ниже функция <span class="code">phpinfo</span> отображает массу информации
    о текущей установке PHP и не требует никаких аргументов:</p>
<pre><code>&lt;?php
phpinfo()
?></code></pre>
<p>Функция <span class="code">phpinfo</span> весьма полезна для получения информации о текущей
    установке PHP, но этой информацией могут воспользоваться и потенциальные злоумышленники. Поэтому никогда не оставляйте вызов этой функции в коде, подготовленном для работы в Сети.</p>
<p>Чтобы увидеть конкретно версию используемого на сайте PHP, то можно вызвать следующую функцию:</p>
<pre><code>&lt;?php
echo phpversion();
?></code></pre>
<div class="code-example-output-title"><span>Вывод:</span>
    <div class="code-example-output">
<pre>
<?php
echo phpversion();
?>
</pre>
    </div>
</div>


<h3>Определение функции</h3>
<p>В общем виде для функции используется следующий синтаксис:</p>
<pre><code>&lt;?php
function имя_функции([параметр [, ...]])
{
 // Инструкции
}
?></code></pre>
<p>Заметим, что наличие круглых скобок обязательно. Необязательными являются один или несколько параметров в круглых скобках.</p>
<p>Имена функций нечувствительны к регистру использующихся в них букв, поэтому все следующие строки могут ссылаться на одну и ту же функцию <span class="code">print</span>: <span class="code">PRINT</span>, <span class="code">Print</span> и <span class="code">PrInT</span>.</p>
<p>Функции можно определять уже после их вызова:</p>
<pre><code>&lt;?php
echo fix_names("WILLIAM", "henry", "gatES");
function fix_names($n1, $n2, $n3)
{
    $n1 = ucfirst(strtolower($n1));
    $n2 = ucfirst(strtolower($n2));
    $n3 = ucfirst(strtolower($n3));
    return $n1 . " " . $n2 . " " . $n3;
}
?></code></pre>
<div class="code-example-output-title"><span>Вывод:</span>
    <div class="code-example-output">
<pre>
<?php
echo fix_names("WILLIAM", "henry", "gatES");
function fix_names($n1, $n2, $n3)
{
    $n1 = ucfirst(strtolower($n1));
    $n2 = ucfirst(strtolower($n2));
    $n3 = ucfirst(strtolower($n3));
    return $n1 . " " . $n2 . " " . $n3;
}
?>
</pre>
    </div>
</div>
<h3>Возвращение глобальных переменных</h3>
<p>Лучшим способом предоставления функции доступа к переменной, созданной
за ее пределами и не передающейся в качестве аргумента, является объявление
ее глобальной прямо из тела функции. За ключевым словом <span class="code">global</span> должно следовать имя переменной, тогда полный доступ к этой переменной можно будет получить из любой части вашего кода:</p>
<pre><code>&lt;?php
$a1 = "WILLIAM";
$a2 = "henry";
$a3 = "gatES";
echo $a1 . " " . $a2 . " " . $a3 . "&lt;br>";
fix_names();
echo $a1 . " " . $a2 . " " . $a3;
function fix_names()
{
    global $a1; $a1 = ucfirst(strtolower($a1));
    global $a2; $a2 = ucfirst(strtolower($a2));
    global $a3; $a3 = ucfirst(strtolower($a3));
}
?></code></pre>
<div class="code-example-output-title"><span>Вывод:</span>
    <div class="code-example-output">
<pre>
<?php
$a1 = "WILLIAM";
$a2 = "henry";
$a3 = "gatES";
echo $a1 . " " . $a2 . " " . $a3 . "<br>";
fix_names2();
echo $a1 . " " . $a2 . " " . $a3;
function fix_names2()
{
    global $a1; $a1 = ucfirst(strtolower($a1));
    global $a2; $a2 = ucfirst(strtolower($a2));
    global $a3; $a3 = ucfirst(strtolower($a3));
}
?>
</pre>
    </div>
</div>
<h3>Доступность функции</h3>
<p>Если нужно проверить доступность в вашем коде какой-нибудь конкретной функции, можно воспользоваться функцией <span class="code">function_exists</span>, которая проверяет все предопределенные и созданные пользователем функции.</p>
<pre><code>&lt;?php
if (function_exists("array_combine"))
{
    echo "Функция существует";
}
else
{
    echo "Функция не существует, желательно создать ее самостоятельно";
}
?></code></pre>
<div class="code-example-output-title"><span>Вывод:</span>
    <div class="code-example-output">
<pre>
<?php
if (function_exists("array_combine"))
{
    echo "Функция существует";
}
else
{
    echo "Функция не существует, желательно создать ее самостоятельно";
}
?>
</pre>
    </div>
</div>


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
<p>Пресловутая уязвимость системы безопасности, известная как ошибка <span class="code">goto fail</span>, многие годы преследовала код <b>Secure Sockets Layer</b> (<i>SSL</i>) в продуктах Apple, когда программист забывал заключить тело инструкции <span class="code">if</span> в фигурные скобки, и это приводило к тому, что функция временами выдавала отчет об
    успешном подключении, хотя по факту так было не всегда. Это позволяло
    злоумышленникам получать признание сертификата безопасности в тех
    условиях, когда он должен был быть отклонен. Если есть сомнения, лучше
    все же помещать тело инструкций <span class="code">if</span> в фигурные скобки.</p>


<!--Футер (+скрипты)-->
<?php
include_once $_SERVER['DOCUMENT_ROOT']."/common/footer.php";
?>
