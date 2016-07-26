@include('website.header')
<header id="top">
    <div class="header-a">
        <div class="wrapper-padding">
            <div class="header-phone"><span>+255 767638233</span></div>
            {{--<div class="header-account"></div>--}}
            <div class="header-social">
                <a href="#" class="social-twitter"></a>
                <a href="#" class="social-facebook"></a>
                <a href="#" class="social-instagram"></a>
            </div>
        </div>
    </div>
    <div class="header-b">
        <!-- // mobile menu // -->
        <div class="mobile-menu">
        <nav>
        <ul>
        <li><a class="has-child" href="#">HOME</a> </li>
        <li><a class="has-child" href="#">Hotels</a></li>
        </ul>
        </nav>
        </div>
        <!-- \\ mobile menu \\ -->
        <div class="wrapper-padding">
            <div class="header-logo">
                {{--<a href="index-2.html">--}}
                {{--</a>--}}
            </div>
            <div class="header-right">
                <a href="#" class="menu-btn"></a>
                <nav class="header-nav">
                    <ul>
                        <li><a href="{{ url('booking/'.$slug ) }}">Home</a> </li>
                        <li><a href="{{ url('booking/'.$slug.'/aboutus') }}">about us</a></li>
                        <li><a href="{{ url('booking/'.$slug.'/contacts') }}">contact us</a></li>
                        <li><a data-toggle="modal" data-target="#myModal" >Search Tickets</a></li>
                    </ul>
                </nav>
            </div>
            {{--<div class="clear"></div>--}}
        </div>
    </div>
</header>
@yield('main-count')
@include('website.footer')