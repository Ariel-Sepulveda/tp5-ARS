<?php 

include 'service.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $result = callAPI(
    'DELETE', 'http://localhost:3000/users/' . $_POST['deleteUserId'], false);
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <title>Rest API Client</title>
</head>

<body>

    <main role="main" class="container">

        <?php include_once 'nav.php'; ?>

        <div class="card">
            <div class="card-header">
                Users
            </div>
            <div class="card-body">
                <a href="new_user.php" class="btn btn-primary mb-3">New</a>
                <?php $response = json_decode(callAPI('GET', 'http://localhost:3000/users/', false), true);
                if (!empty($response)): ?>
                <table class="table text-center">
                    <thead>
                        <tr>
                            <th scope="col">Email</th>
                            <th scope="col">First Name</th>
                            <th scope="col">Last Name</th>
                            <th scope="col">Permission Level</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($response as $res): ?>
                        <tr>
                            <td><?php echo $res['email']; ?></td>
                            <td><?php echo isset($res['firstName']) ? $res['firstName'] : '' ?></td>
                            <td><?php echo isset($res['lastName']) ? $res['lastName'] : '' ?></td>
                            <td><?php echo isset($res['permissionLevel']) ? $res['permissionLevel'] : '' ?></td>
                            <td>
                                <div class="btn-group">
                                    <form method="POST">
                                        <button class="btn" type="submit" value=<?php echo $res['id'] ?>
                                            name="deleteUserId">
                                            <I class="bi-trash"></i>
                                        </button>
                                    </form>
                                    <form method="POST" action="edit_user.php">
                                        <button class="btn" type="submit" value=<?php echo $res['id'] ?>
                                            name="editUserId">
                                            <i class="bi bi-pencil"></i>
                                        </button>
                                        <input type="hidden" name="email" value=<?php echo $res['email'] ?> />
                                        <input type="hidden" name="firstName" value=<?php echo $res['firstName'] ?> />
                                        <input type="hidden" name="lastName" value=<?php echo $res['lastName'] ?> />
                                        <input type="hidden" name="permissionLevel"
                                            value=<?php echo $res['permissionLevel'] ?> />
                                    </form>
                                </div>
                            </td>
                        </tr>
                        <?php	endforeach; ?>
                    </tbody>
                </table>
                <?php else: ?>
                <hr>
                <p>No users in database</p>
                <?php endif; ?>
            </div>
        </div>

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