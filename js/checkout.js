$(document).ready(function (){
  var token = 0;
  var func = 0;
  var total = 0;
  function totalAdd(){
    $(".checkout").load("includes/cart.inc.php",{
      token : token,
      total : total
    });

  }

  $(".cart-items").load("includes/cart.inc.php", {
    token : token,
    func : func
  },totalAdd());

  $(".cart").on("click",".delete",function(){
    var dname = $(this).siblings(".name").text();
    $.get( "includes/cart.inc.php", {
      token:token,
      dname: dname
    });

    $(".cart-items").load("includes/cart.inc.php", {
      token : token,
      func : func
    });


    $(".checkout").load("includes/cart.inc.php",{
      token : token,
      total : total
    });
  });


  $("#clear-cart").click(function(){
    var val = $(this).val();
    $(".checkout").load("includes/cart.inc.php", {
      token : token,
      val : val
    });

    $(".cart-items").load("includes/cart.inc.php", {
      token : token,
      func : func
    });
  });


});
