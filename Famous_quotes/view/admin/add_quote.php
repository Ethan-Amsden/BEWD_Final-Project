<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/ccdc89c58c.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../../CSS/styles.css">
    <title>Famous Quotes | Add Quote</title>
</head>
<?php 
include '../../view/admin/header.php';

$info = $_SESSION['quoteInfo'];//Get data
$quoteID = $info[0];
//$errors = $_SESSION['errors'];

if ($edit == 'Adding') 
{
    $dispNone1 = "display:none";  
    $dispNone2 = "display:visible";
}
else 
{
    $dispNone1 = "display:visible";
    $dispNone2 = "display:none";  
}
?>
    <main>
        <div class="client-container">
            <h1>Add/Update Quote</h1>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" id="aligned">
                <input type="hidden" name="action" value="edit_quote" />
                <input type="hidden" name="quoteID" value="<?php echo $info[0]; ?>" />

                <label>Quote Text:</label>
                <textarea class="quote-container" maxlength="250" name="quoteBody"><?php echo $info[1];?></textarea>
                <?php if (in_array('quoteBody', $_SESSION['errors'])): ?>
                <span class="error">Required</span><?php endif; ?>
                <br />
                <label>Author:</label>
                <input class="author" type="input" name="authorName" value="<?php echo $info[2]; ?>"/><?php if (in_array('authorName', $_SESSION['errors'])): ?>
                <span class="error">Required</span><?php endif; ?>
                
                <br />
                <label>&nbsp;</label>
                <input class="update-btn" style="<?=$dispNone1?>" type="submit" value="Update Quote" />
                <input class="update-btn" style="<?=$dispNone2?>" type="submit" value="Add Quote" />
                <br /> 
            </form>
        </div>
    </main>
</body>