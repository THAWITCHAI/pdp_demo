<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: ../auth/login.php");
    exit();
}
?>
<?php require_once('../Connected/connect.php'); ?>
<? include('../assets/html/header' . '.php'); ?>

<?php
mysqli_set_charset($conn, "utf8mb4");
$rs1;

if ($_GET) {
    $rs1 = mysqli_query($conn, "SELECT 
    *
FROM
    demo_pdp.specialty
WHERE
    specialty_name LIKE '%$_GET[specialty_name]%';");
} else {
    $rs1 = mysqli_query($conn, "select * from specialty");
}
?>

<body>
    <div class="w-full h-screen">
        <? include('../assets/html/navbar' . '.php'); ?>
        <div class="w-full h-[93%] flex justify-center items-center">
            <? include('../assets/html/sidebar' . '.php'); ?>
            <div class="w-[86%] bg-white h-full py-[0.5px] border-l border-gray-200">
                <div class="w-full  h-[2.48rem] text-[14px] flex items-center hover:bg-[#fff] cursor-pointer p-2 bg-[#f8f8f8] border-y border-gray-200">
                    <a href="patient_add_universal.php" class="text-blue-600">Home</a>
                </div>
                <div class="w-full h-fit p-3">
                    <h1 class="text-xl text-blue-600 font-light mb-2">Specialty</h1>
                    <hr class="text-gray-300">
                    <form method="GET" class="w-full p-2 ring-1 ring-gray-300 my-5 flex flex-col justify-center items-center gap-2">
                        <h1 class="w-full p-2 bg-[linear-gradient(to bottom,#ffffff 0%,#eeeeee 100%)] text-blue-500 shadow-xs">Search</h1>
                        <div class="w-full flex gap-10 justify-start items-center p-2">
                            <input value="<?= $_GET["specialty_name"] ?>" name="specialty_name" placeholder="Name" type="text" class="text-sm ring-1 ring-gray-300  h-[2rem] outline-none px-2 rounede-xs  w-1/4">
                        </div>
                        <div class="w-full flex gap-10 justify-end items-center p-2">
                            <button type="submit" class="text-sm border border-blue-600 w-[12.3%] h-[2rem] rounded-xs bg-blue-400 shadow-lg hover:bg-blue-600 cursor-pointer text-white">Search</button>
                            <button type="reset" class="text-[14px] w-[12.3%] border border-red-600 h-[2rem] rounded-xs bg-red-400 shadow-lg hover:bg-red-700 cursor-pointer text-white"><a class="w-full h-full" href="specialty.php">Reset</a></button>
                        </div>
                    </form>
                    <div class="w-full my-2 h-fit">
                        <button class="bg-green-400 hover:bg-green-500 px-4 py-2 text-sm text-white border border-green-600 cursor-pointer"><a href="specialty_edit.php">Add New</a></button>
                    </div>
                    <div class="w-full h-fit">
                        <div class="relative overflow-x-auto ">
                            <table class="w-full  text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                <thead class="bg-gray-100 shadow-sm text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                    <tr class="">
                                        <th scope="col" class="px-5 py-4 border border-gray-300 ">Specialty Name</th>
                                        <th scope="col" class="px-5 py-4 border-y border-gray-300 ">Specialty Name English</th>
                                        <th scope="col" class="px-1 py-4 border border-gray-300 "></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <? while ($row = mysqli_fetch_assoc($rs1)) { ?>
                                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">

                                            <td class="px-5 py-4 border border-gray-300">
                                                <?= $row['specialty_name'] ?>
                                            </td>
                                            <td class="px-5 py-4 ">
                                                <?= $row['<?php include'] ?>
                                            </td>
                                            <td class="px-5 py-4 border-l border-r border-gray-300 gap-2 flex justify-center items-center">
                                                <a href="./specialty_del.php?specialty_id=<?= $row['specialty_id'] ?>">
                                                    <button class="border border-red-600 hover:bg-red-600 text-[14px] px-2 py-1 bg-red-400 text-white cursor-pointer">Delete</button>
                                                </a>
                                                <a href="./specialty_update.php?specialty_id=<?= $row['specialty_id'] ?>">
                                                    <button class="border border-yellow-600 hover:bg-yellow-600 text-[14px] px-2 py-1 bg-yellow-400 text-white cursor-pointer">Edit</button>
                                                </a>
                                            </td>
                                        </tr>
                                    <? } ?>
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