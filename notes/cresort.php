<?php
session_start();
if(!$_SESSION['username']) echo"<script>alert('请先前往登录！');window.location.href='login.html';</script>";
else{
    $username=$_SESSION['username'];
$dbname='note';
$username=$_SESSION['username'];
$host='127.0.0.1';
$port=3316;
$sort=$_POST['sort'];
$conn=mysqli_connect('localhost:3316','root','root',$dbname);
if(!$conn) die('数据库连接失败！');
if(empty($_POST['name'])){
$sql="select * from sort where sort='$sort' and username='$username'";
$result=mysqli_query($conn,$sql);
$num=mysqli_num_rows($result);
if($num>0)
    echo"<script>alert('该分类已存在！');history.back();exit();</script>";
else{
$sql="select max(id) as id from sort ";
$result=mysqli_query($conn,$sql);
$row=$result->fetch_assoc();
$id=$row['id']+1;
$sql="insert into sort values('$id','$sort','$username')";
$result=mysqli_query($conn,$sql);
if($result) echo"<script>alert('分类创建成功！');history.back();localStorage.removeItem('sort');exit();</script>";
else echo"<script>alert('分类创建失败！');history.back();exit();</script>";
}}
else{
    $name=$_POST['name'];
$sql="update note set sort='$sort' where sort='$name' and username='$username'";
$sql1="update sort set sort='$sort' where sort='$name' and username='$username'";
$result=mysqli_query($conn,$sql);
$result1=mysqli_query($conn,$sql1);
if($result&&$result1) echo"<script>alert('分类重命名成功！');history.back();exit();</script>";
else echo"<script>alert('分类创建失败！');hisotry.back();exit();</script>";
}


}
?>