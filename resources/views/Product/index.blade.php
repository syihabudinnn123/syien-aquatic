@extends('layouts.main')

@section('content')
<main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Product</h1> 
                        
                        <a href="{{ route('product.create')}}" class="btn btn-primary mb-2">Create New!</a>               
                        
                        
                        <div class="card mb-4">
                            
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Category</th>
                                            <th>Nama</th>
                                            <th>Price</th>
                                            <th>Sale Price</th>
                                            <th>Brand</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($products as $product)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{ $product->category->name}}</td>
                                            <td>{{ $product->name}}</td>
                                            <td>Rp. {{ number_format($product->price, 0, 2) }}</td>
                                            <td>Rp. {{ number_format($product->sale_price, 0, 2) }}</td>
                                            <td>{{ $product->brands }}</td>
                                            
                                            <td>
                                                <form onsubmit="return confirm('Are you sure? ');" action="{{ route('product.destroy', $product->id) }}" method="POST">
                                                    <a href="{{ route('product.edit', $product->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                                    @csrf
                                                    @method('DELETE')

                                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                                </form>
                                            </td> 
                                        </tr> 
                                        @endforeach
                                                                                                                      
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
@endsection