<?php
function getCurlData($url)
{
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($curl, CURLOPT_TIMEOUT, 10);
		$userAgent = $_SERVER['HTTP_USER_AGENT'];
		curl_setopt($curl, CURLOPT_USERAGENT, $userAgent);
		$curlData = curl_exec($curl);
		curl_close($curl);
		return $curlData;
}
?>