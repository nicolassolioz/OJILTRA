
<?php
/* @var $api Reports */

require_once 'init-api.php';


    // 3. From local file
    $data = [
        'callback_url' => 'localhost:8080/plagiarismsearch-callback.php',
    ];

    //loop from 1 to 50
    for($x = 1; $x<=50; $x++)
    {
        $files = [
            'file' => realpath('C:/Users/Nicolas Solioz/Documents/HES/TB/OJILTRA/Sprint 4/raw article text/' . $x . '.txt'),
        ];

        $myfile = fopen("ps-" . $x . ".txt", "w") or die("Unable to open file!");
        fwrite($myfile, $api->createAction($data, $files));
    }
    echo "done";



