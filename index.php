<?php
//echo URLIsValid("www.google.com");
//echo URLIsValid("www.dhjafhksdahfhf.com");

$file = 'www.yahoo.com.tw';
checklink("www.yahoo.com.tw");
checklink("www.dsjksalflknesfsadf.com");
function checklink($file){
    $file_headers = @get_headers($file);
    if(!$file_headers || $file_headers[0] == 'HTTP/1.1 404 Not Found') {
        $exists = false;
        echo $file;
        echo "無此網址";
    }
    else {
        $exists = true;
        echo $file;
        echo "有此網址";
    }
}
//echo $exists;
?>
