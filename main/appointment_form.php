<!DOCTYPE html>
<html lang="en">
<? include('../assets/html/header' . '.php'); ?>

<body>
    <div class="w-full h-screen">
        <? include('../assets/html/navbar' . '.php'); ?>
        <div class="w-full h-[93%] flex justify-center items-center">
            <? include('../assets/html/sidebar' . '.php'); ?>
            <div class="w-[86%] bg-white h-full py-[0.5px] flex flex-col justify-start items-center">
                <div class="w-full  h-[2.48rem] text-[14px] flex items-center hover:bg-[#fff] cursor-pointer p-2 bg-[#f8f8f8] border-y border-gray-200">
                    <a href="patient_add_universal.php" class="text-blue-600">Home</a>
                </div>
                <div class="w-full h-fit p-3">
                    <h1 class="text-xl text-blue-600 font-light mb-2">Appointment</h1>
                    <hr class="text-gray-300">
                </div>
                <div class="border w-full h-fit p-3 flex gap-10 justify-start items-start">
                    <div class="border w-[18rem] h-[10rem]"></div>

                    <div class="w-full p-1 flex justify-center items-center gap-3 flex-col">
                        <div class="w-full h-[20rem] border"></div>

                        <div class="w-full text-[14px] h-fit flex justify-between items-center gap-5">
                            <div class="w-full h-[5rem] flex justify-center items-center gap-2">
                                <label for="" class="w-[30%] text-end">Appointment Type *:</label>
                                <select name="sex" required class="border border-gray-200 w-full h-[2rem] outline-orange-500 outline-hidden focus:outline focus:border-none px-2">
                                    <option value="">ไม่ระบุ</option>
                                    <option value="">ชาย</option>
                                    <option value="">หญิง</option>
                                </select>
                            </div>
                            <div class="w-full h-[5rem] flex justify-center items-center gap-2">
                                <label for="" class="w-[30%] text-end">Procedure Template:</label>
                                <select name="sex" required class="border border-gray-200 w-full h-[2rem] outline-orange-500 outline-hidden focus:outline focus:border-none px-2">
                                    <option value="">ไม่ระบุ</option>
                                    <option value="">ชาย</option>
                                    <option value="">หญิง</option>
                                </select>
                            </div>
                        </div>
                        <div class="w-full text-[14px] h-fit flex justify-between items-center gap-5">
                            <div class="w-full h-[5rem] flex justify-center items-center gap-2">
                                <label for="" class="w-[30%] text-end">Specify Specialty:</label>
                                <select name="sex" required class="border border-gray-200 w-full h-[2rem] outline-orange-500 outline-hidden focus:outline focus:border-none px-2">
                                    <option value="">ไม่ระบุ</option>
                                    <option value="">ชาย</option>
                                    <option value="">หญิง</option>
                                </select>
                            </div>
                            <div class="w-full h-[5rem] flex justify-center items-center gap-2">
                                <label for="" class="w-[30%] text-end">Procedure:</label>
                                <select name="sex" required class="border border-gray-200 w-full h-[2rem] outline-orange-500 outline-hidden focus:outline focus:border-none px-2">
                                    <option value="">ไม่ระบุ</option>
                                    <option value="">ชาย</option>
                                    <option value="">หญิง</option>
                                </select>
                            </div>
                        </div>
                        <div class="w-full text-[14px] h-fit flex justify-between items-center gap-5">
                            <div class="w-full h-[5rem] flex justify-center items-center gap-2">
                                <label for="" class="w-[30%] text-end">Specify Doctor:</label>
                                <select name="sex" required class="border border-gray-200 w-full h-[2rem] outline-orange-500 outline-hidden focus:outline focus:border-none px-2">
                                    <option value="">ไม่ระบุ</option>
                                    <option value="">ชาย</option>
                                    <option value="">หญิง</option>
                                </select>
                            </div>
                            <div class="w-full h-[5rem] flex justify-center items-center gap-2">
                                <label for="" class="w-[30%] text-end">Procedure Template:</label>
                                <select name="sex" required class="border border-gray-200 w-full h-[2rem] outline-orange-500 outline-hidden focus:outline focus:border-none px-2">
                                    <option value="">ไม่ระบุ</option>
                                    <option value="">ชาย</option>
                                    <option value="">หญิง</option>
                                </select>
                            </div>
                        </div>
                        <div class="w-full text-[14px] h-fit flex justify-between items-center gap-5">
                            <div class="w-full h-[5rem] flex justify-center items-center gap-2">
                                <label for="" class="w-[30%] text-end">Clinic *:</label>
                                <select name="sex" required class="border border-gray-200 w-full h-[2rem] outline-orange-500 outline-hidden focus:outline focus:border-none px-2">
                                    <option value="">ไม่ระบุ</option>
                                    <option value="">ชาย</option>
                                    <option value="">หญิง</option>
                                </select>
                            </div>
                            <div class="w-full h-[5rem] flex justify-center items-center gap-2">
                                <label for="" class="w-[30%] text-end">Appointment Date *:</label>
                                <select name="sex" required class="border border-gray-200 w-full h-[2rem] outline-orange-500 outline-hidden focus:outline focus:border-none px-2">
                                    <option value="">ไม่ระบุ</option>
                                    <option value="">ชาย</option>
                                    <option value="">หญิง</option>
                                </select>
                            </div>
                        </div>
                        <div class="w-full text-[14px] h-fit flex justify-between items-center gap-5">
                            <div class="w-full h-[5rem] flex justify-center items-center gap-2">
                                <label for="" class="w-[30%] text-end">เวลาลงทะเบียน:</label>
                                <select name="sex" required class="border border-gray-200 w-full h-[2rem] outline-orange-500 outline-hidden focus:outline focus:border-none px-2">
                                    <option value="">ไม่ระบุ</option>
                                    <option value="">ชาย</option>
                                    <option value="">หญิง</option>
                                </select>
                            </div>
                            <div class="w-full h-[5rem] flex justify-center items-center gap-2">
                                <label for="" class="w-[30%] text-end">ไม่ควรเลื่อนเกิน</label>
                                <select name="sex" required class="border border-gray-200 w-full h-[2rem] outline-orange-500 outline-hidden focus:outline focus:border-none px-2">
                                    <option value="">ไม่ระบุ</option>
                                    <option value="">ชาย</option>
                                    <option value="">หญิง</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <? print_r($_POST) ?>

            </div>
        </div>
    </div>
</body>

</html>