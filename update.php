<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Assurez-vous que vous avez configuré la connexion à la base de données
    $pdo = new PDO('mysql:host=localhost;port=3306;dbname=git_github_php', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Récupérer les données du formulaire
    $id = $_POST["id"];
    $image = $_POST["image"];
    $nom = $_POST["nom"];
    $ecole = $_POST["ecole"];
    $classe = $_POST["classe"];
    $telephone = $_POST["telephone"];

    try {
        // Requête de mise à jour
        $sql = "UPDATE crud_php1 SET image = :image, name = :nom, ecole = :ecole, classe = :classe, tel_parent = :telephone WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":image", $image);
        $stmt->bindParam(":nom", $nom);
        $stmt->bindParam(":ecole", $ecole);
        $stmt->bindParam(":classe", $classe);
        $stmt->bindParam(":telephone", $telephone);
        $stmt->bindParam(":id", $id);

        // Exécution de la requête de mise à jour
        if ($stmt->execute()) {
            // Redirection vers la page principale après la mise à jour
            header("Location: index.php");
            exit();
        } else {
            echo "Erreur lors de la mise à jour : " . $stmt->errorInfo()[2];
        }
    } catch (PDOException $e) {
        echo "Erreur de connexion à la base de données : " . $e->getMessage();
    }
} else {
    // Assurez-vous que vous avez configuré la connexion à la base de données
    $pdo = new PDO('mysql:host=localhost;port=3306;dbname=git_github_php', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Récupérer l'ID de l'élève depuis le paramètre GET
    $id = $_GET["id"];

    // Requête pour récupérer les données de l'élève
    $sql = "SELECT * FROM crud_php1 WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(":id", $id);
    $stmt->execute();
    $eleve = $stmt->fetch(PDO::FETCH_ASSOC);

    // Assurez-vous que l'élève existe
    if (!$eleve) {
        echo "Élève non trouvé.";
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <title>Modifier Élève</title>
    <!-- Inclure les styles CSS nécessaires ici -->
</head>

<body>
    <h1>Modifier Élève</h1>
    <form method="post">
        <input type="hidden" name="id" value="<?php echo $eleve['id']; ?>">
        <div class="mb-3">
            <label for="image">Image:</label>
            <input type="file" name="image" value="<?php echo $eleve['image']; ?>" required><br><br>
        <div>
        <div class="mb-3">
            <label for="nom">Nom:</label>
            <input type="text" name="nom" value="<?php echo $eleve['name']; ?>" required><br><br>
        <div>
        <div class="mb-3">
            <label for="ecole">École:</label>
            <input type="text" name="ecole" value="<?php echo $eleve['ecole']; ?>" required><br><br>
        <div>
        <div class="mb-3">
            <label for="classe">Classe:</label>
            <input type="text" name="classe" value="<?php echo $eleve['classe']; ?>" required><br><br>
        <div>
        <div class="mb-3">
            <label for="telephone">Téléphone:</label>
            <input type="text" name="telephone" value="<?php echo $eleve['tel_parent']; ?>" required><br><br>
        <div>
        <button type="submit">Mettre à Jour</button>
    </form>
</body>

</html>