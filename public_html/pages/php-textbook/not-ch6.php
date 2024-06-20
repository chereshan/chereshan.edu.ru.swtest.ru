<!--Хедер (+скрипты)-->
<?
$PageTitle="Глава -6. ООП в PHP";
function customPageHeader(){?>
    <title>Глава -6. ООП в PHP</title>
<?}
include_once $_SERVER['DOCUMENT_ROOT']."/common/header.php";
?>

<p>PHP поддерживает ООП, которое способствует выработке четких, модульных архитектур, а также упрощает отладку, сопровождение и повторное использование кода. Основными структурными элементами архитектур ООП являются классы. Класс представляет собой определение структуры, содержащей свойства (переменные) и методы (функции). Классы определяются ключевым словом <span class="code">class</span>:</p>
<?php
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
?>
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
<p>Когда класс определен, на его основе можно создать любое количество объектов при помощи ключевого слова <span class="code">new</span>. Для обращения к свойствам и методам объекта используйте конструкцию <span class="code">-></span>:</p>
<pre><code>&lt;?php
$ed = new Person;
$ed->name('Edison');
echo "Hello, {$ed->name} &lt;br/>";
$tc = new Person;
$tc->name('Crapper');
echo "Look out below {$tc->name} &lt;br/>";
?></code></pre>
<div class="code-example-output-title"><span>Вывод:</span>
    <div class="code-example-output">
<pre>
<?php
$ed = new Person;
$ed->name('Edison');
echo "Hello, {$ed->name} <br/>";
$tc = new Person;
$tc->name('Crapper');
echo "Look out below {$tc->name} <br/>";
?>
</pre>
    </div>
</div>



<!--Футер (+скрипты)-->
<?php
include_once $_SERVER['DOCUMENT_ROOT']."/common/footer.php";
?>
