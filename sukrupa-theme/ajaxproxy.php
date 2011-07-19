<?php
$c = curl_init('http://localhost:8080/addsubscriberinfo?subscriberName=' . $_POST['subscriberName'] . '&subscriberEmail=' . $_POST['subscriberEmail']);
curl_exec($c);
$info = curl_getinfo($c);
curl_close($c);
?>