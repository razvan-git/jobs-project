@props(['employer'])
<x-panel class="flex flex-col text-center items-center">


    <div>
        {{-- <div>
            @foreach ($job->tags as $tag)
                <x-tag :$tag size="small" />
            @endforeach

        </div> --}}

        <x-employer-logo :employer="$employer" :width="90"></x-employer-logo>


    </div>

    <div class="py-4">
        <h3 class="text-xl font-bold">
            <a href="companies/{{ $employer->id }}">
                {{ $employer->name }}
            </a>
        </h3>
    </div>


    <div class="self-end">
        <x-button href="companies/{{ $employer->id }}"
            class="group-hover:text-blue-800 font-bold transition-colors duration-300">See all
            jobs>></x-button>
    </div>
</x-panel>
