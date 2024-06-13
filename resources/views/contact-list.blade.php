<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="robots" content="/, follow" />
    <title>PawPal</title>
    <meta name="description" content="Jesco - Fashoin eCommerce HTML Template" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Add site Favicon -->
    <link rel="shortcut icon" href="{{asset('images/favicon/favicon.ico')}}" type="image/png">

    <!-- vendor css (Icon Font) -->
    <link rel="stylesheet" href="{{asset('css/vendor/bootstrap.bundle.min.css')}}" />
    <link rel="stylesheet" href="{{asset('css/vendor/pe-icon-7-stroke.css')}}" />
    <link rel="stylesheet" href="{{asset('/css/vendor/font.awesome.css')}}" />

    <!-- plugins css (All Plugins Files) -->
    <link rel="stylesheet" href="{{asset('css/plugins/animate.css')}}" />
    <link rel="stylesheet" href="{{asset('css/plugins/swiper-bundle.min.css')}}" />
    <link rel="stylesheet" href="{{asset('css/plugins/jquery-ui.min.css')}}" />
    <link rel="stylesheet" href="{{asset('css/plugins/nice-select.css')}}" />
    <link rel="stylesheet" href="{{asset('css/plugins/venobox.css')}}" />
    <link rel="stylesheet" href="{{asset('css/style-admin.css')}}" />

</head>

<body>
    <!-- resources/views/home.blade.php -->
    @extends('app')

    @section('title', 'Home')

    @section('content')

     <div class="offcanvas-overlay"></div>

    <!-- breadcrumb-area start -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-12 text-center">
                    <h2 class="breadcrumb-title">Contact List</h2>
                    <!-- breadcrumb-list start -->
                    <ul class="breadcrumb-list">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active">Contact List</li>
                    </ul>
                    <!-- breadcrumb-list end -->
                </div>
            </div>
        </div>
    </div>

    <!-- breadcrumb-area end -->

    <!-- Contact Area Start -->
    <div class="contact-area pt-100px pb-100px">
        <div class="container">
            <div class="contact-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="contact-form">
                            <div class="contact-title mb-30">
                                <h2 class="title" data-aos="fade-up" data-aos-delay="200">Here's What People Say</h2>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Message</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>John Doe</td>
                                            <td>john@example.com</td>
                                            <td>Hello, I am interested in your product.</td>
                                            <td>
                                                <button id="contactBtn" class="btn btn-sm btn-danger">Delete</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>Jane Smith</td>
                                            <td>jane@example.com</td>
                                            <td>Can I get discount if I buy more than 100?</td>
                                            <td>
                                                <button id="contactBtn" class="btn btn-sm btn-danger">Delete</button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>

                            </div>
                            <p class="form-messege"></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact Area End -->



    <!-- Search Modal Start -->
    <div class="modal popup-search-style" id="searchActive">
        <button type="button" class="close-btn" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
        <div class="modal-overlay">
            <div class="modal-dialog p-0" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <h2>Search Your Product</h2>
                        <form class="navbar-form position-relative" role="search">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Search here...">
                            </div>
                            <button type="submit" class="submit-btn"><i class="pe-7s-search"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Search Modal End -->

    <!-- Login Modal Start -->
    <div class="modal popup-login-style" id="loginActive">
        <button type="button" class="close-btn" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
        <div class="modal-overlay">
            <div class="modal-dialog p-0" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="login-content">
                            <h2>Log in</h2>
                            <h3>Log in your account</h3>
                            <form action="#">
                                <input type="text" placeholder="Username">
                                <input type="password" placeholder="Password">
                                <div class="remember-forget-wrap">
                                    <div class="remember-wrap">
                                        <input type="checkbox">
                                        <p>Remember</p>
                                        <span class="checkmark"></span>
                                    </div>
                                    <div class="forget-wrap">
                                        <a href="#">Forgot your password?</a>
                                    </div>
                                </div>
                                <button type="button">Log in</button>
                                <div class="member-register">
                                    <p> Not a member? <a href="login"> Register now</a></p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Login Modal End -->
    @endsection

    <!-- Vendor JS -->
</body>

</html>
