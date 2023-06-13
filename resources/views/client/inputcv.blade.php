@include('client.head')

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('getLowongan') }}">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fa fa-laptop"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Client</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('getLowongan') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>
        </ul>
        <!-- End of Sidebar -->


        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">


                <!-- Topbar -->
                @include('admin.topbar')
                @if (session()->has('message'))
                    <div class="alert alert-success" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                        {{ session()->get('message') }}
                    </div>
                @endif

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <div class="row mb-4">
                        <div class="col-md-8 offset-md-2">
                            <div class="card">
                                <div class="card-header">
                                    <h5 style="font-family: sans-serif; color:black">Informasi Lowongan</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input type="hidden" name="loker_id" value="{{ $loker->id }}">
                                            <img src="/company/{{ $loker->logo }}" alt="logo"
                                                style="width: 70%; max-height: 15rem; object-fit: cover; object-position: center"
                                                class="rounded-circle mb-2">
                                            <hr>
                                            <h6 style="font-family: sans-serif; color: black; font-size: 15px">Nama
                                                Perusahaan</h6>
                                            <p>{{ $loker->NP }}</p>
                                            <h6 style="font-family: sans-serif; color: black; font-size: 15px">Alamat
                                            </h6>
                                            <p><i class="fa fa-location-dot"></i> {{ $loker->alamat }}</p>
                                            <h6 style="font-family: sans-serif; color: black; font-size: 15px">Email
                                            </h6>
                                            <p><i class="fa fa-envelope"></i> {{ $loker->email }}</p>
                                            <h6 style="font-family: sans-serif; color: black; font-size: 15px">Telepon
                                            </h6>
                                            <p><i class="fa fa-phone"></i> {{ $loker->phone }}</p>
                                        </div>
                                        <div class="col-md-6 mb-4">
                                            <h6 style="font-family: sans-serif; color: black; font-size: 15px">Judul:
                                            </h6>
                                            <p>{{ $loker->judul }}</p>
                                            <h6 style="font-family: sans-serif; color: black; font-size: 15px">Upah:
                                            </h6>
                                            <p><i class="fa fa-money"></i> Rp.
                                                {{ number_format($loker->gaji, 0, ',', '.') }}</p>
                                            <h6 style="font-family: sans-serif; color: black; font-size: 15px">
                                                Deskripsi: </h6>
                                            <p>{{ $loker->deskripsi }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button class="btn btn-success" data-toggle="modal"
                                        data-target="#daftarKerja">Lamar Pekerjaan</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                {{-- Modal --}}
                <div class="modal fade" id="daftarKerja" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Identitas Diri</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <form method="POST" action="{{ route('daftarKerja', $loker->id) }}" enctype="multipart/form-data">
                                @csrf

                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="name" class="col-form-label">Nama Lengkap
                                            :</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                            readonly value="{{ $user->name }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="email" class="col-form-label">Email :</label>
                                        <input class="form-control" type="email" id="email" name="email"
                                            value="{{ $user->email }}" readonly required></input>
                                    </div>
                                    <div class="mb-3">
                                        <label for="cv" class="col-form-label">CV :</label>
                                        <input class="form-control" type="file" id="cv" name="cv"
                                            accept="application/pdf" required></input>
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

    @include('client.script')
</body>

</html>
