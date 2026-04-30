<!DOCTYPE html>
<html>

<body style="font-family: Arial, sans-serif; padding:20px;">

    <h2>Confirma la teva subscripció</h2>

    <p>Fes clic al botó per confirmar:</p>

    <a href="{{ rtrim(config('app.frontend_url'), '/') }}/subscribe/confirmed?token={{ urlencode($subscriber->confirmation_token) }}"
        style="display:inline-block;padding:10px 20px;background:black;color:white;text-decoration:none;">
        Confirmar subscripció
    </a>

    <p>Aquest enllaç caduca en 24 hores.</p>

</body>

</html>
