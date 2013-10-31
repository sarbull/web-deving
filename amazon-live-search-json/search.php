<?php

header('Content-Type: application/json');
require 'lib/AmazonECS.class.php';
defined(       'AWS_API_KEY') or define(       'AWS_API_KEY',  'AKIAJL6NZP6XMHK522QQ');
defined('AWS_API_SECRET_KEY') or define('AWS_API_SECRET_KEY',  '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');
defined( 'AWS_ASSOCIATE_TAG') or define( 'AWS_ASSOCIATE_TAG',  'widgetlink03-20');

$keyword = $_POST['keyword'];
$page    = $_POST['page'];

if($keyword && $page){
  $amazonEcs = new AmazonECS(AWS_API_KEY, AWS_API_SECRET_KEY, 'com', AWS_ASSOCIATE_TAG);
  $amazonEcs->returnType(AmazonECS::RETURN_TYPE_ARRAY);
  $response = $amazonEcs->category('All')->page($page)->responseGroup('Large,Images,Offers')->search($keyword);
  $items = $response['Items']['Item'];
  $jsonObject = array();
  $i = 0;
  foreach ($items as $item) {
    if(isset($item['DetailPageURL'])
      && isset($item['MediumImage']['URL'])
      && isset($item['ItemAttributes']['Title'])
      && isset($item['Offers']['Offer']['OfferListing']['Price']['FormattedPrice'])){
      $jsonObject[$i]['url'] = $item['DetailPageURL'];
      $jsonObject[$i]['image'] = $item['MediumImage']['URL'];
      $jsonObject[$i]['title'] = substr($item['ItemAttributes']['Title'], 0, 20);;
      $jsonObject[$i]['price'] = $item['Offers']['Offer']['OfferListing']['Price']['FormattedPrice'];
      $i++;
    }
  }
  echo json_encode($jsonObject);
}

?>


