<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Veterinarian Dashboard</title>
        <link rel="icon" type="image/x-icon" href="images/foot.png">
        <link href="css/dashstyles.css" rel="stylesheet" type="text/css"/>
        <link href="css/faq.css" rel="stylesheet" type="text/css"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

        <style>
            body {
                padding: 20px;
            }

            .appointment-card {
                margin-bottom: 20px;
            }
            .card-body{
                border: 2px solid green;
                border-radius: 5px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            }
        </style>
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
                <form action="add_answer_vet.php" method="post">
                    <label for="question_id">Question ID:</label>
                    <input type="number" id="question_id" name="question_id" required>

                    <label for="answer">Answer:</label>
                    <textarea id="answer" name="answer" rows="4" required></textarea>

                    <input type="submit" value="Add Answer">
                </form>
            </section>
        </section>

        <div class="container">
            <h2 class="my-4">Appointments</h2>

            <!-- Example Appointment Cards -->
            <div class="card appointment-card">
                <div class="card-body">
                    <h5 class="card-title">Appointment with Dr.Maurice Allen Veterinarian</h5>
                    <p class="card-text">
                        <strong>Full name:</strong>Ayoma Rajapakshe<br>
                        <strong>Email:</strong>ayoma@gmail.com<br>
                        <strong>Contact number :</strong>0766359213<br>
                        <strong>Address:</strong>No:34/B,Yanel Vidiya,Yakkala.<br>
                        <strong>Pet type:</strong> Dog<br>
                        <strong>Date:</strong> December 5, 2023<br>
                        <strong>Time:</strong> 1:00 PM<br>

                    </p>
                </div>
            </div>

            <div class="card appointment-card">
                <div class="card-body">
                    <h5 class="card-title">Appointment with Dr.Chris Brown Veterinarian</h5>
                    <p class="card-text">
                        <strong>Full name:</strong>Nihitha Rajapakshe<br>
                        <strong>Email:</strong>nihitha@gmail.com<br>
                        <strong>Contact number :</strong>0766359213<br>
                        <strong>Pet:</strong> Cat
                        <strong>Address:</strong>No:34/B,manel Vidiya,colombo.<br>
                        <strong>Date:</strong> December 12, 2023<br>
                        <strong>Time:</strong> 10:00 AM<br>

                    </p>
                </div>
            </div>

            <div class="card appointment-card">
                <div class="card-body">
                    <h5 class="card-title">Appointment with Dr.Agara Dickens Veterinarian</h5>
                    <p class="card-text">
                        <strong>Full name:</strong>Mithika Rajapakshe<br>
                        <strong>Email:</strong>mithika@gmail.com<br>
                        <strong>Contact number :</strong>0766359213<br>
                        <strong>Pet:</strong> Cat
                        <strong>Date:</strong> December 22, 2023<br>
                        <strong>Time:</strong> 10.30 AM <br>

                    </p>
                </div>
            </div>
            <!-- Add more appointment cards as needed -->

        </div>

        <section class="dash">
            <div class="container">
                <div class="row">
                    <div >
                        <h2 class="mt-5">Articles</h2> 
                        <table class="article-table table table-bordered">
                            <thead>
                                <tr>
                                    <th>Article Id</th>
                                    <th>Article Name</th>
                                    <th style="width: 300px;">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Parvovirus-like Symptoms ..</td>
                                    <td>
                                        <button class="action-button upload-button btn btn-primary" data-toggle="modal" data-target="#articleUploadModal">Upload </button>
                                        <button class="action-button update-button btn btn-success"data-toggle="modal" data-target="#articleUpdateModal">Update</button>
                                        <button class="action-button delete-button btn btn-danger">Delete</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>10 Cat Exercises Your Pet Will Enjoy</td>
                                    <td>
                                        <button class="action-button upload-button btn btn-primary" data-toggle="modal" data-target="#articleUploadModal">Upload </button>
                                        <button class="action-button update-button btn btn-success"data-toggle="modal" data-target="#articleUpdateModal">Update</button>
                                        <button class="action-button delete-button btn btn-danger">Delete</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div>
                        <h2 class="mt-5">Video</h2> 
                        <table class="video-table table table-bordered">
                            <thead>
                                <tr>
                                    <th>Video Id</th>
                                    <th>Video Name</th>
                                    <th style="width: 300px;">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>How to Raw Feed your Cat</td>
                                    <td>
                                        <button class="action-button upload-button btn btn-primary" data-toggle="modal" data-target="#videoUploadModal">Upload </button>
                                        <button class="action-button update-button btn btn-success" data-toggle="modal" data-target="#videoUpdateModal">Update</button>
                                        <button class="action-button delete-button btn btn-danger">Delete</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>How To Exercise Your Rabbit</td>
                                    <td>

                                        <button class="action-button upload-button btn btn-primary" data-toggle="modal" data-target="#videoUploadModal">Upload </button>
                                        <button class="action-button update-button btn btn-success" data-toggle="modal" data-target="#videoUpdateModal">Update</button>
                                        <button class="action-button delete-button btn btn-danger">Delete</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Article Upload Modal -->
            <div class="modal" id="articleUploadModal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Upload Article</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <!-- Modal Body -->
                        <div class="modal-body">
                            <form id="articleUploadForm" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="articleID">Article ID:</label>
                                    <input type="text" class="form-control" id="articleID" name="articleID" placeholder="Enter article ID" required>
                                </div>
                                <div class="form-group">
                                    <label for="articleName">Article Name:</label>
                                    <input type="text" class="form-control" id="articleName" name="articleName" placeholder="Enter Article Name" required>
                                </div>
                                <div class="form-group">
                                    <label for="articleImage">Upload Article Image:</label>
                                    <input type="file" class="form-control-file" id="articleImage" name="articleImage" accept="image/*" required>
                                </div>
                                <div class="form-group">
                                    <label for="articleDescription">Article Description:</label>
                                    <textarea class="form-control" id="articleDescription" name="articleDescription" placeholder="Enter Article Description" required></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Video Upload Modal -->
            <div class="modal" id="videoUploadModal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Upload Video</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <!-- Modal Body -->
                        <div class="modal-body">
                            <form id="videoUploadForm" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="videoID">Video ID:</label>
                                    <input type="text" class="form-control" id="videoID" name="videoID" placeholder="Enter video ID" required>
                                </div>
                                <div class="form-group">
                                    <label for="videoName">Video Name:</label>
                                    <input type="text" class="form-control" id="videoName" name="videoName" placeholder="Enter Video Name" required>
                                </div>
                                <div class="form-group">
                                    <label for="videoFile">Upload Video:</label>
                                    <input type="file" class="form-control-file" id="videoFile" name="videoFile" accept="video/*" required>
                                </div>
                                <div class="form-group">
                                    <label for="videoDescription">Video Description:</label>
                                    <textarea class="form-control" id="videoDescription" name="videoDescription" placeholder="Enter Video Description" required></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Article Update Modal -->
            <div class="modal" id="articleUpdateModal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Update Article</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <!-- Modal Body -->
                        <div class="modal-body">
                            <form id="articleUpdateForm" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="updateArticleID">Article ID:</label>
                                    <input type="text" class="form-control" id="updateArticleID" name="updateArticleID" placeholder="Enter article ID" required>
                                </div>
                                <div class="form-group">
                                    <label for="updateArticleName">Article Name:</label>
                                    <input type="text" class="form-control" id="updateArticleName" name="updateArticleName" placeholder="Enter Article Name" required>
                                </div>
                                <div class="form-group">
                                    <label for="updateArticleImage">Upload Article Image:</label>
                                    <input type="file" class="form-control-file" id="updateArticleImage" name="updateArticleImage" accept="image/*" required>
                                </div>
                                <div class="form-group">
                                    <label for="updateArticleDescription">Article Description:</label>
                                    <textarea class="form-control" id="updateArticleDescription" name="updateArticleDescription" placeholder="Enter Article Description" required></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Video Update Modal -->
            <div class="modal" id="videoUpdateModal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Update Video</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <!-- Modal Body -->
                        <div class="modal-body">
                            <form id="updateVideoForm" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="updateVideoID">Video ID:</label>
                                    <input type="text" class="form-control" id="updateVideoID" name="updateVideoID" placeholder="Enter video ID" required>
                                </div>
                                <div class="form-group">
                                    <label for="updateVideoName">Video Name:</label>
                                    <input type="text" class="form-control" id="updateVideoName" name="updateVideoName" placeholder="Enter Video Name" required>
                                </div>
                                <div class="form-group">
                                    <label for="updateVideoFile">Upload Video:</label>
                                    <input type="file" class="form-control-file" id="updateVideoFile" name="updateVideoFile" accept="video/*" required>
                                </div>
                                <div class="form-group">
                                    <label for="updateVideoDescription">Video Description:</label>
                                    <textarea class="form-control" id="updateVideoDescription" name="updateVideoDescription" placeholder="Enter Video Description" required></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>



        </section>

        <?php include 'Footer.php' ?>
    </body>
</html>
