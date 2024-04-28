@extends('frontend.main_master')
@section('content')

@section('title')
    {{ $blogpost->post_title_en }}
@endsection



<div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="#">Home</a></li>
                <li class='active'>{{ $blogpost->post_title_en }}</li>
            </ul>
        </div><!-- /.breadcrumb-inner -->
    </div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
    <div class="container">
        <div class="row">
            <div class="blog-page">
                <div class="col-md-9">
                    <div class="blog-post wow fadeInUp">
                        <img class="img-responsive" src="{{ asset($blogpost->post_image) }}" alt="">


                        <h1>
                            @if (session()->get('language') == 'arabic')
                                {{ $blogpost->post_title_ar }}
                            @else
                                {{ $blogpost->post_title_en }}
                            @endif
                        </h1>




                        <span
                            class="date-time">{{ Carbon\Carbon::parse($blogpost->created_at)->diffForHumans() }}</span>
                        <div class="addthis_inline_share_toolbox_8tvu"></div>



                        <p>
                            @if (session()->get('language') == 'arabic')
                                {!! $blogpost->post_details_ar !!}
                            @else
                                {!! $blogpost->post_details_en !!}
                            @endif
                        </p>



                        <div class="addthis_inline_share_toolbox_8tvu"></div>

                    </div>







                </div>
                <div class="col-md-3 sidebar">



                    <div class="sidebar-module-container">
                        <div class="search-area outer-bottom-small">
                            @include('frontend.common.testimonials')

                        </div>




                        <!-- ======== ====CATEGORY======= === -->
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
                        <!-- ===== ======== CATEGORY : END ==== = -->




                        <!-- ========= === PRODUCT TAGS =========== === -->
                        @php
                            $tags_en = App\Models\Product::groupBy('product_tag_en')
                                ->select('product_tag_en')
                                ->get();
                            $tags_ar = App\Models\Product::groupBy('product_tag_ar')
                                ->select('product_tag_ar')
                                ->get();
                        @endphp




                        <div class="sidebar-widget product-tag wow fadeInUp">
                            <h3 class="section-title">Product tags</h3>
                            <div class="sidebar-widget-body outer-top-xs">

                                <div class="tag-list">

                                    @if (session()->get('language') == 'arabic')
                                        @foreach ($tags_ar as $tag)
                                            <a class="item active" title="Phone"
                                                href="{{ url('product/tag/' . $tag->product_tag_ar) }}">
                                                {{ str_replace(',', ' ', $tag->product_tag_ar) }}</a>
                                        @endforeach
                                    @else
                                        @foreach ($tags_en as $tag)
                                            <a class="item active" title="Phone"
                                                href="{{ url('product/tag/' . $tag->product_tag_en) }}">
                                                {{ str_replace(',', ' ', $tag->product_tag_en) }}</a>
                                        @endforeach
                                    @endif

                                </div>
                                <!-- /.tag-list -->
                            </div>
                            <!-- /.sidebar-widget-body -->
                        </div>
                        <!-- /.sidebar-widget -->

                        <!-- ============================================== PRODUCT TAGS : END ============================================== -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5e4b85f98de5201f"></script>


@endsection
