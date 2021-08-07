<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | E-Shopper</title>
    <base href="{{asset('')}}">
    <link href="frontend/css/sweetalert.css" rel="stylesheet">
    <link href="frontend/css/bootstrap.min.css" rel="stylesheet">
    <link href="frontend/css/font-awesome.min.css" rel="stylesheet">
    <link href="frontend/css/prettyPhoto.css" rel="stylesheet">
    <link href="frontend/css/price-range.css" rel="stylesheet">
    <link href="frontend/css/animate.css" rel="stylesheet">
    <link href="frontend/css/main.css" rel="stylesheet">
    <link href="frontend/css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="frontend/js/html5shiv.js"></script>
    <script src="frontend/js/respond.min.js"></script>
    <![endif]-->
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>
@include('pages.layout_user.header')

@yield('content')

@include('pages.layout_user.footer')


<script src="frontend/js/jquery.js"></script>
<script src="frontend/js/bootstrap.min.js"></script>
<script src="frontend/js/jquery.scrollUp.min.js"></script>
<script src="frontend/js/price-range.js"></script>
<script src="frontend/js/jquery.prettyPhoto.js"></script>
<script src="frontend/js/main.js"></script>
<script src="frontend/js/sweetalert.js"></script>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('.add-to-cart').click(function () {
            let id = $(this).data('id');
            let cart_product_id = $('.cart_product_id_' + id).val();
            let cart_product_name = $('.cart_product_name_' + id).val();
            let cart_product_image = $('.cart_product_image_' + id).val();
            let cart_product_price = $('.cart_product_price_' + id).val();
            let cart_product_qty = $('.cart_product_qty_' + id).val();
            let _token = $('input[name="_token"]').val();
            $.ajax({
                url: '{{url('/add-cart-ajax')}}',
                method: 'POST',
                data: {
                    cart_product_id: cart_product_id,
                    cart_product_name: cart_product_name,
                    cart_product_image: cart_product_image,
                    cart_product_price: cart_product_price,
                    cart_product_qty: cart_product_qty,
                    _token: _token
                },
                success: function (data) {
                    swal({
                            title: "Da them san pham vao gio hang cua ban",
                            // text: "You will not be able to recover this imaginary file!",
                            type: "success",
                            confirmButtonClass: "btn-success",
                            confirmButtonText: "Den gio hang",
                            cancelButtonText: "Tiep tuc di sam",
                            showCancelButton: true,
                            closeOnConfirm: false,
                            showLoaderOnConfirm: true
                        },
                        function () {
                            setTimeout(function () {
                                window.location.href = "{{url('/show-cart')}}";
                            }, 2000);
                        });

                }

            });
        });
    });
</script>
</body>
</html>
