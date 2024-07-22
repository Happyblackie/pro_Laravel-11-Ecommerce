<!DOCTYPE html>
<html>
  <head> 
   @include('admin.css')
   <style>
    table
    {
        border:2px solid skyblue;
        text-align: center;
    }

    th
    {
        background-color: skyblue;
        padding: 10px;
        font-size: 18px;
        font-weight: bold;
        text-align: center;
        color: white;
    }
    .table_center
    {
        display: flex;
        justify-content: center;
        align-items: center; 
    }

    td
    {
        color: white;
        padding: 10x;
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
            <h2 class="h5 no-margin-bottom">All Orders</h2>
          </div>
        </div>
        

        <div class="table_center">
            <table>
                <tr>
                    <th>Customer Name</th>
                    <th>Address</th>
                    <th>Phone</th>
                    <th>Product title</th>
                    <th>Price</th>
                    <th>Image</th>
                    <th>Payment Status</th>
                    <th>Status</th>
                    <th>Change Status</th>
                    <th>Print PDF</th>
                </tr>

                @foreach ($data as $order)
                    <tr>
                        <td>{{ $order->name }}</td>
                        <td>{{ $order->rec_address }}</td>
                        <td>{{ $order->phone }}</td>
                        <td>{{ $order->product->title }}</td>
                        <td>{{ $order->product->price  }}</td>
                        <td>
                            <img width="100px" height="100px" src="products/{{ $order->product->image }}" alt="image file">
                        </td>
                        <td>{{ $order->payment_status }}</td>
                        <td>
                            @if ($order->status == 'in progress')
                                <span style="color: red;">
                                    {{ $order->status }}
                                </span>
                            @elseif ($order->status == 'On the way')
                                <span style="color: skyblue;">
                                    {{ $order->status }}
                                </span>
                            @else
                                <span style="color: yellow;">
                                    {{ $order->status }}
                                </span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ url('on_the_way', $order->id) }}" class="btn btn-danger" >On the way</a>
                            <a href="{{ url('delivered', $order->id) }}"  class="btn btn-success" >Delivered</a>
                           
                        </td>
                        <td>
                            <a href="{{ url('print_pdf', $order->id) }}" class="btn btn-secondary">Print PDF</a>
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