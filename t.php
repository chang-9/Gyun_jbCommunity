<?php
// begin the session
session_start();

// create an array
$my_array=array('cat', 'dog', 'mouse');

// put the array in a session variable
if(!isset($_SESSION['animals']))
    $_SESSION['animals']=$my_array;

// move submit code outside of foreach loop
if (isset($_POST["submit"])) 
{
for ($i = 0; $i < count($_POST['aaa']); $i++) {
    $aaa = $_POST['aaa'][$i];
    $key_var = $_POST['ke'][$i];

    // setting the session spesific session array value different for each     key  
    $_SESSION['animals'][$key_var] = $aaa;
}
}
?>
<form method="post" action="">
<?php
// loop through the session array with foreach
foreach($_SESSION['animals'] as $key=>$value)
{   

    // and print out the values
    echo 'The value of key ' .$key. ' is '."'".$value."'".' <br />';
    echo "update the value of key " .$key. " in the input box bellow";

    // getting the updated value from input box
    ?>
        <input type="file"  name="aaa[]" value="<?php echo $value ; ?>"    size="2" />
        <!-- take a hidden input with value of key -->
        <input type="hidden" name="ke[]" value="<?php echo $key; ?>"><br>
    <?php
 }
 ?>

 <input type="submit" value="Update value of key" name="submit"/>
</form>