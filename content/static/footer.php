<?php
if (!defined('INIT')) exit('No direct script access allowed');

$content = ob_get_contents();
ob_clean();

echo $content;

?>

</body>
</html>