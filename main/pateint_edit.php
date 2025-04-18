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
<script src="https://cdn.tailwindcss.com"></script>
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
                    <h1 class="text-xl text-blue-600 font-light mb-2">Pateint <small class="text-gray-500"><i class="fi fi-ts-angle-double-small-right"></i></small><small class="px-2">Add</small></h1>
                    <hr class="text-gray-300">
                </div>
                <form method="post" class="p-2 w-[50%] flex flex-col justify-center items-center gap-5 text-[14px] text-gray-700">
                    <div class="w-[70%] flex justify-center items-center gap-5">
                        <label for="" class="w-[30%] text-end">Title :</label>
                        <select name="title" required class="border border-gray-200 w-full h-[2rem] outline-orange-500 outline-hidden focus:outline focus:border-none px-2">
                            <option value="">กรูณาเลือก</option>
                            <option value="นาย">นาย</option>
                            <option value="นาง">นาง</option>
                            <option value="นางสาว">นางสาว</option>
                            <option value="เด็กหญิง">เด็กหญิง</option>
                            <option value="เด็กชาย">เด็กชาย</option>
                            <option value="คุณ">คุณ</option>
                        </select>
                    </div>
                    <div class="w-[70%] flex justify-center items-center gap-5">
                        <label for="" class="w-[30%] text-end">First Name :</label>
                        <input required name="first_name" type="text" class="border border-gray-200 w-full h-[2rem] outline-orange-500 outline-hidden focus:outline focus:border-none px-2">
                    </div>
                    <div class="w-[70%] flex justify-center items-center gap-5">
                        <label for="" class="w-[30%] text-end">Last Name :</label>
                        <input name="last_name" required type="text" class="border border-gray-200 w-full h-[2rem] outline-orange-500 outline-hidden focus:outline focus:border-none px-2">
                    </div>
                    <div class="w-[70%] flex justify-center items-center gap-5">
                        <label for="" class="w-[30%] text-end">Moblie :</label>
                        <input name="mobilephoneno" required type="text" class="border border-gray-200 w-full h-[2rem] outline-orange-500 outline-hidden focus:outline focus:border-none px-2">
                    </div>
                    <div class="w-[70%] flex justify-center items-center gap-5">
                        <label for="" class="w-[30%] text-end">Nationality :</label>
                        <input name="nationality_code" required type="text" class="border border-gray-200 w-full h-[2rem] outline-orange-500 outline-hidden focus:outline focus:border-none px-2">
                    </div>
                    <div class="w-[70%] flex justify-center items-center gap-5">
                        <label for="" class="w-[30%] text-end">Birth Date :</label>
                        <input name="birth_date" required type="date" class="border border-gray-200 w-full h-[2rem] outline-orange-500 outline-hidden focus:outline focus:border-none px-2">
                    </div>
                    <div class="w-[70%] flex justify-center items-center gap-5">
                        <label for="" class="w-[30%] text-end">ID Card :</label>
                        <input name="idcard" required type="text" class="border border-gray-200 w-full h-[2rem] outline-orange-500 outline-hidden focus:outline focus:border-none px-2">
                    </div>
                    <div class="w-[70%] flex justify-center items-center gap-5">
                        <label for="" class="w-[30%] text-end">Email :</label>
                        <input name="email" required type="text" class="border border-gray-200 w-full h-[2rem] outline-orange-500 outline-hidden focus:outline focus:border-none px-2">
                    </div>
                    <div class="w-[70%] flex justify-center items-center gap-5">
                        <label for="" class="w-[30%] text-end">Gender :</label>
                        <select name="gender" required class="border border-gray-200 w-full h-[2rem] outline-orange-500 outline-hidden focus:outline focus:border-none px-2">
                            <option value="">ไม่ระบุ</option>
                            <option value="1">ชาย</option>
                            <option value="2">หญิง</option>
                        </select>
                    </div>
                    <input type="text" value="Y" name="is_new_patient" hidden>
                    <input type="text" value="<?=date("Y-m:d")?>" name="create_date" hidden>
                    <div class="w-[70%] flex justify-center items-center gap-5">
                        <label for="" class="w-[30%] text-end">Remark :</label>
                        <textarea name="patient_remark" id="" class="border border-gray-200 w-full py-2 outline-orange-500 outline-hidden focus:outline focus:border-none px-2"></textarea>
                    </div>
                    <div class="w-[70%] flex justify-end items-center gap-5">
                        <button type="submit" class="cursor-pointer px-3 py-1 text-white flex justify-center items-center bg-blue-400 hover:bg-blue-500 border border-blue-600">เพิ่มข้อมูล</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>