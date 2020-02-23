<section class="resume-section p-3 p-lg-5 d-flex align-items-center" id="about">
    <div class="w-100">
        <h1 class="mb-0">{!! $firstName !!}
            <span class="text-primary">{!! $lastName !!}</span>
        </h1>

        <br>
        <br>

        <div class="subheading mb-5">
            @foreach($addresses as $address)

                {{ $address->street }} . {{ $address->city }} . {{ $address->postcode }}
                <br>
            @endforeach
        </div>

        <div class="subheading mb-5">
            @foreach($contacts as $contact)

                @switch($contact->type)
                    @case(\Modules\Contact\Entities\Contact::EMAIL_TYPE)
                        <a href="mailto:{{ $contact->value }}">{{ $contact->value }}</a>
                    @break

                    @case(\Modules\Contact\Entities\Contact::PHONE_TYPE)
                        Phone : {{ $contact->value }}
                    @break

                    @case(\Modules\Contact\Entities\Contact::FAX_TYPE)
                        Fax : {{ $contact->value }}
                    @break

                @endswitch

                    <br>

            @endforeach
        </div>

        <p class="lead mb-5">
            {!! $about !!}</p>

        <div class="social-icons">
            @foreach($contacts as $contact)

                @switch($contact->type)
                    @case(\Modules\Contact\Entities\Contact::LINKEDIN_TYPE)
                        <a href="#">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    @break

                    @case(\Modules\Contact\Entities\Contact::GITHUB_TYPE)
                        <a href="#">
                            <i class="fab fa-github"></i>
                        </a>
                    @break

                    @case(\Modules\Contact\Entities\Contact::TWITTER_TYPE)
                        <a href="#">
                            <i class="fab fa-twitter"></i>
                        </a>
                    @break

                    @case(\Modules\Contact\Entities\Contact::FACEBOOK_TYPE)
                        <a href="#">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                    @break
                @endswitch

            @endforeach
        </div>
    </div>
</section>
