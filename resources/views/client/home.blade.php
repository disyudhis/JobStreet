@include('welcome.head')

<body>
    <div class="container-xxl bg-white p-0">
        <!-- Spinner Start -->
        @include('welcome.spinner')
        <!-- Spinner End -->


        <!-- Navbar Start -->
        <nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
            <a href="#" class="navbar-brand d-flex align-items-center text-center py-0 px-4 px-lg-5">
                <img src="{{ asset('logo/Pendaftaran Polinema .png') }}" alt="logo" height="30" class="me-2">
                <h1 class="m-0 text-primary">JobCenter</h1>
            </a>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto p-4 p-lg-0">
                    <div class="nav-item dropdown">
                        <a type="submit" class="nav-link dropdown-toggle "
                            data-bs-toggle="dropdown">{{ Auth::user()->name }}</a>
                        <div class="dropdown-menu rounded-0 m-0">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="dropdown-item" data-toggle="modal"
                                    data-target="#logoutModal">Logout</button>
                            </form>
                        </div>

                    </div>
                </div>


                <a href="#job" class="btn btn-primary rounded-0 py-4 px-lg-5 d-none d-lg-block">Cari Pekerjaan</a>
            </div>
        </nav>
        <!-- Navbar End -->



        @if (session()->has('message'))
            <div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                {{ session()->get('message') }}
            </div>
        @endif


        <!-- Carousel Start -->
        @include('welcome.carousel')
        <!-- Carousel End -->


        <!-- Category Start -->
        {{-- <div class="container-xxl py-5">
            <div class="container">
                <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Explore By Category</h1>
                <div class="row g-4">
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                        <a class="cat-item rounded p-4" href="#">
                            <i class="fa fa-3x fa-mail-bulk text-primary mb-4"></i>
                            <h6 class="mb-3">Marketing</h6>
                            <p class="mb-0">123 Vacancy</p>
                        </a>
                    </div>
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                        <a class="cat-item rounded p-4" href="#">
                            <i class="fa fa-3x fa-headset text-primary mb-4"></i>
                            <h6 class="mb-3">Customer Service</h6>
                            <p class="mb-0">123 Vacancy</p>
                        </a>
                    </div>
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                        <a class="cat-item rounded p-4" href="#">
                            <i class="fa fa-3x fa-user-tie text-primary mb-4"></i>
                            <h6 class="mb-3">Human Resource</h6>
                            <p class="mb-0">123 Vacancy</p>
                        </a>
                    </div>
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                        <a class="cat-item rounded p-4" href="#">
                            <i class="fa fa-3x fa-tasks text-primary mb-4"></i>
                            <h6 class="mb-3">Project Management</h6>
                            <p class="mb-0">123 Vacancy</p>
                        </a>
                    </div>
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                        <a class="cat-item rounded p-4" href="">
                            <i class="fa fa-3x fa-chart-line text-primary mb-4"></i>
                            <h6 class="mb-3">Business Development</h6>
                            <p class="mb-0">123 Vacancy</p>
                        </a>
                    </div>
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                        <a class="cat-item rounded p-4" href="#">
                            <i class="fa fa-3x fa-hands-helping text-primary mb-4"></i>
                            <h6 class="mb-3">Sales & Communication</h6>
                            <p class="mb-0">123 Vacancy</p>
                        </a>
                    </div>
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                        <a class="cat-item rounded p-4" href="#">
                            <i class="fa fa-3x fa-book-reader text-primary mb-4"></i>
                            <h6 class="mb-3">Teaching & Education</h6>
                            <p class="mb-0">123 Vacancy</p>
                        </a>
                    </div>
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                        <a class="cat-item rounded p-4" href="#">
                            <i class="fa fa-3x fa-drafting-compass text-primary mb-4"></i>
                            <h6 class="mb-3">Design & Creative</h6>
                            <p class="mb-0">123 Vacancy</p>
                        </a>
                    </div>
                </div>
            </div>
        </div> --}}
        <!-- Category End -->


        <!-- About Start -->
        @include('welcome.about')
        <!-- About End -->


        <!-- Jobs Start -->
        <div class="container-xxl py-5">
            <div class="container" id="job">
                <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Job Listing</h1>
                <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.3s">
                    <ul class="nav nav-pills d-inline-flex justify-content-center border-bottom mb-5">
                        <li class="nav-item">
                            <a class="d-flex align-items-center text-start mx-3 ms-0 pb-3 active" data-bs-toggle="pill"
                                href="#">
                                <h6 class="mt-n1 mb-0">Featured</h6>
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div id="tab-1" class="tab-pane fade show p-0 active">
                            @foreach ($lowongan as $lowongan)
                                <div class="job-item p-4 mb-4">
                                    <div class="row g-4">
                                        <div class="col-sm-12 col-md-8 d-flex align-items-center">
                                            <img class="flex-shrink-0 img-fluid border rounded"
                                                src="/company/{{ $lowongan->logo }}" alt=""
                                                style="width: 80px; height: 80px;">
                                            <div class="text-start ps-4">
                                                <h5 class="mb-3">{{ $lowongan->judul }}</h5>
                                                <span class="text-truncate me-3"><i
                                                        class="fa fa-map-marker-alt text-primary me-2"></i>{{ $lowongan->alamat }}</span>
                                                <span class="text-truncate me-3"><i
                                                        class="fa-solid fa-industry text-primary me-2"></i>{{ $lowongan->NP }}</span>
                                                <span class="text-truncate me-0"><i
                                                        class="far fa-money-bill-alt text-primary me-2"></i>{{ number_format($lowongan->gaji, 0, ',', '.') }}</span>
                                            </div>
                                        </div>
                                        <div
                                            class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                                            <div class="d-flex mb-3">
                                                <a class="btn btn-primary"
                                                    href="{{ route('lowongan.show', ['lowongan' => $lowongan->id]) }}">Apply
                                                    Now</a>
                                            </div>
                                            <small class="text-truncate"><i
                                                    class="far fa-calendar-alt text-primary me-2"></i>Date Line:
                                                {{ \Carbon\Carbon::parse($lowongan->update)->format('d M Y') }}</small>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Jobs End -->


        <!-- Testimonial Start -->
        {{-- <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
            <div class="container">
                <h1 class="text-center mb-5">Our Clients Say!!!</h1>
                <div class="owl-carousel testimonial-carousel">
                    <div class="testimonial-item bg-light rounded p-4">
                        <i class="fa fa-quote-left fa-2x text-primary mb-3"></i>
                        <p>Dolor et eos labore, stet justo sed est sed. Diam sed sed dolor stet amet eirmod eos labore
                            diam</p>
                        <div class="d-flex align-items-center">
                            <img class="img-fluid flex-shrink-0 rounded"
                                src="{{ asset('welcome/img/testimonial-1.jpg') }}"
                                style="width: 50px; height: 50px;">
                            <div class="ps-3">
                                <h5 class="mb-1">Client Name</h5>
                                <small>Profession</small>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-item bg-light rounded p-4">
                        <i class="fa fa-quote-left fa-2x text-primary mb-3"></i>
                        <p>Dolor et eos labore, stet justo sed est sed. Diam sed sed dolor stet amet eirmod eos labore
                            diam</p>
                        <div class="d-flex align-items-center">
                            <img class="img-fluid flex-shrink-0 rounded"
                                src="{{ asset('welcome/img/testimonial-2.jpg') }}"
                                style="width: 50px; height: 50px;">
                            <div class="ps-3">
                                <h5 class="mb-1">Client Name</h5>
                                <small>Profession</small>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-item bg-light rounded p-4">
                        <i class="fa fa-quote-left fa-2x text-primary mb-3"></i>
                        <p>Dolor et eos labore, stet justo sed est sed. Diam sed sed dolor stet amet eirmod eos labore
                            diam</p>
                        <div class="d-flex align-items-center">
                            <img class="img-fluid flex-shrink-0 rounded"
                                src="{{ asset('welcome/img/testimonial-3.jpg') }}"
                                style="width: 50px; height: 50px;">
                            <div class="ps-3">
                                <h5 class="mb-1">Client Name</h5>
                                <small>Profession</small>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-item bg-light rounded p-4">
                        <i class="fa fa-quote-left fa-2x text-primary mb-3"></i>
                        <p>Dolor et eos labore, stet justo sed est sed. Diam sed sed dolor stet amet eirmod eos labore
                            diam</p>
                        <div class="d-flex align-items-center">
                            <img class="img-fluid flex-shrink-0 rounded"
                                src="{{ asset('welcome/img/testimonial-4.jpg') }}"
                                style="width: 50px; height: 50px;">
                            <div class="ps-3">
                                <h5 class="mb-1">Client Name</h5>
                                <small>Profession</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
        <!-- Testimonial End -->

        {{-- Contact Start --}}
        @include('welcome.contact')
        {{-- Contact End --}}

        <!-- Footer Start -->
        @include('welcome.footer')
        <!-- Footer End -->

        {{-- Logout modal --}}
        @include('admin.logout-modal')
        {{-- End Modal --}}
        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    @include('welcome.script')
</body>

</html>
