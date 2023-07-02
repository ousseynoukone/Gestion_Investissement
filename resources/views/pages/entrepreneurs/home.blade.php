@extends('layout')
@section('content')
    <div class="container-fluid position-relative d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Chargement...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-secondary navbar-dark">
                
                <a href="/" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary"><i class="fa fa-user-edit me-2"></i>Entreprendre</h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        @if(Auth::user()->avatar!="avatar.png")
                        <img class="rounded-circle" src="                    {{asset('storage/photos'). '/'.Auth::user()->avatar}}
                        " alt="" style="width: 40px; height: 40px;">

@else
<img class="rounded-circle" src="{{asset('build/imgs/moi.png')}}" alt="" style="width: 40px; height: 40px;">

@endif
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0">{{ Auth::user()->name }}</h6>
                        <span>Entrepreneur</span>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="{{route('entrepreneurs.index')}}" class="nav-item nav-link active "><i class="fa fa-tachometer-alt me-2"></i>Investissement</a>
                    <a href="{{route('projets.index')}}" class="nav-item nav-link "><i class="fa fa-keyboard me-2"></i>Mes projets</a>
                    <a href="{{route('annonces.index')}}" class="nav-item nav-link "><i class="fa fa-table me-2"></i>Mes annonces</a>
    
                </div>
            </nav>
        </div>
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-secondary navbar-dark sticky-top px-4 py-0">
                <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><i class="fa fa-user-edit"></i></h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
            
                <div class="navbar-nav align-items-center ms-auto">
                    <div class="nav-item dropdown">
                        <a href="/chatify" class="nav-link dropdown-toggle" >
                            <i class="fa fa-envelope me-lg-2 " >  
                            </i>
                          
                            <span class="d-none d-lg-inline-flex">Message</span>
                            <span id="numberOfMessage" class="badge alert-danger" style="color:#bb1c1c !important;">           {{Auth::user()->unreadMessagesCount()}}</span> 
                        </a>
                 
                    </div>

                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            @if(Auth::user()->avatar != "avatar.png")
                            <img class="rounded-circle" src="                    {{asset('storage/photos'). '/'.Auth::user()->avatar}}
                            " alt="" style="width: 40px; height: 40px;">
    
    @else
    <img class="rounded-circle" src="{{asset('build/imgs/moi.png')}}" alt="" style="width: 40px; height: 40px;">
    
    @endif                            <span class="d-none d-lg-inline-flex">{{ Auth::user()->name }}</span>
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
            </nav>
            <!-- Navbar End -->


            <!-- Sale & Revenue Start 
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-line fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Today Sale</p>
                                <h6 class="mb-0">$1234</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-bar fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Total Sale</p>
                                <h6 class="mb-0">$1234</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-area fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Today Revenue</p>
                                <h6 class="mb-0">$1234</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-pie fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Total Revenue</p>
                                <h6 class="mb-0">$1234</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
           Sale & Revenue End -->


            <!-- Sales Chart Start 
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-secondary text-center rounded p-4">
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <h6 class="mb-0">Worldwide Sales</h6>
                                <a href="">Show All</a>
                            </div>
                            <canvas id="worldwide-sales"></canvas>
                        </div>
                    </div>
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-secondary text-center rounded p-4">
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <h6 class="mb-0">Salse & Revenue</h6>
                                <a href="">Show All</a>
                            </div>
                            <canvas id="salse-revenue"></canvas>
                        </div>
                    </div>
                </div>
            </div>
     Sales Chart End -->


            <!-- Recent Sales Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Les investissements reçus</h6>
                    </div>
                    <div class="table-responsive" id="investissementContainer">
                        <table class="table  table-lg text-start align-middle table-bordered table-hover mb-0" style="color:#ffe8e8">
                            @if (count($investissements)==0)
                            <div class="alert alert-danger text-center text-white" style="   background-color: #bb1c1c;
                            " >Vous n'avez reçu aucun investissement</div>
                                
                            @else
                            <thead>
                                <tr style="color:#ffacac">
                                    <th scope="col">Montant</th>
                                    <th scope="col">Investisseur</th>
                                    <th scope="col">Entrepreneur</th>
                                    <th scope="col">Projet</th>
                                    <th scope="col">Date d'investissement</th>
                                    <th scope="col">Validation</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
        
                                @foreach($investissements as $investissement)
                                <tr>
                                    <td>{{ $investissement->montant }}</td>
                                    <td>{{ strlen($investissement->investisseur->name) > 10 ? substr($investissement->investisseur->name, 0, 10) . '..' : $investissement->investisseur->name }}</td>
                                    <td>{{ strlen($investissement->entrepreneur->name) > 10 ? substr($investissement->entrepreneur->name, 0, 10) . '..' : $investissement->entrepreneur->name }}</td>

                                    <td>{{ strlen($investissement->projet->libelle) > 7 ? substr($investissement->projet->libelle, 0, 7) . '...' : $investissement->projet->libelle }}</td>

                                    <td>{{ $investissement->date_investissement }}</td>
                                    <td>
                                        @if($investissement->etat != false)
                                           Oui <img src="{{ asset('build/imgs/succes.png') }}" height="30" alt="Validé">
                                        @else
                                          Non <img src="{{ asset('build/imgs/remove.png') }}" height="30" alt="Non validé">
                                        @endif
                                    </td>                                    <td><a class="btn btn-sm btn-primary" href="{{ route('investissements.show', ['investissement' => $investissement]) }}">Detail</a></td>
                                </tr>
                            
                            </tbody>  
                              @endforeach
                              {{$investissements->links("pagination::bootstrap-5")}}

                                @endif
                        </table>
                        
                    </div>
                </div>
            </div>
            

            <!-- Footer Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary rounded-top p-4">
                    <div class="row">
                        <div class="col-12 col-sm-6 text-center text-sm-start">
                            &copy; <a href="#">Entreprendre</a>, All Right Reserved. 
                        </div>
          
                    </div>
                </div>
            </div>
            <!-- Footer End -->
        </div>
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>
    <script>
    window.addEventListener('load', function() {
@if (Session::has('tostr'))
              toastr.info('{{ Session::get('tostr') }}');
        @endif
    })


                var refreshInterval = 10000; 
                var isHovered = false;
                var check = false;
            
                function refreshPage() {
                    if (!isHovered) { 
                        var xhr = new XMLHttpRequest();
                        xhr.open('GET', window.location.href, true);
                        xhr.onreadystatechange = function() {
                            if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                                var parser = new DOMParser();
                                var responseDoc = parser.parseFromString(xhr.responseText, 'text/html');
                                var annoncesHtml = responseDoc.getElementById('investissementContainer').innerHTML;
                                var numberOfMessage = responseDoc.getElementById('numberOfMessage').innerHTML;
                                message1 = document.getElementById('numberOfMessage').innerText;

                                document.getElementById('investissementContainer').innerHTML = annoncesHtml;
                                document.getElementById('numberOfMessage').innerHTML = numberOfMessage;
                                message2 = document.getElementById('numberOfMessage').innerText;



                                 

                                if((document.getElementById('numberOfMessage').innerText!="0" && check==false) || (document.getElementById('numberOfMessage').innerText!="0"&& message1<message2 ) ){
                                    toastr.error("Vous avez reçu "+document.getElementById('numberOfMessage').innerText + " nouveau(x) message(s).");
                                    check = true
                                }
                            }
                        };
                        xhr.send();
                    }
                }
            
 
            
                setInterval(refreshPage, refreshInterval);
</script>
@endsection
