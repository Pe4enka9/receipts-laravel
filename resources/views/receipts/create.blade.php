@extends('layouts.main')
@section('title', 'Добавить')

@section('content')

    <div class="container mt-3">
        <a href="{{ route('receipts.index') }}" class="mb-3 btn btn-outline-secondary">Назад</a>
        <h1 class="mb-3 text-primary">Добавить поступления</h1>

        <div class="row">
            <div class="col-4">
                <form action="{{ route('receipts.store') }}" method="post">
                    @csrf

                    <div class="mb-3">
                        <label for="product_id" class="form-label">Товар <span class="text-danger">*</span></label>
                        <select name="product_id" id="product_id"
                                class="form-select {{ $errors->has('product_id') ? 'is-invalid' : '' }}">
                            @foreach($products as $product)
                                <option value="{{ $product->id }}">{{ $product->name }}</option>
                            @endforeach
                        </select>
                        @error('product_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="quantity" class="form-label">Количество <span class="text-danger">*</span></label>
                        <input type="number" name="quantity" id="quantity"
                               class="form-control {{ $errors->has('quantity') ? 'is-invalid' : '' }}"
                               value="{{ old('quantity') }}">
                        @error('quantity')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="created_at" class="form-label">Дата и время</label>
                        <input type="datetime-local" name="created_at" id="created_at" class="form-control">
                    </div>

                    <input type="submit" value="Добавить" class="btn btn-success">
                </form>
            </div>
        </div>
    </div>

@endsection
