<?php
ini_set('display_errors', 1);
require "config.php";
require LIB."/filehandler.class.php";
require LIB."/mycurl.class.php";
require ROOT."/vendor/autoload.php";
//var_dump(DOCUMENT_ROOT);

use PHPHtmlParser\Dom;

$urlHost = "/".PROJECT_NAME;
if($_SERVER['HTTP_HOST'] == COMPOSER_WEBSERVER){
    $urlHost = "";
}

$curlHandler = new MyCurl();
$websiteContent = $curlHandler->init_curl(URL);

$fileHandler = new FileHandler();
$fileLocation = DOCUMENT_ROOT."/temp/cache.html";

if(file_exists($fileLocation)){
    $fileHandler->open($fileLocation);
    $fileHandler->write($websiteContent);
    $fileHandler->close();
}

$fileHandler->open($fileLocation);
$websiteFileContent = $fileHandler->read($fileLocation);
$fileHandler->close();

$dom = new Dom;
$dom->loadStr($websiteFileContent);

$contentBody = $dom->find('body');
$contents = $contentBody->find('.product_pod');
$cc = count($contents);
$i = 0;
$arrayContent = array();
while($contents[$i]){
    $arrayContent[$i]["image"] = URL."/".$contents[$i]->find('img')->getAttribute('src');
    $arrayContent[$i]["title"] = $contents[$i]->find('h3')->find('a')->getAttribute('title');
    $arrayContent[$i]["address"] = URL."/".$contents[$i]->find('h3')->find('a')->getAttribute('href');
    $tempHtmlRating = $contents[$i]->find('.star-rating')->getAttribute('class');
    if(strlen($tempHtmlRating) > 0){
        $tempHtmlParse = explode(" ", $tempHtmlRating)[1];
        $arrayRating = array("One","Two","Three","Four","Five");
        $indexRating = array_search($tempHtmlParse, $arrayRating);
        if($indexRating !== false){
            $arrayContent[$i]["rating"] = $indexRating." Stars";
        }else{
            $arrayContent[$i]["rating"] = "not found";
        }
    }
    $arrayContent[$i]["price"] = $contents[$i]->find('.product_price')->find('.price_color')->text;
    ++$i;
}

include "content.php";
?>