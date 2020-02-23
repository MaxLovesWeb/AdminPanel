<section class="resume-section p-3 p-lg-5 d-flex align-items-center" id="education">
    <div class="w-100">
        <h2 class="mb-5">Education</h2>

        @foreach($educations as $education)


            <div class="resume-item d-flex flex-column flex-md-row justify-content-between mb-5">
                <div class="resume-content">
                    <h3 class="mb-0">{{ $education->company->name }}</h3>
                    <div class="subheading mb-3">{{ $education->title }}</div>
                    <div>{{ $education->course }}</div>
                    <p>{{ $education->description }}</p>
                </div>
                <div class="resume-date text-md-right">
                    <span class="text-primary">{{ $education->start_date }} - {{ $education->end_date }}</span>
                </div>
            </div>

        @endforeach

    </div>
</section>
