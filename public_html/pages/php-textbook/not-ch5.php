<!--Хедер (+скрипты)-->
<?
$PageTitle="Глава -4. Работа с базой данных";
function customPageHeader(){?>
    <title>Глава -4. Работа с базой данных</title>
<?}
include_once $_SERVER['DOCUMENT_ROOT']."/common/header.php";
?>

<h3>Генерирование данных разделенных запятыми</h3>
<p><b>Задача</b>: Требуется отформатировать данные в виде списка значений, разделенных запятыми (<b>CSV</b>, <i>Comma-Separated Values</i>), чтобы их можно было импортировать в электронную таблицу или базу данных.</p>
<p><b>Решение</b>: Воспользуйтесь функцией <span class="code">fputcsv()</span> для построения строки значений, разделенных запятыми, на базе массива данных:</p>
<p><b>Генерирование данных разделенных запятыми:</b></p>
<pre><code>&lt;?php
$sales = array( array('Northeast','2005-01-01','2005-02-01',12.54),
    array('Northwest','2005-01-01','2005-02-01',546.33),
    array('Southeast','2005-01-01','2005-02-01',93.26),
    array('Southwest','2005-01-01','2005-02-01',945.21),
    array('All Regions','--','--',1597.34) );
$filename = $_SERVER['DOCUMENT_ROOT'].'/common/data/sales.csv';
$fh = fopen($filename,'w') or die("Can't open $filename");
foreach ($sales as $sales_line) {
    if (fputcsv($fh, $sales_line) === false) {
        die("Can't write CSV line");
    }
}
fclose($fh) or die("Can't close $filename");
?></code></pre>


<p><b>Вывод данных, разделенных запятыми:</b></p>
<pre><code>&lt;?php
$sales = array( array('Northeast','2005-01-01','2005-02-01',12.54),
    array('Northwest','2005-01-01','2005-02-01',546.33),
    array('Southeast','2005-01-01','2005-02-01',93.26),
    array('Southwest','2005-01-01','2005-02-01',945.21),
    array('All Regions','--','--',1597.34) );
$fh = fopen('php://output','w');
foreach ($sales as $sales_line) {
    if (fputcsv($fh, $sales_line) === false) {
        die("Can't write CSV line");
    }
    }
fclose($fh);
?></code></pre>
<div class="code-example-output-title"><span>Вывод:</span>
    <div class="code-example-output">
<pre>
<?php
$sales = array( array('Northeast','2005-01-01','2005-02-01',12.54),
    array('Northwest','2005-01-01','2005-02-01',546.33),
    array('Southeast','2005-01-01','2005-02-01',93.26),
    array('Southwest','2005-01-01','2005-02-01',945.21),
    array('All Regions','--','--',1597.34) );
$fh = fopen('php://output','w');
foreach ($sales as $sales_line) {
    if (fputcsv($fh, $sales_line) === false) {
        die("Can't write CSV line");
    }
}
fclose($fh);
?>
</pre>
    </div>
</div>

<p><b>Размещенных данных, разделенных запятыми, в строке:</b></p>
<pre><code>&lt;?php
$sales = array( array('Northeast','2005-01-01','2005-02-01',12.54),
    array('Northwest','2005-01-01','2005-02-01',546.33),
    array('Southeast','2005-01-01','2005-02-01',93.26),
    array('Southwest','2005-01-01','2005-02-01',945.21),
    array('All Regions','--','--',1597.34) );
ob_start();
$fh = fopen('php://output','w') or die("Can't open php://output");
foreach ($sales as $sales_line) {
    if (fputcsv($fh, $sales_line) === false) {
        die("Can't write CSV line");
    }
}
fclose($fh) or die("Can't close php://output");
$output = ob_get_contents();
ob_end_clean();
?></code></pre>

<h3>Загрузка файла в формате CSV</h3>
<pre><code>&lt;?php
$db = new PDO('sqlite:/usr/local/data/sales.db');
$query = $db->query('SELECT region, start, end, amount FROM sales', PDO::FETCH_NUM);
$sales_data = $db->fetchAll();
// Открытие файлового дескриптора для fputcsv()
$output = fopen('php://output','w') or die("Can't open php://output");
$total = 0;
// Сообщаем браузеру, что будет передаваться файл CSV
header('Content-Type: application/csv');
header('Content-Disposition: attachment; filename="sales.csv"');
// Вывод заголовка
fputcsv($output,array('Region','Start Date','End Date','Amount'));
// Вывод каждой строки данных и увеличение $total
foreach ($sales_data as $sales_line) {
    fputcsv($output, $sales_line);
    $total += $sales_line[3];
}
// Вывод завершителя и закрытие файлового дескриптора
fputcsv($output,array('All Regions','--','--',$total));
fclose($output) or die("Can't close php://output");
?></code></pre>
<pre><code>&lt;?php
$db = new PDO('sqlite:/usr/local/data/sales.db');
$query = $db->query('SELECT region, start, end, amount FROM sales', PDO::FETCH_
NUM);
$sales_data = $db->fetchAll();
$total = 0;
$column_headers = array('Region','Start Date','End Date','Amount');
// Выбор формата
$format = $_GET['format'] == 'csv' ? 'csv' : 'html';
// Вывод начальных данных, соответствующих формату
if ($format == 'csv') {
    $output = fopen('php://output','w') or die("Can't open php://output");
    header('Content-Type: application/csv');
    header('Content-Disposition: attachment; filename="sales.csv"');
    fputcsv($output,$column_headers);
} else {
    echo '&lt;table>&lt;tr>&lt;th>';
    echo implode('&lt;/th>&lt;th>', $column_headers);
    echo '&lt;/th>&lt;/tr>';
}
foreach ($sales_data as $sales_line) {
    // Вывод строки в соответствии с форматом
    if ($format == 'csv') {
        fputcsv($output, $sales_line);
    } else {
        echo '&lt;tr>&lt;td>' . implode('&lt;/td>&lt;td>', $sales_line) . '&lt;/td>&lt;/tr>';
    }
    $total += $sales_line[3];
}
$total_line = array('All Regions','--','--',$total);
// Вывод завершителя, соответствующего формату
if ($format == 'csv') {
    fputcsv($output,$total_line);
    fclose($output) or die("Can't close php://output");
} else {
    echo '&lt;tr>&lt;td>' . implode('&lt;/td>&lt;td>', $total_line) . '&lt;/td>&lt;/tr>';
    echo '&lt;/table>';
}
?></code></pre>



<!--Футер (+скрипты)-->
<?php
include_once $_SERVER['DOCUMENT_ROOT']."/common/footer.php";
?>
