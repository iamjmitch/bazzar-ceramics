<?php $currentpage = $_SERVER['REQUEST_URI'];
$filepath2 = "";
// Break down url to determine which page should be given "active" CSS class
$pageurl = $_SERVER['REQUEST_URI'];
$path = parse_url($pageurl, PHP_URL_PATH);
$breakurl = explode('/', $path);
$page = end($breakurl);

if ($page == "" || $page == "index.php"){
    $filepath2 = "./";
  
 }
 else {
    $filepath2 = "../../";


 
 }
?>

<div id="logo">
    <a href="<?php echo $filepath2;?>index.php"><img src="<?php echo $filepath2;?>images/global/logo.png"
            alt="Bazaar Ceramics Logo"></a>
</div>
<?php
//check if session variable is set
if (isset($_SESSION['fname'])){
$fname = $_SESSION['fname'];
echo '<div class="welcomemessage PageContainer"><p>Welcome back, '.$fname.'</p> <p class="pink">|</p>  <a href="'.$filepath2.'html/includes/logout.php">Logout</a></div>';
}



?>

<script>
console.log('logo called successfully from .inc file')</script>
<!-- For testing only, will be removed in final product -->