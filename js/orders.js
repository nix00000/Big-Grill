$(document).ready(function(){
  var par;
  $(".btn3").click(function(){
    $(".page").text($(this).text());
    $(".page").show();
    par = $(this).val();
    $(".show").load("includes/orders.inc.php",{
        value : par
    });
  });

  $(".show").on("click",".send-btn",function(){
    var ord = $(this).siblings(".ord_num").val();
    var func = $(this).val();
    $("#feed").slideDown().load("includes/order_handle.inc.php",{
      order : ord,
      func : func
    },function(){
      setInterval(function(){$("#feed").slideUp()}, 5000)
    });

    $(".show").load("includes/orders.inc.php",{
        value : par
    });
  });

  $(".show").on("click",".del-btn",function(){
    if (confirm("Warning!\nIf you choose to proceed\nthe order will be deleted forever")) {
      var ord = $(this).siblings(".ord_num").val();
      var func = $(this).val();

      $("#feed").slideDown().load("includes/order_handle.inc.php",{
        order : ord,
        func : func
      },function(){
        setInterval(function(){$("#feed").slideUp()}, 5000)
      });

      $(".show").load("includes/orders.inc.php",{
          value : par
      });

    }
  });

});
