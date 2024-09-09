<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">
    <title>تسجيل الدخول</title>
    <!-- Simple bar CSS -->
    <link rel="stylesheet" href="/css/simplebar.css">
    <!-- Fonts CSS -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <!-- Icons CSS -->
    <link rel="stylesheet" href="/css/feather.css">
    <!-- Date Range Picker CSS -->
    <link rel="stylesheet" href="/css/daterangepicker.css">
    <!-- App CSS -->
    <link rel="stylesheet" href="/css/app-light.css" id="lightTheme">
    <link rel="stylesheet" href="/css/app-dark.css" id="darkTheme" disabled>

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }

        .alert {
            border-radius: 0.5rem;
            padding: 1rem 1.5rem;
            margin-bottom: 1rem;
            position: relative;
        }

        .alert-heading {
            font-size: 1.25rem;
            font-weight: 600;
            color: #721c24;
        }

        .alert ul {
            list-style-type: none;
            padding-left: 0;
        }

        .alert li {
            margin-bottom: 0.5rem;
        }

        .btn-close {
            position: absolute;
            top: 0.5rem;
            right: 0.5rem;
            background: none;
            border: none;
            color: #721c24;
            font-size: 1.25rem;
            cursor: pointer;
        }

        .btn-close:hover {
            color: #f5c6cb;
        }

        .wrapper {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            background: #fff;
            padding: 2rem; /* Added padding */
        }

        .form-container {
            background: #fff;
            padding: 2rem;
            border-radius: 0.5rem;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 400px; /* Set max-width to ensure it doesn't get too wide */
            width: 100%; /* Make sure it uses full available width up to max-width */
        }

        .form-control-lg {
            height: calc(2.5rem + 2px);
            padding: 0.75rem 1.25rem; /* Increased padding for better usability */
            font-size: 1.25rem;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            padding: 0.75rem 1.25rem;
            font-size: 1.25rem;
            width: 100%; /* Make button full width */
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #004085;
        }

        .navbar-brand-img {
            width: 120px;
        }

        .h6 {
            font-size: 1.25rem;
            font-weight: 600;
            color: #333;
        }

        .mt-5 {
            margin-top: 3rem !important;
        }

        .mb-3 {
            margin-bottom: 1rem !important;
        }

        .text-muted {
            color: #6c757d !important;
        }
    </style>
</head>

<body class="light rtl">
    <div class="wrapper">
        @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <div class="d-flex align-items-center">
                <i class="fas fa-exclamation-circle mr-2 fa-2x"></i>
                <div>
                    <h4 class="alert-heading mb-2">Something went wrong!</h4>
                    <hr class="my-2">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>
                                {{ $error }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <div class="form-container">
            <form method="POST" action="{{ route('login.store') }}" class="text-center">
                @csrf
                <a class="navbar-brand mx-auto mt-2 flex-fill text-center" href="{{ route('dashboard') }}">
                    <svg version="1.1" id="logo" class="navbar-brand-img brand-md" xmlns="http://www.w3.org/2000/svg"
                        xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 120 120"
                        xml:space="preserve">
                        <g>
                            <polygon class="st0" points="78,105 15,105 24,87 87,87" />
                            <polygon class="st0" points="96,69 33,69 42,51 105,51" />
                            <polygon class="st0" points="78,33 15,33 24,15 87,15" />
                        </g>
                    </svg>
                </a>
                <h1 class="h6 mb-4">تسجيل الدخول</h1>
                <div class="form-group">
                    <label for="inputEmail" class="sr-only">البريد الالكتروني</label>
                    <input name="email" type="email" id="inputEmail" class="form-control form-control-lg"
                        placeholder="Email address" required autofocus>
                </div>
                <div class="form-group">
                    <label for="inputPassword" class="sr-only">كلمة السر</label>
                    <input name="password" type="password" id="inputPassword" class="form-control form-control-lg"
                        placeholder="Password" required>
                </div>
                {{-- <div class="checkbox mb-3">
                    <label>
                        <input type="checkbox" value="remember-me"> Stay logged in
                    </label>
                </div> --}}
                <button class="btn btn-primary btn-lg btn-block" type="submit">دخول</button>
                <p class="mt-5 mb-3 text-muted font-weight-bold">
                    © 2024 جميع الحقوق محفوظة | المعصراوي
                </p>
            </form>
        </div>
    </div>

    <script src="/js/jquery.min.js"></script>
    <script src="/js/popper.min.js"></script>
    <script src="/js/moment.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/simplebar.min.js"></script>
    <script src='/js/daterangepicker.js'></script>
    <script src='/js/jquery.stickOnScroll.js'></script>
    <script src="/js/tinycolor-min.js"></script>
    <script src="/js/config.js"></script>
    <script src="/js/apps.js"></script>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'UA-56159088-1');
    </script>
</body>

</html>
