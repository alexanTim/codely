@extends('layouts.master')
@section('content') 
    <div class="HeadingColumn mt-3 pb-3"><h2>Update Category</h2></div>                    
    <form  method="POST" id="updateCategory">                        
        <div class="row">
            <div class="col-md-12">
                <input type="text" value="{{$category}}" class="form-control" name="category">
                <input type="hidden" class="form-control" name="update">
                <input type="hidden" value="{{$id}}" class="form-control" name="id">                                
                <div>Category Name</div>
            </div>                       
        </div>
        <div class="row">
            <div class="col-md-12">
                <button class="btn btn-primary btn-sm saveCategoryName">Save</button>
            </div>
        </div>
    </form>                  
@endsection