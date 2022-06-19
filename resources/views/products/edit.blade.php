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

           <h2>Edit Product</h2>
           <form action="{{ url('products/update',$products->id) }}" method="POST">
            @csrf
            @method('PUT')
           <div class="form-group mt-4">
            <label class="mb-3">Enter New Product Name</label>
            <input type="text" class="form-control" name="name" value="{{ $products->name }}" placeholder="{{ $products->name }}">
           </div>

           <div class="form-group mt-4">
            <label class="mb-3">Enter New Product Price</label>
            <input type="text" class="form-control" name="price" value="{{ $products->price }}" placeholder="{{ $products->price }}">
           </div>

           <div class="form-group mt-4">
              <label class="mb-3">Select New Product Category</label>
              <select type="text" class="form-control" name="category_id">
                <option value="{{ $products->category_id }}">--- Select New Product Category ---</option>
                @forelse($categories as $category)
                 <option value="{{ $category->id }}">{{ $category->name }}</option>
                @empty
                 <option>No Category Available</option>
                @endforelse
            </select>
           </div>

           <div class="form-group mt-5">
           <button type="submit" class="btn btn-primary">SAVE</button>
           </div>
           </form>
        </div>
    </div>
</div>
@endsection