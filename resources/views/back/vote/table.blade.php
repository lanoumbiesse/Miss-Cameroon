@foreach($vote as $votes)
<div class="box">

    <div class="box-body table-responsive">
        <table id="candidate" class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>@lang('Nom candidate')</th>
                <th>@lang('Nombre de vote')</th>
                <th>@lang('Periode')</th>
                <th>@lang('type')</th>
                <th>@lang('Montant')</th>
                <th>@lang('Montant COMICA')</th>
                <th>@lang('Montant Dev')</th>
                <th>@lang('Nom du votant')</th>
                <th>@lang('Date')</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $votes->nomc }} {{ $votes->prenomc }} </td>
                    <td>{{ $votes->nbre_vote }}</td>
                    <td>{{ $votes->status }} </td>
                    <td>{{ $votes->type }}</td>
                    <td>{{ $votes->montant }} </td>
                      <td>{{ $votes->montant_comica }} </td>
                    <td>{{ $votes->montant_dev }}</td>
                    <td>{{ $votes->nomu }}</td>
                   <td>{{ $votes->created_at }}</td>
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

