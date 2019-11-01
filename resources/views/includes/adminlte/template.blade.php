@include('includes.adminlte.head')

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Navbar -->
        @include('includes.adminlte.navbar')
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        @include('includes.adminlte.sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            @isset($content_title)
                <div class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1 class="m-0 text-dark">{{ $content_title }}</h1>
                            </div><!-- /.col -->
                            {{-- <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active">Starter Page</li>
                                </ol>
                            </div><!-- /.col --> --}}
                        </div><!-- /.row -->
                    </div><!-- /.container-fluid -->
                </div>
            @endisset
            <!-- /.content-header -->
            @include('includes.adminlte.notif')
            <!-- Main content -->
            <div class="content @isset($content_title) '' @else pt-2 @endisset">
                @yield('content')
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

@include('includes.adminlte.footer')

