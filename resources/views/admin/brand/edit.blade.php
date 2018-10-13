@extends($pLayout. 'master')
@section('content')
  <section id="justified-top-border">
  	<div class="row match-height">
  		<div class="col-xs-12">
  			<div class="card">
  				<div class="card-header">
  					<h4 class="card-title">
              {{ trans('admin.edit', ['name' => trans('admin.brand')]) }}
            <span class="pull-left" >
                <a href="{{ $brand->url }}" class="btn btn-primary" target="_blank"><i class="fa fa-eye"></i></a>
            </span>
            </h4>
  				</div>

              {!! Form::model($brand ,[
                  'method' => 'PATCH',
                  'route' => ['brand.update', $brand->id],
                  'files' => true
                ]) 
              !!}
          <input type="hidden" value="{{ $brand->id }}" name="id">
  				<div class="card-body">
  					<div class="card-block">
  						

  						@include('admin.brand.form')

  					</div>
  				</div>
          {!! Form::close() !!}
  			</div>
  		</div>
  	</div>
  </section>
@endsection

@section('script')

@endsection