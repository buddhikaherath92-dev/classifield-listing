<html class="no-js" lang="">

<head>

    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>AluthAds.lk</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">

    <link rel="stylesheet" href="{!!asset('web/css/bootstrap.min.css')!!}">
    <link rel="stylesheet" href="{!!asset("web/css/animate.min.css")!!}">
    <link rel="stylesheet" href="{!!asset("web/css/font-awesome.min.css")!!}">
    <link rel="stylesheet" href="{!!asset("web/vendor/OwlCarousel/owl.carousel.min.css")!!}">
    <link rel="stylesheet" href="{!!asset("web/vendor/OwlCarousel/owl.theme.default.min.css")!!}">
    <link rel="stylesheet" href="{!!asset("web/css/meanmenu.min.css")!!}">
    <link rel="stylesheet" href="{!!asset("web/css/select2.min.css")!!}">
    <link rel="stylesheet" href="{!!asset("web/css/magnific-popup.css")!!}">
    <link rel="stylesheet" href="{!!asset("web/css/style.css")!!}">
    <link rel="stylesheet" href="{!!asset("web/css/override.css")!!}">
    <link rel="stylesheet" href="{!!asset("web/vendor/intl-tel-input-14.0.0/build/css/intlTelInput.css")!!}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
</head>

<body>

    <div id="preloader"></div>

    <div id="wrapper" style="padding-top: 14px">

        @include('web.templates.header')


        @yield('content')

        @include('sweet::alert')
        @include('web.templates.footer')

        @include('web.templates.login_model')

    </div>
    <script src="{!!asset("web/js/jquery-2.2.4.min.js")!!}"></script>
    <script src="{!!asset("web/js/popper.js")!!}"></script>
    <script src="{!!asset("web/js/bootstrap.min.js")!!}"></script>
    <script src="{!!asset("web/vendor/OwlCarousel/owl.carousel.min.js")!!}"></script>
    <script src="{!!asset("web/js/jquery.meanmenu.min.js")!!}"></script>
    <script src="{!!asset("web/js/jquery.scrollUp.min.js")!!}"></script>
    <script src="{!!asset("web/js/jquery.counterup.min.js")!!}"></script>
    <script src="{!!asset("web/js/waypoints.min.js")!!}"></script>
    <script src="{!!asset("web/js/select2.min.js")!!}"></script>
    <script src="{!!asset("web/js/isotope.pkgd.min.js")!!}"></script>
    <script src="{!!asset("web/js/jquery.zoom.min.js")!!}"></script>
    <script src="{!!asset("web/js/validator.min.js")!!}"></script>
    <script src="{!!asset("web/js/jquery.magnific-popup.min.js")!!}"></script>
    <script src="{!!asset("web/js/main.js")!!}"></script>
    <script src="{!!asset("web/vendor/intl-tel-input-14.0.0/build/js/intlTelInput.js")!!}"></script>

    @yield('script')
    <script type="text/javascript">
        $('#myModal').modal({ 'show' : {{ count($errors->login) > 0  && !Request::is('login')? 'true' : 'false' }}  });
        var input = document.querySelector("#phone"),
            errorMsg = document.querySelector("#error-msg"),
            validMsg = document.querySelector("#valid-msg");

        // here, the index maps to the error code returned from getValidationError - see readme
        var errorMap = [ "Invalid number", "Invalid country code", "Too short", "Too long", "Invalid number"];

        // initialise plugin
        var iti = window.intlTelInput(input, {
            allowDropdown : false,
            nationalMode : true,
            formatOnDisplay : true,
            utilsScript: "{!!asset("web/vendor/intl-tel-input-14.0.0/build/js/utils.js")!!}"
        });

        iti.setCountry("LK");

        var reset = function() {
            input.classList.remove("is-invalid");
            errorMsg.innerHTML = "";
            validMsg.innerHTML = "";
            errorMsg.classList.add("hidden-mb");
            validMsg.classList.add("hidden-mb");
        };

        // on blur: validate
        input.addEventListener('blur', function() {
            reset();
            if (input.value.trim()) {
                if (iti.isValidNumber()) {
                    validMsg.classList.remove("hidden-mb");
                    validMsg.innerHTML = "<small class='text-success'><i class='fa fa-check'></i> Valid</small>";
                } else {
                    input.classList.add("is-invalid");
                    var errorCode = iti.getValidationError();
                    errorMsg.innerHTML ="<small class='text-danger'><i class='fa fa-close'></i> " + errorMap[errorCode] + "</small>" ;
                    errorMsg.classList.remove("hidden-mb");
                }
            }
        });

        // on keyup / change flag: reset
        input.addEventListener('change', reset);
        input.addEventListener('keyup', reset);

    </script>
    <script type="text/javascript">
        @if (count($errors) > 0)
        $('#modelRate').modal('show');
        @endif
    </script>
</body>