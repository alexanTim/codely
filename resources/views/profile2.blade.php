@extends('layouts.master')

@section('content') 
                    <div class="HeadingColumn mt-3 pb-3"><h3>Account</h3></div>
                        @if(Session::has('success'))
                        <div class="alert alert-success mb-3">
                            {{ Session::get('success') }}
                            @php
                                Session::forget('success');
                            @endphp
                        </div>
                        @endif
                        @if(Session::has('error_passowrd'))
                            <div class="alert alert-danger mb-3">
                                {{ Session::get('error_passowrd') }}
                                @php
                                    Session::forget('error_passowrd');
                                @endphp
                            </div>
                            @endif  
                    <div class="row mt-3">
                       
                        <div class="col-md-6">  
                       
                        <div style="box-shadow:1px 1px 20px 1px #eee;padding:40px">
                            <strong>Profile Information</strong>
                            <form action="{{route('saveAccount')}}" class="mt-0" method="POST" id="saveAccount">  
                                                
                                <div class="row mb-5">
                                    <div class="col-md-12">
                                        @csrf
                                        <div>First Name</div>
                                        <input type="text" value="{{$users->firstname}}" class="form-control" name="firstname">
                                       
                                        @if ($errors->has('firstname'))
                                        <span class="text-danger">{{ $errors->first('firstname') }}</span>
                                        @endif
                                    </div>                       
                                </div>
                                <div class="row mb-5">
                                    <div class="col-md-12">
                                        <div>Last Name</div>
                                        <input type="text" value="{{$users->lastname}}" class="form-control" name="lastname">
                                        
                                        @if ($errors->has('lastname'))
                                            <span class="text-danger">{{ $errors->first('lastname') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row mb-5">
                                        <div class="col-md-12"> <div>Email</div>
                                            <input type="email" value="{{$users->email}}" class="form-control" name="email">
                                           
                                            @if ($errors->has('email'))
                                                <span class="text-danger">{{ $errors->first('email') }}</span>
                                            @endif
                                        </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 mb-5">
                                        <button class="btn btn-primary btn-sm">Save Profile</button>
                                    </div>
                                </div> 
                            </form>  
                         </div>
                        </div>
                        <div class="col-md-6">  
                            <div class="UPDATE_PASSWORD" style="box-shadow:1px 1px 20px 1px #eee;padding:40px">
                            <strong class="mb-5">Password Information</strong> 
                           
                            <form action="{{route('saveAccountPassword')}}" class="mt-0" method="POST" id="saveAccount">  
                                @csrf
                                <div class="row mb-5">
                                    <div class="col-md-12"> <div>Current Password</div>
                                        <input type="password" class="form-control" name="currentpassword">
                                       
                                        @if ($errors->has('currentpassword'))
                                            <span class="text-danger">{{ $errors->first('currentpassword') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row mb-5">
                                    <div class="col-md-12"> <div>Password</div>
                                        <input type="password" class="form-control" name="password">
                                       
                                        @if ($errors->has('password'))
                                            <span class="text-danger">{{ $errors->first('password') }}</span>
                                        @endif
                                    </div>
                                </div> 
                                <div class="row mb-5">
                                    <div class="col-md-12"><div>Confirmed</div>
                                        <input type="password" class="form-control" name="password_confirmation">
                                        
                                        @if ($errors->has('password_confirmation'))
                                            <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 mb-5">
                                        <button class="btn btn-primary btn-sm">Save Password</button>
                                    </div>
                                </div> 
                                </form>  
                            </div>               
                        </div> 
                                     
                    </div>
                    @endsection