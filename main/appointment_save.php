<?php 
include('../assets/html/header.php'); 
$reg_status = "late";
// ตรวจสอบว่ามีการเชื่อมต่อฐานข้อมูลหรือไม่
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// ตั้งค่าการเข้ารหัสเป็น UTF-8
mysqli_set_charset($conn, "utf8mb4");

// SQL Query
$sql = "INSERT INTO appointment (
    appointment_type_id, procedure_template_id, specialty_id, procedure_item_id, 
    doctor_id, department_id, first_date, week_tolerance, location_id,patient_id, reg_status
) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

// ตรวจสอบว่า prepare สำเร็จหรือไม่
$stmt = $conn->prepare($sql);
if (!$stmt) {
    die("SQL Prepare Failed: " . $conn->error);
}

// กำหนดชนิดข้อมูล
$stmt->bind_param(
    "iiiiiiisii",  // i = int, s = string
    $_POST["appointment_type_id"],
    $_POST["procedure_template_id"],
    $_POST["specialty_id"],
    $_POST["procedure_item_id"],
    $_POST["doctor_id"],
    $_POST["department_id"],
    $_POST["appointment_date"],
    $_POST["week_tolerance"],
    $_POST["location_id"],
    $_POST["patient_id"],
    $reg_status
);

// Execute SQL และตรวจสอบข้อผิดพลาด
if ($stmt->execute()) {
    // ใช้ Location: เพื่อ Redirect ไปหน้าอื่น
    header("Location: ./patient_add_universal.php");
    exit(); // ป้องกันการรันโค้ดต่อหลัง Redirect
} else {
    echo "เกิดข้อผิดพลาด: " . $stmt->error;
}

// ปิดการเชื่อมต่อ
$stmt->close();
$conn->close();
?>
