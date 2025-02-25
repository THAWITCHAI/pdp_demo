<?php include('../assets/html/header' . '.php'); ?>

<body>
    <div class="w-full h-screen">
        <?php include('../assets/html/navbar' . '.php'); ?>
        <div class="w-full h-fit flex justify-center items-start">
            <?php include('../assets/html/sidebar' . '.php'); ?>
            <div class="w-[86%] border-l border-gray-200 bg-white h-fit py-[0.5px] flex flex-col justify-start items-center">
                <div class="w-full  h-[2.48rem] text-[14px] flex items-center hover:bg-[#fff] cursor-pointer p-2 bg-[#f8f8f8] border-y border-gray-200">
                    <a href="patient_add_universal.php" class="text-blue-600">Home</a>
                </div>
                <div class="w-full h-fit p-3">
                    <h1 class="text-xl text-blue-600 font-light mb-2">Gen VN - เปิด VN ใหม่ </h1>
                    <hr class="text-gray-300">
                </div>
                <form method="post" class="p-2 w-full flex flex-col justify-center items-center gap-5 text-[14px] text-gray-700">


                    <div class="relative overflow-x-auto w-full border-x border-t border-gray-200">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Appointment NO.
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Clear
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Doctor
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        App Time
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Appointment Type
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Clinic
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Procedure
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">

                                    <td class="px-6 py-4">
                                        20250224-002
                                    </td>
                                    <td class="px-6 py-4">

                                    </td>
                                    <td class="px-6 py-4">
                                        นพ.สมบัติ ตันโชติกุล
                                    </td>
                                    <td class="px-6 py-4">
                                        25/02/2025 09:15
                                    </td>
                                    <td class="px-6 py-4">
                                        ตรวจ OPD
                                    </td>
                                    <td class="px-6 py-4">
                                        MASพบแพทย์, WARD ( OPD-Day Surgery)
                                    </td>
                                    <td class="px-6 py-4">
                                        Observe
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="w-full flex justify-between items-start h-fit gap-10 p-2">
                        <div class="flex flex-col justify-center gap-2 items-center w-full h-fit ">
                            <div class="w-full flex justify-center gap-2 items-center">
                                <label class="w-[45%] h-[2rem] flex items-center justify-end text-end">สิทธิ์:</label>
                                <select class="border border-gray-200 w-full h-[2rem] outline-orange-500 outline-hidden focus:outline focus:border-none px-2" name="" id="">
                                    <option value="">ชำระเงินเอง</option>
                                </select>
                            </div>
                            <div class="w-full flex justify-center gap-2 items-center">
                                <label class="w-[45%] h-[2rem] flex items-center justify-end text-end">หมายเหตุ:</label>
                                <input class="border border-gray-200 w-full h-[2rem] outline-orange-500 outline-hidden focus:outline focus:border-none px-2" name="" id="" />
                            </div>
                            <div class="w-full flex justify-center gap-2 items-center">
                                <label class="w-[45%] h-[2rem] flex items-center justify-end text-end">Ref:</label>
                                <input disabled class="border border-gray-200 w-full h-[2rem] outline-orange-500 outline-hidden focus:outline focus:border-none px-2" name="" id="" />
                            </div>
                            <div class="w-full flex justify-center gap-2 items-center">
                                <label class="w-[45%] h-[2rem] flex items-center justify-end text-end">เลือกชุดเอกสาร:</label>
                                <select class="border border-gray-200 w-full h-[2rem] outline-orange-500 outline-hidden focus:outline focus:border-none px-2" name="" id="">
                                    <option value="">ใบนำทาง+ใบยา</option>
                                </select>
                            </div>
                            <div class="w-full flex justify-center gap-2 items-center">
                                <label class="w-[45%] h-[2rem] flex items-center justify-end text-end">พิมพ์เอกสาร:</label>
                                <select class="border border-gray-200 w-full h-[2rem] outline-orange-500 outline-hidden focus:outline focus:border-none px-2" name="" id="">
                                    <option value="">ใบนำทาง+ใบยา</option>
                                </select>
                            </div>
                            <div class="w-full flex justify-center gap-2 items-center">
                                <label class="w-[45%] h-[2rem] flex items-center justify-end text-end">จำนวนพิมพ์เอกสาร:</label>
                                <select class="border border-gray-200 w-full h-[2rem] outline-orange-500 outline-hidden focus:outline focus:border-none px-2" name="" id="">
                                    <option value="">1 ชุด</option>
                                </select>
                            </div>
                        </div>
                        <div class="w-full flex flex-col justify-start gap-2 items-center">
                            <h1 class="w-full h-[2rem] px-2">Appointment: 20250224-002 - นพ.สมบัติ ตันโชติกุล ( MASพบแพทย์ ) เวลานัด 09:15</h1>
                            <div class="w-full h-[2rem] bg-blue-100 flex justify-start text-blue-600 px-2 items-center">
                            09:15 นพ.สมบัติ ตันโชติกุล ( MASพบแพทย์ ) 
                            </div>
                            <div class="w-full h-[2rem] bg-blue-100 flex justify-start text-blue-600 px-2 items-center">
                            Observe
                            </div>
                        </div>
                    </div>

                    <div class="w-full flex justify-end gap-2 p-2">
                        <button class="cursor-pointer hover:bg-red-400 bg-red-500 p-2 text-white text-[14px]">ยกเลิก</button>
                        <button class="cursor-pointer hover:bg-blue-400 bg-blue-500 p-2 text-white text-[14px]">ยืนยันข้อมูลคนไข้</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>