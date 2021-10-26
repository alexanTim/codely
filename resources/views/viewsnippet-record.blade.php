@extends('layouts.master')
@section('content') 
<button class="btn btn-primary btn-sm"><a style="color:#fff" onclick="back()" >Back</a></button>
<div class="row">
    <div class="col-md-12 mt-5 mb-5">                               
            @if(count($allcats)>0)                      
                        @foreach($allcats as $v)
                        
                        <div><h3>{{$v->title}}</h3></div>
                        <div class="codewrapper">  
                            <pre> 
                                <code>  
                                 {!!$v->code!!}    
                                </code>                 
                            </pre>     
                           </div>
                        @endforeach
                                  
            @endif    
            <button class="btn btn-primary btn-sm"><a style="color:#fff"  href="{{route('addnote')}}/{{Request::segment(2)}}" onclick="" >Edit</a></button>                            
    </div>
   
</div>  


@endsection     