<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Nueva Reserva</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600&family=Inter:wght@300;400;500&display=swap" rel="stylesheet">
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: 'Inter', Arial, sans-serif;
            background: #e8f4f8;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 30px 20px;
        }

        .wrap {
            width: 100%;
            max-width: 580px;
        }

        .card {
            background: rgba(255, 255, 255, 0.92);
            border-radius: 16px;
            border: 1px solid #bae6fd;
            padding: 36px 40px;
        }

        h2 {
            font-family: 'Playfair Display', serif;
            font-size: 24px;
            color: #0c4a6e;
            text-align: center;
            margin-bottom: 6px;
            font-weight: 600;
        }

        .subtitulo {
            text-align: center;
            color: #0369a1;
            font-size: 13px;
            margin-bottom: 28px;
        }

        .field {
            margin-bottom: 16px;
        }

        .field label {
            display: block;
            font-size: 13px;
            font-weight: 500;
            color: #0369a1;
            margin-bottom: 6px;
        }

        .field input,
        .field select,
        .field textarea {
            width: 100%;
            padding: 10px 14px;
            border: 1px solid #bae6fd;
            border-radius: 8px;
            font-family: 'Inter', sans-serif;
            font-size: 14px;
            color: #0c4a6e;
            background: #f0f9ff;
            outline: none;
            transition: border 0.2s, background 0.2s;
        }

        .field input:focus,
        .field select:focus,
        .field textarea:focus {
            border-color: #0284c7;
            background: #ffffff;
        }

        .field textarea {
            resize: vertical;
            min-height: 90px;
        }

        .row2 {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 14px;
        }

        .btn-submit {
            width: 100%;
            padding: 13px;
            border-radius: 10px;
            background: #0284c7;
            color: #e0f2fe;
            border: none;
            font-family: 'Inter', sans-serif;
            font-size: 15px;
            font-weight: 500;
            cursor: pointer;
            letter-spacing: 0.3px;
            margin-top: 10px;
            transition: background 0.2s;
        }

        .btn-submit:hover { background: #0369a1; }
        .btn-submit:active { transform: scale(0.98); }

        .alert {
            border-radius: 8px;
            padding: 12px 16px;
            font-size: 13px;
            margin-bottom: 18px;
        }

        .alert.success {
            background: #e0f2fe;
            color: #0369a1;
            border: 1px solid #bae6fd;
        }

        .alert.error {
            background: #fee2e2;
            color: #991b1b;
            border: 1px solid #fca5a5;
        }

        .btn-volver {
            display: block;
            text-align: center;
            margin-top: 16px;
            font-size: 13px;
            color: #0369a1;
            text-decoration: none;
        }

        .btn-volver:hover { text-decoration: underline; }
    </style>
</head>
<body>
    <div class="wrap">
        <div class="card">
            <h2>🌴 Nueva reserva turística</h2>
            <p class="subtitulo">Completa los datos para registrar tu reserva</p>

            @if(session('success'))
                <div class="alert success">{{ session('success') }}</div>
            @endif
            @if(session('error'))
                <div class="alert error">{{ session('error') }}</div>
            @endif

            <form action="{{ route('reservas.create') }}" method="POST">
                @csrf
                <div class="field">
                    <label>Hotel / Destino</label>
                    <input type="text" name="titulo" placeholder="Hotel Playa Azul, Cartagena" required>
                </div>
                <div class="row2">
                    <div class="field">
                        <label>Fecha de llegada</label>
                        <input type="date" name="fecha_llegada" required>
                    </div>
                    <div class="field">
                        <label>Fecha de salida</label>
                        <input type="date" name="fecha_salida" required>
                    </div>
                </div>
                <div class="row2">
                    <div class="field">
                        <label>Número de personas</label>
                        <input type="number" name="personas" min="1" max="20" required>
                    </div>
                    <div class="field">
                        <label>Ciudad destino</label>
                        <select name="ciudad">
                            <option value="">Seleccionar...</option>
                            <option>Cartagena</option>
                            <option>Santa Marta</option>
                            <option>San Andrés</option>
                        </select>
                    </div>
                </div>
                <div class="field">
                    <label>Descripción</label>
                    <textarea name="descripcion" placeholder="Notas adicionales..."></textarea>
                </div>
                <button type="submit" class="btn-submit">Enviar reserva</button>
            </form>
           

        </div>
    </div>
</body>
</html>