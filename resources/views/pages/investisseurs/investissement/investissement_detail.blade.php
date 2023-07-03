@extends('layout')
@section('content')

<style>
.card {
  background-color: rgba(63, 62, 62, 0.349);
  border-radius: 10px;
  box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
  padding: 20px;
}

.card-header {
  background-color: crimson;
  color: #fff;
  font-weight: bold;
  padding: 10px;
  border-radius: 10px 10px 0 0;
  text-align: center;
}

.card-title {
  font-size: 1.5rem;
  margin-bottom: 20px;
}

.card-text {
  margin-bottom: 1rem;
}

.btn-primary {
  background-color: crimson;
  color: #fff;
  border: none;
  border-radius: 5px;
  padding: 10px 20px;
  text-decoration: none;
  font-weight: bold;
  transition: background-color 0.3s ease;
}

.btn-primary:hover {
  background-color: #000000;
}

.container-fluid {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
}
</style>



    
  <div class="card col-md-12 mt-3 ">
    <div class=" rounded d-inline-block mb-2" style="width: 15rem;background-color:#DC143C;">
      <a href="{{ route('investisseurs.index') }}" class="text-white mb-2">
        <img src="{{ asset('build/imgs/arrow-left-solid.svg') }}" height="45"> Liste des investissements 
        </a>
    </div>
    
    <div class="card-header text-center">
      

         Investissement
      
    </div>
    <div id="detailInvestissement" class="card-body">
      <h5 class="card-title">Entrepreneur : <span style="color:#DC143C">
        @if($investissement->entrepreneur)
        {{$investissement->entrepreneur->name}}

        @else
     Votre demande d'investissement a été rejetté   <img src="{{ asset('build/imgs/remove.png') }}" height="30" alt="Non validé">

        @endif
      </span> </h5>
   
      <div class="row">
        <div class="card col-md-6">
            <div class="card-title">Concernant le projet</div>
    
            <p class="card-text">Titre: {{$investissement->projet? $investissement->projet->libelle : "Pas de projet"}}</p>
            <p class="card-text">Cout: {{$investissement->projet? $investissement->projet->cout : "Pas de projet"}} CFA</p>
            <p class="card-text">Date de début: {{$investissement->projet? $investissement->projet->date_debut : "Pas de projet"}}</p>
            <p class="card-text">Date de fin: {{$investissement->projet? $investissement->projet->date_fin : "Pas de projet"}}</p>
            <div class="card col-md-7 mb-2" style="height: 5rem ; align-content:center;">
              <p class="card-title">              Statut: 
                <span>
                  @if($investissement->projet->statut == 0)
                  En Attente <img src="{{asset('build/imgs/stop.png')}}" height="30" alt="">
              @elseif ($investissement->projet->statut == 1)
                En Cours  <img src="{{asset('build/imgs/play.png')}}" height="30" alt="">
              @else
                Achevé !  <img src="{{asset('build/imgs/succes.png')}}" height="30" alt="">
              @endif
                </span>
              </p>
           
          </div>
          

          
            <div class="card">
                Description: {{$investissement->projet->description}}
            </div>
        </div>
    
        <div class="card col-md-5 offset-1">
            <div class="card-title">Concernant l'investissement</div>
    
            <p class="card-text">Montant: {{$investissement->montant}} CFA</p>
            <p class="card-text">Part de participation: {{$investissement->partDeParticipation}}%</p>
    
            <div class="card">
                <div class="card-title">Statut</div>
                <p class="card-text">@if($investissement->etat )  Accepté <img class="ml-4" src="{{ asset('build/imgs/succes.png') }}" height="30" alt="Validé">   @else En attente <img class="ml-4" src="{{ asset('build/imgs/stop.png') }}" height="30" alt="En attente"></p> @endif
            </div>
        </div>
    </div>
    

      <div class="row">
        <div class="card col-md-6 mt-2 offset-3">
            <div class="card-title">Condition de l'investissement</div>
    
            <p class="card-text">{{$investissement->conditions }}</p>
     
        </div>
      </div>

    <div class="card mt-2">
      
      <div class="row">
      <div class="col-md-3">   
        @if($investissement->entrepreneur)
        <a href="/chatify/{{$investissement->entrepreneur->id}}" class="btn btn-primary  custom-button">Contacter {{$investissement->entrepreneur->name}}</a>
        @endif
      </div>
      <div class="col-md-3 ">   
     @if ($investissement->projet->statut==0)
       
      <form action="{{route('investissements.create')}}" method="get">
          <input type="text" name="id" hidden value="{{$investissement->id}}">
        <button href="" class="btn btn-primary  custom-button">Annuler l'investissement </button>
        </form>
        @endif


      </div>
    </div>





        </div>

</div>
  </div>
  
<script>
                window.addEventListener('load', function() {
    @if (Session::has('tostr'))
                  toastr.warning('{{ Session::get('tostr') }}');
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
                                var detailInvestissement = responseDoc.getElementById('detailInvestissement').innerHTML;
           

                                document.getElementById('detailInvestissement').innerHTML = detailInvestissement;
              

                            }
                        };
                        xhr.send();
                    }
                }
            
 
            
                setInterval(refreshPage, refreshInterval);
</script>
@endsection
