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

    // echo $description;
    // echo $attributes;

    $dbh->upload($ingName, $image, $price, $description, $attributes);

    $move = "./uploads/".$_FILES['image']['name'];
    move_uploaded_file ($_FILES['image']['tmp_name'], "$move");
    chmod($move, 0755);

    header("Location: showIngredients.php");
   
}

?>

<div id="addIngForm">
    <h2 align="center">Add Ingredients</h2>
    <form name='input' action="#" method='post' enctype="multipart/form-data" id="formInput" align="center" > 

        <input id="formBox" type='text' value='<?php echo $ingName; ?>' id='ingName' name='ingName' placeholder='Enter Ingredient Name'/>
        <br/>
        <br/>
 
	    <input id="formBox" type="hidden" name="MAX_FILE_SIZE" value="<?php echo $max_file_size; ?>" />
        <br/>
         
         <input type='file' value='<?php echo $image; ?>' id='image' name='image' class="form-control" style="padding-bottom: 30px; width: 270px;vertical-align: middle;margin-left: 40px;display: inline-block;" />
		<br/>

        <input id="formBox" type='text' value='<?php echo $price; ?>' id='price' name='price' placeholder='Enter Price'/>
        <br/>

        <input id="formBox" type='text' value='<?php echo $attributes; ?>' id='attributes' name='attributes' placeholder='Enter Attributes'/>
        <br/>

        <textarea value='<?php echo $description; ?>' style="margin-top: 25px; margin-left: 50px;" rows="4" cols="50" id="formInput" name="description" placeholder='Enter description'></textarea>
        <br/>

        
        
        <?php echo $error; ?>
        <input type='submit' value='Submit Form' name='submitfrm' class="Submit Form" />

    </form>
    

</div>

<?php include 'inc/footer.php'; 