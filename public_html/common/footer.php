<?php
$root=(!empty($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . '/';
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/highlight.min.js"></script>
<script>window.jQuery || document.write('<script src="common/modules/highlight.min.js"><'+'/script>')</script>\
<script src="<?=$root."common/js/body_scripts.js"?>"></script>
</body>
</html>