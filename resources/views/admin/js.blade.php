<script type="text/javascript">
    function confirmation(ev) 
    {
      //prevent browser from refreshing when  delete button is clicked
      ev.preventDefault();

      //explains which html attribute to be targeted
      var urlToRedirect = ev.currentTarget.getAttribute('href');

      console.log(urlToRedirect);

      //sweet alert body message display
      swal({
        title:"Are you sure to Delete This",
        text:"This Delete will be permanent",
        icon:"warning",
        buttons:true,
        dangerMode:true,
      })

      //incase cancel button is clicked supposed to stay on same page
      .then((willCancell)=>{
        if(willCancell)
        {
          window.location.href = urlToRedirect;
        }
      })
    }
  </script>



<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="{{ asset('/admincss/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('/admincss/vendor/popper.js/umd/popper.min.js') }}"> </script>
<script src="{{ asset('/admincss/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('/admincss/vendor/jquery.cookie/jquery.cookie.js') }}"> </script>
<script src="{{ asset('/admincss/vendor/chart.js/Chart.min.js') }}"></script>
<script src="{{ asset('/admincss/vendor/jquery-validation/jquery.validate.min.js') }}"></script>
<script src="{{ asset('/admincss/js/charts-home.js') }}"></script>
<script src="{{ asset('/admincss/js/front.js') }}"></script>