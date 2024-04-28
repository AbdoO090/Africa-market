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
                            <h3 class="box-title"> Update Category </h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">

                                <form method="post"
                                    action="{{ route('subcategory.update', $subcategory->id) }}"enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $subcategory->id }}">
                                    <div class="form-group">
                                        <h5>Country Select <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="category_id" id="category_id"  class="form-control">
                                                <option value="" selected="" disabled="">Select Country
                                                </option>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }} {{$category->id == $subcategory->category_id?
                                                     'selected':'' }}">{{ $category->category_name_en }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <h5>Category Name English<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" id="subcategory_name_en" name="subcategory_name_en"
                                                class="form-control" value="{{ $subcategory->subcategory_name_en }}">
                                            @error('subcategory_name_en')
                                                <span class="text-danger"><strong>{{ $message }}</strong></span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <h5>Category Name Arabic<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="subcategory_name_ar" id="subcategory_name_ar"
                                                class="form-control" value="{{ $subcategory->subcategory_name_ar }}">
                                            @error('subcategory_name_ar')
                                                <span class="text-danger"><strong>{{ $message }}</strong></span>
                                            @enderror
                                        </div>
                                    </div>


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
