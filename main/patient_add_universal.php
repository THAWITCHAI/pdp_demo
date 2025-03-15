<?php include('../assets/html/header.php'); ?>

<body>
    <div class="w-full h-screen">
        <?php include('../assets/html/navbar.php'); ?>
        <div class="w-full h-[93%] flex justify-center items-center">
            <?php include('../assets/html/sidebar.php'); ?>
            <div class="w-[86%] bg-white h-full py-[0.5px] border-l border-gray-200">
                <div class="w-full h-[2.48rem] text-[14px] flex items-center hover:bg-[#fff] cursor-pointer p-2 bg-[#f8f8f8] border-y border-gray-200">
                    <a href="patient_add_universal.php" class="text-blue-600">Home</a>
                </div>
                <div class="w-full h-fit p-3">
                    <h1 class="text-xl text-blue-600 font-light mb-2">Appointment</h1>
                    <hr class="text-gray-300">
                    <form method="GET" class="w-full p-2 ring-1 ring-gray-300 my-5 flex flex-col justify-center items-center gap-2">
                        <h1 class="w-full p-2 bg-[linear-gradient(to bottom,#ffffff 0%,#eeeeee 100%)] text-blue-500 shadow-xs">Search</h1>
                        <div class="w-full flex gap-10 justify-center items-center p-2">
                            <input name="hn" placeholder="HN" type="text" class="text-sm h-[2rem] outline-none px-2 rounded-xs w-full border border-gray-300">
                            <input name="first_name" placeholder="First Name" type="text" class="border border-gray-300 text-sm h-[2rem] outline-none px-2 rounded-xs w-full">
                            <input name="last_name" placeholder="Last Name" type="text" class="border border-gray-300 text-sm h-[2rem] outline-none px-2 rounded-xs w-full">
                            <input name="birth_date" placeholder="Birth Date" type="date" class="text-sm w-full outline-none px-2 rounded-xs border border-gray-300">
                        </div>
                        <div class="w-full flex gap-10 justify-center items-center p-2">
                            <input name="id_card" placeholder="ID Card" type="text" class="border border-gray-300 text-sm h-[2rem] outline-none px-2 rounded-xs w-full">
                            <input name="tel" placeholder="Tel/Mobile" type="text" class="border border-gray-300 text-sm h-[2rem] outline-none px-2 rounded-xs w-full">
                        </div>
                        <div class="w-full flex gap-10 justify-end items-center p-2">
                            <button type="submit" class="text-sm border border-blue-600 w-[12.3%] h-[2rem] rounded-xs bg-blue-400 shadow-lg hover:bg-blue-600 cursor-pointer text-white">Search</button>
                            <button type="reset" class="text-[14px] w-[12.3%] border border-red-600 h-[2rem] rounded-xs bg-red-400 shadow-lg hover:bg-red-700 cursor-pointer text-white">
                                <a class="w-full h-full" href="patient_add_universal.php">Reset</a>
                            </button>
                        </div>
                    </form>
                    <div class="w-full my-2 h-fit">
                        <button class="bg-green-400 hover:bg-green-500 px-4 py-2 text-sm text-white border border-green-600 cursor-pointer">
                            <a href="pateint_edit.php">ยังไม่มีในระบบ เพิ่มข้อมูลคนไข้</a>
                        </button>
                    </div>
                    <div class="w-full h-fit">
                        <div class="relative overflow-x-auto">
                            <table class="w-full text-sm text-left text-gray-500">
                                <thead class="bg-gray-100 shadow-sm text-xs text-gray-700 uppercase bg-gray-50">
                                    <tr>
                                        <th class="px-1 py-4 border border-gray-300">HN</th>
                                        <th class="px-1 py-4 border border-gray-300">Patient Name</th>
                                        <th class="px-1 py-4 border border-gray-300">Birth Date</th>
                                        <th class="px-1 py-4 border border-gray-300">Sex</th>
                                        <th class="px-1 py-4 border border-gray-300">Nationality</th>
                                        <th class="px-1 py-4 border border-gray-300">ID Card</th>
                                        <th class="px-1 py-4 border border-gray-300">Mobile</th>
                                        <th class="px-1 py-4 border border-gray-300">Address</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    // include("../config/db_connect.php");
                                    mysqli_set_charset($conn, "utf8mb4");
                                    
                                    $where = "WHERE 1=1";
                                    if (!empty($_GET['hn'])) $where .= " AND hn LIKE '%" . $_GET['hn'] . "%'";
                                    if (!empty($_GET['first_name'])) $where .= " AND first_name LIKE '%" . $_GET['first_name'] . "%'";
                                    if (!empty($_GET['last_name'])) $where .= " AND last_name LIKE '%" . $_GET['last_name'] . "%'";
                                    if (!empty($_GET['birth_date'])) $where .= " AND birth_date = '" . $_GET['birth_date'] . "'";
                                    if (!empty($_GET['id_card'])) $where .= " AND idcard LIKE '%" . $_GET['id_card'] . "%'";
                                    if (!empty($_GET['tel'])) $where .= " AND mobilephoneno LIKE '%" . $_GET['tel'] . "%'";
                                    
                                    $query = "SELECT * FROM patient $where";
                                    $rs1 = mysqli_query($conn, $query);
                                    
                                    while ($row = mysqli_fetch_assoc($rs1)) {
                                    ?>
                                        <tr class="bg-white border-b">
                                            <td class="px-1 py-4 border border-gray-300"><?= $row["hn"] ?: "ไม่มี HN" ?></td>
                                            <td class="px-1 py-4 border border-gray-300"><?= $row["first_name"] . " " . $row["last_name"] ?></td>
                                            <td class="px-1 py-4 border border-gray-300"><?= $row["birth_date"] ?></td>
                                            <td class="px-1 py-4 border border-gray-300"><?= $row["gender"] == 1 ? "ชาย" : "หญิง" ?></td>
                                            <td class="px-1 py-4 border border-gray-300"><?= $row["nationality_code"] ?></td>
                                            <td class="px-1 py-4 border border-gray-300"><?= $row["idcard"] ?></td>
                                            <td class="px-1 py-4 border border-gray-300"><?= $row["mobilephoneno"] ?></td>
                                            <td class="px-1 py-4 border border-gray-300"><?= $row["address"] ?></td>
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
</html>
