<?php
require __DIR__ . "/assets/config.php";
require __DIR__ . "/../vendor/autoload.php";

use RobsonVLeite\CafeApi\Subscriptions;

$subscription = new Subscriptions(
    "localhost/fsphp/api/cafe/",
    "siqueira.andre@gmail.com",
    "abc123456"
);

/**
 * index
 */
echo "<h1>INDEX</h1>";
$index = $subscription->index(null);

if ($index->error()) {
    var_dump($index->error());
} else {
    var_dump($index->response());
}


/**
 * create
 */
echo "<h1>CREATE</h1>";

$create = $subscription->create([
    "plan_id" => 1,
    "card_number" => "5240673071216439",
    "card_holder_name" => "ANDRE SIQUEIRA",
    "card_expiration_date" => "04/23",
    "card_cvv" => "526"
]);

if ($create->error()) {
    echo "<p class='error'>{$create->error()->message}</p>";
} else {
    var_dump($create->response());
}

/**
 * READ
 */
echo "<h1>READ</h1>";

$read = $subscription->read();

if ($read->error()) {
    echo "<p class='error'>{$read->error()->message}</p>";
} else {
    var_dump($read->response());
}

/**
 * UPDATE
 */
echo "<h1>UPDATE</h1>";

//$update = $subscription->update(["plan_id" => 2]);
$update = $subscription->update([
    "card_number" => "4929541567510287",
    "card_holder_name" => "ANDRE SIQUEIRA",
    "card_expiration_date" => "10/21",
    "card_cvv" => "434"
]);

if ($update->error()) {
    echo "<p class='error'>{$update->error()->message}</p>";
} else {
    var_dump($update->response());
}