@extends('layouts.app')
@section('content')
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title">Gear</h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a>
                                </li>
                                <li class="breadcrumb-item active">Gear management
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
                <div class="content-header-right col-md-6 col-12">
                    <div class="btn-group float-md-right" role="group" aria-label="Button group with nested dropdown">
                        <button class="btn btn-info round  box-shadow-2 px-2 mb-1" id="addGear" data-toggle="modal" data-target="#gear_info" ><i class="ft-plus icon-left"></i> Add Gear</button>
                    </div>
                </div>

            </div>
            <div class="content-body">
                <section id="file-export">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Gear Manager  </h4>
                                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                            <li><a data-action="close"><i class="ft-x"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body card-dashboard dataTables_wrapper dt-bootstrap">
                                        <table class="table table-striped table-bordered file-export responsive dataex-res-configuration">
                                            <thead>
                                                <tr>
                                                    <th>Image</th>
                                                    <th>Name</th>
                                                    <th>Brand</th>
                                                    <th>Category</th>
                                                    <th>Sport</th>
                                                    <th>Quantity</th>
                                                    <th width="280px">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($gears as $gear)

                                                    <tr>
                                                        <td>image</td>
                                                        <td>{{ $gear->name }}</td>
                                                        <td>{{ $gear->brand }}</td>
                                                        <td>{{ $categories[$gear->category] }}</td>
                                                        <td>{{ $sports[$gear->sport] }}</td>
                                                        <td>{{ $gear->quantity }}</td>
                                                        <td>
                                                            <a class="btn btn-info" href="{{ route('gear.show',$gear->slug) }}">Show</a>
                                                            @can('gear-edit')
                                                                <a class="btn btn-primary" href="{{ route('gear.edit',$gear->id) }}">Edit</a>
                                                            @endcan
                                                            @can('gear-delete')
                                                            <form class="form" method="POST" action="{{ route('gear.destroy', $gear->id)}}" style="display: inline">
                                                                @method('delete')
                                                                @csrf
                                                                    <button type="submit" class="btn btn-danger" >Delete</button>
                                                            </form>
                                                            @endcan
                                                        </td>
                                                    </tr>

                                                @endforeach

                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>Image</th>
                                                    <th>Name</th>
                                                    <th>Brand</th>
                                                    <th>Category</th>
                                                    <th>Sport</th>
                                                    <th>Quantity</th>
                                                    <th width="280px">Action</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

            </div>
        </div>
    </div>

    <div class="modal fade text-left" id="gear_info" data-backdrop="false" tabindex="-1" role="dialog" aria-labelledby="myModalLabel11" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info white">
                    <h4 class="modal-title white" id="myModalLabel11">Add Gear</h4>
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
                                    <input type="file" id="image" class="form-control" name="image">
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

    <script src="/app-assets/js/core/libraries/jquery.min.js"></script>

    <script>

        /* ===================== Add Location Toggle ============================ */
        $(document).on("click", "#addGear", function (e) {
           e.preventDefault();

           $('#submit_btn').text("Save");
           $('#myModalLabel11').text("Add Gear");

           $('#add_location_method').val('POST');


           $('#id').val('');
           $('#name').val('');
           $('#city').val('');
           $('#town').val('');
           $('#description').val('');



           $('#gear_info').modal('show');
       });

        /* ===================== Edit Truck Toggle ============================ */
        $(document).on("click", "#editGear", function (e) {
           e.preventDefault();

           $('#submit_btn').text("Update");
           $('#myModalLabel11').text("Edit Gear");


          let id = $(this).attr('data-id'),
               name = $(this).attr('data-name'),
               city = $(this).attr('data-city'),
               town = $(this).attr('data-town'),
               description = $(this).attr('data-description');


           $('#add_location_method').val('PUT');


           $('#id').val(id);
           $('#name').val(name);
           $('#city').val(city);
           $('#town').val(town);
           $('#description').val(description);


           $('#gear_info').modal('show');
       });
   </script>


@endsection
