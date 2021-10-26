@extends('layouts.master')
@section('content')              
    <div class="HeadingColumn mt-3 pb-3"><h2>Add Category</h2></div>  
    <form  method="POST" id="addcategory">                        
        <div class="row">
            <div class="col-md-12">
                <input type="text" value="" class="form-control" name="category">
                <input type="hidden" class="form-control" name="update">
                <input type="hidden" class="form-control" name="id">                                
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