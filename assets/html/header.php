<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['username'])) {
    header("Location: ../auth/login.php");
    exit();
}
?>

<?php require_once('../Connected/connect.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>W&Y System - Amphetamine</title>
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.6.0/uicons-thin-straight/css/uicons-thin-straight.css'>
</head>
<style>
    * {
        font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
    }
</style>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const tabs = document.querySelectorAll(".tab-link");
        const contents = document.querySelectorAll(".tab-content");

        tabs.forEach(tab => {
            tab.addEventListener("click", function () {
                // ลบ active ออกจากแท็บทั้งหมด
                tabs.forEach(t => t.classList.remove("bg-white", "border-t", "border-l", "border-r"));
                contents.forEach(c => c.classList.add("hidden"));

                // เพิ่ม active ให้แท็บที่คลิก
                this.classList.add("bg-white", "border-t", "border-l", "border-r");

                // แสดงเนื้อหาที่เกี่ยวข้อง
                const tabId = this.getAttribute("data-tab");
                document.getElementById(tabId).classList.remove("hidden");
            });
        });

        // ตั้งค่าให้แสดงแท็บแรกเป็นค่าเริ่มต้น
        tabs[0].classList.add("bg-white", "border-t", "border-l", "border-r");
        contents[0].classList.remove("hidden");
    });
</script>