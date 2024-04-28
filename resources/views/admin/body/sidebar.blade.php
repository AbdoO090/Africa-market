@php
    $prefix = Request::route()->getPrefix();
    $route=Route::current()->getName();

@endphp

<aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar">

        <div class="user-profile">
			<div class="ulogo">
				 <a href="{{url('/admin/dashboard')}}">
				  <!-- logo for regular state and mobile devices -->
					 <div class="d-flex align-items-center justify-content-center">
                      <img src="{{asset('logo/log.png') }} "alt="">


					 </div>
				</a>
			</div>
        </div>

      <!-- sidebar menu-->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header nav-small-cap">Main Dashboard</li>
		<li class="{{($route == 'admin.index')? 'active':''}}">
          <a href="{{url('/admin/dashboard')}}">
            <i class="fa fa-tachometer"></i>
			<span>Dashboard</span>
          </a>
        </li>





        <li class="treeview {{ ($prefix == '/testominal')?'active':'' }}  ">
            <a href="#">
              <i data-feather="file"></i>
              <span> Testominal</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="{{ ($route == 'manage-testominal')? 'active':'' }}"><a href="{{ route('manage-testominal') }}"><i class="ti-more"></i>Manage testominal</a></li>
            </ul>
          </li>
        <li class="treeview">
            <a href="#">
              <i class="fa fa-envelope"></i> <span>Countries-البلاد</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="{{($route == 'all.category')? 'active':''}}"><a href="{{route('all.category')}}"><i class="ti-more"></i>All Countries</a></li>
            </ul>
          </li>


          <li class="treeview">
            <a href="#">
              <i class="fa fa-envelope-o"></i> <span>Category-الفئات</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="{{($route == 'all.subcategory')? 'active':''}}"><a href="{{route('all.subcategory')}}"><i class="ti-more"></i>All Category</a></li>
            </ul>
          </li>


        <li class="treeview {{($prefix =='/brand')?'active':'' }}">
          <a href="#">
            <i class="fa fa-free-code-camp"></i>
            <span>Brands-البراند</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu ">
            <li class="{{($route == 'all.brand')? 'active':''}}" ><a href="{{route('all.brand')}}"><i class="ti-more"></i>All Brands</a></li>

          </ul>
        </li>




        <li class="treeview  {{($prefix =='/product')?'active':'' }}">
          <a href="#">
            <i data-feather="file"></i>
            <span>Product-المنتجات</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{($route == 'add_product')? 'active':''}}" ><a href="{{route('add-product')}}"><i class="ti-more"></i>Add Product</a></li>
            <li class="{{ ($route == 'manage-product')? 'active':'' }}"><a href="{{ route('manage-product') }}"><i class="ti-more"></i>Manage Products</a></li>

          </ul>
        </li>


        <li class="treeview {{ ($prefix == '/stock')?'active':'' }}  ">
            <a href="#">
              <i data-feather="file"></i>
              <span>Manage Stock </span>
              <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
          <li class="{{ ($route == 'product.stock')? 'active':'' }}"><a href="{{ route('product.stock') }}"><i class="ti-more"></i>Product Stock</a></li>


            </ul>
          </li>


        <li class="treeview {{ ($prefix == '/orders')?'active':'' }}  ">
            <a href="#">
              <i data-feather="file"></i>
              <span>Orders </span>
              <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
          <li class="{{ ($route == 'pending-orders')? 'active':'' }}"><a href="{{ route('pending-orders') }}"><i class="ti-more"></i>Pending Orders</a></li>
          <li class="{{ ($route == 'confirmed-orders')? 'active':'' }}"><a href="{{ route('confirmed-orders') }}"><i class="ti-more"></i>Confirmed Orders</a></li>

            </ul>
          </li>

        <li class="treeview {{ ($prefix == '/slider')?'active':'' }}  ">
            <a href="#">
              <i data-feather="file"></i>
              <span>Slider</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="{{ ($route == 'manage-slider')? 'active':'' }}"><a href="{{ route('manage-slider') }}"><i class="ti-more"></i>Manage Slider</a></li>



            </ul>
          </li>

          <li class="treeview {{ ($prefix == '/coupons')?'active':'' }}  ">
            <a href="#">
              <i data-feather="file"></i>
              <span>Coupons</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="{{ ($route == 'manage-coupon')? 'active':'' }}"><a href="{{ route('manage-coupon') }}"><i class="ti-more"></i>Manage Coupon</a></li>
            </ul>
          </li>


          <li class="treeview {{ ($prefix == '/shipping')?'active':'' }}  ">
            <a href="#">
              <i data-feather="file"></i>
              <span>Shipping Area</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="{{ ($route == 'manage-division')? 'active':'' }}"><a href="{{ route('manage-division') }}"><i class="ti-more"></i>Ship Governorate</a></li>


            </ul>
          </li>


          <li class="treeview {{ ($prefix == '/reports')?'active':'' }}  ">
            <a href="#">
                <i data-feather="file"></i>
                <span>Manage Reports </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ ($route == 'all-reports')? 'active':'' }}"><a href="{{ route('all-reports') }}"><i class="ti-more"></i>All Reports</a></li>
        </ul>
      </li>


      <li class="treeview {{ ($prefix == '/alluser')?'active':'' }}  ">
        <a href="#">
          <i data-feather="file"></i>
          <span>Manage Users </span>
          <span class="pull-right-container">
            <i class="fa fa-angle-right pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
      <li class="{{ ($route == 'all-users')? 'active':'' }}"><a href="{{ route('all-users') }}"><i class="ti-more"></i>All Users</a></li>


        </ul>
      </li>

    </li>


    <li class="treeview {{ ($prefix == '/blog')?'active':'' }}  ">
      <a href="#">
        <i data-feather="file"></i>
        <span>Manage Blog</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-right pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
    <li class="{{ ($route == 'blog.category')? 'active':'' }}"><a href="{{ route('blog.category') }}"><i class="ti-more"></i>Blog Category</a></li>
    <li class="{{ ($route == 'list.post')? 'active':'' }}"><a href="{{ route('list.post') }}"><i class="ti-more"></i>List Blog Post</a></li>
    <li class="{{ ($route == 'add.post')? 'active':'' }}"><a href="{{ route('add.post') }}"><i class="ti-more"></i>Add Blog Post</a></li>
      </ul>
    </li>


    <li class="treeview {{ ($prefix == '/setting')?'active':'' }}  ">
        <a href="#">
          <i data-feather="file"></i>
          <span>Manage Setting</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-right pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
      <li class="{{ ($route == 'site.setting')? 'active':'' }}"><a href="{{ route('site.setting') }}"><i class="ti-more"></i>Site Setting</a></li>


        </ul>
      </li>


      <li class="treeview {{ ($prefix == '/review')?'active':'' }}  ">
        <a href="#">
          <i data-feather="file"></i>
          <span>Manage Review</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-right pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
      <li class="{{ ($route == 'pending.review')? 'active':'' }}"><a href="{{ route('pending.review') }}"><i class="ti-more"></i>Pending Review</a></li>

      <li class="{{ ($route == 'publish.review')? 'active':'' }}"><a href="{{ route('publish.review') }}"><i class="ti-more"></i>Publish Review</a></li>


        </ul>
      </li>






		<li>
          <a href="{{route('admin.logout')}}">
            <i data-feather="lock"></i>
			<span>Log Out</span>
          </a>
        </li>

      </ul>
    </section>

	<div class="sidebar-footer">
		<!-- item-->

		<!-- item-->
		<a href="{{route('admin.logout')}}" style="float: right" class="link" data-toggle="tooltip" title="" data-original-title="Logout"><i class="ti-lock"></i></a>
	</div>
  </aside>