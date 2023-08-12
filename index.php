<?php

$pdo = new PDO('mysql:host=localhost;port=3306;dbname=git_github_php', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


$statement = $pdo->prepare('SELECT * FROM crud_php1 ORDER BY id DESC');

$statement->execute();
$eleves = $statement->fetchAll(PDO::FETCH_ASSOC);



?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css" integrity="sha384-PJsj/BTMqILvmcej7ulplguok8ag4xFTPryRq8xevL7eBYSmpXKcbNVuy+P0RMgq" crossorigin="anonymous">

    <!-----my-css--
  <link rel="stylesheet" href="app.css">------>
    <title> CRUD</title>
</head>


<body>
    <h1> CRUD</h1>
    <p>
        <a href="create.php" class="btn btn-success"> Create </a>
    </p>

    

    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Image</th>
                <th scope="col">Nom</th>
                <th scope="col">ecole</th>
                <th scope="col">classe</th>
                <th scope="col">tel</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($eleves as $i => $eleve) : ?>
                <tr>
                    <th scope="row">
                        <?php echo $i + 1 ?>
                    </th>
                    <td>
                        image sera ici
                       <!----- <img style="width: 50px;" src="<?php echo $eleve['image'] ?>"> ----->
                    </td>
                    <td>
                        <?php echo $eleve['name'] ?>
                    </td>
                    <td>
                        <?php echo $eleve['ecole'] ?>
                    </td>
                    <td>
                        <?php echo $eleve['classe'] ?>
                    </td>
                    <td>
                        <?php echo $eleve['tel_parent'] ?>
                    </td>
                    <td>
                        <a href="update.php?id=<?php echo $eleve['id'] ?>" type="button" class="btn btn-sm btn-outline-primary">Edite</a>
                        <form action="delete.php" method="post" style="display:inline-block">
                            <input type="hidden" name="id" value="<?php echo $product['id'] ?>">
                            <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>









