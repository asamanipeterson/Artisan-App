<!DOCTYPE html>
<html lang="en">
<head>
  <title>@yield('tilte')</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

{{-- <div class="container">
  <form action="{{ route('services.store') }}" method="Post">
    @csrf
    <div class="form-group">
      <label for="name">Service Name:</label>
      <input type="text" class="form-control  @error('name') is-invalid @enderror"  id="name" placeholder="Enter service name" name="name">
      @error('name')
          <div id="invalidNameFeedback" class="invalid-feedback">
              {{ $message }}
          </div>
      @enderror
    </div>

    <div class="form-group">
      <label for="description">Describe the Service:</label>
      <textarea name="description" class="form-control  @error('description') is-invalid @enderror" placeholder="Enter your description" rows="5"></textarea>
      @error('description')
          <div id="invalidNameFeedback" class="invalid-feedback">
              {{ $message }}
          </div>
      @enderror
    </div>

    <div class="form-group">
        <label for="amount">Amount Charge:</label>
        <input type="number" class="form-control @error('amount') is-invalid @enderror" id="name" placeholder="Enter amount you charge here" name="amount">
        @error('amount')
          <div id="invalidNameFeedback" class="invalid-feedback">
              {{ $message }}
          </div>
      @enderror
    </div>

    <div class="form-group">
        <label for="image">Select an Image:</label>
        <input type="file" class="form-control" id="name" placeholder="put an image here" name="image">
    </div>


    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div> --}}
<div class="container">
    <form action="{{$action }}" method="POST" enctype="multipart/form-data">
        @csrf
        {{-- <x-form-field label="Name" name="name"></x-form-field> --}}
        @isset($edit)
            @method('PATCH')
        @endisset
        <x-form-field label="Company Name or Service Name" name="name" :value="$service->name ?? ''"></x-form-field>

        {{-- <x-form-field label="Description" name="description"></x-form-field> --}}
        <x-form-field label="Description"  name="description" :value="$service->description ?? ''"></x-form-field>

        {{-- <x-form-field label="Amount" name="amount" type="number"></x-form-field> --}}
        <x-form-field label="Amount" name="amount" type="number" :value="$service->amount ?? ''"></x-form-field>

        @isset($service->image)
             <img src="{{ $service->imageUrl() }}" alt="current image" height="200">
        @endisset

        <x-form-field label="Image" name="image" type="file"></x-form-field>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

</body>
</html>
