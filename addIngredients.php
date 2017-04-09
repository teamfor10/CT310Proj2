<!-- Includes -->
<?php
$loginPage = FALSE;
$helpPage = FALSE;
require_once "inc/page_setup.php";
if (!$dbh = setupDB()) {die;}
include 'inc/header.php';

$ingName = $fileName = $price = $description = $attributes ='';

if(isset($_POST["submitfrm"])){
    $ingName = $_POST['ingName']; 
    $fileName = $_POST['fileName'];
    $price = $_POST['price']; 
    $description = $_POST['description'];
    $attributes = $_POST['attributes'];

    upload($ingName, $fileName, $price, $description, $attributes);
    
}

?>

<div id="addIngForm">
    <h2 align="center">Add Ingredients</h2>
    <form name='input' action="#" method='post' id="formInput" align="center"> 

        <input id="formBox" type='text' value='<?php echo $ingName; ?>' id='ingName' name='ingName' placeholder='Enter Ingredient Name'/>
        <br/>

        <input id="formBox" type='text' value='<?php echo $fileName; ?>' id='fileName' name='fileName' placeholder='Enter File Name'/>
        <br/>

        <input id="formBox" type='text' value='<?php echo $price; ?>' id='price' name='price' placeholder='Enter Price'/>
        <br/>

        <textarea value='<?php echo $description; ?>' style="margin-top: 25px; margin-left: 50px;" rows="4" cols="50" id="formInput" name="description" placeholder='Enter description'></textarea>
        <br/>
        
        <textarea  value='<?php echo $attributes; ?>' style="margin-top: 25px; margin-left: 50px;" rows="4" cols="50" id="formInput" name="attributes" placeholder='Enter Attributes'></textarea>
        <br/>

        <input type='submit' value='submitfrm' name='submitfrm' class="Submit Form" />

    </form>
    

</div>

<?php include 'inc/footer.php'; 