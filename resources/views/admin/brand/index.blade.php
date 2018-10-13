@extends($pLayout. 'master')

@section('content')

<!-- File export table -->
<section id="file-export">
    <div class="row">
        <div class="col-xs-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">
                        {{ trans('admin.brands') }}
                    </h4>
                    <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                    <div class="heading-elements">
                        <ul class="list-inline mb-0">
                        	<li class="tag tag-info">{{ trans('admin.select') }} <input type="checkbox" class="checkedAll" name="dels"></li>
                            <li><a data-action="collapse"><i class="icon-minus4"></i></a></li>

                            {!! getCreateBtn(route('brand.create'), 'brands.create') !!}
                            {!! getDeleteBtn(route('admin.brand.deletes'), 'brands.delete') !!}

                        </ul>
                    </div>
                </div>
                <div class="card-body collapse in">
                    <div class="card-block card-dashboard">
                        <table class="table table-striped table-bordered " id="data">
                         <thead>
                            <tr>
                                <th>#</th>
                                <th>{{ trans('admin.title', ['name' => trans('admin.brand')])  }}</th>
                                <th>{{ trans('admin.status')  }}</th>
                                <th>{{ trans('admin.action') }}</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>{{ trans('admin.title', ['name' => trans('admin.brand')])  }}</th>
                                <th>{{ trans('admin.status')  }}</th>
                                <th>{{ trans('admin.action') }}</th>
                            </tr>
                        </tfoot>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

@endsection


@section('script')
<script type="text/javascript">
	$(document).ready(function() {
    $('#data').DataTable( {
        "processing": true,
            "language": {
            "sUrl": lang
        },
        "ordering": true,
        "pagingType": "full_numbers",
            aLengthMenu: [
                [25, 50, 100, 200, -1],
                [25, 50, 100, 200, "All"]
            ],
            iDisplayLength: 25,
        "fixedHeader": true,
        "responsive": true,
        "ajax": "{{ route('admin.brand.ajax') }}",
        "columns": [
           {data: 'select', name: ''},
           {data: 'title', name: 'title'},
           {data: 'status', name: 'status'},
           {data: 'action', name: ''}
        ],

    });
});
</script>
@endsection