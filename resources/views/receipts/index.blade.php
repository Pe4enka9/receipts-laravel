@extends('layouts.main')
@section('title', 'Поступления')

@section('content')

    <div class="container mt-3">
        <h1 class="mb-3 text-primary">Поступления</h1>
        <a href="{{ route('receipts.create') }}" class="mb-3 btn btn-primary">Добавить</a>
        <a href="{{ route('products.index') }}" class="mb-3 btn btn-secondary">Товары</a>

        <table class="table table-striped">
            <thead>
            <tr>
                <th>Товар</th>
                <th>Количество</th>
                <th>Дата и время</th>
            </tr>
            </thead>
            <tbody>
            @foreach($receipts as $receipt)
                <tr>
                    <td>{{ $receipt->product->name }}</td>
                    <td>{{ $receipt->quantity }}</td>
                    <td>{{ $receipt->created_at }}</td>
                    <td><a href="{{ route('receipts.edit', $receipt->id) }}" class="btn btn-primary">Редактировать</a></td>
                    <td>
                        <form action="{{ route('receipts.destroy', $receipt->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <input type="submit" value="Удалить" class="btn btn-danger">
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection
