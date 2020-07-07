<?php
session_start();
$id=$_POST['userId'];
$pw=$_POST['password'];
$mysqli=mysqli_connect("SQL아이디","루트","비밀번호","연결할 DB명");  //이것이 SQL 연결 시작부분입니다. by규민
민
$check="SELECT * FROM user_info WHERE userId='$id'";
$result=$mysqli->query($check)민

if($result->num_rows==1)
{
    $row=$result->fetch_array(MYSQLI_ASSOC);
    
    if($row['userpw']==$password)
    {
        $_SESSION['userid']=$id;
        if(isset($_SESSION['userid']))
        {
            header('Location: ./loginsuccess.html');
        }
        else
        {
            echo"세션 저장 실패";
        }

    }
    else
    {
        echo "wrong id or pw";
    }

}

else
{
    echo"wrong id or pw";
}
?>