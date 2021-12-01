<?php

namespace App\Http\Controllers;

use App\Customer;
use App\SaleStatus;
use App\Transaction;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use TJGazel\Toastr\Facades\Toastr;
use Illuminate\Support\Str;
Use Redirect;
use Illuminate\Http\JsonResponse;
use App\Categories;
use App\Products;
use App\Sales;
use Validator;
use Illuminate\Support\Facades\Auth;

class SalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('back.sale.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Sales::find($id);
        $customer = Customer::where('id', $data->customer_id)->first();
        $status = SaleStatus::where('sale_id', $data->id)->first();
        $transactions = Transaction::where('sale_id', $data->id)->get();
        return view('back.sale.show', compact('data', 'customer', 'status', 'transactions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //dd($request);
        $data = SaleStatus::where('sale_id', $id)->first();
        $data->status = $request->status;
        $data->edited_by = Auth::user()->id;

        if($data->save()){
            Toastr::success ('Sales Status Updated', 'Success',['positionClass'=> 'toast-top-right']);
            return redirect()->back();
        }else{
            Toastr::warning ('Sales Status Updated failed', 'Warning',['positionClass'=> 'toast-top-right']);
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function datatable(){
        $data = Sales::all();
        //dd($data);
        return DataTables::of($data)
            ->addColumn('action', function($data){

                $url = url('sale/'.$data->id);
                $view = "<a class='btn btn-action btn-primary' href='".$url."' title='View'><i class='nav-icon fas fa-eye'></i></a>&nbsp;";

                return $view;
            })
            ->editColumn('id', function ($data){
                $url = url('sale/'.$data->id);
                return "<a href='".$url."'>".$data->id."</a>";
            })
            ->editColumn('customer', function ($data){
                $customer = Customer::find($data->customer_id);
                return $customer->fname." ".$customer->sname;
            })
            ->editColumn('status', function ($data){
                $status = SaleStatus::find($data->id);
                $status = "<small><strong>".$status->status."</strong></small>";
                return $status;
            })
            ->rawColumns(['action','customer','status','id'])
            ->make(true);
    }

}
