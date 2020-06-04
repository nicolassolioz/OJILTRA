<?php
/* @var $api Reports */

require_once 'init-api.php';

$myfile = fopen("plagiat-results.txt", "w") or die("Unable to open file!");

for($x = 51; $x<=63; $x++)
{
    $fileread = "C:/Users/Nicolas Solioz/Documents/HES/TB/OJILTRA/web/ps/report/report-" . $x . ".txt";
    $handle = fopen($fileread, "r");
    $contents = fread($handle, filesize($fileread));

    $contentsParsed = explode(',"plagiat":', $contents);
    $contentsParsedTwice = explode(',', $contentsParsed[1]);
    $result = $contentsParsedTwice[0];

    fwrite($myfile, $result);
    fwrite($myfile, "%");
    fwrite($myfile, "\r\n");
}
