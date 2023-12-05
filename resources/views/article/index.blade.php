<x-bootstrap title="">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Article</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-9">
                                <a href="{{ url('/article/create') }}" class="btn btn-success btn-sm"
                                    title="Add New Article">
                                    <i class="fa fa-plus" aria-hidden="true"></i> Add New
                                </a>
                            </div>
                            <div class="col-lg-3">
                                <form method="GET" action="{{ url('/article') }}" accept-charset="UTF-8"
                                    class="form-inline my-2 my-lg-0 float-right" role="search">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="search"
                                            placeholder="Search..." value="{{ request('search') }}">
                                        <span class="input-group-append">
                                            <button class="btn btn-secondary" type="submit">
                                                <i class="fa fa-search"></i>
                                            </button>
                                        </span>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <br />
                        <br />
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Title</th>
                                        {{-- <th>Link</th> --}}
                                        {{-- <th>Guid</th> --}}
                                        <th>Category</th>
                                        <th>Creator</th>
                                        <th>PubDate</th>
                                        {{-- <th>ContentEncoded</th> --}}
                                        <th>Image Url</th>
                                        {{-- <th>First Paragraph</th> --}}
                                        <th>Credit</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($article as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->title }}</td>
                                            {{-- <td>{{ $item->link }}</td> --}}
                                            {{-- <td>{{ $item->guid }}</td> --}}
                                            <td>{{ $item->category }}</td>
                                            <td>{{ $item->creator }}</td>
                                            <td>{{ $item->pubDate }}</td>
                                            {{-- <td>{{ $item->contentEncoded }}</td> --}}
                                            <td><img src="{{ $item->image_url }}" width="100" /></td>
                                            {{-- <td>{{ $item->first_paragraph }}</td> --}}
                                            <td>{{ $item->credit }}</td>
                                            <td>
                                                <a href="{{ url('/article/' . $item->id) }}"
                                                    title="View Article"><button class="btn btn-info btn-sm"><i
                                                            class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                                <a href="{{ url('/article/' . $item->id . '/edit') }}"
                                                    title="Edit Article"><button class="btn btn-primary btn-sm"><i
                                                            class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                        Edit</button></a>

                                                <form method="POST" action="{{ url('/article' . '/' . $item->id) }}"
                                                    accept-charset="UTF-8" style="display:inline">
                                                    {{ method_field('DELETE') }}
                                                    {{ csrf_field() }}
                                                    <button type="submit" class="btn btn-danger btn-sm"
                                                        title="Delete Article"
                                                        onclick="return confirm('Confirm delete?')"><i
                                                            class="fa fa-trash-o" aria-hidden="true"></i>
                                                        Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $article->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-bootstrap>
