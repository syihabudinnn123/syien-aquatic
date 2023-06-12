@extends('layouts.main')

@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="my-4">Edit Product</h1>

            <div class="card mb-4">
                <div class="card-body">
                    <form action="{{ route('product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        
                        <div class="mb-3">
                            <label for="category" class="form-label">Category</label>
                            <select class="form-select @error('category') is-invalid @enderror" aria-label="category" id="category" name="category">
                                <option selected disabled>- Choose Category -</option>
                                @foreach ($categories as $cat)
                                    <option value="{{ $cat->id }}" {{ $product->category_id == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" value="{{ $product->name }}" name="name" required>
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label">Price</label>
                            <input type="text" class="form-control @error('price') is-invalid @enderror" id="price" value="{{ $product->price }}" name="price" required>
                            @error('price')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="sale-price" class="form-label">Sale Price</label>
                            <input type="text" class="form-control @error('sale_price') is-invalid @enderror" id="sale_price" value="{{ $product->sale_price }}" name="sale_price" required>
                            @error('sale_price')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="brand" class="form-label">Brand</label>
                            <select class="form-select" aria-label="brand" id="brand" name="brand">
                                <option selected disabled>- Choose Brand -</option>
                                @foreach ($brands as $brand)
                                    <option value="{{ $brand->name }}" {{ $product->brands == $brand->name ? 'selected' : '' }}>{{ $brand->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Product Image</label>
                            <input class="form-control @error('image') is-invalid @enderror" type="file" name="image" id="image" accept=".jpg, .jpeg, .png., .webp">
                            @error('image')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <button type="button" class="btn btn-secondary">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
