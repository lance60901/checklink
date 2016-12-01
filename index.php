<?php
//echo URLIsValid("www.google.com");
//echo URLIsValid("www.dhjafhksdahfhf.com");

$file = 'www.yahoo.com.tw';
echo check_url("http://www.ris.gov.tw/701");
echo "   ";
echo check_url("www.dsjksalflknesfsadf.com");
echo "   ";
echo check_url("www.lanceyang.com");
function check_url($url) {
    echo "<br>Start Checking<br>";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HEADER, 1);
    curl_setopt($ch , CURLOPT_RETURNTRANSFER, 1);
    $data = curl_exec($ch);
    $headers = curl_getinfo($ch);
    curl_close($ch);

    return $headers['http_code'];
}
//echo $exists;



$url="http://www.luzhou.ris.ca.ntpc.gov.tw/Site/ActivitySidelightDetial/2523";

$page = file_get_contents($url);

$newDom = new DOMDocument();
@$newDom->loadHTML($page);

//$tag = $newDom->getElementsByTagName('a');
//$tag99 = $newDom->getElementsByID('html-content');
//$tag = tag99[0].getElementsByTagName('a');
$tag99 = $newDom->getElementById('site_header_menu');
echo "<br>";echo "<br>";
var_dump($tag99);
echo "<br>";echo "<br>";echo "<br>";
$tag = $newDom->getElementById('site_body_center')->getElementsByTagName('a');
echo "<br>";echo "<br>";echo "<br>";

foreach ($tag as $tag1) {
       echo "<br>";
       if($tag1->getAttribute('href') != "#" && $tag1->getAttribute('href') != "/Site/ActivitySidelight"){
            echo $tag1->getAttribute('href');
            //echo "連線測試結果: ";
            echo check_url($tag1->getAttribute('href'));
       }
       echo "<br>";
}
?>
