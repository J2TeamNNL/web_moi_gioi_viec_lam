<html>
<head>
    <meta charset="utf-8">
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    <title>Ecommerce - Material Kit PRO by Creative Tim</title>

    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport">

    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css"
          href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">

    <!-- CSS Files -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/material-kit.css') }}" rel="stylesheet">
</head>
<body class="ecommerce-page">
@include('layout_frontpage.navbar')
@include('layout_frontpage.header')

<div class="main main-raised">
    <!-- section -->
    <div class="section">
        <div class="container">
            <h2 class="section-title">Find what you need</h2>
            <div class="row">
                @include('layout_frontpage.sidebar')

                <div class="col-md-9">
                    <div class="row">
                        @yield('content')
                    </div>
                    <div class="col-md-3" style="float: right">
                        <button rel="tooltip" class="btn btn-rose btn-round" data-original-title="" title="">Load
                            more...
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- section -->

</div> <!-- end-main-raised -->

<!-- section -->
@include('layout_frontpage.footer')

<!--   Core JS Files   -->
<script src="{{ asset('js/jquery.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/bootstrap.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/material.min.js') }}" type="text/javascript"></script>

<!--	Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/   -->
<script src="{{ asset('js/nouislider.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/material-kit.js') }}" type="text/javascript"></script>

<!--	Plugin for Tags, full documentation here: http://xoxco.com/projects/code/tagsinput/   -->


<script type="text/javascript">
    $(document).ready(function () {

        var slider2 = document.getElementById('sliderRefine');

        noUiSlider.create(slider2, {
            start: [42, 880],
            connect: true,
            range: {
                'min': [30],
                'max': [900]
            }
        });

        var limitFieldMin = document.getElementById('price-left');
        var limitFieldMax = document.getElementById('price-right');

        slider2.noUiSlider.on('update', function (values, handle) {
            if (handle) {
                limitFieldMax.innerHTML = $('#price-right').data('currency') + Math.round(values[handle]);
            } else {
                limitFieldMin.innerHTML = $('#price-left').data('currency') + Math.round(values[handle]);
            }
        });
    });
</script>

</body>
</html>