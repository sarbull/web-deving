<?php
    $href = @$_POST['href'];
    $file = 'posted.txt';
    file_put_contents($file, $href);
?>
