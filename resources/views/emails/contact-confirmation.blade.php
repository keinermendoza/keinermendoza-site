<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Obrigado pelo seu contato</title>
</head>
<body style="margin: 0; padding: 0; background-color: #f4f4f7; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; color: #333333;">

    <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px; margin: 20px auto; background-color: #ffffff; border-radius: 8px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05); border: 1px solid #e8e8e8;">

        <tr>
            <td style="padding: 30px 40px; background-color: #2563eb; border-top-left-radius: 8px; border-top-right-radius: 8px; text-align: center;">
                <h1 style="margin: 0; color: #ffffff; font-size: 22px; font-weight: 600; letter-spacing: 0.5px;">
                    Obrigado pelo seu contato!
                </h1>
            </td>
        </tr>

        <tr>
            <td style="padding: 40px;">
                <p style="margin: 0 0 16px 0; font-size: 16px; line-height: 1.6; color: #374151;">
                    Olá, tudo bem?
                </p>
                <p style="margin: 0 0 20px 0; font-size: 16px; line-height: 1.6; color: #4b5563;">
                    Confirmamos que a sua mensagem foi recebida com sucesso. Muito obrigado por visitar o meu site e demonstrar interesse no meu trabalho!
                </p>
                <p style="margin: 0 0 24px 0; font-size: 16px; line-height: 1.6; color: #4b5563;">
                    Em breve entrarei em contato com você, caso seja necessário.
                </p>

                <div style="background-color: #f8fafc; border-left: 4px solid #94a3b8; padding: 20px; border-radius: 4px; margin-bottom: 24px;">
                    <h3 style="margin: 0 0 10px 0; font-size: 13px; text-transform: uppercase; letter-spacing: 0.5px; color: #64748b;">
                        Cópia da mensagem enviada:
                    </h3>
                    <p style="margin: 0; font-size: 14px; line-height: 1.6; color: #475569; font-style: italic; white-space: pre-line;">
                        "{{ $contactMessage->content }}"
                    </p>
                </div>

                <p style="margin: 40px 0 0 0; font-size: 15px; color: #1e293b; font-weight: 500;">
                    Atenciosamente,<br>
                    <span style="color: #2563eb;">Keiner Mendoza</span>
                </p>
            </td>
        </tr>

        <tr>
            <td style="padding: 20px 40px; background-color: #f8fafc; border-bottom-left-radius: 8px; border-bottom-right-radius: 8px; text-align: center; border-top: 1px solid #e2e8f0;">
                <p style="margin: 0; font-size: 12px; color: #94a3b8;">
                    Este é um e-mail automático de confirmação. Por favor, não responda a esta mensagem.
                </p>
            </td>
        </tr>

    </table>

</body>
</html>
