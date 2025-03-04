<?php include('../assets/html/header' . '.php'); ?>
<?php

mysqli_set_charset($conn, "utf8mb4");

if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST["MM_update"] == "from1") {
    mysqli_query($conn, "UPDATE nh_order SET status_code = 'Waiting' WHERE order_number = '$_POST[order_number]'");
}
if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST["MM_update"] == "from2") {
    mysqli_query($conn, "UPDATE nh_order SET status_code = 'RESULTED' WHERE order_number = '$_POST[order_number]'");
}


$limit = 10;
$page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
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
    LEFT JOIN department t6 ON t1.department_id = t6.department_id 
    WHERE t2.hn = '$_GET[hn]' AND t1.visitdate = '$_GET[visitdate]'
    LIMIT $limit OFFSET $offset;");
$row = mysqli_fetch_assoc($rs1);
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

                <div class="w-full h-fit p-3 flex flex-col gap-2">
                    <div class="flex flex-col text-[14px] w-full border border-gray-200">
                        <h1 class="w-full p-2 bg-gray-50 border-b border-gray-200 text-[14px] text-blue-600">Patient
                        </h1>
                        <div class="w-full flex justify-between items-center gap-5 py-2 px-10">
                            <img src="../assets/images/user.png" alt="">
                            <table class="w-full border">
                                <tbody>
                                    <tr class="border-b h-[2.5rem]">
                                        <td class="text-blue-600 text-center py-2 bg-blue-50">ชื่อ</td>
                                        <td class="px-2"><?= $row["first_name"] . " " . $row["last_name"] ?> HN:
                                            <?= $row["hn"] ?> VN: <?= $row["vn_reg"] ?>
                                        </td>
                                    </tr>
                                    <tr class="border-b h-[2.5rem]">
                                        <td class="text-blue-600 text-center py-2 bg-blue-50"></td>
                                        <?php $is_disable = true; ?>
                                        <td class="px-2">อายุ ( <?= date('d-m-Y', strtotime($row["birth_date"])) ?> ) -
                                            ชาย <button <?= $is_disable == true ? "disabled" : "" ?>
                                                class="rounded-[5px] <?= $is_disable == true ? "bg-blue-200" : "bg-blue-500" ?> px-5 h-fit py-1 mx-2 text-white"
                                                title="Add Service Point Data">เพิ่ม</button> Out Patient :
                                            <?= $row["makedatetime"] ?> Patient Need :
                                        </td>
                                    </tr>
                                    <tr class="border-b h-[2.5rem]">
                                        <td class="text-blue-600 text-center py-2 bg-blue-50"></td>
                                        <td class="px-2"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="w-full border">

                        <div class="w-full border-b bg-gray-100 text-[14px]">
                            <ul class="flex">
                                <li class="tab-link px-4 py-2 border-r cursor-pointer hover:bg-white" data-tab="visit">
                                    Visit</li>
                                <!-- <li class="tab-link px-4 py-2 border-r cursor-pointer hover:bg-white" data-tab="info">Info</li>
                                <li class="tab-link px-4 py-2 border-r cursor-pointer hover:bg-white" data-tab="agent">Agent</li>
                                <li class="tab-link px-4 py-2 border-r cursor-pointer hover:bg-white" data-tab="notify">Notify Person</li>
                                <li class="tab-link px-4 py-2 border-r cursor-pointer hover:bg-white" data-tab="history">Medical History</li> -->
                            </ul>
                        </div>

                        <div class="tab-content w-full flex flex-col justify-start gap-2 p-4 hidden" id="visit">
                            <div class="flex flex-col justify-start gap-2">
                                <h2 class="text-blue-600 text-[18px] py-5 border-b border-dotted border-gray-200">Visit
                                    : <?= $row["visitdate"] ?> </h2>
                                <table class="w-full text-[14px]">
                                    <thead>
                                        <tr class="border border-gray-200 bg-gray-50">
                                            <th class="p-3 text-start border"></th>
                                            <th class="p-3 text-start border">VN/Sufix</th>
                                            <th class="p-3 text-start border">Visit Date/Appointment</th>
                                            <th class="p-3 text-start border">Visit In/Doctor</th>
                                            <th class="p-3 text-start border">Visit Out/Clinic</th>
                                            <th class="p-3 text-start border">Patient Type/Right</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="border-x border-b border-gray-200">
                                            <td class="p-3 text-start border">
                                                <button
                                                    class="rounded-[5px] bg-blue-500 px-5 h-fit py-1 mx-2 text-white"
                                                    title="Add N-Health Lab Request"><a
                                                        href="../labresulte/lab_request.php?hn=<?= $_GET["hn"] ?>&vn=<?= $row["vn_reg"] ?>&visitdate=<?= $_GET["visitdate"] ?>&doctor_id=<?= $row["doctor_id"] ?>">เพิ่ม</a></button>
                                            </td>
                                            <td class="p-3 text-start border"><?= $row["vn_reg"] ?></td>
                                            <td class="p-3 text-start border"><?= $row["appointmentno"] . "_1" ?></td>
                                            <td class="p-3 text-start border"><?= $row["doctor_name"] ?></td>
                                            <td class="p-3 text-start border"><?= $row["department_name"] ?></td>
                                            <td class="p-3 text-start border"><?= $row["appointment_type"] ?></td>

                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="flex flex-col justify-start gap-2">
                                <h2
                                    class="font-thin font-sans text-blue-600 text-[18px] py-5 border-b border-dotted border-gray-200">
                                    รายการบัตรนัด </h2>
                                <table class="w-full text-[14px]">
                                    <thead>
                                        <tr class="border border-gray-200 bg-gray-50">
                                            <th class="p-3 text-start border"></th>
                                            <th class="p-3 text-start border">VN</th>
                                            <th class="p-3 text-start border">Appointment</th>
                                            <th class="p-3 text-start border">Doctor</th>
                                            <th class="p-3 text-start border">App Time</th>
                                            <th class="p-3 text-start border">Appointment Type</th>
                                            <th class="p-3 text-start border">Clinic</th>
                                            <th class="p-3 text-start border">Procedure</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="border-x border-b border-gray-200">
                                            <td class="p-3 text-start border">
                                                <button hidden
                                                    class="rounded-[5px] bg-red-500 px-5 h-fit py-1 mx-2 text-white"
                                                    title="Add N-Health Lab Request">เคลียร์</button>
                                            </td>
                                            <td class="p-3 text-start border"><?= $row["vn_reg"] ?></td>
                                            <td class="p-3 text-start border"><?= $row["appointmentno"] ?></td>
                                            <td class="p-3 text-start border"><?= $row["doctor_name"] ?></td>
                                            <td class="p-3 text-start border">
                                                <?= date('H:i', strtotime($row["makedatetime"])) ?>
                                            </td>
                                            <td class="p-3 text-start border"><?= $row["appointment_type"] ?></td>
                                            <td class="p-3 text-start border"><?= $row["department_name"] ?></td>
                                            <td class="p-3 text-start border"><?= $row["procedure_name"] ?></td>

                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="flex flex-col justify-start gap-2">
                                <h2 class="text-blue-600 text-[18px] py-5 border-b border-dotted border-gray-200">
                                    Service Point Data </h2>
                                <table class="w-full text-[14px]">
                                    <thead>
                                        <tr class="border border-gray-200 bg-gray-50">
                                            <th class="p-3 text-start border"></th>
                                            <td class="p-3 text-start border">Code</td>
                                            <td class="p-3 text-start border">Template</td>
                                            <td class="p-3 text-start border">Suffix</td>
                                            <td class="p-3 text-start border">Action Type</td>
                                            <td class="p-3 text-start border">Create Date</td>
                                            <td class="p-3 text-start border">Modify By</td>
                                            <td class="p-3 text-start border">Report by</td>
                                            <td class="p-3 text-start border">Approve by</td>
                                            <td class="p-3 text-start border">Modify Date</td>
                                            <th class="p-3 text-start border"></th>
                                        </tr>
                                    </thead>
                                    <tbody hidden>
                                        <tr class="border-x border-b border-gray-200">
                                            <td class="p-3 text-start border">
                                                <button
                                                    class="rounded-[5px] bg-blue-500 px-5 h-fit py-1 mx-2 text-white"
                                                    title="Add N-Health Lab Request">คำนวณ</button>
                                            </td>
                                            <td class="p-3 text-start border">LAB001</td>
                                            <td class="p-3 text-start border">CBC</td>
                                            <td class="p-3 text-start border">1</td>
                                            <td class="p-3 text-start border">ทำซ้ำอีกครั้ง</td>
                                            <td class="p-3 text-start border">System ADMIN</td>
                                            <td class="p-3 text-start border">25/02/2025 15:55</td>
                                            <td class="p-3 text-start border">System ADMIN</td>
                                            <td class="p-3 text-start border">System</td>
                                            <td class="p-3 text-start border">25/02/2025 15:55</td>
                                            <td class="p-3 text-start flex justify-center items-center gap-2">
                                                <button class="bg-yellow-500 text-white p-2">แก้ไข</button>
                                                <button class="bg-red-500 text-white p-2">ลบ</button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="flex flex-col justify-start gap-2">
                                <h2 class="text-blue-600 text-[18px] py-5 border-b border-dotted border-gray-200">
                                    N-health Lab Request </h2>
                                <?php
                                $visitdate_1 = date('Y-m-d', strtotime($_GET["visitdate"]));
                                $sql_nh = "
SELECT 
    t1.*,
    t2.doctor_name,
    t3.lab_name,
    t3.*,
    t4.appuser_name AS a_name,
    t4.appuser_lname AS a_lname,
    t5.*
FROM
    nh_order t1
        LEFT OUTER JOIN
    doctor t2 ON t1.doctor_code = t2.doctor_code
        LEFT OUTER JOIN
    nh_lab t3 ON t1.nh_lab_code = t3.lab_code
        LEFT OUTER JOIN
    appuser t4 ON t1.accept_by = t4.appuser_id
        LEFT OUTER JOIN
    lab_sample_type t5 ON t3.lab_sample_type = t5.lab_sample_type_id
WHERE
    hn = '$_GET[hn]' AND vn = '$row[vn_reg]'
        AND visitdate = '$visitdate_1'
ORDER BY nh_order_id ASC
";

                                $rs1_order = mysqli_query($conn, $sql_nh);

                                ?>
                                <table class="w-full text-[14px]">
                                    <thead>
                                        <tr class="border border-gray-200 bg-gray-50">
                                            <th class="p-3 text-start border"></th>
                                            <th class="p-3 text-start border">Order No</th>
                                            <th class="p-3 text-start border">HN</th>
                                            <th class="p-3 text-start border">Doctor Name</th>
                                            <th class="p-3 text-start border">LAB / Sample Type</th>
                                            <th class="p-3 text-start border">Create Date</th>
                                            <th class="p-3 text-start border">Collect Date</th>
                                            <th class="p-3 text-start border">Estimate Time (Day)</th>
                                            <th class="p-3 text-start border">Status</th>
                                            <th class="p-3 text-start border">Accept By</th>
                                            <th class="p-3 text-start border"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php while ($row_order = mysqli_fetch_array($rs1_order)) { ?>
                                            <tr class="border-x border-b border-gray-200">
                                                <td class="p-3 text-start border">
                                                    <?php if ($row_order["status_code"] == "Waiting") { ?>
                                                        <form action="" method="post">
                                                            <input hidden type="text" name="order_number"
                                                                value="<?= $row_order["order_number"] ?>">
                                                            <input hidden type="text" name="MM_update" value="from2">
                                                            <button type="submit"
                                                                class="rounded-[5px] bg-blue-500 px-5 h-fit py-1 mx-2 text-white"
                                                                title="Add N-Health Lab Request">เช็คผล</button>
                                                        </form>
                                                    <?php } ?>
                                                </td>
                                                <td class="p-3 text-start border"><?= $row_order["order_number"] ?></td>
                                                <td class="p-3 text-start border"><?= $row_order["hn"] ?></td>
                                                <td class="p-3 text-start border"><?= $row["doctor_code"] ?> :
                                                    <?= $row["doctor_name"] ?>
                                                </td>
                                                <td class="p-3 text-start border"><?= $row_order["nh_lab_code"] ?> :
                                                    <?= $row_order["lab_name"] ?>
                                                </td>
                                                <td class="p-3 text-start border"><?= $row_order["create_date"] ?></td>
                                                <td class="p-3 text-start border">
                                                    <?= DateTime::createFromFormat("Y-m-d", $row_order["collect_date"])->format("d-m-Y") ?>
                                                    <br>
                                                    <?= DateTime::createFromFormat("H:i:s", $row_order["collect_time"])->format("H:i") ?>
                                                    <?php if ($row_order["status_code"] == "New") { ?>
                                                        <button class="bg-blue-500 p-2 text-white m-1 rounded-[5px]">
                                                            <a
                                                                href="../labresulte/lab_request_edit.php?order_number=<?= $row_order["order_number"] ?>&hn=<?= $row_order["hn"] ?>&visitdate=<?= $_GET["visitdate"] ?>">
                                                                Edit
                                                            </a>
                                                        </button>
                                                    <?php } ?>
                                                </td>
                                                <td class="p-3 text-start border"><?= $row_order["lab_estimate_time"] ?>
                                                </td>
                                                <td class="p-3 text-start border">
                                                    <p class="text-green-500">
                                                        <span
                                                            class="bg-gray-500 text-white text-sm font-semibold px-3 py-1 ">
                                                            <?= $row_order["status_code"] ?>
                                                        </span>

                                                    </p>
                                                </td>
                                                <td class="p-3 text-start border"><?= $row_order["accep_by"] ?></td>
                                                <td class="p-3 text-start flex justify-center items-center gap-2">
                                                    <?php if ($row_order["status_code"] == "New") { ?>
                                                        <form name="from_1" action="" method="post">
                                                            <input hidden type="text" name="order_number"
                                                                value="<?= $row_order["order_number"] ?>">
                                                            <input hidden type="text" name="MM_update" value="from1">
                                                            <button type="submit"
                                                                class="bg-pink-500 text-white p-2">Send</button>
                                                        </form>
                                                    <?php } else if ($row_order["status_code"] == "RESULTED") { ?>
                                                            <button onclick="openModal()"
                                                                class="bg-green-500 text-white p-2">Verify</button>
                                                    <?php } ?>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="tab-content p-4 hidden" id="info">
                            <h2 class="text-lg font-semibold">Patient Info</h2>
                            <p>ข้อมูลผู้ป่วย เช่น ชื่อ อายุ เพศ...</p>
                        </div>

                        <div class="tab-content p-4 hidden" id="agent">
                            <h2 class="text-lg font-semibold">Agent Details</h2>
                            <p>ข้อมูลตัวแทนผู้ป่วย...</p>
                        </div>

                        <div class="tab-content p-4 hidden" id="notify">
                            <h2 class="text-lg font-semibold">Notify Person</h2>
                            <p>ข้อมูลการแจ้งเตือนบุคคลที่เกี่ยวข้อง...</p>
                        </div>

                        <div class="tab-content p-4 hidden" id="history">
                            <h2 class="text-lg font-semibold">Medical History</h2>
                            <p>ประวัติการรักษาและการตรวจ...</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div id="verifyModal" class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center hidden">
        <div class="bg-white w-[80%] h-[80%] p-5 rounded-lg shadow-lg relative">
            <button onclick="closeModal()"
                class="absolute top-2 right-2 bg-red-500 text-white px-3 py-1 rounded">X</button>
            <iframe id="verifyIframe" src="" class="w-full h-full border"></iframe>
        </div>
    </div>

    <script>
        function openModal() {
            document.getElementById('verifyIframe').src = '../labresulte/veiw_resulte.php';
            document.getElementById('verifyModal').classList.remove('hidden');
        }

        function closeModal() {
            document.getElementById('verifyModal').classList.add('hidden');
        }
    </script>

</body>

</html>