<?php include('../assets/html/header' . '.php'); ?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    mysqli_set_charset($conn, "utf8mb4");
    $patient_id = $_POST['patient_id'];
    $title = $_POST['title'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $nick_name = $_POST['nick_name'];
    $birth_date = $_POST['birth_date'];
    $gender = $_POST['gender'];
    $religion = $_POST['reiigion']; // มีการสะกดผิดจากฟอร์ม ควรเปลี่ยนเป็น religion
    $marital_status = $_POST['maritalstatus'];
    $idcard = $_POST['idcard'];
    $nationality_code = $_POST['nationality_code'];
    $race_code = $_POST['race_code'];
    $ref_passport = $_POST['ref_passport'];
    $patient_type = $_POST['patient_type'];
    $address = $_POST['address'];
    $hn = "6".(date("ymd")+date('His'));

    $sql = "UPDATE patient SET
                hn = $hn,
                title = '$title',
                first_name = '$first_name',
                last_name = '$last_name',
                nick_name = '$nick_name',
                birth_date = '$birth_date',
                gender = '$gender',
                reiigion = '$religion',
                maritalstatus = '$marital_status',
                idcard = '$idcard',
                nationality_code = '$nationality_code',
                race_code = '$race_code',
                ref_passport = '$ref_passport',
                patient_type = '$patient_type',
                address = '$address'
            WHERE patient_id = '$patient_id'";

    if (mysqli_query($conn, $sql)) {
        $d = date("Ymd"."-"."$patient_id");
        echo $d;
        mysqli_query($conn, "UPDATE appointment 
        SET 
            reg_status = 'Visited',
            appointmentno = '$d'
        WHERE
            patient_id = '$patient_id';");

        header("Location: ./vn_add.php?patient_id=$patient_id");
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<?php
mysqli_set_charset($conn, "utf8mb4");
$sql = "
SELECT
    *
FROM
    patient t1
LEFT OUTER JOIN appointment t2 ON t1.patient_id = t2.patient_id
LEFT OUTER JOIN doctor t3 ON t3.doctor_id = t2.doctor_id
WHERE
    t1.patient_id = $_GET[patient_id]
";
$rs1 = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($rs1);

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
                <form action="" method="POST" class="p-2 w-full flex flex-col justify-center items-center gap-5 text-[14px] text-gray-700">
                    <div class="w-full grid grid-cols-4 gap-5">
                        <div class="w-[100%] flex justify-center items-center gap-5">
                            <label for="" class="w-[30%] text-end">คำนำหน้า :</label>
                            <select name="title" class="border border-gray-200 w-full h-[2rem] outline-orange-500 outline-hidden focus:outline focus:border-none px-2">
                                <option value="">กรูณาเลือก</option>
                                <option <?= $row["title"] == "นาย" ? "selected" : "" ?> value="นาย">นาย</option>
                                <option <?= $row["title"] == "นาง" ? "selected" : "" ?> value="นาง">นาง</option>
                                <option <?= $row["title"] == "นางสาว" ? "selected" : "" ?> value="นางสาว">นางสาว</option>
                                <option <?= $row["title"] == "เด็กหญิง" ? "selected" : "" ?> value="เด็กหญิง">เด็กหญิง</option>
                                <option <?= $row["title"] == "เด็กชาย" ? "selected" : "" ?> value="เด็กชาย">เด็กชาย</option>
                                <option <?= $row["title"] == "คุณ" ? "selected" : "" ?> value="คุณ">คุณ</option>
                            </select>
                        </div>
                        <input hidden type="text" name="patient_id" value="<?= $_GET["patient_id"] ?>">
                        <div class="w-[100%] flex justify-center items-center gap-5">
                            <label for="" class="w-[30%] text-end">ชื่อ :</label>
                            <input value="<?= $row['first_name'] ?>" name="first_name" type="text" class="border border-gray-200 w-full h-[2rem] outline-orange-500 outline-hidden focus:outline focus:border-none px-2">
                        </div>
                        <div class="w-[100%] flex justify-center items-center gap-5">
                            <label for="" class="w-[30%] text-end">นามสกุล :</label>
                            <input value="<?= $row['last_name'] ?>" name="last_name" type="text" class="border border-gray-200 w-full h-[2rem] outline-orange-500 outline-hidden focus:outline focus:border-none px-2">
                        </div>
                        <div class="w-[100%] flex justify-center items-center gap-5">
                            <label for="" class="w-[30%] text-end">ชื่อเล่น :</label>
                            <input value="<?= $row['nick_name'] ?>" name="nick_name" type="text" class="border border-gray-200 w-full h-[2rem] outline-orange-500 outline-hidden focus:outline focus:border-none px-2">
                        </div>
                        <div class="w-[100%] flex justify-center items-center gap-5">
                            <label for="" class="w-[30%] text-end">Birth Date :</label>
                            <input value="<?= $row['birth_date'] ?>" name="birth_date" type="date" class="border border-gray-200 w-full h-[2rem] outline-orange-500 outline-hidden focus:outline focus:border-none px-2">
                        </div>

                        <div class="w-[100%] flex justify-center items-center gap-5">
                            <label for="" class="w-[30%] text-end">เพศ :</label>
                            <select name="gender" class="border border-gray-200 w-full h-[2rem] outline-orange-500 outline-hidden focus:outline focus:border-none px-2">
                                <option value="">ไม่ระบุ</option>
                                <option <?= $row['gender'] == "1" ? "selected" : "" ?> value="1">ชาย</option>
                                <option <?= $row['gender'] == "2" ? "selected" : "" ?> value="2">หญิง</option>
                            </select>
                        </div>
                        <div class="w-[100%] flex justify-center items-center gap-5">
                            <label for="" class="w-[30%] text-end">ศาสนา :</label>
                            <select name="reiigion" class="border border-gray-200 w-full h-[2rem] outline-orange-500 outline-hidden focus:outline focus:border-none px-2">
                                <option value="">ไม่ระบุ</option>
                                <option <?= $row["reiigion"] == "1" ? "selected" : "" ?> value="1">พุทธ</option>
                                <option <?= $row["reiigion"] == "2" ? "selected" : "" ?> value="2">อิสลาม</option>
                            </select>
                        </div>
                        <div class="w-[100%] flex justify-center items-center gap-5">
                            <label for="maritalstatus" class="w-[30%] text-end">สถานะ :</label>
                            <select name="maritalstatus" class="border border-gray-200 w-full h-[2rem] outline-orange-500 outline-hidden focus:outline focus:border-none px-2">
                                <option value="">ไม่ระบุ</option>
                                <option <?= $row["maritalstatus"] == "โสด" ? "selected" : "" ?> value="โสด" value="โสด">โสด</option>
                                <option <?= $row["maritalstatus"] == "ม่าย" ? "selected" : "" ?> value="ม่าย" value="ม่าย">ม่าย</option>
                                <option <?= $row["maritalstatus"] == "แต่งงานแล้ว" ? "selected" : "" ?> value="แต่งงานแล้ว" value="แต่งงานแล้ว">แต่งงานแล้ว</option>
                            </select>
                        </div>
                        <div class="w-[100%] flex justify-center items-center gap-5">
                            <label for="" class="w-[30%] text-end">เลขที่บัตรประชน :</label>
                            <input value="<?= $row["idcard"] ?>" name="idcard" type="text" class="border border-gray-200 w-full h-[2rem] outline-orange-500 outline-hidden focus:outline focus:border-none px-2">
                        </div>
                        <div class="w-[100%] flex justify-center items-center gap-5">
                            <label for="" class="w-[30%] text-end">สัญชาติ :</label>
                            <input value="<?= $row["nationality_code"] ?>" name="nationality_code" class="border border-gray-200 w-full h-[2rem] outline-orange-500 outline-hidden focus:outline focus:border-none px-2">
                        </div>
                        <div class="w-[100%] flex justify-center items-center gap-5">
                            <label for="" class="w-[30%] text-end">เชื่้อชาติ :</label>
                            <input value="<?= $row["race_code"] ?>" name="race_code" class="border border-gray-200 w-full h-[2rem] outline-orange-500 outline-hidden focus:outline focus:border-none px-2">
                        </div>
                        <div class="w-[100%] flex justify-center items-center gap-5">
                            <label for="" class="w-[30%] text-end">หนังสื่อเดินทาง :</label>
                            <input value="<?= $row["ref_passport"] ?>" name="ref_passport" class="border border-gray-200 w-full h-[2rem] outline-orange-500 outline-hidden focus:outline focus:border-none px-2">
                        </div>
                        <div class="w-[100%] flex justify-center items-center gap-5">
                            <label for="" class="w-[30%] text-end">Doctor :</label>
                            <input disabled value="<?= $row["doctor_name"] ?>" name="doctor" class="border border-gray-200 w-full h-[2rem] outline-orange-500 outline-hidden focus:outline focus:border-none px-2">
                        </div>
                        <div class="w-[100%] flex justify-center items-center gap-5">
                            <label for="" class="w-[30%] text-end">Patient Type :</label>
                            <select name="patient_type" class="border border-gray-200 w-full h-[2rem] outline-orange-500 outline-hidden focus:outline focus:border-none px-2">
                                <option <?= $row["patient_type"] == "" ? "selected" : "" ?> value="">ไม่ระบุ</option>
                                <option <?= $row["patient_type"] == "บุคคลทั่วไป" ? "selected" : "" ?> value="บุคคลทั่วไป">บุคคลทั่วไป</option>
                                <option <?= $row["patient_type"] == "ครอบครัวพนังงาน" ? "selected" : "" ?> value="ครอบครัวพนังงาน">ครอบครัวพนังงาน</option>
                                <option <?= $row["patient_type"] == "ชาวต่างชาติ" ? "selected" : "" ?> value="ชาวต่างชาติ">ชาวต่างชาติ</option>
                                <option <?= $row["patient_type"] == "พนังงาน" ? "selected" : "" ?> value="พนังงาน">พนังงาน</option>
                            </select>
                        </div>
                    </div>
                    <h1 class="text-[20px] text-blue-600 w-full text-start">ข้อมูลที่อยู่</h1>
                    <div class="w-full grid grid-cols-4 gap-5 w-full">
                        <div class="w-[100%] col-span-4 flex justify-center items-center gap-5">
                            <label for="" class="w-[30%] text-end">ตำบล/อำเภอ/จังหวัด :</label>
                            <input value="<?= $row["address"] ?>" name="address" type="text" class="border border-gray-200 w-full h-[2rem] outline-orange-500 outline-hidden focus:outline focus:border-none px-2">
                        </div>
                    </div>
                    <div class="w-full flex justify-between p-2">
                        <button type="button" onclick="history.back()" class="cursor-pointer hover:bg-red-400 bg-red-500 p-2 text-white text-[14px]">ยกเลิกการลงทะเบียน</button>
                        <button class="cursor-pointer hover:bg-blue-400 bg-blue-500 p-2 text-white text-[14px]">ยืนยันข้อมูลคนไข้</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>