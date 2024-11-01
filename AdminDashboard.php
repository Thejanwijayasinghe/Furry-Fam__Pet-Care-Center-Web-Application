<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Admin Dashboard</title>
        <link rel="icon" type="image/x-icon" href="images/foot.png">
        <link href="css/dashstyles.css" rel="stylesheet" type="text/css"/>
        <link href="css/reveiw.css" rel="stylesheet" type="text/css"/>
        <link href="css/faq.css" rel="stylesheet" type="text/css"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

    </head>
    <body>
        <?php include 'Header.php' ?>

        <h2 class="mt-5" style="text-align: center;">FAQ Management</h2>
        <section>

            <section class="faq-section">
                <?php include 'get_faqs_admin.php'; ?>
            </section>

            <section class="add-answer-form">
                <h2>Add Answer to Question</h2>
                <form action="add_answer.php" method="post">
                    <label for="question_id">Question ID:</label>
                    <input type="number" id="question_id" name="question_id" required>

                    <label for="answer">Answer:</label>
                    <textarea id="answer" name="answer" rows="4" required></textarea>

                    <input type="submit" value="Add Answer">
                </form>
            </section>
        </section>
        
        <h2 class="mt-5" style="text-align: center;">Admin - Customer Reviews</h2>
        <section class="sec">        
            <div>
                <section>
                    <?php include 'get_reviews_admin.php'; ?>
                </section>
            </div>
        </section>

        <section>
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h2 class="mt-5">Articles</h2> 
                        <table class="article-table table table-bordered">
                            <thead>
                                <tr>
                                    <th>Article Id</th>
                                    <th>Article Name</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Parvovirus-like Symptoms ..</td>
                                    <td>
                                        <button class="action-button delete-button btn btn-danger">Delete</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>10 Cat Exercises Your Pet Will Enjoy</td>
                                    <td>
                                        <button class="action-button delete-button btn btn-danger">Delete</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="col-md-6">
                        <h2 class="mt-5">Video</h2> 
                        <table class="video-table table table-bordered">
                            <thead>
                                <tr>
                                    <th>Video Id</th>
                                    <th>Video Name</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>How to Raw Feed your Cat</td>
                                    <td>
                                        <button class="action-button delete-button btn btn-danger">Delete</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>How To Exercise Your Rabbit</td>
                                    <td>
                                        <button class="action-button delete-button btn btn-danger">Delete</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>

        

        <?php include 'Footer.php' ?>
    </body>
</html>
