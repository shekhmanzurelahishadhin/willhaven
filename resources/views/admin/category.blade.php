@extends('layouts.app')
@section('body_content')
    <div class="container">
        <div class="row">
            <div class="col-12 mx-auto card p-4 mt-5">
                <h2 class="text-center my-4">Add Category</h2>
                <form class="row g-3" method="POST" action="{{route('save.category')}}">
                    @csrf

                    <div class="col-md-12">
                        <label for="inputCategory" class="form-label">Category Name</label>
                        <input type="text" class="form-control" name="category_name" id="inputCategory">
                    </div>
                    <div class="col-12 my-3">
                        <button type="submit" class="btn btn-primary">Add Category</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
