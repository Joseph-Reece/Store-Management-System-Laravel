
    <div class="modal fade text-left" id="gear_edit" data-backdrop="false" tabindex="-1" role="dialog" aria-labelledby="myModalLabel11" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info white">
                    <h4 class="modal-title white" id="myModalLabel11">Edit Gear</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form" method="POST" action="{{ route('gear.store') }}">
                        <input type="hidden" id="add_location_method" name="_method" value="POST">
                        @csrf
                        <div class="form-body">
                            <div class="col-md-6">

                                <div class="form-group">
                                    <label for="name">Gear Image</label>
                                    {{-- <input type="file" id="image" class="form-control" name="image"> --}}
                                        <div class="dropzone dropzone-area" id="dpz-single-file"></div>
                                </div>
                            </div>
                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" id="name" class="form-control round" name="name">
                                    </div>

                                    <div class="form-group">
                                        <label for="quantity">Quantity</label>
                                        <input type="number" id="quantity" class="form-control round" name="quantity">
                                    </div>

                                    <div class="form-group">
                                        <label for="sport">Sport Name</label>
                                        <select
                                            class="select2 form-control block"
                                            id="sport"
                                            name="sport" required>
                                            <option disabled selected>Choose one
                                            </option>
                                            <optgroup label="Sports List">
                                                @foreach ($sports as $key => $sport)
                                                <option value={{$key}}> {{$sport }} </option>
                                                @endforeach
                                            </optgroup>
                                        </select>
                                    </div>

                                </div>

                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label for="brand">Brand</label>
                                        <input type="text" id="brand" class="form-control round" name="brand">
                                    </div>

                                    <div class="form-group">
                                        <label for="price">Price</label>
                                        <input type="number" id="price" class="form-control round" name="price">
                                    </div>
                                    <div class="form-group">
                                        <label for="category">Category</label>
                                        <select
                                            class="select2 form-control block"
                                            id="category"
                                            name="category" required>
                                            <option disabled selected>Choose one
                                            </option>
                                            <optgroup label="Categories">
                                                @foreach ($categories as $key => $category)
                                                <option value={{$key}}> {{$category }} </option>
                                                @endforeach
                                            </optgroup>
                                        </select>
                                    </div>


                                </div>
                            </div>

                            <div class="form-actions">
                                <input type="hidden" name="id" id="id">
                                <button type="button" class="btn btn-warning mr-1" data-dismiss="modal">
                                    <i class="ft-x"></i> Cancel
                                </button>
                                <button type="submit" id="submit_btn" class="btn btn-primary">
                                    <i class="la la-check-square-o"></i> Save
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
