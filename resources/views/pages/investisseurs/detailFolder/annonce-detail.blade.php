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


  <!-- Modal  pour faire investissement-->
  <div class="modal fade text-white" id="investirModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-primary">
            <h5 class="modal-title text-center" id="">Faire un investissement</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body bg-secondary">
            <form id="addForm" method="POST" action="{{ route('investissements.store') }}">
                @csrf
                <div class="form-group mt-1">
                    <label for="montant">Montant</label>
                    <input type="number" class="form-control ajoutInvesModalShow @error('montant') is-invalid @enderror" id="montant" name="montant" value="{{ old('montant') }}">
                    @error('montant')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <input type="number" hidden class="form-control ajoutInvesModalShow"   name="projet_id" value="{{$annonce->projet ? $annonce->projet->id : "" }}">
                <input type="number" hidden class="form-control ajoutInvesModalShow"   name="entrepreneur_id" value="{{$annonce->user ? $annonce->user->id : "" }}">

    

    
 
    

    
                <div class="form-group mt-1">
                    <label for="partDeParticipation">Part de participation</label>
                    <input type="number" class="form-control ajoutInvesModalShow @error('partDeParticipation') is-invalid @enderror" id="partDeParticipation" name="partDeParticipation" value="{{ old('partDeParticipation') }}">
    
                    @error('partDeParticipation')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mt-1">
                  <label for="conditions">Conditions</label>
                  <textarea rows="4" cols="50" maxlength="200" class="form-control ajoutInvesModalShow @error('conditions') is-invalid @enderror" id="conditions" name="conditions">{{ old('conditions') }}</textarea>
  
                  @error('conditions')
                  <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
              </div>
    
                <div class="mt-3 " style="float:right;">
                    <button type="submit" class="btn btn-primary mr-2">Proposer</button>
                </div>
            </form>
        </div>
    </div>
    
      </div>
    </div>


<div class="container-fluid " >
    
  <div class="card col-md-12">
    <div class=" text-center col-md-3 mb-3">

    <a href="{{route('annonces.index')}} " class="text-white   " style="display:inline-block; float: left;"> 
        <img src="{{asset('build/imgs/arrow-left-solid.svg')}}"  height="35" > Liste des annonces
     </a>
    </div>

    <div class="card-header text-center">

         Annonce
      
    </div>
    <div class="card-body">
      <h5 class="card-title">Publié par {{$annonce->user->name}}</h5>
      <p class="card-text">{{$annonce->libelle}}</p>
      <p class="card-text">{{$annonce->date_pub}}</p>
      <div class="row" >

      <div class="card col-md-6 ">
        <div class="card-title">Concernant le projet</div>

        <p class="card-text">Titre : {{$annonce->projet? $annonce->projet->libelle : "Pas de projet"}}</p>
        <p class="card-text">Cout : {{$annonce->projet? $annonce->projet->cout : "Pas de projet"}}</p>
        <p class="card-text">Date de début : {{$annonce->projet? $annonce->projet->date_debut : "Pas de projet"}}</p>
        <p class="card-text">Date de fin : {{$annonce->projet? $annonce->projet->date_fin : "Pas de projet"}}</p>
    </div>

    <div class="card col-md-5 offset-1">
        <div class="card-title">Description du projet</div>

        <p class="card-text">{{$annonce->projet? $annonce->projet->description : "Pas de projet"}}</p>
 
    </div>

    <div class="card mt-2">
      <div class="row">
      <div class="col-md-5">   
        
           <a href="/chatify/{{$annonce->user->id}}" class="btn btn-primary mb-2 custom-button">Contacter {{$annonce->user->name}}</a>

    
        @if(($annonce->projet->investissement != null && $annonce->projet->investissement->investisseur_id == Auth::user()->id ))
     <div class="badge alert-success">   Vous avez deja envoyé une proposition d'investissement  <img class="ml-4" src="{{ asset('build/imgs/succes.png') }}" height="30" alt="Validé"></div> 

        @else
        <a type="button" data-bs-toggle="modal" data-bs-target="#investirModal" class="btn btn-primary mb-2 custom-button" href="#add"  id="addInvesButton">Proposer un investissement</a>
@endif
      </div>
      </div>
    </div>




        </div>

</div>
<script>
document.addEventListener('DOMContentLoaded', function() {
    var hasInvalidField = document.querySelector('.ajoutInvesModalShow').classList.contains('is-invalid');


    if (hasInvalidField) {
        var investirModal = document.getElementById('investirModal');
       document.getElementById('addInvesButton').click()
    }
});

</script>
@endsection
