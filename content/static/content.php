<?php
if (!defined('INIT')) exit('No direct script access allowed');

echo '<div class="container clearfix">';
require_once(PATH_CONTENT_STATIC . '/nav.php');
echo $content;
echo '</div>';