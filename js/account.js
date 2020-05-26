$(document).ready(function(){

  $(".btns2-btn").click(function(){
    var param = $(this).val();
    $(".info").load("includes/account_details.php",{
      param : param
    });
  });

  $(".profile-wrap").on("click",".change",function(){
    var old = $(".old-pass").val();
    var nw = $(".new-pass").val();
    var re = $(".re-pass").val();

    $.post('includes/changepass.inc.php',{
      oldpass : old,
      newpass : nw,
      repass : re
    },function(data,status) {
      $(".response").html(data);
      // console.log(data);
  });
  });

});
