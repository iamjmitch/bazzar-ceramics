


<!-- Get file location from within server to allow for correct anchors -->
<?php $currentpage = $_SERVER['REQUEST_URI'];
$filepath = "";
// Break down url to determine which page should be given "active" CSS class
$pageurl = $_SERVER['REQUEST_URI'];
$path = parse_url($pageurl, PHP_URL_PATH);
$breakurl = explode('/', $path);
$page = end($breakurl);

if ($page == "" || $page == "index.php"){
    $filepath = "./";
 }
 else {
    $filepath = "../../";

 
 }
?>


<!-- Variable/functions use explained at first use of each. -->

<nav>
    <div id="naviBar" class="naviBar">
        <a href="<?php echo $filepath;?>" class="smallDevOnly">
        <!-- $filepath used to set the correct anchor location based on how far from root dir -->
        <img src="<?php echo $filepath;?>images/global/logo_small.png" alt="Bazaar Ceramics Logo"></a>
        <a href="<?php echo $filepath;?>"
            class="<?php if ($page == "index.php" || $page == ""){echo 'active';}?>">Home</a> 
            <!-- PHP code in this style is used to dertimine if this class needs to be given "active" state -->
        <div class="dropdown">
            <button
                class="btndrop <?php if ($page == "catalogue.php" || $page == "onsale.php" || $page == "topsellers.php" || $page == "categories.php"){echo 'active';}?>">Products
                <!-- above PHP code allows for parent dropdown button to be "active" if any children anchors are "active" -->
                <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdowncontent ">
                <a href="<?php echo $filepath;?>html/catalogue/catalogue.php"
                    class="<?php if ($page == "catalogue.php"){echo 'active';}?>">Catalogue</a>
                <a href="<?php echo $filepath;?>html/catalogue/onsale.php"
                    class="<?php if ($page == "onsale.php"){echo 'active';}?>">On Sale</a>
                <a href="<?php echo $filepath;?>html/catalogue/topsellers.php"
                    class="<?php if ($page == "topsellers.php"){echo 'active';}?>">Top Sellers</a>
                <a href="<?php echo $filepath;?>html/catalogue/categories.php"
                    class="<?php if ($page == "categories.php"){echo 'active';}?>">Categories</a>
            </div>
        </div>
        <a href="<?php echo $filepath;?>html/order/order.php"
            class="<?php if ($page == "order.php"){echo 'active';}?>">Order</a>
        <div class="dropdown">
            <button
                class="btndrop <?php if ($page == "company_bg.php" || $page == "news.php" || $page == "mission_statement.php" || $page == "design.php" || $page == "production.php" || $page == "products.php"){echo 'active';}?>">About
                Us
                <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdowncontent">
                <a href="<?php echo $filepath;?>html/about/company_bg.php"
                    class="<?php if ($page == "company_bg.php"){echo 'active';}?>">Company Background</a>
                <a href="<?php echo $filepath;?>html/about/news.php"
                    class="<?php if ($page == "news.php"){echo 'active';}?>">News</a>
                <a href="<?php echo $filepath;?>html/about/mission_statement.php"
                    class="<?php if ($page == "mission_statement.php"){echo 'active';}?>">Mission Statement</a>
                <a href="<?php echo $filepath;?>html/about/design.php"
                    class="<?php if ($page == "design.php"){echo 'active';}?>">The Design Process</a>
                <a href="<?php echo $filepath;?>html/about/production.php"
                    class="<?php if ($page == "production.php"){echo 'active';}?>">The Production Process</a>
                <a href="<?php echo $filepath;?>html/about/products.php"
                    class="<?php if ($page == "products.php"){echo 'active';}?>">Products</a>
            </div>
        </div>
        <div class="dropdown ">
            <button
                class="btndrop <?php if ($page == "faq.php" || $page == "shipping.php" || $page == "care.php"){echo 'active';}?>">Info
                <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdowncontent">
                <a href="<?php echo $filepath;?>html/faq/faq.php"
                    class="<?php if ($page == "faq.php"){echo 'active';}?>">FAQ</a>
                <a href="<?php echo $filepath;?>html/faq/shipping.php"
                    class="<?php if ($page == "shipping.php"){echo 'active';}?>">Shipping Process</a>
                <a href="<?php echo $filepath;?>html/faq/care.php"
                    class="<?php if ($page == "care.php"){echo 'active';}?>">Care Tips</a>
            </div>
        </div>
        <a href="<?php echo $filepath;?>html/contact/contact-us.php"
            class="<?php if ($page == "contact-us.php"){echo 'active';}?>">Contact Us</a>
        <div class="dropdown">
            <button class="btndrop <?php if ($page == "members.php" || $page == "login.php" || $page == "signup.php" || $page == "cart.php"){echo 'active';}?>">Members
                <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdowncontent">
                <?php
                if (!isset($_SESSION['logged_in'])){
                    if ($page == "login.php"){
                        echo '<a class="active" href="'.$filepath.'html/members/login.php">Login</a>';}
                    else{
                        echo '<a  href="'.$filepath.'html/members/login.php">Login</a>';
                        }
                    if ($page == "signup.php"){
                        echo '<a class="active" href="'.$filepath.'html/members/signup.php">Sign-up</a>';}
                    else{
                        echo '<a href="'.$filepath.'html/members/signup.php">Sign-up</a>';
                            }
                                        
                }
                if (isset($_SESSION['logged_in'])){
                    if ($page == "members.php"){
                        echo '<a class="active" href="'.$filepath.'html/members/members.php">Member\'s Area</a>';}
                    else{
                        echo '<a href="'.$filepath.'html/members/members.php">Member\'s Area</a>';
                            }     
                            
                     if ($page == "cart.php"){
                         echo '<a class="active" href="'.$filepath.'html/members/cart.php">Shopping Cart</a>';}
                    else{
                         echo '<a href="'.$filepath.'html/members/cart.php">Shopping Cart</a>';
                            } 
                    echo '<a href="'.$filepath.'html/includes/logout.php">Logout</a>';
                    
                }?>
            </div>
        </div>
        <a href="javascript:void(0);" class="icon" onclick="navigation()">&#9776;</a>
        <div class="searchcontainer">
            <form action="/action_page.php">
                <input type="text" placeholder="Search.." name="search">
                <button type="submit"><i class="fa fa-search"></i></button>
            </form>
        </div>
    </div>
</nav>



<script>
console.log('navbar called successfully from .inc file')</script>
<!-- For testing only, will be removed in final product -->