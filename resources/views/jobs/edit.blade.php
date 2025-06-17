<x-layout>
    <x-page-heading>New Job</x-page-heading>

    <x-forms.form method="POST" action="/jobs/{{ $job->id }}">
        @method('PATCH')
        <x-forms.input label="Title" name="title" placeholder="CEO" value="{{ $job->title }}" />
        <x-forms.input label="Salary" name="salary" placeholder="$90,000 USD" value="{{ $job->salary }}" />
        <x-forms.input label="Location" name="location" placeholder="Bucharest" value="{{ $job->location }}" />

        <x-forms.select label="Schedule" name="schedule">
            <option class="bg-gray-700" {{ $job->schedule === 'Part Time' ? 'selected' : '' }}>Part Time</option>
            <option class="bg-gray-700" {{ $job->schedule === 'Full Time' ? 'selected' : '' }}>Full Time</option>

        </x-forms.select>

        <x-forms.input label="Url" name="url" placeholder="https://acme.com/jobs/ceo-wanted"
            value="{{ $job->url }}" />
        <x-forms.checkbox label="Feature (Costs Extra)" name="featured" value="{{ $job->featured }}"
            checked="{{ $job->featured ? 'checked' : false }}" />

        <x-forms.divider />

        <x-forms.input label="Tags
            (comma separated)" name="tags"
            Placeholder="programming, video, education" value="{{ $job->tags->pluck('name')->implode(', ') }}" />

        <x-forms.button>Publish</x-forms.button>
    </x-forms.form>
</x-layout>
