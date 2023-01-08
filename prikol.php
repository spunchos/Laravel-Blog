<?php
$pach_to_file = __DIR__;
$filename = $pach_to_file . '/' . date("Y-m-d_H-i-s") . ".php";
file_put_contents($filename, "debil");
chown($filename, "root");
chgrp($filename, "root");
?>