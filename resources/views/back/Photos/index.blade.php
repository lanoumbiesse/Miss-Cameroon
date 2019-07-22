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


    <div class="row">
        <div class="col-md-12">
            <div class="box">
                 
                <div id="pannel" class="box-body">
                    @include('back.candidates.table', compact('candidates'))
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

    var candidate = (function () {

        var url = '{{ route('candidates.index') }}'
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
                .on('click', 'td a.btn-danger', function (event) {
                    back.destroy(event, $(this), url, swalTitle, confirmButtonText, cancelButtonText, errorAjax)
                })
            $('.box-header :radio, .box-header :checkbox').click(function () {
                back.filters(url, errorAjax)
            })
        }

        return {
            onReady: onReady
        }

    })();

    $(document).ready(candidate.onReady)

    </script>
@endsection