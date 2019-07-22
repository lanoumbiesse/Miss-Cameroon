  @extends('back.layout')
@section('css')

@endsection

@section('main')

    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            
                    <h3>@lang('MODIFICATION DES INFORMATIONS D UNE CANDIDATE')</h3>
                    <div></div>
                    <div class="box box-primary">
                    <form method="POST" action="{{ route('candidates.update', [$candidate->id]) }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        @if ($errors->has('log'))
                            @component('back.components.error')
                                {{ $errors->first('log') }}
                            @endcomponent
                        @endif 
                        <div class="box-body">

                        <div class="form-group {{ $errors->has('nom') ? 'has-error' : '' }}">
                          <label for="name">@lang('Nom *')</label>
                        <input id="nom" type="text" class="form-control" name="nom" value="{{ old('nom', $candidate->nom) }}" required autofocus>
                        </div>

                        <div class="form-group {{ $errors->has('prenom') ? 'has-error' : '' }}">
                         <label for="name">@lang('Prenom *')</label>
                        <input id="prenom" type="text"  class="form-control" name="prenom" value="{{ old('prenom', $candidate->prenom) }}" required>
                        </div>
                        
                          <div class="form-group {{ $errors->has('datenais') ? 'has-error' : '' }}">
                          <label for="name">@lang('Date de naissance *')</label>
                        <input id="datenais" type="text" placeholder="@lang('yyyy-mm-dd')" class="form-control" name="datenais" value="{{ old('datenais', $candidate->date_nais) }}" required>
                        </div>

                        <div class="form-group {{ $errors->has('lieunais') ? 'has-error' : '' }}">
                        <label for="name">@lang('Lieu de naissance *')</label>
                        <input id="lieunais" type="text" class="form-control" name="lieunais" value="{{ old('lieunais', $candidate->lieu_nais) }}" required>
                         </div>

                         <div class="form-group {{ $errors->has('pays') ? 'has-error' : '' }}">
                         <label for="name">@lang('Pays de residence *')</label>
                        <input id="pays" type="text"  class="form-control" name="pays" value="{{ old('pays', $candidate->pays_de_residence) }}" required>
                        </div>

                        <div class="form-group {{ $errors->has('ro') ? 'has-error' : '' }}">
                       <label for="ro">@lang('Region dorigine *')</label>
                        <select id = "ro" name="ro" class="form-control" value="{{ old($candidate->region_origine) }}" required>
                        <option value="Adamoua">Adamoua</option>
                        <option value="Centre">Centre</option>
                        <option value="Extreme-nord">Extreme-nord</option>
                        <option value="Est">Est</option>
                        <option value="Littoral">Littoral</option>
                        <option value="Ouest">Ouest</option>
                        <option value="Sud">Sud</option>
                        <option value="Nord">Nord</option>
                        <option value="Sud-ouest">Sud-ouest</option>
                        <option value="Nord-ouest">Nord-ouest</option>
                        </select>
                        </div>

                          <div class="form-group {{ $errors->has('rc') ? 'has-error' : '' }}">
                       <label for="rc">@lang('Region du concours *')</label>
                        <select id = "rc" name="rc" class="form-control" value="{{ old($candidate->regionconcours) }}" required>
                        <option value="Adamoua">Null</option>
                        <option value="Adamoua">Adamoua</option>
                        <option value="Centre">Centre</option>
                        <option value="Extreme-nord">Extreme-nord</option>
                        <option value="Est">Est</option>
                        <option value="Littoral">Littoral</option>
                        <option value="Ouest">Ouest</option>
                        <option value="Sud">Sud</option>
                        <option value="Nord">Nord</option>
                        <option value="Sud-ouest">Sud-ouest</option>
                        <option value="Nord-ouest">Nord-ouest</option>
                        </select>
                        </div>

                        <div class="form-group {{ $errors->has('niveau') ? 'has-error' : '' }}">
                        <label for="niveau">@lang('Niveau d etude*')</label>
                        <select id = "niveau" name="niveau" class="form-control" value="{{ old($candidate->niveau_etude) }}" required >
                        <option value="premiere annee">Premiere annee</option>
                        <option value="deuxieme annee">Deuxieme annee</option>
                        <option value="troisieme annee">Troisieme annee</option>
                        <option value="licence">Licence</option>
                        <option value="quatrieme annee">Quatrieme annee</option>
                        <option value="cinquieme annee">Cinquieme annee</option>
                        <option value="Master2">Master2</option>
                        <option value="doctorante">Doctorante</option>
                        <option value="Doctorat">Doctorat</option>
                        </select>
                        </div>

                        <div class="form-group {{ $errors->has('finaliste') ? 'has-error' : '' }}">
                        <label for="niveau">@lang('Finaliste *')</label>
                        <input id="finaliste" type="checkbox" name="finaliste" {!! $candidate->finaliste ? 'check = true' : 'check=false' !!}>
                        </div>
                       
                        <div class="form-group {{ $errors->has('numtel') ? 'has-error' : '' }}">
                        <label for="numtel">@lang('Numero de telephone*')</label>
                        <input id="numtel" type="text" class="form-control" name="numtel" value="{{ old('numtel', $candidate->numtel) }}" required>
                         </div>


                         <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                         <label for="email">@lang('Email *')</label>
                         <input id="email" type="email" placeholder="@lang('Email *')" class="form-control" name="email" value="{{ old('email', $candidate->email) }}" required>
                         </div>

                         <div class="form-group {{ $errors->has('web_id') ? 'has-error' : '' }}">
                          <label for="youtube">@lang('Web id *')</label>
                         <input id="web_id" type="text" class="form-control" name="web_id" value="{{ old('web_id', $candidate->web_id) }}"  required>
                          </div>
                         
                         <div class="form-group {{ $errors->has('fb') ? 'has-error' : '' }}">
                         <label for="facebook">@lang('Lien de votre compte facebook *')</label>
                         <input id="fb" type="url"  class="form-control" name="fb" value="{{ old('fb', $candidate->facebook_link) }}" required>
                         </div>
                         
                         <div class="form-group {{ $errors->has('tw') ? 'has-error' : '' }}">
                         <label for="twitter">@lang('Lien de votre compte twitter *')</label>
                         <input id="tw" type="url" class="form-control" name="tw" value="{{ old('tw', $candidate->twitter_link) }}" required>
                         </div>

                         <div class="form-group {{ $errors->has('in') ? 'has-error' : '' }}">
                          <label for="instagram">@lang('Lien de votre compte instagram *')</label>
                         <input id="in" type="url" class="form-control" name="in" value="{{ old('in', $candidate->instagram_link) }}" required>
                          </div>

                          <div class="form-group {{ $errors->has('vi') ? 'has-error' : '' }}">
                          <label for="youtube">@lang('Lien de la video youtube *')</label>
                         <input id="vi" type="url" class="form-control" name="vi" value="{{ old('vi', $candidate->video_link) }}"  required>
                          </div>
 
                            <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                            <label for="description">@lang('Faits une description de vous *')</label>
                           <textarea id ="description" name = "description" class="form-control" maxlength=500 value="{{ old('description', $candidate->long_desc) }}" required>
                             
                           </textarea>
                           </div>

                           
                             
                            <div class="form-group {{ $errors->has('first') ? 'has-error' : '' }}">
                           <label for="annee">@lang('Premiere image ')</label>
                           <input type="file" name="first" accept="image/*"  class="form-control">
                           </div>

                           <div class="form-group {{ $errors->has('p1') ? 'has-error' : '' }}">
                           <label for="p1">@lang('Deuxieme image ')</label>
                           <input type="file" name="p1" accept="image/*" class="form-control">
                           </div>

                            <div class="form-group {{ $errors->has('p2') ? 'has-error' : '' }}">
                           <label for="p2">@lang('Troixieme image ')</label>
                           <input type="file" name="p2" accept="image/*"class="form-control">
                           </div>

                           <div class="form-group {{ $errors->has('p3') ? 'has-error' : '' }}">
                           <label for="p3">@lang('Quatrieme image ')</label>
                           <input type="file" name="p3" accept="image/*" class="form-control">
                           </div>
                        <input class="button-primary full-width-on-mobile form-control" type="submit" value="@lang('Modifier')">
                        
                    </form>
             </div>  
        </div>
    </div>
     
      
@endsection
