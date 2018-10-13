@extends('site.layouts.default', ['pageTitle' => trans('site.contact-us')])
@section('style')
<!-- Style File Contact -->
<link rel="stylesheet" href="{{asset('site/css/contact.css')}}">   
@endsection

@section('content')

<!-- Start contact us -->
<div class="contact text-right">
    <div class="container">
        <div class="row">
            <div class="col-lg-7">
                <h4>تواصـــل معـــنا</h4>
                <form action="{{ route('site.contact.send') }}" method="post" class="form">
                    {{ csrf_field() }}
                    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => trans('site.name')]) !!}

                    @if ($errors->has('name'))
                     <span class="help-block" style="color: red">
                      <strong>{{ $errors->first('name') }}</strong>
                    </span>
                    @endif

                    {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => trans('site.email')]) !!}

                    @if ($errors->has('email'))
                     <span class="help-block" style="color: red">
                      <strong>{{ $errors->first('email') }}</strong>
                    </span>
                    @endif

                    {!! Form::text('phone', null, ['class' => 'form-control', 'placeholder' => trans('site.phone')]) !!}

                    @if ($errors->has('phone'))
                     <span class="help-block" style="color: red">
                      <strong>{{ $errors->first('phone') }}</strong>
                    </span>
                    @endif

                    {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => trans('site.subject')]) !!}

                    @if ($errors->has('title'))
                     <span class="help-block" style="color: red">
                      <strong>{{ $errors->first('title') }}</strong>
                    </span>
                    @endif

                    {!! Form::textarea('message', null, 
                    [
                    'class' => 'form-control', 
                    'placeholder' => trans('site.message'),
                    'cols'  => '30',
                    'rows'  => '10'
                    ]
                    ) !!}

                    @if ($errors->has('message'))
                     <span class="help-block" style="color: red">
                      <strong>{{ $errors->first('message') }}</strong>
                    </span>
                    @endif

                    <input type="submit"  class="submit mb-2" value="{{ trans('site.send') }}">
                </form>
            </div>
            <div class="col-lg-5">
                <div class="map">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d13790.641221318929!2d31.349236524233387!3d30.21824135109275!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1z2LTYsdmD2Kkg2KfZhNiq2YjZgdmK2YIg2KfZhNiu2KfZhtmD2Kkg2KfZhNmF2YbYt9mC2Kkg2KfZhNi12YbYp9i52YrYqSDYp9mE2LTYsdmI2YI!5e0!3m2!1sen!2seg!4v1537714084456" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
            </div>
            
        </div>
    </div>
</div>
<!-- End contact us -->
@endsection