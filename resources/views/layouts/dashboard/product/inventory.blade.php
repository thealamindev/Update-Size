@extends('layouts.dashboard')

@section('content')
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h3>Inventory Of, {{ $product->name }}</h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            {{-- <th>Color</th> --}}
                            <th>Size</th>
                            <th>Quantity</th>
                        </tr>
                        @foreach ($inventory as $inven)
                            <tr>
                                {{-- <td></td> --}}
                                <td>{{ $inven->rel_to_size->size }}</td>
                                <td>{{ $inven->quantity }}</td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h3>Add Inventory</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('inventory.store', $product->id) }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <input type="text" disabled value="{{ $product->name }}" class="form-control">
                        </div>
                        <div class="mb-3">
                            <select name="size_id" class="form-control">
                                <option value="">Select Size</option>
                                @foreach ($sizes as $size)
                                    <option value="{{ $size->id }}">{{ $size->size }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <input type="number" class="form-control" name="quantity">
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Add Inventory</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
