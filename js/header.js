$(document).ready(function(){
  $("#login-form").click(function(){
    $(".login-wrap").show();
    $(".login").slideDown("slow");

  });

  $(".login").on("click",".exit",function(){
    $(".login").slideUp("slow",function(){
      $(".exit").parent().parent().hide();
    });
  }
  );

  $(".login").on("click",".tt",function(){
    $(".login-wrap").hide();
    $(".login").hide();

    $(".register-wrap").show();
    $(".register").show();
  });


  // Register
  $("#register-form").click(function(){
    $(".register-wrap").show();
    $(".register").slideDown("slow");
  });

  $(".register").on("click",".exit",function(){
    $(".register").slideUp("slow",function(){
      $(".register-wrap").hide();

    });
  }
  );

  $(".register").on("click",".tt",function(){
    $(".register-wrap").hide();
    $(".register").hide();
    $(".login-wrap").show();
    $(".login").show();
  });


});
