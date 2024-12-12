@extends('layouts.main')
@section('title', 'Товары')

@section('content')

    <div class="container mt-3">
        <h1 class="mb-3 text-primary">Товары</h1>
        <a href="{{ route('products.create') }}" class="mb-3 btn btn-primary">Добавить</a>
        <a href="{{ route('receipts.index') }}" class="mb-3 btn btn-secondary">Поступления</a>

        <table class="mb-3 table table-striped">
            <thead>
            <tr>
                <th>Название</th>
                <th>Цена</th>
                <th>Артикул</th>
                <th>Всего на складе</th>
            </tr>
            </thead>
            <tbody>
            @foreach($products as $product)
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->article }}</td>
                    <td>{{ $product->total_quantity ?? '0' }}</td>
                    <td>
                        <a href="{{ route('products.details', $product->article) }}" class="btn btn-info">Подробнее</a>
                    </td>
                    <td>
                        <a href="{{ route('products.edit', $product->article) }}"
                           class="btn btn-primary">Редактировать</a>
                    </td>
                    <td>
                        <form action="{{ route('products.destroy', $product->article) }}" method="post">
                            @csrf
                            @method('delete')
                            <input type="submit" class="btn btn-danger" value="Удалить">
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <div>{{ $products->links() }}</div>
    </div>

@endsection
