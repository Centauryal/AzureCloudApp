<!DOCTYPE html>
<html lang="en">
  <head>

    <title>Submission Satu</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
  </head>

  <body>
    <div class="container">
      <h1 class="text-center">Register Azure Development</h1>
    </div>
    <div class="container">
        <div>
          <form action="index.php" method="post">
            <div class="form-group">
              <label for="name">Name:</label>
              <input type="text" class="form-control" name="name" id="name">
            </div>
            
            <div class="form-group">
              <label for="email">Email:</label>
              <input type="email" class="form-control" name="email" id="email">
            </div>
            
            <div class="form-group">
              <label for="jobs">Jobs:</label>
              <input type="text" class="form-control" name="jobs" id="jobs">
            </div>
           
            <div class="form-group"> 
                <button type="submit" name="register" class="btn btn-primary">Register</button>
            </div>
            
          </form>
        </div>
        
        <div>
          <br>
          <br>
          <br>
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
                  include ("dbconnection.php");
                  try {
                      $getdata = "SELECT * FROM tb_user ORDER BY id DESC";
                      $stmt = $conn->query($getdata);
                      $data = $stmt->fetchAll(); 
                      if(count($data) > 0) {
                          $i = 1;
                          foreach($data as $tb_user) {
                              echo "<tr><td>".$i++."</td>";
                              echo "<td>".$tb_user['name']."</td>";
                              echo "<td>".$tb_user['email']."</td>";
                              echo "<td>".$tb_user['jobs']."</td>";
                          }
                          
                      } else {
                          echo "<tr><td align=center>Not found</td></tr>";
                      }
                  } catch(Exception $e) {
                      echo "Error : " . $e;
                  }
              ?>
              
            </tbody>
          </table>
        </div>
    </div>

  <?php
      if (isset($_POST['register'])) {
        try {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $jobs = $_POST['jobs'];
            
            $insert_query = "INSERT INTO tb_user (name, email, jobs) 
            VALUES (?,?,?)";
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