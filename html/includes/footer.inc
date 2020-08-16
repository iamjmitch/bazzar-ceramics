<!-- Get file location from within server to allow for correct anchors -->
<?php $currentpage = $_SERVER['REQUEST_URI'];
$filepath = "";
if ($currentpage == "/" || $currentpage == "index.php"){
   $filepath = "./";
}
else {
   $filepath = "../../";

}
?>

<div class="PageContainer">
   <div class="flexbox center addFiftyTop">
      <div id="footerBlurb">
         <h5>Bazaar Ceramics</h5>
         <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus eu justo ornare, ornare
            ante vel, blandit est. Curabitur tincidunt felis rutrum, interdum
         </p>
      </div>
      <div id="footerLinkContainer" class="center">
         <div id="footerLinks">
            <h5>Links</h5>
            <a href="<?php echo $filepath;?>">Home</a>
            <a href="<?php echo $filepath;?>html/catalogue/catalogue.php">Catalogue</a>
            <a href="<?php echo $filepath;?>html/order/order.php">Order</a>
            <a href="<?php echo $filepath;?>html/about/company_bg.php">About Us</a>
            <a href="<?php echo $filepath;?>html/faq/faq.php">FAQ</a>
            <a href="<?php echo $filepath;?>html/contact/contact-us.php">Contact Us</a>
            <a href="<?php echo $filepath;?>html/members/login.php">Login</a>'
            <!-- $filepath used to set the correct anchor location based on how far from root dir -->

         </div>
      </div>
      <div id="footerSocialContainer">
         <h5>Follow Us</h5>
         <div id="footerSocial" class="center">
            <i class="fab fa-facebook-square"></i>
            <i class="fab fa-twitter-square"></i>
            <i class="fab fa-youtube-square"></i>
         </div>
      </div>
      <div id="footerSubContainer">
         <h5>Want Frequent Updates?</h5>
         <div id="footerSub">
            <form id="sub" class="center" action="#">
               <input type="text" placeholder="Email Address">
               <button type="submit">Subscribe</button>
            </form>
         </div>
      </div>
   </div>
   <p class="tac addTwentyTop addTwentyBottom white copy">Copyright &copy; 2019 - Bazaar Ceramics | <a
         href="./html/legal/privacy.php" id="privacyPol">Privacy Policy</a> <br><br>Coded by
      James Mitchell For TAFE NSW
   </p>
</div>

<script>
console.log('footer called successfully from .inc file')</script>
<!-- For testing only, will be removed in final product -->