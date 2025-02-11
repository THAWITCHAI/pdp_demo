<!DOCTYPE html>
<html lang="en">
<? include('../assets/html/header' . '.php'); ?>

<?php
$birthDate = new DateTime($_POST['birth_date']);
$today = new DateTime();
$age = $birthDate->diff($today)->y; // คำนวณอายุ
?>

<body>
    <div class="w-full h-screen">
        <? include('../assets/html/navbar' . '.php'); ?>
        <div class="w-full h-fit flex justify-center items-start border">
            <? include('../assets/html/sidebar' . '.php'); ?>
            <div class="border-l border-gray-200 w-[86%] bg-white h-fit py-[0.5px] flex flex-col justify-start items-center">
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
                    <div class="w-full p-1 flex justify-center items-center gap-3 flex-col h-fit">
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
                                        <div class="px-2 flex justify-start items-center w-[100%] h-full"><?= $_POST['first_name'], " ", $_POST["last_name"] ?></div>
                                    </div>
                                    <div class="text-[14px] border-b border-gray-200 h-[2.5rem] w-full flex justify-center items-center">
                                        <div class="px-2 flex justify-end items-center bg-blue-50 w-[30%] h-full text-blue-500">อายุ</div>
                                        <div class="px-2 flex justify-start items-center w-[100%] h-full">(<?= date_format($birthDate, "d/m/y") ?>) <?= $age, "ปี", " - ", $_POST['sex'] ?>(<?= $_POST['nationality'] ?>)</div>
                                    </div>
                                    <div class="text-[14px] border-b border-gray-200 h-[2.5rem] w-full flex justify-center items-center">
                                        <div class="px-2 flex justify-end items-center bg-blue-50 w-[30%] h-full text-blue-500">เบอร์โทร</div>
                                        <div class="px-2 flex justify-start items-center w-[100%] h-full"><?= $_POST["mobile"] ?></div>
                                    </div>
                                    <div class="text-[14px] border-b border-gray-200 h-[2.5rem] w-full flex justify-center items-center">
                                        <div class="px-2 flex justify-end items-center bg-blue-50 w-[30%] h-full text-blue-500">หมายเหตุ</div>
                                        <div class="px-2 flex justify-start items-center w-[100%] h-full"><?= $_POST["remark"] ?></div>
                                    </div>
                                    <div class="text-[14px] h-[2.5rem] w-full flex justify-center items-center">
                                        <div class="px-2 flex justify-end items-center bg-blue-50 w-[30%] h-full text-blue-500">Patient Need</div>
                                        <div class="px-2 flex justify-start items-center w-[100%] h-full"></div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="w-full text-[14px] h-fit flex justify-between items-center gap-5">
                            <div class="w-full h-[2.5rem] flex justify-center items-center gap-2">
                                <label for="" class="w-[30%] text-end">Appointment Type *:</label>
                                <select name="sex" required class="border border-gray-200 w-full h-[2rem] outline-orange-500 outline-hidden focus:outline focus:border-none px-2">
                                    <option value="">ไม่ระบุ</option>
                                    <option value="">ชาย</option>
                                    <option value="">หญิง</option>
                                </select>
                            </div>
                            <div class="w-full h-[2.5rem] flex justify-center items-center gap-2">
                                <label for="" class="w-[30%] text-end">Procedure Template:</label>
                                <select name="sex" required class="border border-gray-200 w-full h-[2rem] outline-orange-500 outline-hidden focus:outline focus:border-none px-2">
                                    <option value="">ไม่ระบุ</option>
                                    <option value="">ชาย</option>
                                    <option value="">หญิง</option>
                                </select>
                            </div>
                        </div>
                        <div class="w-full text-[14px] h-fit flex justify-between items-center gap-5">
                            <div class="w-full h-[2.5rem] flex justify-center items-center gap-2">
                                <label for="" class="w-[30%] text-end">Specify Specialty:</label>
                                <select name="sex" required class="border border-gray-200 w-full h-[2rem] outline-orange-500 outline-hidden focus:outline focus:border-none px-2">
                                    <option value="">ไม่ระบุ</option>
                                    <option value="">ชาย</option>
                                    <option value="">หญิง</option>
                                </select>
                            </div>
                            <div class="w-full h-[2.5rem] flex justify-center items-center gap-2">
                                <label for="" class="w-[30%] text-end">Procedure:</label>
                                <select name="sex" required class="border border-gray-200 w-full h-[2rem] outline-orange-500 outline-hidden focus:outline focus:border-none px-2">
                                    <option value="">ไม่ระบุ</option>
                                    <option value="">ชาย</option>
                                    <option value="">หญิง</option>
                                </select>
                            </div>
                        </div>
                        <div class="w-full text-[14px] h-fit flex justify-between items-center gap-5">
                            <div class="w-full h-[2.5rem] flex justify-center items-center gap-2">
                                <label for="" class="w-[30%] text-end">Specify Doctor:</label>
                                <select name="sex" required class="border border-gray-200 w-full h-[2rem] outline-orange-500 outline-hidden focus:outline focus:border-none px-2">
                                    <option value="">ไม่ระบุ</option>
                                    <option value="">ชาย</option>
                                    <option value="">หญิง</option>
                                </select>
                            </div>
                            <div class="w-full h-[2.5rem] flex justify-center items-center gap-2">
                                <div class="w-full h-[2rem] gap-2 px-2 flex justify-start items-center text-[14px]">
                                    <button class="border border-blue-200 w-fit px-2 h-full bg-blue-500 text-white cursor-pointer">เลือกแพทย์</button>
                                    <button class="border border-blue-200 w-fit px-2 h-full bg-blue-500 text-white cursor-pointer">กำหนดตารางแพทย์</button>
                                    <button class="border border-blue-200 w-fit px-2 h-full bg-blue-500 text-white cursor-pointer">หาวันที่แพทย์ออกตรวจ</button>
                                </div>
                            </div>
                        </div>
                        <div class="w-full text-[14px] h-fit flex justify-between items-center gap-5">
                            <div class="w-full h-[2.5rem] flex justify-center items-center gap-2">
                                <label for="" class="w-[30%] text-end">Clinic *:</label>
                                <select name="sex" required class="border border-gray-200 w-full h-[2rem] outline-orange-500 outline-hidden focus:outline focus:border-none px-2">
                                    <option value="">ไม่ระบุ</option>
                                    <option value="">ชาย</option>
                                    <option value="">หญิง</option>
                                </select>
                            </div>
                            <div class="w-full h-[2.5rem] flex justify-center items-center gap-2">
                                <label for="" class="w-[30%] text-end">Appointment Date *:</label>
                                <input type="date" name="sex" required class="border border-gray-200 w-full h-[2rem] outline-orange-500 outline-hidden focus:outline focus:border-none px-2" />
                            </div>
                        </div>
                        <div class="w-full text-[14px] h-fit flex justify-between items-center gap-5">
                            <div class="w-full h-[2.5rem] flex justify-center items-center gap-2">
                                <label for="" class="w-[30%] text-end">เวลาลงทะเบียน:</label>
                                <select name="sex" required class="border border-gray-200 w-full h-[2rem] outline-orange-500 outline-hidden focus:outline focus:border-none px-2">
                                    <option value="">ไม่ระบุ</option>
                                    <option value="">ชาย</option>
                                    <option value="">หญิง</option>
                                </select>
                            </div>
                            <div class="w-full h-[2.5rem] flex justify-center items-center gap-2">
                                <label for="" class="w-[30%] text-end">ไม่ควรเลื่อนเกิน</label>
                                <select name="sex" required class="border border-gray-200 w-full h-[2rem] outline-orange-500 outline-hidden focus:outline focus:border-none px-2">
                                    <option value="">ไม่ระบุ</option>
                                    <option value="">ชาย</option>
                                    <option value="">หญิง</option>
                                </select>
                            </div>
                        </div>
                        <div class="w-full text-[14px] h-fit flex justify-between items-center gap-5">
                            <div class="w-full h-[2.5rem] flex justify-end items-center gap-2">
                                <a href="appointment_from_func.php" class="w-[20%] text-white py-2 cursor-pointer text-center border border-green-200 bg-green-500">บันทึกข้อมูลนัด</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <? print_r($_POST) ?> -->

            </div>
        </div>
    </div>
</body>

</html>