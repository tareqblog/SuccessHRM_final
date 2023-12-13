<form action="{{ route('tnc.update', $tnc->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PATCH')
    <div class="row">
        <div class="col-lg-6">
            <div class="row mb-4">
                <label for="one" class="col-sm-3 col-form-label">TNC Code</label>
                <div class="col-sm-9">
                    <input type="text" name="tnc_template_code" class="form-control" placeholder="Title"
                        value="{{ $tnc->tnc_template_code }}">
                </div>
            </div>
            <div class="row mb-4">
                <label for="one" class="col-sm-3 col-form-label">Upload Template
                    No</label>
                <div class="col-sm-9">
                    <input type="file" name="tnc_template_file_path" class="form-control">
                    <br>

                    <a href="{{ asset('storage') }}/{{ $tnc->tnc_template_file_path }}" target="_blank">
                        <i class="fas fa fa-eye"></i>
                    </a>
                </div>
            </div>
            <div class="row mb-4">
                <label for="status" class="col-sm-3 col-form-label">Status</label>
                <div class="col-sm-9">
                    <select name="tnc_template_status" class="form-control">
                        <option value="1" {{ $tnc->tnc_template_status == 1 ? 'selected' : '' }}>Active</option>
                        <option value="0" {{ $tnc->tnc_template_status == 0 ? 'selected' : '' }}>In-Active</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="col-lg-6">

            <div class="row mb-4">
                <label for="one" class="col-sm-3 col-form-label">Seq No</label>
                <div class="col-sm-9">
                    <input type="text" name="tnc_template_seqno" class="form-control" placeholder="Seq no"
                        value="{{ $tnc->tnc_template_seqno }}">
                </div>
            </div>

            <div class="row mb-4">
                <label for="one" class="col-sm-3 col-form-label">TNC
                    Description</label>
                <div class="col-sm-9">
                    <textarea name="tnc_template_desc" rows="2" class="form-control" placeholder="Description"> {{ $tnc->tnc_template_desc }} </textarea>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-lg-12">
            <a href="#" class="btn btn-sm btn-secondary">Cancel</a>
            <button type="submit" class="btn btn-sm btn-info">Submit</button>
        </div>
    </div>
</form>
