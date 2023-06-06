@include('client.head')

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

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

                    <div class="row row-cols-1 row-cols-md-4 g-4">
                        @foreach ($lowongan as $lowongan)
                            <div class="col mb-4">
                                <div class="card">
                                    <img src="/company/{{ $lowongan->logo }}" class="card-img-top" alt="logo"
                                        style="height: 200px; object-fit: cover; object-position: center;">
                                    <div class="card-body">
                                        <h5 class="card-title" style="font-family: sans-serif; color:black">
                                            <strong>{{ $lowongan->judul }}</strong>
                                        </h5>
                                        <h6 style="font-size: 15px">{{ $lowongan->NP }}</h6>
                                        <h6 style="font-family: sans-serif"><i class="fa fa-money"></i> Rp.
                                            {{ number_format($lowongan->gaji, 0, ',', '.') }}</h6>
                                        <h6 style="font-family: sans-serif; font-size: 12px"><i
                                                class="fa fa-location-dot"></i> {{ $lowongan->alamat }}</h6>
                                        <hr>
                                        <p class="card-text"><strong>Deskripsi :</strong>
                                            {{ Str::limit($lowongan->deskripsi, 100) }}</p>
                                    </div>
                                    <div class="card-footer">
                                        <a class="btn btn-primary"
                                            href="{{ route('lowongan.show', ['lowongan' => $lowongan->id]) }}">Lihat</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
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
