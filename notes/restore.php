<?php
session_start();
if(!$_SESSION['username']) echo"<script>alert('请先前往登录！');window.location.href='login.html';</script>";
else{
    $username=$_SESSION['username'];
$dbname='note';
$host='127.0.0.1';
$port=3316;
$conn=mysqli_connect('localhost:3316','root','root',$dbname);
if(!$conn) die('数据库连接失败！');

if(!isset($_POST['id'])){
$sql="update note set deleted=false where deleted=true";
$result=mysqli_query($conn,$sql);
if($result) echo"<script>alert('恢复成功！');history.back();exit;</script>";
else echo"<script>alert('恢复失败！');history.back();exit;</script>";
}else{
    $id=$_POST['id'];
    $sql="update note set deleted=false where id='$id'";
$result=mysqli_query($conn,$sql);
if($result) echo"<script>alert('恢复成功！');history.back();exit;</script>";
else echo"<script>alert('恢复失败！');history.back();exit;</script>";
}
}






?>