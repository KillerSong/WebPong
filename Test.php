
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title> 
    <link rel="stylesheet" href="web_status.css">
    <link rel="stylesheet" href="Box.css">
    <link rel="stylesheet" href="FontBox.css">
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
.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  padding: 12px 16px;
  z-index: 1;
}

.dropdown:hover .dropdown-content {
  display: block;
}
.dropbtn {
  background-color: #4C626A;
  font-family: TH SarabunPSK;
  color: white;
  padding: 16px;
  font-size: 30px;
  font-weight: bold;
  border: none;
  cursor: pointer;
}

.dropbtn:hover, .dropbtn:focus {
  background-color: #000000;
}

.dropdown {
  position: relative;
  display: inline-block;
  top: -75px;
  left: 490px
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 400px;
  overflow: auto;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown a:hover {background-color: #ddd;}

.show {display: block;}
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
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
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
</ul><div class="dropdown">
  <button onclick="myFunction()" class="dropbtn">แจ้งเตือน</button>
  <div id="myDropdown" class="dropdown-content">
    <?php
        // 1. ติดต่อฐานข้อมูล
        $pdo = new PDO("mysql:host=localhost;dbname=pong;charset=utf8", "root", "");

        // 2. กำหนดรูปแบบคำสั่ง SQL
        $stmt = $pdo->prepare("SELECT p.sex,timestampdiff(YEAR,birthdate,CURDATE()) as age,c.isolution,c.statuss,TIME_FORMAT(NOW(), '%H:%i') as TIME
        from person p 
        join cases c
        on p.pid = c.cid
        where now()");
        $stmt -> bindParam(1,$key);

        // 3. ประมวลผลคำสั่ง SQL
        $stmt->execute(); 

        // 4. วนลูปดึงผลลัพธ์
        while ($row = $stmt->fetch()) {   // ดึงข้อมูลทีละแถวเก็บไว้ใน $row
        ?>
        <div>
            <p><?=$row['statuss']?></p>
            <p>เพศ <?=$row['sex']?> อายุ <?=$row['age']?> <?=$row['TIME']?></p> 
            <p><?=$row['isolution']?></p>
            <p><hr class="style1"></p>
        </div>
        <?php } // end while 
        ?>
  </div>
</div><br></br>

<center><form action="" >
<p class = "p37">เลขบัตรประจำตัวประชาชน :  <input type="number" name="keyword" onkeyup="masks(idcard)" onblur="return minInput(idcard,13);" />
<input type="submit" value="ค้นหา"></p>

</form></center>
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
$stmt = $pdo->prepare("SELECT * ,date(CURDATE())as dates,timestampdiff(YEAR,birthdate,CURDATE()) as age
from person p
join cases c
on p.pid = c.cid
where idcard like ?");
$key = '%' . $_GET['keyword'] . '%';
$stmt -> bindParam(1,$key);

// 3. ประมวลผลคำสั่ง SQL
$stmt->execute(); 

// 4. วนลูปดึงผลลัพธ์
while ($row = $stmt->fetch()) {   // ดึงข้อมูลทีละแถวเก็บไว้ใน $row
?>
  <div class="box13" ><a href>
    <p class ="p34"><?=$row['fristname']?> <?=$row['lastname']?><p class = "p36"><?=$row['dates']?></p><br></p>
    <p class ="p35">เพศ <?=$row['sex']?> อายุ <?=$row['age']?> ปี<br></p>
  </div>
<?php } // end while 
    } // end if
?>
</body>
</html>