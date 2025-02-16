<?php include('../assets/html/header' . '.php'); ?>
<?php
if ($_POST) {
    // $appointment_type = strval($_POST["appointment_type"]);
    mysqli_set_charset($conn, "utf8mb4");
    $rs1 = mysqli_query(
        $conn,
        "
    UPDATE 
        appointment_type
    SET
        `appointment_type` = '$_POST[appointment_type]',
        `is_calculate` = '$_POST[is_calculate]',
        `can_insert` = '$_POST[can_insert]' ,
        `slot_ratio` = '$_POST[slot_ratio]' 
    WHERE (`appointment_type_id` = '$_POST[appointment_type_id]');
    "
    );
    header("Location: ../main/appointment_type.php");
    // print_r($_POST);
}
?>

<!DOCTYPE html>
<html lang="en">
<?php include('../assets/html/header' . '.php'); ?>

<body>
    <div class="w-full h-screen">
        <?php include('../assets/html/navbar' . '.php'); ?>
        <div class="w-full h-fit flex justify-center items-start">
            <?php include('../assets/html/sidebar' . '.php'); ?>
            <div class="w-[86%] border-l border-gray-200 bg-white h-fit py-[0.5px] flex flex-col justify-start items-center">
                <div href="patient_add_universal.php" class="w-full  h-[2.48rem] text-[14px] flex items-center hover:bg-[#fff] cursor-pointer p-2 bg-[#f8f8f8] border-y border-gray-200">
                    <a class="text-blue-600">Home</a>
                </div>
                <div class="w-full h-fit p-3">
                    <h1 class="text-xl text-blue-600 font-light mb-2">Appointment Type <small class="text-gray-500"><i class="fi fi-ts-angle-double-small-right"></i></small><small class="px-2">Edit</small></h1>
                    <hr class="text-gray-300">
                </div>


                <form method="post" class="p-2 w-[50%] flex flex-col justify-center items-center gap-5 text-[14px] text-gray-700">

                    <?php
                    mysqli_set_charset($conn, "utf8mb4");
                    $query_rs_deapartment = mysqli_query($conn, "select * from appointment_type where appointment_type_id = $_GET[appointment_type_id]");
                    $row_rs_appointment_type = mysqli_fetch_assoc($query_rs_deapartment);
                    ?>


                    <div class="w-[90%] flex justify-center items-center gap-5">
                        <label for="" class="w-[50%] text-end">Appointment Type :</label>
                        <input value="<?= $row_rs_appointment_type['appointment_type'] ?>" required name="appointment_type" type="text" class="border border-gray-200 w-full h-[2rem] outline-orange-500 outline-hidden focus:outline focus:border-none px-2">
                    </div>
                    <div class="w-[90%] flex justify-center items-center gap-5">
                        <label for="" class="w-[50%] text-end">ใช้ในการคำนวณ :</label>
                        <select name="is_calculate" required type="text" class="border border-gray-200 w-full h-[2rem] outline-orange-500 outline-hidden focus:outline focus:border-none px-2">
                            <option <?php if (!(strcmp("N", htmlentities($row_rs_appointment_type['is_calculate'])))) {
                                        echo "SELECTED";
                                    } ?> value="N">No</option>
                            <option <?php if (!(strcmp("Y", htmlentities($row_rs_appointment_type['is_calculate'])))) {
                                        echo "SELECTED";
                                    } ?> value="Y">Yes</option>
                        </select>
                    </div>
                    <div class="w-[90%] flex justify-center items-center gap-5">
                        <label for="" class="w-[50%] text-end">สร้าง slot ใหม่ แยกจาก slot หลัก :</label>
                        <select name="can_insert" required type="text" class="border border-gray-200 w-full h-[2rem] outline-orange-500 outline-hidden focus:outline focus:border-none px-2">
                            <option <?php if (!(strcmp("N", htmlentities($row_rs_appointment_type['can_insert'])))) {
                                        echo "SELECTED";
                                    } ?> value="N">No</option>
                            <option <?php if (!(strcmp("Y", htmlentities($row_rs_appointment_type['can_insert'])))) {
                                        echo "SELECTED";
                                    } ?> value="Y">Yes</option>
                        </select>
                    </div>
                    <div class="w-[90%] flex justify-center items-center gap-5">
                        <label for="" class="w-[50%] text-end">สัดส่วนการใช้ Slot(%) :</label>
                        <input value="<?= $row_rs_appointment_type['slot_ratio'] ?>" required name="slot_ratio" type="text" class="border border-gray-200 w-full h-[2rem] outline-orange-500 outline-hidden focus:outline focus:border-none px-2">
                    </div>
                    <input name="appointment_type_id" value="<?= $_GET["appointment_type_id"] ?>" type="text" class="hidden">

                    <div class="w-[70%] flex justify-end items-center gap-5">
                        <button type="submit" class="cursor-pointer px-3 py-1 text-white flex justify-center items-center bg-blue-400 hover:bg-blue-500 border border-blue-600">เพิ่มข้อมูล</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>