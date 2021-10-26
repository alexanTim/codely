@extends('layouts.master')

@section('content') 
                    <div class="HeadingColumn mt-3 pb-3"><h3>My Snippet Code</h3></div>
                        <button class="btn btn-primary btn-sm"><a style="color:#fff" href="{{route('addnote')}}">+ Add Snippet</a></button>
                        <div class="row">
                            <div class="col-md-12 mt-5 mb-5">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Snippet Title</th>
                                            <th># of Snippet</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                            @foreach($getAll as $v)
                                                <tr><td><a href="{{route('snippet-list',['id'=>$v->catid])}}">{{$v->catname}}</a></td><td>{{$v->Count}} snippets </td></tr>
                                            @endforeach
                                    </tbody>                                   
                                </table>                               
                            </div>
                        </div>                    
                        @endsection