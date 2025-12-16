<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>คำนวณ BMI</title>
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
        input {
            width: 80%;
            padding: 8px;
            margin: 5px 0;
        }
        button {
            width: 50%;
            padding: 10px;
            margin-top: 15px;
            background: #007bff;
            color: #fff;
            border: none;
            border-radius: 10px;
            cursor: pointer;
        }
        button:hover {
            background: #0056b3;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>แบบฟอร์มคำนวณ BMI</h2>
    <form action="result.php" method="post">
        น้ำหนัก (กิโลกรัม)<br>
        <input type="number" name="weight" step="0.1" required><br>
        ส่วนสูง (เซนติเมตร)<br>
        <input type="number" name="height" step="0.1" required><br>
        <button type="submit">คำนวณ BMI</button>
    </form>
</div>
</body>
</html>
