<?php
$msg_erreur = "Erreur. Les champs suivants doivent être remplis :<br/><br/>";
$msg_ok = "Votre demande a bien été prise en compte.";
$message = $msg_erreur;
define('MAIL_DESTINATAIRE','elodiehak@gmail.com');
define('MAIL_SUJET','Message du formulaire de example.com');

// vérification des champs

if (empty($_POST['nom'])) 
    $message .= "Votre nom<br/>";
if (empty($_POST['email'])) 
    $message .= "Votre adresse mail<br/>";
if (empty($_POST['comments'])) 
    $message .= "Votre message<br/>";

// si un champ est vide, on affiche le message d'erreur et on stoppe le script
if (strlen($message) > strlen($msg_erreur)) {
    echo $message; die();
}

// sinon c'est ok => on continue
foreach($_POST as $index => $valeur) {
    $$index = stripslashes(trim($valeur));
}

$opt_str = ['flags' => [FILTER_FLAG_NO_ENCODE_QUOTES]];
$sujet = filter_input(INPUT_POST, 'sujet', FILTER_SANITIZE_STRING, $opt_str);

//Préparation de l'entête du mail:
$mail_entete  = "MIME-Version: 1.0\r\n";
$mail_entete .= "From: $nom "
    ."<{$_POST['email']}>\r\n";
$mail_entete .= 'Reply-To: '.$email."\r\n";
$mail_entete .= 'Content-Type: text/plain; charset="iso-8859-1"';
$mail_entete .= "\r\nContent-Transfer-Encoding: 8bit\r\n";
$mail_entete .= 'X-Mailer:PHP/' . phpversion()."\r\n";

// préparation du corps du mail
$mail_corps  = "Message de : $nom\n";
$mail_corps .= "Email : $email\n";
$mail_corps .= "Sujet : $sujet\n\n\n\n";
$mail_corps .= $comments;

// envoi du mail
if (mail(MAIL_DESTINATAIRE,MAIL_SUJET,$mail_corps,$mail_entete)) {
    //Le mail est bien expédié
    echo $msg_ok;
} else {
    //Le mail n'a pas été expédié
    echo "Une erreur est survenue lors de l'envoi du formulaire par email";
}

?>

