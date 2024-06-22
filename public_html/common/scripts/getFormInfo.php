<html>
<body>
<div id="content">
    <p>Это структура с данными, получаемыми из формы:</p>
    <p>
        Имя: <?php echo $_REQUEST['first_name']; ?><br />
        Фамилия: <?php echo $_REQUEST['last_name']; ?><br />
        Адрес электронной почты: <?php echo $_REQUEST['email']; ?><br />
        URL в Facebook: <?php echo $_REQUEST['facebook_url']; ?><br />
        Идентификатор в Twitter: <?php echo $_REQUEST['twitter_handle']; ?><br />
    </p>
</div>
<div id="footer"></div>
</body>
</html>

