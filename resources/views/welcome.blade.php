@extends('layout/main')

@section('content')
<div class="flex-center position-ref full-height">
    <h1>Hello! This is the Welcome Page</h1>
</div>
<table>
    <thead>
        <tr>
            <th colspan="6">Users</th>
        </tr>
        <tr>
            <th>ID</th>
            <th>NOM</th>
            <th>AGE</th>
            <th>EMAIL</th>
            <th>PHOTO</th>
            <th>ACTION</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $item)

        <tr>
            <td>{{$item->id}}</td>
            <td>{{$item->nom}}</td>
            <td>{{$item->age}}</td>
            <td>{{$item->email}}</td>
            <td><img src="{{asset('storage/'.$item->photo)}}" class="img-fluid" alt=""></td>
            <td>
                <a href="{{--route('editUser')--}}" class="col"><button class="btn btn-warning">Edit</button></a>
                <a href="{{route('deleteUser',$item->id)}}" class="col"><button
                        class="btn btn-danger">Delete</button></a>
                <a href="{{route('download',$item->id)}}" class="col"><button
                        class="btn btn-success">Download Image</button></a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection
