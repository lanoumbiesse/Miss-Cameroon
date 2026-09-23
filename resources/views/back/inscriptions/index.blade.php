@extends('back.layout')

@section('css')
    <link rel="stylesheet" href="//cdn.jsdelivr.net/sweetalert2/6.3.8/sweetalert2.min.css">
    <style>
        input, th span {
            cursor: pointer;
        }
        #message {
            background-color: #a2cce4;
        }
        #message.box-footer {
            margin: 10px;
        }
    </style>
@endsection

@section('main')


@if (\Session::has('arnold'))
    <div class="alert alert-success">
        <ul>
            <li>{!! \Session::get('arnold') !!}</li>
        </ul>
    </div>
@endif

    <div class="row">
        <div class="col-md-12">
            <div class="box">
                    <div class="box-header with-border">
                    <strong>@lang('Localisation') :</strong> &nbsp;
                    <input type="radio" name="regionconcours" value="all" checked> @lang('All')&nbsp;
                    <input type="radio" name="regionconcours" value="ADAMAOUA"> @lang('Adamoua')&nbsp;
                    <input type="radio" name="regionconcours" value="CENTRE"> @lang('Centre')&nbsp;
                    <input type="radio" name="regionconcours" value="EST"> @lang('Est')&nbsp;
                    <input type="radio" name="regionconcours" value="EXTREME NORD"> @lang('Extreme-nord')&nbsp;
                    <input type="radio" name="regionconcours" value="LITTORAL"> @lang('Littoral')&nbsp;
                    <input type="radio" name="regionconcours" value="OUEST"> @lang('Ouest')&nbsp;
                    <input type="radio" name="regionconcours" value="SUD"> @lang('Sud')&nbsp;
                    <input type="radio" name="regionconcours" value="NORD"> @lang('Nord')&nbsp;
                    <input type="radio" name="regionconcours" value="SUD-OUEST"> @lang('Sud-ouest')&nbsp;
                    <input type="radio" name="regionconcours" value="NORD-OUEST"> @lang('Nord-ouest')&nbsp;
                    <input type="radio" name="regionconcours" value="Diaspora"> @lang('Diaspora')&nbsp;<br>
                    <strong>@lang('Paiement') :</strong> &nbsp;
                    <input type="checkbox" name="finaliste"> 
                    <div id="spinner" class="text-center"></div>
                </div>
                <div id="pannel" class="box-body">
                    @include('back.inscriptions.table', compact('inscriptions'))
                </div>
                <!-- /.box-body -->
                <div id="pagination" class="box-footer">
                    {{ $links }}
                </div>
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->

@endsection

@section('js')
    <script src="{{ asset('adminlte/js/back.js') }}"></script>
    <script>

    var inscription = (function () {

        var url = '{{ route('inscriptions.index') }}'
        var swalTitle = '@lang('Really destroy contact ?')'
        var confirmButtonText = '@lang('Yes')'
        var cancelButtonText = '@lang('No')'
        var errorAjax = '@lang('Looks like there is a server issue...')'

        var onReady = function () {
             $('#pagination').on('click', 'ul.pagination a', function (event) {
                back.pagination(event, $(this), errorAjax)
            })
           
            $('#pannel').on('change', ':checkbox[name="seen"]', function () {
                    back.seen(url, $(this), errorAjax)
                })
              
            $('.box-header :radio, .box-header :checkbox').click(function () {
                back.filters(url, errorAjax)
            })
        }

        return {
            onReady: onReady
        }

    })();

    $(document).ready(inscription.onReady)

    </script>
@endsection