<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: ../auth/login.php");
    exit();
}
?>
<?php require_once('../Connected/connect.php'); ?>

<?php include('../assets/html/header' . '.php'); ?>
<?php
if ($_POST["specialty_name"]) {
    $specialty_name = strval($_POST["specialty_name"]);
    mysqli_set_charset($conn, "utf8mb4");
    $rs1 = mysqli_query(
        $conn,
        "
    UPDATE 
        `specialty` 
    SET
        `specialty_remark` = '$_POST[specialty_remark]',
        `specialty_name` = '$_POST[specialty_name]',
        `specialty_name_en` = '$_POST[specialty_name_en]' 
    WHERE (`specialty_id` = '$_POST[specialty_id]');
    "
    );
    header("Location: ../main/specialty.php");
    print_r($_POST);
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
                    <h1 class="text-xl text-blue-600 font-light mb-2">Specialty <small class="text-gray-500"><i class="fi fi-ts-angle-double-small-right"></i></small><small class="px-2">Edit</small></h1>
                    <hr class="text-gray-300">
                </div>
                <form method="post" class="p-2 w-[50%] flex flex-col justify-center items-center gap-5 text-[14px] text-gray-700">
                    <?php
                    mysqli_set_charset($conn, "utf8mb4");
                    $query_rs_deapartment = mysqli_query($conn, "select * from specialty where specialty_id = $_GET[specialty_id]");
                    $row_rs_specialty = mysqli_fetch_assoc($query_rs_deapartment);
                    ?>

                    <div class="w-[70%] flex justify-center items-center gap-5">
                        <label for="" class="w-[30%] text-end">Name :</label>
                        <input value="<?= $row_rs_specialty['specialty_name'] ?>" name="specialty_name" required type="text" class="border border-gray-200 w-full h-[2rem] outline-orange-500 outline-hidden focus:outline focus:border-none px-2">
                    </div>
                    <div class="w-[70%] flex justify-center items-center gap-5">
                        <label for="" class="w-[30%] text-end">Name(EN) :</label>
                        <input value="<?= $row_rs_specialty['specialty_name_en'] ?>" name="specialty_name_en" type="text" class="border border-gray-200 w-full h-[2rem] outline-orange-500 outline-hidden focus:outline focus:border-none px-2">
                    </div>
                    <input name="specialty_id" value="<?= $_GET["specialty_id"] ?>" type="text" class="hidden">
                    <div class="w-[70%] flex justify-center items-center gap-5">
                        <label for="" class="w-[30%] text-end">Remark :</label>
                        <textarea name="specialty_remark" type="text" class="border border-gray-200 w-full h-[2rem] outline-orange-500 outline-hidden focus:outline focus:border-none px-2 py-2 h-[5rem]"><?= $row_rs_specialty['specialty_remark'] ?></textarea>
                    </div>
                    <div class="w-[70%] flex justify-end items-center gap-5">
                        <button type="submit" class="cursor-pointer px-3 py-1 text-white flex justify-center items-center bg-blue-400 hover:bg-blue-500 border border-blue-600">แก้ไขข้อมูล</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>