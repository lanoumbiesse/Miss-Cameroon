@foreach($billets as $billet)
<div class="box">

    <div class="box-body table-responsive">
        <table id="inscription" class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>@lang('Nom')</th>
                <th>@lang('Prenom')</th>
                <th>@lang('Email')</th>
                <th>@lang('Telephone')</th>
                <th>@lang('Nbre billets')</th>
                <th>@lang('Type Bilets')</th>
                <th>@lang('Date')</th>
                <th>@lang('Supprimer')</th>
               
                <th></th>
            </tr>
            </thead>
            <tbody>
                <tr>
                    <td> {{$billet->nom }} </td>
                    <td>{{$billet->prenom }}</td>
                    <td>{{$billet->email }}</td>
                    <td>{{$billet->telephone }}</td>
                    <td>{{$billet->nbre_billet }}</td>
                    <td>{{$billet->regionconcours }}</td>
                    <td>{{$billet->created_at }}</td>
                    <td><a class="btn-xs btn-block"   href="{{ route('billets.supprimer', [$billet->id]) }}" role="button" ><span class="fa fa-remove"></span></a></td>
                
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