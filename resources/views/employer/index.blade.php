<x-layout>
    <div class="space-y-10">
        <section class="text-center pt-6">
            <h1 class="font-bold text-4xl">Companies</h1>

            <x-forms.form action="/search" class="mt-6">
                <x-forms.input class="max-w-lg" :label="false" name="q" placeholder="Google, Amazon, etc..." />
            </x-forms.form>
        </section>

        <section class="pt-6">

            <div class="grid lg:grid-cols-3 gap-8 mt-6 items-center">
                @foreach ($employers as $employer)
                    <x-employer-card :$employer />
                @endforeach

            </div>

        </section>

        {{-- <section>
            <x-section-heading>Tags</x-section-heading>

            <div class="flex flex-wrap gap-x-1 gap-y-3 mt-6">
                @foreach ($tags as $tag)
                    <x-tag :$tag />
                @endforeach
            </div>

        </section> --}}

    </div>
</x-layout>
