@extends('admin.master')
@section('header')
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Insurance Type</span></h4>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{route('home')}}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <span class="breadcrumb-item active">Insurance Type</span>
                </div>

                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>
    </div>
    <!-- /page header -->
@endsection

@section('content')
    <div class="card">
        <div class="card-header border-bottom">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#insurancetypeModalCenter">
                Add Insurance Type
            </button>
            <!-- Modal -->
            <div class="modal fade" id="insurancetypeModalCenter" tabindex="-1" role="dialog" aria-labelledby="insurancetypeModalCenterTitle" aria-hidden="true">
                <div class="modal modal-lg modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Add Insurance Type Details</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="{{route('insurancetype.store')}}" method="post">
                            @csrf
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="">Insurance Type</label>
                                    <input type="text" class="form-control" name="type" value="{{old('type')}}" required>
                                </div>
                                <div class="form-group d-flex align-items-center">
                                    <label for="" class="mb-0 mr-2">Death Related Insurance?</label>
                                    <input type="checkbox" name="is_death_insurance" @if(old('is_death_insurance')) checked @endif style="height:20px;width:20px">
                                </div>
                                <div class="form-group">
                                    <label for="description">Insurance Claim Description/Instruction<code>*</code></label>
                                    <textarea name="description" class="summernote" cols="30" rows="10" required>{{old('description')}}</textarea>
                                    @error('description')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="required_papers">Required Papers Description<code>*</code></label>
                                    <textarea name="required_papers" class="summernote" cols="30" rows="10" required>{{old('required_papers')}}</textarea>
                                    @error('required_papers')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>                      
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-hover datatable-colvis-basic">
                <thead>
                    <tr>
                        <th>S.N.</th>
                        <th>Insurance Type</th>
                        <th style="width: 500px">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($insuranceType as $item)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$item->type}}</td>
                            <td>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editinsuranceTypeModalCenter_{{$item->id}}">
                                    <i class="icon-pen"></i>
                                </button>
                                <!-- Modal -->
                                <div class="modal fade" id="editinsuranceTypeModalCenter_{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="editinsuranceTypeModalCenter_{{$item->id}}Title" aria-hidden="true">
                                    <div class="modal modal-lg modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">Edit Insurance Type</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="{{route('insurancetype.update',$item->id)}}" method="post">
                                                @csrf
                                                @method('PATCH')
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label for="">Insurance Type</label>
                                                        <input type="text" class="form-control" name="type" value="{{$item->type}}" required>
                                                    </div>
                                                    <div class="form-group d-flex align-items-center">
                                                        <label for="" class="mb-0 mr-2">Death Related Insurance?</label>
                                                        <input type="checkbox" name="is_death_insurance"  @if($item->is_death_insurance == 1) checked @endif style="height:20px;width:20px">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="description">Insurance Claim Description/Instruction<code>*</code></label>
                                                        <textarea name="description" class="summernote" cols="30" rows="10" required>{{$item->description}}</textarea>
                                                        @error('description')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="required_papers">Required Papers Description<code>*</code></label>
                                                        <textarea name="required_papers" class="summernote" cols="30" rows="10" required>{{$item->required_papers}}</textarea>
                                                        @error('required_papers')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                                </div>
                                            </form>                      
                                        </div>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteinsuranceTypeModalCenter_{{$item->id}}">
                                    <i class="icon-trash"></i>
                                </button>
                                <!-- Modal -->
                                <div class="modal fade" id="deleteinsuranceTypeModalCenter_{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="deleteinsuranceTypeModalCenter_{{$item->id}}Title" aria-hidden="true">
                                    <div class="modal-sm modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">Confirm Deletion ?</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="{{route('insurancetype.destroy',$item->id)}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <div class="modal-body">
                                                    <label for="">Are you sure you want to delete this insurance type?</label>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Confirm</button>
                                                </div>
                                            </form>                      
                                        </div>
                                    </div>
                                </div>
                                <a href="{{route('insurancetype.show',$item->id)}}" class="btn btn-primary">
                                    <i class="icon-eye2"></i>
                                </a>
                                @if(count($item->coverage) == 0)
                                    <a href="{{route('coverage.index',$item->id)}}" class="btn btn-primary">
                                        <i class="icon-plus-circle2 mr-1"></i>Add Package Insurance Coverage
                                    </a>
                                @else
                                    <a href="{{route('coverage.edit',$item->id)}}" class="btn btn-warning">
                                        <i class="icon-pen mr-1"></i>Edit Package Insurance Coverage
                                    </a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('custom-script')
<!-- Summernote -->
<script>
    $(function() {
        // Summernote
        $('.summernote').summernote()
    })
</script>
@endsection