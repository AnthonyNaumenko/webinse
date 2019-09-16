<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="index.css"/>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
        <script src="script.js"></script>

        <title>Table</title>
    </head>
<body>


    <table class="table table-striped" id="tab">
        <thead>
        <tr>
            <th scope="col-3">#</th>
            <th scope="col-3">First name</th>
            <th scope="col-3">Second name</th>
            <th scope="col-3">E-mail</th>
        </tr>
        </thead>

        <tbody>

        <?php

        try{
            $pdo = new PDO('mysql:host=localhost;dbname=adminWebinse;charset=utf8','Anthony','4044059860');
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } catch(PDOException $exception){
            echo $exception->getMessage();
        }

        //Удаление из таблицы
        if (isset($_GET['del'])) {
              $id = $_GET['del'];
              $query = "DELETE FROM user WHERE id = $id";

              $params = [$id];
              $stmt = $pdo->prepare($query);
              $stmt->execute($params);
          }

        //Вывод данных
        $sql = "SELECT * FROM user ";
                    $result = $pdo->query($sql);
                    $data = '';

                    foreach($result as $row) {
                        $data.= '<tr>';
                            $data .= '<td>' . $row['id'] . '</td>';
                            $data .= '<td>' . $row['First name'] . '</td>';
                            $data .= '<td>' . $row['Second name'] . '</td>';
                            $data .= '<td>' . $row['E-mail'] . '</td>';
                            $data .='<td>'.'<a href="?del=' . $row['id'] . '" type="delete" class="btn btn-danger " id="del">Delete</a></td>';
                        $data .= '</tr>';
                    }
                    echo $data;
                ?>
            </tbody>
    </table>

    <h3>Add value</h3>
    <form action="add.php" method="post" >
        <div class="row">
            <div class="col-3">
                <input type="text" class="form-control" placeholder="First name" name="firstName" id="firstName">
            </div>
            <div class="col-3">
                <input type="text" class="form-control" placeholder="Second name" name="secondName" id="secondName" >
            </div>
            <div class="col-3">
                <input type="email" class="form-control" placeholder="e-mail" name="email" id="email">
            </div>
            <div class="col-3">
                <input type="submit" class="btn btn-primary"></input>
            </div>
        </div>
    </form>


<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>