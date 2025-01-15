

@extends('main')

@section('page-content')
    <h1>Products</h1>

    @if ($category)
        <p>Filtering by the category:
            <strong>{{ $category }}</strong>
        </p>

        @if ($products)
            <ul>
                @foreach ($products as $product)
                    <li>{{ $product->name }}</li>
                @endforeach
            </ul>
        @else
            <p>No products found</p>
        @endif
    @endif

    <p>Choose a category:</p>
    <ul>
        @foreach ($categories as $category)
            <li><a href='/products/{{ $category->name }}'>{{ $category->name }}</a></li>
        @endforeach
    </ul>

    <a href='/'>Home</a>
@endsection
