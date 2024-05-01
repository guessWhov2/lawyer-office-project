<?php // Dashboard / parent - container ?>
@if($legalCases !== null)
@foreach($legalCases as $legalCase)
<div class="card col mb-2">
  <div class="row g-0">
    
    <div class="col-md-12">
      <div class="card-body">
        <h5 class="card-title d-inline-block me-auto">{{ $legalCase->title }}</h5> 
        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
        
        <div class="d-flex justify-content-between align-items-center">
            <small class="text-body-secondary">{{ $legalCase->created_at->format('d-m-Y') }}</small>
          
            <form action="{{ route('details') }}" method="POST" class="d-inline-block">
              @csrf
              <input type="hidden" name="case_user_id" value="{{ $legalCase->user_id }}">
              <button type="submit" class="btn btn-small btn-outline-primary"><small>Details</small></button>
            </form>          
          </div>
      </div>
    </div>
  </div>
</div>
@endforeach
@endif