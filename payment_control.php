<?php

require __DIR__ . '\vendor\autoload.php';
require __DIR__ . '\definition.php.dist';


if (!$_POST['token']) {
    print 'token is not specified';
    exit;
}

$products = array();
$products[] = array(
  "title" => "商品",
  "description" => "商品説明",
  "language" => "JA",
  "price" => 300,
  "currency" => "JPY",
  "count" => 1,
  "id" => "00001",
  "stock" => 10,
);
$products[] = array(
  "title" => "Item",
  "description" => "itemdescription",
  "language" => "EN",
  "price" => 300,
  "currency" => "JPY",
  "count" => 2,
  "id" => "00002",
  "stock" => 10,
);

$params = array(
  'amount' => 900,
  'currency' => 'JPY',
  'card' => $_REQUEST['token'],
  'products' => json_encode($products),
);


$curl = new Curl\Curl();
$curl->setBasicAuthentication(API_SECRET, '');
$curl->post('https://api.spike.cc/v1/charges', $params);



header('Content-Type:text/plain');
print_r(json_decode($curl->response));
