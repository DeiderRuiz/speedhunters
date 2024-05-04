<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <style>
        nav {
            background-color: #E51A4C;
            display: flex;
            justify-content: space-between;
            align-items: center;
            height:50px;
        }
    </style>
</head>
<body>
    <nav>
        <table style="width:100%;">
            <tr>
                <td style="text-align:left; color:white;">SPEEDHUNTERS</td>
                <td style="text-align:right; color:white;">Solicitud de financiación</td>
            </tr>
        </table>
    </nav>
    <div style="display: flex; flex; flex-direction: row;">
        <table style="width:70%; background-color:white; color:black;">
            <tr>
                <td style="text-align:left;">Cliente:</td>
                <td style="text-align:right;">{{ $cotizacion->user->name }} {{ $cotizacion->user->last_name }}</td>
            </tr>
            <tr>
                <td style="text-align:left;">CC:</td>
                <td style="text-align:right;">{{ $cotizacion->user->cc }}</td>
            </tr>
            <tr>
                <td style="text-align:left;">Telefono:</td>
                <td style="text-align:right;">{{ $cotizacion->user->cellphone }}</td>
            </tr>
            <tr>
                <td style="text-align:left;">Correo Electronico:</td>
                <td style="text-align:right;">{{ $cotizacion->user->email }}</td>
            </tr>
        </table>
        <hr style="width:70%">
        <table style="width:70%; background-color:white; color:black;">
            <tr>
                <td style="text-align:left;">Auto a Cotizar:</td>
                <td style="text-align:right;">{{ $cotizacion->auto->marca }} {{ $cotizacion->auto->modelo }} {{ $cotizacion->auto->years }}</td>
            </tr>
            <tr>
                <td style="text-align:left;">Valor:</td>
                <td style="text-align:right;">${{ $cotizacion->auto->precio }} COP</td>
            </tr>
            <tr>
                <td style="text-align:left;">Fecha estimada de financiación:</td>
                <td style="text-align:right;">{{ $cotizacion->fecha }}</td>
            </tr>
        </table>
        <div style="width:30%;">
            <img src="{{ $cotizacion->auto->imagen }}" alt="{{ $cotizacion->auto->marca }} {{ $cotizacion->auto->modelo }}" style="width:100%;">
        </div>
    </div>
</body>
</html>