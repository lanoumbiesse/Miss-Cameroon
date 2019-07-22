
@foreach($candidates as $candidate)
<div class="box">

    <div class="box-body table-responsive">
        <table id="candidate" class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>@lang('Nom')</th>
                <th>@lang('Prenom')</th>
                <th>@lang('Votes')</th>
                <th>@lang('Date de naissance')</th>
                <th>@lang('Lieu de naissance')</th>
                <th>@lang('Email')</th>
                <th>@lang('Numero de tel')</th>
                <th>@lang('Pays de residence')</th>
                <th>@lang('Photo')</th>
                <th>@lang('Editer')</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $candidate->nom }}</td>
                    <td>{{ $candidate->prenom }}</td>
                    <td>{{ $candidate->nbvote}}</td>
                    <td>{{ $candidate->date_nais }} </td>
                    <td>{{ $candidate->lieu_nais }} </td>
                      <td>{{ $candidate->email }} </td>
                    <td>{{ $candidate->numtel }}</td>
                    <td>{{ $candidate->pays_de_residence }}</td>
                     <td><a href="{{ route('photos.show', [$candidate->id]) }}" role="button" title="@lang('Voir Photo')"></a></td>

                    <td><a class="btn btn-warning btn-xs btn-block" href="{{ route('candidates.edit', [$candidate->id]) }}" role="button" title="@lang('Editer')"><span class="fa fa-edit"></span></a></td>
                </tr>
            </tbody>
        </table>
    </div>

       <div class="box-body table-responsive">
        <table id="candidate" class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>@lang('Niveau Etude')</th>
                <th>@lang('Region d origine')</th>
                <th>@lang('Regiond du concours')</th>
                <th>@lang('Finaliste')</th>
                <th>@lang('Facebook')</th>
                <th>@lang('Instagram')</th>
                <th>@lang('Twitter')</th>
                <th>@lang('Attribuer voter')</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $candidate->niveau_etude }}</td>
                    <td>{{ $candidate->region_origine }}</td>
                    <td>{{ $candidate->regionconcours }} </td>
                    <td><span {!! $candidate->finaliste ? ' class="fa fa-check"' : '' !!}></span></td>
                    <td>{{ $candidate->facebook_link }}</td>
                    <td>{{ $candidate->instagram_link }}</td>
                    <td>{{ $candidate->twitter_link }}</td>
                    

                     <td> <a href = "{{ route('votes.edit',[$candidate->id]) }}">Ajouter vote</a></td>
                </tr>
            </tbody>
        </table>
    </div>
   
    <!-- /.box-body -->
    <div id="message" class="box-footer">
    </div>
</div>
<!-- /.box -->
@endforeach
