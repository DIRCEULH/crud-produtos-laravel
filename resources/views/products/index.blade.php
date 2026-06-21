<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos</title>
    <style>
        body { font-family: Verdana, Geneva, sans-serif; background: #f1f5f9; color: #1f2937; margin: 0; padding: 0; }
        .page { max-width: 960px; margin: 32px auto; padding: 24px; }
        .card { background: white; border-radius: 12px; box-shadow: 0 12px 30px rgba(0,0,0,.08); padding: 24px; }
        .header { display: flex; justify-content: space-between; align-items: center; gap: 16px; flex-wrap: wrap; }
        .header h1 { margin: 0; font-size: 28px; }
        .button, .button-secondary { display: inline-flex; align-items: center; gap: 8px; padding: 12px 18px; border-radius: 8px; text-decoration: none; font-weight: 700; }
        .button { background: #2563eb; color: white; }
        .button-secondary { background: #e2e8f0; color: #1f2937; }
        .button-danger { background: #dc2626; color: white; border: none; cursor: pointer; border-radius: 8px; padding: 10px 14px; display: inline-flex; align-items: center; gap: 8px; }
        .icon { display: inline-flex; align-items: center; justify-content: center; font-size: 1rem; }
        .alert { margin-bottom: 16px; padding: 14px 16px; border-radius: 10px; background: #ecfdf5; color: #166534; border: 1px solid #d1fae5; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { padding: 14px 12px; border-bottom: 1px solid #e2e8f0; text-align: left; }
        th { background: #f8fafc; }
        td:last-child { width: 190px; }
        form { display: inline; }
        .top-actions { display: flex; gap: 12px; flex-wrap: wrap; align-items: center; }
    </style>
</head>
<body>
    <div class="page">
        <div class="card">
            <div class="header">
                <div>
                    <h1>Produtos</h1>
                    <p>CRUD inicial de produtos: listar, criar, editar e excluir.</p>
                </div>
                <div class="top-actions">
                    <a href="{{ route('products.create') }}" class="button"><span class="icon">➕</span>Novo produto</a>
                    <form action="{{ route('logout') }}" method="POST" style="margin:0;">
                        @csrf
                        <button type="submit" class="button-danger"><span class="icon">🚪</span>Sair</button>
                    </form>
                </div>
            </div>

            @if(session('success'))
                <div class="alert">{{ session('success') }}</div>
            @endif

            @if($products->isEmpty())
                <p>Nenhum produto cadastrado. Clique em "Novo produto" para começar.</p>
            @else
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Descrição</th>
                            <th>Preço</th>
                            <th>Estoque</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->description }}</td>
                                <td>{{ $product->price }}</td>
                                <td>{{ $product->stock }}</td>
                                <td>
                                    <a href="{{ route('products.edit', $product) }}" class="button-secondary"><span class="icon">✏️</span>Editar</a>
                                    <form action="{{ route('products.destroy', $product) }}" method="POST" onsubmit="return confirm('Deseja excluir este produto?');"> @csrf @method('DELETE')
                                        <button type="submit" class="button-danger"><span class="icon">🗑️</span>Excluir</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
</body>
</html>
