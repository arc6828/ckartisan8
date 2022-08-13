<x-magdesign.theme>
    {{-- trending --}}
    <div class="section pt-5 pb-0">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-lg-7 text-center">
                    <h2 class="heading">Trending</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="posts-slide-wrap">
                        <div class="posts-slide" id="posts-slide">
                            @foreach ($data->channel->item as $item)
                                <div class="item">
                                    <div class="post-entry d-lg-flex">
                                        <div class="me-lg-5 thumbnail mb-4 mb-lg-0">
                                            <a href="{{ $item->link }}">
                                                <img src="{{ $item->image_url }}" alt="Image" class="img-fluid"
                                                    data-pagespeed-url-hash="1105166545"
                                                    onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
                                            </a>
                                        </div>
                                        <div class="content align-self-center">
                                            <div class="post-meta mb-3">
                                                @if (is_array($item->category))
                                                    @foreach ($item->category as $c)
                                                        <a href="#" class="category">{{ $c }}</a>
                                                    @endforeach
                                                @else
                                                    <a href="#" class="category">{{ $item->category }}</a>
                                                @endif
                                                &mdash;
                                                <span class="date">{{ $item->pubDate }}</span>
                                            </div>
                                            <h2 class="heading">
                                                <a href="{{ $item->link }}">{{ $item->title }}</a>
                                            </h2>
                                            <p>{{ $item->first_paragraph }}</p>
                                            <a href="#" class="post-author d-flex align-items-center">
                                                <div class="author-pic">
                                                    <img src="https://cdn-images-1.medium.com/fit/c/36/36/1*1XAKBpvxYgdKXjv5YiLe6A.jpeg"
                                                        alt="Image" data-pagespeed-url-hash="1813383360"
                                                        onload="pagespeed.CriticalImages.checkImageForCriticality(this);" />
                                                </div>
                                                <div class="text">
                                                    <strong>{{ $item->creator }}</strong>
                                                    <span>Writer</span>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>


                                @break(true)
                                {{-- <hr /> --}}
                            @endforeach

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- blog --}}
    <div class="section">
        <div class="container">
            <div class="row g-5">
                @foreach ($data->channel->item as $item)
                    @if ($loop->first)
                        @continue
                    @endif
                    <div class="col-lg-4">
                        <div class="post-entry d-block small-post-entry-v">
                            <div class="thumbnail">
                                <a href="{{ $item->link }}">
                                    <img src="{{ $item->image_url }}" alt="Image" class="img-fluid" />
                                </a>
                            </div>
                            <div class="content">
                                <div class="post-meta mb-1">
                                    @if (is_array($item->category))
                                        @foreach ($item->category as $c)
                                            <a href="#" class="category">{{ $c }}</a>
                                        @endforeach
                                    @else
                                        <a href="#" class="category">{{ $item->category }}</a>
                                    @endif

                                    —
                                    <span class="date">July 2, 2020</span>
                                </div>
                                <h2 class="heading mb-3"><a href="{{ $item->link }}">{{ $item->title }}</a></h2>
                                <p>{{ $item->first_paragraph }}</p>
                                <a href="#" class="post-author d-flex align-items-center">
                                    <div class="author-pic">
                                        <img src="https://cdn-images-1.medium.com/fit/c/36/36/1*1XAKBpvxYgdKXjv5YiLe6A.jpeg"
                                            alt="Image" />
                                    </div>
                                    <div class="text">
                                        <strong>{{ $item->creator }}</strong>
                                        <span>Writer</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    {{-- most popular post --}}
    <div class="section">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-lg-7 text-center">
                    <h2 class="heading">Most Popular Posts</h2>
                </div>
            </div>
        </div>
        <div class="most-popular-slider-wrap px-3 px-md-0">
            <div id="most-popular-nav" aria-label="Carousel Navigation" tabindex="0">
                <span class="prev" data-controls="prev" aria-controls="most-popular-center" tabindex="-1">Prev</span>
                <span class="next" data-controls="next" aria-controls="most-popular-center" tabindex="-1">Next</span>
            </div>
            <div class="most-popular-slider" id="most-popular-center">
                @foreach ($laravel->channel->item as $item)
                    <div class="item">
                        <div class="post-entry d-block small-post-entry-v">
                            <div class="thumbnail">
                                <a href="{{ $item->link }}">
                                    <img src="{{ $item->image_url }}" alt="Image" class="img-fluid" />
                                </a>
                            </div>
                            <div class="content">
                                <div class="post-meta mb-1">
                                    <a href="#" class="category">Business</a>
                                    <a href="#" class="category">Travel</a>
                                    &mdash;
                                    <span class="date">{{ $item->pubDate }}</span>
                                </div>
                                <h2 class="heading mb-3">
                                    <a href="single.html">{{ $item->title }}</a>
                                </h2>
                                <p>{{ $item->first_paragraph }}</p>
                                <a href="#" class="post-author d-flex align-items-center">
                                    <div class="author-pic">
                                        <img src="https://cdn-images-1.medium.com/fit/c/36/36/1*1XAKBpvxYgdKXjv5YiLe6A.jpeg"
                                            alt="Image">
                                    </div>
                                    <div class="text">
                                        <strong>{{ $item->creator }}</strong>
                                        <span>Writer</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    {{-- sport --}}
    <div class="section">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6">
                    <div class="row mb-4">
                        <div class="col-12">
                            <h2 class="h4 fw-bold">Ubuntu</h2>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        @foreach ($ubuntu->channel->item as $item)
                            <div class="col-lg-12">
                                <div class="post-entry d-md-flex xsmall-horizontal mb-5">
                                    <div class="me-md-3 thumbnail mb-3 mb-md-0">
                                        <img src="{{ $item->image_url }}" alt="Image" class="img-fluid">
                                    </div>
                                    <div class="content">
                                        <div class="post-meta mb-1">
                                            @if (is_array($item->category))
                                                @foreach ($item->category as $c)
                                                    <a href="#" class="category">{{ $c }}</a>
                                                @endforeach
                                            @else
                                                <a href="#" class="category">{{ $item->category }}</a>
                                            @endif
                                            —
                                            <span class="date">{{ $item->pubDate }}</span>
                                        </div>
                                        <h2 class="heading">
                                            <a href="{{ $item->link }}">{{ $item->title }}</a>
                                        </h2>
                                        <a href="#" class="post-author d-flex align-items-center">
                                            <div class="author-pic">
                                                <img src="https://cdn-images-1.medium.com/fit/c/36/36/1*1XAKBpvxYgdKXjv5YiLe6A.jpeg"
                                                    alt="Image">
                                            </div>
                                            <div class="text">
                                                <strong>{{ $item->creator }}</strong>
                                                <span>Writer, 26 published post</span>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            @if ($loop->index >= 3)
                            @break
                        @endif
                    @endforeach
                </div>
            </div>
            <div class="col-lg-6">
                <div class="row mb-4">
                    <div class="col-12">
                        <h2 class="h4 fw-bold">Git</h2>
                    </div>
                </div>
                <div class="row justify-content-center">
                    @foreach ($git->channel->item as $item)
                        <div class="col-lg-12">
                            <div class="post-entry d-md-flex xsmall-horizontal mb-5">
                                <div class="me-md-3 thumbnail mb-3 mb-md-0">
                                    <img src="{{ $item->image_url }}" alt="Image" class="img-fluid">
                                </div>
                                <div class="content">
                                    <div class="post-meta mb-1">
                                        @if (is_array($item->category))
                                            @foreach ($item->category as $c)
                                                <a href="#" class="category">{{ $c }}</a>
                                            @endforeach
                                        @else
                                            <a href="#" class="category">{{ $item->category }}</a>
                                        @endif
                                        —
                                        <span class="date">{{ $item->pubDate }}</span>
                                    </div>
                                    <h2 class="heading">
                                        <a href="{{ $item->link }}">{{ $item->title }}</a>
                                    </h2>
                                    <a href="#" class="post-author d-flex align-items-center">
                                        <div class="author-pic">
                                            <img src="https://cdn-images-1.medium.com/fit/c/36/36/1*1XAKBpvxYgdKXjv5YiLe6A.jpeg"
                                                alt="Image">
                                        </div>
                                        <div class="text">
                                            <strong>{{ $item->creator }}</strong>
                                            <span>Writer, 26 published post</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        @if ($loop->index >= 2)
                        @break
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</div>
</div>

</x-magdesign.theme>
