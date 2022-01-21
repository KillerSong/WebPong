<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title> 
    <link rel="stylesheet" href="edit.css">
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
  left: 475px;
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
  <li><a href="#contact">สถิติ</a></li>
  <li><a href="http://localhost/form_add.php">เพิ่มข้อมูล</a></li>
  <li><a class="active" href="http://localhost/web_status_pong.php">แก้ไขข้อมูล</a></li>
  <li><a href="http://localhost/profile.php">โปรไฟล์</a></li>
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
<?php include "condb.php" ?>
<?php
  // 1. กาหนดคาสั่งSQL ให้ดึงสินค้าตามรหัสสินค้า
$stmt= $pdo->prepare("SELECT * ,date(CURDATE())as dates
FROM person p
join cases c
on p.pid = c.cid
join address a
on p.pid = a.idaddress WHERE idcard= ?");
$stmt->bindParam(1, $_GET["idcard"]);  
  // 2. นำค่า pidที่ส่งมากับURL กำหนดเป็นเงื่อนไข        
$stmt->execute(); 
  // 3. เริ่มค้นหา
$row = $stmt->fetch();  
  // 4. ดึงผลลัพธ์ (เนื่องจากมีข้อมูล 1 แถวจึงเรียกเมธอด fetch เพียงครั้งเดียว)?>
<html>
  <head>
    <meta charset="utf-8">
  </head>
  <body>
    <form action="update_edit.php" method="post">
      <input type="hidden" name="cid" value="<?=$row["cid"]?>">
      <p class = "statuss">สถานะ:
    <select name="statuss" required> 
    <option value="<?=$row["statuss"]?>"></option>
        <option value="ไม่ติดเชื้อ">ไม่ติดเชื้อ</option>
        <option value="ติดเชื้อ">ติดเชื้อ</option>  
        <option value="กักตัว">กักตัว</option>  
        <option value="ไม่มีสถานะ">ไม่มีสถานะ</option> 
        <option value="เสียชีวิต">เสียชีวิต</option>  
        <option value="รักษาหายแล้ว">รักษาหายแล้ว</option>    
    </select></p>
    <p class = "DATE">วันที่: <input type="date"  name="date" value="date('d-m-y')" value="<?=$row["date"]?>"required></p>
    <p class = "isolution">สถานที่กักตัว: <input type="text"  name="isolution" value="<?=$row["isolution"]?>" required></p>
    <p class = "IDCARD">เลขบัตรประจำตัวประชาชน: <input type="int" id="idcard" name="idcard" size = 20 minlength = 13 maxlength = 13 value="<?=$row["idcard"]?>" required></p>
    <p class = "FIRSTNAME">ชื่อ: <input type="text"  name="firstname" value="<?=$row["fristname"]?>" required></p>
    <p class = "LASTNAME">นามสกุล:<input type="text" id="lastname" name="lastname" value="<?=$row["lastname"]?>" required></p>
    <p class = "BIRTHDATE">วัน/เดือน/ปีเกิด: <input type="text" id="date" name="birth" value="<?=$row["dates"]?>" required></p>
    <p class = "SEX">เพศ :<input type="text"  name="sex" value="<?=$row["sex"]?>" required></p>
    <p class = "House_number">บ้านเลขที่:<input type="text"  name="house_number" value="<?=$row["house_namber"]?>" required></p>
    <p class = "Village_House">หมู่บ้าน:<input type="text"  name="village_name" value="<?=$row["village_name"]?>" required></p>
    <p class = "Village_number">ชื่อหมู่บ้าน:<input type="text"  name="village_number" value="<?=$row["village_number"]?>" required>
    </select><br><div class = "add_form_button"><input type="submit" name="add" value="แก้ไขข้อมูล"></div></p>

    </form>    
</body>
</html>