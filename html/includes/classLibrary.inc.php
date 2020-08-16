<?php
require_once 'newdbh.inc.php';
include 'session.inc';




class cart extends db {
    // function to get the order id of the latest order
    protected function getNewestOrder() {
        $custid = $_SESSION['custid'];
        $query = "SELECT * FROM customer WHERE CustomerID = $custid";
        $result = $this->connect()->query($query);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            if ($row['CustomerAccountFlag'] == true) { //if customer has an unfinished order
                $query = "SELECT MAX(OrderID) FROM orders WHERE CustomerID = $custid";
                $result = $this->connect()->query($query);
                $row = $result->fetch_assoc();
                $newestOrderNumber = $row['MAX(OrderID)'];
                $_SESSION['currentOrder'] = $newestOrderNumber;
                return $newestOrderNumber;
            } else {
                return false; //customer doesnt have unfinished order
                
            }
        }
    }
    
    // public handler for getNewestOrder() and WILL return the ordernumber to the calling function
    public function getOrderNumber() {
        $ordernum = $this->getNewestOrder();
        return $ordernum;
    }
    
    // public handler for getNewestOrder() and will NOT return the order number to the calling function. Will only set to $_SESSION
    public function setOrderNumber() {
        $ordernum = $this->getNewestOrder();
        $ordernum;
    }
    
    // function to get contents of cart
    protected function getCartContents() {
        $newestOrderNumber = $this->getOrderNumber();
        if ($newestOrderNumber !== false) {
            $query = "SELECT * FROM orderline WHERE OrderID = $newestOrderNumber";
            $result = $this->connect()->query($query);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $cartContents[] = $row;
                }
            } else {
                $cartContents = [];
            }
            return $cartContents;
        } else {
            return false;
        }
    }
    //public handler to get the number of items in cart.
    public function getCartCount() {
        if (isset($_SESSION['custid'])) {
            if ($this->getCartContents() == false OR empty($this->getCartContents())) {
                return "0";
            } else {
                $count = count($this->getCartContents());
                return $count;
            }
        } else { //error handler incase custid isnt set to $_SESSION during login. Should not be needed but used as failsafe
            header("Location: ../members/login.php");
        }
    }
    public function getCart() {
        return $this->getCartContents();
    }
    
    // public handler to dipslay the cart contents on the cart.php page
    public function showCartContents() {
        $cart = $this->getCartContents();
        if (isset($_SESSION['errors'])) {
            $errors = $_SESSION['errors']['incorrectfields'];
        }
        if (!$cart) {
            echo '<div class="cartContainer">
            <p>Oh, Your Cart Is Empty!</p>
            <a href="members.php"><div class="shopNowButton tac"><p>Shop Now!</p></div></a>
            </div>';
        } else {
            $totalOrder = 0;
            echo '<form action="../members/orderComplete.php" method="post" target="_blank" onsubmit="javascript: reload();">';
            foreach ($cart as $items) {
                $item = $this->getProductInfo($items['ProductID']);
                $total = $items['OrderQuantity'] * $item['ProductPrice'];
                echo '<div class="cartItem">';
                echo '<div class="tabletcontainer">';
                echo '<div class="cartItemPic">';
                echo "<img src='../../images/products/smaller/" . $item['ProductID'] . "_smaller.jpg'>";
                echo '</div>';
                echo '<div class="cartItemInfo">';
                echo '<p class="cartHeading">' . $item['ProductTitle'] . '</p>';
                echo '<p class="itemCode"><b>Item#: </b> ' . $item['ProductID'] . '</p>';
                echo '<p class="itemDesc">' . $item['ProductDescription'] . '</p>';
                echo '</div>';
                echo '</div>';
                echo '<div class="cartItemRight">';
                echo '<div class="cartItemTop">';
                echo '<div class="cartItemPrice">';
                echo '<p class="itemPrice">$' . floatval($item['ProductPrice']) . '</p>';
                echo '<p class="cartLittle">Unit</p>';
                echo '</div>';
                echo '<div class="cartItemQty">';
                echo '<input type="number" name="' . $item['ProductID'] . '"id="' . $item['ProductID'] . '" value=' . $items['OrderQuantity'] . '>';
                if (isset($errors[$item['ProductID']])) {
                    echo '<p class="errorRed">Invalid</p>';
                }
                echo '<p class="cartLittle">Quantity</p>';
                echo '</div>';
                echo '<div class="cartItemDelete">';
                echo '<a href="../includes/cart/deleteproduct.inc.php?productID=' . $item['ProductID'] . '">&#10006</a>';
                echo '</div>';
                echo '</div>';
                echo '<div class="cartItemTotalPrice">';
                echo '<p class="itemPrice">Item Total: $' . number_format($total) . '</p>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
                $totalOrder = $totalOrder + $total;
                unset($_SESSION['errors']); //clear error array
                
            }
            echo '<div class="checkoutOptions">';
            echo '<div class="checkoutTotal">';
            echo '<input type="submit" value="Update Cart" formaction="../includes/cart/update.php" formtarget="_self">';
            echo '<p>Order Total: $' . number_format($totalOrder) . '</p>';
            echo '</div>';
            echo '<div class="checkoutButtons">';
            echo '<input type="submit" value="Delete Cart" formaction="../includes/cart/deletecart.php" formtarget="_self">';
            echo '<input type="submit" value="Keep Shopping" formaction="../members/members.php" formtarget="_self">';
            echo '<input type="submit" value="Checkout"';
            echo '</div>';
            echo '</div>';
            echo '</form>';
        }
    }
    
    // function to output contents of confirmation page
    public function confirmOrder() {
        $cart = $this->getCartContents();
        $customer = new User;
        $custInfo = $customer->userDetails();
        $date = date('d-m-Y');
        $totalOrder = 0;
        echo '<div class="orderConfirmCompanyLogo">
        <img src="../../images/global/logo.png" alt="Logo">
        <H3>Order Confirmation</H3>
        </div>';
        echo '<div class="orderConfirmHeadingContainer">
        <div class="orderConfirmCompany">        
        <div class="orderConfirmCompanyInfo">';
        echo '<p><b>Date:</b> ' . $date . '</p>';
        echo '<p><b>Order#: </b>' . $_SESSION['currentOrder'] . '</p>';
        echo '
        <p><b>Bazaar Ceramics</b> <br>
        123 Fake Street <br>
        SomeTown NSW<br>
        Australia<br>
        4000<br>
        PH: (01) 2345 6789<br>
        E: help@bazaarceramics.com</p>
        </div>
        </div>';
        echo '<div class="OrderConfirmUser">';
        echo '<p><b>Billed to:</b><br>';
        echo $custInfo['CustomerGivenName'] . ' ' . $custInfo['CustomerLastName'] . '<br>';
        echo $custInfo['CustomerAddress'] . '<br>';
        echo $custInfo['CustomerSuburb'] . '<br>';
        echo $custInfo['CustomerState'] . ' ' . $custInfo['CustomerPostCode'] . '<br>';
        echo $custInfo['CustomerCountry'] . '<br>';
        echo 'PH: ' . $custInfo['CustomerPhoneNumber'] . '<br>';
        echo 'E: ' . $custInfo['CustomerEmail'] . '<br>';
        echo '</div>';
        echo '</div>';
        foreach ($cart as $items) {
            $item = $this->getProductInfo($items['ProductID']);
            $total = $items['OrderQuantity'] * $item['ProductPrice'];
            echo '<div class="cartItem">';
            echo '<div class="cartItemPic">';
            echo "<img src='../../images/products/smaller/" . $item['ProductID'] . "_smaller.jpg'>";
            echo '</div>';
            echo '<div class="cartItemInfo">';
            echo '<p class="cartHeading">' . $item['ProductTitle'] . '</p>';
            echo '<p class="itemCode"><b>Item#: </b> ' . $item['ProductID'] . '</p>';
            echo '<p class="itemDesc">' . $item['ProductDescription'] . '</p>';
            echo '</div>';
            echo '<div class="cartItemRight">';
            echo '<div class="cartItemTop">';
            echo '<div class="cartItemPrice">';
            echo '<p class="itemPrice">$' . floatval($item['ProductPrice']) . '</p>';
            echo '<p class="cartLittle">Unit</p>';
            echo '</div>';
            echo '<div class="cartItemQty">';
            echo '<p class="itemPrice">' . $items['OrderQuantity'] . '</p>';
            echo '<p class="cartLittle">Quantity</p>';
            echo '</div>';
            echo '<div class="cartItemPrice">';
            echo '<p class="itemPrice">$' . number_format($total) . '</p>';
            echo '<p class="cartLittle">Line Total</p>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            $totalOrder = $totalOrder + $total;
        }
        echo '<div class="checkoutOptions">';
        echo '<div class="checkoutTotal">';
        echo '<p>Order Total: $' . number_format($totalOrder) . '</p>';
        echo '</div>';
        echo '<div class="checkoutButtons">';
        echo '<button onclick="pay()">Pay Now</button>';
        echo '</div>';
        echo '</div>';
        echo '<script>
            function pay() {
              alert("Thanks For Ordering With Bazaar Ceramics");
              self.close()
            }
            </script>';
    }
    
    //function to retrieve product info from DB
    protected function getProductInfo($productID) {
        $prod = "'" . $productID . "'"; //below query returns false unless appended to string
        $query = "SELECT * FROM product WHERE ProductID = $prod";
        $result = $this->connect()->query($query);
        while ($row = $result->fetch_assoc()) {
            $productInfo = $row;
        }
        return $productInfo;
    }
}











// class that controls updating of cart values
class cartUpdate extends db {
    
    // function to change (update qty or delete) an existing item in cart
    protected function change($productID, $qty) {
        $productID = $this->convert($productID);
        $ordernum = $_SESSION['currentOrder'];
        if ($qty > 0) {
            //gets existing order qty to add to new qty
            $query = "SELECT * FROM orderline WHERE OrderID = $ordernum AND ProductID = $productID";
            $result = $this->connect()->query($query);
            $row = $result->fetch_assoc();
            $current = $row['OrderQuantity'];
            $new = $current + $qty;
            //Updates qty to new qty
            $query = "UPDATE orderline SET OrderQuantity = $new WHERE OrderID = $ordernum AND ProductID = $productID";
            $result = $this->connect()->query($query);
            $result;
        } else {
            //Deletes order line if new qty is zero
            $query = "DELETE FROM orderline WHERE OrderID = $ordernum AND ProductID = $productID";
            $result = $this->connect()->query($query);
            $result;
        }
    }
    
    //function to add item to orderline
    protected function add($productID, $qty) {
        if (!isset($_SESSION['currentOrder'])) {
            $i = new cart;
            $i->setOrderNumber;
        }
        if ($qty > 0) {
            $productID = $this->convert($productID);
            $ordernum = $_SESSION['currentOrder'];
            $query = "INSERT INTO orderline (OrderID, ProductID, OrderQuantity) VALUES ($ordernum, $productID, $qty)";
            $result = $this->connect()->query($query);
            $result;
        }
    }
    
    protected function convert($i) {
        $out = "'" . $i . "'";
        return $out;
    }
    
    protected function override($productID, $qty) {
        $productID = $this->convert($productID);
        $ordernum = $_SESSION['currentOrder'];
        if ($qty > 0) {
            //gets existing order qty to add to new qty
            $query = "SELECT * FROM orderline WHERE OrderID = $ordernum AND ProductID = $productID";
            $result = $this->connect()->query($query);
            $row = $result->fetch_assoc();
            //Updates qty to new qty
            $query = "UPDATE orderline SET OrderQuantity = $qty WHERE OrderID = $ordernum AND ProductID = $productID";
            $result = $this->connect()->query($query);
            $result;
        } else {
            //Deletes order line if new qty is zero
            $query = "DELETE FROM orderline WHERE OrderID = $ordernum AND ProductID = $productID";
            $result = $this->connect()->query($query);
            $result;
        }
    }
    
    protected function exists($productID, $qty) {
        $productID = $this->convert($productID);
        if (!isset($_SESSION['currentOrder'])) {
            $i = new cart;
            $i->setOrderNumber();
        }
        $ordernum = $_SESSION['currentOrder'];
        $query = "SELECT * FROM orderline WHERE OrderID = $ordernum AND ProductID = $productID";
        $result = $this->connect()->query($query);
        if ($result->num_rows > 0) {
            return true;
        } else {
            return false;
        }
    }
    
    protected function delete() {
        $ordernum = $_SESSION['currentOrder'];
        //delete all in orderline table
        $query = "DELETE FROM orderline WHERE OrderID = $ordernum";
        $result = $this->connect()->query($query);
        $result;
        //delete order from order table
        $query = "DELETE FROM orders WHERE OrderID = $ordernum";
        $result = $this->connect()->query($query);
        $result;
        //switch account flag back to false
        $toggle = new userUpdate;
        $toggle->flagToggle();
        unset($_SESSION['currentOrder']);
    }
    
    public function deleteCart() {
        $this->delete();
    }
    
    public function batchUpdate($productID, $qty) {
        $this->override($productID, $qty);
    }
    public function update($productID, $qty) {
        if (!isset($_SESSION['currentOrder'])) {
            $temp = new cart;
            $update = $temp->setOrderNumber();
            if ($update == false) {
                $add = new cartCreate;
                $add->create();
            }
        }
        $exists = $this->exists($productID, $qty);
        if ($exists == true) {
            $this->change($productID, $qty);
        } else {
            $this->add($productID, $qty);
        }
    }
}












class cartCreate extends db {
    protected function createNewOrderNum() {
        $custid = $_SESSION['custid'];
        $query = "INSERT INTO orders (CustomerID, OrderDate) VALUES ($custid, DATE(NOW()))";
        $this->connect()->query($query);
        $i = new cart;
        $i->getOrderNumber();
    }
    
    public function create() {
        $this->createNewOrderNum();
        $toggle = new userUpdate;
        $toggle->flagToggle();
    }
}












class userUpdate extends db {
    protected function flagOn() {
        $custid = $_SESSION['custid'];
        $query = "UPDATE customer SET CustomerAccountFlag = 1 WHERE CustomerID = $custid";
        $result = $this->connect()->query($query);
        $result;
    }
    
    protected function flagOff() {
        $custid = $_SESSION['custid'];
        $query = "UPDATE customer SET CustomerAccountFlag = 0 WHERE CustomerID = $custid";
        $result = $this->connect()->query($query);
        $result;
    }
    
    protected function getFlag() {
        $custid = $_SESSION['custid'];
        $query = "SELECT CustomerAccountFlag FROM customer WHERE CustomerID = $custid";
        $result = $this->connect()->query($query);
        return $result->fetch_assoc();
    }
    
    public function flagToggle() {
        $status = $this->getFlag();
        if ($status['CustomerAccountFlag'] == true) {
            $action = $this->flagOff();
            unset($_SESSION['currentOrder']);
            $action;
        } else {
            $action = $this->flagOn();
            $action;
        }
    }
}











class product extends db {
    //protected function to return product details from DB
    protected function check($productID) {
        $query = "SELECT * FROM product WHERE ProductID = $productID";
        $result = $this->connect()->query($query);
        while ($row = $result->fetch_assoc()) {
            $productinfo[] = $row;
        }
        return $productinfo;
    }
    
    // public function to handle check()
    public function getProductDetails($productID) {
        $result = $this->check($productID);
        return $result;
    }
    
    //protected function to check if product exists inside DB
    protected function checkExists($productID) {
        $query = "SELECT * FROM product WHERE ProductID = '" . $productID . "'";
        $result = $this->connect()->query($query);
        if ($result->num_rows > 0) {
            return true;
        } else {
            return false;
        }
    }
    
    //public funtion handler for checkExists()
    public function checkProd($productID) {
        return $this->checkExists($productID);
    }
}











class user extends db {
    // protected function to retreive customer details
    protected function getUserDetails() {
        $custid = $_SESSION['custid'];
        $query = "SELECT * FROM customer WHERE CustomerID = $custid";
        $result = $this->connect()->query($query);
        while ($row = $result->fetch_assoc()) {
            $customer[] = $row;
        }
        return $customer[0];
    }
    
    //public handler for getUserDetails()
    public function userDetails() {
        return $this->getUserDetails();;
    }
}
?>