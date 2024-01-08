<form action="{{ route('designation.update', $department->id) }}" method="POST">
    @csrf
    @method('PATCH')
    <div class="row">
        <div class="col-lg-12">
            <div class="row mb-4 p-4">
                <label for="one" class="col-sm-4 col-form-label">Designation Code</label>
                <div class="col-sm-8">
                    <input type="text" name="designation_code" class="form-control" placeholder="Designation Code"
                        value="{{ $department->designation_code }}">
                </div>
            </div>
            <div class="row mb-4">
                <label for="one" class="col-sm-4 col-form-label">Status</label>
                <div class="col-sm-8">
                    <select name="designation_status" id="" class="form-control">
                        <option value="1" {{ $department->designation_status == 1 ? 'selected' : '' }}>Active
                        </option>
                        <option value="0" {{ $department->designation_status == 0 ? 'selected' : '' }}>Inactive
                        </option>
                    </select>
                </div>
            </div>
            <div class="row mb-4">
                <label for="one" class="col-sm-4 col-form-label">Description</label>
                <div class="col-sm-8">
                    <textarea name="designation_desc" rows="2" class="form-control" placeholder="Description">{{ $department->designation_desc }}</textarea>
                </div>
            </div>
            <div class="row mb-4">
                <label for="one" class="col-sm-4 col-form-label">List Order</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="designation_seqno" placeholder="List Order"
                        value="{{ $department->designation_seqno }}">
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <a href="{{ route('designation.index') }}" class="btn btn-sm btn-secondary">Cancel</a>
            <button type="submit" class="btn btn-sm btn-info">Submit</button>
        </div>
    </div>
</form>
