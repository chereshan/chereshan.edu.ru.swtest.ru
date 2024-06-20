<!--Хедер (+скрипты)-->
<?
$PageTitle="Глава -6. ООП в PHP";
function customPageHeader(){?>
    <title>Глава -6. ООП в PHP</title>
<?}
include_once $_SERVER['DOCUMENT_ROOT']."/common/header.php";
?>

<h2>Введение в ООП на PHP</h2>
<p>PHP поддерживает ООП, которое способствует выработке четких, модульных архитектур, а также упрощает отладку, сопровождение и повторное использование кода. Основными структурными элементами архитектур ООП являются классы. <b>Класс</b> представляет собой определение структуры, содержащей свойства (переменные) и методы (функции).</p>
<h2>Создание класса и экземпляра класса</h2>
<p>Классы определяются ключевым словом <span class="code">class</span>. :</p>
<?php
class Person
{
    public $name, $password;
    function name ($newname = NULL)
    {
        if (!is_null($newname)) {
            $this->name = $newname;
        }
        return $this->name;
    }
    function save_person(){
        echo "Сюда помещается код, сохраняющий данные пользователя";
    }
}
?>
<pre><code>&lt;?php
class Person
{
    public $name, $password;
    function name ($newname = NULL)
    {
        if (!is_null($newname)) {
            $this->name = $newname;
        }
        return $this->name;
    }
    function save_person(){
        echo "Сюда помещается код, сохраняющий данные пользователя";
    }
}
?></code></pre>


<p>Когда класс определен, на его основе можно создать любое количество объектов при помощи ключевого слова <span class="code">new</span>. Для обращения к свойствам и методам объекта используйте конструкцию <span class="code">-></span>:</p>
<pre><code>&lt;?php
$object = new Person;
?></code></pre>
<h2>Взаимодействие с экземпляром класса</h2>
<pre><code>&lt;?php
$object = new User;
print_r($object); echo "&lt;br>";
$object->name = "Joe";
$object->password = "mypass";
print_r($object); echo "&lt;br>";
$object->save_user();
class User {
    public $name, $password;
    function save_user()
    {
        echo "Сюда помещается код, сохраняющий данные пользователя";
    }
}
?></code></pre>
<div class="code-example-output-title"><span>Вывод:</span>
    <div class="code-example-output">
<pre>
<?php
$object = new User;
print_r($object); echo "<br>";
$object->name = "Joe";
$object->password = "mypass";
print_r($object); echo "<br>";
$object->save_user();
class User {
    public $name, $password;
    function save_user()
    {
        echo "Сюда помещается код, сохраняющий данные пользователя";
    }
}
?>
</pre>
    </div>
</div>
<p>Из примера видно, что для доступа к свойству объекта используется следующий синтаксис: <span class="code">$объект->свойство</span>. Подобным образом можно вызвать и метод:
<span class="code">$объект->метод()</span></p>
<p>Можно заметить, что перед именами свойств и методов отсутствует символ доллара (<span class="code">$</span>). Если на первой позиции имен поставить символ <span class="code">$</span>, то код не
будет работать, поскольку он попробует обратиться к значению, хранящемуся
в переменной. Например, выражение <span class="code">$object->$property</span> будет пытаться найти
значение, присвоенное переменной по имени <span class="code">$property</span> (скажем, это значение
является строкой <span class="code">brown</span>), а затем обратиться к свойству <span class="code">$object->brown</span>. Если
переменная <span class="code">$property</span> не определена, то будет предпринята попытка обратиться
к свойству <span class="code">$object->NULL</span>, что спровоцирует возникновение ошибки.</p>
<p>Несложно также заметить, что класс может аналогично функциям определятся ниже его вызова на странице.</p>
<h2>Копирование и клонирование объектов</h2>
<p>Если объект уже создан, то в качестве параметра он передается по ссылке. Иными словами, присваивание объектов не приводит к их полному копированию. </p>
<p><b>Копирование объектов</b>:</p>
<pre><code>&lt;?php
$object1 = new User2();
$object1->name = "Alice";
$object2 = $object1;
$object2->name = "Amy";
echo "object1 name = " . $object1->name . "&lt;br>";
echo "object2 name = " . $object2->name;
class User2
{
    public $name;
}
?></code></pre>
<div class="code-example-output-title"><span>Вывод:</span>
    <div class="code-example-output">
<pre>
<?php
$object1 = new User2();
$object1->name = "Alice";
$object2 = $object1;
$object2->name = "Amy";
echo "object1 name = " . $object1->name . "<br>";
echo "object2 name = " . $object2->name;
class User2
{
    public $name;
}
?>
</pre>
    </div>
</div>
<p>Что же произошло? И <span class="code">$object1</span> и <span class="code">$object2</span> ссылаются на один и тот же объект,
    поэтому изменение свойства name, принадлежащего <span class="code">$object2</span>, на <span class="code">Amy</span> устанавливает такое же значение и для свойства, принадлежащего <span class="code">$object1</span>.</p>

<p>Во избежание подобной путаницы следует использовать инструкцию <span class="code">clone</span>,
которая создает новый экземпляр класса и копирует значения свойств из исходного класса в новый экземпляр. Применение этой инструкции показано ниже.</p>
<p><b>Клонирование объектов</b>:</p>
<pre><code>&lt;?php
$object1 = new User3();
$object1->name = "Alice";
$object2 = clone $object1;
$object2->name = "Amy";
echo "object1 name = " . $object1->name . "&lt;br>";
echo "object2 name = " . $object2->name;
class User3
{
    public $name;
}
?></code></pre>
<div class="code-example-output-title"><span>Вывод:</span>
    <div class="code-example-output">
<pre>
<?php
$object1 = new User3();
$object1->name = "Alice";
$object2 = clone $object1;
$object2->name = "Amy";
echo "object1 name = " . $object1->name . "<br>";
echo "object2 name = " . $object2->name;
class User3
{
    public $name;
}
?>
</pre>
    </div>
</div>

<h2>Конструкторы классов</h2>
<p>При создании нового объекта вызываемому классу можно передать перечень
аргументов. Они передаются специальному методу внутри класса, который
называется конструктором и занимается инициализацией различных свойств.</p>
<p>Для этого используется функция по имени <span class="code">__construct</span> (то есть перед construct
    ставятся два символа подчеркивания). Создание метода-конструктора показано в примере:</p>
<pre><code>&lt;?php
class User4
{
    function __construct($param1, $param2)
    {
        // Сюда помещаются инструкции конструктора
        public $username = "Guest";
    }
}
?></code></pre>


<h2>Деструкторы классов</h2>
<p>Имеется также возможность создания <b>методов-деструкторов</b>. Эта возможность
подходит для тех случаев, когда код ссылается на объект в последний раз или
когда сценарий подошел к концу.</p>
<p>В примере ниже показано, как создается метод-деструктор. Деструктор может выполнять очистку, например, сбросить подключение к базе данных или к каким-нибудь другим ресурсам, зарезервированным
в классе. Поскольку ресурсы резервируются внутри класса, их высвобождение
должно здесь и происходить, или же они будут удерживаться до бесконечности.
Когда программа резервирует ресурсы и забывает их высвободить, возникают
проблемы общесистемного характера.</p>
<pre><code>&lt;?php
class User
{
    function __destruct()
    {
        // Сюда помещается код деструктора
    }
}
?></code></pre>

<h2>Написание методов</h2>
<p>Как видите, объявление метода похоже на объявление функции, но есть некоторые отличия. Так, имена методов, начинающиеся с двойного подчеркивания (<span class="code">__</span>),
являются зарезервированными словами (например, <span class="code">__construct</span> и <span class="code">__destruct</span>),
и вы не должны больше создавать ничего подобного.</p>
<p>Кроме того, существует специальная переменная <span class="code">$this</span>, которая может использоваться для доступа к свойствам текущего объекта. Чтобы понять, как
это работает, посмотрите на код примера:</p>
<pre><code>&lt;?php
class User4
{
    public $name, $password;
    function get_password()
    {
        return $this->password;
    }
}
$object = new User;
$object->password = "secret";
echo $object->get_password();
?></code></pre>
<div class="code-example-output-title"><span>Вывод:</span>
    <div class="code-example-output">
<pre>
<?php
class User4
{
    public $name, $password;
    function get_password()
    {
        return $this->password;
    }
}
$object = new User4;
$object->password = "secret";
echo $object->get_password();
?>
</pre>
    </div>
</div>
<p>Метод получения пароля — <span class="code">get_password</span> — применяет переменную <span class="code">$this</span> для
доступа к текущему объекту, а затем возвращает значение свойства <span class="code">password</span>,
принадлежащего этому объекту. Обратите внимание на то, как при использовании оператора <span class="code">-></span> в имени свойства <span class="code">$password</span> опускается первый символ <span class="code">$</span>.
Если оставить его на прежнем месте, особенно при первом применении этого
свойства, будет допущена весьма типичная ошибка.</p>

<h2>Объявление свойств</h2>
<p>В явном объявлении свойств внутри классов нет необходимости, поскольку
они могут быть определены неявным образом при первом же их использовании. Для иллюстрации этой особенности класс <span class="code">User</span> в примере ниже не имеет ни
свойств, ни методов, но при этом в коде его определения нет ничего противозаконного.</p>
<pre><code>&lt;?php
$object1 = new User();
$object1->name = "Alice";
echo $object1->name;
class User {}
?></code></pre>
<p>Этот код вполне корректно и без проблем выведет строку <span class="code">Alice</span>, поскольку PHP
неявным образом объявит для вас свойство <span class="code">$object1->name</span>. Но такой стиль программирования может привести к ошибкам, найти которые будет невероятно
трудно, поскольку свойство <span class="code">name</span> было объявлено за пределами класса.</p>
<p>Чтобы не создавать трудностей ни себе, ни тому, кто впоследствии будет обслуживать ваш код, я советую выработать привычку всегда объявлять свойства
внутри класса в явном виде.</p>
<pre><code>&lt;?php
class Test
{
    public $name = "Paul Smith"; // Допустимое
    public $age = 42; // Допустимое
    public $time = time(); // Недопустимое — вызывает функцию
    public $score = $level * 2; // Недопустимое — использует выражение
}
?></code></pre>

<h2>Объявление констант</h2>
<p>По аналогии с созданием глобальных констант внутри определения функций
можно определять константы и внутри классов. Чтобы константы выделялись
на общем фоне, обычно для их имен используют буквы верхнего регистра:</p>
<pre><code>&lt;?php
Translate::lookup();
class Translate
{
    const ENGLISH = 0;
    const SPANISH = 1;
    const FRENCH = 2;
    const GERMAN = 3;
    // ...
    Static function lookup()
    {
        echo self::SPANISH;
    }
}
?></code></pre>
<div class="code-example-output-title"><span>Вывод:</span>
    <div class="code-example-output">
<pre>
<?php
Translate::lookup();
class Translate
{
    const ENGLISH = 0;
    const SPANISH = 1;
    const FRENCH = 2;
    const GERMAN = 3;
    // ...
    Static function lookup()
    {
        echo self::SPANISH;
    }
}
?>
</pre>
    </div>
</div>
<p>К константам можно обращаться напрямую, с помощью ключевого слова <span class="code">self</span>
    и оператора двойного двоеточия. Обратите внимание на то, что этот код, в первой
    строке которого используется оператор двойного двоеточия, вызывает класс
    напрямую, без предварительного создания его экземпляра. Как и ожидалось,
    значение, выводимое при запуске этого кода на выполнение, будет равно 1.
</p>

<h2>Область видимости свойств и методов</h2>
<p>PHP предоставляет три ключевых слова для управления областью видимости
свойств и методов (элементов):</p>
<ol>
    <li><span class="code">public</span> (<b>открытые</b>). На открытые элементы можно ссылаться откуда угодно,
        включая другие классы и экземпляры объекта. Свойства с этой областью видимости получаются по умолчанию при объявлении переменной с помощью
        ключевых слов <span class="code">var</span> или <span class="code">public</span> либо когда переменная объявляется неявно
        при первом же ее использовании.</li>
<!--    todo: tip Ключевые слова var и public являются взаимозаменяемыми. Хотя сейчас использование var не приветствуется, оно сохранено для совместимости с предыдущими версиями PHP. Методы считаются открытыми по умолчанию.-->
    <li><span class="code">protected</span> (<b>защищенные</b>). На эти элементы можно ссылаться только через
        принадлежащие объектам методы класса и такие же методы любых подклассов.</li>
    <li><span class="code">private</span> (<b>закрытые</b>). К представителям класса с этой областью видимости
        можно обращаться через методы этого же класса, но не через методы его
        подклассов.</li>
</ol>
<p>Решение о том, какую область видимости применить, принимается на основе
следующих положений:</p>
<ul>
    <li><b>открытую</b> (<span class="code">public</span>) область видимости следует применять, когда к представителю класса нужен доступ из внешнего кода и когда расширенные классы
        должны его наследовать;</li>
    <li><b>защищенную</b> (<span class="code">protected</span>) область видимости необходимо использовать,
        когда к представителю класса не должно быть доступа из внешнего кода, но
        расширенные классы все же должны его наследовать;</li>
    <li> <b>закрытую</b> (<span class="code">private</span>) область видимости следует применять, когда к представителю класса не должно быть доступа из внешнего кода и когда расширенные
        классы не должны его наследовать.</li>
</ul>
<p>Применение этих ключевых слов показано в примере:</p>
<pre><code>&lt;?php
class Example
{
    var $name = "Michael"; // Нерекомендуемая форма, аналогичная public
    public $age = 23; // Открытое свойство
    protected $usercount; // Защищенное свойство
    private function admin() // Закрытый метод
    {
        // Сюда помещается код метода admin
    }
}
?></code></pre>

<h2>Статические методы</h2>
<p>Метод можно определить в качестве статического, <span class="code">static</span>, это будет означать,
что он вызывается классом, а не объектом. Статический метод не имеет доступа
к свойствам объекта. Порядок его создания и доступа к нему показан в примере:</p>
<pre><code>&lt;?php
User6::pwd_string();
class User6
{
    static function pwd_string()
    {
        echo "Пожалуйста, введите ваш пароль";
    }
}
?>
</code></pre>
<div class="code-example-output-title"><span>Вывод:</span>
    <div class="code-example-output">
<pre>
<?php
User6::pwd_string();
class User6
{
    static function pwd_string()
    {
        echo "Пожалуйста, введите ваш пароль";
    }
}
?>

</pre>
    </div>
</div>
<p>Обратите внимание на вызов самого класса со статическим методом, при котором
используется двойное двоеточие (также известное как оператор разрешения
области видимости), а не сочетание символов <span class="code">-></span>. Статические функции применяются для выполнения действий, относящихся к самому классу, а не к конкретным экземплярам класса.</p>
<p>При попытке получить доступ из статической функции к свойству текущего объекта с помощью выражения <span class="code">$this->property</span> или обратиться к другим
свойствам объекта будет получено сообщение об ошибке.
</p>
<h2>Статические свойства</h2>
<p>Большинство данных и методов применяются в экземплярах класса. Например,
в классе <span class="code">User</span> следует установить конкретный пароль пользователя или проверить, когда пользователь был зарегистрирован. Эти факты и операции имеют
особое отношение к каждому конкретному пользователю и поэтому применяют
специфические для экземпляра свойства и методы.</p>
<p>Но время от времени возникает потребность обслуживать данные, относящиеся
целиком ко всему классу. Например, для отчета о том, сколько пользователей
зарегистрировалось, будет храниться переменная, имеющая отношение ко всему классу <span class="code">User</span>. Для таких данных PHP предоставляет статические свойства
и методы.
</p>
<p>Свойство,
объявленное статическим, <span class="code">static</span>, не может быть доступно непосредственно из
экземпляра класса, но может быть доступно из статического метода:</p>
<pre><code>&lt;?php
$temp = new Test();
echo "Tест A: " . Test::$static_property . "&lt;br>";
echo "Tест Б: " . $temp->get_sp() . "&lt;br>";
echo "Tест В: " . $temp->static_property . "&lt;br>";
class Test
{
    static $static_property = "Это статическое свойство";
    function get_sp()
    {
        return self::$static_property;
    }
}
?></code></pre>
<div class="code-example-output-title"><span>Вывод:</span>
    <div class="code-example-output">
<pre>
<?php
$temp = new Test();
echo "Tест A: " . Test::$static_property . "<br>";
echo "Tест Б: " . $temp->get_sp() . "<br>";
echo "Tест В: " . $temp->static_property . "<br>";
class Test
{
    static $static_property = "Это статическое свойство";
    function get_sp()
    {
        return self::$static_property;
    }
}
?>
</pre>
    </div>
</div>
<p>В этом примере показано, что на свойство <span class="code">$static_property</span> можно ссылаться
напрямую из самого класса, используя в тесте A оператор двойного двоеточия.
Тест Б также может получить его значение путем вызова метода <span class="code">get_sp</span> объекта
<span class="code">$temp</span>, созданного из класса <span class="code">Test</span>. Но тест В терпит неудачу, потому что статическое свойство <span class="code">$static_property</span> недоступно объекту <span class="code">$temp</span>.</p>
<p>Обратите внимание на то, как метод <span class="code">get_sp</span> получает доступ к свойству <span class="code">$static_property</span>, используя ключевое слово <span class="code">self</span>. Именно таким способом можно получить
непосредственный доступ к статическому свойству или константе внутри класса.</p>

<h2>Наследование</h2>
<p>Как только класс будет создан, из него можно будет получить подкласс. Это
сэкономит массу времени: вместо скрупулезного переписывания кода можно
будет взять класс, похожий на тот, который следует создать, распространить
его на подкласс и просто внести изменения в те места, которые будут иметь
характерные особенности. Это достигается за счет использования ключевого
слова <span class="code">extends</span>.</p>
<p>В примере ниже класс <span class="code">Subscriber</span> объявляется подклассом User путем использования инструкции <span class="code">extends</span>.</p>
<pre><code>&lt;?php
 $object = new Subscriber;
 $object->name = "Fred";
 $object->password = "pword";
 $object->phone = "012 345 6789";
 $object->email = "fred@bloggs.com";
 $object->display();
 class User7
 {
 public $name, $password;
 function save_user()
 {
 echo "Сюда помещается код, сохраняющий данные пользователя";
 }
 }
 class Subscriber extends User7
 {
 public $phone, $email;
 function display()
 {
 echo "Name: " . $this->name . "&lt;br>";
 echo "Pass: " . $this->password . "&lt;br>";
 echo "Phone: " . $this->phone . "&lt;br>";
 echo "Email: " . $this->email;
 }
 }
 ?></code></pre>
<div class="code-example-output-title"><span>Вывод:</span>
    <div class="code-example-output">
<pre>
<?php
 $object = new Subscriber;
 $object->name = "Fred";
 $object->password = "pword";
 $object->phone = "012 345 6789";
 $object->email = "fred@bloggs.com";
 $object->display();
 class User7
 {
 public $name, $password;
 function save_user()
 {
 echo "Сюда помещается код, сохраняющий данные пользователя";
 }
 }
 class Subscriber extends User7
 {
 public $phone, $email;
 function display()
 {
 echo "Name: " . $this->name . "<br>";
 echo "Pass: " . $this->password . "<br>";
 echo "Phone: " . $this->phone . "<br>";
 echo "Email: " . $this->email;
 }
 }
 ?>
</pre>
    </div>
</div>
<p>У исходного класса <span class="code">User</span> имеются два свойства — <span class="code">$name</span> и <span class="code">$password</span>, а также
    метод для сохранения данных текущего пользователя в базе данных. Подкласс
    <span class="code">Subscriber</span> расширяет этот класс за счет добавления еще двух свойств — <span class="code">$phone</span>
    и <span class="code">$email</span> и включения метода, отображающего свойства текущего объекта, который использует переменную <span class="code">$this</span></p>


<h2>Ключевое слово <span class="code">parent</span></h2>
<p>Когда в подклассе создается метод с именем, которое уже фигурирует в его родительском классе, его инструкции переписывают инструкции из родительского
класса. Иногда такое поведение идет вразрез с вашими желаниями, и вам нужно
получить доступ к родительскому методу. Для этого можно воспользоваться
инструкцией parent, которая показана в примере:</p>
<pre><code>&lt;?php
$object = new Son;
$object->testO;
$object->test2();
class Dad
{
    function test()
    {
        echo "[Class Dad] Я твой отец&lt;br>";
    }
}
class Son extends Dad
{
    function test()
    {
        echo "[Class Son] Я Люк&lt;br>";
    }
    function test2()
    {
        parent::test();
    }
}
?></code></pre>
<div class="code-example-output-title"><span>Вывод:</span>
    <div class="code-example-output">
<pre>
<?php
$object = new Son;
$object->testO;
$object->test2();
class Dad
{
    function test()
    {
        echo "[Class Dad] Я твой отец<br>";
    }
}
class Son extends Dad
{
    function test()
    {
        echo "[Class Son] Я Люк<br>";
    }
    function test2()
    {
        parent::test();
    }
}
?>
</pre>
    </div>
</div>
<p>Этот код создает класс по имени <span class="code">Dad</span> (Отец), а затем подкласс по имени <span class="code">Son</span>
(Сын), который наследует свойства и методы родительского класса, а затем
переписывает метод <span class="code">test</span>. Поэтому когда во второй строке кода вызывается
метод <span class="code">test</span>, выполняется новый метод. Единственный способ выполнения
переписанного метода test в том варианте, в каком он существует в классе <span class="code">Dad</span>,
заключается в использовании инструкции parent, как показано в функции <span class="code">test2</span>
класса <span class="code">Son</span>.
</p>

<h2>Конструкторы подкласса</h2>
<p>При распространении класса и объявлении собственного конструктора вы
должны знать, что PHP не станет автоматически вызывать метод-конструктор
родительского класса. Чтобы обеспечивалось выполнение всего кода инициализации, подкласс всегда должен вызывать родительские конструкторы, как показано в примере ниже:</p>
<pre><code>&lt;?php
$object = new Tiger();
 echo "У тигров есть...&lt;br>";
 echo "Мех: " . $object->fur . "&lt;br>";
 echo "Полосы: " . $object->stripes;
 class Wildcat
 {
     public $fur; // У диких кошек есть мех
 function __construct()
 {
     $this->fur = "TRUE";
 }
 }
 class Tiger extends Wildcat
 {
     public $stripes; // У тигров есть полосы
     function __construct()
     {
         parent::__construct(); // Первоочередной вызов родительского конструктора
         $this->stripes = "TRUE";
     }
 }
?>
</code></pre>
<div class="code-example-output-title"><span>Вывод:</span>
    <div class="code-example-output">
<pre>
<?php
$object = new Tiger();
 echo "У тигров есть...<br>";
 echo "Мех: " . $object->fur . "<br>";
 echo "Полосы: " . $object->stripes;
 class Wildcat
 {
     public $fur; // У диких кошек есть мех
 function __construct()
 {
     $this->fur = "TRUE";
 }
 }
 class Tiger extends Wildcat
 {
     public $stripes; // У тигров есть полосы
     function __construct()
     {
         parent::__construct(); // Первоочередной вызов родительского конструктора
         $this->stripes = "TRUE";
     }
 }
?>

</pre>
    </div>
</div>
<p>В этом примере используются обычные преимущества наследования. В классе
<span class="code">Wildcat</span> (Дикая кошка) создается свойство <span class="code">$fur</span> (мех), которое хотелось бы использовать многократно, поэтому мы создаем класс <span class="code">Tiger</span> (Тигр), наследующий
свойство <span class="code">$fur</span>, и дополнительно создаем еще одно свойство — <span class="code">$stripes</span> (полосы).</p>

<h2>Методы <span class="code">final</span></h2>
<p>При необходимости помешать подклассу переписать метод суперкласса можно воспользоваться ключевым словом <span class="code">final</span>. Как это делается, показано в примере:</p>
<pre><code>&lt;?php
class User
{
    final function copyright()
    {
        echo "Этот класс был создан Джо Смитом";
    }
}
?></code></pre>






<!--Футер (+скрипты)-->
<?php
include_once $_SERVER['DOCUMENT_ROOT']."/common/footer.php";
?>
