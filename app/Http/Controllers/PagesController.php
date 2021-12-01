<?php

namespace App\Http\Controllers;

use App\Categories;
use App\Customer;
use App\Products;
use App\Country;
use App\Sales;
use App\SaleStatus;
use App\Transaction;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Categories::all();
        $latest = Products::orderBy('created_at', 'desc')->take(4)->get();
        return view('front.index', compact('categories', 'latest'));
    }

    public function contact()
    {
        $categories = Categories::all();
        $latest = Products::orderBy('created_at', 'desc')->take(4)->get();
        $title = "Contact Us";
        return view('front.contact', compact('categories', 'latest', 'title'));
    }

    public function cart()
    {
        $cartCollection = \Cart::getContent();
        $categories = Categories::all();
        $latest = Products::orderBy('created_at', 'desc')->take(4)->get();
        $title = "Shopping Cart";
        return view('front.shopping-cart', compact('categories', 'latest', 'title'))
            ->with(['cartCollection' => $cartCollection]);
    }

    public function add(Request $request)
    {
        //dd(\Cart);
        \Cart::add(array(
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->selling_price,
            'quantity' => $request->quantity,
            'attributes' => array(
                'image' => $request->image_path,
                'inventory' => $request->inventory,
                'tag' => $request->tag
            )
        ));
        //dd(\Cart::getContent());
        return redirect()->route('cart')->with('success', 'Product Added to Shopping Cart!');

    }

    public function clear()
    {
        \Cart::clear();

        return redirect()->route('cart')->with('success', 'Shopping Cart Cleared!');
    }

    public function category($id)
    {
        $categories = Categories::all();
        $category = Categories::find($id);
        $latest = Products::orderBy('created_at', 'desc')->take(4)->get();
        $title = $category->name;
        $products = Products::where('category_id', $category->id)->get();
        return view('front.category', compact('category', 'categories', 'latest', 'title', 'products'));
    }

    public function onlineStore()
    {
        $categories = Categories::all();
        $latest = Products::orderBy('created_at', 'desc')->take(4)->get();
        $title = 'Online Store';
        $products = Products::all();
        return view('front.store', compact('categories', 'latest', 'title', 'products'));
    }

    public function services()
    {
        $categories = Categories::all();
        $latest = Products::orderBy('created_at', 'desc')->take(4)->get();
        $title = 'Our Services';
        return view('front.service', compact('categories', 'latest', 'title'));
    }

    public function item($id)
    {
        $data = Products::find($id);
        $categories = Categories::all();
        $latest = Products::orderBy('created_at', 'desc')->take(4)->get();
        $title = $data->name;
        return view('front.item', compact('data','categories', 'latest', 'title'));
    }

    public function checkout()
    {
        $categories = Categories::all();
        $latest = Products::orderBy('created_at', 'desc')->take(4)->get();
        $title = "Checkout";
        $countries = Country::all();
        return view('front.checkout', compact('categories','latest', 'title','countries'));
    }

    public function order(Request $request)
    {

        $data = new Customer();
        $data->fname = $request->fname;
        $data->sname = $request->sname;
        $data->address = $request->address;
        $data->email = $request->email;
        $data->phone_number = $request->phone_number;
        $data->city = $request->city;
        $data->province = $request->province;
        $data->country = $request->country;
        $data->account_status = '0';

        if ($data->save()) {

            $dataSale = new Sales();
            $dataSale->customer_id = $data->id;
            $dataSale->courier_charge = '100';
            $dataSale->subtotal = \Cart::getTotal();
            $dataSale->total = $dataSale->subtotal + $dataSale->courier_charge;

            if ($dataSale->save()) {
                $dataStatus = new SaleStatus();
                $dataStatus->sale_id = $dataSale->id;
                $dataStatus->status = 'pending';
                $dataStatus->edited_by = '0';

                $dataStatus->save();

                $cartCollection = \Cart::getContent();

                foreach ($cartCollection as $transaction) {

                    $dataTransaction = new Transaction();
                    $dataTransaction->sale_id = $data->id;
                    $dataTransaction->product_id = $transaction->id;
                    $dataTransaction->quantity = $transaction->quantity;

                    if ($dataTransaction->save()) {

                        //STOCK CORRECTION
                        $id = $dataTransaction->product_id;
                        $dataInventory = Products::find($id);

                        $inventory = $dataInventory->stock;

                        $dataInventory->stock = $inventory - $dataTransaction->quantity;

                        $dataInventory->save();

                    }

                }
            }

            \Cart::clear();

            return redirect()->route('checkout_complete')->with('success', 'Checkout complete!');

        }else{

            return redirect()->route('checkout')->with('error', 'Purchase Failed!');

        }

    }

    public function checkoutComplete(){
        $categories = Categories::all();
        $latest = Products::orderBy('created_at', 'desc')->take(4)->get();
        $title = 'Checkout Complete';
        return view('front.checkout-complete', compact('categories', 'latest', 'title'));
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
        //
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
        //
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

}
