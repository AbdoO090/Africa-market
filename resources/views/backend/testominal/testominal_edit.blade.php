@extends('admin.admin_master')
@section('admin')


  <!-- Content Wrapper. Contains page content -->

	  <div class="container-full">
		<!-- Content Header (Page header) -->


		<!-- Main content -->
		<section class="content">
		  <div class="row">






<!--   ------------ Edit testominal Page -------- -->


          <div class="col-12">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Edit Testominal </h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">


 <form method="post" action="{{ route('testominal.update') }}" enctype="multipart/form-data">
	 	@csrf
	 <input type="hidden" name="id" value="{{ $testominals->id }}">
	 <input type="hidden" name="old_image" value="{{ $testominals->testominal_img }}">
     <div class="form-group">
		<h5>Testominal Name <span class="text-danger">*</span></h5>
		<div class="controls">
	 <input type="text"  name="testominal_name" class="form-control" value="{{ $testominals->testominal_name }}" >

	</div>
	</div>
	 <div class="form-group">
		<h5>Testominal Title <span class="text-danger">*</span></h5>
		<div class="controls">
	 <input type="text"  name="testominal_title" class="form-control" value="{{ $testominals->testominal_title }}" >

	</div>
	</div>



	<div class="form-group">
		<h5>Testominal Decription <span class="text-danger">*</span></h5>
		<div class="controls">
	 <input type="text" name="testominal_description" class="form-control" value="{{ $testominals->testominal_description }}" >

	  </div>
	</div>



	<div class="form-group">
		<h5>Testominal Image <span class="text-danger">*</span></h5>
		<div class="controls">
	 <input type="file" name="testominal_img" class="form-control" >
     @error('testominal_img')
	 <span class="text-danger">{{ $message }}</span>
	 @enderror
	  </div>
	</div>


			 <div class="text-xs-right">
	<input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update">
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