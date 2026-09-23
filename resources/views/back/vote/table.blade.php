@foreach($vote as $votes)
<div class="box">

    <div class="box-body table-responsive">
        <table id="candidate" class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>@lang('Nom candidate')</th>
                <th>@lang('Nombre de vote')</th>
               
                <th></th>
            </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $votes->nomc }} {{ $votes->prenomc }} </td>
                    <td>{{ $votes->nbre_vote }}</td>
                    
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

