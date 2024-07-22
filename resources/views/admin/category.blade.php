<!DOCTYPE html>
<html>
  <head> 
   @include('admin.css')
   <style>

        input[type='text']
        {
            width: 400px;
            height: 50px;
        }
        .div_deg
        {
            justify-content: center;
            align-items: center;
            display: flex;
        }

        .table_deg
        {
          text-align: center;
          margin: auto;
          border: 2px solid yellowgreen;
          margin-top: 50px;
          width: 600px;
        }

        th
        {
          background-color: skyblue;
          padding: 15px;
          font-size:20px;
          font-weight: bold;
          color: white;
        }

        td
        {
          color: white;
          padding: 10px;
          border: 1px solid skyblue;
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
                    <h1 style="color:white;">Add Category</h1>
                    <div class="div_deg">
                        <form action="{{ url('add_category') }}" method="post">
                            @csrf
                            <input type="text" name="category">
                            <input class="btn btn-primary"  type="submit" value="Add Category">
                        </form>
                    </div>

              
                    
                </div>
            </div>

            <div>
              <table class="table_deg">

                <tr>
                  <th>Category Name</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>

                @foreach ($categories as $category)
                  <tr>
                    <td>
                      {{ $category->category_name }}
                    </td>
                    <td>
                      <a href="{{ url('edit_category', $category->id) }}" class=
                        "btn btn-success">Edit
                      </a>
                    </td>
                    <td>
                      <a href="{{ url('delete_category', $category->id) }}"class="btn btn-danger" onclick="confirmation(event)">Delete</a>
                    </td>
                  </tr>
                @endforeach
               
              </table>
            </div>
      </div>
    </div>

    
    <!-- JavaScript files-->
    @include('admin.js')


  </body>
</html>