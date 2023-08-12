<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Assurez-vous que vous avez configuré la connexion à la base de données
    $pdo = new PDO('mysql:host=localhost;port=3306;dbname=git_github_php', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Récupérer les données du formulaire
    $image = $_POST["image"];
    $nom = $_POST["nom"];
    $ecole = $_POST["ecole"];
    $classe = $_POST["classe"];
    $telephone = $_POST["telephone"];

    try {
        // Requête d'insertion
        $sql = "INSERT INTO crud_php1 (image, name, ecole, classe, tel_parent) VALUES (:image, :nom, :ecole, :classe, :telephone)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":image", $image);
        $stmt->bindParam(":nom", $nom);
        $stmt->bindParam(":ecole", $ecole);
        $stmt->bindParam(":classe", $classe);
        $stmt->bindParam(":telephone", $telephone);

        // Exécution de la requête d'insertion
        if ($stmt->execute()) {
            // Redirection vers la page principale après l'ajout
            header("Location: index.php");
            exit();
        } else {
            echo "Erreur lors de l'ajout : " . $stmt->errorInfo()[2];
        }
    } catch (PDOException $e) {
        echo "Erreur de connexion à la base de données : " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter Élève</title>
    <!-- Inclure les styles CSS nécessaires ici -->
</head>

<body>
    <h1>Ajouter Élève</h1>
    <form method="post">
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
        <button type="submit">Ajouter</button>
    </form>
</body>

</html>

