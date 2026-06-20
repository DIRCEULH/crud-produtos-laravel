<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body { font-family: Verdana, Geneva, sans-serif; background: #f1f5f9; color: #1f2937; margin: 0; padding: 0; }
        .container { max-width: 420px; margin: 40px auto; background: white; padding: 24px; border-radius: 12px; box-shadow: 0 12px 30px rgba(0,0,0,.08); }
        h1 { margin: 0 0 20px; font-size: 24px; text-align: center; }
        label { display: block; margin-bottom: 8px; font-weight: 600; }
        input { width: 100%; padding: 12px 14px; margin-bottom: 16px; border: 1px solid #cbd5e1; border-radius: 8px; }
        button { width: 100%; padding: 12px; border: none; border-radius: 8px; background: #2563eb; color: white; font-weight: 700; cursor: pointer; }
        .alert { margin-bottom: 16px; padding: 12px 14px; border-radius: 8px; }
        .alert-error { background: #fee2e2; color: #991b1b; border: 1px solid #fecaca; }
        .link { text-align: center; margin-top: 16px; color: #475569; }
        .link a { color: #2563eb; text-decoration: none; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Entrar</h1>

        @if ($errors->any())
            <div class="alert alert-error">
                <strong>Erro de login:</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('login.submit') }}" method="POST">
            @csrf
            <label for="email">E-mail</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus>

            <label for="password">Senha</label>
            <input type="password" id="password" name="password" required >

            <label style="display:flex; align-items:center; gap: 8px; font-size: 14px; float: left;">
                <input type="checkbox" name="remember" id="remember" style="margin-top: 15px;">
                <span style="white-space: nowrap">Manter conectado.</span>
            </label>

            <button type="submit">Entrar</button>
        </form>

        <div class="link">
            Não tem cadastro? <a href="{{ route('register') }}">Criar conta</a>
        </div>
    </div>
</body>
</html>
