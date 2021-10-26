@extends('layouts.master')

@section('content')         
                   <div class="HeadingColumn mt-3 pb-3"><h2>Add Snippet</h2></div>
                   <button class="btn btn-primary btn-sm"><a style="color:#fff" onclick="back()" >Back</a></button>

                         @if($getAllcategory->isEmpty())   
                         <p>Category is empty create new now.</p>
                         <a href="{{route('addcategory')}}">Create Category</a>

                         @else

                         <form  method="POST" id="addNoteForm">
                            <div class="row mb-5">
                                <div class="col-md-12">
                                    @if($title !='')
                                        <input type="hidden" value="{{ Request::segment(2) }}" class="form-control" id="addsnippetID" name="addsnippetID">
                                    @endif
                                    <input type="text" value="{{$title}}" class="form-control" id="NameNote" name="NameNote">
                                    @csrf
                                    <div>Title</div>
                                </div>                       
                            </div>
                            <div class="row mb-5">
                                <div class="col-md-12">
                                    <div>Category</div>
                                    <select xd="{{ $getSnippetCatid }}" class="form-control categoryID" name="category" >
                                        @foreach($getAllcategory as $values)
                                              @if($title !='' && $getSnippetCatid == $values->id )                                              
                                                   <option selected='selected' value="{{$values->id}}">{{$values->category}}</option>
                                              @else 
                                                   <option  value="{{$values->id}}">{{$values->category}}</option>
                                              @endif                                            
                                        @endforeach
                                    </select>
                                </div>                       
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <textarea class="form-control Content" name="editor" id="editor" cols="30" rows="10">{{$code ? $code: ''}}</textarea>
                                    <div>Code</div>
                                </div>
                            </div>    
                            <div class="row">
                                <div class="col-md-12 mb-5">
                                    <button type="submit" class="btn btn-primary btn-sm addnoteButton">Save</button>
                                </div>
                            </div>                            
                        </form>  
                        @endif            
                        @endsection             