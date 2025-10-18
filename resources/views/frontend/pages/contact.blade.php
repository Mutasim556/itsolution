@extends('frontend.layouts.frontend')
@push('title')
    {{ __('admin_local.Contact Us') }}
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
    </style>
@endpush
@section('content')
    @php
        $contact = \App\Models\Admin\Contact::first();
    @endphp
    @if ($contact)
        <section class="pt-110 pb-115">

            <div class="ns-contact-container container">
                <div class="ns-inner-wrap">
                    <div class="ns-contact-space">
                        <div class="ns-contact-wrap">
                            <div class="ns-contact-left">
                                <div class="ns-section mb-35">
                                    <span class="ns-section-subtitle">{{ __('admin_local.Contact Now') }}</span>
                                    <h3 class="ns-section-title mb-15">{{ __('admin_local.For Live Sports , Contacts Us') }}
                                    </h3>
                                    <p class="ns-section-text mb-0">
                                        {{ __('admin_local.Have questions or need assistance with our live sports coverage? Our team is always ready to help you with any inquiries, technical issues, or partnership opportunities. Stay connected with us to ensure you never miss a moment of your favorite live matches and sporting events.') }}
                                    </p>
                                </div>
                                <div class="ns-contact-form">
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
                                            <div class="col-sm-4 mb-3">
                                                <input type="text" name="name"
                                                    class="form-control @error('name') is-invalid @enderror"
                                                    placeholder="{{ __('admin_local.Your Name') }} *"
                                                    value="{{ old('name') }}" required>
                                                @error('name')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="col-sm-4 mb-3">
                                                <input type="tel" name="phone"
                                                    class="form-control @error('phone') is-invalid @enderror"
                                                    placeholder="{{ __('admin_local.Your Phone') }} *"
                                                    value="{{ old('phone') }}" required>
                                                @error('phone')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="col-sm-4 mb-3">
                                                <input type="email" name="email"
                                                    class="form-control @error('email') is-invalid @enderror"
                                                    placeholder="{{ __('admin_local.Your Email') }}"
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
                                                    class="btn ns-theme-btn ns-contact-btn float-end">{{ __('admin_local.Send Request') }}</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="ns-contact-right">
                                <div class="ns-contact-info">
                                    <span class="ns-contact-circle-1"></span>
                                    <span class="ns-contact-circle-2"></span>
                                    {{-- <img src="assets/img/contact/contact.jpg" alt="Not Found" class="ns-contact-bg-img"> --}}
                                    <img class="ns-contact-shape ns-contact-shape-1"
                                        src="{{ asset('public/frontend/assets/img/contact/contact-map.png') }}"
                                        alt="Not Found">
                                    <img class="ns-contact-shape ns-contact-shape-2"
                                        src="{{ asset('public/frontend/assets/img/contact/contact-map.png') }}"
                                        alt="Not Found">
                                    <img class="ns-contact-shape ns-contact-shape-3"
                                        src="{{ asset('public/frontend/assets/img/contact/contact-map.png') }}"
                                        alt="Not Found">
                                    <div class="ns-contact-item ns-phone">
                                        <div class="ns-contact-item-icon">
                                            <i class="icofont-ui-call"></i>
                                        </div>
                                        <div class="ns-contact-item-details">
                                            <span>{{ __('admin_local.Call Us') }}</span>
                                            <div>
                                                @php
                                                    $cPhone = explode(',', $contact->phone);
                                                @endphp
                                                @foreach ($cPhone as $phone)
                                                    <a href="tel:{{ $phone }}">{{ $phone }}</a>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    @if ($contact->email)
                                        <div class="ns-contact-item ns-mail">
                                            <div class="ns-contact-item-icon">
                                                <i class="icofont-envelope"></i>
                                            </div>
                                            <div class="ns-contact-item-details">
                                                <span>{{ __('admin_local.Mail Us') }}</span>
                                                <div>
                                                    <a
                                                        href="mailto:{{ $contact->email }}
                                                    ">{{ $contact->email }}
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    @if ($contact->address)
                                        <div class="ns-contact-item ns-address">
                                            <div class="ns-contact-item-icon">
                                                <i class="icofont-location-pin"></i>
                                            </div>
                                            <div class="ns-contact-item-details">
                                                <span>{{ __('admin_local.Address') }}</span>
                                                <p>{{ $contact->address }}</p>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @if ($contact->location)
                <div class="row map-row mt-20 " style="">
                    <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 mx-auto">
                        <iframe src="https://www.google.com/maps/embed?pb={{ $contact->location }}" width="100%"
                            height="400px"></iframe>
                    </div>
                </div>
            @endif
        </section>
    @endif


    @php
        $services = \App\Models\Admin\Service::where([['status', 1], ['delete', 0]])->get();
    @endphp
    @if (count($services) > 0)
        <section class="ns-service-area pt-110 pb-110">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="ns-section mb-50 text-center">
                            <span class="ns-section-subtitle">{{ __('admin_local.What We Do') }}</span>
                            <h2 class="ns-section-title mb-0">{{ __('admin_local.Our Popular Services') }}</h2>
                        </div>
                    </div>
                </div>

                <div class="ns-service-wrap">
                    <div class="swiper-container service-active">
                        <div class="swiper-wrapper">
                            @foreach ($services as $service)
                                <div class="swiper-slide">
                                    <div class="ns-service-item">
                                        <div class="ns-service-img w_img">
                                            <a href="{{ route('frontEnd.serviceDetails',[\Str::slug($service->service_name)."?service=".\Vinkla\Hashids\Facades\Hashids::encode($service->id)]) }}"><img
                                                    src="{{ asset($service->service_image ? $service->service_image : 'public/admin/images/images.png') }}"
                                                    alt="Not Found"></a>
                                        </div>
                                        <div class="ns-service-content">
                                            <h4 class="ns-service-content-title"><a
                                                    href="{{ route('frontEnd.serviceDetails',[\Str::slug($service->service_name)."?service=".\Vinkla\Hashids\Facades\Hashids::encode($service->id)]) }}">{{ $service->service_name }}</a></h4>
                                            <p>{{ $service->service_short_details }}
                                            </p>
                                            <a href="{{ route('frontEnd.serviceDetails', [\Str::slug($service->service_name) . '?service=' . \Vinkla\Hashids\Facades\Hashids::encode($service->id)]) }}"
                                                class="ns-service-btn">{{ __('admin_local.Read More') }}<i
                                                    class="icofont-plus"></i></a>
                                            <div class="ns-service-content-icon">
                                                <img height="60px" width="60px"
                                                    src="{{ asset($service->service_icon ? $service->service_icon : 'public/admin/images/images.png') }}"
                                                    alt="Not Found">
                                            </div>
                                            <span class="ns-service-shape-1"></span>
                                            <span class="ns-service-shape-2"></span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

@endsection
