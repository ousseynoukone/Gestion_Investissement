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
    <div class="card-body">
      <h5 class="card-title">Entrepreneur : <span style="color:#DC143C">{{$investissement->entrepreneur->name}}</span> </h5>
   
      <div class="row" >

      <div class="card col-md-6 ">
        <div class="card-title">  Concernant le projet</div>

        <p class="card-text">Titre : {{$investissement->projet? $investissement->projet->libelle : "Pas de projet"}}</p>
        <p class="card-text">Cout : {{$investissement->projet? $investissement->projet->cout : "Pas de projet"}} CFA</p>
        <p class="card-text">Date de début : {{$investissement->projet? $investissement->projet->date_debut : "Pas de projet"}}</p>
        <p class="card-text">Date de fin : {{$investissement->projet? $investissement->projet->date_fin : "Pas de projet"}}</p>

        <div class="card">
          Description : {{$investissement->projet->description}}
        </div>
    </div>

    <div class="card col-md-5 offset-1 ">
      <div class="card-title">Concernant l'investissement</div>

      <p class="card-text">Montant : {{$investissement->montant}} CFA</p>
      <p class="card-text">Part de participation : {{$investissement->partDeParticipation}}%</p>

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
      <div class="col-md-5">   

           <a class="btn btn-primary  custom-button">Contacter {{$investissement->entrepreneur->name}}</a>

            @if($investissement->etat==true)
        
          Validé  <img class="ml-4" src="{{ asset('build/imgs/succes.png') }}" height="30" alt="Validé">

        
        @else
        
           @endif

      </div>
    </div>





        </div>

</div>
  </div>
  
<script>

</script>
@endsection
