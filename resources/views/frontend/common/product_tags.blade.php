@php
$tags_en = App\Models\Product::groupBy('product_tag_en')->select('product_tag_en')->get();
$tags_ar = App\Models\Product::groupBy('product_tag_ar')->select('product_tag_ar')->get();
@endphp




     <div class="sidebar-widget product-tag wow fadeInUp">
        @if (session()->get('language') == 'arabic')
        <h3 class="section-title"> علامات للمنتجات</h3>                @else
        <h3 class="section-title">Product tags</h3>              @endif

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
