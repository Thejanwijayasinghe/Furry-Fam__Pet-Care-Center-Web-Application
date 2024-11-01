<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="images/x-icon" href="images/foot.png">
        <title>Reminder </title>
        <link rel="stylesheet" href="css/reminder.css">
    </head>
    <body>
        <?php include 'Header.php' ?>
        <br>
        <br>
        <section class="reminder-section">
            <h2><stong><center>Never Miss a Training Session!</center></stong></h2><br><br>
            <form action="https://formsubmit.co/vindi835@gmail.com" method="POST" />
                <label for="name"><strong>Your Name:</strong></label>
                <input type="text" id="name" name="name" required>

                <label for="email"><strong>Your Email:</strong></label>
                <input type="email" id="email" name="email" required>

                <label for="time"><strong>Preferred Training Time:</strong></label>
                <input type="text" id="time" name="time" required>
                <div class="butt">
                    <button type="submit">Set Reminder</button>
                </div>
            </form>
        </section>
        <?php include 'Footer.php' ?>
    </body>
</html>
