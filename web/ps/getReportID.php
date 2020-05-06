<?php


/* @var $api Reports */

require_once 'init-api.php';

    for($x = 1; $x<=50; $x++)
    {
        $fileread = "C:/Users/Nicolas Solioz/Documents/HES/TB/OJILTRA/web/ps/ps-" . $x . ".txt";
        $handle = fopen($fileread, "r");
        $contents = fread($handle, filesize($fileread));

        $values = explode(',', $contents);
        $valuesParsed = explode(':', $values[2]);
        $reportID = $valuesParsed[2];

        $data = [];

        $myfile = fopen("report-" . $x . ".txt", "w") or die("Unable to open file!");

        fwrite($myfile, $api->viewAction($reportID, $data));

    };
echo "done";