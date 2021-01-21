<?php include('koneksi.php') ?>
<!-- BUAT STATISTIK -->

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>UKOM</title>
  <link rel="stylesheet" href="style.css" />
  <!-- FONT -->
  <link rel="preconnect" href="https://fonts.gstatic.com" />
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet" />
  <!-- DATA TABLES -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
  <!-- FONTAWESOME -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css">
  <style>
    html {
      scroll-behavior: smooth;
    }

    body {
      font-family: "Nunito", sans-serif;
    }

    body::before {
      content: "";
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: linear-gradient(#f00, #f0f);
      clip-path: circle(16% at right 70%);
    }

    body::after {
      content: "";
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      z-index: -2;
      background: linear-gradient(#2f1270, #8d0d38);
      clip-path: circle(20% at 10% 10%);
    }

    .bg-ungu {
      background-color: #272552;
    }

    .bg-ungu-2 {
      background: linear-gradient(rgba(146, 84, 204, 0.2),
          rgba(95, 70, 202, 0.2));
    }

    .bg-ungu-3 {
      background: linear-gradient(rgba(197, 132, 240, 0.2),
          rgba(185, 160, 217, 0.2));
    }

    .text-ungu-tua {
      color: #272552;
    }

    .text-ungu {
      color: #5954cc;
    }

    .bg-ungu-muda {
      background-image: linear-gradient(rgba(146, 84, 204, 0.2),
          rgba(95, 70, 202, 0.2));
      /* background: rgba(255, 255, 255, 0.1); */
      backdrop-filter: blur(5px);
    }

    .tinggi {
      min-height: 80vh;
    }

    /* CUSTOM HEIGHT */
    .height-50 {
      height: 50vh;
    }

    /* END CUSTOME HEIGHT */
    /* OUTSIDE STYLE */
    .gradient {
      background-image: linear-gradient(-225deg, #cbbacc 0%, #2580b3 100%);
    }

    .browser-mockup {
      border-top: 2em solid rgba(230, 230, 230, 0.7);
      position: relative;
      height: 60vh;
    }

    .browser-mockup:before {
      display: block;
      position: absolute;
      content: "";
      top: -1.25em;
      left: 1em;
      width: 0.5em;
      height: 0.5em;
      border-radius: 50%;
      background-color: #f44;
      box-shadow: 0 0 0 2px #f44, 1.5em 0 0 2px #9b3, 3em 0 0 2px #fb5;
    }

    .browser-mockup>* {
      display: block;
    }

    /* END OUTSIDE STYLE */
  </style>
</head>

<body class="bg-ungu">
  <!-- PEMBUNGKUS -->
  <div class="translate-x-10 bg-white rounded-t-lg w-1/5 fixed bottom-0 right-0 z-50">
    <div class="w-full border-t-8 border-purple-600 rounded-lg flex">
      <div class="w-1/3 pt-6 pl-2 flex self-center justify-center">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-16 h-16 bg-indigo-800 text-white p-3 rounded-full" fill="none" viewBox="0 0 24 24" height="24" width="24" xmlns="http://www.w3.org/2000/svg">
          <path xmlns="http://www.w3.org/2000/svg" d="M12 4.52765C9.64418 2.41689 6.02125 2.49347 3.75736 4.75736C1.41421 7.1005 1.41421 10.8995 3.75736 13.2426L10.5858 20.0711C11.3668 20.8521 12.6332 20.8521 13.4142 20.0711L20.2426 13.2426C22.5858 10.8995 22.5858 7.1005 20.2426 4.75736C17.9787 2.49347 14.3558 2.41689 12 4.52765ZM10.8284 6.17157L11.2929 6.63604C11.6834 7.02656 12.3166 7.02656 12.7071 6.63604L13.1716 6.17157C14.7337 4.60948 17.2663 4.60948 18.8284 6.17157C20.3905 7.73367 20.3905 10.2663 18.8284 11.8284L12 18.6569L5.17157 11.8284C3.60948 10.2663 3.60948 7.73367 5.17157 6.17157C6.73367 4.60948 9.26633 4.60948 10.8284 6.17157Z" fill="currentcolor"></path>
        </svg>
      </div>
      <div class="w-full pl-3 pt-9 pr-4">
        <h3 class="font-bold text-purple-900">Did you know?</h3>
        <p class="py-4 text-sm text-gray-800">COVID-19 is a new virus which has spread quickly to many countries around the world including in Southern Africa.</p>
      </div>
    </div>
  </div>
  <div id="home" class="pembungkus z-10 w-11/12 bg-ungu-muda mb-24 rounded-2xl h-screen mx-auto shadow-2xl pb-6 mb-6">
    <main class="flex h-full p-2">
      <!-- BAGIAN SIDEBAR -->
      <div class="w-1/12 flex flex-col py-8 justify-between items-center h-full rounded-xl bg-ungu mb-12 shadow-lg">
        <!-- FLEX HERE-->
        <!-- LOGO -->
        <div class="text-purple-400 font-bold text-lg bg-transparent p-2 rounded-full border-4 border-indigo-800">
          DZ.
        </div>
        <!-- END LOGO -->
        <!-- MENU BAR -->
        <div class="flex flex-col items-center">
          <button class="focus:outline-none">
            <a href="#home">
              <div class="p-2 bg-white text-center rounded-xl mb-6">
                <i class="fas fa-home text-ungu-tua text-xl"></i>
              </div>
            </a>
          </button>
          <button class="focus:outline-none">
            <a href="#statistika"><i class="fas fa-chart-line text-white mb-6 text-xl"></i></a>
          </button>
          <button class="focus:outline-none">
            <a href="#database"><i class="fas fa-database text-white mb-6 text-xl"></i></a>
          </button>
          <button class="focus:outline-none">
            <a href="#multimedia">
              <i class="fas fa-photo-video text-white text-xl"></i>
            </a>
          </button>
        </div>
        <!-- END MENU BAR -->
        <i class="fas fa-ad text-red-500 text-xl"></i>
      </div>
      <!-- END FLEX HERE-->

      <!--BAGIAN KANAN-->
      <div class="w-11/12 rounded-xl m-3 flex flex-col">
        <!-- 
          //TODO:
          1. Hapus bg-ungu / bg-white baris 89-->
        <!-- MENU MAIN -->
        <div class="mb-4 bg-ungu height-50 overflow-hidden py-4 rounded-lg px-6 text-white shadow-xl flex">
          <!--CHART CONTAINER-->
          <div class="w-2/6">very cool</div>
          <div class="w-4/6 rounded-lg overflow-hidden" id="chart-container">FusionCharts will render here</div>

          <!--END CHART CONTAINER-->
        </div>
        <!--END MENU MAIN-->
        <!--MENU BAWAHAN-->
        <div class="flex h-full">
          <div class="w-2/6 bg-ungu rounded-lg mr-4 overflow-hidden">
            <iframe width="100%" height="100%" src="https://www.youtube-nocookie.com/embed/P_xkQ6YEuzA" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
          </div>
          <div class="w-4/6 bg-gray-200 rounded-lg">
            <!-- TABLE -->
            <div class="px-4 py-3">
              <table id="myTableDokter" class="w-full table-auto">
                <thead class="justify-between">
                  <tr class="bg-gray-700">
                    <th class="px-16 py-2">
                      <span class="text-gray-300">Name</span>
                    </th>
                    <th class="px-16 py-2">
                      <span class="text-gray-300">Gender</span>
                    </th>
                    <th class="px-16 py-2">
                      <span class="text-gray-300">Status</span>
                    </th>
                  </tr>
                </thead>
                <tbody class="bg-gray-200">
                  <?php
                  $query = "SELECT * FROM tbl_dokter";
                  $hasil = mysqli_query($koneksi, $query);
                  if (!$hasil) {
                    die("Query error: " . mysqli_errno($koneksi) . " - " . mysqli_error($koneksi));
                  }
                  while ($baris = mysqli_fetch_assoc($hasil)) :
                  ?>
                    <tr class="bg-white border-4 border-gray-200">
                      <td>
                        <span class="text-center ml-2 font-semibold ml-8"><?= "dr. " . $baris['first_name'] . ' ' . $baris['last_name'] ?></span>
                      </td>
                      <td class="px-16 py-2">
                        <span class="text-center ml-2"><?= $baris['gender'] ?></span>
                      </td>
                      <td class="px-16 py-2">
                        <span class="text-center ml-2">Active</span>
                      </td>
                    </tr>
                  <?php endwhile ?>
                </tbody>
              </table>
            </div>
            <!-- END TABLE -->
          </div>
        </div>
      </div>
      <!--BAGIAN KANAN-->
    </main>
  </div>
  <!--SECTION KEDUA-->
  <div class=" h-screen bg-ungu-2 leading-relaxed tracking-wide flex flex-col pt-12">
    <div class="flex justify-start items-center" id="statistika">
      <div class="w-4/12">
        <div class="text-xl text-white tracking-wide font-bold uppercase text-4xl mx-6">Statistic section</div>
        <div class="mx-6 text-white text-lg leading-6">In this section, contains all the requested task for fulfilling one of the subject study </div>
      </div>
      <div class="flex items-center w-8/12 content-end">
        <!-- BROWSER MAC -->
        <div class="browser-mockup flex flex-1 m-6 md:px-0 md:m-12 bg-white w-1/2 rounded-lg shadow-2xl">
          <!-- THE STATISTIC -->
          <div class="rounded-lg overflow-hidden" id="chart-containeer">FusionCharts will render here</div>
          <!-- END STATISTIC -->
        </div>
        <!-- END BROWSER MAC -->
      </div>
    </div>
  </div>
  <!-- SECTION KETIGA -->
  <section class="min-h-screen flex flex-col pt-2 items-center">
    <div class="w-4/12 my-12">
      <div id="database" class="text-xl text-center text-white tracking-wide font-bold uppercase text-4xl">Database section</div>
      <div class="text-center text-white text-lg leading-6">In this section, contains all the requested task for fulfilling one of the subject study</div>
    </div>
    <div class="rounded-lg">
      <div class="flex flex-wrap">

        <div class="bg-white p-2 rounded-lg overflow-hidden">
          <table id="myTables" class="p-1">
            <thead class="justify-between">
              <tr class="bg-gray-400">
                <th class="px-16 py-2">
                  <span class="text-gray-700">Patient count</span>
                </th>
                <th class="px-16 py-2">
                  <span class="text-gray-700">Sub-district</span>
                </th>
              </tr>
            </thead>
            <tbody class="bg-gray-200">
              <?php
              $query = "SELECT COUNT(*) as 'Pasien', tbl_kelurahan.nama AS 'kelurahan' from tbl_pasien JOIN tbl_kelurahan ON tbl_pasien.id_kelurahan = tbl_kelurahan.id GROUP BY tbl_kelurahan.nama";
              $hasil = mysqli_query($koneksi, $query);
              if (!$hasil) {
                die("Query error: " . mysqli_errno($koneksi) . " - " . mysqli_error($koneksi));
              }
              while ($baris = mysqli_fetch_assoc($hasil)) :
              ?>
                <tr class="bg-white">
                  <td>
                    <span class="text-center font-semibold ml-28"><?= $baris['Pasien'] ?></span>
                  </td>
                  <td class="px-16 py-2">
                    <span class="text-center pl-20"><?= $baris['kelurahan'] ?></span>
                  </td>
                </tr>
              <?php endwhile ?>
            </tbody>
          </table>
        </div>

        <div class="ml-4 p-2 bg-white rounded-lg overflow-hidden">
          <table id="myTable2" class="p-1">
            <thead class="justify-between">
              <tr class="bg-gray-400">
                <th class="px-16 py-2">
                  <span class="text-gray-700">Month</span>
                </th>
                <th class="px-16 py-2">
                  <span class="text-gray-700">Count per sub-district</span>
                </th>
              </tr>
            </thead>
            <tbody class="bg-gray-200">
              <?php
              $query = "select count(*) as 'banyak', MONTH(bulan) as 'bulan' FROM tbl_pasien GROUP BY bulan ORDER BY MONTH(bulan)";
              $hasil = mysqli_query($koneksi, $query);
              if (!$hasil) {
                die("Query error: " . mysqli_errno($koneksi) . " - " . mysqli_error($koneksi));
              }
              while ($baris = mysqli_fetch_assoc($hasil)) :
              ?>
                <tr class="bg-white">
                  <td>
                    <?php $monthNum  = $baris['bulan'];
                    $dateObj   = DateTime::createFromFormat('!m', $monthNum);
                    $monthName = $dateObj->format('F'); // March
                    ?>
                    <span class="text-center ml-2 font-semibold ml-8"><?= $monthName ?></span>
                  </td>
                  <td class="px-16 py-2">
                    <span class="text-center ml-24"><?= $baris['banyak'] ?></span>
                  </td>
                </tr>
              <?php endwhile ?>
            </tbody>
          </table>
        </div>

      </div>

      <div class="flex flex-wrap my-5">

        <div class="bg-white p-2 rounded-lg overflow-hidden">
          <table id="myTable3" class="p-1">
            <thead class="justify-between">
              <tr class="bg-gray-400">
                <th class="px-16 py-2">
                  <span class="text-gray-700">Age</span>
                </th>
                <th class="px-16 py-2">
                  <span class="text-gray-700">Count</span>
                </th>
              </tr>
            </thead>
            <tbody class="bg-gray-200">
              <?php
              $query = "SELECT usia, COUNT(usia) as 'banyak' FROM `tbl_pasien` group by usia";
              $hasil = mysqli_query($koneksi, $query);
              if (!$hasil) {
                die("Query error: " . mysqli_errno($koneksi) . " - " . mysqli_error($koneksi));
              }
              while ($baris = mysqli_fetch_assoc($hasil)) :
              ?>
                <tr class="bg-white">
                  <td>
                    <span class="text-center font-semibold ml-16"><?= $baris['usia'] ?></span>
                  </td>
                  <td class="px-16 py-2">
                    <span class="text-center"><?= $baris['banyak'] ?></span>
                  </td>
                </tr>
              <?php endwhile ?>
            </tbody>
          </table>
        </div>

        <div class="ml-4 p-2 bg-white rounded-lg overflow-hidden">
          <table id="myTable4" class="p-1">
            <thead class="justify-between">
              <tr class="bg-gray-400">
                <th class="px-16 py-2">
                  <span class="text-gray-700">Count</span>
                </th>
              </tr>
            </thead>
            <tbody class="bg-gray-200">
              <?php
              $query = "SELECT count(*) AS 'banyak' FROM `tbl_rumahSakit` WHERE care_covid like 'Ya'";
              $hasil = mysqli_query($koneksi, $query);
              if (!$hasil) {
                die("Query error: " . mysqli_errno($koneksi) . " - " . mysqli_error($koneksi));
              }
              while ($baris = mysqli_fetch_assoc($hasil)) :
              ?>
                <tr class="bg-white">
                  <td class="px-16 py-2">
                    <span class="text-center ml-24"><?= $baris['banyak'] ?></span>
                  </td>
                </tr>
              <?php endwhile ?>
            </tbody>
          </table>
        </div>

      </div>

      <div class="flex flex-wrap my-5">

        <div class="bg-white p-2 rounded-lg overflow-hidden">
          <table id="myTable3" class="p-1">
            <thead class="justify-between">
              <tr class="bg-gray-400">
                <th class="px-16 py-2">
                  <span class="text-gray-700">Count</span>
                </th>
              </tr>
            </thead>
            <tbody class="bg-gray-200">
              <tr class="bg-white">
                <td class="px-16 py-2">
                  <span class="text-center">5</span>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </section>

  <section class="h-screen flex pt-12 bg-ungu-2 items-center">
    <div class="w-4/12">
      <div class="text-xl text-white tracking-wide font-bold uppercase text-4xl mx-12">Multimedia section</div>
      <div class="text-white text-lg mx leading-6 mx-12">In this section, contains all the requested task for fulfilling one of the subject study</div>
    </div>
    <div class="w-8/12">
      <div id="multimedia" class="browser-mockup flex flex-1 m-6 md:px-0 md:ml-40 bg-white w-3/4 rounded-lg shadow-2xl">
        <iframe width="100%" height="100%" src="https://www.youtube-nocookie.com/embed/P_xkQ6YEuzA" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
      </div>
    </div>
  </section>
  <!-- CARD -->
  <section>

  </section>
  <!-- CARD -->
  <footer class="flex justify-center px-4 text-gray-100 bg-gray-800">
    <div class="container py-6">
      <h1 class="text-center text-lg font-bold lg:text-2xl">
        Insert your email and never miss <br> out on new tips, tutorials, and more.
      </h1>

      <div class="flex justify-center mt-6">
        <div class="bg-white rounded-lg">
          <div class="flex flex-wrap justify-between md:flex-row">
            <input type="email" class="m-1 p-2 appearance-none text-gray-700 text-sm focus:outline-none" placeholder="Enter your email">
            <button class="w-full m-1 p-2 text-sm bg-gray-800 rounded-lg font-semibold uppercase lg:w-auto">subscribe</button>
          </div>
        </div>
      </div>

      <hr class="h-px mt-6 bg-gray-700 border-none">

      <div class="flex flex-col items-center justify-between mt-6 md:flex-row">
        <div>
          <a href="#" class="text-xl font-bold">Muhammad Daffa Zaky | J3C118124</a>
        </div>
        <div class="flex mt-4 md:m-0">
          <div class="-mx-4">
            <a href="#" class="px-4 text-sm">About</a>
            <a href="#" class="px-4 text-sm">Blog</a>
            <a href="#" class="px-4 text-sm">News</a>
            <a href="#" class="px-4 text-sm">Contact</a>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <!--END PEMBUNGKUS-->
  <!-- jQuery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      $('#myTablessDokter').DataTable({
        dom: 'Bfrtip',
        buttons: ['copy', 'csv', 'excel', 'pdf', 'print'],
        pageLength: 6
      });
      $('#myTabssles').DataTable({
        dom: 'Bfrtip',
        buttons: ['copy', 'csv', 'excel', 'pdf', 'print'],
        pageLength: 6
      });
      $('#myTablsse2').DataTable({
        dom: 'Bfrtip',
        buttons: ['copy', 'csv', 'excel', 'pdf', 'print'],
        pageLength: 6
      });
      $('#myTabssle3').DataTable({
        dom: 'Bfrtip',
        buttons: ['copy', 'csv', 'excel', 'pdf', 'print'],
        pageLength: 6
      });
      $('#myTabssle4').DataTable({
        dom: 'Bfrtip',
        buttons: ['copy', 'csv', 'excel', 'pdf', 'print'],
        pageLength: 6
      });
    });
  </script>
  <!-- FusionCharts -->
  <script type="text/javascript" src="https://cdn.fusioncharts.com/fusioncharts/latest/fusioncharts.js"></script>
  <!-- jQuery-FusionCharts -->
  <script type="text/javascript" src="https://rawgit.com/fusioncharts/fusioncharts-jquery-plugin/develop/dist/fusioncharts.jqueryplugin.min.js"></script>
  <!-- Fusion Theme -->
  <script type="text/javascript" src="https://cdn.fusioncharts.com/fusioncharts/latest/themes/fusioncharts.theme.fusion.js"></script>
  <!--CHART-->
  <script type="text/javascript">
    $(function() {
      $.ajax({
        url: "http://localhost/ukomWEB/masuk.php",
        type: "GET",
        success: function(data) {
          let chartData = data;
          var chartProperties = {
            caption: "Covid contamination by District",
            xAxisName: "District",
            yAxisName: "Count",
            rotatevalues: "1",
            theme: "fusion"
          };
          apiChart = new FusionCharts({
            type: "column2d",
            renderAt: "chart-container",
            width: "100%",
            height: "100%",
            dataFormat: "json",
            dataSource: {
              chart: chartProperties,
              data: chartData
            }
          });
          apiChart.render();
        }
      });
    });

    $(function() {
      $.ajax({
        url: "http://localhost/ukomWEB/masuk.php",
        type: "GET",
        success: function(data) {
          let chartData = data;
          var chartProperties = {
            caption: "Covid contamination by District",
            xAxisName: "District",
            yAxisName: "Count",
            rotatevalues: "1",
            theme: "fusion"
          };
          apiChart = new FusionCharts({
            type: "column2d",
            renderAt: "chart-containeer",
            width: "100%",
            height: "100%",
            dataFormat: "json",
            dataSource: {
              chart: chartProperties,
              data: chartData
            }
          });
          apiChart.render();
        }
      });
    });
  </script>
</body>

</html>