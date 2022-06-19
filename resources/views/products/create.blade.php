@extends('layouts.app-master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9 mt-2">
            @if ($errors->any())
                <div class="alert alert-danger fade-out">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if ($message = Session::get('success'))
                <div class="alert alert-success fade-out">
                    <p>{{ $message }}</p>
                </div>
            @endif

           <h2>Add New Product!</h2>
           <form action="{{ url('products/store') }}" method="POST">
            @csrf
           <div class="form-group mt-4">
            <input type="text" class="form-control" name="name" placeholder="Enter Product Name">
           </div>
           <div class="form-group mt-4">
            <input type="text" class="form-control" name="price" placeholder="Enter Product Price">
           </div>
           
            <div class="form-group mt-4">
            <select type="text" class="form-control" name="category_id">
                <option value="">--Choose Product Category--</option>
                @forelse($categories as $category)
                 <option value="{{ $category->id }}">{{ $category->name }}</option>
                @empty
                 <option>No Category Available</option>
                @endforelse
            </select>
           </div>
           <div class="form-group mt-4">
           <button type="submit" class="btn btn-primary">POST</button>
           </div>
           </form>
        </div>
    </div>
</div>
@endsection