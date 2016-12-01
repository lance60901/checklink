<?php
//echo URLIsValid("www.google.com");
//echo URLIsValid("www.dhjafhksdahfhf.com");

$file = 'www.yahoo.com.tw';
echo check_url("www.yahoo.com.tw");
echo "   ";
echo check_url("www.dsjksalflknesfsadf.com");
echo "   ";
echo check_url("www.lanceyang.com");
function check_url($url) {

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
/*
$classname="html-content";
$finder = new DomXPath($newDom);
$spaner = $finder->query("//*[contains(@class, '$classname')]");
print_r( $spaner);
*/
/*
foreach ($temp as $temp1){
    echo $temp1->getAttribute('href');
}
*/

foreach ($tag as $tag1) {
       echo "印Tag<br><br><br>";
       echo $tag1->getAttribute('href');
       echo "<br>";
}
?>
