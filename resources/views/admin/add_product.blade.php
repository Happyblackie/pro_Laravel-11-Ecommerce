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
        margin-top: 60px;
    }
    h1
    {
        color: white;
    }

    label
    {
        width: 250px;
        display: inline-block;
        font-size: 18px !important;
        color: white !important;
    }

    input[type='text']
    {
        width: 300px;
        height: 50px;
    }
    textarea
    {
        width: 400px;
        height: 50px;
    }

    .input_deg
    {
        padding: 15px;
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
            <h2 class="h5 no-margin-bottom">Product</h2>
          </div>
        </div>
        <h1 class="">Add Product</h1>
        
        <div class="div_deg">

            <form action="{{ url('upload_product') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="input_deg">
                    <label for="">Product Title</label>
                    <input type="text" name="title" required>
                </div>
                <div class="input_deg">
                    <label for="">Description</label>
                    <textarea name="description" ></textarea>
                </div>
                <div class="input_deg">
                    <label for="">Price</label>
                    <input type="text" name="price" required>
                </div>
                <div class="input_deg">
                    <label for="">Quantity</label>
                    <input type="number" name="qty" required>
                </div>
                <div class="input_deg">
                    <label for="">Product Category</label>
                    <select name="category" id="" required>
                        <option value="">Select Category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->category_name }}">{{ $category->category_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="input_deg">
                    <label for="">Product Image</label>
                    <input type="file" name="image" required>
                </div>

                <div class="input_deg">
                    
                    <input type="submit" value="add product" class="btn btn-success">
                </div>

            </form>

        </div>


      </div>
    </div>

    
    <!-- JavaScript files-->
    @include('admin.js')
  </body>
</html>