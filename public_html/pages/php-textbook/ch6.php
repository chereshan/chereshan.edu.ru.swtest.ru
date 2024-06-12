<!--Хедер (+скрипты)-->
<?
$PageTitle="Глава 6. Cookies";
function customPageHeader(){?>
    <title>Глава 6. Cookies</title>
<?}
include_once $_SERVER['DOCUMENT_ROOT']."/common/header.php";
?>
<h2>Использование cookie в PHP</h2>
<p>Cookie представляет собой элемент данных, который веб-сервер с помощью
    браузера сохраняет на жестком диске вашего компьютера. Этот элемент может
    содержать практически любую буквенно-цифровую информацию (объемом не
    более 4 Кбайт) и может быть извлечен из вашего компьютера и возвращен на
    сервер. Чаще всего cookie используются для отслеживания хода сессий, обобщения данных нескольких визитов, хранения содержимого корзины покупателя,
    хранения сведений, необходимых для входа в систему, и т. д.</p>
<p>В силу своей закрытости cookie могут быть считаны только из создавшего их
    домена. Иными словами, если cookie, к примеру, был создан на oreilly.com, он
    может быть извлечен лишь веб-сервером, использующим этот домен. Это не
    позволяет другим сайтам получить доступ к сведениям, на владение которыми
    у них нет разрешения.</p>
<p>Из-за особенностей работы интернета многие элементы веб-страницы могут
    быть вставлены из нескольких доменов, каждый из которых может создавать свои собственные cookie. Они называются сторонними cookie. Чаще всего они
    создаются рекламными компаниями для отслеживания пользователей на нескольких сайтах или в аналитических целях.</p>
<p>оэтому большинство браузеров позволяют пользователям отключать cookie
    либо от домена текущего сервера, либо от сторонних серверов, либо и от тех и от
    других. К счастью, большинство пользователей, отключающих cookie, делают
    это только в отношении сторонних сайтов.</p>
<p>Обмен cookie осуществляется во время передачи заголовков еще до того, как
    будет отправлен код HTML веб-страницы. Отправить cookie после передачи
    HTML-кода уже невозможно. Поэтому четкое планирование использования
    cookie приобретает особую важность. На рис. 13.1 показан типичный диалог
    с передачей cookie в форме «запрос — ответ» между браузером и веб-сервером.</p>
<img src="../imgs/request-responce%20cookies.png" alt="">
<p>В этом обмене данными показан браузер, получающий две страницы.</p>>
<ol>
    <li>Браузер выдает запрос на извлечение главной страницы index.html с сайта
        http://www.webserver.com. В первом заголовке указывается файл, а во втором — сервер.</li>
    <li>Когда веб-сервер на webserver.com получает эту пару заголовков, он возвращает несколько своих заголовков. Во втором заголовке определяется тип
        отправляемого содержимого (text/html), а в третьем отправляется cookie
        с именем name, имеющий значение value. И только после этого передается
        содержимое веб-страницы.</li>
    <li>После того как браузер получит cookie, он должен возвращать его с каждым
        последующим запросом, сделанным в адрес сервера, создавшего cookie, пока у cookie не истечет срок действия или этот cookie не будет удален. Поэтому
        когда браузер запрашивает новую страницу /news.html, он также возвращает
        cookie name со значением value.
    </li>
    <li>Поскольку на момент отправки /news.html cookie уже был установлен,
        сервер не должен заново посылать этот cookie и возвращает только запрошенную страницу</li>
</ol>
<p>Cookie-файлы легко редактируются непосредственно из браузера с помощью встроенного инструмента разработчика или специальных расширений. Поэтому, исходя из того, что пользователи могут изменять значения
    cookie-файлов, в эти файлы не следует помещать такую информацию, как
    имя пользователя, иначе можно столкнуться с манипулированием вашим
    веб-сайтом неожиданным для вас образом. Cookie-файлы лучше использовать для сохранения данных вроде настроек на используемый язык или
    валюту</p>
<h2>Установка cookie в PHP</h2>
Установка cookie в PHP осуществляется довольно просто. До передачи кода
HTML нужно вызвать функцию setcookie, для чего используется следующий
синтаксис
<pre><code class="language-php">&lt;?setcookie(name, value, expire, path, domain, secure, httponly);?></code></pre>


<style type="text/css">
    .tg  {border-collapse:collapse;border-spacing:0;margin:0px auto;}
    .tg td{border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;
        overflow:hidden;padding:10px 5px;word-break:normal;}
    .tg th{border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;
        font-weight:normal;overflow:hidden;padding:10px 5px;word-break:normal;}
    .tg .tg-trd5{background-color:#C0C0C0;border-color:inherit;font-weight:bold;text-align:left;vertical-align:top}
    .tg .tg-6e8n{background-color:#c0c0c0;border-color:inherit;font-weight:bold;text-align:left;vertical-align:top}
    .tg .tg-0pky{border-color:inherit;text-align:left;vertical-align:top}
</style>
<table class="tg">
    <thead>
    <tr>
        <th class="tg-6e8n">Параметр</th>
        <th class="tg-6e8n">Описание</th>
        <th class="tg-trd5">Пример</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td class="tg-0pky">name</td>
        <td class="tg-0pky">Имя cookie. Это имя ваш сервер будет использовать для доступа к cookie<br>при последующих запросах браузера.</td>
        <td class="tg-0pky">username</td>
    </tr>
    <tr>
        <td class="tg-0pky">value</td>
        <td class="tg-0pky">Значение cookie или его содержимое. Объем может составлять до 4 Кбайт текста.</td>
        <td class="tg-0pky">USA</td>
    </tr>
    <tr>
        <td class="tg-0pky">expire</td>
        <td class="tg-0pky"><span style="font-style:italic">(optional)</span><br>Время истечения срока действия в формате метки UNIX. Как правило, для установки <br>этого параметра используется функция time(), к которой будет прибавляться число<br>секунд.<br><span style="font-weight:bold">Если параметр не установлен, то срок заканчивается с с закрытием браузера</span>.</td>
        <td class="tg-0pky">time() + 2592000</td>
    </tr>
    <tr>
        <td class="tg-0pky">path</td>
        <td class="tg-0pky"><span style="font-style:italic">(optional)</span><br><span style="font-style:normal">Путь к cookie на сервере.</span><br><span style="font-weight:bold">Если используется слэш ("/"), то cookie доступен для всего домена www.webserver.com</span>. <br><span style="font-weight:bold">Если указан подкаталог, то cookie будет доступен только в пределах этого подкаталога. </span><br>По умолчанию путь указывает текущий каталог, где был установлен cookie, и, как правило, <br>используется именно такая настройка.</td>
        <td class="tg-0pky">/</td>
    </tr>
    <tr>
        <td class="tg-0pky">domain</td>
        <td class="tg-0pky"><span style="font-style:italic">(optional)</span><br>Интернет-домен, которому принадлежит cookie.<br><span style="font-weight:bold">Если это webserver.com, то cookie доступны для всего домена и его поддоменов.</span></td>
        <td class="tg-0pky">webserver.com</td>
    </tr>
    <tr>
        <td class="tg-0pky">secure</td>
        <td class="tg-0pky"><span style="font-style:italic">(optional)</span><br><span style="font-style:normal">Должен ли cookie использовать безопасное подключение. </span><br><br></td>
        <td class="tg-0pky">FALSE</td>
    </tr>
    <tr>
        <td class="tg-0pky">httponly</td>
        <td class="tg-0pky"><span style="font-style:italic">(optional)</span><br>Определяет, должен ли cookie использовать протокол HTTP. <br><span style="font-weight:bold">Если установлено TRUE, то такие языки, как JS, не смогут получить доступа к cookie.</span></td>
        <td class="tg-0pky">FALSE</td>
    </tr>
    </tbody>
</table>
<h2>Доступ к cookie</h2>
Для чтения значения cookie нужно просто обратиться к системному массиву
$_COOKIE. Например, если нужно посмотреть, хранится ли на текущем браузере
cookie по имени location, и если хранится, прочитать его значение, то используется следующая строка кода:</p>
<pre><code class="language-php">&lt;?
if (isset($_COOKIE['location'])) {
    $location = $_COOKIE['location'];
    echo $location;
}
?></code></pre>
<?
if (isset($_COOKIE['location'])) {
    $location = $_COOKIE['location'];
    echo $location;
}
?>
<p>Учтите, что прочитать значение cookie можно только после того, как он был отправлен браузеру. Это означает, что при установке cookie его нельзя прочитать до
    тех пор, пока браузер не перезагрузит страницу (или не совершит какое-нибудь
    другое действие с доступом к cookie) с вашего сайта и не передаст cookie в ходе
    этого процесса обратно на сервер.</p>
<h2>Удаление cookie</h2>
<p>Для удаления cookie его нужно повторно установить с настройкой даты истечения срока действия на прошедшее время. При этом важно, чтобы все параметры нового вызова функции setcookie, за исключением timestamp, в точности повторяли те параметры, которые указывались при создании cookie, в противном
    случае удаление не состоится. Поэтому для удаления ранее созданного cookie
    нужно воспользоваться следующей строкой кода:</p>
<pre><code class="language-php">&lt;?setcookie('location', 'USA', time() – 2592000, '/');?></code></pre>
<p>Поскольку указано уже прошедшее время, cookie будет удален. Здесь я использовал время, равное 2 592 000 с в прошлом (что соответствует одному месяцу).
    Это сделано в расчете на неправильную установку даты и времени на компьютере
    клиента. Можно также указать для значения cookie пустую строку (или значение
    FALSE), и тогда PHP автоматически установит для вас свое время на прошлое.</p>
<!--Футер (+скрипты)-->
<?php
include_once $_SERVER['DOCUMENT_ROOT']."/common/footer.php";
?>