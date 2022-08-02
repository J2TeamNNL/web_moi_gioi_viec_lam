<nav class="navbar navbar-default navbar-fixed-top navbar-color-on-scroll" color-on-scroll="100" id="sectionsNav">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ route('applicant.index') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
        </div>

        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="material-icons">flag</i> Languages
                        <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu dropdown-with-icons">
                        <li>
                            <a href="{{ route('language', 'en') }}">
                                <img src="{{ asset('flag/us.svg') }}" alt="user-image" class="mr-1" height="12">
                                <span class="align-middle">English</span>
                            </a>
                            <a href="{{ route('language', 'vi') }}">
                                <img src="{{ asset('flag/vn.svg') }}" alt="user-image" class="mr-1" height="12">
                                <span class="align-middle">Tiếng Việt</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="button-container">
                    <a href="{{ route('login') }}" class="btn btn-rose btn-round">
                        <i class="fa fa-user"></i> Đăng nhập
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>