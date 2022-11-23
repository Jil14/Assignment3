<?php
session_start();
?>



<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Profile page and CRUD </title>
    <meta name="description" content="This websites contain profile page and crud form to creATE NEW profile">
    <meta name="robots" content="noindex, nofollow">
    <!--add Font -->

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@600&family=Lato:ital,wght@0,400;1,700&display=swap" rel="stylesheet">

    <!-- add Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>


    <!-- add our custom CSS -->
    <link rel="stylesheet" href="style.css">
</head>
<!-- body for webpage starts here-->


<!-- this is the markup. you can change the details  but don’t change the basic structure! -->


<body class="profile-card mt-5">
    <?php include('header.php'); ?>

    <main>
        <section>
            <div class="container">
                <div class="card-header bg-transparent text-center">
                    <img class="profile_img" src="profile.jpg" alt="dp">
                    <h3>JIL PATEL</h3>
                </div>
            </div>
        </section>
        <section>
            <p>
                A Student of Computer programming at georgian College. Working with HTML ,CSS, javascript as well as working with database and java. Actively participate in all sports .
            </p>
        </section>

        <h2>Create Your Profile Page Using Form Given Below</h2>
        <section class="container">

            <!--php for displaying msg -->
            <?php
            if (isset($_SESSION['message'])) :
            ?>
                <div class="alert alert-primary" role="alert">
                    check you spellings
                </div>

            <?php
                unset($_SESSION['message']);
            endif;
            ?>
            <div class="row">
                <div class="col-md-7 mx-auto">
                    <section class="formcontainer">
                        <!--form Starts here-->
                        <div class="card">
                            <div class="card-header bg-dark text-white">
                                <h2>Enter Profile Info</h2>
                            </div>
                            <div class="card-body bg-light">
                                <form action="otherpg.php" method="POST">
                                    <div class="form-group">
                                        <label for="name">Name:</label>
                                        <input type="text" class="form-control" name="name" placeholder="Enter name" required="">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" name="email" placeholder="Enter email" required="">
                                    </div>
                                    <div class="form-group">
                                        <label for="bio">Bio</label>
                                        <input type="text" size="30" class="form-control" name="bio" placeholder="Enter your Bio" required="">
                                    </div>
                                    <input type="submit" name="submit" class="btn btn-primary" href="otherpg.php" style="float:right;" value="Submit">
                                </form>
                            </div>
                    </section>
        </section>
        <section>
            <!-- table to display inputs -->
            <table class="table">
                <thead>
                    <tr>
                        <th>Full Name</th>
                        <th> E-mail</th>
                        <th> Bio</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT * FROM student";
                    $query_run =  mysqli_query($con, $query);

                    if (mysqli_num_rows($query_run) > 0) {
                        foreach ($query_run as $stu) {

                    ?><tr>
                                <td><?= $stu['name']; ?></td>
                                <td><?= $stu['email']; ?></td>
                                <td><?= $stu['bio']; ?></td>
                                <td><a href="" class="btn btn-danger btn-sm">Delete</a>
                                    <a href="">Edit</a>
                                </td>
                            </tr>
                    <?php
                        }
                    } else {
                        echo "<h5> No record Found</h5>";
                    }
                    ?>
                    <tr>
                        <td>
                    </tr>
                </tbody>
            </table>
        </section>
    </main>
    <?php include('footer.php'); ?>
</body>

</html>