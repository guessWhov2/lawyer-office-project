<?php


?>

<x-app-layout>
    <div class="container">
        <div class="row my-2 py-2">
            <div class="col-12 d-flex ">
                <a href="{{ route('kurcina') }}" class="btn btn-outline-secondary">Back to panel</a>
                <p class="lead p-0 m-0 d-inline-block mx-auto" style="transform:translateX(-50%);">Searched by <strong>{{ $filter}}</strong></p>
            </div>
            <div class="row justify-content-center">
                <div class="col-auto">{{ $legalCases }}</div>
            </div>
        </div>

        <div class="row my-4">
            <div class="accordion accordion-flush" id="accordionFlushParent">
                @foreach($legalCases as $legalCase)
                <div class="accordion-item">
                    <h2 class="accordion-header border-top">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse{{ $legalCase->id }}" aria-expanded="false" aria-controls="flush-collapse{{ $legalCase->id }}">
                            <p class="lead p-0 m-0">Title: {{ $legalCase->title }}</p>
                        </button>
                    </h2>
                    <div id="flush-collapse{{ $legalCase->id }}" class="accordion-collapse collapse" data-bs-parent="#accordionFlushParent">
                        <div class="accordion-body">
                            <div class="row">
                                <div class="card">
                                    <div class="card-header d-flex justify-content-between align-items-center">
                                        <p class="p-0 m-0 d-inline-block">ID: {{ $legalCase->user->id }}</p>
                                        <p class="p-0 m-0 d-inline-block">First name: {{ $legalCase->user->firstname }}</p>
                                        <p class="p-0 m-0 d-inline-block">Last name: {{ $legalCase->user->lastname }}</p>
                                    </div>
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <p class="p-0 m-0 d-inline-block">ID: {{ $legalCase->id }}</p>
                                            <p class="p-0 m-0 d-inline-block">Type: {{ $legalCase->caseType->name }}</p>
                                            <p class="p-0 m-0 d-inline-block">Status: {{ $legalCase->status }}</p>
                                            <p class="p-0 m-0 d-inline-block">Date: {{ $legalCase->created_at->format('d-m-Y') }}</p>
                                            @if($legalCase->status == 'open')
                                            <p class="p-0 m-0 d-inline-block">Status: {{ $legalCase->lawyer->firstname }}</p>
                                            <p class="p-0 m-0 d-inline-block">Status: {{ $legalCase->lawyer->lastname }}</p>
                                            @endif
                                        </div>
                                        <p class="card-text my-2"><strong>Description: </strong>{{ $legalCase->description }}</p>
                                        <a href="#" class="btn btn-sm btn-outline-primary">Case details</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
</x-app-layout>