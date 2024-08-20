@extends('layouts.app')
@section('title', $title)
@section('subtitle', $subtitle)
@section('content')
<div class="container">
  <div class="row">
    <div class="col-lg-4 me-auto">
      <p class="lead">{{ $email }}</p>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-4 me-auto">
      <p class="lead">{{ $address }}</p>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-4 me-auto">
      <p class="lead">{{ $number }}</p>
    </div>
  </div>
</div>
@endsection