@extends('admin.admin_master')
@section('admin')
    <!-- Content Wrapper. Contains page content -->

    <div class="container-full">


        <!-- Main content -->
        <section class="content">
            <div class="row">


                <!---------------------------------------------Update_category-------------------------------------->

                <div class="col-12">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title"> Update Country </h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">

                                <form method="post"
                                    action="{{ route('category.update', $category->id) }}"enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $category->id }}">

                                    <div
                                        class="form-group">
                                    <h5>Country Name English<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" id="category_name_en" name="category_name_en" class="form-control"
                                            value="{{ $category->category_name_en }}">
                                        @error('category_name_en')
                                            <span class="text-danger"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                            </div>
                            <div class="form-group">
                                <h5>Country Name Arabic<span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="category_name_ar" id="category_name_ar" class="form-control"
                                        value="{{ $category->category_name_ar }}">
                                    @error('brand_name_ar')
                                        <span class="text-danger"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <h5>Country Icon <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" id="category_icon" name="category_icon" class="form-control"
                                        value="{{ $category->category_icon}}">
                                    @error('category_icon')
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
