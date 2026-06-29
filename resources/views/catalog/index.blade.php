<?php /** catalog.index **/ ?>
@extends('layouts.app')

@section('title','Catálogo')

@section('content')
  <h1>Catálogo por categorías</h1>
  <div class="categories-grid">
    @foreach($categories as $cat)
      <section class="category-card">
        <h2><a href="/categoria/{{ $cat->slug }}">{{ $cat->name }}</a></h2>
        <p>{{ $cat->description }}</p>
        <div class="products-row">
          @foreach($cat->products as $p)
            <article class="product-card">
              <a href="/producto/{{ $p->slug }}">
                <img src="{{ $p->mainImage->path ?? '/images/placeholder.png' }}" alt="{{ $p->name }}">
                <h3>{{ $p->name }}</h3>
                <p class="price">${{ number_format($p->price,2) }}</p>
              </a>
            </article>
          @endforeach
        </div>
      </section>
    @endforeach
  </div>
@endsection
