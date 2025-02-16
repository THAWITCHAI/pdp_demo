<?php
    // session_start();
if (!isset($_SESSION['username'])) {
    header("Location: ../auth/login.php");
    exit();
}
?>
<div class="w-full h-[7%] pl-4 justify-between flex items-center bg-[#438eb9]">
    <p class="text-white font-medium text-lg">PDP System Rutnin-Eye Hopital</p>
    <div class="relative bg-[#62a8d1] w-[10rem] h-full flex justify-between gap-1 items-center px-2">
        <div class="w-1/2 h-full flex justify-center items-center">
            <img src="../assets/images/user_white.png" width="40" height="40" alt="">
        </div>
        <div class="w-full text-[14px] text-white uppercase relative">
            <button id="dropdownButton" class="focus:outline-none uppercase cursor-pointer flex justify-center items-center overflow-hidden">
                <?= $_SESSION['username'] ?>
            </button>

            <!-- Dropdown -->
            <div id="dropdownMenu" class="hidden absolute right-0 mt-2 w-36 bg-white shadow-lg rounded-lg py-2">
                <a href="../auth/logout.php" class="block px-4 py-2 text-gray-700 hover:bg-gray-200">ออกจากระบบ</a>
            </div>
        </div>
    </div>
</div>


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