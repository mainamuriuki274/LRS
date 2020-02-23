<?php

$request_id = 'REQUEST_ID';
$verification = new \Nexmo\Verify\Verification($request_id);
$result = $client->verify()->check($verification, 'CODE');
?>