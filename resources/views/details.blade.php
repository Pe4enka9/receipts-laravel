@extends('layouts.main')
@section('title', $product->name)

@section('content')

    <div class="container mt-3">
        <a href="{{ route('products.index') }}" class="mb-3 btn btn-outline-secondary">Назад</a>

        <h1 class="mb-3 text-primary">{{ $product->name }}</h1>
        <h2 class="mb-5">Всего на складе: {{ $product->total_quantity }}</h2>

        <h3 class="mb-3 text-secondary">Поступления</h3>

        <table class="table table-striped">
            <thead>
            <tr>
                <th>Дата и время</th>
                <th>Количество</th>
            </tr>
            </thead>
            <tbody>
            @foreach($receipts as $receipt)
                <tr>
                    <td>{{ $receipt->created_at }}</td>
                    <td>{{ $receipt->quantity }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection
