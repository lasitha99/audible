<!DOCTYPE html>
<html lang="en">

<!-- Sweet alert JS -->
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <?php
    // Starting a session
    session_start();
    // Creating an array for storing the error messages
    $errors = array();
    // Creating a database connection
    $db_connection = mysqli_connect('localhost', 'root', '', 'audible') or die("could not connect to database");

    // NEW USER REGISTRATION
    if (isset($_POST['register_user'])) {

        // Printing the post request
        echo '<pre>';
        print_r($_POST);
        echo '</pre>';

        // Storing the post request data into separate variables
        $first_name = mysqli_real_escape_string($db_connection, $_POST['first_name']);
        $last_name = mysqli_real_escape_string($db_connection, $_POST['last_name']);
        $email = mysqli_real_escape_string($db_connection, $_POST['email']);
        $address = mysqli_real_escape_string($db_connection, $_POST['address']);
        $phone = mysqli_real_escape_string($db_connection, $_POST['phone']);
        $password = mysqli_real_escape_string($db_connection, $_POST['password']);
        $confirm_password = mysqli_real_escape_string($db_connection, $_POST['confirm_password']);

        // Check for errors
        if (empty($first_name)) {
            array_push($errors, "first_name is required");
        }
        if (empty($last_name)) {
            array_push($errors, "last_name is required");
        }
        if (empty($address)) {
            array_push($errors, "address is required");
        }
        if (empty($phone)) {
            array_push($errors, "phone is required");
        }
        if (empty($password)) {
            array_push($errors, "password is required");
        }
        if (empty($confirm_password)) {
            array_push($errors, "confirm_password is required");
        }

        // Check is the password and confirm password are matching
        if ($password != $confirm_password) {
            array_push($errors, "password and confirm_password are not matching");
        }

        // Check is the user already exists
        $user_check_query = "SELECT * from user WHERE email = '$email' LIMIT 1";

        // Executing the above query
        $results = mysqli_query($db_connection, $user_check_query);

        // put all user data into a temporary array
        $user = mysqli_fetch_assoc($results);

        // If the user data is found
        if ($user) {
            if ($user['email'] == $email) {
                array_push($errors, "email already exists");
    ?>
                <script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'This email already registered',
                    })
                </script>
            <?php
            }
        }

        // If no errors were found
        if (count($errors) == 0) {

            // Encrypting the password which is entered by the user
            $encrypted_password = md5($password);

            // Write user data to the database
            $query = "INSERT INTO user (email, password, address, phone, first_name, last_name) VALUES ('$email', '$encrypted_password', '$address', '$phone', '$first_name', '$last_name')";

            // Executing the above query
            mysqli_query($db_connection, $query);

            // putting all user data into a session variable
            $_SESSION['email'] = $email;
            $_SESSION['password'] = $encrypted_password;
            $_SESSION['address'] = $address;
            $_SESSION['phone'] = $phone;
            $_SESSION['first_name'] = $first_name;
            $_SESSION['last_name'] = $last_name;

            header('location: ../index.php');
        }
    }

    // LOGIN USER
    /// Function to log in a user
    if (isset($_POST['login_user'])) {

        // Get the email address and password from the $_POST variable
        $email = mysqli_real_escape_string($db_connection, $_POST['email']);
        $password = mysqli_real_escape_string($db_connection, $_POST['password']);

        // Checking for errors
        if (empty($email)) {
            array_push($errors, "email is required");
        }
        if (empty($password)) {
            array_push($errors, "password is required");
        }

        // If no errors are encountered
        if (count($errors) == 0) {

            // encrypting the password
            $password = md5($password);

            // is there any user who is mactching with the entered credentials
            $query = "SELECT * FROM user WHERE email = '$email' AND password='$password'";

            // executing the above quoery 
            $results = mysqli_query($db_connection, $query);

            // if there are results
            if (mysqli_num_rows($results)) {

                // getting email addresses from the database
                $fetch_all_user_data = "SELECT * from user WHERE email = '$email' LIMIT 1";
                // executing the above query
                $results = mysqli_query($db_connection, $fetch_all_user_data);
                // put all user data into a temporary array
                $user = mysqli_fetch_assoc($results);

                // If the user data is found
                if ($user) {

                    // putting all user data into a session variable
                    $_SESSION['user_id'] = $user['user_id'];
                    $_SESSION['email'] = $user['email'];
                    $_SESSION['password'] = $user['password'];
                    $_SESSION['address'] = $user['address'];
                    $_SESSION['phone'] = $user['phone'];
                    $_SESSION['first_name'] = $user['first_name'];
                    $_SESSION['last_name'] = $user['last_name'];
                }

                header('location: ../index.php');
            } else {
                array_push($errors, "Wrong email/ password combination. Please try again");

            ?>
                <script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Invalid email and password.',
                        confirmButtonText: "try again",
                    })
                </script>
    <?php
            }
        }
    }
    ?>

</body>

</html>