<?php

namespace App\Http\Controllers;

use App\Categories;
use App\Products;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use TJGazel\Toastr\Facades\Toastr;
Use Redirect;
use Illuminate\Http\JsonResponse;
use Validator;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
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
        return view('back.category.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.category.create');
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
            Toastr::warning('Category Creation Error.', 'Warning',['positionClass'=> 'toast-top-right']);
            return Redirect::back()->withErrors($validator)->withInput();
        }else{
            $image = 'no-image.jpg';
            //dd($request->file('image'));
            if ($files = $request->file('image')) {
                $categoryImage = time() . '.' . $files->getClientOriginalExtension();
                $request->image->move(public_path('images/category'), $categoryImage);

                $image = $categoryImage;
            }

            $data = new Categories();
            $data->name = $request->name;
            $data->description = $request->description;
            $data->status = $request->status;
            $data->image_path = $image;

            if($data->save()){
                Toastr::success('Category created successfully', 'Success',['positionClass'=> 'toast-top-right']);
                return redirect()->route('category.index');
            }else{
                Toastr::error ('Category creation failed', 'Error',['positionClass'=> 'toast-top-right']);
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
        $data = Categories::find($id);
        return view('back.category.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Categories::find($id);
        return view('back.category.edit', compact('data'));
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

            $data = Categories::find($id);
            //dd(public_path() .'/images/category/'. $data->image_path);

            if ($request->image != '') {
                if($data->image_path != 'no-image.jpg'){
                    //Delete old Image
                    $file_old = public_path() .'/images/category/'. $data->image_path;
                    unlink($file_old);
                }

                //Save new image
                $files = $request->file('image');
                $categoryImage = time() . '.' . $files->getClientOriginalExtension();
                $request->image->move(public_path('images/category'), $categoryImage);

                //Save path to DB
                $image = $categoryImage;
                $data->image_path = $image;
            }

            $data->name = $request->name;
            $data->description = $request->description;
            $data->status = $request->status;

            if($data->save()){
                Toastr::success('Category updated successfully', 'Success',['positionClass'=> 'toast-top-right']);
                return redirect()->route('category.index');
            }else{
                Toastr::error ('Category update failed', 'Error',['positionClass'=> 'toast-top-right']);
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
        $data = Categories::find($id);
        $relatedProducts = Products::where('category_id',$data->id)->get();

        if($relatedProducts->count() == 0) {
            if ($data->image_path != '') {
                if ($data->image_path != 'no-image.jpg') {
                    //Delete old Image
                    $file_old = public_path() . '/images/category/' . $data->image_path;
                    unlink($file_old);
                }
            }
            if ($data->delete()) {
                Toastr::success('Category Deleted Successfully', 'Success', ['positionClass' => 'toast-top-right']);
                return new JsonResponse(["status" => true]);
            } else {
                Toastr::error('Category Deletion Failed', 'Error', ['positionClass' => 'toast-top-right']);
                return new JsonResponse(["status" => false]);

            }
        }elseif($relatedProducts->count() > 0){
            Toastr::warning('Category has related Products', 'Warning', ['positionClass' => 'toast-top-right']);
            return new JsonResponse(["status" => true]);
        }

    }

    public function deleteCategory($id)
    {
        $data = Categories::find($id);
        //dd($data);
        $relatedProducts = Products::where('category_id',$data->id)->get();
        //dd($relatedProducts->count());
        if($relatedProducts->count() == 0) {
            if ($data->image_path != '') {
                if ($data->image_path != 'no-image.jpg') {
                    //Delete old Image
                    $file_old = public_path() . '/images/category/' . $data->image_path;
                    unlink($file_old);
                }
            }
            if ($data->delete()) {
                Toastr::success('Category deleted successfully', 'Success', ['positionClass' => 'toast-top-right']);
                return redirect()->route('category.index');
            } else {
                Toastr::error('Category deletion failed', 'Error', ['positionClass' => 'toast-top-right']);
                return redirect()->back();
            }
        }elseif($relatedProducts->count() > 0){
            Toastr::warning('Category has related Products', 'Warning', ['positionClass' => 'toast-top-right']);
            return redirect()->back();
        }
    }

    public function datatable(){
        $data = Categories::all();
        //dd($data);
        return DataTables::of($data)
            ->addColumn('action', function($data){
                $url_edit = url('category/'.$data->id.'/edit');
                $url = url('category/'.$data->id);
                $url_delete = url('category/'.$data->id);
                $view = "<a class='btn btn-action btn-primary' href='".$url."' title='View'><i class='nav-icon fas fa-eye'></i></a>&nbsp;";
                $edit = "<a class='btn btn-action btn-warning' href='".$url_edit."' title='Edit'><i class='nav-icon fas fa-edit'></i></a>&nbsp;";
                $delete = "<button data-url='".$url_delete."' onclick='deleteData(this)' class='btn btn-action btn-danger' title='Delete'><i class='nav-icon fas fa-trash-alt'></i></button>&nbsp;";

                return $view."".$edit."".$delete;
            })
            ->rawColumns(['action'])
            ->make(true);
    }
}
