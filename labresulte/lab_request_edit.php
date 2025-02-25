<?php include('../assets/html/header' . '.php'); ?>

<?php
$patient_id;
if ($_POST) {
    mysqli_set_charset($conn, "utf8mb4");

    $sql = "INSERT INTO patient (title, first_name, last_name, mobilephoneno, nationality_code, birth_date, idcard, email, gender, patient_remark, is_new_patient,create_date) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    // ใช้ Prepared Statement เพื่อป้องกัน SQL Injection
    $stmt = $conn->prepare($sql);
    $stmt->bind_param(
        "ssssssssssss",
        $_POST["title"],
        $_POST["first_name"],
        $_POST["last_name"],
        $_POST["mobilephoneno"],
        $_POST["nationality_code"],
        $_POST["birth_date"],
        $_POST["idcard"],
        $_POST["email"],
        $_POST["gender"],
        $_POST["patient_remark"],
        $_POST["is_new_patient"],
        $_POST["create_date"]


    );
    $stmt->execute();
    $patient_id = $conn->insert_id;
    header(sprintf("Location: %s", "appointment_form.php?patient_id=$patient_id"));
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
            <div class="w-[86%] border-l border-gray-200 bg-white h-fit py-[0.5px] flex flex-col justify-start items-center">
                <div class="w-full  h-[2.48rem] text-[14px] flex items-center hover:bg-[#fff] cursor-pointer p-2 bg-[#f8f8f8] border-y border-gray-200">
                    <a href="patient_add_universal.php" class="text-blue-600">Home</a>
                </div>
                <div class="w-full h-fit p-3">
                    <h1 class="text-xl text-blue-600 font-light mb-2">N-health Lab Request <small class="text-gray-500"><i class="fi fi-ts-angle-double-small-right"></i></small><small class="px-2">Edit</small></h1>
                    <hr class="text-gray-300">
                </div>
                <form method="post" class="p-2 w-[50%] flex flex-col justify-center items-center gap-5 text-[14px] text-gray-700">
                    <div class="w-[70%] flex justify-center items-center gap-5">
                        <label for="" class="w-[30%] text-end">Date :</label>
                        <input value="<?= date('Y-m-d') ?>" name="first_name" type="date" class="border border-gray-200 w-full h-[2rem] outline-orange-500 outline-hidden focus:outline focus:border-none px-2">
                    </div>
                    <div class="w-[70%] flex justify-center items-center gap-5">
                        <label for="" class="w-[30%] text-end">Time :</label>
                        <input value="<?= date("H:i:s") ?>" name="first_name" type="time" class="border border-gray-200 w-full h-[2rem] outline-orange-500 outline-hidden focus:outline focus:border-none px-2">
                    </div>

                    <div class="w-[70%] flex justify-end items-center gap-5">
                        <button onclick="history.back()" type="button" class="cursor-pointer px-3 py-1 text-white flex justify-center items-center bg-red-400 hover:bg-red-500 border border-red-600">ยกเลิก</button>
                        <button type="submit" class="cursor-pointer px-3 py-1 text-white flex justify-center items-center bg-blue-400 hover:bg-blue-500 border border-blue-600">เพิ่มข้อมูล</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>