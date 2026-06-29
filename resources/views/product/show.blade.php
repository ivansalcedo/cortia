<?php /** product.show **/ ?>
@extends('layouts.app')

@section('title', $product->name)

@section('content')
  <div class="product-detail">
    <div class="gallery">
      @foreach($product->images as $img)
        <img src="{{ $img->path }}" alt="{{ $product->name }}">
      @endforeach
    </div>
    <div class="info">
      <h1>{{ $product->name }}</h1>
      <p class="category">Categoría: <a href="/categoria/{{ $product->category->slug }}">{{ $product->category->name }}</a></p>
      <p class="price">${{ number_format($product->price,2) }}</p>
      <div class="description">{!! nl2br(e($product->description)) !!}</div>
      <form action="/cart/add" method="post">
        <label>Cantidad <input type="number" name="qty" value="1" min="1"></label>
        <button class="btn btn-primary" type="submit">Agregar al carrito</button>
      </form>
    </div>
  </div>
@endsection
