<!--Хедер (+скрипты)-->
<?
$PageTitle="Глава 6. Массивы в PHP";
function customPageHeader(){?>
    <title>Глава 6. Массивы в PHP</title>
<?}
include_once $_SERVER['DOCUMENT_ROOT']."/common/header.php";
?>

<p>Массивы используются для хранения списков: людей, книг, метрик и т. д. Если
вам потребуется сохранить группу взаимосвязанных элементов данных в массиве, используйте массив. Элементы массива (как и элементы списка, записанного
на листе бумаги) располагаются в определенном порядке. Обычно каждый новый
элемент вставляется за последним элементом массива, но при необходимости
новый элемент можно вставить между парой существующих элементов массива
PHP.</p>
<p>В большинстве языков используются массивы с числовым индексированием, или
числовые массивы (обычно они называются просто массивами). Чтобы обратиться к элементу числового массива, достаточно знать его позицию в массиве, называемую индексом. Позиции определяются по номерам: номера начинаются
с 0 и последовательно возрастают на 1.</p>
В некоторых языках также поддерживается другая разновидность массивов:
ассоциативные массивы, также называемые хешами, картами или словарями.
В ассоциативном массиве в качестве индексов используются не целые числа,
а строки. Таким образом, в числовом массиве президентов США элемент «Abraham
Lincoln» может иметь индекс 16, а в ассоциативном массиве ему может быть
присвоен индекс «Honest». Но если у числовых массивов существует четкий порядок элементов, определяемый их ключами, ассоциативные массивы часто не
предоставляют никаких гарантий относительно порядка ключей. Элементы добавляются в определенном порядке, но позднее определить этот порядок уже не
удастся.


<!--Футер (+скрипты)-->
<?php
include_once $_SERVER['DOCUMENT_ROOT']."/common/footer.php";
?>
