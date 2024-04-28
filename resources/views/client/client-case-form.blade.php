<?php

use Illuminate\Support\Facades\Cache;

$caseTypes = Cache::get('case_types');
?>
<div>
<form action="{{ route('add') }}" method="POST">
    @csrf
      <h2 class="text-base font-semibold leading-7 text-gray-900 border-b border-gray-900/10 pb-2">Personal Information</h2>
      @if($errors->any())
        <div class="alert alert-danger">
            {{ error('message') }}
        </div>
    @endif
      
        <div class="sm:col-auto">
          <label for="firstname" class="block text-sm font-medium leading-6 text-gray-900">First name</label>
          <div class="mt-2">
            <input readonly type="text" name="firstname" id="firstname" autocomplete="given-name" value="{{ $user->firstname }}"
class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 sm:text-sm sm:leading-6">
          </div>
        </div>

        <div class="sm:col-auto">
          <label for="lastname" class="block text-sm font-medium leading-6 text-gray-900">Last name</label>
          <div class="mt-2">
            <input readonly type="text" name="lastname" id="lastname" autocomplete="family-name" value="{{ $user->lastname }}" 
class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 sm:text-sm sm:leading-6">
          </div>
        </div>

        <div class="sm:col-auto">
          <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email address</label>
          <div class="mt-2">
            <input readonly id="email" name="email" type="email" autocomplete="email"  value="{{ $user->email }}"
class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 sm:text-sm sm:leading-6">
          </div>
        </div>

        <div class="sm:col-auto">
          <label for="address" class="block text-sm font-medium leading-6 text-gray-900">Address</label>
          <div class="mt-2">
            <input readonly type="text" name="address" id="address" autocomplete="given-name"  value="{{ $user->address }}"
class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 sm:text-sm sm:leading-6">
          </div>
        </div>

        <div class="sm:col-auto">
          <label for="case_type" class="block text-sm font-medium leading-6 text-gray-900">Case type</label>
          <div class="mt-2">
            <select id="case_type" name="case_type_id" autocomplete="case_type-name" required
class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
            @foreach($caseTypes as $caseType)
                <option name="" value="{{ $caseType->id }}">{{ $caseType->name }}</option>
            @endforeach
            </select>
          </div>
        </div>

        <h2 class="sm:col-span-12 text-base font-semibold leading-7 text-gray-900 border-b border-gray-900/10 pb-2 mt-10">Please, include as much detaiils as possible</h2>
      
         
        <div class="mb-4 my-5">
            <label for="title" class="block text-sm font-medium text-gray-700 ms-2">Title</label>
            <input type="text" id="title" name="title" value="" class="mt-1 p-2 border rounded-md w-full" placeholder="Enter title" required>
        </div>

        
        <div class="mb-6">
            <label for="description" class="block text-sm font-medium text-gray-700  ms-2">Description</label>
            <textarea id="description" name="description" class="mt-1 p-2 border rounded-md w-full" rows="5" placeholder="Enter description" required></textarea>
        </div>
        
    <div>
        <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">Submit</button>
  </div>
  <span class="text-red-500 text-xs my-2">All fields are required</span>
  
</form>
</div>

<script>
// Validation event for client dashboard - form for legal case
  // Add event listeners to form inputs
  document.getElementById('title').addEventListener('input', handleFormInput);
  document.getElementById('description').addEventListener('input', handleFormInput);
  // Function to check if form is valid
  function isFormValid() {
    var title = document.getElementById('title').value;
    var description = document.getElementById('description').value;
    return title.trim() !== '' && description.trim() !== '';
  }
  // Function to handle form input events
  function handleFormInput() {
    var submitButton = document.getElementById('submitButton');
    submitButton.disabled = !isFormValid();
  }
</script>