<!DOCTYPE html>
<html lang="en">
<head>
    <title>Update Data Akun | UKL Laundry</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Naufal Akbar Nugroho">
    <meta name="description" content="Create Web Laundry App with PHP Native">
    <meta property="og:title" content="Registrasi Akun | UKL Laundry">
    <meta property="og:description" content="Create Web Laundry App with PHP Native">
    <!-- <meta property="og:url" content="/this-page.html"> -->
    <!-- <meta property="og:site_name" content="Your Site Name"> -->
    <!-- <link rel="icon" type="image/svg+xml" href="../public/favicon-org.ico"> -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
</head>
<body>
    <div class="min-h-screen bg-gray-900 py-6 flex flex-col justify-center sm:py-12">
        <div class="relative py-3 sm:max-w-xl sm:mx-auto">
            <div
                class="absolute inset-0 bg-gradient-to-r from-blue-300 to-blue-600 shadow-lg transform -skew-y-6 sm:skew-y-0 sm:-rotate-6 sm:rounded-3xl">
            </div>
            <div class="relative px-4 py-10 bg-white shadow-lg sm:rounded-3xl sm:p-20">
                <div class="max-w-md mx-auto">
                    <div>
                        <h1 class="text-2xl font-semibold">Silakan Masukkan Data!</h1>
                    </div>
                    <div class="divide-y divide-gray-200">
                        <div class="py-8 text-base leading-6 space-y-4 text-gray-700 sm:text-lg sm:leading-7">
                            <?php
                                include ('sql/db-laundry.php');
                                $qry_get=mysqli_query($con,"select * from user where name = '".$_GET['name']."'");
                                $dt_get=mysqli_fetch_array($qry_get);
                            ?>
                            <form action="utils/process-update-admin.php" method="post">
                                <div class="relative">
                                    <input autocomplete="off" id="name" name="name" type="text" value="<?=$dt_get['name'] ?>" class="peer placeholder-transparent h-10 w-full border-b-2 border-gray-300 text-gray-900 focus:outline-none" placeholder="Name" />
                                    <label for="name" class="absolute left-0 -top-3.5 text-gray-600 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-gray-600 peer-focus:text-sm">Name</label>
                                </div>
                                <div class="relative mt-5">
                                    <input autocomplete="off" id="username" name="username" type="text" value="<?=$dt_get['username'] ?>" class="peer placeholder-transparent h-10 w-full border-b-2 border-gray-300 text-gray-900 focus:outline-none" placeholder="Username" />
                                    <label for="username" class="absolute left-0 -top-3.5 text-gray-600 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-gray-600 peer-focus:text-sm">Username</label>
                                </div>
                                <div class="relative mt-5">
                                    <input autocomplete="off" id="password" name="password" type="text" value="<?=$dt_get['password'] ?>" class="peer placeholder-transparent h-10 w-full border-b-2 border-gray-300 text-gray-900 focus:outline-none" placeholder="Password" />
                                    <label for="password" class="absolute left-0 -top-3.5 text-gray-600 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-gray-600 peer-focus:text-sm">Password</label>
                                </div>
                                <div class="relative mt-5">
                                    <label for="roles" class="peer h-10 w-full text-gray-600">Roles</label>
                                    <?php 
                                        $arr_roles=array('admin'=>'admin','cashier'=>'cashier', 'owner'=>'owner');
                                    ?>
                                    <select name="roles" id="roles" class="peer placeholder-transparent h-10 w-full border-gray-300 text-gray-900 focus:outline-none">
                                        <option disabled>Pilih Jabatan</option>
                                        <?php foreach ($arr_roles as $key_roles => $val_roles):
                                            if($key_roles==$dt_get['role']){
                                                $selek="selected";
                                            } else {
                                                $selek="";
                                            }
                                        ?>
                                            <option value="<?=$key_roles?>" <?=$selek?>><?=$val_roles?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                                <div class="relative mt-5">
                                    <button type="submit" class="w-full bg-blue-600 text-white rounded-md px-2 py-1 hover:bg-blue-700">Update Data Akun</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include('components/footer.php') ?>
</body>
</html>