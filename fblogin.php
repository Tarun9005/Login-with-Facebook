<?php
session_start();
require_once( 'Facebook/autoload.php' );
include 'appconfig.php';

$fb = new Facebook\Facebook([
  'app_id' => $theappid,
  'app_secret' => $theappsecret,
  'default_graph_version' => 'v2.6',
]); 

$helper = $fb->getRedirectLoginHelper();

$permissions = ['email','public_profile','user_friends']; // Optional permissions for more permission you need to send your application for review
$loginUrl = $helper->getLoginUrl($callBackUrl, $permissions);

header("location: ".$loginUrl);

mysql_close($connection);
?>