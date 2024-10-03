<!doctype html>

<html
    lang="en"
    class="light-style layout-navbar-fixed layout-compact layout-menu-fixed"
    dir="ltr"
    data-theme="theme-semi-dark"
    data-assets-path="{{asset('/')}}assets/"
    data-template="web-starter-app"
    data-style="light">
@include('shared::layouts.head')

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->
            @include('desk::layouts.menu')
            <!-- / Menu -->

            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->
                @include('shared::layouts.navbar')
                <!-- / Navbar -->

                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->
                    <div id="content-area">
                        @yield('content')
                    </div>
                    <!-- / Content -->

                    <!-- Footer -->
                    @include('shared::layouts.footer')
                    <!-- / Footer -->

                    <div class="content-backdrop fade"></div>
                </div>
                <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>

        <!-- Drag Target Area To SlideIn Menu On Small Screens -->
        <div class="drag-target"></div>
    </div>
    <!-- / Layout wrapper -->

    @include('shared::layouts.plugins')
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <script src="{{asset('/')}}assets/custom/app.js"></script>
    <script>
        let BASE_URL = `{{URL('/')}}`;
        let menuLinks = document.querySelectorAll('.main-menu_nav');
        // Ambil semua link dari menu

        // Tambahkan event listener ke setiap link
        menuLinks.forEach(function(link) {
            link.addEventListener('click', function(e) {
                e.preventDefault(); // Mencegah link melakukan navigasi

                // Ambil URL dari data-url attribute
                let url = this.getAttribute('data-url');
                let params = this.getAttribute('data-params');
                // let url = 'desk/content';
                $('#content-area').html('');
                // Axios untuk mengambil konten dari server
                axios.post('/api/desk/load-page', {
                // axios.post('/desk/content', {
                        id: url,
                        params: params
                    })
                    .then(function(response) {
                        var html = atob(response['data'].html);
                        $('#content-area').html(html);
                        // console.log(atob(response.html))
                        // console.log(response);
                        // Menampilkan respons dalam div content-area
                        // document.getElementById('content-area').innerHTML = response.data;
                    })
                    .catch(function(error) {
                        // console.log(error)
                        // console.error('Error:', error);
                    });
            });
        });
        axios.defaults.headers.common['X-CSRF-TOKEN'] = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        document.addEventListener('DOMContentLoaded', function() {
            const observer = new MutationObserver(function(mutations) {
                const firstMenu = document.querySelector('.main-menu_nav');
                if (firstMenu) {
                    firstMenu.click(); // Menjalankan klik pada menu pertama
                    observer.disconnect(); // Hentikan observer setelah elemen ditemukan
                }
            });
            observer.observe(document.body, {
                childList: true,
                subtree: true
            });
            APP.save({
                data: "some data"
            });
        });
    </script>
    @yield('plugins')
</body>

</html>