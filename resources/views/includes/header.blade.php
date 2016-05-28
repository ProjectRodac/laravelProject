<header>
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mainNavBar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ route('dashboard') }}">Rodac's Social Network</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="mainNavBar">

                @if (!Auth::Guest())
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="{{ route('account') }}">Account</a></li>
                    <li><a href="{{ route('logout') }}">Logout</a></li>
                </ul>
                    @else
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="" class="navbar-link signup">Sign Up</a></li>
                        <li><a href="" class="navbar-link login">Login</a></li>
                    </ul>
                @endif
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
</header>
