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
            <a class="navbar-brand" href="presentation.html">Material Kit PRO</a>
        </div>

        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="../index.html">
                        <i class="material-icons">apps</i> Components
                    </a>
                </li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="material-icons">view_day</i> Sections
                        <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu dropdown-with-icons">
                        <li>
                            <a href="../sections.html#headers">
                                <i class="material-icons">dns</i> Headers
                            </a>
                        </li>
                        <li>
                            <a href="../sections.html#features">
                                <i class="material-icons">build</i> Features
                            </a>
                        </li>
                        <li>
                            <a href="../sections.html#blogs">
                                <i class="material-icons">list</i> Blogs
                            </a>
                        </li>
                        <li>
                            <a href="../sections.html#teams">
                                <i class="material-icons">people</i> Teams
                            </a>
                        </li>
                        <li>
                            <a href="../sections.html#projects">
                                <i class="material-icons">assignment</i> Projects
                            </a>
                        </li>
                        <li>
                            <a href="../sections.html#pricing">
                                <i class="material-icons">monetization_on</i> Pricing
                            </a>
                        </li>
                        <li>
                            <a href="../sections.html#testimonials">
                                <i class="material-icons">chat</i> Testimonials
                            </a>
                        </li>
                        <li>
                            <a href="../sections.html#contactus">
                                <i class="material-icons">call</i> Contacts
                            </a>
                        </li>

                    </ul>
                </li>

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
                    <a href="http://www.creative-tim.com/buy/material-kit-pro?ref=presentation" target="_blank" class="btn btn-rose btn-round">
                        <i class="material-icons">shopping_cart</i> Buy Now
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>