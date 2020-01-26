<?php
function generateNumbers()
{
    $filename = 'chisla.txt';
    file_put_contents($filename, '');
    for ($i = 0; $i < 2; $i++) {
        for ($j = 0; $j < 200; $j++) {
            $num = rand(10000, 99999);
            file_put_contents($filename, $num, FILE_APPEND);
        }
        file_put_contents($filename, PHP_EOL, FILE_APPEND);
    }
}