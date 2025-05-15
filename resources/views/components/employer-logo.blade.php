@props(['employer', 'width' => 90])

@if (file_exists('storage/' . $employer->logo))
    <img src="{{ asset('storage/' . $employer->logo) }}" alt="" class="rounded-xl" width="{{ $width }}">
@else
    <img src="{{ asset($employer->logo) }}" alt="" class="rounded-xl" width="{{ $width }}">
@endif
