<x-bootstrap title="">
    <style>
        .container img {
            width: 100%;
        }
    </style>
    <section>
        <div class="bg-dark text-white py-4">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <h1>{{ $article->title }}</h1>
                        <label class="h4">{{ $article->creator }}</label>
                    </div>
                    <div class="col-md-4">
                        <div class="p-4">
                            <label class="h3">บทความ</label>
                            <label class="h5">หลักสูตรวิทยาการคอมพิวเตอร์</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="">
        <div class="container">
            <br />
            <div class="row my-4">
                <div class="col-md-12">
                    <label class="h6">วันที่โพสต์ {{ $article->pubDate }}</label>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <div>
                        @foreach (json_decode($article->category) as $c)
                            <span class="badge rounded-pill text-bg-light">{{ $c }}</span>
                        @endforeach
                    </div>
                    <div>
                        <?= html_entity_decode($article->contentEncoded) ?>
                    </div>
                    {{-- <div> {{ html_entity_decode($article->contentEncoded) }} </div> --}}

                    <div>
                        @foreach (json_decode($article->category) as $c)
                            <span class="badge rounded-pill text-bg-light">{{ $c }}</span>
                        @endforeach
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="px-4 border-start">
                        <h2 class="h4">บทความล่าสุด</h2>

                        {{-- <div class="row row-cols-1 row-cols-md-2 g-4"> --}}
                        <div class="row g-4">
                            @foreach ($latest as $item)
                                <div class="col-lg-12">
                                    <div class="card">
                                        <img src="{{ $item->image_url }}" class="card-img-top"
                                            alt="{{ $item->title }}">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $item->title }}</h5>
                                            <p class="card-text">{{ $item->creator }}</p>
                                            <p class="card-text">{{ $item->pubDate }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>




                    </div>
                </div>
            </div>


        </div>
    </section>
    <br />
    <section>
        <div class="container">
            <div class="row mt-4">
                <div class="col-md-12">
                    <h2 class="h4">บทความอื่นๆ</h2>
                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-2 row-cols-lg-3  row-cols-xl-4 g-4">
                        {{-- <div class="row g-4"> --}}
                        @foreach ($tagged as $item)
                            <div class="col">
                                <div class="card h-100">
                                    <img src="{{ $item->image_url }}" class="card-img-top" alt="{{ $item->title }}">
                                    <div class="card-body">
                                        <h6 class="card-title">{{ mb_substr($item->title, 0, 50) }}</h6>
                                        
                                        <p class="card-text">{{ $item->creator }}</p>
                                        <p class="card-text">{{ $item->pubDate }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-bootstrap>
