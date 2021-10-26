@extends('layouts.master')
@section('content') 
<div class="HeadingColumn mt-3 pb-3"><h3>Category - {{$catname}}</h3></div>
<button class="btn btn-primary btn-sm"><a style="color:#fff" onclick="back()" >Back</a></button>
<button class="btn btn-primary btn-sm"><a style="color:#fff" href="{{route('addnote')}}" >Add Snippet</a></button>

<div class="row" style="overflow: auto;height:500px;">
    <div class="col-md-12 mt-5 mb-5">                               
            @if(count($allcats)>0)
                       <table class="table table-striped">
                        @foreach($allcats as $v)
                        <tr>
                             <td><span style='padding-top: 12px !important;display: inline-block;padding-right:10px;'><a href="{{route('view-snippet',['id'=>$v->id])}}">{{$v->title}}</a></span></td>
                             <td><span><a class="btn btn-primary btn-sm" href="{{route('updateSnippet',['id'=>$v->id])}}">Edit</a>  <a class="btn btn-danger btn-sm DeleteSnippet" x-id="{{$v->id}}" href="javascript:void(0)">Delete</a></span></td>
                        </tr>
                        @endforeach
                        </table>               
            @endif                                
    </div>
</div>                    
@endsection     