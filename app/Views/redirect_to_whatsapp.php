<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="refresh" content="0; url=<?= $url ?>">
    <title>Redirigiendo a WhatsApp...</title>
</head>
<body>
    <p>Redirigiendo a WhatsApp...</p>
    <p>Si no eres redirigido automáticamente, haz clic en el siguiente enlace: <a href="<?= $url ?>">Abrir WhatsApp</a></p>
    <script type="text/javascript">
        window.location.href = "<?= $url ?>";
    </script>
</body>
</html>
