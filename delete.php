<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer l'ID de l'élève à supprimer
    $id = $_POST["id"];

    try {
        // Connexion à la base de données
        $pdo = new PDO('mysql:host=localhost;port=3306;dbname=git_github_php', 'root', '');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Requête de suppression
        $sql = "DELETE FROM crud_php1 WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);

        // Exécution de la requête de suppression
        if ($stmt->execute()) {
            // Redirection vers la page principale après la suppression
            header("Location: index.php");
            exit();
        } else {
            echo "Erreur lors de la suppression : " . $stmt->errorInfo()[2];
        }
    } catch (PDOException $e) {
        echo "Erreur de connexion à la base de données : " . $e->getMessage();
    }
} else {
    // Redirection si la page est accédée directement sans la méthode POST
    header("Location: index.php");
    exit();
}
?>
