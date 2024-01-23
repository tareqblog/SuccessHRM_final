<table class="table table-bordered dataTable no-footer">
    <thead>
        <tr>
            <th>NO</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Resume</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($items as $data)
            <tr>
                <td>{{ $loop->index + 1 }}</td>
                <td>{{ $data->name }}</td>
                <td>{{ $data->email }}</td>
                <td>{{ $data->phone_no }}</td>
                <td><a target="_blank" href="{{ asset('storage') }}/{{ $data->resume_path }}" class="btn btn-info"><i
                            class="fa fa-eye"></i></a></td>
                <td>
                    <form action="{{ route('temporary.data.delete', $data->id) }}" method="POST">
                        @csrf
                        <button {{$data->status == 0 ? '' : 'hidden'}} class="btn btn-danger" type="submit"><i class="fa fa-trash"></i></button>
                    </form>
                    <a href="{{ route('candidate.edit', $data->candidate_id) }}" {{$data->status == 0 ? 'hidden' : ''}} class="btn btn-success">Candidate</a>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="6">
                    <p class="text-center text-danger">No data found</p>
                </td>
            </tr>
        @endforelse
    </tbody>
</table>
