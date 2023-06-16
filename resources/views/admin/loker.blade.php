@include('admin.head')

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">

        {{-- Sidebar --}}
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-lock"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Admin</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item ">
                <a class="nav-link" href="{{ route('user') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <li class="nav-item active">
                <a class="nav-link" href="{{ route('loker') }}">
                    <i class="fas fa-fw fa-newspaper"></i>
                    <span>Lowongan Pekerjaan</span></a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="{{ route('kandidat') }}">
                    <i class="fas fa-fw fa-person"></i>
                    <span>Pelamar Kerja</span></a>
            </li>


        </ul>
        <!-- End of Sidebar -->


        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                @include('admin.topbar')

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    @if (session()->has('message'))
                        <div class="alert alert-success" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                            {{ session()->get('message') }}
                        </div>
                    @endif

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Lowongan Pekerjaan</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered myTable" id="dataTable" width="100%"
                                    cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th class="text-center">No</th>
                                            <th class="text-center">Logo</th>
                                            <th class="text-center">Nama Perusahaan</th>
                                            <th class="text-center">Judul</th>
                                            <th class="text-center">Deskripsi</th>
                                            <th class="text-center">Gaji</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
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

    <!-- Bootstrap core JavaScript-->
    @include('admin.script')

    <script type="text/javascript">
        $(document).ready(function() {
            $('.myTable').DataTable({
                ajax: "{{ route('showLoker') }}",
                processing: true,
                serverSide: false,
                fixedHeader: true,
                responsive: true,
                deferRender: true,
                type: 'GET',
                destroy: true,
                paging: true,
                columns: [{
                        data: null,
                        name: 'id',
                        render: function(data, type, full, meta) {
                            return meta.row + 1;
                        }
                    },
                    {
                        data: 'logo',
                        name: 'logo',
                        render: function(data, type, full, meta) {
                            return '<img src="/company/' + data + '" alt="Logo" width="100">';
                        }
                    },
                    {
                        data: 'NP',
                        name: 'NP'
                    },
                    {
                        data: 'judul',
                        name: 'judul'
                    },
                    {
                        data: 'deskripsi',
                        name: 'deskripsi'
                    },
                    {
                        data: 'gaji',
                        name: 'gaji'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    }
                ]

            })
        })
    </script>

</body>

</html>
