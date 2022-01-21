<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title> 
    <link rel="stylesheet" href="web_status.css">
    <link rel="stylesheet" href="Box.css">
<style>
ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #4C626A;
}

li {
  float: left;
}

li a {
  display: block;
  color: white;
  text-align: center;
  padding: 20px 20px;
  text-decoration: none;
}

li a:hover:not(.active) {
  background-color: #111;
}

.active {
  background-color: #394A50;
}
input[type=number]::-webkit-inner-spin-button, 
input[type=number]::-webkit-outer-spin-button { 
-webkit-appearance: none;
}
</style>
<script>
function masks(name){
if(!name.value.match("^([0-9]*)$") && name.value.length>0){
name.value='';
return false;
}
if(name.value.length == 13)

alert('คุณป้อนครบ 13 หลักแล้ว');
return true;
}
function minInput(name,min){
if(name.value.length < min){
alert('ต้องป้อนอย่างน้อย'+min+'ตัวอักษรครับ!!!');
return false;
}else{
return true;}
}
</script>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-7 col-xs-12">
<ul class="p33">
  <li><img src="logo_AD04.png" alt="" width="56" height="56"></a></li>
  <li><a href="#contact">สถิติ</a></li>
  <li><a href="#home">เพิ่มข้อมูล</a></li>
  <li><a class="active" href="#about">แก้ไขข้อมูล</a></li>
  <li><a href="#about">โปรไฟล์</a></li>
  <li><a href="#about">แจ้งเตือน</a></li>
</ul><br></br>
<center><form action="?Act=Add" method="post">
<p>เลขบัตรประจำตัวประชาชน :  <input type="number" id="IDCard" name="IDCard" onkeyup="masks(IDCard)" onblur="return minInput(IDCard,13);" /><input type="submit" value="ค้าหา"></p>


</form></center>
</body>
<body>
<div class="box13"></div>
</body>
</head>
<style>
    h2 {
  text-align: left;
}
</style>



<?php
if(!empty($_GET)){
// 1. ติดต่อฐานข้อมูล
$pdo = new PDO("mysql:host=localhost;dbname=pong;charset=utf8", "root", "");

// 2. กำหนดรูปแบบคำสั่ง SQL
$stmt = $pdo->prepare("SELECT * FROM person where id_card like ? ");
$key = '%' . $_GET['id_card'].'%';
$stmt -> bindParam(1,$key);

// 3. ประมวลผลคำสั่ง SQL
$stmt->execute(); 

// 4. วนลูปดึงผลลัพธ์
while ($row = $stmt->fetch()) {   // ดึงข้อมูลทีละแถวเก็บไว้ใน $row
?>   
  <?$row['frist_name']?> <?$row['last_name']?><br>
  เพศ   <?$row['sex']?><br>
<?php
      }
  }
?>
