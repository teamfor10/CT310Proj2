<!-- Includes -->
<?php
$loginPage = FALSE;
$helpPage = FALSE;
include "inc/page_setup.php";
if (!$dbh = setupDB()) {die;}
include 'inc/header.php';

$ingName = $image = $price = $description = $attributes = $txt1 = $txt2 = $error ='';
//$error = '';
 $max_file_size = 1000000; // small


if(isset($_POST["submitfrm"])){

    $ingName = $_POST['ingName'];
    $image = $_FILES['image']['name'];
    $price = $_POST['price']; 
    $description = $_POST['description'];
    $attributes = $_POST['attributes'];
    $price = $_POST['price']; 
    $description = $_POST['description'];
    $attributes = $_POST['attributes'];
    $dbh->upload($ingName, $image, $price, $description, $attributes);
    //$upload->addIngredient($ingName, $fileName, $price);
    // addIngredient($ing,$fileName,$price);
    // header('Location: showIngredients.php');
    $txt1 = "This is text box 1";
    $txt2 = "This is text box 2";
   
}

?>

<div id="addIngForm">
    <h2 align="center">Add Ingredients</h2>
    <form name='input' action="#" method='post' enctype="multipart/form-data" id="formInput" align="center" > 

        <input id="formBox" type='text' value='<?php echo $ingName; ?>' id='ingName' name='ingName' placeholder='Enter Ingredient Name'/>
        <br/>

        <!--<input id="formBox" type='text' value='<?php echo $fileName; ?>' id='fileName' name='fileName' placeholder='Enter File Name'/>-->
        <br/>
		<!--<label class="sr-only" for="image">Upload Image</label>--> 
	    <input id="formBox" type="hidden" name="MAX_FILE_SIZE" value="<?php echo $max_file_size; ?>" />
        <br/>
         
         <input type='file' value='<?php echo $image; ?>' id='image' name='image' class="form-control" style="padding-bottom: 30px;/* margin: 0 auto; */width: 270px;vertical-align: middle;margin-left: 40px;display: inline-block;" />
		<!--<input id="formBox" type="file" < name="image" id="image" stlye="padding-bottom: 15px;"/>-->
		<br/>


        <input id="formBox" type='text' value='<?php echo $price; ?>' id='price' name='price' placeholder='Enter Price'/>
        <br/>

        <textarea value='<?php echo $description; ?>' style="margin-top: 25px; margin-left: 50px;" rows="4" cols="50" id="formInput" name="description" placeholder='Enter description'></textarea>
        <?php echo $txt1; ?>
        <br/>

        
        <textarea  value='<?php echo $attributes; ?>' style="margin-top: 25px; margin-left: 50px;" rows="4" cols="50" id="formInput" name="attributes" placeholder='Enter Attributes'></textarea>
        <?php echo $txt2; ?>
        <br/>
        <?php echo $error; ?>
        <input type='submit' value='submitfrm' name='submitfrm' class="Submit Form" />

    </form>
    

</div>

<?php include 'inc/footer.php'; 