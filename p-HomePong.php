<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>P-Homepage</title> 
    <link rel="stylesheet" href="p-HomePong.css">
    
   
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
  <li><a class="active" href="http://localhost/p-HomePong.php">สถิติ</a></li>
  <li><a  href="http://localhost/suggest.php">คำแนะนำ</a></li>
  <li><a  href="http://localhost/p-profile.php">โปรไฟล์</a></li>
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
            <p><hr></p>
        </div>
        <?php } // end while 
        ?>
  </div>
</body>
</head>
<style>
    h2 {
  text-align: left;
}
</style>

   <p class = "TOPMID"> สถานการณ์ COVID-19 ในตำบลงิม</p>
   <hr class ="style1">
  <p class ="DAY"><?=date('ข้อมูลวันที่ d F Y') ?></p> 


<?php
// 1. ติดต่อฐานข้อมูล
$pdo = new PDO("mysql:host=localhost;dbname=pong;charset=utf8", "root", "");

// 2. กำหนดรูปแบบคำสั่ง SQL
$stmt = $pdo->prepare("SELECT count(c.cid) as positive , count(NOW()) as positiveday
from cases c
where statuss like 'positive' and day(date) = day(now()) ");
$stmt -> bindParam(1,$key);


// 3. ประมวลผลคำสั่ง SQL
$stmt->execute(); 

// 4. วนลูปดึงผลลัพธ์
while ($row = $stmt->fetch()) {   // ดึงข้อมูลทีละแถวเก็บไว้ใน $row
?>
<div class = "BOXPOSITIVE"><p class ="TEXTPOSITIVE">จำนวนผู้ติดเชื้อรายวัน</p><p class ="TEXTPOSITIVE_NUMBAER">+<?=$row['positiveday']?></p></div>
<?php
}
?>
<?php
// 1. ติดต่อฐานข้อมูล
$pdo = new PDO("mysql:host=localhost;dbname=pong;charset=utf8", "root", "");

// 2. กำหนดรูปแบบคำสั่ง SQL
$stmt = $pdo->prepare("SELECT count(c.cid) as death , count(NOW()) as deathday
from cases c
where statuss like 'death' and day(date) = day(now()) ");
$stmt -> bindParam(1,$key);


// 3. ประมวลผลคำสั่ง SQL
$stmt->execute(); 

// 4. วนลูปดึงผลลัพธ์
while ($row = $stmt->fetch()) {   // ดึงข้อมูลทีละแถวเก็บไว้ใน $row
?>
<div class = "BOXDIED"><p class ="TEXTDIED">ยอดผู้เสียชีวิต</p><p class = "TEXTPOSITIVE_NUMBAER1"><?=$row['death']?></p><br><p class ="TEXTPOSITIVE_NUMBAER2">+<?=$row['deathday']?></p></div>
<?php
}
?>
<?php
// 1. ติดต่อฐานข้อมูล
$pdo = new PDO("mysql:host=localhost;dbname=pong;charset=utf8", "root", "");

// 2. กำหนดรูปแบบคำสั่ง SQL
$stmt = $pdo->prepare("SELECT count(c.cid) as positive , count(NOW()) as positiveday
from cases c
where statuss like 'positive' ");
$stmt -> bindParam(1,$key);


// 3. ประมวลผลคำสั่ง SQL
$stmt->execute(); 

// 4. วนลูปดึงผลลัพธ์
while ($row = $stmt->fetch()) {   // ดึงข้อมูลทีละแถวเก็บไว้ใน $row
?>
<div class = "BOXPOSITIVE_ALL"><p class="TEXTPOSITIVE_ALL">จำนวนผู้ติดเชื้อปัจจุบัน</p><p class ="TEXTPOSITIVE_ALL_NUMBAER"><?=$row['positive']?></p></div>
<?php
}
?>
<?php
// 1. ติดต่อฐานข้อมูล
$pdo = new PDO("mysql:host=localhost;dbname=pong;charset=utf8", "root", "");

// 2. กำหนดรูปแบบคำสั่ง SQL
$stmt = $pdo->prepare("SELECT count(c.cid) as recovered , count(NOW()) as recoveredday
from cases c
where statuss like 'recovered' and day(date) = day(now()) ");
$stmt -> bindParam(1,$key);


// 3. ประมวลผลคำสั่ง SQL
$stmt->execute(); 

// 4. วนลูปดึงผลลัพธ์
while ($row = $stmt->fetch()) {   // ดึงข้อมูลทีละแถวเก็บไว้ใน $row
?>
<div class = "BOXRECOVERED"><p class ="TEXTRECOVERED">ยอดรักษาหายแล้วทั้งหมด</p><p class ="TEXTRECOVERED_NUMBER1"><?=$row['recovered']?></p><br><p class = "TEXTRECOVERED_NUMBER2">+<?=$row['recoveredday']?></p></div>
<?php
}
?>
</body>
</html>