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
$page = '<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>'.file_get_contents($url);
//print($page);
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
            echo "http://www.luzhou.ris.ca.ntpc.gov.tw".$pagelinks->getAttribute('href');
            $temp = "http://www.luzhou.ris.ca.ntpc.gov.tw".$pagelinks->getAttribute('href');
            //check_next_level($temp);
            $mainlinkpage = file_get_contents($temp);
            print($mainlinkpage);
           
           
            //echo "連線測試結果: ";
            //echo check_url($pagelinks->getAttribute('href'));
       }
       echo "<br>";
}

function check_next_level($mainlink){
    //echo "<br>".$mainlink;
    $mainlinkpage = file_get_contents($mainlink);
    
    //$secDom = new DOMDocument();
    //@$secDom->loadHTML($mainlinkpage);
    //$finallinks = $secDom->getElementById('site_body_center')->getElementsByTagName('a');
    //print($finallinks.length);
    /*
    if($finallinks.length > 0){
        foreach ($finallinks as $finallink) {
           echo "<br>";
           if($finallink->getAttribute('href') != "#" && $finallink->getAttribute('href') != "/Site/ActivitySidelight"){
                //echo $finallink->nodeValue;
                echo "<br>"; 
                echo $finallink->getAttribute('href');
                //check_url($finallink->getAttribute('href'));

               //echo "連線測試結果: ";
                //echo check_url($pagelinks->getAttribute('href'));
           }
           echo "<br>";
        }
    }
    */
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
