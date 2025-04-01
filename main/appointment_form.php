<?php include('../assets/html/header' . '.php'); ?>



<?php
mysqli_set_charset($conn, "utf8mb4");
$rs1 = mysqli_query($conn, "select * from department");
$rs1_patient = mysqli_query($conn, "select * from patient where patient_id = $_GET[patient_id]");
$row_patient = mysqli_fetch_assoc($rs1_patient)
?>

<?php
$birthDate = new DateTime($row_patient['birth_date']);
$today = new DateTime();
$age = $birthDate->diff($today)->y; // คำนวณอายุ
?>
<!DOCTYPE html>
<html lang="en">
<script src="https://cdn.tailwindcss.com"></script>
<body>
    <div class="w-full h-screen">
        <?php include('../assets/html/navbar' . '.php'); ?>
        <div class="w-full h-full flex justify-center items-start">
            <?php include('../assets/html/sidebar' . '.php'); ?>
            <div class="border-l border-gray-200 w-[86%] bg-white h-full py-[0.5px] flex flex-col justify-start items-center">
                <div class="w-full  h-[2.48rem] text-[14px] flex items-center hover:bg-[#fff] cursor-pointer p-2 bg-[#f8f8f8] border-y border-gray-200">
                    <a href="patient_add_universal.php" class="text-blue-600">Home</a>
                </div>
                <div class="w-full h-fit p-3">
                    <h1 class="text-xl text-blue-600 font-light mb-2">Appointment</h1>
                    <hr class="text-gray-300">
                </div>
                <div class="w-full h-fit p-3 flex gap-10 justify-start items-start">
                    <div class=" w-[18rem] h-fit flex flex-col gap-[2px]">
                        <button class="w-full h-[2rem] border px-3 border-gray-300 bg-blue-100 text-[14px] cursor-pointer font-medium flex justify-start text-blue-500 items-center">Next Appointment</button>
                        <button class="w-full h-[2rem] border px-3 border-gray-300 bg-blue-100 text-[14px] cursor-pointer font-medium flex justify-start text-blue-500 items-center">Past Appointment</button>
                        <button class="w-full h-[2rem] border px-3 border-gray-300 bg-blue-100 text-[14px] cursor-pointer font-medium flex justify-start text-blue-500 items-center">Cancle</button>
                    </div>
                    <form action="appointment_save.php" method="post" class="w-full p-1 flex justify-center items-center gap-3 flex-col h-fit">
                        <div id="detail" class="w-full h-fit border border-gray-200 flex flex-col">
                            <h1 class="text-blue-500 bg-gray-100 w-full h-[2.5rem] border-b border-gray-200 px-2 flex justify-start items-center">ข้อมูลผู้ป่วย</h1>
                            <div class="gap-2 w-full h-full flex justify-between items-start p-3">
                                <img src="../assets/images/user_detail.png" width="120" height="120" alt="">
                                <div class="border border-blue-200 w-full h-full">
                                    <div class="text-[14px] border-b border-gray-200 h-[2.5rem] w-full flex justify-center items-center">
                                        <div class="px-2 flex justify-end items-center bg-blue-50 w-[30%] h-full text-blue-500">HN</div>
                                        <div class="px-2 flex justify-start items-center w-[100%] h-full">ยังไม่มี HN - คนไข้ใหม่</div>
                                    </div>
                                    <div class="text-[14px] border-b border-gray-200 h-[2.5rem] w-full flex justify-center items-center">
                                        <div class="px-2 flex justify-end items-center bg-blue-50 w-[30%] h-full text-blue-500">ชื่อ</div>
                                        <div class="px-2 flex justify-start items-center w-[100%] h-full"><?= $row_patient['first_name'] . " " . $row_patient["last_name"] ?></div>
                                    </div>
                                    <div class="text-[14px] border-b border-gray-200 h-[2.5rem] w-full flex justify-center items-center">
                                        <div class="px-2 flex justify-end items-center bg-blue-50 w-[30%] h-full text-blue-500">อายุ</div>
                                        <div class="px-2 flex justify-start items-center w-[100%] h-full">(<?= date_format($birthDate, "d/m/y") ?>) <?= $age, "ปี", " - ", $row_patient['gender'] == "1" ? "ชาย" : "หญิง" ?>(<?= $row_patient['nationality_code'] ?>)</div>
                                    </div>
                                    <div class="text-[14px] border-b border-gray-200 h-[2.5rem] w-full flex justify-center items-center">
                                        <div class="px-2 flex justify-end items-center bg-blue-50 w-[30%] h-full text-blue-500">เบอร์โทร</div>
                                        <div class="px-2 flex justify-start items-center w-[100%] h-full"><?= $row_patient["mobilephoneno"] ?></div>
                                    </div>
                                    <div class="text-[14px] border-b border-gray-200 h-[2.5rem] w-full flex justify-center items-center">
                                        <div class="px-2 flex justify-end items-center bg-blue-50 w-[30%] h-full text-blue-500">หมายเหตุ</div>
                                        <div class="px-2 flex justify-start items-center w-[100%] h-full"><?= $row_patient["patient_remark"] == "" ? "-" : $row_patient["patient_remark"] ?></div>
                                    </div>
                                    <div class="text-[14px] h-[2.5rem] w-full flex justify-center items-center">
                                        <div class="px-2 flex justify-end items-center bg-blue-50 w-[30%] h-full text-blue-500">Patient Need</div>
                                        <div class="px-2 flex justify-start items-center w-[100%] h-full">-</div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="w-full text-[14px] h-fit flex justify-between items-center gap-5">
                            <div class="w-full h-[2.5rem] flex justify-center items-center gap-2">
                                <label for="" class="w-[30%] text-end">Appointment Type *:</label>
                                <?php
                                mysqli_set_charset($conn, "utf8mb4");
                                $query_rs_specialty = mysqli_query($conn, "select * from appointment_type where 1=1");
                                ?>
                                <select name="appointment_type_id" required class="border border-gray-200 w-full h-[2rem] outline-orange-500 outline-hidden focus:outline focus:border-none px-2">
                                    <option value="0">ไม่ระบุ</option>
                                    <?php while ($row = mysqli_fetch_assoc($query_rs_specialty)) { ?>
                                        <option value="<?= $row['appointment_type_id'] ?>"><?= $row["appointment_type"] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="w-full h-[2.5rem] flex justify-center items-center gap-2">
                                <label for="" class="w-[30%] text-end">Procedure Template:</label>
                                <select name="procedure_template_id" required class="border border-gray-200 w-full h-[2rem] outline-orange-500 outline-hidden focus:outline focus:border-none px-2">
                                    <option value="0">ไม่ระบุ</option>
                                    <?php
                                    $query_rs_proc = "SELECT * FROM procedure_template;";
                                    $rs_proc = mysqli_query($conn, $query_rs_proc);
                                    while ($row_rs_proc = mysqli_fetch_assoc($rs_proc)) {
                                    ?>
                                        <option value="<?= $row_rs_proc["procedure_template_id"] ?>"><?= $row_rs_proc["template_name"] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="w-full text-[14px] h-fit flex justify-between items-center gap-5">
                            <?php
                            mysqli_set_charset($conn, "utf8mb4");
                            $query_rs_specialty = mysqli_query($conn, "select * from specialty");
                            ?>
                            <div class="w-full h-[2.5rem] flex justify-center items-center gap-2">
                                <label for="" class="w-[30%] text-end">Specify Specialty:</label>
                                <select name="specialty_id" required class="border border-gray-200 w-full h-[2rem] outline-orange-500 outline-hidden focus:outline focus:border-none px-2">
                                    <option value="1">ไม่ระบุ</option>
                                    <?php while ($row = mysqli_fetch_assoc($query_rs_specialty)) { ?>
                                        <option value="<?= $row["specialty_id"] ?>"><?= $row["specialty_name"] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="w-full h-[2.5rem] flex justify-center items-center gap-2">
                                <label for="" class="w-[30%] text-end">Procedure:</label>
                                <select name="procedure_item_id" required class="border border-gray-200 w-full h-[2rem] outline-orange-500 outline-hidden focus:outline focus:border-none px-2">
                                    <option value="0">-</option>
                                    <option value="0">พบแพทย์ (Slit Lamp)</option>
                                    <?php
                                    $query_rs_proc = "SELECT t1.*,concat(procedure_code,' : ',procedure_name) procedure_name  FROM procedure_item t1 WHERE is_active = 'Y'";
                                    $rs_proc = mysqli_query($conn, $query_rs_proc);
                                    while ($row_rs_proc = mysqli_fetch_assoc($rs_proc)) {
                                    ?>
                                        <option value="<?= $row_rs_proc["procedure_item_id"] ?>"><?= $row_rs_proc["procedure_name"] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="w-full text-[14px] h-fit flex justify-between items-center gap-5">
                            <div class="w-full h-[2.5rem] flex justify-center items-center gap-2">
                                <label for="" class="w-[30%] text-end">Specify Doctor:</label>
                                <select name="doctor_id" required class="border border-gray-200 w-full h-[2rem] outline-orange-500 outline-hidden focus:outline focus:border-none px-2">
                                    <option value="1">ไม่เจาะจงแพทย์</option>
                                    <?php
                                    $sql = "
                                        SELECT 
                                            t1.*, CONCAT(doctor_code, ' : ', doctor_name) AS full_name
                                        FROM
                                            doctor t1
                                        WHERE
                                            is_enable = 'Y'
                                        AND 
                                            procedure_item_id = - 1
                                        ";
                                    mysqli_set_charset($conn, "utf8mb4");
                                    $doctor = mysqli_query($conn, $sql);
                                    while ($row = mysqli_fetch_assoc($doctor)) { ?>
                                        <option value="<?= $row['doctor_id'] ?>"><?= $row['doctor_name'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="w-full h-[2.5rem] flex justify-center items-center gap-2">
                                <div class="w-full h-[2rem] gap-2 px-2 flex justify-start items-center text-[14px]">
                                    <input name="patient_id" type="hidden" value="<?= $_GET["patient_id"] ?>">
                                </div>
                            </div>
                        </div>
                        <div class="w-full text-[14px] h-fit flex justify-between items-center gap-5">
                            <div class="w-full h-[2.5rem] flex justify-center items-center gap-2">
                                <label for="" class="w-[30%] text-end">Clinic *:</label>
                                <select name="department_id" required class="border border-gray-200 w-full h-[2rem] outline-orange-500 outline-hidden focus:outline focus:border-none px-2">
                                    <option value="0">ไม่ระบุ</option>
                                    <?php while ($row = mysqli_fetch_assoc($rs1)) { ?>
                                        <option value="<?= $row["department_id"] ?>"><?= $row["department_name"] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="w-full h-[2.5rem] flex justify-center items-center gap-2">
                                <label for="" class="w-[30%] text-end">Appointment Date *:</label>
                                <input type="date" name="appointment_date" required class="border border-gray-200 w-full h-[2rem] outline-orange-500 outline-hidden focus:outline focus:border-none px-2" />
                            </div>
                        </div>
                        <div class="w-full text-[14px] h-fit flex justify-between items-center gap-5">
                            <div class="w-full h-[2.5rem] flex justify-center items-center gap-2">
                                <label for="" class="w-[30%] text-end">เวลาลงทะเบียน:</label>
                                <select name="location_id" required class="border border-gray-200 w-full h-[2rem] outline-orange-500 outline-hidden focus:outline focus:border-none px-2">
                                    <option value="0">ไม่ระบุ</option>
                                    <option value="10:00">10:00</option>
                                    <option value="11:00">11:00</option>
                                    <option value="15:00">15:00</option>
                                    <option value="16:00">16:00</option>
                                    <option value="17:00">17:00</option>
                                </select>
                            </div>
                            <div class="w-full h-[2.5rem] flex justify-start items-center gap-2">
                                <label for="" class="w-[22.5%] text-end">ไม่ควรเลื่อนเกิน</label>
                                <input type="number" name="week_tolerance" required class="border border-gray-200 w-[20%] text-center h-[2rem] outline-orange-500 outline-hidden focus:outline focus:border-none px-2" />
                                <label for="" class="w-[50%] text-start">Week</label>

                            </div>
                        </div>
                        <div class="w-full text-[14px] h-fit flex justify-between items-center gap-5">
                            <div class="w-full h-[2.5rem] flex justify-end items-center gap-2">
                                <button type="submit" class="w-[20%] text-white py-2 cursor-pointer text-center border border-green-200 bg-green-500">บันทึกข้อมูลนัด</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</body>

</html>