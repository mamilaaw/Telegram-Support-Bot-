

<?php
function slack($text){
//error_reporting(E_ALL);

$data = array(
  // Your message
  'text' => $text,
);

$json_string = json_encode($data);
// Your webhook URL
$webhook_url = 'https://hooks.slack.com/services/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';

$slack_call = curl_init();
curl_setopt($slack_call, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($slack_call, CURLOPT_POSTFIELDS, $json_string);
curl_setopt($slack_call, CURLOPT_CRLF, true);
curl_setopt($slack_call, CURLOPT_RETURNTRANSFER, true);
curl_setopt($slack_call, CURLOPT_URL, $webhook_url);
curl_setopt($slack_call, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($slack_call, CURLOPT_HTTPHEADER, array(
    'Content-type: application/json',
    'Content-Length:'.strlen($json_string)));

$result = curl_exec($slack_call);
curl_close($slack_call);
}
?>