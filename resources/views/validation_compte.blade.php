<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Bonjour {{$data["name"]}}</h1>
    <p>Nous avons reçu une demande de validation pour votre compte {{$data["name_compte"]}}.</p>
    <p> Veuillez utiliser le code de validation ci-dessous pour confirmer votre compte :</p>
    <h4>Code de validation : </h4>
    <h2>{{$data["code"]}}</h2>
    <p>Si vous n'avez pas demandé de validation de compte,</p>
    <p> veuillez nous contacter immédiatement à l'adresse suivante : </p>
    <h3>developpeur_anass@gmail.com</h3>
    <h3>Cordialement,</h3>
    <h3>L'équipe de TELL_ME</h3>

</body>
</html>