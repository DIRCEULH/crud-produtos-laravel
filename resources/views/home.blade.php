<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <style>
        body { font-family: Verdana, Geneva, sans-serif; background: #f1f5f9; color: #1f2937; margin: 0; padding: 0; }
        .container { max-width: 620px; margin: 40px auto; background: white; padding: 24px; border-radius: 12px; box-shadow: 0 12px 30px rgba(0,0,0,.08); }
        h1 { margin: 0 0 12px; font-size: 28px; }
        p { margin: 12px 0; }
        .button { display: inline-block; padding: 12px 20px; border-radius: 8px; background: #ef4444; color: white; text-decoration: none; font-weight: 700; }
        .button:hover { background: #dc2626; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Bem-vindo</h1>
        <p>Você está logado como <strong>{{ auth()->user()->name }}</strong>.</p>

        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="button">Sair</button>
        </form>
    </div>
</body>
</html>
