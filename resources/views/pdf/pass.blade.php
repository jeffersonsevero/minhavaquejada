<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Ficha de Inscrição</title>
</head>

<body style="font-family: Arial, sans-serif; margin: 10px; background: #fff; color: #333;">

    @for ($i = 0; $i < 2; $i++)
        <div
            style="border: 2px solid #000; border-radius: 10px; padding: 20px; max-width: 800px; margin: auto; margin-bottom: 10px; page-break-inside: avoid;">

            <!-- Header -->
            <table style="width: 100%; margin-bottom: 5px; border-collapse: collapse;">
                <tr>
                    <!-- ESQUERDA: LOGO -->
                    <td style="width: 60%; text-align: left; vertical-align: middle;">
                        <img src="{{ public_path('images/cavalo.png') }}" alt="Logo"
                             style="display:block; height:50px; width:auto;">
                    </td>

                    <!-- DIREITA: INSCRIÇÃO -->
                    <td style="width: 50%; text-align: right; vertical-align: middle;">
                        <div style="border: 2px solid #000; border-radius: 10px; padding: 8px 12px; display: inline-block; text-align: center;">
                            <span style="display: block; font-size: 12px; color: #555;">Inscrição Nº</span>
                            <strong style="font-size: 14px;">{{ $record->pass->number }}</strong>
                        </div>
                    </td>
                </tr>
            </table>

            <!-- Título -->
            <div style="text-align: center; font-weight: bold; font-size: 22px; margin-bottom: 15px;">
                Ficha de Inscrição - Vaquejada
            </div>

            <!-- Informações -->
            <div style="margin-bottom: 10px;">
                <label style="font-weight: bold;">Vaqueiro:</label>
                <span style="font-style: italic;">{{ $record->titular->name }}</span>
            </div>
            <div style="margin-bottom: 10px;">
                <label style="font-weight: bold;">Esteira:</label>
                <span style="font-style: italic;">{{ $record->helper->name }}</span>
            </div>
            <div style="margin-bottom: 10px;">
                <label style="font-weight: bold;">Representação:</label>
                <span style="font-style: italic;">{{ $record->representation->name }}</span>
            </div>
            <div style="margin-bottom: 10px;">
                <label style="font-weight: bold;">Categoria:</label>
                <span style="font-style: italic;">{{ $record->pass->category->name }}</span>
            </div>
            <div style="margin-bottom: 10px;">
                <label style="font-weight: bold;">Cavalo:</label>
                <span style="font-style: italic;">{{ $record->horse }}</span>
            </div>

            <!-- Linha com Disputa (esquerda) e Classificação (direita) -->
            <table style="width: 100%; border-collapse: collapse; margin-top: 10px;">
                <tr>
                    <!-- Esquerda: Disputa -->
                    <td style="vertical-align: top; width: 70%;">
                        <label style="font-weight: bold;">Disputa</label>
                        <div style="margin-top:10px; font-size:0;">
                            @for ($j = 1; $j <= 10; $j++)
                                <span style="display:inline-block; border:2px solid #000; width:30px; height:30px; margin-right:5px;"></span>
                            @endfor
                        </div>
                    </td>

                    <!-- Direita: Classificação (números em cima dos quadrados) -->
                    <td style="vertical-align: top; width: 30%; text-align: right;">
                        <label style="font-weight: bold;">Classificação</label>
                        <div style="margin-top:10px; font-size:0;">

                            <!-- Item 1 -->
                            <span style="display:inline-block; text-align:center; margin-right:10px; font-size:12px;">
                                <div style="font-weight:bold; margin-bottom:3px;">1</div>
                                <div style="border:2px solid #000; width:30px; height:30px;"></div>
                            </span>

                            <!-- Item 2 -->
                            <span style="display:inline-block; text-align:center; font-size:12px;">
                                <div style="font-weight:bold; margin-bottom:3px;">2</div>
                                <div style="border:2px solid #000; width:30px; height:30px;"></div>
                            </span>

                        </div>
                    </td>
                </tr>
            </table>

            <!-- Footer -->
            <div style="margin-top: 10px; text-align: right; font-style: italic; font-size: 12px; color: #555;">
                Criado em: {{ $record->created_at->format('d/m/Y H:i') }}
            </div>

        </div>
    @endfor

</body>
</html>
