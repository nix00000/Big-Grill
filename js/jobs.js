$(document).ready(function(){
  var token = 0;
  var menu = 0;
  var load = 0;

  $(".jobs-listing").load("includes/jobs.inc.php",{
    token : token,
    menu : menu
  });

  // Load job
  $(".jobs-listing").on("click",".job-title",function(){
    load = $(this).text();
    $(".jobs-listing").load("includes/jobs.inc.php",{
      token:token,
      load : load
    });
});
   // back
  $(".jobs-listing").on("click",".back",function(){
    $(".jobs-listing").load("includes/jobs.inc.php",{
      token : token,
      menu : menu
    });
  })


  $(".jobs-listing").on("click",".apply",function(){
    var apply = 0;
    var job = $(this).siblings("h2").text();

    $(".jobs-listing").load("includes/jobs.inc.php",{
      token : token,
      apply : apply,
      job : job
    });
  })

}); //END OF MAIN
