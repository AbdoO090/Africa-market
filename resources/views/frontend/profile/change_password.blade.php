@extends('frontend.main_master')
@section('content')
@php
    $user= DB::table('users')->where('id',Auth::user()->id)->first();
@endphp
    <div class="body-content">
        <div class="container">
            <div class="row">
                @include('frontend.common.user_sidebar')

                <div class="col-md-2">

                </div>
                <div class="col-md-8">
                    <div class="card">
                        <h3 class="text-center"><span class="text-danger"> Change Password</span></h3>
                        <div class="card-body">
                            <form method="POST" action="{{ route('user.password.update') }}" >
                                @csrf

                                <div class="form-group">
                                    <label class="info-title" for="exampleInputEmail1">Current Password<span></span></label>
                                    <input type="password" id="current_password" name="oldpassword"  class="form-control">

                                </div>
                                <div class="form-group">
                                    <label class="info-title" for="exampleInputEmail2">New Password<span></span></label>
                                    <input type="password" id="password" name="password" class="form-control">

                                </div>
                                <div class="form-group">
                                    <label class="info-title" for="exampleInputEmail3">Confirm New Password<span></span></label>
                                    <input type="password" id="password_confirmation" name="password_confirmation"  class="form-control">

                                </div>

                                <div class="form-group">

                                    <Button type="submit" class="btn btn-danger">Change Password</Button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
