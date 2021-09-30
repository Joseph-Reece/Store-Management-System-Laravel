@extends('layouts.app')
@php

@endphp
@section('content')
<div class="app-content content ecommerce-cart content-head-image  fixed-navbar">
    <div class="content-header row">
        <div class="content-header-light col-12">
            <div class="row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <h3 class="content-header-title">Request Manager</h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a>
                                </li>
                                <li class="breadcrumb-item active">Request manager
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
                <div class="content-header-right col-md-3 col-12">
                    {{-- <div class="btn-group float-md-right" role="group" aria-label="Button group with nested dropdown">
                        <button class="btn btn-primary round dropdown-toggle dropdown-menu-right box-shadow-2 px-2 mb-1" id="btnGroupDrop1" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</button>
                        <div class="dropdown-menu"><a class="dropdown-item" href="component-alerts.html"> Alerts</a><a class="dropdown-item" href="material-component-cards.html"> Cards</a><a class="dropdown-item" href="component-progress.html"> Progress</a>
                            <div class="dropdown-divider"></div><a class="dropdown-item" href="register-with-bg-image.html"> Register</a>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-body">
            <div class="shopping-cart">
                <ul class="nav nav-tabs nav-justified">
                    <li class="nav-item">
                        <a class="nav-link active" id="shopping-cart" data-toggle="tab" aria-controls="shop-cart-tab" href="#shop-cart-tab" aria-expanded="true">Pending</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="checkout" data-toggle="tab" aria-controls="checkout-tab" href="#checkout-tab" aria-expanded="false">Approved</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " id="complete-order" data-toggle="tab" aria-controls="comp-order-tab" href="#comp-order-tab" aria-expanded="false">Denied</a>
                    </li>
                </ul>
                <div class="tab-content pt-1">
                    <div role="tabpanel" class="tab-pane active" id="shop-cart-tab" aria-expanded="true" aria-labelledby="shopping-cart">
                        <div class="card">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="card-body card-dashboard dataTables_wrapper dt-bootstrap">
                                        <table id="exampleTable" class="table table-striped table-borderless  file-export responsive dataex-res-configuration">
                                            <thead>
                                                <tr>
                                                    <th>Gear</th>
                                                    <th>Details</th>
                                                    <th>Request ID</th>
                                                    <th>Date</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($pendingRequests as $item)
                                                    <tr>
                                                        <td>
                                                            <div class="product-img d-flex align-items-center">
                                                                <img class="img-fluid" src="../../../app-assets/images/gallery/38.png" alt="Card image cap">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="product-title">{{$item->user->name}}</div>
                                                            <div class="product-color"><strong>Gear Name : </strong> {{$item->gear->name}}</div>
                                                            <div class="product-size"><strong>Sport : </strong>{{$sports[$item->gear->sport]}}</div>
                                                        </td>
                                                        <td>
                                                            <div class="product-price">#GR{{ str_pad($item->id, 4, '0', STR_PAD_LEFT) }}</div>
                                                        </td>
                                                        <td>
                                                            <div class="product-price">{{$item->created_at}}</div>
                                                        </td>
                                                        <td>
                                                            <button class="btn btn-small btn-primary">{{$status[$item->status]}}</button>
                                                        </td>

                                                    </tr>

                                                @endforeach
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>Gear</th>
                                                    <th>Details</th>
                                                    <th>Request ID</th>
                                                    <th>Date</th>
                                                    <th>Status</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="row match-height">
                            <div class="col-lg-6 col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Apply Coupon</h4>
                                    </div>
                                    <div class="card-content">
                                        <div class="card-body">
                                            <label class="text-muted">Enter your coupon code if you have one!</label>
                                            <form action="#">
                                                <div class="form-body">
                                                    <input type="text" class="form-control" placeholder="Enter Coupon Code Here">
                                                </div>
                                                <div class="form-actions border-0 pb-0 text-right">
                                                    <button type="button" class="btn btn-info">Apply Code</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Price Details</h4>
                                    </div>
                                    <div class="card-content">
                                        <div class="card-body">
                                            <div class="price-detail">Price (4 items) <span class="float-right">$2800</span></div>
                                            <div class="price-detail">Delivery Charges <span class="float-right">$100</span></div>
                                            <div class="price-detail">TAX / VAT <span class="float-right">$0</span></div>
                                            <hr>
                                            <div class="price-detail">Payable Amount <span class="float-right">$2900</span></div>
                                            <div class="total-savings">Your Total Savings on this order $550</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <form action="#">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-content">
                                            <div class="card-body">
                                                <div class="text-right">
                                                    <a href="#" class="btn btn-info mr-2">Continue Shopping</a>
                                                    <a href="#" class="btn btn-warning">Place Order</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane" id="checkout-tab" aria-labelledby="checkout">
                        <div class="card">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="card-body card-dashboard dataTables_wrapper dt-bootstrap">
                                        <table class="table table-striped myTable table-borderless ">
                                            <thead>
                                                <tr>
                                                    <th>Gear</th>
                                                    <th>Details</th>
                                                    <th>Request ID</th>
                                                    <th>Date</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($approvedRequests as $item)
                                                    <tr>
                                                        <td>
                                                            <div class="product-img d-flex align-items-center">
                                                                <img class="img-fluid" src="../../../app-assets/images/gallery/38.png" alt="Card image cap">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="product-title">{{$item->user->name}}</div>
                                                            <div class="product-color"><strong>Gear Name : </strong> {{$item->gear->name}}</div>
                                                            <div class="product-size"><strong>Sport : </strong>{{$sports[$item->gear->sport]}}</div>
                                                        </td>
                                                        <td>
                                                            <div class="product-price">#GR{{ str_pad($item->id, 4, '0', STR_PAD_LEFT) }}</div>
                                                        </td>
                                                        <td>
                                                            <div class="product-price">{{$item->created_at}}</div>
                                                        </td>
                                                        <td>
                                                            <button class="btn btn-small btn-primary">{{$status[$item->status]}}</button>
                                                        </td>

                                                    </tr>

                                                @endforeach
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>Gear</th>
                                                    <th>Details</th>
                                                    <th>Request ID</th>
                                                    <th>Date</th>
                                                    <th>Status</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                    {{-- <div class="table-responsive">
                                        <table class="table table-borderless mb-0">
                                            <thead>
                                                <tr>
                                                    <th>Gear</th>
                                                    <th>Details</th>
                                                    <th>Request ID</th>
                                                    <th>Date</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($pendingRequests as $item)
                                                    <tr>
                                                        <td>
                                                            <div class="product-img d-flex align-items-center">
                                                                <img class="img-fluid" src="../../../app-assets/images/gallery/38.png" alt="Card image cap">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="product-title">{{$item->user->name}}</div>
                                                            <div class="product-color"><strong>Gear Name : </strong> {{$item->gear->name}}</div>
                                                            <div class="product-size"><strong>Sport : </strong>{{$sports[$item->gear->sport]}}</div>
                                                        </td>
                                                        <td>
                                                            <div class="product-price">#GR{{$item->id}}</div>
                                                        </td>
                                                        <td>
                                                            <div class="product-price">{{$item->created_at->diffForHumans()}}</div>
                                                        </td>
                                                        <td>
                                                            <button class="btn btn-small btn-primary">{{$status[$item->status]}}</button>
                                                        </td>
                                                    </tr>

                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane " id="comp-order-tab" aria-labelledby="complete-order">
                        <div class="card">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="card-body card-dashboard dataTables_wrapper dt-bootstrap">
                                        <table class="table table-striped myTable table-borderless ">
                                            <thead>
                                                <tr>
                                                    <th>Gear</th>
                                                    <th>Details</th>
                                                    <th>Request ID</th>
                                                    <th>Date</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($deniedRequests as $item)
                                                    <tr>
                                                        <td>
                                                            <div class="product-img d-flex align-items-center">
                                                                <img class="img-fluid" src="../../../app-assets/images/gallery/38.png" alt="Card image cap">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="product-title">{{$item->user->name}}</div>
                                                            <div class="product-color"><strong>Gear Name : </strong> {{$item->gear->name}}</div>
                                                            <div class="product-size"><strong>Sport : </strong>{{$sports[$item->gear->sport]}}</div>
                                                        </td>
                                                        <td>
                                                            <div class="product-price">#GR{{ str_pad($item->id, 4, '0', STR_PAD_LEFT) }}</div>
                                                        </td>
                                                        <td>
                                                            <div class="product-price">{{$item->created_at}}</div>
                                                        </td>
                                                        <td>
                                                            <button class="btn btn-small btn-primary">{{$status[$item->status]}}</button>
                                                        </td>
                                                    </tr>

                                                @endforeach
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>Gear</th>
                                                    <th>Details</th>
                                                    <th>Request ID</th>
                                                    <th>Date</th>
                                                    <th>Status</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


<script src="/app-assets/js/core/libraries/jquery.min.js"></script>

<script>
    $(document).ready(function () {


        $('.myTable').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });
        $('.buttons-copy, .buttons-csv, .buttons-print, .buttons-pdf, .buttons-excel').addClass('btn btn-primary mr-1');


    })
</script>
