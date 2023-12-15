
<form action="{{ route('job-category.update', $job_category->id) }}" method="POST">
    @csrf
    @method('PATCH')
    <div class="row">
        <div class="col-lg-6">
            <div class="row mb-4">
                <label for="one" class="col-sm-3 col-form-label">Category
                    Name</label>
                <div class="col-sm-9">
                    <input type="text" name="jobcategory_name"
                        class="form-control" placeholder="Name" value="{{$job_category->jobcategory_name}}">
                </div>
            </div>
            <div class="row mb-4">
                <label for="one" class="col-sm-3 col-form-label">Category
                    Parent</label>
                <div class="col-sm-9">
                    <select name="jobcategory_parent" class="form-control">
                        <option value="">Select One</option>
                        @foreach ($jobType as $type)
                        <option value="{{$type->id}}" {{$job_category->jobcategory_parent == $type->id ? 'selected' : ''}}> {{$type->jobtype_code}} </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="row mb-4">
                <label for="one" class="col-sm-3 col-form-label">Seq
                    No</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control"
                        name="jobcategory_seqno" placeholder="Seq No">
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <button type="button"  data-bs-dismiss="modal"
            aria-label="Close"
                class="btn btn-sm btn-secondary me-3">Cancel</a>
            <button type="submit" class="btn btn-sm btn-info">Submit</button>
        </div>
    </div>
</form>
