<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>One Duna | Admin</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <link href="<?= base_url("img/favicon.ico") ?>" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="<?= base_url("lib/owlcarousel/assets/owl.carousel.min.css")?>" rel="stylesheet">
    <link href="<?= base_url("lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css")?>" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="<?= base_url("css/bootstrap.min.css")?>" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="<?= base_url("css/style.css")?>" rel="stylesheet">

    <!--date and time picker -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?= base_url("css/bootstrap-datetimepicker.min.css")?>">
</head>

<body>
    <!--<marquee> -->
    <!--    <i class="fas fa-code"></i>  Admin Pannel is under Beta Version <i class="fas fa-code"></i> -->
    <!--</marquee>-->
<div class="container-fluid position-relative d-flex p-0">
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->

    <!-- Sidebar Start -->
    <div class="sidebar pe-4 pb-3">
        <nav class="navbar  navbar-dark">
            <a href="index.html" class="navbar-brand mx-4 mb-3">
                <!--                <h3 class="text-primary"><i class="fa fa-user-edit me-2"></i>DarkPan</h3>-->
                <img src="https://onedunia.com/img/master/logo.png" alt="onedunialogo" width="200" height="50">
            </a>
            <div class="d-flex align-items-center ms-4 mb-4">
                <div class="position-relative">
                    <img class="rounded-circle" src="<?= base_url("img/user.jpg")?>" alt="" style="width: 40px; height: 40px;">
                    <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                </div>
                <div class="ms-3">
                    <h6 class="mb-0 text-black"><?= session('name') ?> </h6>
                    <span style="font-size:14px;">(Admin)</span>
                </div>
            </div>
            <div class="navbar-nav w-100">
                <a href="<?= base_url("dashboard") ?>" class="nav-item nav-link <?php if(isset($dashboard)){echo $dashboard; }?>"><i class="fa fa-th me-2"></i>Dashboard</a>
                <a href="<?= base_url("add-shipment") ?>" class="nav-item nav-link <?php if(isset($addshipment)){echo $addshipment;} ?>"><i class="fa fa-keyboard me-2"></i>Add Shipment</a>
                <a href="<?= base_url("update-status") ?>" class="nav-item nav-link <?php if(isset($update)){echo $update;}  ?>"><i class="fa fa-keyboard me-2"></i>Update Shipment</a>
                <a href="<?= base_url("forwarding-shipment") ?>" class="nav-item nav-link <?php if(isset($forwarding)){echo $forwarding;}  ?>"><i class="fa fa-keyboard me-2"></i>Forward Number</a>
                <a href="<?= base_url("feedback") ?>" class="nav-item nav-link <?php if(isset($feedback)){echo $feedback;}  ?>"><i class="fa fa-table me-2"></i>Feedback</a>
                <a href="<?=  base_url("logout") ?>" class="nav-item nav-link"><i class="fas fa-sign-out-alt me-2"></i>EXIT</a>
            </div>
        </nav>
    </div>
    <!-- Sidebar End -->
    <div class="content">
        <!-- Navbar Start -->
        <nav class="navbar navbar-expand  navbar-dark sticky-top px-4 py-3" style="background-color:white;">
            <a href="https://onedunia.com/" class="navbar-brand d-flex d-lg-none me-4">
                <img src="https://onedunia.com/img/master/logo.png" alt="onedunialogo2" width="200" height="50">
            </a>
            <a href="#" class="sidebar-toggler flex-shrink-0">
                <i class="fa fa-bars"></i>
            </a>
                <form class="d-none d-md-flex ms-4">
                    <input class="form-control  search-btn border-0" type="search" placeholder="Search in Dashboard..." id="searchValue">
                    <a class="btn btn-outline-light" href="<?= base_url("dashboard"); ?>"><i class="fas fa-sync-alt"></i></a>
                </form>
            <div class="navbar-nav align-items-center ms-auto">
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                        <img class="rounded-circle me-lg-2" src="<?= base_url("img/user.jpg")?>" alt="" style="width: 40px; height: 40px;">
                        <span class="d-none d-lg-inline-flex"><?= session('name') ?></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end btn-blue border-0 rounded-0 rounded-bottom m-0">
                        <a href="<?= base_url("profile") ?>" class="dropdown-item">My Profile</a>
                        <a href="<?= base_url("change-password") ?>" class="dropdown-item">Change Password</a>
                        <a href="<?= base_url("logout") ?>" class="dropdown-item">Log Out</a>
                    </div>
                </div>
            </div>
        </nav>
        <!-- Navbar End -->

    <!-- content start-->
    <?= $this->renderSection('contents') ?>

    <!--    content end -->
    <!-- Footer Start -->
    <div class="container-fluid pt-0 px-0">
        <div class="bg-blue rounded-top p-4">
            <div class="row">
                <div class="col-12 col-sm-6 text-center text-sm-start">
                    &copy; <a href="https://onedunia.com" style="color:#93c83c;">OneDunia.Com</a>, All Right Reserved.
                </div>
                <!--<div class="col-12 col-sm-6 text-center text-sm-end">-->
                    <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                <!--    Designed By <a href="https://htmlcodex.com" style="color:#93c83c;">Sajid Ali</a>-->
                <!--    || Distributed By: <a href="https://themewagon.com" target="_blank" style="color:#93c83c;">Global Height Company</a>-->
                <!--</div>-->
            </div>
        </div>
    </div>
    <!-- Footer End -->
</div>
<!-- Content End-->
    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
</div>
<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script>

    // shipment details
    $(document).ready(function(){
        $(".shipmentDetails").click(function (){
            console.warn("front-end-click");
            let id = $(this).attr("data-shipment-id");
            let url = '<?= base_url() ?>/api/single-shipment/'+id;
            // console.warn(url);
            $.ajax({
                method:'GET',
                url:url,
                cache:false,
                success: function(e){
                    // console.warn(e);
                    $(".singleShipmentDisplay").html(e);
                },
                error: function(err){
                    console.warn('errro '+err);
                }
            });

        });
        // $("#shipmentDetails1").click(function (){
        //     let id = $(this).attr("data-shipment-idd");
        //     console.warn("back-end-click");
        //     let url = '<?= base_url() ?>/api/single-shipment/'+id;
        //     // console.warn(url);
        //     $.ajax({
        //         method:'GET',
        //         url:url,
        //         cache:false,
        //         success: function(e){
        //             console.warn(e);
        //             $(".singleShipmentDisplay1").html(e);
        //         },
        //         error: function(err){
        //             console.warn('errro '+err);
        //         }
        //     });
        // });

      $("#searchValue").on("keyup", function(){
        var value = $(this).val();
        // console.warn("data", value);
        if (value !=="") {
          $.ajax({
            url:"https://onedunia.com/admin/api/search-data/"+value,
            type:"GET",
            cache:false,
            success:function(data){
              $("#shipmentSearchData").html(data);
              $("#shipmentSearchData").fadeIn();
            },
            error:function(data){
              console.warn("front-side error", data);
            },
          });
        }else{
          $("#shipmentSearchData").html("");
          $("#shipmentSearchData").fadeOut();
        }
      });
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>

<!--    date and time-->
    <script src="<?= base_url("js/moment-with-localesDateTimePicker.min.js")?>" ></script>
    <script src="<?= base_url("js/bootstrap-datetimepicker.min.js")?>" ></script>
    <script src="<?= base_url("js/datetimepickerMain.js")?>" ></script>
    <!--end date and time-->
<script src="<?= base_url("lib/chart/chart.min.js")?>"></script>
<script src="<?= base_url("lib/easing/easing.min.js")?>"></script>
<script src="<?= base_url("lib/waypoints/waypoints.min.js")?>"></script>
<script src="<?= base_url("lib/owlcarousel/owl.carousel.min.js")?>"></script>
<script src="<?= base_url("lib/tempusdominus/js/moment.min.js")?>"></script>
<script src="<?= base_url("lib/tempusdominus/js/moment-timezone.min.js")?>"></script>
<script src="<?= base_url("lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js")?>"></script>

<!-- Template Javascript -->
<script src="<?= base_url("js/main.js") ?>"></script>


</body>

</html>
