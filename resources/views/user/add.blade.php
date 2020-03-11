@extends('layout.main')

@section('content')
<form method="POST" action="{{route('saveUser')}}" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="exampleInputEmail1">Nom</label>
        @error('nom')
        <p class="alert alert-danger">{{$message}}</p>
        @enderror
        <input type="text" class="form-control @error('nom')is-invalid @enderror" id="exampleInputEmail1" name="nom">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">age</label>
        @error('age')
        <p class="alert alert-danger">{{$message}}</p>
        @enderror
        <input type="number" class="form-control @error('nom')is-invalid @enderror" id="exampleInputEmail1" name='age'>
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Email address</label>
        @error('email')
        <p class="alert alert-danger">{{$message}}</p>
        @enderror
        <input type="email" class="form-control @error('nom')is-invalid @enderror" id="exampleInputEmail1" name='email'>
    </div>


    <div class="form-group">
        <label for="exampleInputEmail1">Photo</label>
        @error('url_photo')
        <p class="alert alert-danger">{{$message}}</p>
        @enderror
        <input type="url" class="form-control @error('url_photo')is-invalid @enderror" id="exampleInputEmail1"
            name='url_photo'>
    </div>


    <div class="form-group">
      <label for="exampleInputEmail1">Photo</label>
      @error('file_photo')
      <p class="alert alert-danger">{{$message}}</p>
    @enderror
    <input type="file" class="form-control-file @error('file_photo')is-invalid @enderror" id="" name='file_photo'>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
