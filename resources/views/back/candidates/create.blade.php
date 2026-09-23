  @extends('back.layout')
@section('css')

@endsection

@section('main')

    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            
                    <h3>@lang('FORMULAIRE D INSCRIPTION')</h3>
                    <div></div>
                    <div class="box box-primary">
                    <form method="POST" action="{{route('candidatestore')}}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        @if ($errors->has('log'))
                            @component('back.components.error')
                                {{ $errors->first('log') }}
                            @endcomponent
                        @endif 
                        <div class="box-body">

                        <div class="form-group {{ $errors->has('nom') ? 'has-error' : '' }}">
                          <label for="name">@lang('Nom *')</label>
                        <input id="nom" type="text" class="form-control" name="nom" value="{{ old('nom') }}" required autofocus>
                        </div>

                        <div class="form-group {{ $errors->has('prenom') ? 'has-error' : '' }}">
                         <label for="name">@lang('Prenom *')</label>
                        <input id="prenom" type="text"  class="form-control" name="prenom" required>
                        </div>
                        
                          <div class="form-group {{ $errors->has('datenais') ? 'has-error' : '' }}">
                          <label for="name">@lang('Age *')</label>
                        <input id="datenais" type="text" placeholder="@lang('Age')" class="form-control" name="datenais" required>
                        </div>

                        <div class="form-group {{ $errors->has('numcompet') ? 'has-error' : '' }}">
                        <label for="name">@lang('Numero Competition *')</label>
                        <input id="numcompet" type="text" class="form-control" name="numcompet" required>
                         </div>

                         <div class="form-group {{ $errors->has('height') ? 'has-error' : '' }}">
                         <label for="name">@lang('Taille *')</label>
                        <input id="height" type="text"  class="form-control" name="height">
                        </div>

                        <div class="form-group {{ $errors->has('ro') ? 'has-error' : '' }}">
                       <label for="ro">@lang('Region dorigine *')</label>
                        <select id = "ro" name="ro" class="form-control" required>
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
                        <select id = "rc" name="rc" class="form-control" required>
                        <option value="Diaspora">Diaspora</option>
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
                        <select id = "niveau" name="niveau" class="form-control" required >
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
                       
                        <div class="form-group {{ $errors->has('bust') ? 'has-error' : '' }}">
                        <label for="bust">@lang('Bust*')</label>
                        <input id="bust" type="text" class="form-control" name="bust">
                         </div>


                         <div class="form-group {{ $errors->has('waist') ? 'has-error' : '' }}">
                         <label for="waist">@lang('Waist *')</label>
                         <input id="waist" type="text" placeholder="@lang('Waist *')" class="form-control" name="waist">
                         </div>
                         
                          <div class="form-group {{ $errors->has('hips') ? 'has-error' : '' }}">
                         <label for="name">@lang('hips *')</label>
                         <input id="hips" type="text" placeholder="@lang('Hips *')" class="form-control" name="hips">
                         </div>
                         
                          <div class="form-group {{ $errors->has('shoes') ? 'has-error' : '' }}">
                         <label for="name">@lang('Shoes *')</label>
                         <input id="shoes" type="text" placeholder="@lang('Shoes *')" class="form-control" name="shoes">
                         </div>
                         
                          <div class="form-group {{ $errors->has('eyes') ? 'has-error' : '' }}">
                         <label for="name">@lang('Eyes *')</label>
                         <input id="eyes" type="text" placeholder="@lang('Eyes*')" class="form-control" name="eyes">
                         </div>
                         
                         <div class="form-group {{ $errors->has('fb') ? 'has-error' : '' }}">
                         <label for="facebook">@lang('Lien du compte facebook *')</label>
                         <input id="fb" type="url"  class="form-control" name="fb">
                         </div>
                         
                         <div class="form-group {{ $errors->has('tw') ? 'has-error' : '' }}">
                         <label for="twitter">@lang('Lien du compte twitter *')</label>
                         <input id="tw" type="url" class="form-control" name="tw">
                         </div>

                         <div class="form-group {{ $errors->has('in') ? 'has-error' : '' }}">
                          <label for="instagram">@lang('Lien du compte instagram *')</label>
                         <input id="in" type="url" class="form-control" name="in">
                          </div>

                           <div class="form-group {{ $errors->has('vi') ? 'has-error' : '' }}">
                          <label for="youtube">@lang('Lien de la video youtube *')</label>
                         <input id="vi" type="url" class="form-control" name="vi">
                          </div>
 
                            <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                            <label for="description">@lang('Faits une description de vous *')</label>
                           <textarea id ="description" name = "description" class="form-control" maxlength=500>
                             
                           </textarea>
                           </div>

                             
                            <div class="form-group {{ $errors->has('first') ? 'has-error' : '' }}">
                           <label for="annee">@lang('Premiere image *')</label>
                           <input type="file" name="first" accept="image/*" required class="form-control">
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
                        <input class="button-primary full-width-on-mobile form-control" type="submit" value="@lang('Inscrire')">
                        
                    </form>
             </div>  
        </div>
    </div>
     </div>
      </div>
@endsection
