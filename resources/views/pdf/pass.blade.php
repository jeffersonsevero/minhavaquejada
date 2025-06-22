<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Ficha de Inscrição</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background: #fff;
            color: #333;
        }

        .card {
            border: 2px solid #000;
            border-radius: 10px;
            padding: 20px;
            max-width: 800px;
            margin: auto;
            position: relative;
        }

        .top-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
        }

        .logo {
            max-width: 150px;
        }

        .logo img {
            width: 100%;
            height: auto;
        }

        .inscricao-num {
            border: 2px solid #000;
            border-radius: 10px;
            padding: 8px 12px;
            text-align: center;
            font-size: 14px;
        }

        .inscricao-num span {
            display: block;
            font-size: 12px;
            color: #555;
        }

        .header {
            text-align: center;
            font-weight: bold;
            font-size: 22px;
            margin-bottom: 15px;
        }

        .info {
            margin-bottom: 12px;
        }

        .info label {
            font-weight: bold;
            color: #000;
        }

        .info span {
            font-style: italic;
        }

        .disputa {
            border: 2px solid #000;
            border-radius: 8px;
            padding: 10px;
            margin-top: 20px;
        }

        .disputa-title {
            font-weight: bold;
            margin-bottom: 8px;
        }

        .boxes {
            display: flex;
            gap: 8px;
            flex-wrap: wrap;
        }

        .box {
            width: 30px;
            height: 30px;
            border: 2px solid #000;
            border-radius: 4px;
        }

        .footer {
            margin-top: 10px;
            text-align: right;
            font-style: italic;
            font-size: 12px;
            color: #555;
        }
    </style>
</head>

<body>

    <div class="card">
        <div class="top-bar">
            <div class="logo">
                <img
                    src="{{ asset('images/cavalo.png') }}"
                    alt="Logo da Vaquejada"
                    style="width: 100px"
                >
            </div>
            <div class="inscricao-num">
                <span>Inscrição Nº</span>
                <strong>0001</strong>
            </div>
        </div>

        <div class="header">Ficha de Inscrição - Vaquejada</div>

        <div class="info"><label>Vaqueiro:</label> <span> {{ $record->titular->name }} </span></div>
        <div class="info"><label>Esteira:</label> <span> {{ $record->helper->name }} </span></div>
        <div class="info"><label>Representação:</label> <span> {{ $record->representation->name }} </span></div>
        <div class="info"><label>Categoria:</label> <span> {{ $record->pass->category->name }} </span></div>
        <div class="info"><label>Cavalo:</label> <span> {{ $record->horse }} </span></div>

        <div class="disputa">
            <div class="disputa-title">Disputa</div>
            <div class="boxes">
                <div class="box"></div>
                <div class="box"></div>
                <div class="box"></div>
                <div class="box"></div>
                <div class="box"></div>
                <div class="box"></div>
                <div class="box"></div>
                <div class="box"></div>
            </div>
        </div>

        <div class="footer">Criado em: 21/06/2025 22:09</div>
    </div>

</body>

</html>
