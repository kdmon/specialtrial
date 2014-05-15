<?
$code = $_GET['code'];
$clientID = "";
$secret = "";

$url = "https://github.com/login/oauth/access_token";
//$url = "http://it4se.com";
$fields = array(
 'client_id' => $clientID,
 'client_secret' => $secret,
 'code' => $code
);

foreach($fields as $key=>$value) {
  $fields_string .= $key.'='.$value.'&';
}
rtrim($fields_string, '&');

$ch = curl_init();

//set the url, number of POST vars, POST data
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POST, count($fields));
curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//curl_setopt($ch, CURLOPT_VERBOSE, 1);
//curl_setopt($ch, CURLOPT_HEADER, 1);
curl_setopt($ch,CURLOPT_SSL_VERIFYPEER, false);

//execute post
$response = curl_exec($ch);

echo $response;

/*
// Then, after your curl_exec call:
$header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
$header = substr($response, 0, $header_size);
$body = substr($response, $header_size);

echo "result " .$body ." " . $header;
*/
//close connection
curl_close($ch);

?>
