<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
</head>
<style>
    *{
        font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        font-size: 14px;
    }
</style>

<body class="flex flex-col justify-start pt-10 items-center gap-2 w-full min-h-screen">
    <div>
        PDP System
    </div>
    <h1>release:DEV.2.10</h1>
    <div class="bg-gray-50 shadow-sm w-1/4">
        <div class="w-full flex">
            <button class="shadow-sm w-full">Staff</button>
            <button class="shadow-sm w-full">Doctor</button>
        </div>
        <div class="w-full p-5 flex flex-col gap-4 justify-center items-center">
            <h1 class="w-full">ระบบสำหรับเจ้าหน้าที่ <hr></h1>
            <div class="flex flex-col gap-2 w-full">
                <input class="border w-full h-[2rem] text-[16px] px-2  rounded-sm" type="text" placeholder="Username">
                <input class="border w-full h-[2rem] text-[16px]  px-2 rounded-sm" type="text" placeholder="Password">
            </div>
        </div>
    </div>
</body>

</html>