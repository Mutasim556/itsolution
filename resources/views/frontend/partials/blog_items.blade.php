@foreach ($blogs as $blogKey => $blog)
    <div class="col-12 col-md-6 col-lg-4 mb-4">
        <a target="__blank" href="{{ $blog->link }}" class="ns-news-link text-decoration-none">
            <div class="ns-news-card">
                <div class="ns-news-img position-relative">
                    @php
                        $images = json_decode($blog->images);
                    @endphp
                    <img src="{{ asset($images[0] ?? 'public/frontend/assets/img/project/project-41.jpg') }}"
                        alt="News Image" class="img-fluid">
                    {{-- <span class="ns-news-badge">{{ $blog->country->name }}</span> --}}
                </div>
                <div class="ns-news-footer d-flex justify-content-between px-3 pb-3">
                    <div class="ns-news-author text-muted">
                        <small>Blog by: {{ $blog->admin->name ?? 'Adminsd' }}</small>
                    </div>
                    <div class="ns-news-date text-muted">
                        <small>{{ $blog->created_at->format('M d, Y') }}</small>
                    </div>
                </div>
                <div class="ns-news-content p-3 text-center">
                    <h5 class="ns-news-title mb-2">{{ $blog->title }}</h5>
                    <div class="mt-auto">
                        <a href="{{ $blog->link }}" target="__blank"
                            class="ns-read-more-btn w-100 text-center text-uppercase fw-bold">
                            Read More
                        </a>
                    </div>
                </div>
            </div>
        </a>
    </div>
@endforeach
