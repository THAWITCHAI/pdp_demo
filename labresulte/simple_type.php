<?php include('../assets/html/header' . '.php'); ?>
<?php

mysqli_set_charset($conn, "utf8mb4");


$limit = 10;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $limit;

$total_records_query = mysqli_query($conn, "SELECT COUNT(*) as total FROM appointment t1 
    LEFT JOIN patient t2 ON t1.patient_id = t2.patient_id
    LEFT JOIN doctor t3 ON t1.doctor_id = t3.doctor_id
    LEFT JOIN appointment_type t4 ON t1.appointment_type_id = t4.appointment_type_id
    LEFT JOIN procedure_item t5 ON t1.procedure_item_id = t5.procedure_item_id;");
$total_records = mysqli_fetch_assoc($total_records_query)['total'];
$total_pages = ceil($total_records / $limit);

$rs1 = mysqli_query($conn, "SELECT * 
    FROM appointment t1 
    LEFT JOIN patient t2 ON t1.patient_id = t2.patient_id
    LEFT JOIN doctor t3 ON t1.doctor_id = t3.doctor_id
    LEFT JOIN appointment_type t4 ON t1.appointment_type_id = t4.appointment_type_id
    LEFT JOIN procedure_item t5 ON t1.procedure_item_id = t5.procedure_item_id
    LIMIT $limit OFFSET $offset;");
?>

<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VN By Appointment</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <div class="w-full h-screen">
        <!-- Navbar -->
        <?php include('../assets/html/navbar.php'); ?>

        <div class="w-full h-[93%] flex justify-center items-center">
            <?php include('../assets/html/sidebar.php'); ?>
            <div class="w-[86%] bg-white h-full py-[0.5px] border-l border-gray-200">
                <div class="w-full h-[2.48rem] text-[14px] flex items-center hover:bg-[#fff] cursor-pointer p-2 bg-[#f8f8f8] border-y border-gray-200">
                    <a href="patient_add_universal.php" class="text-blue-600">Home</a>
                </div>

                <!-- Content -->
                <div class="w-full h-fit p-3">
                    <h1 class="text-xl text-blue-600 font-light mb-2">Simple Type</h1>
                    <hr class="text-gray-300">
                    <form method="GET" class="w-full p-2 ring-1 ring-gray-300 my-5 flex flex-col justify-center items-center gap-2">
                        <h1 class="w-full p-2 bg-[linear-gradient(to bottom,#ffffff 0%,#eeeeee 100%)] text-blue-500 shadow-xs">Search</h1>
                        <div class="w-full flex gap-10 justify-center items-center p-2">
                            <input name="age" placeholder="Lab Code" type="text" class="border border-gray-300 text-sm   h-[2rem] outline-none px-2 rounede-xs  w-full">
                            <input disabled name="sex" placeholder="" type="text" class="text-sm   h-[2rem] outline-none px-2 rounede-xs  w-full">
                            <input disabled name="id_card" type="text" class=" text-sm   h-[2rem] outline-none px-2 rounede-xs  w-full">
                            <input disabled name="tel" type="text" class=" text-sm   h-[2rem] outline-none px-2 rounede-xs  w-full">
                        </div>
                        <div class="w-full flex gap-10 justify-end items-center p-2">
                            <button type="submit" class="text-sm border border-blue-600 w-[12.3%] h-[2rem] rounded-xs bg-blue-400 shadow-lg hover:bg-blue-600 cursor-pointer text-white">Search</button>
                            <button type="reset" class="text-[14px] w-[12.3%] border border-red-600 h-[2rem] rounded-xs bg-red-400 shadow-lg hover:bg-red-700 cursor-pointer text-white"><a class="w-full h-full" href="patient_add_universal.php">Reset</a></button>
                        </div>
                    </form>
                    <!-- Table -->
                    <div class="w-full h-fit overflow-x-auto">
                        <button class="text-[14px] bg-green-500 px-2 my-2 py-2 text-white">Add New</button>
                        <table class="min-w-full text-sm text-left text-gray-500">
                            <thead class="bg-gray-100 text-xs text-gray-700 uppercase">
                                <tr>
                                    <th class="px-1 py-4 border border-gray-300">Code</th>
                                    <th class="px-1 py-4 border border-gray-300">Name</th>
                                    <th class="px-1 py-4 border border-gray-300"></th>
                                </tr>
                            </thead>
                            <tbody>
                                    <tr class="bg-white border-b border-gray-200">
                              
                                        <td class="px-1 py-4 border border-gray-300">A020</td>
                                        <td class="px-1 py-4 border border-gray-300">ABO Group for Heamatology</td>
                                        <td class="px-1 py-4 border border-gray-300 gap-2">
                                            <button class="border border-yellow-600 hover:bg-yellow-600 text-[14px] px-2 py-1 bg-yellow-400 text-white cursor-pointer"><a href="./simple_type_edit.php">Edit</a></button>
                                            <button class="border border-red-600 hover:bg-red-600 text-[14px] px-2 py-1 bg-red-400 text-white cursor-pointer">Delete</button>
                                        </td>
                                    </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- Pagination -->
                    <div class="w-full flex justify-end items-center mt-2 pr-4">
                        <nav class="inline-flex items-center space-x-2" aria-label="Pagination">
                            <!-- ปุ่ม กลับ -->
                            <?php if ($page > 1) : ?>
                                <a href="?page=<?= $page - 1; ?>"
                                    class="px-3 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded hover:bg-gray-100">
                                    ย้อนกลับ
                                </a>
                            <?php else: ?>
                                <span class="px-3 py-2 text-sm font-medium text-gray-300 bg-white border border-gray-300 rounded cursor-not-allowed">
                                    ย้อนกลับ
                                </span>
                            <?php endif; ?>

                            <!-- ปุ่ม ถัดไป -->
                            <?php if ($page < $total_pages) : ?>
                                <a href="?page=<?= $page + 1; ?>"
                                    class="px-3 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded hover:bg-gray-100">
                                    ถัดไป
                                </a>
                            <?php else: ?>
                                <span class="px-3 py-2 text-sm font-medium text-gray-300 bg-white border border-gray-300 rounded cursor-not-allowed">
                                    ถัดไป
                                </span>
                            <?php endif; ?>
                        </nav>
                    </div>


                </div>
            </div>
        </div>
    </div>
</body>

</html>