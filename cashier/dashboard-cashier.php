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
        
        <!-- Statistics Cards -->
        <div class="grid grid-cols-1 sm:grid-cols-3 lg:grid-cols-4 p-4 gap-4">
          <div class="bg-blue-500 dark:bg-gray-800 shadow-lg rounded-md flex items-center justify-between p-3 border-b-4 border-blue-600 dark:border-gray-600 text-white font-medium group">
            <div class="flex justify-center items-center w-14 h-14 bg-white rounded-full transition-all duration-300 transform group-hover:rotate-12">
              <svg width="30" height="30" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="stroke-current text-blue-800 dark:text-gray-800 transform transition-transform duration-500 ease-in-out"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path></svg>
            </div>
            <div class="text-right">
              <?php include ('../sql/db-laundry.php');
                    $qry_outl = mysqli_query($con,"select * from outlet");
                    $i = mysqli_num_rows($qry_outl);
              ?>
              <p class="text-2xl"><?=$i ?></p>
              <p>Outlet</p>
            </div>
          </div>
          <div class="bg-blue-500 dark:bg-gray-800 shadow-lg rounded-md flex items-center justify-between p-3 border-b-4 border-blue-600 dark:border-gray-600 text-white font-medium group">
            <div class="flex justify-center items-center w-14 h-14 bg-white rounded-full transition-all duration-300 transform group-hover:rotate-12">
              <svg width="30" height="30" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="stroke-current text-blue-800 dark:text-gray-800 transform transition-transform duration-500 ease-in-out"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
            </div>
            <div class="text-right">
              <?php include ('../sql/db-laundry.php');
                    $qry_mmber = mysqli_query($con,"select * from member");
                    $i = mysqli_num_rows($qry_mmber);
              ?>
              <p class="text-2xl"><?=$i ?></p>
              <p>Pelanggan</p>
            </div>
          </div>
          <div class="bg-blue-500 dark:bg-gray-800 shadow-lg rounded-md flex items-center justify-between p-3 border-b-4 border-blue-600 dark:border-gray-600 text-white font-medium group">
            <div class="flex justify-center items-center w-14 h-14 bg-white rounded-full transition-all duration-300 transform group-hover:rotate-12">
              <svg width="30" height="30" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="stroke-current text-blue-800 dark:text-gray-800 transform transition-transform duration-500 ease-in-out"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path></svg>
            </div>
            <div class="text-right">
              <?php include ('../sql/db-laundry.php');
                    $qry_trnsct = mysqli_query($con,"select * from transaction");
                    $i = mysqli_num_rows($qry_trnsct);
              ?>
              <p class="text-2xl"><?=$i ?></p>
              <p>Traksaksi</p>
            </div>
          </div>
          <div class="bg-blue-500 dark:bg-gray-800 shadow-lg rounded-md flex items-center justify-between p-3 border-b-4 border-blue-600 dark:border-gray-600 text-white font-medium group">
            <div class="flex justify-center items-center w-14 h-14 bg-white rounded-full transition-all duration-300 transform group-hover:rotate-12">
              <svg width="30" height="30" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="stroke-current text-blue-800 dark:text-gray-800 transform transition-transform duration-500 ease-in-out"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
            </div>
            <div class="text-right">
              <?php include ('../sql/db-laundry.php');
                    $qry_user = mysqli_query($con,"select * from user");
                    $i = mysqli_num_rows($qry_user);
              ?>
              <p class="text-2xl"><?=$i ?></p>
              <p>Karyawan</p>
            </div>
          </div>
        </div>
        <!-- ./Statistics Cards -->
    
        <!-- Client Table -->
        <div class="mt-4 mx-4">
          <h1 class="text-xl font-bold uppercase mb-5">Daftar Transaksi</h1>
          <div class="w-full overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto">
              <table class="w-full">
                <thead>
                  <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                    <th class="px-4 py-3">Member</th>
                    <th class="px-4 py-3">Tanggal Pemesanan</th>
                    <th class="px-4 py-3">Tanggal Selesai</th>
                    <th class="px-4 py-3">Pembayaran</th>
                    <th class="px-4 py-3">Status</th>
                    <th class="px-4 py-3">Paket</th>
                    <th class="px-4 py-3">Total Harga</th>
                    <th class="px-4 py-3">Aksi</th>
                  </tr>
                </thead>
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                  <?php
                    include ('../sql/db-laundry.php');
                    $qry_transaction = mysqli_query($con,"SELECT t.id, m.name as name_member, t.date, t.deadline, t.date_pay, t.status, t.payment, u.name as name_employee, p.type as package, p.price * d_t.qty as total FROM transaction t, detail_transaction d_t, package p, member m, user u WHERE t.id_member = m.id AND t.id_user = u.id AND t.id = d_t.id_transaction AND p.id = d_t.id_package");
                    $no=0;
                    while($data = mysqli_fetch_array($qry_transaction)){
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
                          <p class="font-semibold"><?=$data['name_member'] ?></p>
                        </div>
                      </div>
                    </td>
                    <td class="px-4 py-3 text-sm"><?=$data['date'] ?></td>
                    <td class="px-4 py-3 text-sm"><?=$data['deadline'] ?></td>
                    <td class="px-4 py-3 text-xs">
                      <?php if ($data['payment'] == 'not_paid'){ ?>
                        <span class="px-2 py-1 font-semibold leading-tight text-white bg-red-700 rounded-full">Belum Lunas</span>
                      <?php } else { ?>
                        <span class="px-2 py-1 font-semibold leading-tight text-white bg-green-700 rounded-full">Lunas</span>
                      <?php } ?>
                    </td>
                    <td class="px-4 py-3 text-xs">
                      <?php if ($data['status'] == 'new' ) { ?>
                        <span class="px-2 py-1 font-semibold leading-tight text-white bg-red-700 rounded-full">Baru</span>
                      <?php } else if($data['status'] == 'process') { ?>
                        <span class="px-2 py-1 font-semibold leading-tight text-white bg-yellow-700 rounded-full">Proses</span>
                      <?php } else if($data['status'] == 'done') { ?>
                        <span class="px-2 py-1 font-semibold leading-tight text-white bg-blue-700 rounded-full">Selesai</span>
                      <?php } else if($data['status'] == 'taken') { ?>
                        <span class="px-2 py-1 font-semibold leading-tight text-white bg-green-700 rounded-full">Sudah Diambil</span>
                      <?php } else {
                                echo "Status Pengerjaan Tidak Diketahui";
                            }
                      ?>
                    </td>
                    <td>
                      <?php
                        if ($data['package'] == 'kiloan') {
                          echo "Kiloan";
                        } else if ($data['package'] == 'selimut') {
                          echo "Selimut";
                        } else if ($data['package'] == 'bed_cover') {
                          echo "Bed Cover";
                        } else if ($data['package'] == 'kaos') {
                          echo "kaos";
                        } else {
                          echo "Tipe Jasa Produk Tidak Diketahui";
                        }
                      ?>
                    </td>
                    <td class="px-4 py-3 text-sm">
                      Rp.
                      <?php
                        echo $data['total'];
                      ?>
                    </td>
                    <td class="px-4 py-3 text-sm flex sm:flex-row flex-col">
                      <a href="detail-transaction.php?id=<?=$data['id']?>" class="px-4 py-2 text-xs rounded-full text-white bg-blue-600 hover:bg-blue-700"><i class="bi bi-info-circle"></i> Detail</a>
                      <!-- <a href="../utils/process-delete-transaction.php?id=<?=$data['id']?>" class="px-4 py-2 text-xs rounded-full text-white bg-red-600 hover:bg-red-700"><i class="bi bi-trash"></i> Delete</a> -->
                    </td>
                  </tr>
                  <?php 
                    }
                  ?>
                </tbody>
              </table>
            </div>
            <div class="grid px-4 py-3 font-semibold uppercase border-t border-gray-700 sm:grid-cols-4 bg-gray-800">
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