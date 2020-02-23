<section class="resume-section p-3 p-lg-5 d-flex align-items-center" id="skills">
    <div class="w-100">
        <h2 class="mb-5">Skills</h2>

        <ul class="fa-ul mb-0">

            @foreach($skills as $skill)
                <li>
                    <i class="fa-li fa fa-check"></i>
                    {{ $skill->name }}
                </li>
            @endforeach
        </ul>
    </div>
</section>
