<?php 

include 'service.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $result = callAPI(
    'POST', 'http://localhost:3000/users/', 
    json_encode(array(
      "email" => $_POST["email"], 
      "password" => $_POST["password"], 
      "firstName" => $_POST["firstName"], 
      "lastName" => $_POST["lastName"],
      "permissionLevel" => $_POST["permissionLevel"])));
  header("Location: /");
}

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">

    <title>Rest API Client</title>
</head>

<body>

    <main role="main" class="container">

        <?php include_once 'nav.php'; ?>

        <form method="POST">
            <div class="form-group">
                <label for="InputEmail">Email address</label>
                <input name="email" type="email" class="form-control" id="InputEmail" aria-describedby="emailHelp"
                    placeholder="Enter email" required>
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone
                    else.</small>
            </div>
            <div class="form-group">
                <label for="InputPassword">Password</label>
                <input name="password" type="password" class="form-control" id="InputPassword" placeholder="Password"
                    required>
            </div>
            <div class="form-row">
                <div class="col">
                    <div class="form-group">
                        <label for="InputFirstName">First name</label>
                        <input name="firstName" class="form-control" type="text" placeholder="(Optional)"
                            id="InputFirstName">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="InputLastName">Last name</label>
                        <input name="lastName" class="form-control" type="text" placeholder="(Optional)"
                            id="InputLastName">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="InputPermissionLevel">Permission level</label>
                <input name="permissionLevel" type="number" class="form-control" id="InputPermissionLevel"
                    placeholder="Permission level (0-2)" min="0" max="2">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    </main><!-- /.container -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</body>

</html>