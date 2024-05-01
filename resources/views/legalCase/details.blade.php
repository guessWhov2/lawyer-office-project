
<x-app-layout>
   
    <section class="container">
        <div class="row">
            <div class="col">
            <a class="btn btn-primary mt-3 mb-1" href="{{route('dashboard') }}">Back</a>
            </div>
        </div>
        <div class="row text-center">
            <h6 class="h3">Description</h6>
            <div class="col-12">{{ $selectedCase->description }}</div>
        </div>
        <div class="row">
            <div class="col-12">
                @foreach($selectedCase->notes as $note)
                <div class="col-12 text-center py-2 mt-4 border-bottom">Date: {{ $note->created_at->format('Y-m-d') }}</div>
                <div class="col-12">{{ $note->content }}</div>
                @endforeach
            </div>
        </div>
    </section>
</x-app-layout>