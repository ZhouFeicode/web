<?php
session_start();
if(!$_SESSION['username']){
echo"<script>alert('请先前往登录！');window.location.href='login.html';</script>";
}
else{
unset($_SESSION['id']);
$host='127.0.0.1';
$port=3316;
$dbname='note';
$username=$_SESSION['username'];
$conn=mysqli_connect('localhost:3316','root','root',$dbname);
if(!$conn) die('连接数据库失败！');
$sql="select * from note where username='$username' and deleted='false'";
$result=mysqli_query($conn,$sql);
$num=mysqli_num_rows($result);
if($num>0){
    while($row=$result->fetch_assoc())
        $notes[]=$row;
}
$sql="select count(*) as cnt,sort from note  where username='$username' and deleted='false' group by sort";
$result=mysqli_query($conn,$sql);
$num=mysqli_num_rows($result);
$sorts=[];
if($num>0)
    while($row=$result->fetch_assoc())
$sorts[]=$row;
}
$sql="select * from note where username='$username' and deleted!='false'";
$result1=mysqli_query($conn,$sql);
$num=mysqli_num_rows($result1);
$bin=[];
if($num>0)
    while ($row1=$result1->fetch_assoc())
$bin[]=$row1;
$sql="select * from sort where username='$username' and sort not in (select distinct sort from note where username='$username')";
$result=mysqli_query($conn,$sql);
$num=mysqli_num_rows($result);
$other=[];
if($num>0)
    while($row=$result->fetch_assoc())
$other[]=$row;


?>
<!DOCTYPE html>
<head>
    <title>My Notes</title>
    <link rel="stylesheet" href="index.css">
    <script src="index.js"></script>
</head>
<body id="bodyi">
<div id="header">
<p id="icon1">
    <a href="index.php"><img src="image/Note.png" width="40px" height="40px"></a>
    My Notes
</p>
<p id='icon2'>
     <img id='edit' src="image/Edit.png" width="33px" height="33px">
    <a href="index.html"><img src="image/user.png" width="40px" height="40px"></a>
</p>
</div>   
<div id='table'>
<?php
 if($sorts) foreach($sorts as $sorts):
$sort=$sorts['sort'];
   echo" <table class='tab'><tr>
   <td id='d1'>". htmlspecialchars($sorts['sort'])."<img class='rename' data-sort='".$sort."' src='image/rename.png' width='18px' height='18px'></td>
   <td id='d2'>".htmlspecialchars($sorts['cnt'])."</td>
   <td id='d3'>
 <a href='create.php'><button data-name='".htmlspecialchars($sort)."' class='create'>新增</button></a>
   </td>
<td id='d4'>
<form class='dsort' action='delete.php' method='post'>
<input type='hidden' name='sort' value='".htmlspecialchars($sorts['sort'])."'>
<button class='delete'>删除</button>
</form>
</td>
   </tr>";
   $sql="select * from note where username='$username' and deleted='false' and sort='$sort'";
   $result=mysqli_query($conn,$sql);
   $detail=[];
   while($row=$result->fetch_assoc())
    $detail[]=$row;
   foreach($detail as $detail):
    echo"<tr><td>".htmlspecialchars($detail['title'])."</td>
    <td>".htmlspecialchars($detail['description'])."</td>
    <td>
    <button class='modify'  data-id='".$detail['id']."'>修改</button>
    </td>
    <td>
<form class='dnote' action='delete.php' method='post'>
<input type='hidden' name='id' value='".htmlspecialchars($detail['id'])."'>
<button class='delnote'>删除</button>
</form>
</td>
    </tr>
    ";
   endforeach; 

   echo"</table>
   ";
?>
 <?php endforeach; ?>
 <?php
  echo"<table class='tab'><tr>
 <td id='e1'>最近删除
 </td>
 <td id='e2'>".htmlspecialchars(count($bin))."</td>
 <td id='e3'>
<form id='resort' action='restore.php' method='post'>
<button id='restoreall'>恢复</button>
</form>
 </td>
 <td id='e4'>
 <form id='mosort' action='remove.php' method='post'>
 <button id='removeall'>删除</button>
 </form>
 </td>
 </tr>
 ";
  if($bin) foreach($bin as $bin):
echo"<tr>
<td>".htmlspecialchars($bin['title'])."</td>
<td>".htmlspecialchars($bin['description'])."</td>
<td><form class='renote' action='restore.php' method='post'>
<input type='hidden' name='id' value='".htmlspecialchars($bin['id'])."' >
<button class='restore'>恢复</button>
</form></td>
<td><form class='monote' action='remove.php' method='post'>
<input type='hidden' name='id' value='".htmlspecialchars($bin['id'])."' >
<button class='remove'>删除</button>
</form></td>
</tr>";
 endforeach;?>
<?php
if($other) foreach($other as $other):
    $sort=$other['sort'];
    echo"
    <tr> <td id='d1'>".$other['sort']."<img src='image/rename.png' class='rename' data-sort='".$sort."' width='18px' height='18px'></td>
    <td id='d2'>0</td>
    <td  id='d3'>
    <a href='create.php'>
    <button class='otherc' data-sort='".$sort."'>新增</button></a>
    </td>
    <td  id='d4'>
    <form class='otherde' action='otherde.php' method='post'>
    <input type='hidden' name='sort' value='".$sort."'>
    <button  type='submit'>删除</button>
    </form>
    </td>
    </tr>
    ";
endforeach;


?>
</div>
<div id='createarea'>
<form id='createform' action="cresort.php" method="post">
<input id='sortt' type="text" name='sort'>
<input type="hidden" name='name' id='namein'>
<button id='cancel' type="button">取消</button>
<button id='sure' type="submit">提交</button>
</form>
</div>
</body>
</html>