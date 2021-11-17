@if($errors->any())
    <div class="flex bg-red-100 rounded-lg p-4 mb-4 text-sm text-red-700" role="alert">
        @foreach($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif
