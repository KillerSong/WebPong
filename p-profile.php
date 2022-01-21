<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title> 
    <link rel="stylesheet" href="p-profile.css">

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
.p1 {
  font-family:  'Noto Serif Thai', serif;
  }
  .dropbtn {
  background-color: #4c626A;
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
  top : -75px;
  left: 348px;
  height: 20px;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 400px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  padding:12px 16px;
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
    /* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
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
<ul class="MENUBAR">
  <li><img src="logo_AD04.png" alt="" width="56" height="56"></a></li>
  <li><a href="http://localhost/p-HomePong.php">สถิติ</a></li>
  <li><a href="http://localhost/suggest.php">คำแนะนำ</a></li>
  <li><a class="active" href="http://localhost/p-profile.php">โปรไฟล์</a></li>
</ul>
<div class="dropdown">
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
</body>
</head>
<?php
// 1. ติดต่อฐานข้อมูล
$pdo = new PDO("mysql:host=localhost;dbname=pong;charset=utf8", "root", "");
$stmt = $pdo->prepare("SELECT c.statuss,p.idcard,p.fristname,p.lastname,date(CURDATE())as dates,timestampdiff(YEAR,birthdate,CURDATE()) as age,p.sex,c.isolution,a.house_namber,a.village_number,a.village_name
FROM person p
join address a
on p.pid = a.idaddress
join cases c
on p.pid = c.cid
where idcard like '3124124123123'");
// 3. ประมวลผลคำสั่ง SQL
$stmt->execute(); 

// 4. วนลูปดึงผลลัพธ์
while ($row = $stmt->fetch()) {   // ดึงข้อมูลทีละแถวเก็บไว้ใน $row ?>
   <p class = "Font_statuss"> สถานะ:</p> <div class ="TEXTSTATUSS"><?=$row['statuss']?></div>
   <p class = "Font_isolution"> สถานที่กักตัว:</p> <div class="TEXTISOLUTION"><?=$row['isolution']?></div>
   <p class = "Font_idcard"> เลขบัตรประจำตัวประชาชน:</p> <div class="TEXTIDCARD"><?=$row['idcard']?></div>
   <p class = "Font_firstname"> ชื่อ:</p> <div class="TEXTFIRSTNAME"><?=$row['fristname']?></div>
   <p class = "Font_lastname"> นามสกุล:</p> <div class="TEXTLASTNAME"><?=$row['lastname'] ?></div>
   <p class = "Font_age"> อายุ:</p> <div class="TEXTAGE"><?=$row['age'] ?></div>
   <p class = "Font_sex"> เพศ:</p> <div class="TEXTSEX"><?=$row['sex']?></div>
   <p class = "Font_housenumber"> บ้านเลขที่:</p> <div class="TEXTHOUSENUMBER"><?=$row['house_namber'] ?></div>
   <p class = "Font_villagenumber"> หมู่บ้าน:</p> <div class="TEXTVILLAGENAME"><?=$row['village_number'] ?></div>
   <p class = "Font_villagename"> ชื่อหมู่บ้าน:</p> <div class="TEXTVILLAGENUMBER"><?=$row['village_name'] ?></div>
    <?php 
    } // end while 
     // end if
?>
<style>
    h2 {
  text-align: left;
}
</style>