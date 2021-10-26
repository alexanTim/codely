@extends('layouts.master')

@section('content')         
                   <div class="HeadingColumn mt-3 mb-5 pb-3"><h2>Dashboard</h2></div>
                 <div class="row">
                   <div class="col-md-4 mb-5">
                   <div class="card" style="width: 18rem;">                   
                    <div class="card-body">
                        <h5 class="card-title">All Categories</h5>
                        <p class="card-text">{{$countAll}}</p>
                        <a href="{{route('addcategory')}}" class="btn btn-primary">Add Category</a>
                    </div>
                    </div>
                   </div>
                   <div class="col-md-4 mb-5">
                    <div class="card" style="width: 18rem;">
                   
                    <div class="card-body">
                        <h5 class="card-title">Add Snippets Created</h5>
                        <p class="card-text">{{$countAllsnipet}}</p>
                        <a href="{{route('addnote')}}" class="btn btn-primary">Add Snippet</a>
                    </div>
                    </div>
                   </div>                                
                   </div>              
                        @endsection             