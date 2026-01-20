<?php
session_start();
$dbname='note';
$host='127.0.0.1';
$port=3316;
$username=$_POST['username'];
$password=md5($_POST['password']);
$conn=mysqli_connect('localhost:3316','root','root',$dbname);
if(!$conn) die('连接数据库失败！');
$sql="select * from account where username='$username' and password='$password'";
$result=mysqli_query($conn,$sql);
$num=mysqli_num_rows($result);
if($num<1) echo"<script>alert('用户名和密码错误！');history.back();</script>";
else {
    $_SESSION['username']=$username;
    echo"<script>alert('欢迎登录我的笔记应用！');window.location.href='index.php';</script>";
}





?>