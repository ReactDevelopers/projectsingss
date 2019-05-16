<?php
$device_id  = $_GET['device_id'];
$token = $_GET['token'];
$refresh_token = $_GET['refresh_token'];

if($device_id) {
    setcookie('DEVICE-ID', $device_id);
}

if($token) {
    setcookie('X-TOKEN', $token);
}

if($refresh_token) {
    setcookie('X-REFRESH-TOKEN', $refresh_token);
}

echo 'asdknskjdhbk';

header("Location: /");