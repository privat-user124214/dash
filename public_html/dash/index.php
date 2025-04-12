<?php
include('config.php');
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Discord Login</title>
    <link rel="stylesheet" href="style.css"> <!-- Dein Style-Link -->
</head>
<body>
    <div class="container">
        <h1>Willkommen bei Novarix Studio</h1>
        <p>Bitte melde dich mit Discord an, um fortzufahren:</p>
        <a href="https://discord.com/oauth2/authorize?client_id=<?php echo CLIENT_ID; ?>&redirect_uri=<?php echo urlencode(REDIRECT_URI); ?>&response_type=code&scope=identify+guilds+email+guilds.members.read+bot+applications.commands+webhook.incoming+connections">Mit Discord anmelden</a>
    </div>
</body>
</html>
