$(document).ready(function(){
  var test = 9;
  var menu = 0;
  var jobs = 99;

  function msg(){
    $(".fb").slideDown("slow");
    setInterval($(".fb").slideUp("slow"), 6000);
  }

  function jobMsg(){
    $(".job-msg").slideDown("slow");
    setInterval($(".job-msg").slideUp("slow"), 6000);
  }

  // jobs
  $(".job-list").load("includes/jobs_load.inc.php",{
    test:test,
    jobs : jobs
  });

  $(".menu-items").load("includes/edit_handle.inc.php",{
    test : test,
    menu : menu
  });

  $(".menu-items").load("includes/edit_handle.inc.php",{
    test : test,
    menu : menu
  });


  $(".menu-items").on("click",".action",function(){
    var action = 0;
    var name = $(this).siblings(".item-select").val();

    if($(this).val() == "edit"){
      action = 1;
    }else if ($(this).val() == "delete"){
      action = 2;
    }
    if (action == 0) {
      var pop = $(this).val();
      $(".fb").load("includes/edit_handle.inc.php",{
        test : test,
        action : action,
        opt : pop,
        name : name
      },function(){
        msg();
        $(".menu-items").load("includes/edit_handle.inc.php",{
          test : test,
          menu : menu
        });

      });


    } else if (action == 1) {
      var descr = prompt("Please enter a description");
      if (descr !== null && descr !== "") {
        $.post("includes/edit_handle.inc.php",{
          test : test,
          action : action,
          name : name,
          descr : descr
        },function(){
          $(".menu-items").load("includes/edit_handle.inc.php",{
            test : test,
            menu : menu
          });
        })

      }

    }else {
      $.post("includes/edit_handle.inc.php",{
        test : test,
        action : action,
        name : name
    },function(data){
      $(".fb").text(data);
      msg();
      $(".menu-items").load("includes/edit_handle.inc.php",{
        test : test,
        menu : menu
        });

        });
      };


  }); // END OF ON CLICK MENU ITEMS

  // jobs

// DELETE
  $(".job-list").on("click",".del-job",function(){
    var id = $(this).siblings("input").val();
    $(".job-msg").load("includes/jobs_load.inc.php",{
      test : test,
      id : id
    },function(){
      jobMsg();
      $(".job-list").load("includes/jobs_load.inc.php",{
        test:test,
        jobs : jobs
      });
    });
  });

  // Close
  $(".job-list").on("click",".fill-job",function(){
    var jid = $(this).siblings("input").val();
    $(".job-msg").load("includes/jobs_load.inc.php",{
      test : test,
      jid : jid
    },function(){
      jobMsg();
      $(".job-list").load("includes/jobs_load.inc.php",{
        test : test,
        jobs : jobs
      });
    });
  });

  // SELECT JOB
  $(".job-list").on("click",".job-title",function(){
    var enlarge = $(this).siblings("input").val();

    $(".job-list").load("includes/jobs_load.inc.php",{
      test : test,
      enlarge : enlarge
    },function(){
      var appl = enlarge;
      $(".app-list").load("includes/jobs_load.inc.php",{
        test : test,
        appl : appl

      });

      $(".add-job").hide();
      $(".applicants").show();
    })
  })

  $(".header").on("click",".return-list",function(){

    $(".job-list").load("includes/jobs_load.inc.php",{
      test:test,
      jobs : jobs
    });
    $(".add-job").show();
    $(".applicants").hide();
  });


// Edit description and requirements
var action = 0;
  $(".job-list").on("click", ".ed-descr", function(){
    var editid = $(this).siblings("input").val();
    var descr = $(this).siblings(".dscr-area").val();
    var enlarge = $(this).siblings(".secret").val();
    action = 0;

  if (descr != "" && descr != null) {
    $(".job-msg").load("includes/jobs_load.inc.php",{
      test : test,
      action : action,
      editid : editid,
      descr : descr
    },function(){
      jobMsg();

      $(".job-list").load("includes/jobs_load.inc.php",{
        test : test,
        enlarge : enlarge
      });
    })
  }
  });

  $(".job-list").on("click", ".ed-req", function(){
    var editid = $(this).siblings("input").val();
    var req = $(this).siblings(".req-area").val();
    var enlarge = $(this).siblings(".secret").val();
    action = 1;

    if (req != "" && req != null) {
      $(".job-msg").load("includes/jobs_load.inc.php",{
        test : test,
        action : action,
        editid : editid,
        req : req
      },function(){
        jobMsg();

        $(".job-list").load("includes/jobs_load.inc.php",{
          test : test,
          enlarge : enlarge
        });

      })
    }

  });




}); // END OF MAIN
