<header id="header-section">
        <nav class="navbar navbar-expand-lg pl-3 pl-sm-0" id="navbar">
            <div class="container">
                <div class="navbar-brand-wrapper d-flex w-100">
                    <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="mdi mdi-menu navbar-toggler-icon"></span>
                    </button> 
                </div>
                <div class="collapse navbar-collapse navbar-menu-wrapper" id="navbarSupportedContent">
                    <ul class="navbar-nav align-items-lg-center align-items-start ml-auto">
                        <li class="d-flex align-items-center justify-content-between pl-4 pl-lg-0">
                            <div class="navbar-collapse-logo">
                            </div>
                            <button class="navbar-toggler close-button" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="mdi mdi-close navbar-toggler-icon pl-5"></span>
                            </button>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('redirect')}}">Home </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('project')}}">Projects </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('profile')}}">Profile </a>
                        </li>
                        <li>
                            @if (Route::has('login'))
                                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                                    @auth
                                    <li>
                                        <form method="POST" action="{{ route('logout') }}" class="nav-link">
                                            @csrf
                                            <x-jet-responsive-nav-link href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                                {{ __('Logout') }}
                                            </x-jet-responsive-nav-link>
                                        </form>
                                    </li>
                                    @else
                                        <li><a href="{{ route('login') }}" class="nav-link">Login</a></li>

                                        @if (Route::has('register'))
                                            <li><a href="{{ route('register') }}" class="nav-link">Register</a></li>
                                        @endif
                                    @endauth
                                </div>
                            @endif
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>