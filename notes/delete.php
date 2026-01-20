<?php
session_start();
if(!$_SESSION['username']){
echo"<script>alert('请先前往登录！');window.location.href='login.html';</script>";
}
else{
$host='127.0.0.1';
$port=3316;
$dbname='note';
$username=$_SESSION['username'];
$conn=mysqli_connect('localhost:3316','root','root',$dbname);
if(!$conn) die('连接数据库失败！');
if(isset($_POST['sort'])){
$sort=$_POST['sort'];
$sql="update note set deleted=true where username='$username' and sort='$sort'";
$result=mysqli_query($conn,$sql);
if($result) echo"<script>alert('删除成功！');history.back();exit();localStorage.removeItem('sort');</script>";
else echo"<script>alert('删除失败，请重试！');history.back();exit();</script>";
}
if(isset($_POST['id'])){
    $id=$_POST['id'];
    $sql="update note set deleted=true where id='$id'";
    $result=mysqli_query($conn,$sql);
    if($result) echo"<script>alert('删除成功！');history.back();exit();</script>";
    else echo"<script>alert('删除失败，请重试！');history.back();exit();</script>";

}
}
?>