@extends('layouts/app')

@section('content')

    <section class="mb-8">
        <div class="m-6">
            <h2 class="font-bold text-2xl md:text-3xl lg:text-4xl">Explore all collections</h2>
        </div>
        <livewire:collection-search/>
    </section>

@endsection
