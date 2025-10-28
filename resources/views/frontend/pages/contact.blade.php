@extends('frontend.layouts.frontend')
@push('title')
    {{ __('admin_local.Find Us') }}
@endpush
@push('css')
    <style>
        .ns-brand-item {
            height: 150px !important;
            width: 180px !important;
        }

        .map-row {
            padding: 30px 50px
        }

        @media (max-width: 767px) {
            .map-row {
                padding: 10px 20px
            }

            .ns-section-title {
                font-size: 22px;
            }
        }

        :root {
            --theme-color: #f6921e;
        }

        .contact-page .contact-info .info-item .icon svg {
            width: 30px;
            height: 30px;
            color: var(--theme-color);
            /* theme color for icons */
        }

        .contact-page .contact-info h5 {
            margin-bottom: 0.3rem;
            color: var(--theme-color);
            /* headings color */
        }

        .contact-page .contact-info p {
            margin: 0;
            font-size: 14px;
        }

        .contact-page .social-icons a {
            font-size: 18px;
            color: var(--theme-color);
            transition: 0.3s;
        }

        .contact-page .social-icons a:hover {
            opacity: 0.8;
        }

        .contact-page .contact-form h3 {
            color: var(--theme-color);

        }

        .contact-info h3 {
            color: var(--theme-color);
             margin-bottom: 30px !important;
        }

        .contact-page .contact-form button {
            border-radius: 5px;
            background-color: var(--theme-color);
            border: none;
            color: #fff;
            transition: 0.3s;
        }

        .contact-page .contact-form button:hover {
            opacity: 0.85;
        }

        .contact-page .social-icons a {
            width: 40px;
            height: 40px;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 50%;
            /* makes it circular */
            background-color: var(--theme-color);
            color: #fff;
            /* icon color */
            font-size: 18px;
            transition: 0.3s;
        }

        .contact-page .social-icons a:hover {
            background-color: #e59e13;
            /* slightly darker on hover */
            transform: scale(1.1);
            /* subtle zoom effect */
        }

        @media(max-width:600px) {
            .info-item h5 {
                font-size: 18px;
            }
            .contact-form h3{
                font-size: 20px;
            }
        }

        @media(min-width:600px) {
            .contact-info {
                height: 518px;
            }
        }

        .contact-form {
            box-shadow: 0px 4px 15px rgb(207, 207, 207) !important;
        }

        /* Optional: make content inside form stretch as well */
        .contact-form form {
            flex: 1;
        }
        .ns-footer-social {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 10px;
            /* space between icons */
        }

        .ns-footer-social a img {
            display: inline-block;
            vertical-align: middle;
        }
    </style>
@endpush
@section('content')
    @php
        $contact = \App\Models\Admin\Contact::first();
    @endphp
    @if ($contact)
        <section class="contact-page py-5">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="ns-section mb-50 text-center">
                            <h2 class="ns-section-title mb-0" style="font-size:25px;">
                                {{ __('admin_local.Find Us') }}
                            </h2>
                        </div>
                    </div>
                </div>
                <div class="row bg-light py-5 g-4">
                    <!-- Contact Info -->
                    <div class="col-lg-5">
                        <div class="contact-info p-4 bg-white shadow-sm rounded">
                            <h3 class="mb-4 text-center">{{ __('admin_local.Contact') }}</h3>
                            <div class="info-item mb-3 d-flex align-items-start">
                                <div class="icon me-3">
                                    <!-- Phone Icon -->
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M22 17a6 6 0 0 1-4.713 5.86l-.638-1.914A4 4 0 0 0 19.465 19H17a2 2 0 0 1-2-2v-4a2 2 0 0 1 2-2h2.938a8 8 0 0 0-15.876 0H7a2 2 0 0 1 2 2v4a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2v-5C2 6.477 6.477 2 12 2s10 4.477 10 10V17z" />
                                    </svg>
                                </div>
                                <div>
                                    @php
                                        $Phone = explode(',',$contact->phone)
                                    @endphp
                                    @foreach ($Phone as $pval)
                                    <h5>{{ $pval }}</h5>
                                    @endforeach

                                    <p>Call us: Sun - Thu 9:30 - 18:30</p>
                                </div>
                            </div>

                            <div class="info-item mb-3 d-flex align-items-start">
                                <div class="icon me-3">
                                    <!-- Location Icon -->
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M12 18.485l4.243-4.242a6 6 0 1 0-8.486 0L12 18.485z" />
                                    </svg>
                                </div>
                                <div>
                                    <h5>Address</h5>
                                    <p><strong>BrandTech Solutions Ltd.</strong></p>
                                    <p>{{ $contact->address }}</p>
                                </div>
                            </div>

                            <div class="info-item mb-3 d-flex align-items-start">
                                <div class="icon me-3">
                                    <!-- Email Icon -->
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M12 22C6.477 22 2 17.523 2 12S6.477 2 12 2s10 4.477 10 10-4.477 10-10 10z" />
                                    </svg>
                                </div>
                                <div>
                                    <h5 style="text-transform: lowercase">{{ $contact->email }}</h5>
                                    <p>Drop us a line anytime!</p>
                                </div>
                            </div>

                            <!-- Social Icons -->
                            <div class="social-icons mt-4 d-flex gap-3">
                                @if ($contact && $contact->facebook)
                                    <a class="text-dark" target="__blank" href="{{ $contact->facebook }}"><i
                                            class="fab fa-facebook-f"></i></a>
                                @endif
                                @if ($contact && $contact->twitter)
                                    <a target="__blank" href="{{ $contact->twitter }}">
                                        <img src="{{ asset('public/frontend/assets/img/x2.svg') }}" alt="X"
                                            style="width: 18px; height: 18px; vertical-align: middle;">
                                    </a>
                                @endif
                                @if ($contact && $contact->linkedin)
                                    <a class="text-dark" target="__blank" href="{{ $contact->linkedin }}"><i
                                            class="fab fa-linkedin-in"></i></a>
                                @endif
                                @if ($contact && $contact->youtube)
                                    <a class="text-dark" target="__blank" href="{{ $contact->youtube }}"><i
                                            class="fab fa-youtube"></i></a>
                                @endif
                                @if ($contact && $contact->instagram)
                                    <a class="text-dark" target="__blank" href="{{ $contact->instagram }}"><i
                                            class="fab fa-instagram"></i></a>
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- Contact Form -->
                    <div class="col-lg-7">
                        <div class="contact-form p-4 bg-white shadow-sm rounded">
                            <h3 class="mb-4">Make an Online Enquiry</h3>
                            <p>Got questions? Ideas? Fill out the form below to get our proposal.</p>
                            @if (session('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('success') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif
                            <form action="{{ route('frontEnd.contactUsStore') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-12 mb-3">
                                        <input type="text" name="name"
                                            class="form-control @error('name') is-invalid @enderror"
                                            placeholder="{{ __('admin_local.Company Name') }} *"
                                            value="{{ old('name') }}" required>
                                        @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-12 mb-3">
                                        <input type="tel" name="phone"
                                            class="form-control @error('phone') is-invalid @enderror"
                                            placeholder="{{ __('admin_local.Company Phone') }} *"
                                            value="{{ old('phone') }}" required>
                                        @error('phone')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-12 mb-3">
                                        <input type="email" name="email"
                                            class="form-control @error('email') is-invalid @enderror"
                                            placeholder="{{ __('admin_local.Company Email') }}"
                                            value="{{ old('email') }}">
                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-12 mb-3">
                                        <textarea name="message" rows="5" class="form-control @error('message') is-invalid @enderror"
                                            placeholder="{{ __('admin_local.Message') }} *" required>{{ old('message') }}</textarea>
                                        @error('message')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-12">
                                        <button type="submit"
                                            class="btn ns-theme-btn ns-contact-btn float-end">{{ __('admin_local.Send Message') }}</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Row 2: Google Map -->
                <div class="row mt-5">
                    @if ($contact->location)
                        <div class="col-12">
                            <div class="map-container rounded overflow-hidden shadow-sm">
                                <iframe src="https://www.google.com/maps/embed?pb={{ $contact->location }}" width="100%"
                                    height="400" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </section>
    @endif
@endsection
