@extends('layouts.app')
@section('body_content')
    <div class="container">
        <div class="row">
            <div class="col-12 mx-auto card p-4 mt-5">
                <h2 class="text-center my-4">Add Sub Category</h2>
                <form class="row g-3" method="POST" action="{{route('save.sub.category')}}">
                    @csrf
                    <div class="col-md-12">
                        <label for="inputState" class="form-label">Category</label>
                        <select id="inputState" name="category_id" class="form-select form-control">
                            <option selected>Choose Category...</option>
                            @foreach($categories as $category)
                            <option  value="{{$category->id}}">{{$category->category_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-12">
                        <label for="inputCategory" class="form-label">Sub Category Name</label>
                        <input type="text" class="form-control" name="sub_category_name" id="inputCategory">
                    </div>
                    <div class="col-12 my-3">
                        <button type="submit" class="btn btn-primary">Add Sub Category</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
