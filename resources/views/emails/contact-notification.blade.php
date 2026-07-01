<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nova Mensagem de Contato</title>
</head>
<body style="margin: 0; padding: 0; background-color: #f4f4f7; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; color: #333333;">

    <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px; margin: 20px auto; background-color: #ffffff; border-radius: 8px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05); border: 1px solid #e8e8e8;">

        <tr>
            <td style="padding: 30px 40px; background-color: #1e293b; border-top-left-radius: 8px; border-top-right-radius: 8px; text-align: center;">
                <h1 style="margin: 0; color: #ffffff; font-size: 22px; font-weight: 600; letter-spacing: 0.5px;">
                    Nova Mensagem de Contato
                </h1>
            </td>
        </tr>

        <tr>
            <td style="padding: 40px;">
                <p style="margin-0 0 20px 0; font-size: 16px; line-height: 1.5; color: #4b5563;">
                    Olá, administrador. Você recebeu uma nova mensagem através del formulário de contato do seu site.
                </p>

                <table border="0" cellpadding="0" cellspacing="0" width="100%" style="margin-bottom: 30px; border-collapse: collapse;">
                    <tr>
                        <td style="padding: 10px 0; border-bottom: 1px solid #f3f4f6; font-size: 14px; font-weight: bold; color: #1f2937; width: 30%;">
                            E-mail:
                        </td>
                        <td style="padding: 10px 0; border-bottom: 1px solid #f3f4f6; font-size: 14px; color: #4b5563;">
                            <a href="mailto:{{ $contactMessage->email }}" style="color: #2563eb; text-decoration: none;">
                                {{ $contactMessage->email }}
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding: 10px 0; border-bottom: 1px solid #f3f4f6; font-size: 14px; font-weight: bold; color: #1f2937;">
                            Telefone:
                        </td>
                        <td style="padding: 10px 0; border-bottom: 1px solid #f3f4f6; font-size: 14px; color: #4b5563;">
                            {{ $contactMessage->phone ?? 'Não informado' }}
                        </td>
                    </tr>
                    <tr>
                        <td style="padding: 10px 0; border-bottom: 1px solid #f3f4f6; font-size: 14px; font-weight: bold; color: #1f2937;">
                            Data de envio:
                        </td>
                        <td style="padding: 10px 0; border-bottom: 1px solid #f3f4f6; font-size: 14px; color: #4b5563;">
                            {{ $contactMessage->created_at?->format('d/m/Y H:i') }}
                        </td>
                    </tr>
                </table>

                <div style="background-color: #f8fafc; border-left: 4px solid #3b82f6; padding: 20px; border-radius: 4px;">
                    <h3 style="margin: 0 0 10px 0; font-size: 14px; text-transform: uppercase; letter-spacing: 0.5px; color: #64748b;">
                        Conteúdo da Mensagem:
                    </h3>
                    <p style="margin: 0; font-size: 15px; line-height: 1.6; color: #334155; white-space: pre-line;">
                        {{ $contactMessage->content }}
                    </p>
                </div>
            </td>
        </tr>

        <tr>
            <td style="padding: 20px 40px; background-color: #f8fafc; border-bottom-left-radius: 8px; border-bottom-right-radius: 8px; text-align: center; border-top: 1px solid #e2e8f0;">
                <p style="margin: 0; font-size: 12px; color: #94a3b8;">
                    Este é um e-mail automático gerado pelo sistema do seu portfólio.
                </p>
            </td>
        </tr>

    </table>

</body>
</html>
