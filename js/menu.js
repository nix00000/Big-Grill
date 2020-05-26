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
  var vals = 1;
  $(".products-containter").load("includes/menu.handle.php",{
    value : vals
  })


  $(".cart-items").load("includes/cart.inc.php", {
    token : token,
    func : func
  },totalAdd());


  $(".btns").click(function(){
    vals = $(this).val();
    $(".products-containter").load("includes/menu.handle.php",{
      value : vals
    })
});

  $(".products-containter").on("click",".addToCart",function(){
    var qty = $(this).siblings(".quantity").val();
    var price = $(this).siblings(".price").text();
    var name = $(this).siblings("h3").text();

    $(".cart-items").load("includes/cart.inc.php",{
      token:token,
      qty : qty,
      name : name,
      price : price
    });

    $(".checkout").load("includes/cart.inc.php",{
      token : token,
      total : total
    });

    });

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
