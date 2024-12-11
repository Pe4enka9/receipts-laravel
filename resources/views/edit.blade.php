@extends('layouts.main')
@section('title', 'Редактировать товар')

@section('content')

    <div class="container mt-3">
        <a href="{{ route('products.index') }}" class="mb-3 btn btn-outline-secondary">Назад</a>
        <h1 class="mb-3 text-primary">Редактировать товар</h1>

        <div class="row">
            <div class="col-4">
                <form action="{{ route('products.update', $product->article) }}" method="post">
                    @csrf
                    @method('patch')

                    <input type="hidden" name="id" value="{{ $product->id }}">

                    <div class="mb-3">
                        <label for="name" class="form-label">Название <span class="text-danger">*</span></label>
                        <input type="text" name="name" id="name"
                               class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                               value="{{ $product->name }}">
                        @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="price" class="form-label">Цена <span class="text-danger">*</span></label>
                        <input type="number" name="price" id="price"
                               class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}"
                               value="{{ $product->price }}">
                        @error('price')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="article" class="form-label">Артикул</label>
                        <input type="text" name="article" id="article"
                               class="form-control {{ $errors->has('article') ? 'is-invalid' : '' }}"
                               value="{{ $product->article }}">
                        @error('article')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <input type="submit" value="Редактировать" class="btn btn-success">
                </form>
            </div>
        </div>
    </div>

@endsection
