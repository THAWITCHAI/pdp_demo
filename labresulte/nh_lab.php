<?php include('../assets/html/header' . '.php'); ?>
<?php
$whext = "";
mysqli_set_charset($conn, "utf8mb4");

if (($tmp = $_GET["lab_name"]) != '')
    $whext .= " AND lab_name like '%$tmp%'";
if (($tmp = $_GET["lab_code"]) != '')
    $whext .= " AND lab_code like '%$tmp%'";
// $limit = 10;
// $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
// $offset = ($page - 1) * $limit;

// $total_records_query = mysqli_query($conn, "SELECT COUNT(*) as total FROM appointment t1 
//     LEFT JOIN patient t2 ON t1.patient_id = t2.patient_id
//     LEFT JOIN doctor t3 ON t1.doctor_id = t3.doctor_id
//     LEFT JOIN appointment_type t4 ON t1.appointment_type_id = t4.appointment_type_id
//     LEFT JOIN procedure_item t5 ON t1.procedure_item_id = t5.procedure_item_id;");
// $total_records = mysqli_fetch_assoc($total_records_query)['total'];
// $total_pages = ceil($total_records / $limit);

$rs1 = mysqli_query($conn, "SELECT * FROM demo_pdp.nh_lab WHERE 1=1 $whext group by nh_lab_id desc");
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
                <div
                    class="w-full h-[2.48rem] text-[14px] flex items-center hover:bg-[#fff] cursor-pointer p-2 bg-[#f8f8f8] border-y border-gray-200">
                    <a href="patient_add_universal.php" class="text-blue-600">Home</a>
                </div>

                <!-- Content -->
                <div class="w-full h-fit p-3">
                    <h1 class="text-xl text-blue-600 font-light mb-2">Lab N-Health Config</h1>
                    <hr class="text-gray-300">
                    <form method="GET"
                        class="w-full p-2 ring-1 ring-gray-300 my-5 flex flex-col justify-center items-center gap-2">
                        <h1
                            class="w-full p-2 bg-[linear-gradient(to bottom,#ffffff 0%,#eeeeee 100%)] text-blue-500 shadow-xs">
                            Search</h1>
                        <div class="w-full flex gap-10 justify-center items-center p-2">
                            <input value="<?= $_GET["lab_code"] ?>" name="lab_code" placeholder="Lab Code" type="text"
                                class="border border-gray-300 text-sm   h-[2rem] outline-none px-2 rounede-xs  w-full">
                            <input value="<?= $_GET["lab_name"] ?>" name="lab_name" placeholder="Lab Name " type="text"
                                class="border border-gray-300 text-sm   h-[2rem] outline-none px-2 rounede-xs  w-full">
                            <input disabled name="id_card" type="text"
                                class=" text-sm   h-[2rem] outline-none px-2 rounede-xs  w-full">
                            <input disabled name="tel" type="text"
                                class=" text-sm   h-[2rem] outline-none px-2 rounede-xs  w-full">
                        </div>
                        <div class="w-full flex gap-10 justify-end items-center p-2">
                            <button type="submit"
                                class="text-sm border border-blue-600 w-[12.3%] h-[2rem] rounded-xs bg-blue-400 shadow-lg hover:bg-blue-600 cursor-pointer text-white">Search</button>
                            <button type="reset"
                                class="text-[14px] w-[12.3%] border border-red-600 h-[2rem] rounded-xs bg-red-400 shadow-lg hover:bg-red-700 cursor-pointer text-white"><a
                                    class="w-full h-full" href="../labresulte/nh_lab.php">Reset</a></button>
                        </div>
                    </form>
                    <!-- Table -->
                    <div class="w-full h-fit overflow-x-auto">
                        <button class="text-[14px] bg-green-500 px-2 my-2 py-2 text-white">
                            <a href="./nh_lab_edit.php">
                                Add New
                            </a>
                        </button>
                        <table class="min-w-full text-sm text-left text-gray-500">
                            <thead class="bg-gray-100 text-xs text-gray-700 uppercase">
                                <tr>
                                    <th class="px-1 py-4 border border-gray-300">Lab Code</th>
                                    <th class="px-1 py-4 border border-gray-300">Lab Name</th>
                                    <th class="px-1 py-4 border border-gray-300">Treatment</th>
                                    <th class="px-1 py-4 border border-gray-300">Simple Type</th>
                                    <th class="px-1 py-4 border border-gray-300">Estimate Time (Day)</th>
                                    <th class="px-1 py-4 border border-gray-300"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($row = mysqli_fetch_assoc($rs1)) { ?>
                                    <tr class="bg-white border-b border-gray-200">

                                        <td class="px-1 py-4 border border-gray-300"><?= $row['lab_code'] ?></td>
                                        <td class="px-1 py-4 border border-gray-300"><?= $row['lab_name'] ?></td>
                                        <td class="px-1 py-4 border border-gray-300"><?= $row['lab_treatment'] ?></td>
                                        <td class="px-1 py-4 border border-gray-300"><?= $row['lab_sample_type'] ?></td>
                                        <td class="px-1 py-4 border border-gray-300 text-center">
                                            <?= $row['lab_estimate_time'] ?>
                                        </td>
                                        <td class="px-1 py-4 border border-gray-300">
                                            <button
                                                class="border border-yellow-600 hover:bg-yellow-600 text-[14px] px-2 py-1 bg-yellow-400 text-white cursor-pointer">
                                                <a href="./nh_lab_edit.php?lab_code=<?= $row['lab_code'] ?>">Edit
                                                </a>
                                            </button>
                                            <button onclick="confirm_del(<?= $row['nh_lab_id'] ?>)"
                                                class="border border-red-600 hover:bg-red-600 text-[14px] px-2 py-1 bg-red-400 text-white cursor-pointer">
                                                delete
                                            </button>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- Pagination -->
                    <div class="w-full flex justify-end items-center mt-2 pr-4">
                        <nav class="inline-flex items-center space-x-2" aria-label="Pagination">
                            <!-- ปุ่ม กลับ -->
                            <?php if ($page > 1): ?>
                                <a href="?page=<?= $page - 1; ?>"
                                    class="px-3 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded hover:bg-gray-100">
                                    ย้อนกลับ
                                </a>
                            <?php else: ?>
                                <span
                                    class="px-3 py-2 text-sm font-medium text-gray-300 bg-white border border-gray-300 rounded cursor-not-allowed">
                                    ย้อนกลับ
                                </span>
                            <?php endif; ?>

                            <!-- ปุ่ม ถัดไป -->
                            <?php if ($page < $total_pages): ?>
                                <a href="?page=<?= $page + 1; ?>"
                                    class="px-3 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded hover:bg-gray-100">
                                    ถัดไป
                                </a>
                            <?php else: ?>
                                <span
                                    class="px-3 py-2 text-sm font-medium text-gray-300 bg-white border border-gray-300 rounded cursor-not-allowed">
                                    ถัดไป
                                </span>
                            <?php endif; ?>
                        </nav>
                    </div>


                </div>
            </div>
        </div>
    </div>
    <script>
        function confirm_del(nh_lab_id) {
            const is_c = confirm("You Want Delete?")
            console.log(nh_lab_id)
            if (is_c == true) {
                window.location.replace("./nh_lab_del.php?nh_lab_id=" + nh_lab_id)
            }
        }
    </script>
</body>

</html>