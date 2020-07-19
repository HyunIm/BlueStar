<!--
	@File : logincheck.php
	@Dev : Lim Hyun (hyunzion@gmail.com), Park Gyu Min(pkm229125@naver.com)
	@Since : 2020-07-11
-->

<?php

session_start(); // 세션
// include ("connect.php"); // DB접속

$id = $_POST['armynumber']; // 입력한 군번
$pw = $_POST['pw']; // 입력한 패스워드

$mysqli=mysqli_connect("localhost","signal3007","q1w2e3r4!","signal3007"); //sql 연결 정보

$check = "SELECT * from armyusers where armynumber='$id' and userpw='$pw'";
$result = $mysqli->query($check);

if($result->num_rows==1)
{
   $row = $result->fetch_array(MYSQLI_ASSOC); //하나의 열을 배열로 가져오는 것
   if($row['userpw']==$pw)
   {
      $_SESSION['armynumber']=$id;

      if(isset($_SESSION['armynumber']))
      {
         header('Location: phpinfo.php');//정보가 일치할시에 다음 페이지로 넘어가게 해주는 주소 라인
      }
      else
      {
         echo"세션 저장 실패";
      }
   }
   else
   {
      echo"아이디나 비밀번호가 틀렸습니다";
   }
}


//ㅡㅡㅡㅡㅡ,예비용 코드 , 혹시라도 위의 코드가 틀렸을 경우 대비용ㅡㅡㅡㅡㅡㅡㅡㅡ

// if($id==$row['id'] && $pw==$row['pw']){ // id와 pw가 맞다면 login

//    $_SESSION['id']=$row['id'];
//    $_SESSION['name']=$row['name'];
//    echo "<script>location.href='login.php';</script>";

// }else{ // id 또는 pw가 다르다면 login 폼으로

//    echo "<script>window.alert('invalid username or password');</script>"; // 잘못된 아이디 또는 비빌번호 입니다
//    echo "<script>location.href='login.php';</script>";

// }

?>>