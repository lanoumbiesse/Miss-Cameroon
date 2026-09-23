@foreach($paths as $path)
<div class="box">

    <div class="box-body table-responsive">
        <table id="candidate" class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>@lang('Photo')</th>
                <th>@lang('Type')</th>
                
                <th></th>
            </tr>
            </thead>
            <tbody>
                <tr>
                    <td><a href = "{{$path->chemin}}" > voir photo</a></td>
                    <td>{{ $path->type }}</td>
                     
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