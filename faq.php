<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQ Page</title>
    <link rel="icon" type="image/x-icon" href="images/foot.png">
    <link href="css/faq.css" rel="stylesheet" type="text/css"/>
</head>

<body>
    
    <?php include 'Header.php' ?>
    
    <header>
        <h1>Frequently Asked Questions</h1>
    </header>

    <section class="faq-section">
        <?php include 'get_faqs.php'; ?>
    </section>

    <section class="add-faq-form">
        <h2>Add a New Question</h2>
        <form action="add_faq.php" method="post">
            <label for="question">Question:</label>
            <input type="text" id="question" name="question" required>

            <input type="submit" value="Add Question">
        </form>
    </section>
    
    <?php include 'Footer.php' ?>
</body>

</html>
