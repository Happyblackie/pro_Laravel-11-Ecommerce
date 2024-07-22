<!DOCTYPE html>
<html>

<head>
  @include('home.css')

  <style>
    .div_deg
    {
        display: flex;
        justify-content: center;
        align-items: center;
        margin: 100px 70px 70px 70px;
    }

    table
    {
        border: 2px solid  black;
        text-align: center;
        width: 800px;
    }

    th
    {
        border: 2px solid  black;
        text-align: center;
        color: white;
        font-size: 20px;
        font-weight: bold;
        background-color: black;
    }

    td
    {
        border: 1px solid skyblue;
    }

    .cart_value
    {
        text-align: center;
        margin-bottom: 70px;
        padding: 18px;
    }

    .order_deg
    {
        padding-right: 100px; 
        margin-top: -100px;
    }

    label
    {
        display: inline-block;
        width: 150px;
    }

    .div_gap
    {
        padding:10px; 
    }
  </style>
</head>

<body>
  <div class="hero_area">
    <!-- header section strats -->
    @include('home.header')
    <!-- end header section -->


    <div class="div_deg">

       

        <table>

            <tr>

                <th>Product Title</th>
                <th>Price</th>
                <th>Image</th>
                <th>Remove</th>

            </tr>

            <?php 

                $value = 0;

            ?>


            @foreach ($cart as $data)
                <tr>
                    <td>{{ $data->product->title }}</td>
                    <td>{{ $data->product->price }}</td>
                    <td>
                        <img width="100" height="100" src="/products/{{ $data->product->image }}" alt="">
                    </td>
                   

                    <td>
                        <a href="{{ url('delete_cart', $data->id) }}"class="btn btn-danger" >Delete</a>
                      </td>
                </tr>

                <?php 

                    $value = $value + $data->product->price;
                ?>
                
            @endforeach

            
           

        </table>


    </div>


    <div class="cart_value">
        <h3>Total value of Cart is: ${{ $value }}</h3>
    </div>


    <div class="order_deg" style="display:flex; justify-content:center; align-items:center;">
        <form action="{{ url('confirm_order') }}" method="post">
            @csrf
            
            <div class="div_gap">
                <label for="">Receiver Name</label>
                <input type="text" name="name"  value="{{ Auth::user()->name }}">
            </div>


            <div class="div_gap">
                <label for="">Receiver Address</label>
                <textarea name="address" id="" >{{ Auth::user()->address }}</textarea>
            </div class="div_gap">


            <div class="div_gap">
                <label for="">Receiver Phone</label>
                <input type="text" name="phone" value="{{ Auth::user()->phone }}">
            </div>

            <div class="div_gap">
                <input class="btn btn-primary" type="submit" value="Place Order">
                <a href="{{ url('stripe', $value) }}" class="btn btn-success">Pay Using Card</a>
            </div>

        </form>
    </div>
  




   

  <!-- info section -->

 @include('home.footer')
  <!-- end info section -->

 <!-- JavaScript files-->
 @include('home.js')



</body>

</html>