<!DOCTYPE html>
<html lang="en">
<head>
    <title>Dashboard Admin | UKL Laundry</title>
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
      <?php include ('../utils/layouts/dashboard-admin.php') ?>
    
      <div class="h-full ml-14 mt-14 mb-10 md:ml-64">
      <div class="min-h-screen py-6 flex flex-col justify-center sm:py-12">
            <div class="relative py-3 sm:max-w-xl sm:mx-auto">
                <div
                    class="absolute inset-0 bg-gradient-to-r from-blue-300 to-blue-600 shadow-lg transform -skew-y-6 sm:skew-y-0 sm:-rotate-6 sm:rounded-3xl">
                </div>
                <div class="relative px-4 py-10 bg-white shadow-lg sm:rounded-3xl sm:p-20">
                    <div class="max-w-md mx-auto">
                        <div>
                            <h1 class="text-2xl font-semibold text-black">Silakan Masukkan Data Transaksi!</h1>
                        </div>
                        <div class="divide-y divide-gray-200">
                            <div class="py-8 text-base leading-6 space-y-4 text-gray-700 sm:text-lg sm:leading-7">
                                <form action="transaction.php" method="get">
                                  <div class="relative mt-5">
                                    <label for="total_pckg" class="peer h-10 w-full text-gray-600">Jumlah Pemesanan</label>
                                    <div class="flex">
                                        <input type="number" name="total_pckg" id="total_pckg" class="peer placeholder-transparent h-10 w-full border-b-2 border-gray-300 text-gray-900 focus:outline-none" value="<?=$_GET['total_pckg'] ? $_GET['total_pckg'] : 1  ?>" min="1" />
                                        <button type="submit" class="w-24 ml-3 bg-blue-600 text-white rounded-md px-2 py-1 hover:bg-blue-700"><i class="bi bi-arrow-clockwise"></i></button>
                                    </div>
                                  </div>
                                </form>
                                <form action="../utils/process-transaction.php" method="post">
                                    <div class="relative mt-5">
                                        <label for="member" class="peer h-10 w-full text-gray-600">Pelanggan</label>
                                        <select name="member" id="member" class="peer placeholder-transparent h-10 w-full border-gray-300 text-gray-900 focus:outline-none">
                                            <option disabled>Pilih Nama Pelanggan</option>
                                            <?php
                                            include "../sql/db-laundry.php";
                                            $qry_member=mysqli_query($con,"select * from member");
                                            while($data_member=mysqli_fetch_array($qry_member)){
                                                echo '<option value="'.$data_member['id'].'">'.$data_member['name'].'</option>';    
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="relative mt-5">
                                        <label for="date" class="peer h-10 w-full text-gray-600">Tanggal Pemesanan</label>
                                        <input type="date" name="date" id="date" class="peer placeholder-transparent h-10 w-full border-b-2 border-gray-300 text-gray-900 focus:outline-none" placeholder="Tanggal Pemesanan" />
                                    </div>
                                    <div class="relative mt-5">
                                        <label for="deadline" class="peer h-10 w-full text-gray-600">Tanggal Selesai</label>
                                        <input type="date" name="deadline" id="deadline" class="peer placeholder-transparent h-10 w-full border-b-2 border-gray-300 text-gray-900 focus:outline-none" placeholder="Tanggal Selesai" />
                                    </div>
                                    <div class="relative mt-5">
                                        <label for="date_pay" class="peer h-10 w-full text-gray-600">Tanggal Bayar</label>
                                        <input type="date" name="date_pay" id="date_pay" class="peer placeholder-transparent h-10 w-full border-b-2 border-gray-300 text-gray-900 focus:outline-none" placeholder="Tanggal Bayar" />
                                    </div>
                                    <div class="relative mt-5">
                                      <label for="status" class="peer h-10 w-full text-gray-600">Status Pengerjaan</label>
                                        <select name="status" id="status" class="peer placeholder-transparent h-10 w-full border-gray-300 text-gray-900 focus:outline-none">
                                            <option  disabled selected>Pilih Status Pengerjaan</option>
                                            <option value="new">baru</option>
                                            <option value="process">proses</option>
                                            <option value="done">selesai</option>
                                            <option value="taken">diambil</option>
                                        </select>
                                    </div>
                                    <div class="relative mt-5">
                                      <label for="payment" class="peer h-10 w-full text-gray-600">Status Pembayaran</label>
                                        <select name="payment" id="payment" class="peer placeholder-transparent h-10 w-full border-gray-300 text-gray-900 focus:outline-none">
                                            <option  disabled selected>Pilih Pembayaran</option>
                                            <option value="pay">dibayar</option>
                                            <option value="not_pay">belum dibayar</option>
                                        </select>
                                    </div>
                                  <?php for($index = 0; $index < ($_GET['total_pckg'] ? $_GET['total_pckg'] : 1); $index++) : ?>
                                    <div class="relative mt-5">
                                        <label for="type" class="peer h-10 w-full text-gray-600">Tipe Jasa</label>
                                        <select name="id_package[]" id="id_package[]" class="peer placeholder-transparent h-10 w-full border-gray-300 text-gray-900 focus:outline-none">
                                            <option disabled>Pilih Jenis Tipe Jasa</option>
                                            <?php
                                            include "../sql/db-laundry.php";
                                            $qry_packg=mysqli_query($con,"select * from package");
                                            while($data_packg=mysqli_fetch_array($qry_packg)){
                                                echo '<option value="'.$data_packg['id'].'">'.$data_packg['type'].'</option>';    
                                            }
                                            ?>
                                          </select>
                                        </div>
                                    <div class="relative mt-5">
                                      <label for="qty" class="peer h-10 w-full text-gray-600">Kuantitas</label>
                                      <div class="flex">
                                        <input type="text" name="qty[]" id="qty[]" class="peer placeholder-transparent h-10 w-full border-b-2 border-gray-300 text-gray-900 focus:outline-none" placeholder="Kuantitas" />
                                        <span>Kg</span>
                                      </div>
                                    </div>
                                  <?php endfor; ?>
                                    <div class="relative mt-5">
                                        <button type="submit" class="w-full bg-blue-600 text-white rounded-md px-2 py-1 hover:bg-blue-700">Transaksi!</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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