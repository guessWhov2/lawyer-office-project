<?php

use App\Models\CaseType;
use Illuminate\Support\Facades\Cache;
// ONLY IN RODUCTION
$caseTypes = Cache::get('case_types');
$caseTypes = CaseType::all();
$id = 1;

?>

  <form action="{{ route('store') }}" method="POST" class="w-50">
    @csrf
    <p class="lead py-1 my-2 mb-4 px-2 border-bottom col-12">Please, include as much detaiils as possible</p>
    <input type="hidden" name="user_id" value="{{ $id }}">
    <div class="input-group mb-3">
      <label class="input-group-text" for="inputGroupSelect01">Case type</label>
      <select class="form-select" id="case_type_id" name="case_type_id">
        @foreach($caseTypes as $caseType)
        <option name="" value="{{ $caseType->id }}">{{ $caseType->name }}</option>
        @endforeach

      </select>
    </div>

  
  <div class="input-group mb-3">
    <span class="input-group-text" id="inputGroup-sizing-default">Title</span>
    <input name="title" type="text" class="form-control" aria-label="Sizing example input" 
    aria-describedby="inputGroup-sizing-default" required>
  </div>
  <div class="input-group">
    <span class="input-group-text">Description</span>
    <textarea name="description" value="" class="form-control" aria-label="With textarea" required></textarea>
  </div>

<div>
  <button type="submit" class="btn btn-outline-primary mt-3">Submit</button>
  @session('status')
      <div class="p-4 bg-green-100">
          {{ $value }}
      </div>
  @endsession
</div>

</form>
