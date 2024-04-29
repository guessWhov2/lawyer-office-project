<?php

?>

<nav class="navbar navbar-expand-lg bg-body-tertiary">

  <div class="container-fluid">
  <a class="navbar-brand" href="#" style="height:50px;width:50px">@include('components.application-logo')</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" 
    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0 w-100">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="{{ route('home') }}">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="{{ route('dashboard') }}">Dashboard</a>
        </li>
        <li class="nav-item flex-grow-1">
          <a class="nav-link" href="{{ route('register') }}">Register</a>
        </li>
        @guest
        <li class="nav-item justify-self-end">
          <a class="nav-link" href="{{ route('login') }}">Login</a>
        </li>
        @endguest
      
      @auth
      <li>
        <a href="#">@include('profile.edit')</a>
      </li>
      @endauth
      </ul>
    </div>
  </div>

</nav>

