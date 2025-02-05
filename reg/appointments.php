<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: ../auth/login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment</title>
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>

</head>
<style>
    * {
        font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
    }
</style>

<body class="w-full min-h-screen">
    <div class="w-full h-[4rem] px-4 py-2 justify-between flex items-center bg-blue-400">
        <p class="text-white font-medium text-lg">PDP System Rutnin-Eye Hopital</p>
        <div class="relative bg-blue-300 w-[10rem] h-full flex justify-between gap-1 items-center px-2">
            <div class="w-1/2 h-full flex justify-center items-center">
                <img src="../assets/images/user.png" width="40" height="40" alt="">
            </div>

            <div class="w-1/2 text-white uppercase relative">
                <button id="dropdownButton" class="focus:outline-none uppercase cursor-pointer">
                    <?= $_SESSION['username'] ?>
                </button>

                <!-- Dropdown -->
                <div id="dropdownMenu" class="hidden absolute right-0 mt-2 w-36 bg-white shadow-lg rounded-lg py-2">
                    <a href="../auth/logout.php" class="block px-4 py-2 text-gray-700 hover:bg-gray-200">ออกจากระบบ</a>
                </div>
            </div>
        </div>
    </div>
</body>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const dropdownButton = document.getElementById("dropdownButton");
        const dropdownMenu = document.getElementById("dropdownMenu");

        dropdownButton.addEventListener("click", function(event) {
            dropdownMenu.classList.toggle("hidden");
            event.stopPropagation();
        });

        document.addEventListener("click", function() {
            dropdownMenu.classList.add("hidden");
        });
    });
</script>

</html>