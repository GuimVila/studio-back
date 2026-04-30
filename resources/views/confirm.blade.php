<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Confirma la teva subscripció</title>
</head>

<body style="margin:0; padding:0; background:#0a0a0a; font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Arial,sans-serif; color:#ffffff;">
    <div style="display:none; max-height:0; overflow:hidden; opacity:0; color:transparent;">
        Confirma la teva subscripció a la newsletter de Guillem Vila.
    </div>

    <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0" style="background:#0a0a0a;">
        <tr>
            <td align="center" style="padding:32px 16px;">
                <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0" style="max-width:640px;">
                    <tr>
                        <td style="padding:0 0 20px 0; text-align:left;">
                            <div style="font-size:13px; letter-spacing:0.16em; text-transform:uppercase; color:#d08a3f; font-weight:700;">
                                Guillem Vila Studio
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td style="background:#141414; border:1px solid rgba(255,255,255,0.12); border-radius:18px; overflow:hidden;">
                            <div style="height:5px; background:#d08a3f; line-height:5px;">&nbsp;</div>

                            <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0">
                                <tr>
                                    <td style="padding:36px 32px 30px 32px;">
                                        <h1 style="margin:0 0 14px 0; color:#ffffff; font-size:32px; line-height:1.15; font-weight:900;">
                                            Confirma la teva subscripció
                                        </h1>

                                        <p style="margin:0 0 26px 0; color:#b0b0b0; font-size:16px; line-height:1.65;">
                                            Un últim pas per rebre novetats, recursos i contingut sobre producció, mescla i so.
                                        </p>

                                        <table role="presentation" cellspacing="0" cellpadding="0" border="0" style="margin:0 0 26px 0;">
                                            <tr>
                                                <td align="center" bgcolor="#d08a3f" style="border-radius:10px; box-shadow:0 12px 28px rgba(208,138,63,0.28);">
                                                    <a href="{{ $confirmationUrl }}"
                                                        style="display:inline-block; padding:14px 24px; color:#0a0a0a; font-size:16px; line-height:20px; font-weight:800; text-decoration:none; border-radius:10px;">
                                                        Confirmar subscripció
                                                    </a>
                                                </td>
                                            </tr>
                                        </table>

                                        <p style="margin:0 0 18px 0; color:#b0b0b0; font-size:14px; line-height:1.6;">
                                            Aquest enllaç caduca en 24 hores. Si no has sol·licitat aquesta subscripció, pots ignorar aquest correu.
                                        </p>

                                        <div style="padding:16px; background:#1a1a1a; border:1px solid rgba(255,255,255,0.10); border-radius:12px;">
                                            <p style="margin:0 0 8px 0; color:#ffffff; font-size:13px; font-weight:700;">
                                                Si el botó no funciona:
                                            </p>
                                            <a href="{{ $confirmationUrl }}" style="color:#e3a85f; font-size:13px; line-height:1.5; word-break:break-all; text-decoration:underline;">
                                                {{ $confirmationUrl }}
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <tr>
                        <td style="padding:18px 4px 0 4px; color:#777777; font-size:12px; line-height:1.5; text-align:center;">
                            Reps aquest correu perquè t'has subscrit a la newsletter de Guillem Vila.
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>

</body>

</html>
