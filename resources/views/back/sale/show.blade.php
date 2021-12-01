@extends('layouts.back')
@section('title', 'View Sale')
@section('content')


    <!-- breadcrumbs + header closing tag -->
    <div class="c-subheader px-3">

        <ol class="breadcrumb border-0 m-0">
            <li class="breadcrumb-item"><a href="{{ url('home') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ url('sale') }}">Sales</a></li>
            <li class="breadcrumb-item active">Sale ID# &nbsp; <strong>{{ $data->id }}</strong></li>

        </ol>
    </div>
    </header>
    <!--/ breadcrumbs + header closing tag -->

    <!-- main content closing </div> in footer section-->
    <div class="c-body">
        <main class="c-main">
            <div class="container-fluid">
                <div class="fade-in">

                    <div class="card">
                        <div class="card-header"><strong>View </strong>Sale</div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <p class="text-muted"><strong>Sale ID#</strong></p>
                                </div>
                                <div class="col-md-6">
                                    <p class="text-muted">{{ $data->id }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <p class="text-muted"><strong>Sub-Total</strong></p>
                                </div>
                                <div class="col-md-6">
                                    <p class="text-muted">R {{ $data->subtotal }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <p class="text-muted"><strong>Courier Charges</strong></p>
                                </div>
                                <div class="col-md-6">
                                    <p class="text-muted">R {{ $data->courier_charge }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <p class="text-muted"><strong>Total</strong></p>
                                </div>
                                <div class="col-md-6">
                                    <p class="text-muted">R {{ $data->total }}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    <p class="text-muted"><strong>Transaction Status</strong></p>
                                </div>
                                <div class="col-md-6">
                                    @if($status->status == 'pending')
                                        <button class="btn btn-warning btn-sm" type="button" data-toggle="modal" data-target="#exampleModal">{{ $status->status }} >> <small>Click button to edit status.</small></button>
                                    @elseif($status->status == 'complete')
                                        <button class="btn btn-success btn-sm" type="button" data-toggle="modal" data-target="#exampleModal">{{ $status->status }} >> <small>Click button to edit status.</button>
                                    @endif
                                </div>
                            </div>
                            <hr>
                            <div class="col-md-12">
                                <p class="text-muted"><strong>Customer Details</strong></p>
                            </div>
                            <div class="col-md-12">
                                <p class="text-muted">
                                    {{ $customer->fname." ".$customer->sname }}<br>
                                    {{ $customer->email }}, {{ $customer->phone_number }}<br>
                                    {{ $customer->address }},<br>
                                    {{ $customer->city }}, {{ $customer->province }}<br>
                                    {{ $customer->country }}.
                                </p>
                            </div>

                            <br><br>

                            <div class="col-md-12">
                                <p class="text-muted"><strong>Transaction Details</strong></p>
                            </div>
                            <div class="col-md-12">
                                <p class="text-muted">

                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th scope="col">Product</th>
                                        <th scope="col">Quantity</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($transactions as $transaction)
                                        <?php
                                            $product = App\Products::find($transaction->product_id);
                                        ?>
                                    <tr>
                                        <td scope="row"><small><strong>{{ $product->name }}</strong></small></td>
                                        <td>{{ $transaction->quantity }}</td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>


                                </p>
                            </div>

                        </div>
                        <div class="card-footer">
                            <a href="{{ url('product/'.$data->id.'/edit') }}" class="btn btn-secondary" type="button" data-toggle="tooltip" data-placement="top" title="Edit Category" data-original-title="Tooltip on top">Edit Category</a>
                            <a href="{{ url('product/delete') }}" class="btn btn-secondary" type="button" data-toggle="tooltip" data-placement="right" title="Delete" data-original-title="Tooltip on right">Delete Category</a>
                        </div>
                    </div>

                </div>
            </div>
        </main>

        <!--/ main content closing </div> in footer section-->
    @include('back.inc.status-modal')

@endsection
