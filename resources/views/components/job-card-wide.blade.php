@props(['job', 'editable' => false])
<x-panel class="flex gap-x-6">
    <div>
        <x-employer-logo :employer="$job->employer" :width="90"></x-employer-logo>
    </div>


    <div class="flex-1 flex flex-col">
        <a href="/jobs/{{ $job->id }}" class="self-start text-sm text-gray-400">{{ $job->employer->name }}</a>

        <h3 class="font-bold text-xl mt-3 group-hover:text-blue-800 transition-colors duration-300">
            <a href="/jobs/{{ $job->id }}">
                {{ $job->title }}
            </a>
        </h3>
        <p class="text-sm text-gray-400 mt-auto">{{ $job->schedule }} - {{ $job->salary }}</p>


    </div>


    <div class="flex flex-col items-end">
        <div>
            @foreach ($job->tags as $tag)
                <x-tag :$tag />
            @endforeach

        </div>

        @if ($editable)
            @can('update', $job)
                <div class="mt-10 space-x-1">
                    <x-button href="/jobs/{{ $job->id }}/edit" class="bg-blue-800">Edit</x-button>
                    <x-forms.button form="delete-form" class="bg-red-500">Delete</x-button>
                </div>

                <form method="POST" action="/jobs/{{ $job->id }}" class="hidden" id="delete-form">
                    @csrf
                    @method('DELETE')
                </form>
            @endcan
        @endif

    </div>


</x-panel>
