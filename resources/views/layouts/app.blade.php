<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>@yield('title')</title>
  <link rel="shortcut icon" type="image/png" href="assets/images/logos/logo_jamur.png" />
  <link rel="stylesheet" href="assets/css/styles.min.css" />
</head>

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <!-- Sidebar Start -->
    
      @include('partials.sidebar')

    <!--  Sidebar End -->
    <!--  Main wrapper -->
    <div class="body-wrapper">
      <!--  Header Start -->
      <header class="app-header">
        
        <!-- navbar -->
        @include('partials.topnav')

      </header>
      <!--  Header End -->
      <div class="container-fluid">
        <!--  Row 1 -->
        @yield('content')
        
        
       
      </div>
    </div>
  </div>
  <script src="assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="assets/js/sidebarmenu.js"></script>
  <script src="assets/js/app.min.js"></script>
  <script src="assets/libs/apexcharts/dist/apexcharts.min.js"></script>
  <script src="assets/libs/simplebar/dist/simplebar.js"></script>
  <script src="assets/js/dashboard.js"></script>
  <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable();
        });

    </script>


    <script>
        $(document).ready(function() {
            $('#dataTable2').DataTable();
        });

    </script>

  <script type="text/javascript">
                $(document).ready(function() {
                   
                    var table = $('#dataTable').DataTable();
                    
                    var modal = document.getElementById("myModal");

                    var modalImg = document.getElementById("img01");
                    var captionText = document.getElementById("caption");
                    
            // Get the <span> element that closes the modal
            var span = document.getElementsByClassName("close")[0];

            table.on('click', '#ImageTampil', function (){

                $tr = $(this).closest('tr');
                if ($($tr).hasClass('child')) {
                    $tr = $tr.prev('.parent');
                }

                var data = table.row($tr).data();
                console.log(data);

                modalImg.src = this.src;
                captionText.innerHTML = data[3];


                $('#myModal').modal('show');
            });

        });
    </script>

     @yield('scripts')
</body>

</html>