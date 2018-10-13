@extends('site.layouts.default', ['pageTitle' => 'شكراً'])
@section('style')
<!-- Style File Contact -->
<link rel="stylesheet" href="{{asset('site/css/contact.css')}}">   
@endsection

@section('content')

<!-- Start contact us -->
<div class="contact text-right">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                
                <div class="alert alert-success text-center">{{ $text }}</div>
                
            </div>
            
        </div>
    </div>
</div>
<!-- End contact us -->
@endsection