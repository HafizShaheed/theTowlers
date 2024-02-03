<!DOCTYPE html>

<html lang="en">


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="keywords" content="">
    <meta name="author" content="">
    <meta name="robots" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="format-detection" content="telephone=no">

    <!-- FAVICONS ICON -->
    <link rel="shortcut icon" type="image/png" href="{{URL::to('/public/admin/assets/images/logo/logo.png')}}">
    <title> The Towellers  CLIENT | {{ $title }} </title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">


    @include('company.includes.style')
    @yield('addStyle')
</head>

<body data-typography="poppins" data-theme-version="light" data-layout="vertical" data-nav-headerbg="black"
    data-headerbg="color_1" style="">
    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="lds-ripple">
            <div></div>
            <div></div>
        </div>
    </div>
    <!--*******************
    Preloader end
********************-->

    <div id="main-wrapper">
        <!--**********************************
			Nav header start Header start
		***********************************-->
        @include('company.includes.topbar')

        <!--**********************************
	Header end 	Nav header end
***********************************-->
        <!--**********************************
	Sidebar start
***********************************-->

        <!--**********************************
	Sidebar end
***********************************-->
        @include('company.includes.sidebar')
        <!--**********************************
	Content body start
***********************************-->
        <div class="content-body">
            <!-- row -->
            <div class="page-titles">
                <ol class="breadcrumb">
                    {{--  <li>
						<h5 class="bc-title">{{$title}}</h5>
                    </li> --}}
                    <li class="breadcrumb-item">
                        <a href="javascript:void(0)">
                        @if ( $page == 'Dashboard')
                            <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="">
                                <path
                                    d="M2.125 6.375L8.5 1.41667L14.875 6.375V14.1667C14.875 14.5424 14.7257 14.9027 14.4601 15.1684C14.1944 15.4341 13.8341 15.5833 13.4583 15.5833H3.54167C3.16594 15.5833 2.80561 15.4341 2.53993 15.1684C2.27426 14.9027 2.125 14.5424 2.125 14.1667V6.375Z"
                                    stroke="#2C2C2C" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M6.375 15.5833V8.5H10.625V15.5833" stroke="#2C2C2C" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                        @endif

                            @if ( $page == 'Entery Reports')
                            <svg width="22" height="22" viewBox="0 0 22 22" fill="none"
                            xmlns="">
                            <path d="M6.75713 9.35157V15.64" stroke="#888888" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path d="M11.0349 6.34253V15.64" stroke="#888888" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path d="M15.2428 12.6746V15.64" stroke="#888888" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M15.2952 1.83333H6.70474C3.7103 1.83333 1.83331 3.95274 1.83331 6.95306V15.0469C1.83331 18.0473 3.70157 20.1667 6.70474 20.1667H15.2952C18.2984 20.1667 20.1666 18.0473 20.1666 15.0469V6.95306C20.1666 3.95274 18.2984 1.83333 15.2952 1.83333Z"
                                stroke="#888888" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                            @endif

                            @if (  $page == 'View Reports')
                            <div class="menu-icon">
                            <svg width="22" height="22" viewBox="0 0 22 22" fill="none"
                                xmlns="">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M13.5096 2.53165H7.41104C5.50437 2.52432 3.94146 4.04415 3.89654 5.9499V15.7701C3.85437 17.7071 5.38979 19.3121 7.32671 19.3552C7.35512 19.3552 7.38262 19.3561 7.41104 19.3552H14.7343C16.6538 19.2773 18.1663 17.6915 18.1525 15.7701V7.36798L13.5096 2.53165Z"
                                    stroke="#888888" stroke-linecap="round" stroke-linejoin="round" />
                                <path
                                    d="M13.2688 2.52084V5.18742C13.2688 6.48909 14.3211 7.54417 15.6228 7.54784H18.1482"
                                    stroke="#888888" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M13.0974 14.0786H8.1474" stroke="#888888" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path d="M11.2229 10.6388H8.14655" stroke="#888888" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                            @endif
                            {{ $page }}
                        </a>
                    </li>
                    {{--  <li class="breadcrumb-item active"><a href="javascript:void(0)">{{ $page }}</a></li> --}}
                </ol>

            </div>
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <div class="row">
                    <div class="col-12">
                        <div class="card card-custom ">

                            <div class="card-body">
                                <p>
                                <h2 class="card-title" style="color: white;">{{$pageIntro}}</h2>
                                {{ $pageDescription }}
                                </p>

                            </div>
                        </div>
                    </div>
                </div>
                  <!-- ============================================================== -->
                @yield('content')
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->

            </div>
        </div>

        <!--**********************************
	Content body end
***********************************-->

        <!-- modal start -->

        @yield('modal')
        <!-- modal end -->


        <!--**********************************
    Footer start
***********************************-->
        <div class="footer">
            <div class="copyright">
                <p>Copyright © Developed by <a href="#" target="_blank">WS</a> 2023</p>
            </div>
        </div>
        <!--**********************************
    Footer end
***********************************-->

    </div>

    <!--**********************************
		Scripts
	***********************************-->

    @include('company.includes.script')
    @yield('addScript')

</body>


</html>
