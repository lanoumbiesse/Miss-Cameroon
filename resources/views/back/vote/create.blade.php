 @extends('back.layout')
@section('css')

@endsection

@section('main')

  <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            
                    <h3>@lang('FORMULAIRE D ATTRIBUTION DE VOTES À UNE CANDIDATE')</h3>
                    <div></div>
                    <div class="box box-primary">
                    <form method="POST" action="{{ route('votes.update', [$candidate->id]) }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        @if ($errors->has('log'))
                            @component('back.components.error')
                          
                            @endcomponent
                        @endif 
                        <div class="box-body">

                        <div class="form-group {{ $errors->has('nom') ? 'has-error' : '' }}">
                          <label for="name">@lang('Nom de la candidate *')</label>
                        <input id="nom" type="text" class="form-control" name="nom" value="{{ old('nom', $candidate->nom) }}" required autofocus>
                        </div>

                        <div class="form-group {{ $errors->has('prenom') ? 'has-error' : '' }}">
                         <label for="name">@lang('Prenom de la candidate *')</label>
                        <input id="prenom" type="text"  class="form-control" name="prenom" value="{{ old('prenom', $candidate->prenom) }}" required>
                        </div>
                        
                          <div class="form-group {{ $errors->has('montant') ? 'has-error' : '' }}">
                          <label for="name">@lang('Montant *')</label>
                        <input id="montant" type="text" placeholder="@lang('En cfa')" class="form-control" name="montant" value="{{ old('0') }}" required>
                        </div>

                        <div class="form-group {{ $errors->has('nbre_vote') ? 'has-error' : '' }}">
                        <label for="name">@lang('Nombre de votes *')</label>
                        <input id="nbre_vote" type="text" class="form-control" name="nbre_vote" value="{{ old('Nombre de votes à attribuer') }}" required>
                         </div>
                        <input class="button-primary full-width-on-mobile form-control" type="submit" value="@lang('ATTRIBUER')">
                        
                    </form>
             </div>  
        </div>
    </div>
     
      
@endsection