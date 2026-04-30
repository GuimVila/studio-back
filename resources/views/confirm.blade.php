<!DOCTYPE html>
<html>

<body style="font-family: Arial, sans-serif; padding:20px;">

    <h2>Confirma la teva subscripció</h2>

    <p>Fes clic al botó per confirmar:</p>

    <table role="presentation" cellspacing="0" cellpadding="0" border="0">
        <tr>
            <td bgcolor="#111111" style="border-radius:6px;">
                <a href="{{ $confirmationUrl }}"
                    style="display:inline-block;padding:12px 20px;font-family:Arial,sans-serif;font-size:16px;line-height:20px;color:#ffffff;text-decoration:none;border-radius:6px;">
                    Confirmar subscripció
                </a>
            </td>
        </tr>
    </table>

    <p>Aquest enllaç caduca en 24 hores.</p>

    <p style="font-size:13px;color:#555;line-height:1.5;">
        Si el botó no funciona, copia i enganxa aquest enllaç al navegador:<br>
        <a href="{{ $confirmationUrl }}" style="color:#111111;word-break:break-all;">
            {{ $confirmationUrl }}
        </a>
    </p>

</body>

</html>
