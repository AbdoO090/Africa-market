@extends('frontend.main_master')
@section('content')
@section('title')
    Blog Page
@endsection




<div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="#">Home</a></li>
                <li class='active'>Blog</li>
            </ul>
        </div><!-- /.breadcrumb-inner -->
    </div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
    <div class="container">
        <div class="row">
            <div class="blog-page">
                <div class="col-md-9">

                    @foreach ($blogpost as $blog)
                        <div class="blog-post  wow fadeInUp">



                            <a href="blog-details.html"><img class="img-responsive" src="{{ asset($blog->post_image) }}"
                                    alt=""></a>
                            <h1><a href="blog-details.html">
                                    @if (session()->get('language') == 'arabic')
                                        {{ $blog->post_title_ar }}
                                    @else
                                        {{ $blog->post_title_en }}
                                    @endif
                                </a></h1>

                            <span class="date-time">
                                {{ Carbon\Carbon::parse($blog->created_at)->diffForHumans() }}</span>

                            <p>
                                @if (session()->get('language') == 'arabic')
                                    {!! Str::limit($blog->post_details_ar, 200) !!}
                                @else
                                    {!! Str::limit($blog->post_details_en, 200) !!}
                                @endif
                            </p>
                            <a href="{{ route('post.details', $blog->id) }}"
                                class="btn btn-upper btn-primary read-more">read more</a>
                        </div>
                    @endforeach

                    <div class="clearfix blog-pagination filters-container  wow fadeInUp"
                        style="padding:0px; background:none; box-shadow:none; margin-top:15px; border:none">

                        <div class="text-right">
                            <div class="pagination-container">
                                <ul class="list-inline list-unstyled">
                                    <li class="prev"><a href="#"><i class="fa fa-angle-left"></i></a></li>
                                    <li><a href="#">1</a></li>
                                    <li class="active"><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#">4</a></li>
                                    <li class="next"><a href="#"><i class="fa fa-angle-right"></i></a></li>
                                </ul><!-- /.list-inline -->
                            </div><!-- /.pagination-container -->
                        </div><!-- /.text-right -->

                    </div><!-- /.filters-container -->
                </div>
                <div class="col-md-3 sidebar">


                    <div class="search-area outer-bottom-small">
                        @include('frontend.common.testimonials')

                    </div>


                        <!-- ==============================================CATEGORY============================================== -->
                        <div class="sidebar-widget outer-bottom-xs wow fadeInUp">
                            <h3 class="section-title">Blog Category</h3>
                            <div class="sidebar-widget-body m-t-10">
                                <div class="accordion">

                                    @foreach ($blogcategory as $category)
                                        <ul class="list-group">
                                            <a href="{{ url('blog/category/post/' . $category->id) }}">
                                                <li class="list-group-item">
                                                    @if (session()->get('language') == 'arabic')
                                                        {{ $category->blog_category_name_ar }}
                                                    @else
                                                        {{ $category->blog_category_name_en }}
                                                    @endif
                                                </li>
                                            </a>
                                        </ul>
                                    @endforeach



                                </div><!-- /.accordion -->
                            </div><!-- /.sidebar-widget-body -->
                        </div><!-- /.sidebar-widget -->
                        <!-- ============================================== CATEGORY : END ============================================== -->
                        <div class="sidebar-widget outer-bottom-xs wow fadeInUp">

                            <!-- ============================================== PRODUCT TAGS ============================================== -->
                            @php
                            $tags_en = App\Models\Product::groupBy('product_tag_en')->select('product_tag_en')->get();
                            $tags_ar = App\Models\Product::groupBy('product_tag_ar')->select('product_tag_ar')->get();
                            @endphp




                                 <div class="sidebar-widget product-tag wow fadeInUp">
                                      <h3 class="section-title">Product tags</h3>
                                      <div class="sidebar-widget-body outer-top-xs">

                            <div class="tag-list">

                            @if(session()->get('language') == 'arabic')

                            @foreach($tags_ar as $tag)
                            <a class="item active" title="Phone" href="{{ url('product/tag/'.$tag->product_tag_ar) }}">
                                {{ str_replace(',',' ',$tag->product_tag_ar)  }}</a>
                            @endforeach

                             @else

                            @foreach($tags_en as $tag)
                            <a class="item active" title="Phone" href="{{ url('product/tag/'.$tag->product_tag_en) }}">
                                {{ str_replace(',',' ',$tag->product_tag_en)  }}</a>
                            @endforeach

                              @endif

                                 </div>
                            <!-- /.tag-list -->
                            </div>
                                      <!-- /.sidebar-widget-body -->
                                    </div>
                                    <!-- /.sidebar-widget -->

                            </div><!-- /.sidebar-widget -->
                            <!-- ============================================== PRODUCT TAGS : END ============================================== -->
                        </div>
                    </div>
                </div>
            </div>

        </div>
    @endsection
