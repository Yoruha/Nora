<?php
$botToken = "225706663:AAGPY2WhyPNvx4Si_CCNFd69UtpR6vgvjPo";
$website = "https://api.telegram.org/bot".$botToken;


$content = file_get_contents("php://input");
$update = json_decode($content, TRUE);

$message = $update["message"];
$messageId = $message["message_id"];
$chatId = $message["chat"]["id"];
$firstname = $message["chat"]["first_name"];
$lastname = $message["chat"]["last_name"];
$username = $message["chat"]["username"];
$sender = $message["forward_from"]["username"];
$date = $message["date"];
$text = $message["text"];

$text = trim($text);
$text = strtolower($text);

$m = explode(" ",  $text, 2);

switch($text){
  case "insulta":
  header("Content-Type: application/json");
  $parameters = array('chat_id' => $chatId, "text" => $m[1]." sei un beota.");
  $parameters["method"] = "sendMessage";
  echo json_encode($parameters);
    break;
  case "pat":
    /*Pat($chatId, $sender);*/
    break;
  default:
    break;
}

/*function sendMessage($chatId,$msg){
  $url = $GLOBALS[website]."/sendMessage?chat_id=".$chatId"&parse_mode=HTML&text=".urlencode($msg);
  file_get_contents($url);
}

function insulti($chatId,$msg){
  $msg = $msg." sei proprio un beota.";
  sendMessage($chatId, $msg);
}

/*function Pat($chatId, $sender){
  $msg = $sender." ti ha inviato un pat.";
  $url = "$GLOBALS[website]/sendPhoto?chat_id=$chatId&photo=pat1.gif";
  file_get_contents($url);
}*/

?>
