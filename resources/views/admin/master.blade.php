<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>@yield('title', 'News Portal')</title>
        <meta name="description" content="" />
        @section('meta', '')

        <link href="http://fonts.googleapis.com/css?family=Bitter" rel="stylesheet" type="text/css" />
        <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">

        {!! Rapyd::styles(true) !!}
    </head>

    <body>

        <div id="wrap">

            <div class="container">
                <div class="container-fluid" >
                    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
                        <div class="container">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                                <a class="navbar-brand" href="/">News Portal</a>
                            </div>

                            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                <ul class="nav navbar-nav navbar-right">
                                    @if (Auth::check())
                                    <li><a href={{ url('/') }}>Back to frontend</a></li>
                                    <li>Hello, {{Auth::user()->name}} 
                                        <a href={{ url('auth/logout') }}>Log Out</a></li>
                                    @else
                                    <li><a href={{ url('/') }}>Home</a></li>
                                    <li><a href={{ url('auth/login') }}>Login</a></li>
                                    <li><a href={{ url('auth/register') }}>Sign Up</a></li>
                                    @endif
                                </ul>

                            </div><!-- /.navbar-collapse -->
                        </div>
                    </nav>
                </div>
                <div style="margin-top:70px">
                    <h1>Admin Page</h1>

                    @if(Session::has('message'))
                    <div class="alert alert-success">
                        {!! Session::get('message') !!}
                    </div>
                    @endif

                    <br />

                    <div class="row">


                        @yield('body')
                        <div class="col-sm-12">
                            @yield('content')
                        </div>
                    </div>
                </div>


            </div>



        </div>

        <div id="footer">
        </div>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.pjax/1.9.6/jquery.pjax.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/riot/2.2.4/riot+compiler.min.js"></script>
        {!! Rapyd::scripts() !!}
        <script>riot.mount('*')</script>

    </body>
</html>