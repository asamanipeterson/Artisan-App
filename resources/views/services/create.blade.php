<div>
 @extends('layouts.dashboard')
 @section('title', 'Add a service')
 @section('header','Add a Service')
 @section('content')
 @include('services.form',['action' => route('services.store')])
 @endsection
</div>
