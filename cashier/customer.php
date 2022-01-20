<!DOCTYPE html>
<html lang="en">
<head>
    <title>Dashboard Kasir | UKL Laundry</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Naufal Akbar Nugroho">
    <meta name="description" content="Create Web Laundry App with PHP Native">
    <meta property="og:title" content="UKL Laundry | Naufal Akbar Nugroho">
    <meta property="og:description" content="Create Web Laundry App with PHP Native">
    <!-- <meta property="og:url" content="/this-page.html"> -->
    <!-- <meta property="og:site_name" content="Your Site Name"> -->
    <!-- <link rel="icon" type="image/svg+xml" href="../public/favicon-org.ico"> -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <style>
      /* Custom style */
      .header-right {
          width: calc(100% - 3.5rem);
      }
      .sidebar:hover {
          width: 16rem;
      }
      @media only screen and (min-width: 768px) {
          .header-right {
              width: calc(100% - 16rem);
          }        
      }
    </style>
</head>
<body>
<div x-data="setup()" :class="{ 'dark': isDark }">
    <div class="min-h-screen flex flex-col flex-auto flex-shrink-0 antialiased bg-white dark:bg-gray-700 text-black dark:text-white">
      <?php include ('../utils/layouts/dashboard-cashier.php') ?>
    
      <div class="h-full ml-14 mt-14 mb-10 md:ml-64">
        <!-- Client Table -->
        <div class="mt-4 mx-4">
          <h1 class="text-xl font-bold uppercase mb-5">Daftar Pelanggan</h1>
          <div class="w-full overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto">
              <table class="w-full">
                <thead>
                  <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                    <th class="px-4 py-3">Nama Pelanggan</th>
                    <th class="px-4 py-3">Alamat</th>
                    <th class="px-4 py-3">Gender</th>
                    <th class="px-4 py-3">No. Telepon</th>
                    <th class="px-4 py-3">Aksi</th>
                  </tr>
                </thead>
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                  <?php
                    include ('../sql/db-laundry.php');
                    $qry_karyawan = mysqli_query($con,"select * from member");
                    $no=0;
                    while($data = mysqli_fetch_array($qry_karyawan)){
                    $no++;
                  ?>
                  <tr class="bg-gray-50 dark:bg-gray-800 hover:bg-gray-100 dark:hover:bg-gray-900 text-gray-700 dark:text-gray-400">
                    <td class="px-4 py-3">
                      <div class="flex items-center text-sm">
                        <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                          <img class="object-cover w-full h-full rounded-full" src="https://therminic2018.eu/wp-content/uploads/2018/07/dummy-avatar.jpg" alt="employee avatar" loading="lazy" />
                          <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                        </div>
                        <div>
                          <p class="font-semibold"><?=$data['name'] ?></p>
                        </div>
                      </div>
                    </td>
                    <td class="px-4 py-3 text-sm"><?=$data['address'] ?></td>
                    <td class="px-4 py-3 text-xs">
                      <?php if($data['gender'] == 'Male'){ ?>
                        <span class="px-2 py-1 font-semibold leading-tight">Laki-laki</span>
                      <?php }else{ ?>
                        <span class="px-2 py-1 font-semibold leading-tight">Perempuan</span>
                      <?php } ?>
                    </td>
                    <td class="px-4 py-3 text-sm"><?=$data['phone'] ?></td>
                    <td class="px-4 py-3 text-sm flex sm:flex-row flex-col">
                      <a href="update-customer.php?name=<?=$data['name']?>" class="px-4 py-2 text-xs rounded-full text-white bg-blue-600 hover:bg-blue-700"><i class="bi bi-pencil-square"></i> Ubah</a>
                      <a href="../utils/cashier/process-delete-customer.php?name=<?=$data['name']?>" class="px-4 py-2 text-xs rounded-full text-white bg-red-600 hover:bg-red-700" onclick="return confirm('Apakah anda yakin menghapus data ini?')"><i class="bi bi-trash"></i> Hapus</a>
                    </td>
                  </tr>
                  <?php 
                    }
                  ?>
                </tbody>
              </table>
            </div>
            <div class="grid px-4 py-3 font-semibold uppercase border-t border-gray-700 sm:grid-cols-4 bg-gray-800">
              <a href="register-customer.php" class="flex mx-auto col-end-6 text-white bg-green-700 border-0 py-2 px-8 focus:outline-none hover:bg-green-800 rounded text-sm">Tambah Pelanggan</a>
            </div>
          </div>
        </div>
        <!-- ./Client Table -->
      </div>
    </div>
  </div>    

  <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.0/dist/alpine.min.js" defer></script>
  <script>
    const setup = () => {
      const getTheme = () => {
        if (window.localStorage.getItem('dark')) {
          return JSON.parse(window.localStorage.getItem('dark'))
        }
        return !!window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches
      }

      const setTheme = (value) => {
        window.localStorage.setItem('dark', value)
      }

      return {
        loading: true,
        isDark: getTheme(),
        toggleTheme() {
          this.isDark = !this.isDark
          setTheme(this.isDark)
        },
      }
    }
  </script>
</body>
</html>