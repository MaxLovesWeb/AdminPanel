<section class="resume-section p-3 p-lg-5 d-flex justify-content-center" id="experience">
    <div class="w-100">
        <h2 class="mb-5">Experience</h2>

        @foreach($experiences as $experience)


            <div class="resume-item d-flex flex-column flex-md-row justify-content-between mb-5">
                <div class="resume-content">
                    <h3 class="mb-0">{{ $experience->title }}</h3>
                    <div class="subheading mb-3">I{{ $experience->company->name }}</div>
                    <p>
                        {!! $experience->description !!}
                    </p>
                </div>
                <div class="resume-date text-md-right">
                    <span class="text-primary">{{ $experience->start_date }} - {{ $experience->end_date }}</span>
                </div>
            </div>

        @endforeach

    </div>

</section>
