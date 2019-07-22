@foreach($inscriptions as $inscription)
<div class="box">

    <div class="box-body table-responsive">
        <table id="candidate" class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>@lang('Nom')</th>
                <th>@lang('Prenom')</th>
                <th>@lang('Email')</th>
                <th>@lang('Age')</th>
                <th>@lang('Region d origine')</th>
                <th>@lang('Region du concours')</th>
                <th>@lang('pays')</th>
                <th>@lang('Niveau')</th>
                <th>@lang('Profession')</th>
                <th>@lang('Tel')</th>
                <th>@lang('Photo')</th>
                 <th>@lang('Date')</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
                <tr>
                    <td> {{inscription->nom }} </td>
                    <td>{{{inscription->prenom }}</td>
                    <td>{{{inscription->email }}</td>
                    <td>{{{inscription->age }}</td>
                    <td>{{{inscription->region_origine }}</td>
                    <td>{{{inscription->region_concours }}</td>
                    <td>{{{inscription->pays }}</td>
                    <td>{{{inscription->niveau }}</td>
                    <td>{{{inscription->profession }}</td>
                    <td>{{{inscription->numtel }}</td>
                    <td><a href ="{{inscription->lien_photo }}"> VOIR PHOTO </a>></td>
                    <td>{{{inscription->created_at}}</td>
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