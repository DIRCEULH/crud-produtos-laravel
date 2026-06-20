<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Produto</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f1f5f9; color: #1f2937; margin: 0; padding: 0; }
        .container { max-width: 600px; margin: 40px auto; background: white; padding: 24px; border-radius: 12px; box-shadow: 0 12px 30px rgba(0,0,0,.08); }
        h1 { margin: 0 0 20px; font-size: 28px; }
        label { display: block; margin-bottom: 8px; font-weight: 600; }
        input, textarea { width: 100%; padding: 12px 14px; margin-bottom: 16px; border: 1px solid #cbd5e1; border-radius: 8px; }
        button { width: 100%; padding: 12px; border: none; border-radius: 8px; background: #2563eb; color: white; font-weight: 700; cursor: pointer; }
        .actions { display: flex; justify-content: space-between; gap: 12px; }
        .button-secondary { display: inline-flex; align-items: center; gap: 8px; padding: 12px 18px; background: #e2e8f0; color: #1f2937; border-radius: 8px; text-decoration: none; }
        .button { width: auto; display: inline-flex; align-items: center; gap: 8px; }
        .icon { display: inline-flex; align-items: center; justify-content: center; font-size: 1rem; }
        .alert-error { background: #fee2e2; color: #991b1b; border: 1px solid #fecaca; padding: 14px 16px; border-radius: 10px; margin-bottom: 16px; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Editar produto</h1>

        @if ($errors->any())
            <div class="alert-error">
                <strong>Corrija os erros abaixo:</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('products.update', $product) }}" method="POST">
            @csrf
            @method('PUT')

            <label for="name">Nome</label>
            <input type="text" id="name" name="name" value="{{ old('name', $product->name) }}" required>

            <label for="description">Descrição</label>
            <textarea id="description" name="description" rows="4" required>{{ old('description', $product->description) }}</textarea>

            <label for="price">Preço</label>
            <input type="text" id="price" name="price" value="{{ old('price', $product->price) }}" required>

            <label for="stock">Estoque</label>
            <input type="text" id="stock" name="stock" value="{{ old('stock', $product->stock) }}" required>

            <div class="actions">
                <a href="{{ route('products.index') }}" class="button-secondary"><span class="icon">🔙</span>Voltar</a>
                <button type="submit" class="button"><span class="icon">✅</span>Atualizar</button>
            </div>
        </form>
    </div>
</body>
</html>
