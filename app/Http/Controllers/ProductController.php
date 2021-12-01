<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use TJGazel\Toastr\Facades\Toastr;
use Illuminate\Support\Str;
Use Redirect;
use Illuminate\Http\JsonResponse;
use App\Categories;
use App\Products;
use Validator;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
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
        return view('back.product.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Categories::all();
        return view('back.product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
        ]);
        if($validator->fails()){
            Toastr::warning('Product Creation Error.', 'Warning',['positionClass'=> 'toast-top-right']);
            return Redirect::back()->withErrors($validator)->withInput();
        }else{
            $image = 'no-image.jpg';
            //dd($request->file('image'));
            if ($files = $request->file('image')) {
                $productImage = time() . '.' . $files->getClientOriginalExtension();
                $request->image->move(public_path('images/product'), $productImage);

                $image = $productImage;
            }

            $data = new Products();
            $data->name = $request->name;
            $data->description = $request->description;
            $data->status = $request->status;
            $data->stock = $request->stock;
            $data->selling_price = $request->selling_price;
            $data->purchase_price = $request->purchase_price;
            $data->category_id = $request->category;
            $data->image_path = $image;
            $data->tag = $request->tag;

            if($data->save()){
                Toastr::success('Product created successfully', 'Success',['positionClass'=> 'toast-top-right']);
                return redirect()->route('product.index');
            }else{
                Toastr::error ('Product creation failed', 'Error',['positionClass'=> 'toast-top-right']);
                return redirect()->back();
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Products::find($id);
        $category = Categories::where('id',$data->category_id)->first();
        return view('back.product.show', compact('data', 'category'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Products::find($id);
        $categories = Categories::all();
        return view('back.product.edit', compact('data', 'categories'));
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
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
        ]);
        if($validator->fails()){
            Toastr::warning('Category Update Error.', 'Warning',['positionClass'=> 'toast-top-right']);
            return Redirect::back()->withErrors($validator)->withInput();
        }else{

            $data = Products::find($id);
            //dd(public_path() .'/images/category/'. $data->image_path);

            if ($request->image != '') {
                if($data->image_path != 'no-image.jpg'){
                    //Delete old Image
                    $file_old = public_path() .'/images/product/'. $data->image_path;
                    unlink($file_old);
                }

                //Save new image
                $files = $request->file('image');
                $productImage = time() . '.' . $files->getClientOriginalExtension();
                $request->image->move(public_path('images/product'), $productImage);

                //Save path to DB
                $image = $productImage;
                $data->image_path = $image;
            }

            $data->name = $request->name;
            $data->description = $request->description;
            $data->status = $request->status;
            $data->stock = $request->stock;
            $data->selling_price = $request->selling_price;
            $data->purchase_price = $request->purchase_price;
            $data->category_id = $request->category;
            $data->tag = $request->tag;

            if($data->save()){
                Toastr::success('Product updated successfully', 'Success',['positionClass'=> 'toast-top-right']);
                return redirect()->route('product.index');
            }else{
                Toastr::error ('Product update failed', 'Error',['positionClass'=> 'toast-top-right']);
                return redirect()->back();
            }
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
        $data = Products::find($id);

        if ($data->image_path != '') {
            if ($data->image_path != 'no-image.jpg') {
                //Delete old Image
                $file_old = public_path() . '/images/product/' . $data->image_path;
                unlink($file_old);
            }
        }
        if ($data->delete()) {
            Toastr::success('Product Deleted Successfully', 'Success', ['positionClass' => 'toast-top-right']);
            return new JsonResponse(["status" => true]);
        } else {
            Toastr::warning('Product Deletion Failed', 'Warning', ['positionClass' => 'toast-top-right']);
            return new JsonResponse(["status" => true]);

        }

    }

    public function datatable(){
        $data = Products::all();
        //dd($data);
        return DataTables::of($data)
            ->addColumn('action', function($data){
                $url_edit = url('product/'.$data->id.'/edit');
                $url = url('product/'.$data->id);
                $view = "<a class='btn btn-action btn-primary' href='".$url."' title='View'><i class='nav-icon fas fa-eye'></i></a>&nbsp;";
                $edit = "<a class='btn btn-action btn-warning' href='".$url_edit."' title='Edit'><i class='nav-icon fas fa-edit'></i></a>&nbsp;";
                $delete = "<button data-url='".$url."' onclick='deleteData(this)' class='btn btn-action btn-danger' title='Delete'><i class='nav-icon fas fa-trash-alt'></i></button>&nbsp;";

                return $view."".$edit."".$delete;
            })
            ->editColumn('price', function ($data){
                return 'ZAR'.$data->selling_price;
            })
            ->editColumn('category', function ($data){
                $categories = Categories::all();
                //dd($categories);
                foreach ($categories as $category){
                    if($category->id == $data->category_id){
                        return $category->name;
                    }
                }
            })
            ->rawColumns(['action','price', 'category'])
            ->make(true);
    }
}
