<x-bootstrap title="Scraping Medium Feed">
    <section>
        <div class="container">
            <form method="post" action="{{ route('scraping.medium-feed.store') }}">
                @csrf
                <div class="mb-3">
                    <label for="publication" class="form-label">Publication</label>
                    <input type="" class="form-control" id="publication" name="publication"required>
                    <div id="emailHelp" class="form-text">
                        your publication on medium
                    </div>
                </div>
                <div class="mb-3">
                    <label for="tagname" class="form-label">Tagname (optional)</label>
                    <input type="" class="form-control" id="tagname" name="tagname">
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>

    </section>
</x-bootstrap>
