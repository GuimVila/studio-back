<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Nou contacte</title>
</head>

@php
    $replySubject = rawurlencode('Resposta al teu missatge a Guillem Vila Studio');
    $replyUrl = 'mailto:' . $data['email'] . '?subject=' . $replySubject;
@endphp

<body style="margin:0; padding:0; background:#0a0a0a; font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Arial,sans-serif; color:#ffffff;">
    <div style="display:none; max-height:0; overflow:hidden; opacity:0; color:transparent;">
        Nou contacte de {{ $data['name'] }} des de la web.
    </div>

    <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0" style="background:#0a0a0a;">
        <tr>
            <td align="center" style="padding:32px 16px;">
                <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0" style="max-width:680px;">
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
                                    <td style="padding:34px 32px 30px 32px;">
                                        <p style="margin:0 0 10px 0; color:#d08a3f; font-size:13px; font-weight:800; letter-spacing:0.12em; text-transform:uppercase;">
                                            Nou contacte web
                                        </p>

                                        <h1 style="margin:0 0 24px 0; color:#ffffff; font-size:30px; line-height:1.2; font-weight:900;">
                                            {{ $data['name'] }}
                                        </h1>

                                        <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0" style="margin:0 0 26px 0;">
                                            <tr>
                                                <td style="padding:14px 16px; background:#1a1a1a; border:1px solid rgba(255,255,255,0.10); border-radius:12px;">
                                                    <p style="margin:0 0 4px 0; color:#777777; font-size:12px; text-transform:uppercase; letter-spacing:0.08em;">Email</p>
                                                    <a href="mailto:{{ $data['email'] }}" style="color:#e3a85f; font-size:15px; text-decoration:none;">{{ $data['email'] }}</a>
                                                </td>
                                            </tr>

                                            @if (!empty($data['phone']))
                                                <tr>
                                                    <td style="height:10px; line-height:10px;">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td style="padding:14px 16px; background:#1a1a1a; border:1px solid rgba(255,255,255,0.10); border-radius:12px;">
                                                        <p style="margin:0 0 4px 0; color:#777777; font-size:12px; text-transform:uppercase; letter-spacing:0.08em;">Telèfon</p>
                                                        <a href="tel:{{ $data['phone'] }}" style="color:#ffffff; font-size:15px; text-decoration:none;">{{ $data['phone'] }}</a>
                                                    </td>
                                                </tr>
                                            @endif

                                            @if (!empty($data['service']))
                                                <tr>
                                                    <td style="height:10px; line-height:10px;">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td style="padding:14px 16px; background:#1a1a1a; border:1px solid rgba(255,255,255,0.10); border-radius:12px;">
                                                        <p style="margin:0 0 4px 0; color:#777777; font-size:12px; text-transform:uppercase; letter-spacing:0.08em;">Servei</p>
                                                        <p style="margin:0; color:#ffffff; font-size:15px;">{{ $data['service'] }}</p>
                                                    </td>
                                                </tr>
                                            @endif
                                        </table>

                                        <div style="margin:0 0 28px 0; padding:20px; background:#0f0f0f; border-left:4px solid #d08a3f; border-radius:12px;">
                                            <p style="margin:0 0 10px 0; color:#777777; font-size:12px; text-transform:uppercase; letter-spacing:0.08em;">Missatge</p>
                                            <div style="color:#f5f5f5; font-size:16px; line-height:1.7;">
                                                {!! nl2br(e($data['message'])) !!}
                                            </div>
                                        </div>

                                        <table role="presentation" cellspacing="0" cellpadding="0" border="0">
                                            <tr>
                                                <td align="center" bgcolor="#d08a3f" style="border-radius:10px; box-shadow:0 12px 28px rgba(208,138,63,0.28);">
                                                    <a href="{{ $replyUrl }}"
                                                        style="display:inline-block; padding:14px 24px; color:#0a0a0a; font-size:16px; line-height:20px; font-weight:800; text-decoration:none; border-radius:10px;">
                                                        Respondre
                                                    </a>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <tr>
                        <td style="padding:18px 4px 0 4px; color:#777777; font-size:12px; line-height:1.5; text-align:center;">
                            Missatge rebut des del formulari de contacte de guillemvila.com.
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>

</body>

</html>
