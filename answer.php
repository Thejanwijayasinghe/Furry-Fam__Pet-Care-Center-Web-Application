<!DOCTYPE html>
<html>
<head>
    <title>Answer Question</title>
    <link href="css/faq.css" rel="stylesheet" type="text/css"/>
</head>
<body>
    <h1>Answer Question</h1>

    <?php
    if (isset($_GET['id'])) {
        $question_id = $_GET['id'];
        
        // Display the question
        $mysqli = new mysqli("localhost", "root", "", "faq_db");

        if ($mysqli->connect_error) {
            die("Connection failed: " . $mysqli->connect_error);
        }

        $sql = "SELECT question FROM questions WHERE id = $question_id";
        $result = $mysqli->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            echo "<p>Question: {$row['question']}</p>";
        }

        // Display existing answers
        $sql = "SELECT answer FROM questions WHERE id = $question_id";
        $result = $mysqli->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            echo "<p>Answer: {$row['answer']}</p>";
        } else {
            echo "<p>No answer yet.</p>";
        }
        
        $mysqli->close();
    }
    ?>

    <h2>Add an Answer:</h2>
    <form action="add_answer.php" method="POST">
        <input type="hidden" name="question_id" value="<?php echo $question_id; ?>">
        <textarea name="answer" placeholder="Your answer" required></textarea>
        <input type="submit" value="Submit Answer">
    </form>
</body>
</html>
