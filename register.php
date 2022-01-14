<!DOCTYPE html>
<html lang="en">
<head>
    <title>Registrasi Akun | UKL Laundry</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Naufal Akbar Nugroho">
    <meta name="description" content="Create Web Contact App with Node.js Web Server">
    <meta property="og:title" content="Registrasi Akun | UKL Laundry">
    <meta property="og:description" content="Create Web Contact App with Node.js Web Server">
    <!-- <meta property="og:url" content="/this-page.html"> -->
    <!-- <meta property="og:site_name" content="Your Site Name"> -->
    <!-- <link rel="icon" type="image/svg+xml" href="../public/favicon-org.ico"> -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
</head>
<body>
    <?php include('components/navbar.php') ?>
    <div class="min-h-screen bg-gray-900 py-6 flex flex-col justify-center sm:py-12">
        <div class="relative py-3 sm:max-w-xl sm:mx-auto">
            <div
                class="absolute inset-0 bg-gradient-to-r from-blue-300 to-blue-600 shadow-lg transform -skew-y-6 sm:skew-y-0 sm:-rotate-6 sm:rounded-3xl">
            </div>
            <div class="relative px-4 py-10 bg-white shadow-lg sm:rounded-3xl sm:p-20">
                <div class="max-w-md mx-auto">
                    <div>
                        <h1 class="text-2xl font-semibold">Silakan Masukkan Data Anda!</h1>
                    </div>
                    <div class="divide-y divide-gray-200">
                        <div class="py-8 text-base leading-6 space-y-4 text-gray-700 sm:text-lg sm:leading-7">
                            <form action="utils/process-regist.php" method="post">
                                <div class="relative">
                                    <input autocomplete="off" id="name" name="name" type="text" class="peer placeholder-transparent h-10 w-full border-b-2 border-gray-300 text-gray-900 focus:outline-none" placeholder="Name" />
                                    <label for="name" class="absolute left-0 -top-3.5 text-gray-600 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-gray-600 peer-focus:text-sm">Name</label>
                                </div>
                                <div class="relative mt-5">
                                    <input autocomplete="off" id="username" name="username" type="text" class="peer placeholder-transparent h-10 w-full border-b-2 border-gray-300 text-gray-900 focus:outline-none" placeholder="Username" />
                                    <label for="username" class="absolute left-0 -top-3.5 text-gray-600 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-gray-600 peer-focus:text-sm">Username</label>
                                </div>
                                <div class="relative mt-5">
                                    <input autocomplete="off" id="password" name="password" type="password" class="peer placeholder-transparent h-10 w-full border-b-2 border-gray-300 text-gray-900 focus:outline-none" placeholder="Password" />
                                    <label for="password" class="absolute left-0 -top-3.5 text-gray-600 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-gray-600 peer-focus:text-sm">Password</label>
                                </div>
                                <div class="relative mt-5">
                                    <label for="roles" class="peer h-10 w-full text-gray-600">Roles</label>
                                    <select name="roles" id="roles" class="peer placeholder-transparent h-10 w-full border-gray-300 text-gray-900 focus:outline-none">
                                        <option value="choose" disabled selected>Pilih Jabatan</option>
                                        <option value="admin">admin</option>
                                        <option value="cashier">cashier</option>
                                    </select>
                                    <!-- <div class="flex justify-center">
                                        <div class="form-check form-check-inline mr-5">
                                            <input class="form-check-input form-check-input appearance-none rounded-full h-4 w-4 border border-gray-300 bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="radio" name="admin" id="admin" value="option1">
                                            <label class="form-check-label inline-block text-gray-800" for="admin">admin</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input form-check-input appearance-none rounded-full h-4 w-4 border border-gray-300 bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="radio" name="cashier" id="cashier" value="option2">
                                            <label class="form-check-label inline-block text-gray-800" for="cashier">cashier</label>
                                        </div> -->
                                    </div>
                                </div>
                                <div class="relative mt-5">
                                    <button type="submit" class="w-full bg-blue-600 text-white rounded-md px-2 py-1 hover:bg-blue-700">Daftar Akun</button>
                                </div>
                            </form>
                            <div class="items-center justify-center mx-auto text-center mt-5">
                                <p class="text-md">Sudah memiliki akun? <a href="login.php" class="underline text-blue-600 hover:text-blue-700">Masuk!</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include('components/footer.php') ?>
</body>
</html>