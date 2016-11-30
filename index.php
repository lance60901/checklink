<?php
//echo URLIsValid("www.google.com");
//echo URLIsValid("www.dhjafhksdahfhf.com");

$file = 'http://www.domain.com/somefile.jpg';
$file_headers = @get_headers($file);
if(!$file_headers || $file_headers[0] == 'HTTP/1.1 404 Not Found') {
    $exists = false;
}
else {
    $exists = true;
}

echo $exists;
?>
