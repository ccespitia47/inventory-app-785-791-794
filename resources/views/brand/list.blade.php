@extends('layout')
@section('content')
@section('content')
<table class="table table-striped table-bordered">
    <thead class="thead-dark">
        <tr>
            <th>Name</th>
        </tr>
    </thead>

    <tbody>
    @foreach($brands as $brand)
    <tr>
        <td>{{ $brand->name }}</td>
        <td>
                <a href="#"class="btn btn-secondary">Editar</a>
                <a href="#" class="btn btn-danger">Borrar</a>
                <a href="#" class="btn btn-success">Nuevo Brand</a>
        </td>
    </tr>
    @endforeach
    </tbody>
</table>
@endsection