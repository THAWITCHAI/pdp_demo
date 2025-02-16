<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: ../auth/login.php");
    exit();
}
?>
<?php require_once('../Connected/connect.php'); ?>
<?php include('../assets/html/header' . '.php'); ?>

<?php
mysqli_set_charset($conn, "utf8mb4");
$rs1;

if ($_GET) {
    $rs1 = mysqli_query($conn, "SELECT 
    *
FROM
    appointment_type
WHERE
    appointment_type LIKE '%$_GET[appointment_type]%';");
} else {
    $rs1 = mysqli_query($conn, "SELECT * FROM appointment_type;");
}
?>

<body>
    <div class="w-full h-screen">
        <?php include('../assets/html/navbar' . '.php'); ?>
        <div class="w-full h-[93%] flex justify-center items-center">
            <?php include('../assets/html/sidebar' . '.php'); ?>
            <div class="w-[86%] bg-white h-full py-[0.5px] border-l border-gray-200">
                <div class="w-full  h-[2.48rem] text-[14px] flex items-center hover:bg-[#fff] cursor-pointer p-2 bg-[#f8f8f8] border-y border-gray-200">
                    <a href="patient_add_universal.php" class="text-blue-600">Home</a>
                </div>
                <div class="w-full h-fit p-3">
                    <h1 class="text-xl text-blue-600 font-light mb-2">Appointment Type</h1>
                    <hr class="text-gray-300">
                    <form method="GET" class="w-full p-2 ring-1 ring-gray-300 my-5 flex flex-col justify-center items-center gap-2">
                        <h1 class="w-full p-2 bg-[linear-gradient(to bottom,#ffffff 0%,#eeeeee 100%)] text-blue-500 shadow-xs">Search</h1>
                        <div class="w-full flex gap-10 justify-start items-center p-2">
                            <?php if ($_GET) { ?>
                                <input value="<?= $_GET["appointment_type"] ?>" name="appointment_type" placeholder="Name" type="text" class="text-sm h-[2rem] outline-none px-2 rounede-xs border border-gray-300 w-1/4">
                            <?php } else { ?>
                                <input value="" name="appointment_type" placeholder="Name" type="text" class="text-sm h-[2rem] outline-none px-2 rounede-xs border border-gray-300 w-1/4">
                            <?php } ?>
                        </div>
                        <div class="w-full flex gap-10 justify-end items-center p-2">
                            <button type="submit" class="text-sm border border-blue-600 w-[12.3%] h-[2rem] rounded-xs bg-blue-400 shadow-lg hover:bg-blue-600 cursor-pointer text-white">Search</button>
                            <button type="reset" class="text-[14px] w-[12.3%] border border-red-600 h-[2rem] rounded-xs bg-red-400 shadow-lg hover:bg-red-700 cursor-pointer text-white"><a class="w-full h-full" href="appointment_type.php">Reset</a></button>
                        </div>
                    </form>
                    <div class="w-full my-2 h-fit">
                        <button class="bg-green-400 hover:bg-green-500 px-4 py-2 text-sm text-white border border-green-600 cursor-pointer"><a href="appointment_type_edit.php">Add New</a></button>
                    </div>
                    <div class="border border-gray-200 h-fit w-full">
                        <div class="w-full h-[15rem] overflow-y-scroll">
                            <div class="relative w-full ">
                                <table class="w-full  text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                    <thead class="bg-gray-100 shadow-sm text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                        <tr class="">
                                            <th scope="col" class="px-5 py-4 border border-gray-300 ">Appointment Type</th>
                                            <th scope="col" class="px-5 py-4 border-y border-gray-300 ">ใช้ในการคำนวน</th>
                                            <th scope="col" class="px-1 py-4 border border-gray-300 ">สร้าง slot ใหม่ แยกจาก slot หลัก</th>
                                            <th scope="col" class="px-5 py-4 border-y border-gray-300 ">สัดส่วนการใช้ Slot</th>
                                            <th scope="col" class="px-5 py-4 border-y border-gray-300 "></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if (!$rs1) {
                                            die("Query failed: " . mysqli_error($conn));
                                        }
                                        ?>
                                        <?php if (mysqli_num_rows($rs1) > 0) { ?>
                                            <? while ($row = mysqli_fetch_assoc($rs1)) { ?>
                                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">

                                                    <td class="px-5 py-4 border border-gray-300">
                                                        <?= $row['appointment_type'] ?>
                                                    </td>
                                                    <td class="px-5 py-4 text-center border-x border-gray-300">
                                                        <? if ($row['is_calculate'] == "N") { ?>
                                                            <span class="rounded-x rounded-[5px] text-center bg-red-400 px-5 py-1 text-white">No</span>
                                                        <? } else { ?>
                                                            <span class="rounded-x rounded-[5px] text-center bg-green-400 px-5 py-1 text-white">Yes</span>
                                                        <? } ?>
                                                    </td>
                                                    <td class="px-5 py-4 text-center">
                                                        <? if ($row['can_insert'] == "N") { ?>
                                                            <span class="rounded-x rounded-[5px] text-center bg-red-400 px-5 py-1 text-white">No</span>
                                                        <? } else { ?>
                                                            <span class="rounded-x rounded-[5px] text-center bg-green-400 px-5 py-1 text-white">Yes</span>
                                                        <? } ?>
                                                    </td>
                                                    <td class="px-5 py-4 text-center border-l border-gray-200">
                                                        <?php echo $row['slot_ratio']; ?>%
                                                    </td>
                                                    <td class="px-5 py-4 border-l border-r border-gray-300 gap-2 flex justify-center items-center">
                                                        <a href="./appointment_type_del.php?appointment_type_id=<?= $row['appointment_type_id'] ?>">
                                                            <button class="rounded-[5px] border border-red-600 hover:bg-red-600 text-[14px] px-2 py-1 bg-red-400 text-white cursor-pointer">Delete</button>
                                                        </a>
                                                        <a href="./appointment_type_update.php?appointment_type_id=<?= $row['appointment_type_id'] ?>">
                                                            <button class="rounded-[5px] border border-yellow-600 hover:bg-yellow-600 text-[14px] px-2 py-1 bg-yellow-400 text-white cursor-pointer">Edit</button>
                                                        </a>
                                                    </td>
                                                </tr>
                                            <? } ?>
                                        <?php } else { ?>
                                            <tr>
                                                <td colspan="5" class="text-center py-4">No Appointment Type found.</td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>


</html>