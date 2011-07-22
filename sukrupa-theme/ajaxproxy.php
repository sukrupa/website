<?php
if ( $_SERVER['HTTP_HOST'] == 'localhost' ) {
    $school_admin_server = 'http://localhost:8080';
} else {
    $school_admin_server = 'http://school.sukrupa.org';
}
$c = curl_init($school_admin_server . '/addsubscriberinfo?subscriberName=' . $_POST['subscriberName'] . '&subscriberEmail=' . $_POST['subscriberEmail']);
curl_exec($c);
$info = curl_getinfo($c);
curl_close($c);
?>