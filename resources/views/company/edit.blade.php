@include('company.head');

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center"
                href="{{ route('dashboard_company', auth()->user()->id) }}">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-industry"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Company</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('dashboard_company', auth()->user()->id) }}">
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
            <li class="nav-item">
                <a class="nav-link" href="{{ route('view_settings', auth()->user()->id) }}">
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
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Edit Data</h1>
                    </div>


                    {{-- Modal edit data --}}

                    <form method="POST" action="{{ route('update', $loker->id) }}">
                        @csrf

                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="judul" class="col-form-label">Judul:</label>
                                <input type="text" class="form-control" id="judul" name="judul" required
                                    value="{{ old('judul', $loker->judul) }}">
                            </div>
                            <div class="mb-3">
                                <label for="deskripsi" class="col-form-label">Deskripsi:</label>
                                <textarea class="form-control" id="deskripsi" name="deskripsi" required>{{ old('deskripsi', $loker->deskripsi) }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="gaji" class="col-form-label">Gaji:</label>
                                <input class="form-control" type="number" id="gaji" name="gaji" required
                                    value="{{ old('gaji', $loker->gaji) }}"></input>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                            <button class="btn btn-primary" type="submit">Simpan</button>
                        </div>
                    </form>




                </div>
                <!-- /.container-fluid -->


            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            @include('admin.footer')

        </div>
        <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    @include('admin.logout-modal')

    @include('company.js')

    {{-- script datatables --}}


</body>

</html>
