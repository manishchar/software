<?php
//$target = $row['regid'];



 function sendMessage($data,$target)
 {
//FCM api URL
$url = 'https://fcm.googleapis.com/fcm/send';
//$url = 'https://fourseason-1386.firebaseio.com';
//api_key available in Firebase Console -> Project Settings -> CLOUD MESSAGING -> Server key
$server_key = 'AIzaSyBBqeeB3o-3O6hOuw4SH60LPlR2EJtR79Q';
			
$fields = array();

$fields['data'] = $data;
//$fields['notification']=array("sound"=>"default","click_action"=>"FCM_PLUGIN_ACTIVITY","icon"=>"fcm_push_icon","title"=>"hello","body"=>"text msg");
$fields['priority']="high";
if(is_array($target)){
	$fields['registration_ids'] = $target;
}else{
	$fields['to'] = $target;
}

//header with content_type api key
$headers = array(
	'Content-Type:application/json',
  'Authorization:key='.$server_key
);
			
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
//echo json_encode($fields);
$result = curl_exec($ch);
//echo $result;
if ($result === FALSE) {
	die('FCM Send Error: ' . curl_error($ch));
}
curl_close($ch);
return $result;
}
//$message=array("message"=>"Notification");



?>