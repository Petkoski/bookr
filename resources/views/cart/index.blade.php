@extends('layouts.master')

@section('content')
    <!-- Content Header (Page header) -->

    {{--<div class="pad margin no-print">--}}
        {{--<div class="callout callout-info" style="margin-bottom: 0!important;">--}}
            {{--<h4><i class="fa fa-info"></i> Note:</h4>--}}
            {{--This page has been enhanced for printing. Click the print button at the bottom of the invoice to test.--}}
        {{--</div>--}}
    {{--</div>--}}

    {{--{{$products}}--}}
    {{--{{$books}}--}}

    <!-- Main content -->

    @if (session('status'))
        <div class="row">
            <div class="alert alert-info alert-dismissible col-sm-6 col-sm-offset-3">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-check"></i> The operation was completed successfully. :)</h4>
                {{ session('status') }}
            </div>
        </div>
    @endif

    @if ($books_sum == 0)
        <div class="row">
            <div class="text-center" style="margin-bottom: 5px; font-size: 23px; font-weight: normal">Your shopping cart is currently empty! :/</div>
        </div>
    @else
        <section class="invoice">

            <!-- title row -->
            <div class="row">
                <div class="col-xs-12">
                    <h2 class="page-header">
                        <i class="fa fa-globe"></i> BookR, Inc.
                        <small class="pull-right">Date: {{date('jS F Y', strtotime(date('Y-m-d H:i:s'))) }}</small>
                    </h2>
                </div>
                <!-- /.col -->
            </div>
            <!-- info row -->
            <div class="row invoice-info" style="margin-bottom: 5px">
                <div class="col-sm-4 invoice-col">
                    From:
                    <address>
                        <strong>BookR, Inc.</strong><br>
                        Partizanska bb, 6000 Ohrid<br>
                        Macedonia, Europe<br>
                        Phone: +389 46 511 000<br>
                        Email: info@bookr.com
                    </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                    To:
                    <address>
                        <strong>{{Auth::user()->name}}</strong><br>
                        Vinkovacka 58, 6000 Ohrid<br>
                        Macedonia, Europe<br>
                        Phone: +389 75 759 355<br>
                        Email: {{Auth::user()->email}}
                    </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col" style="text-align: center">
                    <b>Invoice #007612</b><br>
                    <br>
                    <b>Order ID:</b> 4F3S8J<br>
                    <b>Payment Due:</b> 2/22/2014<br>
                    <b>Account:</b> 968-34567
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

            <!-- Table row -->
            <div class="row" style="margin-bottom: 5px">
                <div class="col-xs-12 table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th style="width: 10px; text-align: center">Quantity</th>
                            <th style="width: 10px; text-align: center">Remove</th>
                            <th style="width: 425px">Product</th>
                            <th style="width: 55px; text-align: center">ID</th>
                            <th>Format</th>
                            <th style="text-align: right">Subtotal</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($books as $book)
                            <tr>
                                <td style="text-align: center">{{$book->quantity}}</td>
                                <td style="text-align: center">
                                    <a href="{{URL('/cart/RemoveFromCart/'.$book->id)}}"><i class="fa fa-times"></i></a>
                                </td>
                                <td>
                                    @if(strlen($book->name) > 65)
                                        <a style="color:#ac2925;" href="{{URL('/book/'.$book->id)}}">{{substr($book->name, 0, 65)}}...</a>
                                    @else
                                        <a style="color:#ac2925;" href="{{URL('/book/'.$book->id)}}">{{$book->name}}</a>
                                    @endif
                                </td>
                                <td style="text-align: center">{{$book->id}}</td>
                                <td>{{$book->format}}</td>
                                <td style="text-align: right">{{$book->quantity}} * {{$book->price}} € = {{$book->quantity * $book->price}} €</td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

            <div class="row">
                <!-- accepted payments column -->
                <div class="col-md-4">
                    <p class="" style="font-size: 15pt">Payment Methods:</p>
                    <img src="{{asset('assets/dist/img/credit/visa.png')}}" alt="Visa">
                    <img src="{{asset('assets/dist/img/credit/mastercard.png')}}" alt="Mastercard">
                    <img src="{{asset('assets/dist/img/credit/american-express.png')}}" alt="American Express">
                    <img src="{{asset('assets/dist/img/credit/paypal2.png')}}" alt="Paypal">

                    <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                        All direct payment gateways adhere to the standards set by PCI-DSS as managed by the PCI Security Standards Council, which is a joint effort of brands like Visa, MasterCard, American Express and Discover. PCI-DSS requirements help ensure the secure handling of information.
                    </p>
                </div>


                <div class="col-md-4">

                </div>

                <!-- /.col -->
                <div class="col-md-4" style="text-align: right">
                    <p class="" style="font-size: 15pt;">Receipt:</p>

                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <th style="width:50%; text-align: right">Subtotal</th>
                                <td>{{ $products_sum }} €</td>
                            </tr>
                            <tr>
                                <th style="text-align: right">VAT Rate (18%)</th>
                                <td>{{ 0.18 * $products_sum }} €</td>
                            </tr>
                            <tr>
                                <th style="text-align: right">Shipping</th>
                                <td>10 €</td>
                            </tr>
                            <tr>
                                <th style="text-align: right">Cart Summary</th>
                                <td style="color:#ac2925;">{{ $products_sum + 0.18 * $products_sum + 10 }} €</td>
                            </tr>
                        </table>
                    </div>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

            <!-- this row will not appear when printing -->
            <div class="row no-print">
                <div class="col-xs-12">
                    <a href="" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
                    <button type="button" class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Submit Payment
                    </button>
                    <button type="button" class="btn btn-primary pull-right" style="margin-right: 5px;">
                        <i class="fa fa-download"></i> Generate PDF
                    </button>
                </div>
            </div>
        </section>
    @endif

    <!-- /.content -->
    <div class="clearfix"></div>
@stop