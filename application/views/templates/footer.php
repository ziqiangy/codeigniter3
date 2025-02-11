<!--MainPage End-->
</div>




<style>
  .footer {
    display: flex;
    flex direction: column;
    justify-content: center;
  }
</style>

<div class="container">
  <div class="row">
    <div class="text-center">
      <span onclick="topFunction()" id="myBtn" style="cursor:pointer;" title="Go to top">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-up"
          viewBox="0 0 16 16">
          <path fill-rule="evenodd"
            d="M7.646 4.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1-.708.708L8 5.707l-5.646 5.647a.5.5 0 0 1-.708-.708z" />
        </svg>
      </span>
    </div>
  </div>

  <?php if (empty($_SESSION["user_id"])) {
      echo'  <div class="row"> <div class="text-center"><span>Testing this app by using Demo User: </span><span style="color:red;">jamesb</span><span>, Pass: </span><span style="color:red;">123456</span></div>';
  } ?>

  <div class="row">
    <div class="text-center"><span>Ciapp By Peter Yuan</span><em>&copy;2025</em></div>
  </div>
</div>





<script>
  function topFunction() {

    window.scrollTo({
      top: 0,
      behavior: 'smooth'
    });
  }
</script>

<script type="text/javascript">
  if (navigator.serviceWorker != null) {


    navigator.serviceWorker.register("/sw.js").then(function(registration) {
      console.log("Registered events at scope: ", registration.scope);
    });
  }
</script>



</body>

</html>