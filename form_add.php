<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add-Form</title> 
    <link rel="stylesheet" href="web_add_form.css">
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
  <li><a href="http://localhost/VH-HomePong.php">สถิติ</a></li>
  <li><a class="active" href="http://localhost/form_add.php">เพิ่มข้อมูล</a></li>
  <li><a href="http://localhost/web_status_pong.php">แก้ไขข้อมูล</a></li>
  <li><a href="http://localhost/VH-profile.php">โปรไฟล์</a></li>
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
            <p>เพศ <?=$row['sex']?> อายุ <?=$row['age']?> เวลา <?=$row['TIME']?></p> 
            <p><?=$row['isolution']?></p>
            <p><hr class="style1"></p>
        </div>
        <?php } // end while 
        ?>
  </div>

</body>
</head>
<body>
    <form action="save_form.php" method="post"><br>
    <div class="form-group">
       <div class="col-sm-2">  </div>
       <div class="col-sm-5" align="left">
       <br>
       <p class="add_form">เพิ่มข้อมูล</p>
       </div>
       </div>
<style>
    h2 {
  text-align: left;
}
</style>

 <p class = "statuss">สถานะ:
    <select name="statuss" required> 
    <option value="">โปรดระบุ</option>
        <option value="negative">ไม่ติดเชื้อ</option>
        <option value="positive">ติดเชื้อ</option>  
        <option value="quarantine">กักตัว</option>  
        <option value="no_status">ไม่มีสถานะ</option> 
        <option value="death">เสียชีวิต</option>  
        <option value="recovered">รักษาหายแล้ว</option>    
    </select></p>
    <p class = "DATE">วันที่: <input type="date"  name="date" value="date('d-m-y')"required></p>
    <p class = "isolution">สถานที่กักตัว: <input type="text"  name="isolution" required></p>
    <p class = "IDCARD">เลขบัตรประจำตัวประชาชน: <input type="int" id="idcard" name="idcard" size = 20 minlength = 13 maxlength = 13 required></p>
    <p class = "FIRSTNAME">ชื่อ: <input type="text"  name="firstname" required></p>
    <p class = "LASTNAME">นามสกุล:<input type="text" id="lastname" name="lastname" required></p>
    <p class = "BIRTHDATE">วัน/เดือน/ปีเกิด: <input type="date" id="date" name="birth" required></p>
    <p class = "SEX">เพศ :
    <select name="sex" required >
        <option value="">โปรดระบุ</option>
        <option value="ชาย">ชาย</option>
        <option value="หญิง">หญิง</option>
    </select></p>
    <p class = "House_number">บ้านเลขที่ <input type="text"  name="house_number" required></p>
    <p class = "Village_House">หมู่บ้าน:
    <select name="village_number" required> 
        <option value="">โปรดระบุ</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>  
        <option value="4">4</option>  
        <option value="5">5</option> 
        <option value="6">6</option>  
        <option value="7">7</option>    
        <option value="8">8</option> 
        <option value="9">9</option>
        <option value="10">10</option>
        <option value="11">11</option>  
        <option value="12">12</option>  
        <option value="13">13</option> 
        <option value="14">14</option>  
        <option value="15">15</option>    
        <option value="16">16</option> 
        <option value="17">17</option>  
        <option value="18">18</option>    
    </select></p>
    <p class = "Village_number">ชื่อหมู่บ้าน:
    <select name="village_name" required> 
    <option value="">โปรดระบุ</option>
        <option value="ทุ่งแต">ทุ่งแต</option>
        <option value="หนองบัว">หนองบัว</option>
        <option value="ควร">ควร</option>  
        <option value="ดอนไชย">ดอนไชย</option>  
        <option value="แบ่ง">แบ่ง</option> 
        <option value="ปัว">ปัว</option>  
        <option value="ปางผักหม">ปางผักหม</option>    
        <option value="สันกลาง">สันกลาง</option> 
        <option value="ป่าแดง">ป่าแดง</option>
        <option value="เลี้ยว">เลี้ยว</option>
        <option value="แฮะ">แฮะ</option>  
        <option value="ใหม่น้ำเงิน">ใหม่น้ำเงิน</option>  
        <option value="ปัวดอย">ปัวดอย</option> 
        <option value="ตุ่น">ตุ่น</option>  
        <option value="เก๊าเงา">เก๊าเงา</option>    
        <option value="น้ำฮาก">น้ำฮาก</option>
        <option value="นาดอ">นาดอ</option>  
        <option value="18">ต้า</option>    
        <option value="19">ปางวัว</option>   
    </select><br><div class = "add_form_button"><input type="submit" name="add" value="เพิ่มข้อมูล"></div></p>
    
</form>

</form>
</body>
</html>