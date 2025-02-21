<?php include('../assets/html/header' . '.php'); ?>

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
                    <h1 class="text-xl text-blue-600 font-light mb-2">Appointment</h1>
                    <hr class="text-gray-300">
                    <form method="GET" class="w-full p-2 ring-1 ring-gray-300 my-5 flex flex-col justify-center items-center gap-2">
                        <h1 class="w-full p-2 bg-[linear-gradient(to bottom,#ffffff 0%,#eeeeee 100%)] text-blue-500 shadow-xs">Search</h1>
                        <div class="w-full flex gap-10 justify-center items-center p-2">
                            <input name="hn" placeholder="HN" type="text" class="text-sm h-[2rem] outline-none px-2 rounede-xs  w-full border border-gray-300">
                            <input name="first_name" placeholder="First Name" type="text" class="border border-gray-300 text-sm   h-[2rem] outline-none px-2 rounede-xs  w-full">
                            <input name="last_name" placeholder="Last Name" type="text" class="border border-gray-300 text-sm   h-[2rem] outline-none px-2 rounede-xs  w-full">
                            <span class="border border-gray-300 flex gap-2 justify-between p-2 items-center   h-[2rem]  w-full">
                                <label for="" class="text-gray-500">วันเกิด</label>
                                <input name="birth_date" placeholder="Birth Date" type="date" class="text-sm w-[70%] outline-none px-2 rounede-xs ">
                            </span>
                        </div>
                        <div class="w-full flex gap-10 justify-center items-center p-2">
                            <input name="age" placeholder="Age." type="text" class="border border-gray-300 text-sm   h-[2rem] outline-none px-2 rounede-xs  w-full">
                            <input name="sex" placeholder="Sex" type="text" class="border border-gray-300 text-sm   h-[2rem] outline-none px-2 rounede-xs  w-full">
                            <input name="id_card" placeholder="ID Card" type="text" class="border border-gray-300 text-sm   h-[2rem] outline-none px-2 rounede-xs  w-full">
                            <input name="tel" placeholder="Tel/Mobile" type="text" class="border border-gray-300 text-sm   h-[2rem] outline-none px-2 rounede-xs  w-full">
                        </div>
                        <div class="w-full flex gap-10 justify-start items-center p-2">
                            <input name="is_vip" placeholder="Is VIP" type="text" class="border border-gray-300 text-sm   h-[2rem] outline-none px-2 rounede-xs  w-[22.3%]">
                            <input name="have_hn" placeholder="Have HN" type="text" class="border border-gray-300 text-sm   h-[2rem] outline-none px-2 rounede-xs  w-[22.3%]">
                        </div>
                        <div class="w-full flex gap-10 justify-end items-center p-2">
                            <button type="submit" class="text-sm border border-blue-600 w-[12.3%] h-[2rem] rounded-xs bg-blue-400 shadow-lg hover:bg-blue-600 cursor-pointer text-white">Search</button>
                            <button type="reset" class="text-[14px] w-[12.3%] border border-red-600 h-[2rem] rounded-xs bg-red-400 shadow-lg hover:bg-red-700 cursor-pointer text-white"><a class="w-full h-full" href="patient_add_universal.php">Reset</a></button>
                        </div>
                    </form>
                    <div class="w-full my-2 h-fit">
                        <button class="bg-green-400 hover:bg-green-500 px-4 py-2 text-sm text-white border border-green-600 cursor-pointer"><a href="pateint_edit.php">ยังไม่มีในระบบ เพิ่มข้อมูลคนไข้</a></button>
                    </div>
                    <div class="w-full h-fit">
                        <div class="relative overflow-x-auto ">
                            <table class="w-full  text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                <thead class="bg-gray-100 shadow-sm text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                    <tr class="">
                                        <th scope="col" class="px-1 py-4 border border-gray-300 ">HN</th>
                                        <th scope="col" class="px-1 py-4 border border-gray-300 ">Patient Name</th>
                                        <th scope="col" class="px-1 py-4 border border-gray-300 ">Age.</th>
                                        <th scope="col" class="px-1 py-4 border border-gray-300 ">Birth Date</th>
                                        <th scope="col" class="px-1 py-4 border border-gray-300 ">Sex</th>
                                        <th scope="col" class="px-1 py-4 border border-gray-300 ">Nationality</th>
                                        <th scope="col" class="px-1 py-4 border border-gray-300 ">ID Card</th>
                                        <th scope="col" class="px-1 py-4 border border-gray-300 ">Tel</th>
                                        <th scope="col" class="px-1 py-4 border border-gray-300 ">Mobile</th>
                                        <th scope="col" class="px-1 py-4 border border-gray-300 ">Address</th>
                                        <th scope="col" class="px-1 py-4 border border-gray-300 "></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    mysqli_set_charset($conn, "utf8mb4");
                                    $rs1 = mysqli_query($conn, "SELECT * FROM patient;");
                                    while ($row = mysqli_fetch_assoc($rs1)) {
                                    ?>
                                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">

                                            <td class="px-1 py-4 border border-gray-300">
                                                <?= $row["hn"] == "" ? "ไม่มี HN" : $row["hn"] ?>
                                            </td>
                                            <td class="px-1 py-4 border border-gray-300">
                                                <?= $row["first_name"] . " " . $row["last_name"] ?>
                                            </td>
                                            <td class="px-1 py-4 border border-gray-300">
                                                <?= $row["ageyear"] ?>
                                            </td>
                                            <td class="px-1 py-4 border border-gray-300">
                                                <?= $row["birth_date"] ?>
                                            </td>
                                            <td class="px-1 py-4 border border-gray-300">
                                                <?= $row["gender"] == 1 ? "ชาย" : "หญิง" ?>
                                            </td>
                                            <td class="px-1 py-4 border border-gray-300">
                                                <?= $row["nationality_code"] ?>
                                            </td>
                                            <td class="px-1 py-4 border border-gray-300">
                                                <?= $row["idcard"] ?>
                                            </td>
                                            <td class="px-1 py-4 border border-gray-300">
                                                <?= $row["tel"] ?>
                                            </td>
                                            <td class="px-1 py-4 border border-gray-300">
                                                <?= $row["mobilephoneno"] ?>
                                            </td>
                                            <td class="px-1 py-4 border border-gray-300">
                                                <?= $row["address"] ?>
                                            </td>
                                            <td class="px-1 py-4 border border-gray-300">
                                                <button class="border border-red-600 hover:bg-red-600 text-[14px] px-2 py-1 bg-red-400 text-white cursor-pointer">Delete</button>
                                            </td>
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
</body>

<script>
    if (e(1 < 2).checked) {
        console.log(3000)
    }
</script>

</html>