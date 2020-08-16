<?php
include '../includes/session.inc';
require '../includes/connect.inc.php';


$query = "SELECT * FROM product";
$result = mysqli_query($connect_db, $query);
while ($row = mysqli_fetch_array($result)) {
echo  '<div class="catalogueItem"> ';
    if (isset($_SESSION['logged_in'])){echo '<a href="javascript:productLink(\'members_order.php?ID='.$row['ProductID'].'&name='.$row['ProductTitle'].'&desc='.$row['ProductDescription'].'&defaultQty=1&price='.floatval($row['ProductPrice']).'\');">';} 
    echo '<div class="catImgContainer">';
    echo '<img src="../../images/products/smaller/'.$row['ProductID'].'_smaller.jpg" alt="'.$row['ProductID'].'">';
    echo'</div>';
    if (isset($_SESSION['logged_in'])){echo '</a>';} 
    echo '<div class="catStarContainer">
         <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i
         class="fas fa-star"></i><i class="fas fa-star"></i>
         </div>';
    echo '<div class="catNameContainer"><p>'.$row['ProductTitle'].'</p></div>';
    echo '<div class="catPriceContainer"><p>$'.floatval($row['ProductPrice']).'</p></div>';
    echo '<div class="catSizeContainer"><p>'.$row['ProductSize'].'</p></div>';
    echo '<div class="catGlazeContainer"><p>'.$row['ProductGlazeTypeCode'].'</p></div>';
    echo '<div class="catBlurbContainer"><p>'.$row['ProductDescription'].'</p></div>';    
    echo '</div>';
    
}



?>