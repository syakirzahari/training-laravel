@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>List of Subjects</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('subjects.create') }}"> Add New Subject</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Subject Code</th>
            <th>Name</th>
            <th>Created At</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($subject as $s)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $s->subject_code }}</td>
            <td>{{ $s->name }}</td>
            <td>{{ $s->created_at }}</td>
            <td>
                <form action="{{ route('subjects.destroy',$s->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('subjects.show',$s->id) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('subjects.edit',$s->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $subject->links() !!}
      
@endsection