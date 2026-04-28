<!DOCTYPE html>
<html>

<body style="font-family: Arial, sans-serif; padding:20px; background:#f5f5f5;">

    <div style="max-width:640px; margin:0 auto; background:white; padding:24px; border-radius:10px;">

        <h2 style="margin-top:0;">Nou recurs publicat</h2>

        <h1 style="font-size:24px; margin-bottom:12px;">
            {{ $resource['title'] }}
        </h1>

        <p style="font-size:16px; line-height:1.5;">
            {{ $resource['excerpt'] }}
        </p>

        <p>
            <a href="{{ $resource['url'] }}"
                style="display:inline-block; padding:12px 18px; background:#111; color:#fff; text-decoration:none; border-radius:6px;">
                Llegir recurs
            </a>
        </p>

        <hr style="margin:30px 0; border:none; border-top:1px solid #ddd;">

        <p style="font-size:12px; color:#777;">
            Reps aquest correu perquè t’has subscrit a la newsletter de Guillem Vila.
        </p>

        <p style="font-size:12px;">
            <a href="{{ config('app.url') }}/api/newsletter/unsubscribe/{{ $subscriber->unsubscribe_token }}">
                Donar-me de baixa
            </a>
        </p>

    </div>

</body>

</html>