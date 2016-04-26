<?php
session_start();
require_once("twitteroauth/twitteroauth/twitteroauth.php"); //Path to twitteroauth library

$twitteruser = "baltimorepolice";
$notweets = 30;
$consumerkey = "L8hnS711a0ynBc6jFG3NJCUL2";
$consumersecret = "YVz67qlQ9x5PjtPd91ECiF9bsXp5qi6wXmqPKvZOb78EtePOPy";
$accesstoken = "256151327-qUicEMAsPUQskOxgCONe8foxkKHheeIPJc8G83mH";
$accesstokensecret = "DeJ7Thfcfi6qSfmr0XnYsuXrMNeBuDcGEFbXBGZ3iaUrH";

function getConnectionWithAccessToken($cons_key, $cons_secret, $oauth_token, $oauth_token_secret) {
  $connection = new TwitterOAuth($cons_key, $cons_secret, $oauth_token, $oauth_token_secret);
  return $connection;
}

$connection = getConnectionWithAccessToken($consumerkey, $consumersecret, $accesstoken, $accesstokensecret);

$tweets = $connection->get("https://api.twitter.com/1.1/statuses/user_timeline.json?screen_name=".$twitteruser."&count=".$notweets);

echo json_encode($tweets);
?>
