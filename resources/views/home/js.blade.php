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


<script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
</script>
<script src="{{ asset('js/custom.js') }}"></script>