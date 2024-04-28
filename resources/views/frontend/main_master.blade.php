
<!DOCTYPE html>
<html lang="en">
    @php
$seo = App\Models\Seo::find(1);
@endphp
<head>
<!-- Meta -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
<meta name="robots" content="all">

<title>@yield('title') </title>
<!-- Bootstrap Core CSS -->
<link rel="stylesheet" href="/frontend/assets/css/bootstrap.min.css">

<!-- Customizable CSS -->
<link rel="stylesheet" href="{{asset('/frontend/assets/css/main.css')}}">
<link rel="stylesheet" href="{{asset('/frontend/assets/css/blue.css')}}">
<link rel="stylesheet" href="{{asset('/frontend/assets/css/owl.carousel.css')}}">
<link rel="stylesheet" href="{{asset('/frontend/assets/css/owl.carousel.css')}}">
<link rel="stylesheet" href="{{asset('/frontend/assets/css/animate.min.css')}}">
<link rel="stylesheet" href="{{asset('/frontend/assets/css/rateit.css')}}">
<link rel="stylesheet" href="{{asset('/frontend/assets/css/bootstrap-select.min.css')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<link rel="icon" href=" {{ asset('logo/log.png') }}" style="width: 100%">

<!-- Icons/Glyphs -->
<link rel="stylesheet" href="{{asset('/frontend/assets/css/font-awesome.css')}}">

<!-- Fonts -->
<link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,600italic,700,700italic,800' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
</head>
<body class="cnt-home">

    @auth
        @php
        $user = Auth::user();

        $cart = \App\Models\Cart::where('user_id',$user->id)->get();

        $total = 0;

        foreach ($cart as $key => $item) {
            $total += $item->price * $item->quantity;
        }


        @endphp
@endauth
<!-- ============================================== HEADER ============================================== -->
@include('frontend.body.header')

<!-- ============================================== HEADER : END ============================================== -->
@yield('content')
<!-- /#top-banner-and-menu -->

<!-- ============================================================= FOOTER ============================================================= -->
@include('frontend.body.footer')


<!-- ============================================================= FOOTER : END============================================================= -->

<!-- For demo purposes – can be removed on production -->

<!-- For demo purposes – can be removed on production : End -->

<!-- JavaScripts placed at the end of the document so the pages load faster -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="{{asset('/frontend/assets/js/jquery-1.11.1.min.js')}}"></script>
<script src="{{asset('/frontend/assets/js/bootstrap.min.js')}}"></script>
<script src="{{asset('/frontend/assets/js/bootstrap-hover-dropdown.min.js')}}"></script>
<script src="{{asset('/frontend/assets/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('/frontend/assets/js/echo.min.js')}}"></script>
<script src="{{asset('/frontend/assets/js/jquery.easing-1.3.min.js')}}"></script>
<script src="{{asset('/frontend/assets/js/bootstrap-slider.min.js')}}"></script>
<script src="{{asset('/frontend/assets/js/jquery.rateit.min.js')}}"></script>
<script type="text/javascript" src="{{asset('/frontend/assets/js/lightbox.min.js')}}"></script>
<script src="{{asset('/frontend/assets/js/bootstrap-select.min.js')}}"></script>
<script src="{{asset('/frontend/assets/js/wow.min.js')}}"></script>
<script src="{{asset('/frontend/assets/js/scripts.js')}}"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>



<script>
    @isset($notification)


    alert({{$notification}});

    @endisset

     @if(Session::has('message'))
     var type = "{{ Session::get('alert-type','info') }}"
     switch(type){
        case 'info':
        toastr.info(" {{ Session::get('message') }} ");
        break;
        case 'success':
        toastr.success(" {{ Session::get('message') }} ");
        break;
        case 'warning':
        toastr.warning(" {{ Session::get('message') }} ");
        break;
        case 'error':
        toastr.error(" {{ Session::get('message') }} ");
        break;
     }
     @endif
    </script>
<script type="text/javascript">
    $.ajaxSetup({
        headers:{
            'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
        }
    })
// Start Product View with Modal
function productView(id){

    // alert(id)
    $.ajax({
        type: 'GET',
        url: '/product/view/modal/'+id,
        dataType:'json',
        success:function(data){
                 // console.log(data);
            $('#pname').text('value',+data.product.product_name_en);
            $('#pcode').text(data.product.product_code);
            $('#pcategory').text(data.product.category.category_name_en);
            $('#pbrand').text(data.product.brand.brand_name_en);
            $('#pimage').attr('src','/'+data.product.product_thambnail);
            $('#pid').attr('value',data.product.id);
            $('#pqty').attr('max',+data.product.product_qyt);

            if (data.product.discount_price == null) {
                $('#pprice').text('');
                $('#oldprice').text('');
                $('#pprice').text(data.product.selling_price);
            }else{
                $('#pprice').text(data.product.discount_price);
                $('#oldprice').text(data.product.selling_price);
            } // end prodcut price
            // Start Stock opiton
            if (data.product.product_qyt > 0) {
                $('#aviable').text('');
                $('#stockout').text('');
                $('#aviable').text('aviable');
            }else{
                $('#aviable').text('');
                $('#stockout').text('');
                $('#stockout').text('stockout');
            } // end Stock Option
        }
    })

}
</script>
<script type="text/javascript">

    function addToWishList(product_id){
        $.ajax({
            type: "POST",
            dataType: 'json',
            url: "/add-to-wishlist/"+product_id,
            success:function(data){
                 // console.log(data);

                 // Start Message
                    const Toast = Swal.mixin({
                          toast: true,
                          position: 'top-end',

                          showConfirmButton: false,
                          timer: 3000
                        })
                    if ($.isEmptyObject(data.error)) {
                        Toast.fire({
                            type: 'success',
                            icon: 'success',
                            title: data.success
                        })
                    }else{
                        Toast.fire({
                            type: 'error',
                            icon: 'error',
                            title: data.error
                        })
                    }
                    // End Message
            }
        })
    }
    </script>
    <script type="text/javascript">
        function wishlist(){
           $.ajax({
               type: 'GET',
               url: '/user/get-wishlist-product',
               dataType:'json',
               success:function(response){
                   var rows = ""
                   $.each(response, function(key,value){
                       rows += `<tr>
                       <td class="col-md-2"><img src="/${value.product.product_thambnail} " alt="imga"></td>
                       <td class="col-md-7">
                           <div class="product-name"><a href="#">${value.product.product_name_en}</a></div>

                           <div class="price">
                           ${value.product.discount_price == null
                               ? `${value.product.selling_price}`
                               :
                               `${value.product.discount_price} <span>${value.product.selling_price}</span>`
                           }

                           </div>
                       </td>
           <td class="col-md-2">
               <button class="btn btn-primary icon" type="button" title="Add Cart" data-toggle="modal" data-target="#exampleModal" id="${value.product_id}" onclick="productView(this.id)"> Add to Cart </button>
           </td>
           <td class="col-md-1 close-btn">
            <button type="submit" class="" id="${value.id}" onclick="wishlistRemove(this.id)"><i class="fa fa-times"></i></button>
           </td>
                   </tr>`
           });

                   $('#wishlist').html(rows);
               }
           })
        }
    wishlist();

    ///  Wishlist remove Start
    function wishlistRemove(id){
        $.ajax({
            type: 'GET',
            url: '/user/wishlist-remove/'+id,
            dataType:'json',
            success:function(data){
                console.log(data);
            wishlist();
             // Start Message
                const Toast = Swal.mixin({
                      toast: true,
                      position: 'top-end',

                      showConfirmButton: false,
                      timer: 3000
                    })
                if ($.isEmptyObject(data.error)) {
                    Toast.fire({
                        type: 'success',
                        icon: 'success',
                        title: data.success
                    })
                }else{
                    Toast.fire({
                        type: 'error',
                        icon: 'error',
                        title: data.error
                    })
                }
                // End Message
            }
        });
    }
 // End Wishlist remove

    </script>



<!--  //////////////// =========== Coupon Apply Start ================= ////  -->

@auth
<script type="text/javascript">
    function applyCoupon(){
      var coupon_name = $('#coupon_name').val();

     // console.log
      $.ajax({
          type: 'POST',
          data: {coupon_name:coupon_name,total:"{{ $total }}"},
          url: "{{ url('/coupon-apply') }}",
          success:function(data){
            console.log(data);

            if(data != "done"){

            }else{

                 couponCalculation();
                 if (data.validity == true) {
                $('#couponField').hide();
               }
               // Start Message
                  const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',

                        showConfirmButton: false,
                        timer: 3000
                      })
                  if ($.isEmptyObject(data.error)) {
                      Toast.fire({
                          type: 'success',
                          icon: 'success',
                          title: data.success
                      })
                  }else{
                      Toast.fire({
                          type: 'error',
                          icon: 'error',
                          title: data.error
                      })
                  }
                  // End Message
                }
          }
      })
    }

    function couponCalculation(){
    $.ajax({
        type: 'GET',
        url: "{{ url('/coupon-calculation') }}",
        dataType: 'json',
        success:function(data){


                 $('#couponCalField').html(
                    `<tr>
        <th>
            <div class="cart-sub-total">
                Subtotal<span class="inner-left-md">EGP {{$total}}</span>
            </div>
            <div id="two" class="cart-sub-total">
                Coupon<span class="inner-left-md">EGP ${data.coupon_name}</span>
                <button type="submit" onclick="couponRemove()"><i class="fa fa-times"></i>  </button>
            </div>
             <div id="one" class="cart-sub-total">
                Discount Amount<span class="inner-left-md">EGP ${data.discount_amount}</span>
            </div>
            <div id="three" class="cart-grand-total">
                Grand Total<span class="inner-left-md">EGP ${data.total_amount}</span>
            </div>
        </th>
            </tr>`
            )

        }

    });
  }

  </script>

  <!--  //////////////// =========== End Coupon Apply Start ================= ////  -->

  <!--  //////////////// =========== Start Coupon Remove================= ////  -->

  <script type="text/javascript">

    function couponRemove(){
       $.ajax({
           type:'GET',
           url: "{{ url('/coupon-remove') }}",
           dataType: 'json',
           success:function(data){
               $('#one').hide();
               $('#two').hide();
               $('#three').html('Grand total<span class="inner-left-md">EGP {{$total}}</span>');
               $('#couponField').show();
               $('#coupon_name').val('');
                // Start Message
               const Toast = Swal.mixin({
                     toast: true,
                     position: 'top-end',

                     showConfirmButton: false,
                     timer: 3000
                   })
               if ($.isEmptyObject(data.error)) {
                   Toast.fire({
                       type: 'success',
                       icon: 'success',
                       title: data.success
                   })
               }else{
                   Toast.fire({
                       type: 'error',
                       icon: 'error',
                       title: data.error
                   })
               }
               // End Message
           }
       });
    }
</script>
@endauth

  <!--  //////////////// =========== End Coupon Remove================= ////  -->




<!-- Add to Cart Product Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"><strong><span id="pname"></span> </strong></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body">

         <div class="row">

          <div class="col-md-4">

              <div class="card" style="width: 18rem;">
                <img src=" " class="card-img-top" alt="..." style="height: 200px; width: 200px;" id="pimage">
            </div>

          </div><!-- // end col md -->


          <div class="col-md-4">

       <ul class="list-group">
        <li class="list-group-item">Product Price: <strong class="text-danger">EGP<span id="pprice"></span></strong>
            <del id="oldprice">EGP</del>
               </li>        <li class="list-group-item">Product Code: <strong id="pcode"></strong></li>
        <li class="list-group-item">Category: <strong id="pcategory"></strong></li>
        <li class="list-group-item">Brand: <strong id="pbrand"></strong></li>
        <li class="list-group-item">Stock: <span class="badge badge-pill badge-success" id="aviable" style="background: green; color: white;"></span>
            <span class="badge badge-pill badge-danger" id="stockout" style="background: red; color: white;"></span>

              </li>
  </ul>

          </div><!-- // end col md -->


          <div class="col-md-4">

<form action="{{route('addcart')}}" method="POST">
    @csrf
    <input type="hidden" id="pid" name="product_id">
    <input type="hidden" id="pname" name="name">
    <input type="hidden" id="pimage" name="image">


    <div class="form-group">
        <label for="exampleFormControlInput1">Quantity</label>
        <input type="number" class="form-control" name="product_qyt" id="qtyid"  min="1"  >


      </div> <!-- // end form group -->

    <button name="addcart" type="submit" class="mb-2 btn btn-primary" value="Add To Cart">Add To Cart</button>
         </form>

          </div><!-- // end col md -->


         </div> <!-- // end row -->



        </div> <!-- // end modal Body -->

      </div>
    </div>
  </div>
  <!-- End Add to Cart Product Modal -->


</body>
</html>
