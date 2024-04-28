@extends('admin.admin_master')
@section('admin')
    <div class="container-full">

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="box box-widget widget-user">
                    <div class="widget-user-headwe bg-black">
                        <h3 class="widget-user-username">Admin Name:{{ $admindata->name }}</h3>
                        <br>
                        <h6 class="widget-user-desc">Admin Email :    {{ $admindata->email }}</h6>
                        <br>
                        <img class="rounded-circle"
                        src="{{ !empty($admindata->profile_photo_path) ? url('upload/admin_images/'.$admindata->profile_photo_path)
                        : url('upload/no_image.jpg') }}"
                  style="width:100px;height:100px; float:inherit">
                  <br><br>
                    </div>

                    <div class="box-footer">
                        <a href="{{route('admin.editprofile')}}" style="float: right;" class="btn btn-rounded btn-success mb-5">Edit Profile</a>

                    </div>
                </div>
            </div>

    </div>
    </section>
    </div>
@endsection
