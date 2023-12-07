<x-bootstrap title="Scraping Medium Feed">
    <section>
        <div class="container">

            <h1 class="my-4">Scraping Medium Feed</h1>
            <form method="post" action="{{ route('scraping.medium-feed.store') }}">
                @csrf
                <div class="mb-3">
                    <label for="url" class="form-label">URL</label>
                    <input type="" class="form-control" id="url" name="url"required
                        onkeyup="extract(this);">
                    <div id="urlHelp" class="form-text">
                        your URL on medium
                    </div>
                </div>
                <script>
                    function extract(element) {
                        // https://medium.com/cs-vru/tagged/computer-science
                        let url = element.value;
                        let s = url.replace("https://medium.com/", "");
                        let a = s.split("/");
                        console.log(a);
                        if (a.length == 1) {
                            document.querySelector("#publication").value = a[0];
                            document.querySelector("#tagname").value = "";
                        } else if (a.length == 3) {
                            document.querySelector("#publication").value = a[0];
                            document.querySelector("#tagname").value = a[2];
                        }


                    }
                </script>
                <div class="row mb-3">
                    <div class="col">
                        <label for="publication" class="form-label">Publication</label>
                        <input type="" class="form-control bg-light" id="publication" name="publication"required
                            readonly>
                        <div id="emailHelp" class="form-text">
                            your publication on medium
                        </div>
                    </div>
                    <div class="col">
                        <label for="tagname" class="form-label">Tagname (optional)</label>
                        <input type="" class="form-control bg-light" id="tagname" name="tagname" readonly>
                        <div id="emailHelp" class="form-text">
                            your tag on the selected publication
                        </div>
                    </div>
                </div>


                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>

    </section>
</x-bootstrap>
