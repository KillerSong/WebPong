<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suggest</title> 
    <link rel="stylesheet" href="success.css">
   
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
  <li><a class="active" href="http://localhost/suggest.php">คำแนะนำ</a></li>
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
            <p><hr class="style1"></p>
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

<body>
<div class="box1">
<p class="p2">ฉันจะป้องกันตัวเองได้อย่างไร?</p></div>
<div class="box2">
  <p class="p4">1.ห้ามเดินทางไปพื้นที่ที่ได้รับผลกระทบ</p>
  <p class="p4" >2.ปิดปากด้วยแขนเวลาไอหรือจาม อย่าจามหรือไอบนมือ</p>
  <p class="p4">3.ล้างมือบ่อย ๆ ด้วยสบู่ น้ำสะอาดและแอลกอฮอล์</p>
  <p class="p4" >4.หลีกเลี่ยงคนป่วยและสถานที่ที่มีคนหนาแน่น</p><br>
</div>
</body>
<body>
<div class="box1"><p class="p2">อาการที่คาดว่าจะติดเชื้อ</p></div>
<div class="box3">
<p class="p4">1.มีไข้ (ไข้สูงติดต่อกัน 48 ชั่วโมง)</p>
<p class="p4">2.ไอแห้ง</p>
<p class="p4">3.ไอมีเสมหะ</p>
<p class="p4">4.ไม่มีเรี่ยวแรง หอบเหนื่อย</p>
<p class="p4">4.ไม่มีเรี่ยวแรง หอบเหนื่อย</p>
<p class="p4">5.หายใจลำบาก</p>
<p class="p4">6.เจ็บคอ</p>
<p class="p4">7.ปวดหัว</p>
<p class="p4">8.จมูกไม่ได้กลิ่น</p>
<p class="p4">9.อ่อนเพลีย</p><br>
</div>
</body>
<body>
<div class="box6"><p class="p2">ฉันคิดว่าฉันติดเชื้อ ฉันควรทำอย่างไร?</p></div>
<div class="box4">
<p class="p4">1.แจ้งสถาบันหรือองค์กรด้านสุขภาพในตำบลผ่านสายด่วน</p>
<p class="p4">2.ผู้ป่วยที่ได้รับการยืนยันแล้วว่าเป็นโควิด-19 และผู้สงสัยว่าจะติดเชื้อให้กักตัวที่บ้าน</p>
<p class="p4">3.ห้ามไปพื้นที่สาธารณะหลีกเลี่ยงการส่งสาธารณะ      </p>
<p class="p4">4.ผู้ที่เพิ่งเดินทางไปพื้นที่ที่มีไวรัสแพร่กระจายหรือสัมผัสโดยตรงกับผู้ป่วยที่ได้รับการยืนยันว่าเป็นโควิด-19 </p>
<p class="p4">ต้องกักตัวหรือเว้นระยะห่างทางสังคมเป็นเวลา 14 วัน นับตั้งแต่เวลาเสี่ยงติดเชื้อล่าสุด</p>
<p class="p4">5.การบรรเทาอาการอาจรวมไปถึงการทานยาลดไข้ ดื่มน้ำและพักผ่อนอาจต้องใช้การรักษาด้วยออกซิเจน</p>
<p class="p4">ส่งของเหลวเข้าเส้นเลือดหรือเครื่องช่วยหายใจตามความรุนแรงของอาการ</p>
<p class="p4">6.การใช้สเตียรอยด์ในการรักษาอาจทำให้อาการของผู้ป่วยแย่ลงดังนั้นควรใช้ตามที่แพทย์์สั่งเท่านั้น</p><br>
</div>
</body>

<body>
<div class="box1"><h2><p class="p2">ช่วยเหลือเร่งด่วน</p></h2></div>
<div class="box5">
  <p class="p4">ติดต่อโรงพยาบาลส่งเสริมสุขภาพตำบล : 054-448-337</p>
  <p class="p4">ติดต่อสาธารณสุขจังหวัด : 054-409-123</p><br>
</div>
</body>