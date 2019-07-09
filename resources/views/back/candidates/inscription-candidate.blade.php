@extends('front.layout')

@section('main')
   <section id="content-wrap">
        <div class="row">
            <div class="col-twelve">
                <div class="primary-content">
                    @if (session('confirmation-success'))
                        @component('front.components.alert')
                            @slot('type')
                                success
                            @endslot
                            {!! session('confirmation-success') !!}
                        @endcomponent
                    @endif
                    @if (session('confirmation-danger'))
                        @component('front.components.alert')
                            @slot('type')
                                error
                            @endslot
                            {!! session('confirmation-danger') !!}
                        @endcomponent
                    @endif
                    <h3>@lang('FORMULAIRE D INSCRIPTION')</h3>
                    <div></div>
                    <form method="POST" action="{{route('candidatestore')}}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        @if ($errors->has('log'))
                            @component('front.components.error')
                                {{ $errors->first('log') }}
                            @endcomponent
                        @endif 

                        <input id="nom" type="text" placeholder="@lang('Nom *')" class="full-width" name="nom" value="{{ old('nom') }}" required autofocus>
                        {!! $errors->first('nom', '<small class="help-block">:message</small>') !!}

                        <input id="prenom" type="text" placeholder="@lang('Prenom *')" class="full-width" name="prenom" required>
                        {!! $errors->first('prenom', '<small class="help-block">:message</small>') !!}

                        <input id="datenais" type="text" placeholder="@lang('Date de naissance (yyyy-mm-dd) *')" class="full-width" name="datenais" required>
                        {!! $errors->first('datenais', '<small class="help-block">:message</small>') !!}

                        <input id="lieunais" type="text" placeholder="@lang('Lieu de naissance *')" class="full-width" name="lieunais" required>
                        {!! $errors->first('lieunais', '<small class="help-block">:message</small>') !!}

                        <input id="pays" type="text" placeholder="@lang('Pays de residence *')" class="full-width" name="pays" required>
                        {!! $errors->first('pays', '<small class="help-block">:message</small>') !!}

                       <h6>@lang('Region d origine *')</h6>
                        <select id = "ro" name="ro" class="full-width" required>
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
                        {!! $errors->first('ro', '<small class="help-block">:message</small>') !!}

                         <h6>@lang('Region de participation au concours')</h6>
                        <select id = "rc" name="rc" class="full-width" >
                         <option value="Null">Null</option>
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
                        {!! $errors->first('rc', '<small class="help-block">:message</small>') !!}

                        <h6>@lang('Niveau d etude *')</h6>
                        <select id = "niveau" name="niveau" class="full-width" required >
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
                        {!! $errors->first('niveau', '<small class="help-block">:message</small>') !!}

                        <input id="numtel" type="text" placeholder="@lang('Numero de telephone (+...) *')" class="full-width" name="numtel" required>
                        {!! $errors->first('numtel', '<small class="help-block">:message</small>') !!}

                         <input id="email" type="email" placeholder="@lang('Email *')" class="full-width" name="email" required>
                         {!! $errors->first('email', '<small class="help-block">:message</small>') !!}

                         <input id="fb" type="url" placeholder="@lang('Lien du compte facebook *')" class="full-width" name="fb" required>
                         {!! $errors->first('fb', '<small class="help-block">:message</small>') !!}

                         <input id="tw" type="url" placeholder="@lang('Lien du compte twitter *')" class="full-width" name="tw" required>
                         {!! $errors->first('tw', '<small class="help-block">:message</small>') !!}

                         <input id="in" type="url" placeholder="@lang('Lien du compte ins *')" class="full-width" name="in" required>
                         {!! $errors->first('in', '<small class="help-block">:message</small>') !!}

                           <textarea id ="description" name = "description" class="full-width" maxlength=500 required >
                             Faites une description de vous
                           </textarea>
                           {!! $errors->first('description', '<small class="help-block">:message</small>') !!}

                           <input id="annee" type="number" placeholder="@lang('Annee de participation *')" class="full-width" name="annee" required>
                           {!! $errors->first('annee', '<small class="help-block">:message</small>') !!}

                           <h6>@lang('Premiere image (4*4) *')</h6>
                           <input type="file" name="first" accept="image/*" required class="full-width">
                           {!! $errors->first('first', '<small class="help-block">:message</small>') !!}

                           <h6>@lang('Deuxieme image (4*4) *')</h6>
                           <input type="file" name="p1" accept="image/*"  class="full-width">
                           {!! $errors->first('p1', '<small class="help-block">:message</small>') !!}

                           <h6>@lang('Troisieme image (4*4) *')</h6>
                           <input type="file" name="p2" accept="image/*" class="full-width">
                           {!! $errors->first('p2', '<small class="help-block">:message</small>') !!}

                           <h6>@lang('Quatrieme image (4*4) *')</h6>
                           <input type="file" name="p3" accept="image/*"  class="full-width">
                           {!! $errors->first('p3', '<small class="help-block">:message</small>') !!}

                        <input class="button-primary full-width-on-mobile" type="submit" value="@lang('Inscrire')">
                        
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
