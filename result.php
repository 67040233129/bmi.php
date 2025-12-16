<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>ผลการคำนวณ BMI</title>
    <style>
        body {
            font-family: Tahoma, sans-serif;
            background: linear-gradient(to right, #74ebd5, #9face6);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background: #ffffff;
            width: 400px;
            padding: 25px;
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.2);
            text-align: center;
        }
        h2 {
            color: #333;
            margin-bottom: 20px;
        }
        .result {
            font-size: 16px;
            margin: 10px 0;
        }
        .bmi {
            font-size: 22px;
            font-weight: bold;
            color: #007bff;
            margin: 15px 0;
        }
        .advice {
            background: #f1f1f1;
            padding: 10px;
            border-radius: 10px;
            margin-top: 15px;
            color: #444;
        }
        a {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 10px;
        }
        a:hover {
            background: #0056b3;
        }
    </style>
</head>
<body>
<div class="container">
<?php

$weight = $_POST['weight'];
$height = $_POST['height'];


function calculateBMI($weight, $height) {
    $heightMeter = $height / 100;
    return $weight / ($heightMeter * $heightMeter);
}


function getBMIResult($bmi) {
    if ($bmi < 18.5) {
        return ["น้ำหนักน้อย / ผอม", "ควรรับประทานอาหารให้เพียงพอและมีประโยชน์"];
    } elseif ($bmi < 23) {
        return ["น้ำหนักปกติ", "รักษาสุขภาพด้วยการออกกำลังกายสม่ำเสมอ"];
    } elseif ($bmi < 25) {
        return ["น้ำหนักเกิน", "ควรควบคุมอาหารและออกกำลังกาย"];
    } elseif ($bmi < 30) {
        return ["อ้วนระดับ 1", "ควรลดน้ำหนักอย่างจริงจังเพื่อสุขภาพ"];
    } else {
        return ["อ้วนระดับ 2", "เสี่ยงต่อโรค ควรพบแพทย์หรือผู้เชี่ยวชาญ"];
    }
}

$bmi = calculateBMI($weight, $height);
list($result, $advice) = getBMIResult($bmi);


echo "<h2>ผลการคำนวณ BMI</h2>";
echo "<div class='result'>น้ำหนัก: <b>$weight</b> กิโลกรัม</div>";
echo "<div class='result'>ส่วนสูง: <b>$height</b> เซนติเมตร</div>";
echo "<div class='bmi'>BMI = " . number_format($bmi, 2) . "</div>";
echo "<div class='result'><b>ผลลัพธ์:</b> $result</div>";
echo "<div class='advice'><b>คำแนะนำ:</b><br>$advice</div>";
?>
    <a href="form.html">🔁 คำนวณใหม่</a>
</div>
</body>
</html>
