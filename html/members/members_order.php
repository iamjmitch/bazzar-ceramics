
<?php include '../includes/session.inc';
$link = $_SERVER['QUERY_STRING']; 

if (isset($_SESSION['errors'])){
   $errors = $_SESSION['errors'];}
   
if (isset($errors['missingfields'])){
   $incorrectfields = $errors['incorrectfields'];}


if (!isset($_SESSION['logged_in'])){
   echo '<div id="notlogged">';
   echo '<p>You must be logged in to view this content</p>';
   echo '<a href="javascript:closeThisWindow()"><button>Close This Window</button></a>';
   echo '</div>';
   echo '<script src="../../scripts/formFunctions.js"></script>';}
   else {
      echo '
   
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Order Item</title>
      <link rel="stylesheet" href="../../css/laptop.css">
      <link rel="stylesheet" media="screen and (max-width: 800px) and (min-width:501px)" href="../../css/tablet.css">
      <link rel="stylesheet" media="screen and (max-width: 500px)" href="../../css/mobile.css">
      <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
      <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.min.css" rel="stylesheet"
         crossorigin="anonymous">
      <script src="../../scripts/image-preload.js"></script>
   </head>
   <body>
      <div id="OrderContentContainer">
         <h1 id=title class="tac addTwentyTop orderHeader"></h1>
         <div id="imageContainer">
            <div id="imageTableContent">
               <table id="imageContent"></table>
            </div>
         </div>';
         
         echo '
         <div id="formContent">';
         echo '
            <div id="formWrapper"></div>
            <form  id="form" action="../includes/cart/updateproduct.inc.php" method="post">
               <table id="orderTable">
                  <tr>
                     <th id="descLabel">Product</th>
                     <th id="priceLabel">Price</th>
                     <th id="qtyLabel">Qty</th>
                  </tr>
                  <tr>
                     <td>
                        <div id="orderDescContainer">
                           <p class="bold" id="name"></p>
                           <input type="hidden" id="hiddenItemName" name="hiddenItemName" value="">
                           <p id="itemDesc"></p>
                           <input type="hidden" id="hiddenItemDesc" name="hiddenItemDesc" value="">
                           <input type="hidden" id="hiddenPrice" name="hiddenPrice" value="">
                           <input type="hidden" id="hiddenURL" name="hiddenURL" value="'.$link.'">
                        </div>
                     </td>
                     <td >
                        <p id="price" ></p>
                       
                     </td>
                     <td>
                        <div class="flexbox center">
                           <input type="text" id="qty" name="qty" value="" required>
                           <input type="hidden" id="productID" name="productID" value="">
                        
                        </div>
                     </td>
                  </tr>
                  <tr>
                     <td colspan="2" class="noBorder">
                        <p id="totalOrderLabel" class="tar bold">Order Total:</p>
                     </td>
                     <td >
                        <p id="totalPrice" class="tac"></p>
                     </td>
                  </tr>
               </table>
               <div id="buttonContainer">
                  <button type="button" id="reset">Reset</button>
                  <button type="submit" id="ordersubmit" name="ordersubmit">Add To Cart</button>
                  <button type="button" id="calcButton">Calculate Total</button>
               </div>
            </form>';
            if (isset($errors['incorrectfields'])) {
               echo '<p class="errorRed tac" style="font-size:16px; font-weight:bold; margin-top:10px;">Quantity a number and must be greater than 0</p>';
           }

           echo '

         </div>
         
         <div id="orderFooter">
            <a href="javascript:closeThisWindow()">close</a>
         </div>
      </div>
      <script src="../../scripts/formFunctions.js"></script>
      <!-- Script is loaded at end of body to allow for loading of global variables    -->
   </body>
</html>';}

if (isset($_SESSION['errors'])){
	unset($_SESSION['errors']);
    }
?>