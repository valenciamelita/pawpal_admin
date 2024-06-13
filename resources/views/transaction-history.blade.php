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
                    <h2 class="breadcrumb-title">Transaction History</h2>
                    <!-- breadcrumb-list start -->
                    <ul class="breadcrumb-list">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active">Transaction History</li>
                    </ul>
                    <!-- breadcrumb-list end -->
                </div>
            </div>
        </div>
    </div>

    <!-- breadcrumb-area end -->

    <!-- Transaction History Area Start -->
    <div class="contact-area pt-100px pb-100px">
        <div class="container">
            <div class="contact-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        @php
                        $totalTransactions = DB::table('TRANSACTIONS')->count();
                        $transactions = DB::table('TRANSACTIONS')
                            ->join('USERS', 'TRANSACTIONS.USER_ID', '=', 'USERS.USER_ID')
                            ->select(
                                'TRANSACTIONS.TRANS_ID as trans_id',
                                'TRANSACTIONS.TRANS_DATE as trans_date',
                                'TRANSACTIONS.NAMA_PENERIMA as name',
                                'TRANSACTIONS.TRANS_PHONE as phone',
                                'TRANSACTIONS.TRANS_TOTAL as grand_total',
                                'TRANSACTIONS.TRANS_ADDRESS as address'
                            )
                            ->get();
                        @endphp
                        <h2 class="title" data-aos="fade-up" data-aos-delay="200">Total Transactions: <span style="font-weight: 700">{{ $totalTransactions }}</span></h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="contact-form">
                        <div class="contact-title mb-30">
                            <h2 class="title" data-aos="fade-up" data-aos-delay="200">Transaction History</h2>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Transaction ID</th>
                                        <th>Transaction Date</th>
                                        <th>Name</th>
                                        <th>Phone</th>
                                        <th>Grand Total</th>
                                        <th>Address</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($transactions as $trans)
                                        <tr class="transaction-row" data-id="{{ $trans->trans_id }}">
                                            <td>{{ $trans->trans_id }}</td>
                                            <td>{{ date('Y-m-d', strtotime($trans->trans_date)) }}</td>
                                            <td>{{ $trans->name }}</td>
                                            <td>{{ $trans->phone }}</td>
                                            <td>{{ $trans->grand_total }}</td>
                                            <td>{{ $trans->address }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <p class="form-messege"></p>
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
