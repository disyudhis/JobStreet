<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Company | Job Center</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('home/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('home/css/sb-admin-2.min.css') }}" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-industry"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Company</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('dashboard_company') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Settings
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('view_settings') }}">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Profil Perusahaan</span>
                </a>
            </li>

        </ul>
        <!-- End of Sidebar -->


        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">


            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                @include('company.topbar')

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    @if (session()->has('message'))
                        <div class="alert alert-success" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                            {{ session()->get('message') }}
                        </div>
                    @endif
              

                    <!-- Page Heading -->
                    @if ($status !== null)
                        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                            <h1 class="h3 mb-0 text-gray-800">Data Perusahaan</h1>

                            <button data-toggle="modal" data-target="#lowonganKerja"
                                class="d-none d-sm-inline-block rounded-lg btn btn-outline-secondary btn-lg shadow-sm rounded-circle"
                                disabled><i class="fas fa-plus fa-xl text-white-100"></i></button>
                        @else
                            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                                <h1 class="h3 mb-0 text-gray-800">Lengkapi Data Perusahaan</h1>

                                <button data-toggle="modal" data-target="#lowonganKerja"
                                    class="d-none d-sm-inline-block rounded-lg btn btn-primary btn-lg shadow-sm"><i
                                        class="fas fa-plus fa-xl text-white-100"></i></button>
                    @endif

                </div>

                <!-- Modal -->
                <div class="modal fade" id="lowonganKerja" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Data Perusahaan</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <form method="POST" action="{{ route('store_profile') }}" enctype="multipart/form-data">
                                @csrf

                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="namaPerusahaan" class="col-form-label">Nama Perusahaan
                                            :</label>
                                        <input type="text" class="form-control" id="namaPerusahaan"
                                            name="namaPerusahaan" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="address" class="col-form-label">Alamat :</label>
                                        <textarea class="form-control" id="address" name="address" required></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="phone" class="col-form-label">Phone :</label>
                                        <input class="form-control" type="number" id="phone" name="phone"
                                            required></input>
                                    </div>
                                    <div class="mb-3">
                                        <label for="email" class="col-form-label">Email :</label>
                                        <input class="form-control" type="email" id="email" name="email"
                                            required></input>
                                    </div>
                                    <div class="mb-3">
                                        <label for="image" class="col-form-label">Logo Perusahaan :</label>
                                        <input class="form-control" type="file" id="image" name="image"
                                            required></input>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-secondary" type="button"
                                        data-dismiss="modal">Cancel</button>
                                    <button class="btn btn-primary" type="submit">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>


                {{-- Profil Perusahaan --}}
                @foreach ($status as $status)
                    <div class="row mb-4">
                        <div class="col-md-8 offset-md-2">
                            <div class="card">
                                <div class="card-header">
                                    <h2>Profil Perusahaan</h2>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6 mb-4">
                                            <img src="/company/{{ $status->image }}" alt="logo"
                                                style="width: 100%; max-height: 20rem; object-fit: cover; object-position: center"
                                                class="rounded-circle">
                                        </div>
                                        <div class="col-md-6">
                                            <h4>Nama Perusahaan</h4>
                                            <p>{{ $status->NP }}</p>
                                            <h4>Alamat</h4>
                                            <p>{{ $status->address }}</p>
                                            <h4>Email</h4>
                                            <p>{{ $status->email }}</p>
                                            <h4>Telepon</h4>
                                            <p>{{ $status->phone }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <p>{{ $status->created_at }}</p>
                                </div>
                            </div>
                        </div>
                @endforeach
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- End of Main Content -->
        <!-- Footer -->
        @include('admin.footer')
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    @include('admin.logout-modal')

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('home/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('home/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('home/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('home/js/sb-admin-2.min.js') }}"></script>

    <!-- Page level plugins -->
    <script src="{{ asset('home/vendor/chart.js/Chart.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('home/js/demo/chart-area-demo.js') }}"></script>
    <script src="{{ asset('home/js/demo/chart-pie-demo.js') }}"></script>

</body>

</html>
