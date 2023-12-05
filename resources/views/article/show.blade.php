<x-bootstrap title="">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Article {{ $article->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/article') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/article/' . $article->id . '/edit') }}" title="Edit Article"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('article' . '/' . $article->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Article" onclick="return confirm('Confirm delete?')"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $article->id }}</td>
                                    </tr>
                                    <tr><th> Title </th><td> {{ $article->title }} </td></tr><tr><th> Link </th><td> {{ $article->link }} </td></tr><tr><th> Guid </th><td> {{ $article->guid }} </td></tr><tr><th> Category </th><td> {{ $article->category }} </td></tr><tr><th> Creator </th><td> {{ $article->creator }} </td></tr><tr><th> PubDate </th><td> {{ $article->pubDate }} </td></tr><tr><th> ContentEncoded </th><td> {{ $article->contentEncoded }} </td></tr><tr><th> Image Url </th><td> {{ $article->image_url }} </td></tr><tr><th> First Paragraph </th><td> {{ $article->first_paragraph }} </td></tr><tr><th> Credit </th><td> {{ $article->credit }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-bootstrap>