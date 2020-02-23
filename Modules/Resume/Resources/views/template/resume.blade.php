<nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" id="sideNav">
    <a class="navbar-brand js-scroll-trigger" href="#page-top">
        <span class="d-block d-lg-none">{!! $resume->name !!}</span>
        <span class="d-none d-lg-block">
        <img class="img-fluid img-profile rounded-circle mx-auto mb-2" src="img/profile.jpg" alt="">
      </span>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link js-scroll-trigger" href="#about">About</a>
            </li>
            @if(count($resume->experiences))
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="#experience">Experience</a>
                </li>
            @endif
            @if(count($resume->educations))
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="#education">Education</a>
                </li>
            @endif
            @if(count($resume->skills))
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="#skills">Skills</a>
                </li>
            @endif
            @if(false)
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="#interests">Interests</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="#awards">Awards</a>
                </li>
            @endif
        </ul>
    </div>
</nav>

<div class="container-fluid p-0">

    @include('resume::template.partials.about', [
        'about' => $resume->letter,
        'firstName' => $resume->first_name,
        'lastName' => $resume->last_name,
        'addresses' => $resume->person->addresses,
        'contacts' => $resume->person->contacts,
    ])

    <hr class="m-0">

    @if(count($resume->experiences))
        @include('resume::template.partials.experience', [
            'experiences' => $resume->experiences
        ])
        <hr class="m-0">
    @endif

    @if(count($resume->educations))
        @include('resume::template.partials.education', [
            'educations' => $resume->educations
        ])
        <hr class="m-0">
    @endif

    @if(count($resume->skills))
        @include('resume::template.partials.skills', [
            'skills' => $resume->skills
        ])

        <hr class="m-0">
    @endif


    <hr class="m-0">
    @if(false)
    @include('resume::template.partials.interests')


    <hr class="m-0">

    @include('resume::template.partials.awards')
    @endif

</div>
