@extends($pLayout . 'master')

@section('content')

<div class="row">
    <div class="col-xl-3 col-lg-6 col-xs-12">
        <div class="card">
            <div class="card-body">
                <div class="card-block">
                    <div class="media">
                        <div class="media-body text-xs-left">
                            <h3 class="pink">{{ getCount('page_categories') }}</h3>
                            <span>{{ trans('admin.page-categories') }}</span>
                        </div>
                        <div class="media-right media-middle">
                            <i class="fa fa-database pink font-large-2 float-xs-right"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-xs-12">
        <div class="card">
            <div class="card-body">
                <div class="card-block">
                    <div class="media">
                        <div class="media-body text-xs-left">
                            <h3 class="teal">{{ getCount('pages') }}</h3>
                            <span>{{ trans('admin.pages') }}</span>
                        </div>
                        <div class="media-right media-middle">
                            <i class="fa fa-file teal font-large-2 float-xs-right"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-xs-12">
        <div class="card">
            <div class="card-body">
                <div class="card-block">
                    <div class="media">
                        <div class="media-body text-xs-left">
                            <h3 class="deep-orange">{{ getCount('contacts') }}</h3>
                            <span>{{ trans('admin.contacts') }}</span>
                        </div>
                        <div class="media-right media-middle">
                            <i class="fa fa-envelope deep-orange font-large-2 float-xs-right"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-xs-12">
        <div class="card">
            <div class="card-body">
                <div class="card-block">
                    <div class="media">
                        <div class="media-body text-xs-left">
                            <h3 class="cyan">{{ getCount('users') }}</h3>
                            <span>{{ trans('admin.users') }}</span>
                        </div>
                        <div class="media-right media-middle">
                            <i class="fa fa-group cyan font-large-2 float-xs-right"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@if($userAuth->can('pages.view'))
<div class="row match-height">
    <div class="col-xl-12 col-lg-12">
        <div class="card" style="">
            <div class="card-header">
                <h4 class="card-title">{{ trans('admin.top_page') }}</h4>
                <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
             	@if($userAuth->can('pages.create'))
             	<div class="heading-elements">
                    <ul class="list-inline mb-0">
                        <li><a href="{{ route('page.create') }}" class="btn btn-success" ><i class="fa fa-plus" style="color: #FFF"></i></a></li>
                    </ul>
                </div>
                @endif
            </div>
            <div class="card-body">
                <div class="card-block">
                    <p>{{ trans('admin.page_word') }} <span class="float-xs-right"><a href="{{ route('page.index') }}">{{ trans('admin.pages') }} <i class="icon-arrow-right2"></i></a></span></p>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead>
                            <tr>
                                <th>{{ trans('admin.title') }}</th>
                                <th>{{ trans('admin.created_at') }}</th>
                                <th>{{ trans('admin.updated_at') }}</th>
                                <th>{{ trans('admin.status') }}</th>
                                <th>{{ trans('admin.action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                        	@foreach($pages as $k => $page)
                            <tr>
                                <td class="text-truncate">{{ $page->name }}</td>
                                <td class="text-truncate">{{ $page->created_at }}</td>
                                <td class="text-truncate">{{ $page->updated_at }}</td>
                                <td class="text-truncate">{!! getStatus($page->show) !!}</td>
                                <td class="text-truncate">
                                	@if($userAuth->can('pages.update'))
                                	<a href="{{ route('page.edit', $page->id) }}" class="btn btn-primary">
                                		<i class="fa fa-edit"></i>
                                	</a>
                                	@endif
                                	<a href="{{ route('page.show', $page->id) }}" class="btn btn-info">
                                		<i class="fa fa-eye"></i>
                                	</a>

                                    <a href="{{ $page->url }}" class="btn btn-warning" target="_blank">
                                        <i class="fa fa-link"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
@endsection