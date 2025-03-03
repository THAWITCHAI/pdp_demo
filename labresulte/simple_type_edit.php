<?php include('../assets/html/header' . '.php'); ?>

<?php
mysqli_set_charset($conn, "utf8mb4");
$patient_id;

if (isset($_POST["from_edit"])) {
    mysqli_query(
        $conn,
        "
    UPDATE 
        `lab_sample_type` 
    SET
        `lab_sample_type` = '$_POST[lab_sample_type]' 
    WHERE (`lab_sample_type_id` = '$_GET[lab_sample_type_id]');
    "
    );
    header(sprintf("Location: %s", "simple_type.php"));

}
if (isset($_POST["from_add"])) {

    $sql = "INSERT INTO lab_sample_type (lab_sample_type) 
        VALUES (?)";

    // ใช้ Prepared Statement เพื่อป้องกัน SQL Injection
    $stmt = $conn->prepare($sql);
    $stmt->bind_param(
        "s",
        $_POST["lab_sample_type"]
    );
    $stmt->execute();
    $patient_id = $conn->insert_id;
    header(sprintf("Location: %s", "simple_type.php"));
    // ปิดการเชื่อมต่อ
    $stmt->close();
    $conn->close();
}
?>

<body>
    <div class="w-full h-screen">
        <?php include('../assets/html/navbar' . '.php'); ?>
        <div class="w-full h-fit flex justify-center items-start">
            <?php include('../assets/html/sidebar' . '.php'); ?>
            <div
                class="w-[86%] border-l border-gray-200 bg-white h-fit py-[0.5px] flex flex-col justify-start items-center">
                <div
                    class="w-full  h-[2.48rem] text-[14px] flex items-center hover:bg-[#fff] cursor-pointer p-2 bg-[#f8f8f8] border-y border-gray-200">
                    <a href="patient_add_universal.php" class="text-blue-600">Home</a>
                </div>
                <div class="w-full h-fit p-3">
                    <h1 class="text-xl text-blue-600 font-light mb-2">Simple Type <small
                            class="text-gray-500"><i class="fi fi-ts-angle-double-small-right"></i></small><small
                            class="px-2">
                            <?php if (isset($_GET["lab_sample_type_id"])) { ?>
                                Edit
                            <?php } else { ?>
                                Add
                            <?php } ?>
                        </small></h1>
                    <hr class="text-gray-300">
                </div>
                <?php if (isset($_GET["lab_sample_type_id"])) { ?>
                    <?php
                    $sql = "
SELECT 
    * 
FROM
    lab_sample_type 
WHERE
    lab_sample_type_id = '$_GET[lab_sample_type_id]'
";

                    $rs1 = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_assoc($rs1);
                    ?>
                    <form action="" method="POST"
                        class="p-2 w-[55%] flex flex-col justify-center items-center gap-5 text-[14px] text-gray-700 ">
                        <input hidden type="text" name="from_edit" value="from_edit">
                        <div class=" w-[70%] flex justify-center items-center gap-5">
                            <label for="" class="w-[30%] text-end">Lab Code :</label>
                            <input value="<?= $row["lab_sample_type"] ?>" required name="lab_sample_type" type="text"
                                class="border border-gray-200 w-full h-[2rem] outline-orange-500 outline-hidden focus:outline focus:border-none px-2">
                        </div>
                        <div class="w-[70%] flex justify-end items-center gap-5">
                            <button onclick="history.back()" type="button"
                                class="cursor-pointer px-3 py-1 text-white flex justify-center items-center bg-red-400 hover:bg-red-500 border border-red-600">ยกเลิก</button>
                            <button type="submit"
                                class="cursor-pointer px-3 py-1 text-white flex justify-center items-center bg-blue-400 hover:bg-blue-500 border border-blue-600">เพิ่มข้อมูล</button>
                        </div>
                    </form>
                <?php } else { ?>
                    <form method="post"
                        class="p-2 w-[55%] flex flex-col justify-center items-center gap-5 text-[14px] text-gray-700 ">
                        <input hidden type="text" name="from_add">
                        <div class="w-[70%] flex justify-center items-center gap-5">
                            <label for="" class="w-[30%] text-end">Lab Code :</label>
                            <input  name="lab_sample_type" type="text"
                                class="border border-gray-200 w-full h-[2rem] outline-orange-500 outline-hidden focus:outline focus:border-none px-2">
                        </div>
                        
                        <div class="w-[70%] flex justify-end items-center gap-5">
                            <button onclick="history.back()" type="button"
                                class="cursor-pointer px-3 py-1 text-white flex justify-center items-center bg-red-400 hover:bg-red-500 border border-red-600">ยกเลิก</button>
                            <button type="submit"
                                class="cursor-pointer px-3 py-1 text-white flex justify-center items-center bg-blue-400 hover:bg-blue-500 border border-blue-600">เพิ่มข้อมูล</button>
                        </div>
                    </form>
                <?php } ?>
            </div>
        </div>
    </div>
</body>

</html>