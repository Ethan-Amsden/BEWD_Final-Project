<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/ccdc89c58c.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../../CSS/styles.css">
    <title>Famous Quotes | Quote List</title>
</head>

<?php include '../admin/header.php';?>

<div class="list-container" >

<h1>List of Quotes</h1>

<div>
        <!-- display a table of products -->
        <table id="aligned">
            <tr>
                <th>Quote</th>
                <th>Author</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
            </tr>
            <?php foreach ($quotes as $quote) : ?>
            <tr >    
                <td style="vertical-align:top"><?php echo $quote['Quote']; ?></td>
                <td style="vertical-align:top"><?php echo $quote['Author']; ?></td>
                <td style="vertical-align:top">

                    <form action="." method="post">
                        <input type="hidden" name="action" value="select_quote" />
                        <input type="hidden" name="Quote_ID" value="<?php echo $quote['QuoteID']; ?>" />
                        <input class="update-btn" type="submit" value="Select" />
                    </form>

                </td>
                <td style="vertical-align:top">
                    <form action="." method="post">   
                        <input type="hidden" name="action" value="delete_quote" />
                        <input type="hidden" name="Quote_ID" value="<?php echo $quote['QuoteID']; ?>" />
                        <input class="update-btn" type="submit" value="Delete" /> 
                    </form>               
                </tr>
            <?php endforeach; ?>
            </td>
        </table>
        </form>
        <a class="add-new" href="?action=show_add_quote">Add New Quote</a>
    </div>
</div>
</body>


