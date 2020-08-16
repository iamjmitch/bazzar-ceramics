<!-- The entirity of this includes file will be replaced with functions rather than outputting hardcoded html later in development however for now this information is called via multiple web pages and as such an includes file would be beneficial-->


<!-- Break down url to determine which page should be given "active" CSS class -->
<?php
$pageurl = $_SERVER['REQUEST_URI'];
$path = parse_url($pageurl, PHP_URL_PATH);
$breakurl = explode('/', $path);
$page = end($breakurl);
?>

<div class="productPageContainer addFiftyBottom">
    <div id="catalogueContainer">
        <!-- cat item 1  -->
        <div class="catalogueItem">
            <?php if ($page == "members.php"){echo '<a href="javascript:productLink(\'members_order.php?ID=bcpot021&name=Ceramic Teapot&desc=Clasic style tea pot available in a range of colours&defaultQty=1&price=180\');">';}?>
            <!-- Will only return anchor to order page if being called from members.php -->
            <!-- catalogue.php will not be returned this link -->
            <div class="catImgContainer">
                <img src="../../images/products/smaller/bcpot021_smaller.jpg" alt="bcpot021">
                <!-- at this stage, this includes file will not be called from index so $filepath varible not required at this stage. may change as development continues -->
            </div>
            <?php if ($page == "members.php"){echo '</a>';}?>
            <div class="catStarContainer">
                <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i
                    class="fas fa-star"></i><i class="fas fa-star"></i>
            </div>
            <div class="catNameContainer">
                <p>Ceramic Teapot</p>
            </div>
            <div class="catPriceContainer">
                <p>$180</p>
                <p class="priceRed">was $320</p>
            </div>
            <div class="catSizeContainer">
                <p>7cm radius</p>
            </div>
            <div class="catGlazeContainer">
                <p>Matte</p>
            </div>
            <div class="catBlurbContainer">
                <p>Clasic style tea pot available in a range of colours</p>
            </div>
        </div>
        <!-- cat item 2  -->
        <div class="catalogueItem">
            <?php if ($page == "members.php"){echo '<a href="javascript:productLink(\'members_order.php?ID=bcpot002&name=Copper Red Dish&desc=Shallow Copper Red dish form showing distinctive qualities of this traditional reduction
                     fired glaze. Fired to 1300 degrees&defaultQty=1&price=500\');">';}?>
            <div class="catImgContainer">
                <img src="../../images/products/smaller/bcpot002_smaller.jpg" alt="bcpot002">
            </div>
            <?php if ($page == "members.php"){echo '</a>';}?>
            <div class="catStarContainer">
                <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i
                    class="fas fa-star"></i><i class="fas fa-star"></i>
            </div>
            <div class="catNameContainer">
                <p>Copper Red Dish </p>
            </div>
            <div class="catPriceContainer">
                <p>$500</p>
            </div>
            <div class="catSizeContainer">
                <p>50cm diameter</p>
            </div>
            <div class="catGlazeContainer">
                <p>Copper red</p>
            </div>
            <div class="catBlurbContainer">
                <p>Shallow Copper Red dish form showing distinctive qualities of this traditional reduction
                    fired glaze. Fired to 1300 degrees
                </p>
            </div>
        </div>
        <!-- cat item 3  -->
        <div class="catalogueItem">
            <?php if ($page == "members.php"){echo '<a
                     href="javascript:productLink(\'members_order.php?ID=bcpot003&name=Hand painted gold leaf teacup&desc=Teal and gold teacup with a shine finish&defaultQty=1&price=50\');">';}?>
            <div class="catImgContainer">
                <img src="../../images/products/smaller/bcpot003_smaller.jpg" alt="bcpot003">
            </div>
            <?php if ($page == "members.php"){echo '</a>';}?>
            <div class="catStarContainer">
                <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i
                    class="fas fa-star"></i><i class="fas fa-star"></i>
            </div>
            <div class="catNameContainer">
                <p>Hand painted gold leaf teacup</p>
            </div>
            <div class="catPriceContainer">
                <p>$50</p>
                <p class="priceRed">was $100</p>
            </div>
            <div class="catSizeContainer">
                <p>5cm radius</p>
            </div>
            <div class="catGlazeContainer">
                <p>Teal Glaze</p>
            </div>
            <div class="catBlurbContainer">
                <p>Teal and gold teacup with a shine finish</p>
            </div>
        </div>
        <!-- cat item 4  -->
        <div class="catalogueItem">
            <?php if ($page == "members.php"){echo '<a
                     href="javascript:productLink(\'members_order.php?ID=bcpot006&name=Chun Bowl&desc=Blue Chun bowl with tea stain rim over terracotta. Fired to 1300 degrees&defaultQty=1&price=350\');">';}?>
            <div class="catImgContainer">
                <img src="../../images/products/smaller/bcpot006_smaller.jpg" alt="bcpot006">
            </div>
            <?php if ($page == "members.php"){echo '</a>';}?>
            <div class="catStarContainer">
                <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i
                    class="fas fa-star"></i><i class="fas fa-star"></i>
            </div>
            <div class="catNameContainer">
                <p>Chun Bowl</p>
            </div>
            <div class="catPriceContainer">
                <p>$350</p>
            </div>
            <div class="catSizeContainer">
                <p>20cm radius</p>
            </div>
            <div class="catGlazeContainer">
                <p>Chun</p>
            </div>
            <div class="catBlurbContainer">
                <p>Blue Chun bowl with tea stain rim over terracotta. Fired to 1300 degrees</p>
            </div>
        </div>
        <!-- cat item 5  -->
        <div class="catalogueItem">
            <?php if ($page == "members.php"){echo ' <a
                     href="javascript:productLink(\'members_order.php?ID=bcpot008&name=Carnivale cup and saucer&desc=Cup and Saucer with Carnivale design.  Coloured slips under clear glaze.  Earthenware&defaultQty=1&price=150\');">';}?>
            <div class="catImgContainer">
                <img src="../../images/products/smaller/bcpot008_smaller.jpg" alt="bcpot008">
            </div>
            <?php if ($page == "members.php"){echo '</a>';}?>
            <div class="catStarContainer">
                <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i
                    class="fas fa-star"></i><i class="fas fa-star"></i>
            </div>
            <div class="catNameContainer">
                <p>Carnivale cup and saucer </p>
            </div>
            <div class="catPriceContainer">
                <p>$150</p>
            </div>
            <div class="catSizeContainer">
                <p>10cm diameter cup</p>
            </div>
            <div class="catGlazeContainer">
                <p>Slip and clear glaze</p>
            </div>
            <div class="catBlurbContainer">
                <p>Cup and Saucer with Carnivale design. Coloured slips under clear glaze. Earthenware</p>
            </div>
        </div>
        <!-- cat item 6  -->
        <div class="catalogueItem">
            <?php if ($page == "members.php"){echo '<a
                     href="javascript:productLink(\'members_order.php?ID=bcpot009&name=Moonscape bowl&desc=High Calcium bowl with white glaze over blue slip. Fired to 1280 degrees&defaultQty=1&price=320', 'newwindow', 'width=750,height=700\');">';}?>
            <div class="catImgContainer">
                <img src="../../images/products/smaller/bcpot009_smaller.jpg" alt="bcpot009">
            </div>
            <?php if ($page == "members.php"){echo '</a>';}?>
            <div class="catStarContainer">
                <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i
                    class="fas fa-star"></i><i class="fas fa-star"></i>
            </div>
            <div class="catNameContainer">
                <p>Moonscape bowl </p>
            </div>
            <div class="catPriceContainer">
                <p>$320</p>
            </div>
            <div class="catSizeContainer">
                <p>40cm diameter</p>
            </div>
            <div class="catGlazeContainer">
                <p>High calcium</p>
            </div>
            <div class="catBlurbContainer">
                <p>High Calcium bowl with white glaze over blue slip. Fired to 1280 degrees</p>
            </div>
        </div>
        <!-- cat item 7  -->
        <div class="catalogueItem">
            <?php if ($page == "members.php"){echo '<a
                     href="javascript:productLink(\'members_order.php?ID=bcpot010&name=Twin White Vases&desc=Classic style white vases. Sold as a 2 pack&defaultQty=1&price=50\');">';}?>
            <div class="catImgContainer">
                <img src="../../images/products/smaller/bcpot010_smaller.jpg" alt="bcpot010">
            </div>
            <?php if ($page == "members.php"){echo '</a>';}?>
            <div class="catStarContainer">
                <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i
                    class="fas fa-star"></i><i class="fas fa-star"></i>
            </div>
            <div class="catNameContainer">
                <p>Twin White Vases</p>
            </div>
            <div class="catPriceContainer">
                <p>$150</p>
                <p class="priceRed">was $200</p>
            </div>
            <div class="catSizeContainer">
                <p>13cm diameter </p>
            </div>
            <div class="catGlazeContainer">
                <p>White glaze</p>
            </div>
            <div class="catBlurbContainer">
                <p>Classic style white vases. Sold as a 2 pack</p>
            </div>
        </div>
        <!-- cat item 8  -->
        <div class="catalogueItem">
            <?php if ($page == "members.php"){echo '<a
                     href="javascript:productLink(\'members_order.php?ID=bcpot012&name=Rustic white and copper vase&desc=Vase form. White slip over earthenware clay. Fired to 1000 degrees&defaultQty=1&price=500\');">';}?>
            <div class="catImgContainer">
                <img src="../../images/products/smaller/bcpot012_smaller.jpg" alt="bcpot012">
            </div>
            <?php if ($page == "members.php"){echo '</a>';}?>
            <div class="catStarContainer">
                <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i
                    class="fas fa-star"></i><i class="fas fa-star"></i>
            </div>
            <div class="catNameContainer">
                <p>Rustic white and copper vase</p>
            </div>
            <div class="catPriceContainer">
                <p>$500</p>
            </div>
            <div class="catSizeContainer">
                <p>60cm tall</p>
            </div>
            <div class="catGlazeContainer">
                <p>Slip Wear</p>
            </div>
            <div class="catBlurbContainer">
                <p>Vase form. White slip over earthenware clay. Fired to 1000 degrees</p>
            </div>
        </div>
        <!-- cat item 9  -->
        <div class="catalogueItem">
            <?php if ($page == "members.php"){echo '<a
                     href="javascript:productLink(\'members_order.php?ID=bcpot013&name=Crystalline bowl&desc=Blue Green Crystalline glaze. Narrow-foot bowl with clear glaze outside. Fired to 1300
                     degrees&defaultQty=1&price=250\');">';}?>
            <div class="catImgContainer">
                <img src="../../images/products/smaller/bcpot013_smaller.jpg" alt="bcpot013">
            </div>
            <?php if ($page == "members.php"){echo '</a>';}?>
            <div class="catStarContainer">
                <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i
                    class="fas fa-star"></i><i class="fas fa-star"></i>
            </div>
            <div class="catNameContainer">
                <p>Crystalline bowl</p>
            </div>
            <div class="catPriceContainer">
                <p>$250</p>
            </div>
            <div class="catSizeContainer">
                <p>20cm diameter</p>
            </div>
            <div class="catGlazeContainer">
                <p>Blue Green Crystalline</p>
            </div>
            <div class="catBlurbContainer">
                <p>Blue Green Crystalline glaze. Narrow-foot bowl with clear glaze outside. Fired to 1300
                    degrees
                </p>
            </div>
        </div>
        <!-- cat item 10  -->
        <div class="catalogueItem">
            <?php if ($page == "members.php"){echo '<a
                     href="javascript:productLink(\'members_order.php?ID=bcpot014&name=Carved vase form 001&desc=Carved Iron stoneware vase form. Oxidation lustre on rim. Fired to 1280 degrees&defaultQty=1&price=450\');">';}?>
            <div class="catImgContainer">
                <img src="../../images/products/smaller/bcpot014_smaller.jpg" alt="bcpot014">
            </div>
            <?php if ($page == "members.php"){echo '</a>';}?>
            <div class="catStarContainer">
                <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i
                    class="fas fa-star"></i><i class="fas fa-star"></i>
            </div>
            <div class="catNameContainer">
                <p>Carved vase form 001</p>
            </div>
            <div class="catPriceContainer">
                <p>$450</p>
            </div>
            <div class="catSizeContainer">
                <p>40cm diameter</p>
            </div>
            <div class="catGlazeContainer">
                <p>Iron stoneware and lustre</p>
            </div>
            <div class="catBlurbContainer">
                <p>Carved Iron stoneware vase form. Oxidation lustre on rim. Fired to 1280 degrees</p>
            </div>
        </div>
        <!-- cat item 11  -->
        <div class="catalogueItem">
            <?php if ($page == "members.php"){echo '<a
                     href="javascript:productLink(\'members_order.php?ID=bcpot016&name=Carved vase form 002&desc=Carved dry matt calcium vase form. Fired to 1280 degrees&defaultQty=1&price=450\');">';}?>
            <div class="catImgContainer">
                <img src="../../images/products/smaller/bcpot016_smaller.jpg" alt="bcpot016">
            </div>
            <?php if ($page == "members.php"){echo '</a>';}?>
            <div class="catStarContainer">
                <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i
                    class="fas fa-star"></i><i class="fas fa-star"></i>
            </div>
            <div class="catNameContainer">
                <p>Carved vase form 002</p>
            </div>
            <div class="catPriceContainer">
                <p>$450</p>
            </div>
            <div class="catSizeContainer">
                <p>40cm diameter</p>
            </div>
            <div class="catGlazeContainer">
                <p>Dry Matt Calcium</p>
            </div>
            <div class="catBlurbContainer">
                <p>Carved dry matt calcium vase form. Fired to 1280 degrees</p>
            </div>
        </div>
        <!-- cat item 12  -->
        <div class="catalogueItem">
            <?php if ($page == "members.php"){echo '<a href="javascript:productLink(\'members_order.php?ID=bcpot018&name=Carved bottle form&desc=Carved dry matt calcium bottle form. Lustre rim. Fired to 1280 degrees&defaultQty=1&price=600\');">';}?>
            <div class="catImgContainer">
                <img src="../../images/products/smaller/bcpot018_smaller.jpg" alt="bcpot018">
            </div>
            <?php if ($page == "members.php"){echo '</a>';}?>
            <div class="catStarContainer">
                <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i
                    class="fas fa-star"></i><i class="fas fa-star"></i>
            </div>
            <div class="catNameContainer">
                <p>Carved bottle form </p>
            </div>
            <div class="catPriceContainer">
                <p>$600</p>
            </div>
            <div class="catSizeContainer">
                <p>60cm diameter</p>
            </div>
            <div class="catGlazeContainer">
                <p>Dry Matt Calcium</p>
            </div>
            <div class="catBlurbContainer">
                <p>Carved dry matt calcium bottle form. Lustre rim. Fired to 1280 degrees</p>
            </div>
        </div>
    </div>
</div>

<script>
console.log('product list called successfully from .inc file')</script>
<!-- For testing only, will be removed in final product -->