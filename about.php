<?php
include 'includes/header.inc.php';
 ?>
<link rel="stylesheet" href="css/about.css">
<div class="btns_ab">
  <button type="button" name="button" onclick="change(this.value)" value = "0">Our History</button>
  <button type="button" name="button" onclick="change(this.value)" value = "1">Our Mission</button>
  <button type="button" name="button" onclick="change(this.value)" value = "2">Community</button>
</div>

<div class="info-divs">
  <h1>Our History</h1>
  <p>An idea started back in 1945 when the proud owner of a small sho decided to
  make a food chain. Now it spans over a large newtwork Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed accumsan ante id nulla sagittis cursus. Curabitur hendrerit lorem quis nulla condimentum fringilla. Suspendisse id mauris id nibh feugiat bibendum nec vitae velit. Morbi et ex in ligula tristique rhoncus. In sit amet elit ac erat euismod egestas laoreet id justo. Ut ac aliquet elit. Donec cursus quam lacus, sed mattis dui malesuada et. Curabitur tempus sem nec consequat eleifend. Praesent interdum mi sed magna pellentesque, nec eleifend mi tincidunt. Maecenas non rutrum odio. In vitae imperdiet sapien, sed lacinia enim. Maecenas eget ipsum a eros tincidunt sollicitudin.Aliquam placerat dictum gravida. Aenean volutpat accumsan odio, sit amet tempus massa blandit sit amet. Etiam sed dapibus ante, vitae convallis nisi. Donec ultricies semper felis, in elementum felis vestibulum id. Phasellus vel sagittis orci, ut eleifend nibh. Nunc maximus venenatis mi venenatis rhoncus. In nunc mauris, luctus sit amet consectetur commodo, porttitor ac metus. Interdum et malesuada fames ac ante ipsum primis in faucibus. In rhoncus consectetur metus eu aliquam.
  </p>

</div>
<div class="info-divs">
  <h1>Our Mission</h1>
  <p>
    Our mission is to serve great food to everyone.
    To value our customers for who they areMauris eget risus urna. Phasellus tristique nisl vitae quam fermentum, nec maximus arcu dignissim. Quisque consectetur ac ante a posuere. Ut sodales sit amet nibh nec laoreet. Etiam tristique nibh ut velit maximus blandit. Pellentesque tincidunt mi quis justo varius, id posuere quam blandit. Etiam dictum bibendum diam in efficitur. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nam tristique mattis tempor. Morbi fermentum sapien velit, sit amet efficitur eros laoreet sed. Proin ut rutrum diam, id placerat tortor. Nullam consectetur elit vel sapien aliquet, at gravida diam maximus.
  </p>

</div>
<div class="info-divs">
  <h1>Community</h1>
  <p>
    Praesent rutrum orci vel odio pellentesque, ut pellentesque magna vestibulum. Ut porta leo et ultricies vehicula. Sed mollis enim ligula, a scelerisque augue vehicula at. Ut sollicitudin, eros id venenatis dignissim, diam ipsum lacinia sapien, a pulvinar felis ipsum sed elit. Duis non sollicitudin libero. Quisque ac hendrerit enim, lacinia tincidunt dui. Etiam ac urna lectus. Nullam a ante iaculis, blandit tortor vitae, efficitur massa. Cras pellentesque luctus nunc, non ornare quam rutrum ac. Fusce rutrum mauris vel est rhoncus varius. Aenean ac nibh at tortor congue egestas. Aenean imperdiet nibh et nibh finibus vehicula.
</p>
  <p>Donec leo felis, vehicula vitae dui non, pellentesque molestie augue. Fusce at nisi sed lacus fringilla rhoncus. Morbi est diam, interdum eu egestas vitae, sodales a lacus. Morbi non nunc nec nisl consectetur faucibus. Proin gravida, odio ut tempus dictum, neque libero tristique risus, at aliquet nunc tortor in sapien. Sed posuere auctor nunc, et congue mi. Etiam vulputate purus at facilisis suscipit. Sed scelerisque auctor faucibus. Vivamus rutrum ligula in porta lacinia. Morbi quis cursus odio.
  </p>
  <p>

  Mauris convallis, tortor in porttitor faucibus, augue sem mollis nisl, ac pretium nunc velit eu turpis. Suspendisse velit ipsum, malesuada eget augue fermentum, tempor volutpat massa. Ut auctor diam tellus, quis scelerisque nunc condimentum sit amet. Quisque dignissim, odio sit amet viverra facilisis, nulla nulla pretium nibh, in lobortis massa nulla et ex. Fusce at libero felis. Cras at euismod mauris, vel feugiat massa. Suspendisse vel aliquet turpis, nec aliquet erat.
    </p>
</div>


<script type="text/javascript">
  var divs = document.getElementsByClassName('info-divs');
  (function(){
    divs[0].style.display = "block";
  })();


  function change(val){
    for (var i = 0; i < divs.length; i++) {
      divs[i].style.display = "none";
    }
    divs[val].style.display = "block";


  }


</script>

<?php
include 'includes/footer.inc.html';
?>
