@extends('admin.admin_master')
@section('admin')
    <!-- Content Wrapper. Contains page content -->

    <div class="container-full">
        <!-- Content Header (Page header) -->


        <!-- Main content -->
        <section class="content">
            <div class="row">



                <div class="col-8">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Testominal List <span class="badge badge-pill badge-danger">
                                    {{ count($testominals) }} </span></h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Testominal Image </th>
                                            <th>Name</th>
                                            <th>Title</th>
                                            <th>Decription</th>
                                            <th>Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($testominals as $item)
                                            <tr>

                                                <td><img src="{{ asset($item->testominal_img) }}"
                                                        style="width: 70px; height: 40px;"> </td>
                                                <td>{{ $item->testominal_name }}</td>
                                                <td>


                                                        {{ $item->testominal_title }}

                                                </td>

                                                <td>{{ $item->testominal_description }}</td>


                                                <td width="30%">
                                                    <a href="{{ route('testominal.edit', $item->id) }}"
                                                        class="btn btn-info btn-sm" title="Edit Data"><i
                                                            class="fa fa-pencil"></i> </a>

                                                    <a href="{{ route('testominal.delete', $item->id) }}"
                                                        class="btn btn-danger btn-sm" title="Delete Data" id="delete">
                                                        <i class="fa fa-trash" ></i></a>



                                                </td>

                                            </tr>
                                        @endforeach
                                    </tbody>

                                </table>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->


                </div>
                <!-- /.col -->


                <!--   ------------ Add testominal Page -------- -->


                <div class="col-4">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Add Testominal </h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">


                                <form method="post" action="{{ route('testominal.store') }}" enctype="multipart/form-data">
                                    @csrf

                                    <div class="form-group">
                                        <h5>Testominal name <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="testominal_name" class="form-control">

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <h5>Testominal Title <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="testominal_title" class="form-control">

                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <h5>Testominal Decription <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="testominal_description" class="form-control">

                                        </div>
                                    </div>



                                    <div class="form-group">
                                        <h5>Testominal Image <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="file" name="testominal_img" class="form-control">
                                            @error('testominal_img')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="text-xs-right">
                                        <input type="submit" class="mb-5 btn btn-rounded btn-primary" value="Add New">
                                    </div>
                                </form>





                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>




            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->

    </div>
@endsection
