<!--
=========================================================
* Paper Dashboard 2 - v2.0.1
=========================================================

* Product Page: https://www.creative-tim.com/product/paper-dashboard-2
* Copyright 2020 Creative Tim (https://www.creative-tim.com)

Coded by www.creative-tim.com

 =========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!doctype html>
<html lang="en">

@include('layouts.head')

<body class="">
    <div class="wrapper ">
        @include('layouts.sidebar')
        <div class="main-panel" style="height: 100vh;">
            <!-- Navbar -->
            @include('layouts.nav')
            <!-- End Navbar -->
            <div class="content">
                @yield('content')
            </div>
            @include('layouts.footer')
        </div>
    </div>
    <!--   Core JS Files   -->
    @include('layouts.js')
</body>

</html>
