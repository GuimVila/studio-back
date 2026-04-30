<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Nou contacte</title>
</head>

<body style="font-family: Arial, sans-serif; background:#f5f5f5; padding:20px;">

    <div style="max-width:600px; margin:0 auto; background:white; padding:20px; border-radius:8px;">

        <h2 style="margin-top:0;">Nou contacte des de la web</h2>

        <p><strong>Nom:</strong> {{ $data['name'] }}</p>
        <p><strong>Email:</strong> {{ $data['email'] }}</p>
        @if (!empty($data['phone']))
            <p><strong>Telèfon:</strong> {{ $data['phone'] }}</p>
        @endif
        @if (!empty($data['service']))
            <p><strong>Servei:</strong> {{ $data['service'] }}</p>
        @endif
        <p><strong>Missatge:</strong></p>

        <div style="background:#f9f9f9; padding:10px; border-radius:5px;">
            {{ $data['message'] }}
        </div>

    </div>

</body>
</html>
