@extends('layouts.app')

@section('title', 'Inventory Items')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Inventory Management</h2>
            </div>
            <div class="pull-right mb-2">
                <a class="btn btn-success" href="{{ route('items.create') }}"> Create New Item</a>
            </div>
        </div>
    </div>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Description</th>
                <th>Quantity</th>
                <th>Price</th>
                <th width="280px">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($items as $item)
            <tr>
                <td>{{ $loop->iteration + $items->firstItem() - 1 }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->description ?? '-' }}</td>
                <td>{{ $item->quantity }}</td>
                <td>Rp {{ number_format($item->price, 2, ',', '.') }}</td>
                <td>
                    <form action="{{ route('items.destroy', $item->id) }}" method="POST">
                        <a class="btn btn-info btn-sm" href="{{ route('items.show', $item->id) }}">Show</a>
                        <a class="btn btn-primary btn-sm" href="{{ route('items.edit', $item->id) }}">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this item?')">Delete</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="text-center">No items found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    {!! $items->links() !!} <!-- Paginasi -->
@endsection