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
    
    @endif                         <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0">{{ Auth::user()->name }}</h6>
                        <span>Entrepreneur</span>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="{{route('entrepreneurs.index')}}" class="nav-item nav-link "><i class="fa fa-tachometer-alt me-2"></i>Investissement</a>
                    <a href="{{route('projets.index')}}" class="nav-item nav-link "><i class="fa fa-keyboard me-2"></i>Mes projets</a>
                    <a href="{{route('annonces.index')}}" class="nav-item nav-link active"><i class="fa fa-table me-2"></i>Mes annonces</a>
    
                </div>
            </nav>
        </div>
        <!-- Sidebar End -->

        <!-- Content Start -->
        <div class="content"  style="background:none;">
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

{{-- Tableau d'affichage --}}

<!-- Table Start -->
<div class="container-fluid pt-4 px-4">
    <a type="button" data-bs-toggle="modal" data-bs-target="#add" class="btn btn-primary mb-2 custom-button" href="#add"  id="addButton">Publier une annonce</a>

    <div class="col-12">
        <div class="bg-secondary rounded h-100 p-4">
            <h6 class="mb-4">Liste de mes annonces</h6>
            <div class="table-responsive">
                @if (count($annonces) == 0)
                    <div class="alert alert-danger text-center text-white"
                        style="background-color: #bb1c1c;">Vous n'avez publié aucune annonce</div>
                @else
                    <table class="table" style="color: #ffe8e8">
                        <thead>
                            <tr style="color: #ffacac">
                                <th scope="col">Libellé</th>
                                <th scope="col">Coût</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($annonces as $annonce)
                                <tr>
                                    <td>{{ strlen($annonce->libelle) > 15 ? substr($annonce->libelle, 0, 15) . '...' : $annonce->libelle }}</td>
                                    <td>{{ $annonce->cout }}</td>

                                    <td><a class="btn btn-sm btn-primary"
                                            href="{{ route('annonces.show', ['annonce' => $annonce]) }}">Detail</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $annonces->links("pagination::bootstrap-5") }}
                @endif
            </div>
        </div>
    </div>
</div>







<div class="modal fade text-white" id="add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-primary">
            <h5 class="modal-title  text-center"  id="">Publier une annonce</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body bg-secondary">
                            <form id="addForm" method="POST">
                                @csrf
                                <div class="form-group mt-1">
                                    <label for="libelle">Libellé</label>
                                    <textarea required  type="text" rows="5" class="form-control @error('libelle') is-invalid @enderror" id="libelle" name="libelle" > {{ old('libelle') }}</textarea>
                                    @error('libelle')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <div class="form-group mt-1">
                                    <label for="">Choisir un projet</label>
                                <select  required  onchange="coutDisplay()"  class="form-select " id="projet_id"  name="projet_id" aria-label="Default select example">
                                    <option  selected value="">Il s'agit de quel projet ?</option>
                                    @foreach ($projets as $projet )
                                    @if($projet->annonce==null)
                                    <option @if ( old('projet_id')==$projet->id ) {{"selected"}}    @endif value="{{$projet->id}}"> {{$projet->libelle}}</option>
@endif
     
                                    @endforeach
                                                                     </select>
                                              

                         
                                </div>
                                <div class="form-group mt-1">
                                    <label for="cout">Coût</label>
                                    <input type="number" readonly class="form-control   @error('cout') is-invalid @enderror"  id="coutAddForm" name="cout" required value="{{ old('cout') }}">
                                    @error('cout')
                                    
                                    <div class="invalid-feedback">{{ $message }}</div>

                                    @enderror
                           
                                </div>



 
                                <div class="mt-3 offset-5">
                                    <button type="submit" class="btn btn-primary mr-2">Publier</button>
                                    <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Fermer</button>
                      
                                </div>
                            </form>
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

</body>
<script>
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
        