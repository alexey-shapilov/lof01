<?php
ob_start();
echo '<h1>Проверка!!!</h1>';
$content = ob_get_contents();
ob_end_clean();