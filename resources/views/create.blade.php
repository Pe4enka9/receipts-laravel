@extends('layouts.main')
@section('title', 'Добавить товар')

@section('content')

    <div class="container mt-3">
        <a href="{{ url()->previous() }}" class="mb-3 btn btn-outline-secondary">Назад</a>
        <h1 class="mb-3 text-primary">Добавить товар</h1>

        <div class="row">
            <div class="col-4">
                <form action="{{ route('products.store') }}" method="post">
                    @csrf

                    <div class="mb-3">
                        <label for="name" class="form-label">Название <span class="text-danger">*</span></label>
                        <input type="text" name="name" id="name"
                               class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                               value="{{ old('name') }}">
                        @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="price" class="form-label">Цена <span class="text-danger">*</span></label>
                        <input type="number" name="price" id="price"
                               class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}"
                               value="{{ old('price') }}">
                        @error('price')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="article" class="form-label">Артикул</label>
                        <input type="text" name="article" id="article"
                               class="form-control {{ $errors->has('article') ? 'is-invalid' : '' }}"
                               value="{{ old('article') }}">
                        @error('article')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <input type="submit" value="Добавить" class="btn btn-success">
                </form>
            </div>
        </div>
    </div>

@endsection
