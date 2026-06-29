<?php /** catalog.category **/ ?>
@extends('layouts.app')

@section('title',$category->name)

@section('content')
  <h1>{{ $category->name }}</h1>
  <p>{{ $category->description }}</p>
  <div class="products-grid">
    @foreach($products as $p)
      <div class="product-card">
        <a href="/producto/{{ $p->slug }}">
          <img src="{{ $p->mainImage->path ?? '/images/placeholder.png' }}" alt="{{ $p->name }}">
          <h3>{{ $p->name }}</h3>
          <p class="price">${{ number_format($p->price,2) }}</p>
        </a>
      </div>
    @endforeach
  </div>
  <!-- paginación simple -->
  <?php if(isset($total) && $total > $perPage): ?>
    <div class="pagination">
      <?php $pages = ceil($total / $perPage); for($i=1;$i<=$pages;$i++): ?>
        <a href="?page=<?php echo $i; ?>" <?php if($i==$page) echo 'class="active"'; ?>><?php echo $i; ?></a>
      <?php endfor; ?>
    </div>
  <?php endif; ?>
@endsection
