<!--
	@File : signup.php
	@Dev : Lim Hyun (hyunzion@gmail.com), Park Gyu Min(pkm229125@naver.com)
	@Since : 2020-07-12
-->

<?php
$id=$_POST['armynumber'];
$pw=$_POST['pw'];
$pwc=$_POST['pwc'];
$name=$_POST['username'];

if($pw!=$pwc)
{
    echo "비밀번호와 비밀번호확인이 일치하지 않습니다";
    echo "<a href=signup.html>back page</a>";
    exit();
}

else if($id==NULL || $pw==NULL || $username==NULL)
{
    echo "빈칸들을 모두 채워주세요";
    echo "<a href=signup.html>back page</a>";
    exit();
}


//데이터 베이스 연결하기 위한 것, <아이피, 아이디, 비번, 데이터베이스 이름> 순임 
$mysqli=mysqli_connect("112.175.184.88","signal3007","q1w2e3r4!","signal3007");

//아이디가 이미 가입되어있는지 중복 여부 확인
//ㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡ
$check="SELECT *from armyusers WHERE armynumber='$id' "; 
$result=$mysqli->query($check);
if($result->num_rows==1)
{
    echo "중복된 id 입니다";
    echo "<a href=signup.html>back page</a>";
    exit();
}
//ㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡ

//회원가입 내용들을 데이터 베이스에 넣는 코드
$signup=mysqli_query($mysqli,"INSERT INTO armyusers (armynumber,userpw,username) VALUES('$id','$pw','$name')");

if($signup)
{
    echo "회원가입 성공하였습니다";
}

?>