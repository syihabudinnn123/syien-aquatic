@extends('layouts.main')

@section('content')
<main>
<div class="container-fluid px-4">
<h1 class="mt-4">Create Category</h1>  
<form action="{{ route('category.store')}}" method="POST">
    @csrf
  <div class="form-group mb-2">
    <label for="name">Name</label>
    <input type="text" class="form-control" id="name" aria-describedby="emailHelp" name="name" placeholder="masukkan nama" required>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

</div>

</main>
@endsection