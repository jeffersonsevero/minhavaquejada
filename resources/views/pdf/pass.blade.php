<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Ficha de Inscrição</title>
</head>

<body style="font-family: Arial, sans-serif; margin: 10px; background: #fff; color: #333; ">


    @for ($i = 0; $i < 3; $i++)
        <div
            style="border: 2px solid #000; border-radius: 10px; padding: 20px; max-width: 800px; margin: auto; margin-bottom: 10px;">

            <!-- Header -->
            <table style="width: 100%; margin-bottom: 5px;">
                <tr>

                    <td style="width: 50%; text-align: right;">
                        <div
                            style="border: 2px solid #000; border-radius: 10px; padding: 8px 12px; display: inline-block; text-align: center;">
                            <span style="display: block; font-size: 12px; color: #555;">Inscrição Nº</span>
                            <strong style="font-size: 14px;"> {{ $record->pass->number }} </strong>
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

            {{-- <!-- Disputa -->
        <div style="border: 2px solid #000; border-radius: 8px; padding: 10px; margin-top: 20px;">
            <div style="font-weight: bold; margin-bottom: 8px;">Disputa</div>

            <table style="border-spacing: 5px;">
                <tr>
                    <td style="width:30px;height:30px;border:2px solid #000;border-radius:4px;"></td>
                    <td style="width:30px;height:30px;border:2px solid #000;border-radius:4px;"></td>
                    <td style="width:30px;height:30px;border:2px solid #000;border-radius:4px;"></td>
                    <td style="width:30px;height:30px;border:2px solid #000;border-radius:4px;"></td>
                    <td style="width:30px;height:30px;border:2px solid #000;border-radius:4px;"></td>
                    <td style="width:30px;height:30px;border:2px solid #000;border-radius:4px;"></td>
                    <td style="width:30px;height:30px;border:2px solid #000;border-radius:4px;"></td>
                    <td style="width:30px;height:30px;border:2px solid #000;border-radius:4px;"></td>
                </tr>
            </table>
        </div> --}}

            <!-- Footer -->
            <div style="margin-top: 10px; text-align: right; font-style: italic; font-size: 12px; color: #555;">
                Criado em: 21/06/2025 22:09
            </div>

        </div>
    @endfor



</body>

</html>
