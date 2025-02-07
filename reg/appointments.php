<?php
session_start();
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
    <title>PDP System - Rutnin Eye Hopital</title>
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>

</head>
<style>
    * {
        font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
    }
</style>

<body>
    <div class="w-full h-screen">
        <div class="w-full h-[10%] pl-4 justify-between flex items-center bg-[#438eb9]">
            <p class="text-white font-medium text-lg">PDP System Rutnin-Eye Hopital</p>
            <div class="relative bg-[#62a8d1] w-[10rem] h-full flex justify-between gap-1 items-center px-2">
                <div class="w-1/2 h-full flex justify-center items-center">
                    <img src="../assets/images/user_white.png" width="40" height="40" alt="">
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

        <div class="w-full h-[90%] flex justify-center items-center">

            <div class="w-[14%] bg-white border-gray-200 border-x h-full text-[#616161] py-[0.5px]">
                <div class="w-full h-[2.5rem] text-[14px] flex items-center hover:bg-[#fff] cursor-pointer p-2 bg-[#f8f8f8] ring-1 ring-gray-200">
                    Appointment
                </div>
                <ul class="w-full h-[2.5rem] text-[14px] flex items-center hover:bg-blue-50 px-10 cursor-pointer p-2 bg-[#fff] ring-1 ring-gray-200">
                    <li>
                        <a href="#">Appointments</a>
                    </li>
                </ul>
            </div>

            <div class="w-[86%] bg-white h-full py-[0.5px]">
                <div class="w-full  h-[2.49rem] text-[14px] flex items-center hover:bg-[#fff] cursor-pointer p-2 bg-[#f8f8f8] ring-1 ring-gray-200">
                    <a href="#" class="text-blue-600">Home</a>
                </div>
                <div class="w-full h-fit p-3">
                    <h1 class="text-xl text-blue-600 font-light mb-2">Appointment</h1>
                    <hr class="text-gray-300">
                    <div class="w-full p-2 ring-1 ring-gray-400 my-5 flex flex-col justify-center items-center gap-2">
                        <h1 class="w-full p-2 bg-[linear-gradient(to bottom,#ffffff 0%,#eeeeee 100%)] text-blue-500 shadow-xs">Search</h1>
                        <div class="w-full flex gap-10 justify-center items-center p-2">
                            <input placeholder="กรุณากรอก" type="text" class="text-sm ring-1 ring-gray-300 h-[2rem] outline-none px-2 rounede-xs  w-full">
                            <input placeholder="กรุณากรอก" type="text" class="text-sm ring-1 ring-gray-300 h-[2rem] outline-none px-2 rounede-xs  w-full">
                            <input placeholder="กรุณากรอก" type="text" class="text-sm ring-1 ring-gray-300 h-[2rem] outline-none px-2 rounede-xs  w-full">
                            <input placeholder="กรุณากรอก" type="text" class="text-sm ring-1 ring-gray-300 h-[2rem] outline-none px-2 rounede-xs  w-full">
                        </div>
                        <div class="w-full flex gap-10 justify-center items-center p-2">
                            <input placeholder="กรุณากรอก" type="text" class="text-sm ring-1 ring-gray-300 h-[2rem] outline-none px-2 rounede-xs  w-full">
                            <input placeholder="กรุณากรอก" type="text" class="text-sm ring-1 ring-gray-300 h-[2rem] outline-none px-2 rounede-xs  w-full">
                            <input placeholder="กรุณากรอก" type="text" class="text-sm ring-1 ring-gray-300 h-[2rem] outline-none px-2 rounede-xs  w-full">
                            <input placeholder="กรุณากรอก" type="text" class="text-sm ring-1 ring-gray-300 h-[2rem] outline-none px-2 rounede-xs  w-full">
                        </div>
                        <div class="w-full flex gap-10 justify-start items-center p-2">
                            <input placeholder="กรุณากรอก" type="text" class="text-sm ring-1 ring-gray-300 h-[2rem] outline-none px-2 rounede-xs  w-[22.3%]">
                            <input placeholder="กรุณากรอก" type="text" class="text-sm ring-1 ring-gray-300 h-[2rem] outline-none px-2 rounede-xs  w-[22.3%]">
                        </div>
                        <div class="w-full flex gap-10 justify-end items-center p-2">
                            <input type="button" value="Reset" class="border w-[15.3%]">
                            <input type="button" value="Search" class="border w-[15.3%]">
                        </div>
                    </div>
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