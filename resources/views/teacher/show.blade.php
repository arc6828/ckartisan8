<x-bootstrap title="">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Teacher {{ $teacher->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/teacher') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/teacher/' . $teacher->id . '/edit') }}" title="Edit Teacher"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('teacher' . '/' . $teacher->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Teacher" onclick="return confirm('Confirm delete?')"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $teacher->id }}</td>
                                    </tr>
                                    <tr><th> Name </th><td> {{ $teacher->name }} </td></tr><tr><th> Education </th><td> {{ $teacher->education }} </td></tr><tr><th> Role </th><td> {{ $teacher->role }} </td></tr><tr><th> Email </th><td> {{ $teacher->email }} </td></tr><tr><th> Phone </th><td> {{ $teacher->phone }} </td></tr><tr><th> Image </th><td> {{ $teacher->image }} </td></tr><tr><th> Office </th><td> {{ $teacher->office }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-bootstrap>