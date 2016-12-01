<?php
header("Content-Type:text/html; charset=utf-8");
/*
$file = 'www.yahoo.com.tw';
echo check_url("http://www.ris.gov.tw/701");
echo "   ";
echo check_url("www.dsjksalflknesfsadf.com");
echo "   ";
echo check_url("www.lanceyang.com");
*/

function check_url($url) {
    echo "<br>Start Checking...<br>";
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



$url="http://www.luzhou.ris.ca.ntpc.gov.tw/Site/ActivitySidelight";
$page = file_get_contents($url);
$newDom = new DOMDocument();
@$newDom->loadHTML($page);

echo "<br>";
echo "<br>";
echo "<br>";

$LinkstoSubpages = $newDom->getElementById('activity_sidelight_center')->getElementsByTagName('a');

foreach ($LinkstoSubpages as $pagelinks) {
       echo "<br>";
       if($pagelinks->getAttribute('href') != "#" && $pagelinks->getAttribute('href') != "/Site/ActivitySidelight"){
            echo $pagelinks->nodeValue;
            echo "<br>"; 
            echo $pagelinks->getAttribute('href');
            //echo "連線測試結果: ";
            //echo check_url($pagelinks->getAttribute('href'));
       }
       echo "<br>";
}
/*
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
*/
?>
