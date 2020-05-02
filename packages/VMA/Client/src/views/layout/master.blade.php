<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
@include('client::layout.head')
<body>

<!--navigation-->

@include('client::layout.navigation')
<!--header start-->
<div class="container">

@include('client::layout.header')
<!--header end-->

    <!--sidebar end-->
    <!--main content start-->

    <section id="main-content" class="">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        @yield('client_content')

    </section>

    <!-- Placed js at the end of the document so the pages load faster -->

</div>
<script src="<?php echo getUrl('/'); ?>/BucketAdmin/html/js/icheck-init.js"></script>
@include('client::layout.footer')
</body>

</html>
