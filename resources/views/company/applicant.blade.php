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
            <li class="nav-item">
                <a class="nav-link" href="{{ route('dashboard_company', auth()->user()->id) }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            {{-- Nav Item - Applicant --}}
            <li class="nav-item active">
                <a href="" class="nav-link">
                    <i class="fas fa-fw fa-user-circle"></i>
                    <span>Pendaftar</span>
                </a>
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
                    {{-- <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Pendaftar</h1>
                    </div> --}}

                    {{-- Data tables --}}
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Pendaftar</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered myTable" width="100%" id="dataTable" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th class="text-center">No</th>
                                            <th class="text-center">Nama</th>
                                            <th class="text-center">Judul</th>
                                            <th class="text-center">CV</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                    </tbody>
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

    @include('company.js')

    {{-- script datatables --}}
    <script type="text/javascript">
        $(document).ready(function() {
            $('.myTable').DataTable({
                ajax: "{{ route('getApplicant') }}",
                processing: true,
                serverSide: true,
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
                        data: 'name',
                        name: 'nama',
                    },
                    {
                        data: 'judul',
                        name: 'judul'
                    },
                    {
                        data: 'cv',
                        name: 'cv',
                        render: function(data, type, full, meta) {
                            return '<a href="/pdf/' + data + '" download>Unduh CV</a>';
                        }
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
