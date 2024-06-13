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
                    <h2 class="breadcrumb-title">Customers List</h2>
                    <!-- breadcrumb-list start -->
                    <ul class="breadcrumb-list">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active"> Customers List</li>
                    </ul>
                    <!-- breadcrumb-list end -->
                </div>
            </div>
        </div>
    </div>

    <!-- breadcrumb-area end -->

   <!-- Users List Area Start -->
   <div class="contact-area pt-100px pb-100px">
    <div class="container">
        <div class="contact-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="title" data-aos="fade-up" data-aos-delay="200">Total User: <span style="font-weight: 700">{{ $totalUsers }} </span> </h2>
                </div>
            </div>
        </div>
        <div class="contact-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <div class="contact-form">
                        <div class="contact-title mb-30">
                            <h2 class="title" data-aos="fade-up" data-aos-delay="200">Customers List</h2>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>
                                            <a href="{{ route('userlist', ['sort' => 'user_id', 'direction' => $sort == 'user_id' && $direction == 'asc' ? 'desc' : 'asc']) }}">
                                                User ID
                                                @if ($sort == 'user_id')
                                                    <i class="fa fa-sort-{{ $direction == 'asc' ? 'asc' : 'desc' }}"></i>
                                                @endif
                                            </a>
                                        </th>
                                        <th>
                                            <a href="{{ route('userlist', ['sort' => 'name', 'direction' => $sort == 'name' && $direction == 'asc' ? 'desc' : 'asc']) }}">
                                                Name
                                                @if ($sort == 'name')
                                                    <i class="fa fa-sort-{{ $direction == 'asc' ? 'asc' : 'desc' }}"></i>
                                                @endif
                                            </a>
                                        </th>
                                        <th>
                                            <a href="{{ route('userlist', ['sort' => 'email', 'direction' => $sort == 'email' && $direction == 'asc' ? 'desc' : 'asc']) }}">
                                                Email
                                                @if ($sort == 'email')
                                                    <i class="fa fa-sort-{{ $direction == 'asc' ? 'asc' : 'desc' }}"></i>
                                                @endif
                                            </a>
                                        </th>
                                        <th>
                                            <a href="{{ route('userlist', ['sort' => 'total_transactions', 'direction' => $sort == 'total_transactions' && $direction == 'asc' ? 'desc' : 'asc']) }}">
                                                Total Transaction
                                                @if ($sort == 'total_transactions')
                                                    <i class="fa fa-sort-{{ $direction == 'asc' ? 'asc' : 'desc' }}"></i>
                                                @endif
                                            </a>
                                        </th>
                                        <th>
                                            <a href="{{ route('userlist', ['sort' => 'last_transaction_date', 'direction' => $sort == 'last_transaction_date' && $direction == 'asc' ? 'desc' : 'asc']) }}">
                                                Last Transaction Date
                                                @if ($sort == 'last_transaction_date')
                                                    <i class="fa fa-sort-{{ $direction == 'asc' ? 'asc' : 'desc' }}"></i>
                                                @endif
                                            </a>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $index => $user)
                                        <tr>

                                            <td>{{ $user->user_id }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->total_transactions }}</td>
                                            <td>{{ $user->last_transaction_date }}</td>
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
</div>
<!-- Users List Area End -->
    @endsection

    <!-- Vendor JS -->
</body>

</html>
