 @foreach ($publicDiplomacies as $publicdiplomacy)
     <div class="col-12 col-md-6 col-lg-4 mb-4">
         <a target="__blank" href="{{ $publicdiplomacy->link }}" class="ns-news-link text-decoration-none">
             <div class="ns-news-card">
                 <div class="ns-news-img position-relative">
                     <img src="{{ asset($publicdiplomacy->image ?? 'public/frontend/assets/img/project/project-41.jpg') }}"
                         alt="News Image" class="img-fluid">
                     <span class="ns-news-badge">{{ $publicdiplomacy->country->name }}</span>
                 </div>
                 <div class="ns-news-content p-3">
                     <h5 class="ns-news-title mb-2">{{ $publicdiplomacy->title }}</h5>
                     <p class="ns-news-author mb-0"><strong>{{ $publicdiplomacy->name }}</strong></p>
                 </div>
             </div>
         </a>
     </div>
 @endforeach
