<?php
$first_name=trim($_REQUEST['first_name']);
$last_name=trim($_REQUEST['last_name']);
$email=trim($_REQUEST['email']);
$vk_url=trim($_REQUEST['vk_url']);
$github_username=trim($_REQUEST['github_username']);

function checkForEmpty($var):string{
    if (!isset($var) || $var == ''){
        return  "Ничего не введено в поле";
    }
    else {
        return $var;
    }
}
function checkForLink($var):string{
    if (!isset($var) || $var == ''){
        return  "Ничего не введено в поле";
    }
    else {
        $var=$var;
        return  "<a href='$var'>$var</a>";
    }
}
function checkForUserName($username, $domain):string{
    if (!isset($username) || $username == ''){
        return  "Ничего не введено в поле";
    }
    else {
        $username=$username;
        return  "<a href='$domain/$username'>$username</a>";
    }
}

function valiadateMail($var){
    if ($var!="Ничего не введено в поле"){
        if (strpos($var, '@')!==false){
            return "Введена не валидная почта";
        }
    }
    else {
        return $var;
    }
}

?>
<html>
<body>
<div id="content">
    <p>Это структура с данными, получаемыми из формы:</p>
    <p>
        Имя: <?=checkForEmpty($first_name);?><br />
        Фамилия: <?=checkForEmpty($last_name); ?><br />
        Адрес электронной почты: <?=valiadateMail(checkForEmpty($email)); ?><br />
        URL Вконтакте: <?=checkForLink($vk_url); ?><br />
        Имя юзера Github: <?= checkForUserName($github_username, 'https://github.com')?> <br/>
    </p>
    <p><b>Ну, здравствуй, человек, которого зовут <?=$first_name?:"никак"?> по фамилии <?=$last_name?:"никак"?>.</b></p>
</div>
</body>
</html>

