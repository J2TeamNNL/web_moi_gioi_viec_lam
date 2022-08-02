<div class="col-md-6 col-lg-4">
    <div class="rotating-card-container manual-flip" style="height: 328.875px; margin-bottom: 30px;">
        <div class="card">
            <div class="front" style="min-height: 328.875px;">
                @if($post->is_pinned)
                    <svg style="height: 20px; position: absolute; right: 10px; top: 10px;"
                         xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
                        <!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                        <path d="M32 32C32 14.33 46.33 0 64 0H320C337.7 0 352 14.33 352 32C352 49.67 337.7 64 320 64H290.5L301.9 212.2C338.6 232.1 367.5 265.4 381.4 306.9L382.4 309.9C385.6 319.6 383.1 330.4 377.1 338.7C371.9 347.1 362.3 352 352 352H32C21.71 352 12.05 347.1 6.04 338.7C.0259 330.4-1.611 319.6 1.642 309.9L2.644 306.9C16.47 265.4 45.42 232.1 82.14 212.2L93.54 64H64C46.33 64 32 49.67 32 32zM224 384V480C224 497.7 209.7 512 192 512C174.3 512 160 497.7 160 480V384H224z"/>
                    </svg>
                @endif
                <div class="card-content">
                    <h5 class="category-social text-success">
                        <a href="{{ route('applicant.show', $post) }}">
                            <i class="fa fa-newspaper-o"></i> {{ $post->job_title }}
                        </a>
                    </h5>
                    <h4 class="card-title">
                        {{ $languages }}
                    </h4>
                    <p class="card-description">
                        {{ $post->location }}
                    </p>
                    <div class="footer" style="display: flex; align-items: center; justify-content: space-between">
                        @isset($company)
                            <div class="author">
                                {{--  @todo @j2teamnnl edit link company--}}
                                <a href="#">
                                    <img src="{{ $company->logo }}" class="avatar img-raised">
                                    <span>{{ $company->name }}</span>
                                </a>
                            </div>
                        @endisset
                        <div>
                            {{ $post->salary }}
                        </div>
                    </div>
                </div>
                @if($post->is_not_available)
                    <span style="position: absolute; right: 10px; bottom: 10px;">
                        <i class="fa fa-close"></i>
                        {{ __('frontpage.not_available') }}
                    </span>
                @endif
            </div>
        </div>
    </div>
</div>
