<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
</head>
<style>
    * {
        font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
    }
</style>

<body class="flex flex-col justify-start pt-10 items-center gap-2 w-full min-h-screen bg-gray-200">
    <div class="text-blue-500 font-light text-[35px]">
        PDP System
    </div>
    <h1>release:DEV.2.10</h1>
    <div class="w-1/4 p-[1px] bg-blue-500">
        <form action="" method="post" class="bg-gray-50 shadow-sm w-full p-[1px]">
            <div class="w-full h-fit gap-[4px] flex">
                <button class="shadow-sm cursor-pointer w-full text-start text-[14px] bg-white p-2">Staff</button>
                <button class="shadow-sm cursor-pointer w-full text-start text-[14px] p-2">Doctor</button>
            </div>
            <div class="w-full p-5 flex flex-col gap-4 justify-center items-center">
                <h1 class="w-full">
                    <p class="text-lg text-blue-500 border-b border-gray-200">ระบบสำหรับเจ้าหน้าที่</p>
                </h1>
                <div class="flex flex-col gap-2 w-full">
                    <input required name="username" class="bg-white outline-none ring ring-gray-200  w-full h-[2rem] text-[14px] px-2  rounded-sm" type="text" placeholder="Username">
                    <input required name="password" class="bg-white outline-none ring ring-gray-200 w-full h-[2rem] text-[14px]  px-2 rounded-sm" type="password" placeholder="Password">
                    <div class="w-full p-2 flex justify-end items-center">
                        <button type="submit" class="px-4 py-1 text-white rounded-xs cursor-pointer bg-blue-500 w-1/4">Login</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</body>

</html>