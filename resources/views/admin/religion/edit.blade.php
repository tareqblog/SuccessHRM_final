<form action="{{ route('religion.update', $religion->id) }}" method="POST">
    @csrf
    @method('PATCH')
    <div class="row">
        <div class="col-lg-6">
            <div class="row mb-4">
                <label for="one" class="col-sm-3 col-form-label">Religion Code</label>
                <div class="col-sm-9">
                    <input type="text" name="religion_code" class="form-control" placeholder="Title"
                        value="{{ $religion->religion_code }}">
                </div>
            </div>
            <div class="row mb-4">
                <label for="one" class="col-sm-3 col-form-label">Religion Description</label>
                <div class="col-sm-9">
                    <textarea name="religion_desc" rows="2" class="form-control" placeholder="Descriptin"> {{$religion->religion_desc}} </textarea>
                </div>
            </div>
        </div>
        <div class="col-lg-6">

            <div class="row mb-4">
                <label for="one" class="col-sm-3 col-form-label">Seq No</label>
                <div class="col-sm-9">
                    <input type="text" name="religion_seqno" class="form-control" placeholder="Seq no"
                        value="{{ $religion->religion_seqno }}">
                </div>
            </div>
            <div class="row mb-4">
                <label for="one" class="col-sm-3 col-form-label">Status</label>
                <div class="col-sm-9">
                    <select name="religion_status" class="form-control">
                        <option value="1" {{ $religion->religion_status == 1 ? 'selected' : '' }}>Active</option>
                        <option value="0" {{ $religion->religion_status == 0 ? 'selected' : '' }}>In-Active</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-lg-12">
            <button type="button"  data-bs-dismiss="modal" aria-label="Close" class="btn btn-sm btn-secondary">Cancel</button>
            <button type="submit" class="btn btn-sm btn-info">Submit</button>
        </div>
    </div>
</form>
