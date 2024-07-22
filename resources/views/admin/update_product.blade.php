<!DOCTYPE html>
<html>
  <head> 
   @include('admin.css')

   <style>
    .div_deg    
    {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    label
    {
        display: inline-block;
        width: 200px;
        padding: 20px;
    }

    textarea
    {
        width: 450px;
        height: 100px;
    }

    input[type="text"]
    {
        width: 300px;
        height: 60px;
    }


   </style>
  </head>
  <body>
    <header class="header">   
     @include('admin.header')
    </header>
    <div class="d-flex align-items-stretch">

      <!-- Sidebar Navigation-->
      @include('admin.sidebar')
      <!-- Sidebar Navigation end-->
      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">
            <h2 class="h5 no-margin-bottom">Dashboard</h2>
          </div>
        </div>

        <h2>Update product</h2>

        <div class="div_deg">
          

            <form action="{{ url('edit_product', $products->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div>
                    <label for="">Title</label>
                    <input type="text" name="title" value="{{ $products->title }}">
                </div>

                <div>
                    <label for="">Description</label>
                    <input type="text" name="description" value="{{ $products->description }}">
                </div>
                <div>
                    <label for="">Price</label>
                    <input type="text" name="price" value="{{ $products->price }}">
                </div>
                <div>
                    <label for="">Quantity</label>
                    <input type="number" name="qty" value="{{ $products->quantity }}">
                </div>

                <div>
                    <label for="">Category</label>
                    <select name="category" id="">
                        <option value="{{ $products->category }}">{{ $products->category }}</option>

                        @foreach ($categories as $category)
                        <option value="{{ $category->category_name }}">{{ $category->category_name }}</option>
                       @endforeach


                    </select>
                </div>

                <div>
                    <label for="">Current Image</label>
                    <img width="150" src="/products/{{ $products->image }}" alt="image file">
                </div>

                <div>
                    <label for="">New Image</label>
                   <input type="file" name="image" id="">
                </div>

                <div>
                    <input type="submit" class="btn btn-success" value="Update Product">
                   
                </div>
              
            </form>
        </div>


      </div>
    </div>

    
    <!-- JavaScript files-->
    @include('admin.js')
    
  </body>
</html>