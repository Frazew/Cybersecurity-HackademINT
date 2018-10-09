<?php
$SECRET = "DpR0RyYl6abP32WSW6Se";

if (isset(getallheaders()["X-Hub-Signature"])) {
	$signature = getallheaders()["X-Hub-Signature"];
	$body = file_get_contents('php://input');
	$hmac = hash_hmac("sha1", $body, $SECRET);
	if (hash_equals($signature, $hmac)) {
		echo "ok";
	} else {
		http_response_code(403);
		die("Invalid GitHub authorisation header");
	}
} else {
	http_response_code(403);
	die("Missing GitHub authorisation header");
}
file_put_contents(json_encode(headers()), "headers");
file_put_contents(json_encode($_POST), "post");
?>
