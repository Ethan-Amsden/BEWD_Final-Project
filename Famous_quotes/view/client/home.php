<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/ccdc89c58c.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="CSS/styles.css">
    <title>Quotey | Home</title>
</head>

<?php include 'navigation.php' ?>

    <main>
        <div class="quote-container">
            <h1>Quote #<?php echo $Quote['QuoteID']?></h1>
            <p class="quote-text"><?php echo $Quote['Quote']?></p>
            <p class="quote-author"> ~ <?php echo $Quote['Author']?></p>
            <hr>

            <form action="." method="post">
                                
                <input type="hidden" name="action" value="refresh_quote">

                <input class="refresh-button" type="submit" value="New Quote">
                                
            </form>

        </div>
    </main>
</body>
</html>