<!-- Navigation -->


<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                    aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="">
                    <a class="btn" href="{{url('/client/home')}}">Home</a>
                </li>
                <li class="dropdown">
                    <a class="btn" onmouseenter="check_category();" href="{{url('/client/product')}}">Travel
                        Service
                    </a>
                    <div id="manu_category" class="dropdown-content ">
                        <!-- Danh sách thư mục sẽ ở đây-->
                    </div>
                </li>
                <li>
                    <a class="btn" href="{{url('/client/product')}}">News</a>
                </li>
                <li>
                    <a class="btn " href="{{url('/client/about_us')}}">About Us</a>
                </li>
                <li>
                    <a class="btn" href="{{url('/client/contact')}}">Contact</a>
                </li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                <li><a href="#"><i class="fa fa-reddit"></i></a></li>
            </ul>

        </div>
        <!--/.nav-collapse -->
    </div>
</nav>
<script language="javascript">
    function check_category() {
        console.log('sss');
        $.ajax({
            url: ("{{route("check.category.ajax")}}"),
            method: "POST",
            data: {},
            success: function (data) {
                // alert(data);
                if (data != null) {
                    $('#manu_category').html(data);
                }
            }
        });
    }
</script>