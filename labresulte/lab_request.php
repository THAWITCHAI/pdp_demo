<?php include('../assets/html/header' . '.php'); ?>

<?php
$patient_id;
$hn = $_GET["hn"];
$vn = $_GET["vn"];
$visitdate = date('Y-m-d', strtotime($_GET["visitdate"]));
$create_date = date("Y-m-d H:i:s");
$status_code = "New";
if ($_POST) {
    $order_number = "NH" . (str_pad($hn, 5, "0", STR_PAD_LEFT)+date("His"));
    mysqli_set_charset($conn, "utf8mb4");

    $sql = "INSERT INTO nh_order (order_number, hn, vn, visitdate, doctor_code, nh_lab_code, create_date, status_code, collect_date, collect_time) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    // ใช้ Prepared Statement เพื่อป้องกัน SQL Injection
    $stmt = $conn->prepare($sql);
    $stmt->bind_param(
        "ssssssssss",
        $order_number,
        $hn,
        $vn,
        $visitdate,
        $_POST["doctor_code"],
        $_POST["nh_lab_code"],
        $create_date,
        $status_code,
        $_POST["collect_date"],
        $_POST["collect_time"]
    );
    $stmt->execute();
    $patient_id = $conn->insert_id;
    header(sprintf("Location: %s", "../reg/visit.php?hn=$hn&s_mode=VIEW&visitdate=$_GET[visitdate]"));
    // ปิดการเชื่อมต่อ
    $stmt->close();
    $conn->close();
}
?>
<script src="https://cdn.tailwindcss.com"></script>
<body>
    <div class="w-full h-screen">
        <?php include('../assets/html/navbar' . '.php'); ?>
        <div class="w-full h-fit flex justify-center items-start">
            <?php include('../assets/html/sidebar' . '.php'); ?>
            <div class="w-[86%] border-l border-gray-200 bg-white h-fit py-[0.5px] flex flex-col justify-start items-center">
                <div class="w-full  h-[2.48rem] text-[14px] flex items-center hover:bg-[#fff] cursor-pointer p-2 bg-[#f8f8f8] border-y border-gray-200">
                    <a href="../main/patient_add_universal.php" class="text-blue-600">Home</a>
                </div>
                <div class="w-full h-fit p-3">
                    <h1 class="text-xl text-blue-600 font-light mb-2">N-health Lab Request <small class="text-gray-500"><i class="fi fi-ts-angle-double-small-right"></i></small><small class="px-2">Edit</small></h1>
                    <hr class="text-gray-300">
                </div>
                <form action="" method="POST" class="p-2 w-[50%] flex flex-col justify-center items-center gap-5 text-[14px] text-gray-700">
                    <div class="w-[70%] flex justify-center items-center gap-5">
                        <label for="" class="w-[30%] text-end">HN :</label>
                        <input disabled value="<?= $_GET["hn"] ?>" name="hn" type="text" class="border border-gray-200 w-full h-[2rem] outline-orange-500 outline-hidden focus:outline focus:border-none px-2">
                    </div>
                    <div class="w-[70%] flex justify-center items-center gap-5">
                        <label for="" class="w-[30%] text-end">แพทย์ :</label>
                        <select name="doctor_code" required class="border border-gray-200 w-full h-[2rem] outline-orange-500 outline-hidden focus:outline focus:border-none px-2">
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
                                <option <?= $row['doctor_id'] == "$_GET[doctor_id]" ? "selected" : "" ?> value="<?= $row['doctor_id'] ?>"><?= $row['doctor_name'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="w-[70%] flex justify-center items-center gap-5">
                        <label for="" class="w-[30%] text-end">LAB :</label>
                        <select name="nh_lab_code" required class="border border-gray-200 w-full h-[2rem] outline-orange-500 outline-hidden focus:outline focus:border-none px-2">
                            <option value="">กรูณาเลือก</option>
                            <?php
                            $sql = "
                                select  *,concat(lab_code,' ',lab_name) as name from nh_lab
                                ";
                            mysqli_set_charset($conn, "utf8mb4");
                            $doctor = mysqli_query($conn, $sql);
                            while ($row_2 = mysqli_fetch_assoc($doctor)) { ?>
                                <option value="<?=$row_2['lab_code'] ?>"><?= $row_2['name'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="w-[70%] flex justify-center items-center gap-5">
                        <label for="" class="w-[30%] text-end">Date :</label>
                        <input value="<?= date('Y-m-d') ?>" name="collect_date" type="date" class="border border-gray-200 w-full h-[2rem] outline-orange-500 outline-hidden focus:outline focus:border-none px-2">
                    </div>
                    <div class="w-[70%] flex justify-center items-center gap-5">
                        <label for="" class="w-[30%] text-end">Time :</label>
                        <input value="<?= date("H:i") ?>" name="collect_time" type="time" class="border border-gray-200 w-full h-[2rem] outline-orange-500 outline-hidden focus:outline focus:border-none px-2">
                    </div>

                    <div class="w-[70%] flex justify-end items-center gap-5">
                        <button type="submit" class="cursor-pointer px-3 py-1 text-white flex justify-center items-center bg-blue-400 hover:bg-blue-500 border border-blue-600">เพิ่มข้อมูล</button>
                        <button onclick="history_back()" type="button" class="cursor-pointer px-3 py-1 text-white flex justify-center items-center bg-red-400 hover:bg-red-500 border border-red-600">ยกเลิก</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
<script>
    const history_back = () => {
        window.history.back()
    }
</script>