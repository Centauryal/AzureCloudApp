<!DOCTYPE html>
<html>
<head>
    <title>Submission Satu</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1 class="text-center">Register Azure Development</h1>
        <form action="index.php" method="POST">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" name="name" id="name" require="">
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="text" class="form-control" name="email" id="email">
            </div>
            <div class="form-group">
                <label for="jobs">Job:</label>
                <input type="text" class="form-control" name="jobs" id="jobs">
            </div>
            <button type="submit" name="register" class="btn btn-primary">Register</button>
        </form>
        <br>
        <br>
        <br>
        <div>
        <table class="table table-hover table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Jobs</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    include ("db_connection.php");
                    try {
                        $getdata = "SELECT * FROM tb_user";
                        $stmt = $conn->query($getdata);
                        $data = $stmt->fetchAll();
                        if(count($data) > 0) {
                            $i = 1;
                            foreach($data as $user) {
                                echo "<tr><td>".$i++."</td>";
                                echo "<td>".$user['name']."</td>";
                                echo "<td>".$user['email']."</td>";
                                echo "<td>".$user['jobs']."</td>";
                            }
                        } else {
                            echo "<tr><td colspan=5 align=center>Data Empty</td></tr>";
                        }
                    } catch(Exception $e) {
                        echo "Error: " . $e;
                    }
                ?>
            </tbody>
        </table>
        </div>
    </div>

    <?php
        if(isset($_POST['register'])) {
            try {
                $name = $_POST['name'];
                $email = $_POST['email'];
                $jobs = $_POST['jobs'];

                $insert_query = "INSERT INTO tb_user (name, email, jobs) VALUES (?,?,?,?)";
                
                $stmt = $conn->prepare($insert_query);
                $stmt->bindValue(1, $name);
                $stmt->bindValue(2, $email);
                $stmt->bindValue(3, $jobs);
                $stmt->execute();
                echo "<meta http-equiv='refresh' content='0'>";
            } catch(Exception $e) {
                echo "Error: " . $e;
            }
        }
    ?>
</body>
</html>