@extends('admin.admin_master')
@section('admin')

@php
	$date = date('d-m-y');
	$today = App\Models\Order::where('order_date',$date)->sum('amount');
	$month = date('F');
	$month = App\Models\Order::where('order_month',$month)->sum('amount');
    $year = date('Y');
	$year = App\Models\Order::where('order_year',$year)->sum('amount');
    $pending = App\Models\Order::where('status','pending')->get();
@endphp

<div class="container-full">

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xl-2 col-6">
                <div class="overflow-hidden box pull-up">
                    <div class="box-body">
                        <div class="rounded icon bg-primary-light w-60 h-60">
                            <i class="mr-0 text-primary font-size-24 mdi mdi-account-multiple"></i>
                        </div>
                        <div>
                            <p class="mt-20 mb-0 text-mute font-size-16">Today's Sale</p>
                            <h3 class="mb-0 text-white font-weight-500"> EGP {{ $today  }} <small class="text-success"><i class="fa fa-caret-up"></i> EGP</small></h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-6">
                <div class="overflow-hidden box pull-up">
                    <div class="box-body">
                        <div class="rounded icon bg-warning-light w-60 h-60">
                            <i class="mr-0 text-warning font-size-24 mdi mdi-car"></i>
                        </div>
                        <div>

                            <p class="mt-20 mb-0 text-mute font-size-16">Monthly Sale </p>
                            <h3 class="mb-0 text-white font-weight-500">EGP {{ $month }} <small class="text-success"><i class="fa fa-caret-up"></i> EGP</small></h3>
			                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-6">
                <div class="overflow-hidden box pull-up">
                    <div class="box-body">
                        <div class="rounded icon bg-info-light w-60 h-60">
                            <i class="mr-0 text-info font-size-24 mdi mdi-sale"></i>
                        </div>
                        <div>

                            <p class="mt-20 mb-0 text-mute font-size-16">Yearly Sale </p>
                            <h3 class="mb-0 text-white font-weight-500">EGP {{ $year }} <small class="text-success"><i class="fa fa-caret-up"></i> EGP</small></h3>                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-6">
                <div class="overflow-hidden box pull-up">
                    <div class="box-body">
                        <div class="rounded icon bg-danger-light w-60 h-60">
                            <i class="mr-0 text-danger font-size-24 mdi mdi-phone-incoming"></i>
                        </div>

               <p class="mt-20 mb-0 text-mute font-size-16">Pending Orders </p>
			<h3 class="mb-0 text-white font-weight-500">{{ count($pending) }} <small class="text-danger"><i class="fa fa-caret-up"></i> Order </small></h3>

                    </div>
                </div>
            </div>






            <div class="col-12">
                <div class="box">
                    <div class="box-header">
                        <h4 class="box-title align-items-start flex-column">
                            Recent All Orders

                        </h4>
                    </div>
                    @php
$orders = App\Models\Order::where('status','pending')->orderBy('id','DESC')->get();
	@endphp
                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table no-border">
                                <thead>
                                    <tr class="text-uppercase bg-lightest">
                                        <th style="min-width: 250px"><span class="text-white">Date</span></th>
                                        <th style="min-width: 100px"><span class="text-fade">Invoice</span></th>
                                        <th style="min-width: 100px"><span class="text-fade">Amount</span></th>
                                        <th style="min-width: 150px"><span class="text-fade">Payment</span></th>
                                        <th style="min-width: 130px"><span class="text-fade">Status</span></th>
                                        <th style="min-width: 120px"><span class="text-fade">Process</span> </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($orders as $item)
                                    <tr>
                                        <td class="py-8 pl-0">
                                             <span class="text-white font-weight-600 d-block font-size-16">
                                                {{ Carbon\Carbon::parse($item->order_date)->diffForHumans()  }}
                                            </span>
                                        </td>

                                        <td>

                                            <span class="text-white font-weight-600 d-block font-size-16">
                                                {{ $item->invoice_no }}
                                            </span>
                                        </td>

                                        <td>
                                            <span class="text-fade font-weight-600 d-block font-size-16">
                                                EGP {{ $item->amount }}
                                            </span>

                                        </td>

                                        <td>

                                            <span class="text-white font-weight-600 d-block font-size-16">
                                                {{ $item->payment_method }}
                                            </span>
                                        </td>
                                        <td>
                                            <span class="badge badge-primary-light badge-lg">{{ $item->status }}</span>
                                        </td>


                                        <td class="text-right">
                                            <a href="#" class="mx-5 waves-effect waves-light btn btn-info btn-circle"><span class="mdi mdi-bookmark-plus"></span></a>
                                            <a href="#" class="mx-5 waves-effect waves-light btn btn-info btn-circle"><span class="mdi mdi-arrow-right"></span></a>
                                        </td>
                                    </tr>
                                    @endforeach


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
  </div>
@endsection
