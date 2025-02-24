<?php include('../assets/html/header' . '.php'); ?>

<?php
$patient_id;
if ($_POST) {
    mysqli_set_charset($conn, "utf8mb4");

    $sql = "INSERT INTO patient (title, first_name, last_name, mobilephoneno, nationality_code, birth_date, idcard, email, gender, patient_remark) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    // ใช้ Prepared Statement เพื่อป้องกัน SQL Injection
    $stmt = $conn->prepare($sql);
    $stmt->bind_param(
        "ssssssssss",
        $_POST["title"],
        $_POST["first_name"],
        $_POST["last_name"],
        $_POST["mobilephoneno"],
        $_POST["nationality_code"],
        $_POST["birth_date"],
        $_POST["idcard"],
        $_POST["email"],
        $_POST["gender"],
        $_POST["patient_remark"]
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
                    <h1 class="text-xl text-blue-600 font-light mb-2">Pateint </h1>
                    <hr class="text-gray-300">
                </div>
                <form method="post" class="p-2 w-full flex flex-col justify-center items-center gap-5 text-[14px] text-gray-700">
                    <div class="w-full grid grid-cols-4 gap-5">
                        <div class="w-[100%] flex justify-center items-center gap-5">
                            <label for="" class="w-[30%] text-end">คำนำหน้า :</label>
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
                        <div class="w-[100%] flex justify-center items-center gap-5">
                            <label for="" class="w-[30%] text-end">ชื่อ :</label>
                            <input required name="first_name" type="text" class="border border-gray-200 w-full h-[2rem] outline-orange-500 outline-hidden focus:outline focus:border-none px-2">
                        </div>
                        <div class="w-[100%] flex justify-center items-center gap-5">
                            <label for="" class="w-[30%] text-end">นามสกุล :</label>
                            <input name="last_name" required type="text" class="border border-gray-200 w-full h-[2rem] outline-orange-500 outline-hidden focus:outline focus:border-none px-2">
                        </div>
                        <div class="w-[100%] flex justify-center items-center gap-5">
                            <label for="" class="w-[30%] text-end">ชื่อเล่น :</label>
                            <input name="mobilephoneno" required type="text" class="border border-gray-200 w-full h-[2rem] outline-orange-500 outline-hidden focus:outline focus:border-none px-2">
                        </div>
                        <div class="w-[100%] flex justify-center items-center gap-5">
                            <label for="" class="w-[30%] text-end">Birth Date :</label>
                            <input name="birth_date" required type="date" class="border border-gray-200 w-full h-[2rem] outline-orange-500 outline-hidden focus:outline focus:border-none px-2">
                        </div>
                        <div class="w-[100%] flex justify-center items-center gap-5">
                            <label for="" class="w-[30%] text-end">เพศ :</label>
                            <select name="gender" required class="border border-gray-200 w-full h-[2rem] outline-orange-500 outline-hidden focus:outline focus:border-none px-2">
                                <option value="">ไม่ระบุ</option>
                                <option value="1">ชาย</option>
                                <option value="2">หญิง</option>
                            </select>
                        </div>
                        <div class="w-[100%] flex justify-center items-center gap-5">
                            <label for="" class="w-[30%] text-end">ศาสนา :</label>
                            <select name="gender" required class="border border-gray-200 w-full h-[2rem] outline-orange-500 outline-hidden focus:outline focus:border-none px-2">
                                <option value="">ไม่ระบุ</option>
                                <option value="1">ชาย</option>
                                <option value="2">หญิง</option>
                            </select>
                        </div>
                        <div class="w-[100%] flex justify-center items-center gap-5">
                            <label for="" class="w-[30%] text-end">สถานะ :</label>
                            <select name="gender" required class="border border-gray-200 w-full h-[2rem] outline-orange-500 outline-hidden focus:outline focus:border-none px-2">
                                <option value="">ไม่ระบุ</option>
                                <option value="1">ชาย</option>
                                <option value="2">หญิง</option>
                            </select>
                        </div>
                        <div class="w-[100%] flex justify-center items-center gap-5">
                            <label for="" class="w-[30%] text-end">เลขที่บัตรประชน :</label>
                            <input name="birth_date" required type="date" class="border border-gray-200 w-full h-[2rem] outline-orange-500 outline-hidden focus:outline focus:border-none px-2">
                        </div>
                        <div class="w-[100%] flex justify-center items-center gap-5">
                            <label for="" class="w-[30%] text-end">สัญชาติ :</label>
                            <select name="gender" required class="border border-gray-200 w-full h-[2rem] outline-orange-500 outline-hidden focus:outline focus:border-none px-2">
                                <option value="">ไม่ระบุ</option>
                                <option value="1">ชาย</option>
                                <option value="2">หญิง</option>
                            </select>
                        </div>
                        <div class="w-[100%] flex justify-center items-center gap-5">
                            <label for="" class="w-[30%] text-end">เชื่้อชาติ :</label>
                            <select name="gender" required class="border border-gray-200 w-full h-[2rem] outline-orange-500 outline-hidden focus:outline focus:border-none px-2">
                                <option value="">ไม่ระบุ</option>
                                <option value="1">ชาย</option>
                                <option value="2">หญิง</option>
                            </select>
                        </div>
                        <div class="w-[100%] flex justify-center items-center gap-5">
                            <label for="" class="w-[30%] text-end">หนังสื่อเดินทาง :</label>
                            <select name="gender" required class="border border-gray-200 w-full h-[2rem] outline-orange-500 outline-hidden focus:outline focus:border-none px-2">
                                <option value="">ไม่ระบุ</option>
                                <option value="1">ชาย</option>
                                <option value="2">หญิง</option>
                            </select>
                        </div>
                        <div class="w-[100%] flex justify-center items-center gap-5">
                            <label for="" class="w-[30%] text-end">Doctor :</label>
                            <select name="gender" required class="border border-gray-200 w-full h-[2rem] outline-orange-500 outline-hidden focus:outline focus:border-none px-2">
                                <option value="">ไม่ระบุ</option>
                                <option value="1">ชาย</option>
                                <option value="2">หญิง</option>
                            </select>
                        </div>
                        <div class="w-[100%] flex justify-center items-center gap-5">
                            <label for="" class="w-[30%] text-end">Patient Type :</label>
                            <select name="gender" required class="border border-gray-200 w-full h-[2rem] outline-orange-500 outline-hidden focus:outline focus:border-none px-2">
                                <option value="">ไม่ระบุ</option>
                                <option value="1">ชาย</option>
                                <option value="2">หญิง</option>
                            </select>
                        </div>
                    </div>
                    <h1 class="text-[20px] text-blue-600 w-full text-start">ข้อมูลที่อยู่</h1>
                    <div class="w-full grid grid-cols-4 gap-5 w-full">
                        <div class="w-[100%] flex justify-center items-center gap-5">
                            <label for="" class="w-[30%] text-end">จังหวัด :</label>
                            <input name="birth_date" required type="date" class="border border-gray-200 w-full h-[2rem] outline-orange-500 outline-hidden focus:outline focus:border-none px-2">
                        </div>
                        <div class="w-[100%] flex justify-center items-center gap-5">
                            <label for="" class="w-[30%] text-end">บ้านเลขที่ :</label>
                            <input name="birth_date" required type="date" class="border border-gray-200 w-full h-[2rem] outline-orange-500 outline-hidden focus:outline focus:border-none px-2">
                        </div>
                        <div class="w-[100%] col-span-2 flex justify-center items-center gap-5">
                            <label for="" class="w-[30%] text-end">ตำบล/อำเภอ/จังหวัด :</label>
                            <input name="birth_date" required type="text" class="border border-gray-200 w-full h-[2rem] outline-orange-500 outline-hidden focus:outline focus:border-none px-2">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>