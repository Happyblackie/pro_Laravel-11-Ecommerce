<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Order;

use Illuminate\Http\Request;

use Barryvdh\DomPDF\Facade\Pdf;

class AdminController extends Controller
{
    
    public function view_category()
    {
        $categories = Category::all();
        return view('admin.category', compact('categories'));
    }

    public function add_category(Request $request)
    {
        $categories = new Category;
        $categories->category_name = $request->category;
        $categories->save();

        toastr()->timeOut(10000)->closeButton()->success('Category added successfully');

        return redirect()->back();
    }

    public function delete_category($id)
    {
        $data = Category::find($id);

        $data->delete();

        toastr()->timeOut(10000)->closeButton()->error('Category deleted successfully');
        return redirect()->back();
    }

    public function edit_category($id)
    {
        $data = Category::find($id);

        return view('admin.edit_category', compact('data'));
    }

    public function update_category(Request $request, $id)
    {
        $data =  Category::find($id);

        $data->category_name = $request->category;

        $data->save();

        toastr()->timeOut(10000)->closeButton()->success('Category updated successfully');

        return redirect('/view_category');
    }


    public function add_product()
    {
        $categories = Category::all();

        return view('admin.add_product', compact('categories'));
    }
    
    public function upload_product(Request $request)
    {
        $data = new Product;

        $data->title = $request->title;

        $data->description = $request->description;

        $data->price = $request->price;

        $data->quantity = $request->qty;

        $data->category = $request->category;

        //get image from the blade
        $image = $request->image;

        //condition 
        if ($image) 
        {
            //image unique name
            $imagename = time(). '.' .$image->getClientOriginalExtension();

            //move image to public folder
            $request->image->move('products', $imagename);

            $data->image = $imagename;
        }

        $data->save();

        toastr()->timeOut(10000)->closeButton()->success('Product added successfully');

        return redirect()->back();
    }
    
    public function view_product()
    {
        //$products = Product::all();
        $products = Product::paginate(3);

        return view('admin.view_product', compact('products'));
    }

    public function delete_product($id)
    {
        $products = Product::find($id);

        //delete image
        $image_path = public_path('products/'.$products->image);

        if (file_exists($image_path)) 
        {
            unlink($image_path);
        }

        $products->delete();

        toastr()->timeOut(10000)->closeButton()->success('Product deleted successfully');


        return redirect()->back();
    }


    public function update_product($id)
    {
        $products = Product::find($id);

        $categories = Category::all();
    
        return view('admin.update_product', compact('products', 'categories'));
    }

    public function edit_product(Request $request, $id)
    {
        $products = Product::find($id);

        $products->title = $request->title;

        $products->description = $request->description;

        $products->price = $request->price;

        $products->quantity = $request->qty;

        $products->category = $request->category;

        $image = $request->image;

         //condition 
         if ($image) 
         {
             //image unique name
             $imagename = time(). '.' .$image->getClientOriginalExtension();
 
             //move image to public folder
             $request->image->move('products', $imagename);
 
             $products->image = $imagename;
         }

         $products->save();

         toastr()->timeOut(10000)->closeButton()->success('Product updated successfully');
 
    
        return redirect('/view_product');
    }

    public function product_search(Request $request)
    {
        $search = $request->search;

        $products = Product::where('title', 'LIKE', '%' . $search. '%')
                            ->orWhere('category', 'LIKE', '%' . $search. '%')->paginate(3);

        return view('admin.view_product', compact('products'));

    }

    public function view_orders()
    {
        $data = Order::all();
        return view('admin.view_orders', compact('data'));
    }

    public function on_the_way($id)
    {
        $data = Order::find($id);

        $data->status = 'On the way';

        $data->save();

        return redirect('/view_orders');
    }

    public function delivered($id)
    {
        $data = Order::find($id);

        $data->status = 'Delivered';

        $data->save();

        return redirect('/view_orders');
    }

    public function print_pdf($id)
    {
        $data = Order::find($id);

        $pdf = Pdf::loadView('admin.invoice', compact('data'));

        return $pdf->download('invoice.pdf');
    }
}
