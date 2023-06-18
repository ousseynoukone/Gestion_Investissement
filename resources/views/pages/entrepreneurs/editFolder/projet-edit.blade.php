@extends('layout')

@section('content')

<div class="modal-content mt-3">

    <div class="modal-header bg-primary" >
      <a href="{{route('projets.index')}} " class="text-white" style="display:inline-block;"> 
        <img src="{{asset('build/imgs/arrow-left-solid.svg')}}"  height="35" > Liste des projets
     </a>
     
        <h5 class="modal-title  text-center"  id="">Détails du projet</h5>
        



    </div>
    <div class="modal-body bg-secondary">
      <form method="post" id="updateDetailForm"   action="{{route('projets.update',['projet'=>$projet])}}">

      @csrf
      {{ method_field('PUT') }}

          <div class="row" >
              <div class="col-md-6">
                <div class="card bg-secondary">
                  <div class="card-header text-white bg-primary">Projet</div>
                <div class="form-group mt-1">
                  <label for="libelle">Libellé</label>
                  <input type="text" class="form-control detailProject @error('libelle') is-invalid @enderror" id="detail_projet_libelle" name="libelle" value=" {{ (old('libelle'))? old('libelle') : $projet->libelle }}">
                  @error('libelle')
                  <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
              
                <div class="form-group mt-1">
                  <label for="description">Description</label>
                  <textarea rows="4" cols="50" maxlength="200" type="text" class="form-control detailProject @error('description') is-invalid @enderror" id="detail_projet_description" name="description">{{ (old('description'))?old('description') :$projet->description }}</textarea>
                  @error('description')
                  <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
              
                <div class="form-group mt-1">
                  <label for="cout">Coût</label>
                  <input type="number" class="form-control detailProject @error('cout') is-invalid @enderror" id="detail_projet_cout" name="cout" required value="{{ (old('cout') )? old('cout')   : $projet->cout }}">
                  @error('cout')
                  <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
              
                <div class="form-group mt-1">
                  <label for="date_debut">Date de début</label>
                  <input type="date" min="{{$currentDate}}" class="form-control detailProject @error('date_debut') is-invalid @enderror" id="detail_projet_date_debut" name="date_debut" value="{{ (old('date_debut') )? old('date_debut') : $projet->date_debut }}" required>
                  @error('date_debut')
                  <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
              
                <div class="form-group mt-1">
                  <label for="date_fin">Date de fin</label>
                <input type="date" min="{{$currentDate}}" class="form-control detailProject @error('date_fin') is-invalid @enderror" id="detail_projet_date_fin" name="date_fin" value="{{ old('date_fin') ? old('date_fin') : $projet->date_fin }}" required>
                  @error('date_fin')
                  <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                </div>
              </div>



              
              <div class="col-md-6" id="investissementDiv" >
                @if($projet->investissement!=null)
                <div class="card bg-secondary">
                <div class="card-header text-white bg-primary">Investissement</div>

                <div class="form-group mt-1">
                  <label for="montant">Montant</label>
                  <input readonly type="number" class="form-control" id="detail_projet_montant" name="montant" value="{{$projet->investissement->montant}}">
                </div>
              
                <div class="form-group mt-1">
                  <label for="investisseur">Nom de l'investisseur</label>
                  <input readonly type="text" class="form-control" id="detail_projet_investisseur" name="investisseur" value="{{$projet->investissement->investisseur->name}} ">
                </div>
              
                <div class="form-group mt-1">
                  <label for="date_investissement">Date d'investissement</label>
                  <input readonly type="text" class="form-control" id="detail_projet_date_investissement" value="{{$projet->investissement->date_investissement}}" name="date_investissement" >
                </div>
              
                <div class="form-group mt-1">
                  <label for="conditions">Conditions</label>
                  <textarea readonly type="text" class="form-control" id="detail_projet_conditions"   name="conditions" rows="4" >{{$projet->investissement->conditions}}</textarea>
                </div>
              
                <div class="form-group mt-1">
                  <label for="partDeParticipation">Part de participation</label>
                  <input readonly type="text" class="form-control" id="detail_projet_partDeParticipation"  value="{{$projet->investissement->partDeParticipation}}%  "  name="partDeParticipation" >
                </div>
              </div>
@else              {{-- AU CAS OU IL YA PAS D'INVESTISSEMENT --}}
<div class="col-md-6" id="investissementAlert" >
    <div class="form-group mt-1 " style="justify-content: center;">
      <label for="" style="" class="badge bg-primary">Il n'y a pas d'investissement sur ce projet <img height="20" src="{{asset('build/imgs/remove.png')}}" alt=""></label>
    </div>

</div>
                @endif
              </div>
            
            
        

      <div class="btn-group mt-2" data-toggle="buttons">
          <label class="btn btn-primary  {{$projet->etat==0 ? "active" : "" }}">
              <input type="radio" name="state" id="state1" value="state1" autocomplete="off" {{$projet->etat==0 ? "checked" : "" }} > En attente
          </label>
          <label class="btn btn-primary {{$projet->etat==1 ? "active" : "" }}"  style="margin-left: 1rem">
              <input type="radio" name="state" id="state2" value="state2" {{$projet->etat==1 ? "checked" : "" }} autocomplete="off"> En cours
          </label>
          <label class="btn btn-primary {{$projet->etat==2 ? "active" : "" }}" style="margin-left: 1rem">
              <input type="radio" name="state" id="state3" value="state3" {{$projet->etat==2 ? "checked" : "" }} autocomplete="off"> Terminé
          </label>
      </div>
      

</div>

<div class="modal-footer bg-dark">
<button  class="btn btn-secondary" >Mettre à jour </button>

</form>

<form method="POST" id="formDeleteProjet" action="{{route('projets.destroy',['projet'=>$projet])}}" accept-charset="UTF-8" style="display:inline">
  {{ method_field('DELETE') }}
  {{ csrf_field() }}
  <button  class="btn btn-primary"    >Supprimer <img src="{{asset('build/imgs/remove.png')}}" height="20"  alt=""> </button>

</form>
</div>
</div>

@endsection