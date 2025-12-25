<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>ฟอร์มลงทะเบียนอบรม</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f5f5f5;
        }
        .container {
            width: 700px;
            margin: auto;
            background: #ffffff;
            padding: 20px;
            border-radius: 8px;
        }
        h2, h3 {
            text-align: center;
        }
        label {
            font-weight: bold;
        }
        input, select {
            width: 100%;
            padding: 6px;
            margin-top: 5px;
        }
        .inline input {
            width: auto;
        }
        .btn {
            background: #4CAF50;
            color: white;
            padding: 10px;
            border: none;
            width: 100%;
            font-size: 16px;
            cursor: pointer;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #999;
        }
        th {
            background: #eee;
        }
        th, td {
            padding: 8px;
            text-align: center;
        }
    </style>
</head>

<body>
<div class="container">

<h2>ฟอร์มลงทะเบียนอบรม</h2>

<form method="post">
    <label>ชื่อ-นามสกุล</label>
    <input type="text" name="fullname" required>

    <label>Email</label>
    <input type="email" name="email" required>

    <label>หัวข้ออบรม</label>
    <select name="course">
        <option value="AI สำหรับสำนักงาน">AI สำหรับสำนักงาน</option>
        <option value="Excel สำหรับการทำงาน">Excel สำหรับการทำงาน</option>
        <option value="การเขียนเว็บด้วย PHP">การเขียนเว็บด้วย PHP</option>
    </select>

    <label>อาหารที่ต้องการ</label>
    <div class="inline">
        <input type="checkbox" name="food[]" value="ปกติ"> ปกติ
        <input type="checkbox" name="food[]" value="มังสวิรัติ"> มังสวิรัติ
        <input type="checkbox" name="food[]" value="ฮาลาล"> ฮาลาล
    </div>

    <label>รูปแบบการเข้าร่วม</label>
    <div class="inline">
        <input type="radio" name="type" value="Onsite" required> Onsite
        <input type="radio" name="type" value="Online" required> Online
    </div>
    <br>

    <input type="submit" name="submit" value="ลงทะเบียน" class="btn">
</form>

<?php
if (isset($_POST['submit'])) {

    $fullname = $_POST['fullname'];
    $email    = $_POST['email'];
    $course   = $_POST['course'];
    $type     = $_POST['type'];

    // อาหาร
    if (isset($_POST['food'])) {
        $food = implode(", ", $_POST['food']);
    } else {
        $food = "ไม่ระบุ";
    }

    // คำนวณค่าลงทะเบียน
    if ($type == "Onsite") {
        $price = 1500;
    } else {
        $price = 800;
    }

    // บันทึกไฟล์
    $data = $fullname . "|" . $email . "|" . $course . "|" . $food . "|" . $type . "|" . $price . "\n";
    file_put_contents("register.txt", $data, FILE_APPEND);

    echo "<h3>ลงทะเบียนสำเร็จ</h3>";
    echo "ชื่อ: $fullname <br>";
    echo "อีเมล: $email <br>";
    echo "คอร์ส: $course <br>";
    echo "อาหาร: $food <br>";
    echo "รูปแบบ: $type <br>";
    echo "ค่าลงทะเบียน: " . number_format($price, 2) . " บาท<br>";
}
?>

<h3>รายชื่อผู้ลงทะเบียนทั้งหมด</h3>

<?php
if (file_exists("register.txt")) {
    $lines = file("register.txt");

    echo "<table>
            <tr>
                <th>ชื่อ</th>
                <th>Email</th>
                <th>คอร์ส</th>
                <th>อาหาร</th>
                <th>รูปแบบ</th>
                <th>ค่าลงทะเบียน</th>
            </tr>";

    foreach ($lines as $line) {
        list($name, $email, $course, $food, $type, $price) = explode("|", trim($line));
        echo "<tr>
                <td>$name</td>
                <td>$email</td>
                <td>$course</td>
                <td>$food</td>
                <td>$type</td>
                <td>" . number_format($price, 2) . "</td>
              </tr>";
    }
    echo "</table>";
}
?>

</div>
</body>
</html>
