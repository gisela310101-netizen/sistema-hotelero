<!DOCTYPE html>
<html lang="es">
<head>
    <title>Mundo azul viajes</title>
    <style>
        body {
            font-family: 'Inter', Arial, sans-serif;
            background: #e8f4f8;
            padding: 20px;
        }
        h1 {
            font-family: 'Playfair Display', serif;
            text-align: center;
            color: #0c4a6e;
            letter-spacing: 0.5px;
            margin-bottom: 24px;
        }
        .toolbar {
            display: flex;
            justify-content: flex-end;
            margin-bottom: 16px;
        }
        .btn-nueva-reserva {
            display: inline-block;
            background: #0284c7;
            color: #e0f2fe;
            padding: 10px 22px;
            border-radius: 8px;
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
            transition: background 0.2s;
        }
        .btn-nueva-reserva:hover { background: #0369a1; }
        table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            background: rgba(255, 255, 255, 0.85);
            border-radius: 14px;
            overflow: hidden;
            border: 1px solid #bae6fd;
        }
        th, td { padding: 14px 16px; text-align: center; }
        th {
            background: #0284c7;
            color: #e0f2fe;
            font-size: 13px;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        td { color: #0c4a6e; font-size: 14px; border-bottom: 1px solid #bae6fd; }
        tr:last-child td { border-bottom: none; }
        tr:nth-child(even) td { background: rgba(186, 230, 253, 0.2); }
        tr:hover td { background: rgba(14, 165, 233, 0.1); transition: background 0.2s; }
        img { width: 70px; height: 70px; object-fit: contain; border-radius: 8px; border: 1px solid #bae6fd; }
    </style>
</head>
<body>

    <h1>Mundo azul viajes</h1>

    <div class="toolbar">
        <a href="{{ route('reservas.create') }}" class="btn-nueva-reserva">
            + Nueva Reserva
        </a>
    </div>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Imagen</th>
                <th>Nombre del hotel</th>
                <th>Descripción</th>
                <th>Ciudad</th>
                <th>Precio por noche</th>
                <th>Habitaciones disponibles</th>
                <th>Calificación</th>
            </tr>
        </thead>
        <tbody>
            @foreach($hoteles as $hotel)
            <tr>
                <td>{{ $hotel['id'] }}</td>
                <td><img src="{{ $hotel['image'] }}"></td>
                <td>{{ $hotel['title'] }}</td>
                <td>{{ $hotel['body'] }}</td>
                <td>{{ $hotel['ciudad'] }}</td>
                <td>${{ number_format($hotel['precio'], 2) }}</td>
                <td>{{ $hotel['habitaciones'] }}</td>
                <td>{{ $hotel['calificacion'] }}/5</td>
            </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>