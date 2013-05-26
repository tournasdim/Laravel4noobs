<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
    <title>
        @yield('title')
        | Welcome to the homepage
        @show

    </title>

 <link href="{{{ URL::asset('assets/css/style.css') }}}" rel="stylesheet">

</head>
<body>
    <div id="container">
        <div id="nav">
            <ul>
                 <li>{{ Html::linkRoute('home', 'Home') }}</li>
                  <li>{{ Html::linkRoute('contactus', 'Contactus') }}</li>

                @if(Auth::check())
                    <li>{{ Html::linkRoute('vip', 'Only-Vip' ) }}</li>
                    <li>{{ Html::linkRoute('basic-auth', 'demo-page' ) }}</li>
                    <li>{{ Html::linkRoute('listmembers', 'Members-list' ) }}</li>
                    <li>{{Html::linkRoute('logout', 'Logout ('.Auth::user()->username.')') }}</li>
                @else
                    <li>{{Html::linkRoute('login', 'Login') }}</li>
                @endif
            </ul>
        </div><!-- end nav -->

        <!-- check for flash notification message -->
        @if(Session::has('flash_notice'))
            <div id="flash_notice">{{ Session::get('flash_notice') }}</div>
        @endif
        @if (isset($flash_notice))
        <div id="flash_notice">{{ $flash_notice}}</div>
        @endif

        @yield('content')
    </div><!-- end container -->
        @yield('javascript')
</body>
</html>