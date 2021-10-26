@extends('layouts.master')
@section('content') 
<div class="HeadingColumn mt-3 pb-3"><h3>My Category</h3></div>
<button class="btn btn-primary btn-sm"><a style="color:#fff" href="{{route('addcategory')}}">Add Category</a></button>
<div class="row">
    <div class="col-md-12 mt-5 mb-5">                               
            @if(!$allcats->isEmpty())
                      <table class="table table-striped">
                    @foreach($allcats as $v)
                       <tr> <td><span style="padding-top: 12px !important;display: inline-block;padding-right:10px;">{{$v->category}}</span></td>
                            <td><span><a class="btn btn-primary btn-sm" href="{{route('update-category',['id'=>$v->id])}}">Edit</a>  <a class="btn btn-danger btn-sm DeleteCategory" x-id="{{$v->id}}" href="javascript:void(0)">Delete</a></span></td>
                       </tr>
                    @endforeach
                    <table>
                    {{$allcats->links()}}
            @endif                                
    </div>
</div>                    
@endsection