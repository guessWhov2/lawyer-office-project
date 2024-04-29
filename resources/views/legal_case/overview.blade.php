<?php // Dashboard / parent - container ?>
@if($legalCases !== null)
@foreach($legalCases as $legalCase)
<div class="card col mb-2" style="max-width: 540px;">
  <div class="row g-0">
    
    <div class="col-md-12">
      <div class="card-body">
        <h5 class="card-title">{{ $legalCase->title }}</h5>
        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
        <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
      </div>
    </div>
  </div>
</div>
@endforeach
@endif