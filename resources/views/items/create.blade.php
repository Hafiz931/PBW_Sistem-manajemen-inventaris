@extends('layouts.app')

@section('title', 'Add New Item')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Add New Item</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('items.index') }}"> Back</a>
            </div>
        </div>
    </div>

    <form action="{{ route('items.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group mb-3">
                    <strong>Name:</strong>
                    <input type="text" name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" placeholder="Item Name">
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group mb-3">
                    <strong>Description:</strong>
                    <textarea class="form-control @error('description') is-invalid @enderror" style="height:100px" name="description" placeholder="Description">{{ old('description') }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6">
                <div class="form-group mb-3">
                    <strong>Quantity:</strong>
                    <input type="number" name="quantity" value="{{ old('quantity', 0) }}" class="form-control @error('quantity') is-invalid @enderror" placeholder="Quantity">
                    @error('quantity')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6">
                <div class="form-group mb-3">
                    <strong>Price:</strong>
                    <input type="number" step="0.01" name="price" value="{{ old('price', 0.00) }}" class="form-control @error('price') is-invalid @enderror" placeholder="Price">
                    @error('price')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
@endsection