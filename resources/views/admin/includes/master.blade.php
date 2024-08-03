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

    <title> THE TOWELLERS ADMIN  | {{ $title }} </title>
    <style>
        /* Scrollbar styles for WebKit browsers (Chrome, Safari) */
        ::-webkit-scrollbar {
            width: 12px !important;
        }

        ::-webkit-scrollbar-track {
            background: #ffffff !important; /* Dark background color */
        }

        ::-webkit-scrollbar-thumb {
            background-color: #ffffff !important; /* Darker thumb color */
            border-radius: 50% !important;
            border: 2px solid #ffffff !important; /* Optional: to give padding around thumb */
        }

        /* Scrollbar styles for Firefox */
        * {
            scrollbar-width: auto !important;
            scrollbar-color: #ffffff #3f3025 !important;
        }

        ::-webkit-scrollbar-button {
            display: none !important;
        }
        /* General styles */
        body {
            height: 200vh !important; /* Example to show scrollbar */
            background-color: #ecf0f1 !important;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


    @include('admin.includes.style')
    @yield('addStyle')
</head>

<body data-typography="poppins" data-theme-version="light" data-layout="vertical" data-nav-headerbg="black"
    data-headerbg="color_1">
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
        @include('admin.includes.topbar')

        <!--**********************************
	Header end 	Nav header end
***********************************-->
        <!--**********************************
	Sidebar start
***********************************-->

        <!--**********************************
	Sidebar end
***********************************-->
        @include('admin.includes.sidebar')
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
                            @if ( $page == 'Attention')
                            <svg width="20" height="20" viewBox="0 0 22 22" fill="none"
                                xmlns="">
                                <path d="M11.9951 16.6768V14.1398" stroke="#2C2C2C" stroke-width="0/8"
                                    stroke-linecap="round" stroke-linejoin="round" />
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M18.19 5.3302C19.88 5.3302 21.24 6.7002 21.24 8.3902V11.8302C18.78 13.2702 15.53 14.1402 11.99 14.1402C8.45 14.1402 5.21 13.2702 2.75 11.8302V8.3802C2.75 6.6902 4.12 5.3302 5.81 5.3302H18.19Z"
                                    stroke="#2C2C2C" stroke-width="0.8" stroke-linecap="round"
                                    stroke-linejoin="round" />

                                <path
                                    d="M2.77441 15.483L2.96341 17.992C3.09141 19.683 4.50041 20.99 6.19541 20.99H17.7944C19.4894 20.99 20.8984 19.683 21.0264 17.992L21.2154 15.483"
                                    stroke="#2C2C2C" stroke-width="0.8" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                            @endif
                            @if ( $page == 'Reports Page')
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

                            @if ( $title == 'Client Managment')
                            <div class="menu-icon">
                            <svg width="22" height="22" viewBox="0 0 22 22" fill="none"
                                xmlns="">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M8.79222 13.9396C12.1738 13.9396 15.0641 14.452 15.0641 16.4989C15.0641 18.5458 12.1931 19.0729 8.79222 19.0729C5.40972 19.0729 2.52039 18.5651 2.52039 16.5172C2.52039 14.4694 5.39047 13.9396 8.79222 13.9396Z"
                                    stroke="#888888" stroke-linecap="round" stroke-linejoin="round" />
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M8.79223 11.0182C6.57206 11.0182 4.77173 9.21874 4.77173 6.99857C4.77173 4.7784 6.57206 2.97898 8.79223 2.97898C11.0115 2.97898 12.8118 4.7784 12.8118 6.99857C12.8201 9.21049 11.0326 11.0099 8.82064 11.0182H8.79223Z"
                                    stroke="#888888" stroke-linecap="round" stroke-linejoin="round" />
                                <path
                                    d="M15.1095 9.9748C16.5771 9.76855 17.7073 8.50905 17.7101 6.98464C17.7101 5.48222 16.6147 4.23555 15.1782 3.99997"
                                    stroke="#888888" stroke-linecap="round" stroke-linejoin="round" />
                                <path
                                    d="M17.0458 13.5045C18.4675 13.7163 19.4603 14.2149 19.4603 15.2416C19.4603 15.9483 18.9928 16.4067 18.2374 16.6936"
                                    stroke="#888888" stroke-linecap="round" stroke-linejoin="round" />
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
                {{-- <div class="row">
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
                </div> --}}
                  <!-- ============================================================== -->
                  @if(session('success'))
                    <div class="alert alert-success" id="successAlert">
                        {{ session('success') }}
                    </div>
                    @endif

                    @if(session('error'))
                        <div class="alert alert-danger" id="errorAlert">
                            {{ session('error') }}
                        </div>
                    @endif
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
                <p>Copyright © Developed by <a href="#" target="">WS</a> 2023</p>
            </div>
        </div>
        <!--**********************************
    Footer end
***********************************-->

    </div>

    <!--**********************************
		Scripts
	***********************************-->
    @include('admin.includes.script')
    @yield('addScript')

</body>


</html>
