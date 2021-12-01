@extends('layouts.back')
@push('css')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('public/admin-assets/datatables/css/dataTables.min.css') }}">
@endpush
@section('title', 'Products')
@section('content')


    <!-- breadcrumbs + header closing tag -->
    <div class="c-subheader px-3">

        <ol class="breadcrumb border-0 m-0">
            <li class="breadcrumb-item"><a href="{{ url('home') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Products</li>

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
                        <div class="card-header">
                            <i class="fa fa-align-justify"></i> Product List
                            <a href="{{ route('product.create') }}" class="btn btn-outline-info btn-sm float-right"><i class="far fa-plus-square"></i> &nbsp;Add</a>

                        </div>
                        <div class="card-body">
                            <table id="products" class="stripe" style="width:100%">
                                <thead>
                                <tr>
                                    <th>ID #</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Category</th>
                                    <th></th>
                                </tr>
                                </thead>

                                <tfoot>
                                <tr>
                                    <th>ID #</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Category</th>
                                    <th></th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </main>

        <!--/ main content closing </div> in footer section-->

    @endsection
    @push('js')
        <!-- DataTables -->
            <script src="{{ asset('public/admin-assets/datatables/js/jquery-3.5.1.js') }}"></script>
            <script src="{{ asset('public/admin-assets/datatables/js/jquery.dataTables.min.js') }}"></script>
            <!-- page script -->

            <script>

                $(document).ready(function() {
                    $('#products').DataTable(
                        {
                            responsive: true,
                            autoWidth: false,
                            pagingType: 'full_numbers',
                            stateSave:false,
                            scrollY:true,
                            scrollX:true,
                            ajax:"{{ url('products/datatable') }}",
                            order:[0,'asc'],
                            columns:[
                                {data:'id', name:'id'},
                                {data:'name', name:'name'},
                                {data:'price', name:'price'},
                                {data:'category', name:'category'},
                                {data:'action', name:'action', searchable: false, sortable: false}
                            ]
                        }
                    );
                } );

            </script>

            <script>
                function deleteData(dt){
                    if (confirm("Do you want to delete this data?")){
                        $.ajax({
                            type:'DELETE',
                            url:$(dt).data("url"),
                            data:{
                                "_token":"{{ csrf_token() }}"
                            },
                            success:function(response) {
                                if (response.status){
                                    location.reload();
                                }
                            },
                            error:function(response) {
                                console.log(response);
                                location.reload();
                            }
                        });
                    }
                    return false;
                }
            </script>
    @endpush

