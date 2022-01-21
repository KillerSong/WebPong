<!DOCTYPE html>
<html lang="en">
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
    </style>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>


    
</head>
<body>
  <ul class="ppp">
    <li><img src="logo1.png" alt="" width="56" height="56"></a></li>
    <li><a href="#contact">สถิติ</a></li>
    <li><a href="#about">เพิ่มข้อมูล</a></li>
    <li><a class="active" href="#home">แก้ไขข้อมูล</a></li>
    <li><a href="#about">โปรไฟล์</a></li>
    <li><a href="#about">แจ้งเตือน</a></li>
  </ul>
    
    <br>
    <br>
    <br>

    <center><form action="?Act=Add" method="post">
        <p>เลขบัตรประจำตัวประชาชน :  
        <input type="number" id="IDCard" name="IDCard" onkeyup="masks(IDCard)" onblur="return minInput(IDCard,13);" />
        <input type="submit" value="ค้นหา">
        </p>


    

        
</body>
</html>