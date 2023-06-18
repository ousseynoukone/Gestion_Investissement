@extends('layout')

@section('content')

    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-primary">
            <a href="{{route('annonces.index')}} " class="text-white" style="display:inline-block;"> 
                <img src="{{asset('build/imgs/arrow-left-solid.svg')}}"  height="35" > Liste des annonces
             </a>
            <h5 class="modal-title  text-center ml-5"  id="">Modifier une annonce</h5>
        </div>
        <div class="modal-body bg-secondary">
                            <form id="" method="POST"  action="{{route('annonces.update',['annonce'=>$annonce->id])}}">

                                @csrf
                                {{ method_field('PUT') }}

                                                          <div class="form-group mt-1">
                                    <label for="libelle">Libellé</label>
                                    <textarea required  type="text" rows="5" class="form-control @error('libelle') is-invalid @enderror" id="libelle" name="libelle" > {{ old('libelle')? old('libelle') : $annonce->libelle  }}</textarea>
                                    @error('libelle')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <div class="form-group mt-1">
                                    <label for="">Choisir un projet</label>
                                <select  required  onchange="coutDisplayEdit()"  class="form-select " id="projet_id"  name="projet_id" aria-label="Default select example">
                                    <option  selected value="{{($annonce->projet != null) ? $annonce->projet->id  : "" }}">{{$annonce->projet!=null ? $annonce->projet->libelle  :"Cette annonce n'as pas de projet" }}</option>
                                    @foreach ($projets as $projet )
                                    @if($projet->id != $annonce->projet->id && $projet->annonce==null)
                                    <option @if ( old('projet_id')==$projet->id ) {{"selected"}}    @endif value="{{$projet->id}}"> {{$projet->libelle}}</option>
                                    @endif
                                    @endforeach
                                                                     </select>
                                              

                         
                                </div>
                                <div class="form-group mt-1">
                                    <label for="cout">Coût</label>
                                    <input type="number" readonly class="form-control   @error('cout') is-invalid @enderror"  id="coutAddForm" name="cout" required value="{{ old('cout')?old('cout') : (($annonce->projet) ? $annonce->projet->cout : "" ) }}">
                                    @error('cout')
                                    
                                    <div class="invalid-feedback">{{ $message }}</div>

                                    @enderror
                           
                                </div>

                               


                               <div class="alert badge-danger" style="color: crimson">  {{ session('erreur') }}</div>




                               @if($annonce->projet->investissement)
                               <div class="badge alert-primary h4">Impossible de modifier ou de supprimé une annonce qui as déja un investisseur</div>
              
                               @else
 
                                <div class="mt-3 offset-5">
                               
                                    <button  class="btn btn-dark" >Mettre à jour </button>
                                </form>

                                    <form method="POST" id="formDeleteProjet" action="{{route('annonces.destroy',['annonce'=>$annonce->id])}}" accept-charset="UTF-8" style="display:inline">
                                        {{ method_field('DELETE') }}
                                        {{ csrf_field() }}
                                        <button  class="btn btn-primary"    >Supprimer <img src="{{asset('build/imgs/remove.png')}}" height="20"  alt=""> </button>
                                      
                                      </form>  
                                      @endif
                     
                                </div>
                        </div>
                </div>
            </div>
            <script>
              function   coutDisplayEdit(){
  var idProjet =    $('#projet_id').val();

  $.ajax({
    url: "/projets/"+idProjet,
    type: 'GET',
    
    success: function(response) {
        $('#coutAddForm').val(response.cout);


    }

})

    


                }
            </script>
            

            @endsection
