

            <!-- Sidebar End -->
    
    
            <!-- Content Start -->
            <div class="content1">
                <!-- Navbar Start -->
                <nav  class="navbar navbar-expand bg-secondary navbar-dark sticky-top px-4 py-0">
                    @if(Auth::user()->role=="investisseur")
                    <a href="{{route('investisseurs.index')}}" class="navbar-brand mx-4 mb-3">
                        <h3 class="text-primary"><i class="fa fa-user-edit me-2"></i>Entreprendre</h3>
                    </a>
                    @else
                    <a href="{{route('entrepreneurs.index')}}" class="navbar-brand mx-4 mb-3" style="padding-right:57rem;">
                        <h3 class="text-primary"><i class="fa fa-user-edit me-2"></i>Entreprendre</h3>
                    </a>
                    @endif
                        <div   class="nav-item1 dropdown ml-5" >
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                                <img class="rounded-circle" src="{{asset('build/imgs/moi.png')}}" alt="" style="width: 40px; height: 40px;">
                                <span class="d-none d-lg-inline-flex">{{ Auth::user()->name }}</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
    
                                <a class="dropdown-item" href={{route('profile.edit')}}>
                                    {{ __('Mon profile') }}
                                </a>
    
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
        
                                    <a class="dropdown-item" href="route('logout')"
                                            onclick="event.preventDefault();
                                                        this.closest('form').submit();">
                                        {{ __('Se déconnecter') }}
                                    </a>
                                </form> 
                            </div>
                        </div>
                    </div>
      