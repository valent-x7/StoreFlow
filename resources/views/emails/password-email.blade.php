<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>¿Olvidaste tu contraseña?</title>
</head>
<body style="margin: 0; padding: 0; background-color: #f4f4f4;">
    <table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tr>
            <td align="center" style="padding: 20px;">
                <table border="0" cellpadding="0" cellspacing="0" style="width: 600px; border-collapse: collapse; background-color: #ffffff; border-radius: 8px; box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);">
                    {{-- <tr>
                        <td align="center" style="padding: 40px 0;">
                            <img src="{{ asset('images/storeflow.png') }}" alt="Logo de la empresa" width="150" style="display: block;">
                        </td>
                    </tr> --}}
                    <tr>
                        <td style="padding: 0 40px 30px;">
                            <h1 style="font-size: 24px; color: #202020; margin-bottom: 20px; font-weight: bold; font-family: sans-serif;">¿Olvidaste tu contraseña?</h1>
                            <p style="font-size: 16px; color: #555555; line-height: 1.6; margin-bottom: 25px; font-family: sans-serif;">
                                ¡No te preocupes! Hemos recibido una solicitud para restablecer la contraseña de tu cuenta. Haz clic en el botón de abajo para crear una nueva contraseña:
                            </p>
                            <table width="100%" border="0" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td align="center" style="padding: 20px 0;">
                                        <a href="{{ $resetLink }}" style="background-color: #4285F4; color: #ffffff; text-decoration: none; padding: 15px 30px; border-radius: 5px; font-size: 16px; font-weight: bold; font-family: sans-serif; display: inline-block;">
                                            Restablecer mi contraseña
                                        </a>
                                    </td>
                                </tr>
                            </table>
                            <p style="font-size: 16px; color: #555555; line-height: 1.6; margin-top: 25px; font-family: sans-serif;">
                                Si no solicitaste este restablecimiento de contraseña, puedes ignorar este correo electrónico de forma segura. Tu contraseña permanecerá sin cambios.
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding: 30px 40px; background-color: #f9f9f9; border-bottom-left-radius: 8px; border-bottom-right-radius: 8px;">
                            <p style="font-size: 14px; color: #777777; line-height: 1.4; margin-bottom: 10px; font-family: sans-serif;">
                                Saludos cordiales,
                                <br>
                                El equipo de StoreFlow
                            </p>
                            <p style="font-size: 12px; color: #999999; font-family: sans-serif;">
                                Este es un correo electrónico generado automáticamente. Por favor, no respondas a este mensaje.
                            </p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>