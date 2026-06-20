<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Usuário</title>
    <style>
        body { font-family: Verdana, Geneva, sans-serif; background: #f1f5f9; color: #1f2937; margin: 0; padding: 0; }
        .container { max-width: 420px; margin: 40px auto; background: white; padding: 24px; border-radius: 12px; box-shadow: 0 12px 30px rgba(0,0,0,.08); }
        h1 { margin: 0 0 20px; font-size: 24px; text-align: center; }
        label { display: block; margin-bottom: 8px; font-weight: 600; }
        input { width: 100%; padding: 12px 14px; margin-bottom: 16px; border: 1px solid #cbd5e1; border-radius: 8px; }
        button { width: 100%; padding: 12px; border: none; border-radius: 8px; background: #2563eb; color: white; font-weight: 700; cursor: pointer; }
        .alert { margin-bottom: 16px; padding: 12px 14px; border-radius: 8px; }
        .alert-success { background: #ecfdf5; color: #166534; border: 1px solid #d1fae5; }
        .alert-error { background: #fee2e2; color: #991b1b; border: 1px solid #fecaca; }
        ul { margin: 0; padding-left: 20px; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Cadastro de Usuário</h1>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if ($errors->any())
            <div class="alert alert-error">
                <strong>Corrija os erros abaixo:</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('register.submit') }}" method="POST">
            @csrf
            <label for="name">Nome</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" required>

            <label for="email">E-mail</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" required>

            <label for="password">Senha</label>
            <input type="password" id="password" name="password" required>

            <button type="submit">Cadastrar</button>
        </form>

        <p style="text-align:center; margin-top: 16px; color: #475569;">
            Já tem conta? <a href="{{ route('login') }}" style="color: #2563eb; text-decoration: none;">Faça login</a>
        </p>
    </div>
</body>
</html>
