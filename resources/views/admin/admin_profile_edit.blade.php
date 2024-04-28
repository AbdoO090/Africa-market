@extends('admin.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <div class="container-full">
        <section class="content">

            <!-- Basic Forms -->
            <div class="box">
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col">
                            <form method="POST" action="{{ route('admin.profile_store') }}" enctype="multipart/from-data">
                                @csrf
                                <div class="row">
                                    <div class="col-12">

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5 class="info-title">Admin User Name <span
                                                            class="text-danger">*</span></h5>

                                                    <input type="text" name="name" class="form-control" required=""
                                                        value="{{ $editdata->name }}">

                                                </div>

                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Admin Email <span class="text-danger">*</span></h5>

                                                    <input type="email" name="email" class="form-control" required=""
                                                        value="{{ $editdata->email }}">

                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <h5>Profile Image <span class="text-danger">*</span></h5>

                                                        <input type="file" name="profile_photo_path" class="form-control"
                                                            required="" id="image">


                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <img class="rounded-circle" id="showImage"
                                                        src="{{ !empty($editdata->profile_photo_path)
                                                            ? url('upload/admin_images/' . $editdata->profile_photo_path)
                                                            : url('upload/no_image.jpg') }}"
                                                        style="width:100px;height:100px">

                                                </div>
                                            </div>



                                        </div>
                                        <div class="text-xs-right">
                                            <button type="submit" class="btn btn-rounded btn-info" value="update">Update
                                            </button>
                                        </div>
                            </form>

                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

        </section>


    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#image').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>
@endsection
