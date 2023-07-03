@extends('layout')
@section('content')
<link rel="stylesheet" href="template/sidebar.css">
<link rel="stylesheet" href="template/fontawesome-free-5.15.3-web/css/all.min.css">
<link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
<body style="background-image: url({{asset('build/imgs/annonce.jpg')}}); background-size: cover; ">

    <div class="container-fluid position-relative d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Chargement...</span>
            </div>
        </div>
        <!-- Spinner End -->


        {{-- <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-secondary navbar-dark">
                <a href="/" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary"><i class="fa fa-user-edit me-2"></i>Entreprendre</h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        @if(Auth::user()->avatar != "avatar.png")
                        <img class="rounded-circle" src="                    {{asset('storage/photos'). '/'.Auth::user()->avatar}}
" alt="" style="width: 40px; height: 40px;">

@else
<img class="rounded-circle" src="{{asset('build/imgs/moi.png')}}" alt="" style="width: 40px; height: 40px;">

@endif                          <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0">{{ Auth::user()->name }}</h6>
                        <span>Investisseur</span>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="{{route('investisseurs.index')}}" class="nav-item nav-link "><i class="fa fa-tachometer-alt me-2"></i>Investissement</a>
                    <a href="{{route('annonces.index')}}" class="nav-item nav-link active"><i class="fa fa-table me-2"></i> Les annonces</a>
    
                </div>
            </nav>
        </div> --}}
        <!-- Sidebar End -->


                  <!-- Sidebar Start -->
        
                  <div class="sidebare">
                    <div class="logo-details">
                        <div class="logo_name">
                        <a href="/" class="navbar-brand mx-4 mb-3">
                         <h4 class="text-primary"><i class="fa fa-user-edit me-2"></i>Entreprendre</h4></a>
                        </div>
                        <i class='bx bx-menu' id="btn" ></i>
                    </div>
                    
                    <ul class="nav-list">
                    <li>
                        <i class='bx bx-search' ></i>
                        <input type="text" placeholder="Rechercher...">
                        <span class="tooltip" >Rechercher</span>
                    </li>
                    <li>
                        <a href="#">
                        <i class='bx bx-grid-alt'></i>
                        <span class="links_name">Dashboard</span>
                        </a>
                        <span class="tooltip">Dashboard</span>
                    </li>
                    <li>
                    <a href="#">
                    <a href="{{route('investisseurs.index')}}" >
                    <i class="fas fa-chart-line fa-ls"></i>
                        <span class="links_name">Investissement</span>
                    </a>
                    <span class="tooltip">Investissement</span>
                    </li>
                    
            
                    <li>
                    <a href="{{route('annonces.index')}}">
                    <i class="fas fa-bullhorn"></i>
                        <span class="links_name">Mes annonces</span>
                    </a>
                    <span class="tooltip">Mes annonces</span>
                    </li>
                    <li>
                    <a href="/chatify">
                    
                    <i class="fas fa-comments"></i>
                        <span class="links_name">Messages</span>
                    </a>
                    <span class="tooltip">Messages</span>
                    </li>
                    
                    
                    <li>
                    <a href="#">
                    <i class="fas fa-cogs text-danger"></i>
                        <span class="links_name">Parametre</span>
                    </a>
                    <span class="tooltip">Parametre</span>
                    </li>
                    
               </div> 
        
           </li>              
                </ul>
                    
                </div>
                
                
        <!-- Sidebar End -->

        <!-- Content Start -->
        <div class="content" style="background:none;">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand  navbar-dark sticky-top px-4 py-0" style="background: linear-gradient(90deg, rgba(25,28,36,1) 100%, rgba(31,34,42,0.9501925770308123) 100%, rgba(25,28,36,1) 100%);" >
            <i class="fas fa-home fa-lg" style="color: rgb(187,11,11);"></i>
        
            <div class="ms-3">
                        <h6 class="mb-0">{{ Auth::user()->name }}</h6>
                        
                        <span>Investisseur</span>
                    </div>
                    
           
                <div class="navbar-nav align-items-center ms-auto">
                    <div class="nav-item dropdown">
                        <a href="/chatify" class="nav-link dropdown-toggle" >
                            <i class="fa fa-envelope me-lg-2"></i>
                            <span class="d-none d-lg-inline-flex">Messages</span>
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
            <div class="container-fluid pt-4 px-4">
            
                <div class="col-12">
                    <div class="card bg-secondary rounded h-100 p-4">
                        <h6 class="mb-4">Les annonces</h6>
                        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4 " id="annoncesContainer">
                            @if (count($annonces) == 0 || !$annonces->contains(function ($annonce) {
                                return ($annonce->projet->investissement != null && $annonce->projet->investissement->etat == false) || $annonce->projet->investissement == null;
                            }))                                <div class="alert alert-danger text-center text-white"
                                    style="background-color: #bb1c1c;">Aucune annonce publiée</div>
                            @else
                                @foreach ($annonces as $annonce)
                                
                                @if(($annonce->projet->investissement!=null && $annonce->projet->investissement->etat==false) || ($annonce->projet->investissement==null )   )
                                    <div class="col text-white ">
                                        <div class="card" style="background-color:rgba(14, 14, 14, 0.801)">
                                            <div class="card-header h5">
                                              Annonce
                                            </div>
                                            <div class="card-body" >
                                              <h6 class="card-title">Publié par <span class="text-primary"> {{$annonce->user->name}}</span></h6>
                                              <p class="card-text">Titre : {{$annonce->libelle}}</p>
                                              <p class="card-text">Projet : {{$annonce->projet? $annonce->projet->libelle : "Pas de projet"}}</p>
                                              <p class="card-text">Cout : {{$annonce->cout}}</p>
                                              <p class="card-text offset-2">{{$annonce->date_pub}}</p>

                            
                                              <a href="{{route('investisseurs.show',['investisseur'=>$annonce->id])}}" class="btn btn-primary">En savoir plus</a>
                                            </div>
                                          </div>
                                    </div>
                                    @endif
                                @endforeach
                            @endif
                        </div>
                        @if (count($annonces) > 0)
                            <div class="d-flex justify-content-end">
                                {{ $annonces->links("pagination::bootstrap-5") }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            


        
                    <!-- Footer End -->
                </div>
                <!-- Content End -->
        
        
                <!-- Back to Top -->
                <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
            </div>

</body>
<script>
    let sidebar = document.querySelector(".sidebare");
    let closeBtn = document.querySelector("#btn");
    let searchBtn = document.querySelector(".bx-search");

    closeBtn.addEventListener("click", ()=>{
        sidebar.classList.toggle("open");
        menuBtnChange();//calling the function(optional)
    });

    searchBtn.addEventListener("click", ()=>{ // Sidebar open when you click on the search iocn
        sidebar.classList.toggle("open");
        menuBtnChange(); //calling the function(optional)
    });

    // following are the code to change sidebar button(optional)
    function menuBtnChange() {
    if(sidebar.classList.contains("open")){
        closeBtn.classList.replace("bx-menu", "bx-menu-alt-right");//replacing the iocns class
    }else {
        closeBtn.classList.replace("bx-menu-alt-right","bx-menu");//replacing the iocns class
    }
    }
</script>
            <script>
                var refreshInterval = 10000; // 10 seconds
                var isHovered = false; // Flag to track if button is hovered
                var check = false;

                // Refreshes the page content by making an AJAX request
                function refreshPage() {
                    if (!isHovered) { // Check if button is not hovered
                        var xhr = new XMLHttpRequest();
                        xhr.open('GET', window.location.href, true);
                        xhr.onreadystatechange = function() {
                            if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                                // Extract the annonces HTML from the response
                                var parser = new DOMParser();
                                var responseDoc = parser.parseFromString(xhr.responseText, 'text/html');
                                var annoncesHtml = responseDoc.getElementById('annoncesContainer').innerHTML;
                                var numberOfMessage = responseDoc.getElementById('numberOfMessage').innerHTML;
                                message1 = document.getElementById('numberOfMessage').innerText;

                                // Replace the existing annonces HTML with the updated content
                                document.getElementById('annoncesContainer').innerHTML = annoncesHtml;
                                
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
            
 
            
                // Set up the interval to refresh the page content
                setInterval(refreshPage, refreshInterval);
            </script>

            @endsection
            
            