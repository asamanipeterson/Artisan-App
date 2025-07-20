@extends('layouts.dashboard')
@section('header', 'Available Services')
@section('content')

<div class="row g-4">
    @foreach ($services as $service)
    <div class="col-md-4">
        <div class="card bg-accent p-3">
            <div class="card-body">
                <h5 class="card-title">{{ $service->name }}</h5>
                <p class="card-text fs-4"><i class=" me-2"></i>{{ $service->description }}</p>
                <p class="card-text fs-4"><i class=" me-2"></i>GH₵ {{ $service->amount }}</p>
                <img src="{{ $service->imageUrl() }}" class="card-img-top" alt=" Image {{ $service->id }}">
                <a href="{{ route('services.edit', $service->id) }}" class="btn btn-success">Edit</a>
            </div>
        </div>
    </div>
    @endforeach
</div>

@endsection
