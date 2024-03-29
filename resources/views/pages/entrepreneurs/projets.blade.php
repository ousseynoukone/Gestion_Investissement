@extends('layout')
@section('content')

<link rel="stylesheet" href="template/sidebar.css">
<link rel="stylesheet" href="template/fontawesome-free-5.15.3-web/css/all.min.css">
<link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
<body style="background-image: url({{asset('build/imgs/projet.jpg')}}); background-size: cover; ">

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
                    @if(Auth::user()->avatar!="avatar.png")
                    <img class="rounded-circle" src="                    {{asset('storage/photos'). '/'.Auth::user()->avatar}}
                    " alt="" style="width: 40px; height: 40px;">

@else
<img class="rounded-circle" src="{{asset('build/imgs/moi.png')}}" alt="" style="width: 40px; height: 40px;">

@endif                    <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                </div>
                <div class="ms-3">
                    <h6 class="mb-0">{{ Auth::user()->name }}</h6>
                    <span>Entrepreneur</span>
                </div>
            </div>
            <div class="navbar-nav w-100">
                <a href="{{route('entrepreneurs.index')}}" class="nav-item nav-link "><i class="fa fa-tachometer-alt me-2"></i>Investissement</a>
                <a href="{{route('projets.index')}}" class="nav-item nav-link active"><i class="fa fa-keyboard me-2"></i>Mes projets</a>
                <a href="{{route('annonces.index')}}" class="nav-item nav-link "><i class="fa fa-table me-2"></i>Mes annonces</a>

            </div>
        </nav>
    </div>
    <!-- Sidebar End --> --}}

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
                <a href="{{route('entrepreneurs.index')}}" >
                <i class="fas fa-chart-line fa-ls"></i>
                    <span class="links_name">Investissement</span>
                </a>
                <span class="tooltip">Investissement</span>
                </li>
                
                <li>
                <a href="{{route('projets.index')}}"> 
                <i class="fas fa-tasks"></i>
                    <span class="links_name">Mes projets</span>
                </a>
                <span class="tooltip">Mes projets</span>
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


    <div class="content" style="background:none;">
        <!-- Navbar Start -->
        <nav class="navbar navbar-expand  navbar-dark sticky-top px-4 py-0" style="background: linear-gradient(90deg, rgba(25,28,36,1) 100%, rgba(31,34,42,0.9501925770308123) 100%, rgba(25,28,36,1) 100%);" >
        <i class="fas fa-home fa-lg" style="color: rgb(187,11,11);"></i>

        <div class="ms-3">
                    <h6 class="mb-0">{{ Auth::user()->name }}</h6>
                    
                    <span>Entrepreneur</span>
                </div>
                
            <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
                <h2 class="text-primary mb-0"><i class="fa fa-user-edit"></i></h2>
            </a>
        
            <div class="navbar-nav align-items-center ms-auto">
                <div class="nav-item dropdown">
                    <a href="/chatify" class="nav-link dropdown-toggle">
                        <i class="fa fa-envelope me-lg-2"></i>
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
{{-- 
    
 Boite Mondal pour ajouter un   projet 
    --}}

      

  

            <!-- Table Start -->
            <div class="container-fluid pt-4 px-4">
                <a type="button" data-bs-toggle="modal" data-bs-target="#add" class="btn btn-primary mb-2 custom-button" href="#add"  id="addButton">Ajouter un projet</a>

                    <div class="col-12">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">Liste de mes projets</h6>
                            <div class="table-responsive">
                                <table class="table table-lg " style="color:#ffe8e8" >
                                    @if (count($projets)==0)
                                    <div class="alert alert-danger text-center text-white" style="    background-color: #bb1c1c;
                                    " >Vous n'avez enregistré aucun projet</div>
                                        
                                    @else
                                    <thead>
                                        <tr style="color:#ffacac">
                                            <th scope="col">Libelle</th>
                                            <th scope="col">Description</th>
                                            <th scope="col">Cout</th>
                                            <th scope="col">Date de debut</th>
                                            <th scope="col">Date de fin</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($projets as  $projet)
                                        <tr>
                                            <td>{{ strlen($projet->libelle) > 15 ? substr($projet->libelle, 0, 15) . '...' : $projet->libelle }}</td>
                                            <td>{{ strlen($projet->description) > 15 ? substr($projet->description, 0, 15) . '...' : $projet->description }}</td>

                                            <td>{{$projet->cout}}</td>

                                            <td>{{$projet->date_debut}}</td>
                                            <td>{{$projet->date_fin}}</td>
                                            <td>
                                                
                                                <a  type="button" id="detail" class="btn btn-sm btn-primary"  onclick="loadProjectDetail({{$projet->id}})" href="{{route('projets.edit',['projet'=>$projet])}}"><img src="{{asset('build/imgs/eye.png')}}" height="25"  alt=""> </a>
                                        <form method="POST" action="{{route('projets.destroy',['projet'=>$projet])}}" accept-charset="UTF-8" style="display:inline">
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }}
                                            <button  class="btn btn-sm btn-primary"    ><img src="{{asset('build/imgs/remove.png')}}" height="20"  alt=""> </button>

                          
                                          </form>

                                          <form method="GET" action="{{route('status.update',['id'=>$projet->id])}}" accept-charset="UTF-8" style="display:inline">
                                            @if($projet->statut==0)
                                            <button  class="btn btn-sm btn-success"    ><img src="{{asset('build/imgs/play.png')}}" height="20"  alt=""> </button>
                                            @elseif ($projet->statut==1)
                                            <button  class="btn btn-sm btn-primary"    ><img src="{{asset('build/imgs/stop.png')}}" height="20"  alt=""> </button>
                                            @else
                                            <button  class="btn btn-sm btn-primary"    ><img src="{{asset('build/imgs/succes.png')}}" height="20"  alt=""> </button>

                                            @endif

                          
                                          </form>
                                        </td>

                                        

                                        </tr>
                     
                                   
                                    </tbody>
                                    @endforeach
                                    {{ $projets->links("pagination::bootstrap-5") }}

                                    @endif

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            <!-- Table End -->
            <!-- Button trigger modal -->

  <!-- Modal  pour ajout de projet-->
  <div class="modal fade text-white" id="add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-primary">
            <h5 class="modal-title  text-center"  id="">Ajouter un projet</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body bg-secondary">
            <form  id="addForm"  method="POST">
              @csrf
              <div class="form-group mt-1">
                <label for="libelle">Libellé</label>
                <input type="text" class="form-control ajoutModalErrorShow @error('libelle')  is-invalid @enderror" id="libelle" name="libelle" value="{{ old('libelle') }}">
                
                @error('libelle')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror

              </div>

              <div class="form-group mt-1">
                  <label for="description">Description</label>
                  <textarea rows="4" cols="50" maxlength="200" type="text" class="form-control ajoutModalErrorShow @error('description')  is-invalid @enderror" id="description" name="description" >{{ old('description') }}</textarea>
              
                  @error('description')
                  <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
              </div>

              <div class="form-group mt-1">
                <label for="cout">Coût</label>
                <input type="number" class="form-control ajoutModalErrorShow  @error('cout')  is-invalid @enderror" id="cout" name="cout" required value="{{ old('cout') }}" >
                @error('cout')
                <div class="invalid-feedback ">{{ $message }}</div>
                @enderror
              
              </div>

              <div class="form-group mt-1">

                <label for="date_debut">Date de début</label>
                <input type="date" id="date" min="{{$currentDate}}" class="form-control ajoutModalErrorShow   @error('date_debut')  is-invalid @enderror" id="date_debut" name="date_debut" value="{{ old('date_debut') }}"  required>
                @error('date_debut')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>

              <div class="form-group mt-1">
                <label for="date_fin">Date de fin</label>
                <input type="date" min="{{$currentDate}}"  id="date" class="form-control ajoutModalErrorShow  @error('date_fin')  is-invalid  @enderror" id="date_fin" name="date_fin" value="{{old('date_fin')}}" required>
                @error('date_fin')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="mt-3 offset-5 ">
              <button type="submit" class="btn btn-primary mr-2">Ajouter</button>

          </div>
          </form>
          </div>
        </div>
      </div>
    </div>



     
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>
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
        window.addEventListener('load', function() {
    @if (Session::has('tostr'))
                  toastr.error('{{ Session::get('tostr') }}');
            @endif


            @if (Session::has('tostrSucess'))
                  toastr.info('{{ Session::get('tostrSucess') }}');
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
                                var numberOfMessage = responseDoc.getElementById('numberOfMessage').innerHTML;
                                message1 = document.getElementById('numberOfMessage').innerText;

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
