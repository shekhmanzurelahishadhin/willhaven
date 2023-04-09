@extends('layouts.app')
@section('body_content')

    <div class="container">
        <div class="row">
            <div class="col-12 mx-auto card p-4 mt-5">
                <h2 class="text-center my-4">Add Sub Sub Category</h2>
                <form class="row g-3" method="POST" action="{{route('save.sub.sub.category')}}">
                    @csrf
                    <div class="col-md-12">
                        <label for="inputState" class="form-label">Category</label>
                        <select name="category_id" id="category" class="form-select form-control">
                            <option selected>Choose Category...</option>
                            @foreach($categories as $category)
                                <option  value="{{$category->id}}">{{$category->category_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-12">
                        <label for="inputState" class="form-label">Sub Category</label>
                        <select id="subCategory" name="sub_category_id" class="form-select form-control">


                        </select>
                    </div>
                    <div class="col-md-12">
                        <label for="inputCategory" class="form-label">Sub Sub Category Name</label>
                        <input type="text" class="form-control" name="sub_sub_category_name" id="inputCategory">
                    </div>
                    <div class="col-12 my-3">
                        <button type="submit" class="btn btn-primary">Add Sub Sub Category</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            $('#category').change(function () {

                var url = '/multi-authentication/public/get-sub-sub-category/'+$(this).val();
                axios.get(url).then((res)=>{
                    var categoryOptions = "<option selected>Choose Sub Sub Category...</option>";
                    $.each(res.data, function (index, value) {
                        // $('#subCategory').html('<option  value="'+value.id+'">'+value.sub_category_name+'</option>');
                        categoryOptions += '<option  value="'+value.id+'">'+value.sub_category_name+'</option>';
                        console.log(value)
                    });
                    document.getElementById("subCategory").innerHTML = categoryOptions;
                });
            })
        })
    </script>
@endsection
