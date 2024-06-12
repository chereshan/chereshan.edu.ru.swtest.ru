<?php
$root=(!empty($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . '/';
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scal e=1.0">
    <link rel="icon" type="image/x-icon" href="<?=$root.'common/assets/favicon-16x16.png'?>">
    <link rel="stylesheet" type="text/css" href="<?=$root.'common/css/styles.css'?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/styles/default.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="common/modules/jquery-3.7.1.min.js"><'+'/script>')</script>
    <script src="<?=$root.'/common/counters/counters_head.js'?>"></script>
    <!-- Additional tags here -->
    <?php if (function_exists('customPageHeader')){
        customPageHeader();
    }?>
<!--    <title>--><?//= isset($PageTitle) ? $PageTitle : "Default Title"?><!--</title>-->
<body>
<script src="<?=$root.'common/counters/counters_body.js'?>"></script>
<h1><?= isset($PageTitle) ? $PageTitle : "Default Title"?></h1>