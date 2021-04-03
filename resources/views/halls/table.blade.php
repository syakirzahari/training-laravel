@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>List of Lecture Halls</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('halls.create') }}"> Add New Hall</a>
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
            <th>Name</th>
            <th>Place</th>
            <th>Created At</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($hall as $h)
        <tr>
            <td>{{ $h->id }}</td>
            <td>{{ $h->name }}</td>
            <td>{{ $h->place }}</td>
            <td>{{ $h->created_at }}</td>
            <td>
                <form action="{{ route('halls.destroy',$h->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('halls.show',$h->id) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('halls.edit',$h->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
      
@endsection