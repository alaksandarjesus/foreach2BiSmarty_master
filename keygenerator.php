<?php
session_start();
$key = md5(date("Y-m-d H-i-s"));

echo "Copy it and past it in app/config.php under <u>key</u> : ".$key;
echo "<br> String Length:".strlen($key);

