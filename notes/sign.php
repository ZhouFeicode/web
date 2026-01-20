<?php
$dbname='note';
$host='127.0.0.1';
$port=3316;
$username=$_POST['username'];
$password=md5($_POST['password']);
$conn=mysqli_connect('localhost:3316','root','root',$dbname);
if(!$conn) die('连接数据库失败！');
$sql="select * from account where username='$username '";
$result=mysqli_query($conn,$sql);
$num=mysqli_num_rows($result);
if($num>0) echo"<script>alert('用户名已被占用，选择其他名字！');history.back();exit;</script>";
$sql0="select max(id) as id from account";
$result0=mysqli_query($conn,$sql0);
$num0=mysqli_num_rows($result0);
$row=$result0->fetch_assoc();
    $id=$row['id']+1;
    echo"<script>alert($id);</script>";
$sql="insert into account values('$id','$username','$password')";
$result=mysqli_query($conn,$sql);
if($result)
    echo"<script>alert('欢迎注册使用我的笔记应用！');window.location.href='login.html';exit;</script>";
else  echo"<script>alert('注册失败，请重试！');history.back();exit;</script>";
?>