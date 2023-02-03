<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>@yield('title')</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{asset('frontEndAsset')}}/assets/img/favicon.png" rel="icon">
    <link href="{{asset('frontEndAsset')}}/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=EB+Garamond:wght@400;500&family=Inter:wght@400;500&family=Playfair+Display:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{asset('frontEndAsset')}}/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{asset('frontEndAsset')}}/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="{{asset('frontEndAsset')}}/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="{{asset('frontEndAsset')}}/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="{{asset('frontEndAsset')}}/assets/vendor/aos/aos.css" rel="stylesheet">

    <!-- Template Main CSS Files -->
    <link href="{{asset('frontEndAsset')}}/assets/css/variables.css" rel="stylesheet">
    <link href="{{asset('frontEndAsset')}}/assets/css/main.css" rel="stylesheet">

    <!-- =======================================================
    * Template Name: ZenBlog - v1.2.1
    * Template URL: https://bootstrapmade.com/zenblog-bootstrap-blog-template/
    * Author: BootstrapMade.com
    * License: https:///bootstrapmade.com/license/
    ======================================================== -->
</head>

<body>

<!-- ======= Header ======= -->
@include('frontEnd.include.header')
<!-- End Header -->

@yield('content')

<!-- ======= Footer ======= -->
@include('frontEnd.include.footer')

<a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="{{asset('adminAsset')}}/assets/js/jquery.min.js"></script>
<script src="{{asset('frontEndAsset')}}/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="{{asset('frontEndAsset')}}/assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="{{asset('frontEndAsset')}}/assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="{{asset('frontEndAsset')}}/assets/vendor/aos/aos.js"></script>
<script src="{{asset('frontEndAsset')}}/assets/vendor/php-email-form/validate.js"></script>

<!-- Template Main JS File -->
<script src="{{asset('frontEndAsset')}}/assets/js/main.js"></script>
<script>
    $('.details').click(function () {

        let blogId = $(this).attr('id');
        // alert(blogId)

        $.ajax({
            method:"GET",
            url:'api/details/'+ blogId,
            dataType:'JSON',
            success:function (data) {

                $('#title').text(data.title)
                $('#image').attr('src',data.image)
                $('#description').text(data.description)
            }
        });
           $('#detailsModal').modal('show')
    });
</script>



<div class="modal fade" id="detailsModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <h3 id="title"></h3>
                <img src="" alt="" id="image" height="309px" width="464px">
                <p id="description"></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


</body>

</html>
