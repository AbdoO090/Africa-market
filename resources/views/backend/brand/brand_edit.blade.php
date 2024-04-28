@extends('admin.admin_master')
@section('admin')
    <!-- Content Wrapper. Contains page content -->

    <div class="container-full">


        <!-- Main content -->
        <section class="content">
            <div class="row">


                <!---------------------------------------------Update_brand-------------------------------------->

                <div class="col-12">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title"> Update Brand </h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">

                                <form method="post"
                                    action="{{ route('brand.update', $brand->id) }}"enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $brand->id }}" >
                                    <input type="hidden" name="old_image" value="{{$brand->brand_image}}">
                                    <div
                                        class="form-group">
                                    <h5>Brand Name English<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" id="brand_name_en" name="brand_name_en" class="form-control"
                                            value="{{ $brand->brand_name_en }}">
                                        @error('brand_name_en')
                                            <span class="text-danger"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                            </div>
                            <div class="form-group">
                                <h5>Brand Name Arabic<span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="brand_name_ar" id="brand_name_ar" class="form-control"
                                        value="{{ $brand->brand_name_ar }}">
                                    @error('brand_name_ar')
                                        <span class="text-danger"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <h5>Brand Image <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="file" id="brand_image" name="brand_image" class="form-control"
                                        value="{{ $brand->brand_image }}">
                                    @error('brand_image')
                                        <span class="text-danger"><strong>{{ $message }}</strong></span>
                                    @enderror
                                    <br>

                                    <div class="text-xs-right">
                                        <input type="submit" class="btn btn-rounded btn-info" value="Update Now">
                                    </div>
                                    </form>

                                </div>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->


                        <!-- /.box -->
                    </div>
                    <!-- /.col -->
                </div>






                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->

    </div>

    <!-- /.content-wrapper -->
@endsection