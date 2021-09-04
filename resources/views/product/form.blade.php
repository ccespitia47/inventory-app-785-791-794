@extends('layout')
@section('title',$product->id ? 'Actualizar Producto' : 'Nuevo Producto')
@section('header',$product->id ? 'Actualizar Producto' : 'Nuevo Producto')
@section('content')

<form action="{{ route('product.save') }}" method="post">
    @csrf
    <input type="hidden" name="id" value="{{ $product->id }}">
    <div class="row mb-3">
        <label for="name" class="col-sm-2 col-form-label">Name</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="name" 
          value="{{ @old('name') ? @old('name') : $product->name}}">
        </div>
        @error('name')
        <p class="text-danger">
            {{ $message }}
        </p>
        @enderror
    </div>

    <div class="row mb-3">
        <label for="cost" class="col-sm-2 col-form-label">Cost</label>
        <div class="col-sm-10">
        <input type="number" class="form-control" name="cost" value="{{ @old('cost') ? @old('cost') : $product->cost}}">
        </div>
        @error('cost')
        <p class="text-danger">
            {{ $message }}
        </p>
        @enderror
    </div>

    <div class="row mb-3">
        <label for="price" class="col-sm-2 col-form-label">Price</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="price" 
          value="{{ @old('price') ? @old('price') : $product->price}}">
        </div>
        @error('price')
        <p class="text-danger">
            {{ $message }}
        </p>
        @enderror
    </div>

    <div class="row mb-3">
        <label for="quantity" class="col-sm-2 col-form-label">Quantity</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="quantity" 
          value="{{ @old('quantity') ? @old('quantity') : $product->quantity}}">
        </div>
        @error('quantity')
        <p class="text-danger">
            {{ $message }}
        </p>
        @enderror
    </div>

    <div class="row mb-3">
        <label for="brand" class="col-sm-2 col-form-label">Brand</label>
        <div class="col-sm-10">
            <select name="brand" class="form-select">
            @foreach ($brands as $brand)
            <option value="{{ $brand->id }}" 
                {{ $product->brand_id ==$brand->id ? "selected" : ""}}>
                {{ $brand->name }}
            </option>
                @endforeach
            </select>
        </div>
        @error('brand')
        <p class="text-danger">
            {{ $message }}
        </p>
        @enderror
    </div>

    <div class="row mb-3">
        <label for="categories" class="col-sm-2 col-form-label">Categories</label>
        <div class="col-sm-10">
            <select name="categories" class="form-select">
            @foreach ($categories as $category)
            <option value="{{ $category->id }}" 
                {{ $product->category_id ==$category->id ? "selected" : ""}}>
                {{ $category->name }}
            </option>
                @endforeach
            </select>
        </div>
        @error('brand')
        <p class="text-danger">
            {{ $message }}
        </p>
        @enderror
    </div>

    <div class="row mb-3">
        <div class="col-sm-18"></div>
        <div class="col-sm-2"></div>
        <a href="/products" class="btn btn-secondary">Cancelar</a>
        <button type="submit" class="btn btn-success">Guardar</button>
    </div>
</form>
@endsection


