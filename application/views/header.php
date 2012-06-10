<div id="header">
  <div style="padding-left: 20px; padding-top: 25px; font-size: 20px;">
    Sales & Distribution Management System
  </div>
  <ul id="top-navigation">
    <?php
    if($menu == 'home'){
      echo '<li class="active"><span><span>Home</span></span></li>';
    }else{
      echo '<li><span><span><a href="homepage/index">Home</a></span></span></li>';
    }
    if($menu == 'about'){
      echo '<li class="active"><span><span>About Us</span></span></li>';
    }else{
      echo '<li><span><span><a href="homepage/about">About Us</a></span></span></li>';
    }
    if($menu == 'contact'){
      echo '<li class="active"><span><span>Contact Us</span></span></li>';
    }else{
      echo '<li><span><span><a href="homepage/contact">Contact Us</a></span></span></li>';
    }
    if($menu == 'register'){
      echo '<li class="active"><span><span>Register</span></span></li>';
    }
    if($menu == 'complete'){
      echo '<li class="active"><span><span>Complete</span></span></li>';
    }
    ?>
  </ul>
</div>