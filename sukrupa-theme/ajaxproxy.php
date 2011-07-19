<?php

//echo file_get_contents('http://localhost:8080/addsubscriberinfo?subscriberName=' . $_POST['subscriberName'] . '?subscriberEmail' . $_POST['subscriberEmail']);

// $c = curl_init('http://localhost:8080/addsubscriberinfo?subscriberName=John&subscriberEmail=john@gmail.com');
$c = curl_init('http://localhost:8080/addsubscriberinfo?subscriberName=' . $_POST['subscriberName'] . '&subscriberEmail=' . $_POST['subscriberEmail']);

//curl_setopt($c, CURLOPT_NOBODY, true);
//curl_setopt($c, CURLOPT_POST, true);

curl_exec($c);

$info = curl_getinfo($c);

//echo $info['http_code'];
//echo curl_getinfo($c, CURL_INFO_HTTP_CODE);

//    if(curl_getinfo($c, CURLINFO_HTTP_CODE) === '200') echo "CURLINFO_HTTP_CODE returns a string.";
//    if(curl_getinfo($c, CURLINFO_HTTP_CODE) === 200) echo "CURLINFO_HTTP_CODE returns an integer.";
    curl_close($c);

?>