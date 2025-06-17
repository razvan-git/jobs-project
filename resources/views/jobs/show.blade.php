<x-layout>
    <div class="space-y-10">
        <section>
            <x-section-heading>Jobs List</x-section-heading>


            <div class="mt-6 space-y-6">

                <x-job-card-wide :$job :editable="true" />

            </div>
        </section>
    </div>
</x-layout>
