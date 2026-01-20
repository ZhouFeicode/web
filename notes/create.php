<?php
session_start();
if(!$_SESSION['username']){
    echo"<script>alert('请先前往登录哦！');window.location.href='login.html';</script>";
}else{
$username=$_SESSION['username'];
$dbname='note';
$host='127.0.0.1';
$port=3316;
$conn=mysqli_connect('localhost:3316','root','root',$dbname);
if(!$conn) die('数据库连接失败！');
}
if(isset($_SESSION['id'])) $id=$_SESSION['id'];
else $id=[];
if(isset($_GET['id'])){
$id=$_GET['id'];
$_SESSION['id']=$id;
}
$row=[];
if($id){
$sql="select * from note where id='$id'";
$result=mysqli_query($conn,$sql);
$num=mysqli_num_rows($result);
if($num>0)
    $row=$result->fetch_assoc();
}
if($id&&isset($_POST['title'])){
 $title=$_POST['title'];
    $des=$_POST['des'];
    $sql="update note set title='$title' , description='$des' where id='$id'";
    $result=mysqli_query($conn,$sql);
    if($result)
        echo"<script>alert('修改成功！');history.back();exit;</script>";
    else echo"<script>alert('修改失败！');history.back();exit;</script>";
}
if(!$id&&isset($_POST['title'])){
     $title=$_POST['title'];
    $des=$_POST['des'];
    date_default_timezone_set("Asia/Shanghai");
    $createtime=date('y-m-d H:i:s');
    $sort=$_POST['sort'];
    $sql="select max(id) as id from note";
    $result=mysqli_query($conn,$sql);
    $id=$result->fetch_assoc()['id']+1;
    $sql="insert into note values('$id','$username','$title','$des','$createtime','$sort','false')";
    $result=mysqli_query($conn,$sql);
    if($result) echo"<script>alert('编辑成功！');history.back();localStorage.removeItem('sort');exit;</script>";
    else echo"<script>alert('编辑失败！');history.back();exit;</script>";
}



?>
<!DOCTYPE html>
<head>

<title>Create your Notes</title>
    <link rel="stylesheet" href="index.css">
    <script src='index.js'></script>
</head>
<body id='bod'>
    <div id='tit'><p>编辑我的笔记</p></div>
 <div id='form'>
<form id='creform' action='create.php' method='post'>
    <?php 
    if($row){ 
    echo"
<input type='text' name='title' id='inp1' placeholder='标题' value='".htmlspecialchars($row['title'])."'>
<textarea type='text' name='des' id='inp2' placeholder='描述'>".$row['description']."</textarea>
";}
else{
      echo"
<input type='text' name='title' id='inp1' placeholder='标题'>
<textarea name='des' id='inp2' placeholder='描述'></textarea>
";
}
echo"<input type='hidden' id='sorthid' name='sort'>
<input type='hidden' id='idhid' name='id'>
<button id='crea' type='submit'>提交</button>
<button id='return' type='button'>返回</button>";
?>


</form>
 </div>   
</body>




</html>