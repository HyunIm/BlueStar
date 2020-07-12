<!--
	@File : connect.php
	@Dev : Lim Hyun (hyunzion@gmail.com), Park Gyu Min (pkm229125@naver.com)
	@Since : 2020-07-10
-->

<?php

$db_host = "112.175.184.88";
$db_user = "signal3007";
$db_password = "q1w2e3r4!";
$db_name = "signal3007";


$con = new mysqli($db_host, $db_user, $db_password, $db_name); // 데이터베이스 접속

if ($con->connect_errno) { die('Connection Error : '.$con->connect_error); } // 오류가 있으면 오류 메세지 출력

?>