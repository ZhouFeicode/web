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
$sql='delete from note where deleted=true';
$result=mysqli_query($conn,$sql);
if($result) echo"<script>alert('删除成功！');history.back();</script>";
else echo"<script>alert('删除失败！');history.back();</script>";
}else{
$id=$_POST['id'];
$sql="delete from note where id='$id'";
$result=mysqli_query($conn,$sql);
if($result)echo"<script>alert('删除成功！');history.back();</script>";
else echo"<script>alert('删除失败！');history.back();</script>";

}
}
?>