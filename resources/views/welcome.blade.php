@include('welcome.head')

<body>
    <div class="container-xxl bg-white p-0">
        <!-- Spinner Start -->
       @include('welcome.spinner')
        <!-- Spinner End -->


        <!-- Navbar Start -->
        <nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
            <a href="index.html" class="navbar-brand d-flex align-items-center text-center py-0 px-4 px-lg-5">
                <img src="{{ asset('logo/Pendaftaran Polinema .png') }}" alt="logo" height="30" class="me-2">
                <h1 class="m-0 text-primary">JobCenter</h1>
            </a>
            <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse"
                data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto p-4 p-lg-0">
                </div>
                <a href="{{ route('login') }}"
                    class="btn btn-primary rounded-0 py-4 px-lg-5 d-none d-lg-block">Login</a>
            </div>
        </nav>
        <!-- Navbar End -->


        <!-- Carousel Start -->
        @include('welcome.carousel')
        <!-- Carousel End -->


        <!-- Category Start -->
        {{-- @include('welcome.category') --}}
        <!-- Category End -->


        <!-- About Start -->
        @include('welcome.about')
        <!-- About End -->


        <!-- Testimonial Start -->
        {{-- @include('welcome.testimonial') --}}
        <!-- Testimonial End -->

        {{-- Contact Start --}}
        @include('welcome.contact')
        {{-- Contact End --}}


        <!-- Footer Start -->
        @include('welcome.footer')
        <!-- Footer End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    @include('welcome.script')
</body>

</html>
