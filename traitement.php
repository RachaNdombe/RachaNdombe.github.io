<?php
include 'db_connection.php'; // inclusion du fichier de la connection

require 'vendor/autoload.php';

// Vérification si le formulaire est soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = htmlspecialchars(trim($_POST["nom"]));
    $email = htmlspecialchars(trim($_POST["mail"]));
    $message = htmlspecialchars(trim($_POST["message"]));

    // Validation du nom : doit contenir uniquement des lettres
    if (!preg_match("/^[a-zA-Zà-ÿÀ-ÿ\s-]+$/", $nome)) {
        die(" <h2>Le nom ne doit contenir que des lettres, espaces et tirets.</h2>");
    }

    // Validation de l'email : vérification de la validité de l'email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die(" <h2>L'adresse email est invalide. </h2>");
    }

    // Vérifier que les champs ne sont pas vides
    if (!empty($nome) && !empty($email) && !empty($message)) {
        // Insérer les données dans la base de données
        $stmt = $connexion->prepare("INSERT INTO utilisateurs (Nom, Email, Message) VALUES (:nom, :email, :message)");
        $stmt->execute([
            ':nom' => $nome,
            ':email' => $email,
            ':message' => $message
        ]);
        
        // Message de succès ou redirection
        echo" <h2>Le massage envoyé avec succès.</h2>";
        $nome = $email = $message = "";
    }
}



$nom = $_POST['nom'];
$mail = $_POST['mail'];
$message = $_POST['message'];

$message = "Nom : ".$nom."\n"."mail : ".$mail. "\n"."message : ".$message;

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'rachelndombe64@gmail.com';                     //SMTP username
    $mail->Password   = 'mtpq dvuw iksg baxd';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('from@example.com', 'Apps');
    $mail->addAddress('rachelndombe64@gmail.com');     //Add a recipient
   
    $mail->SMTPDebug = 0;

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Here is the subject';
    $mail->Body    = $message;
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    //echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

?>