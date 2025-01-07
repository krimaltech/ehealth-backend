@extends('admin.master')
@section('header')
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Job Skills</span></h4>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{ route('home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <span class="breadcrumb-item active">Job Skills</span>
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
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#jobSkillModalCenter">
                Add Job Skill
            </button>
            <!-- Modal -->
            <div class="modal fade" id="jobSkillModalCenter" tabindex="-1" role="dialog" aria-labelledby="jobSkillModalCenterTitle" aria-hidden="true">
                <div class="modal-sm modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Add Job Skill</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="{{route('skills.store')}}" method="post">
                            @csrf
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="">Job Skill</label>
                                    <input type="text" class="form-control" name="skill" required>
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
                        <th>Job Skills</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($skills as $item)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$item->skill}}</td>
                            <td>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editJobSkillModalCenter_{{$item->id}}">
                                    <i class="icon-pen"></i>
                                </button>
                                <!-- Modal -->
                                <div class="modal fade" id="editJobSkillModalCenter_{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="editJobSkillModalCenter_{{$item->id}}Title" aria-hidden="true">
                                    <div class="modal-sm modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">Edit Job Skill</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="{{route('skills.update',$item->id)}}" method="post">
                                                @csrf
                                                @method('PATCH')
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label for="">Job Skill</label>
                                                        <input type="text" class="form-control" name="skill" value="{{$item->skill}}" required>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Update changes</button>
                                                </div>
                                            </form>                      
                                        </div>
                                    </div>
                                </div>

                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteJobSkillModalCenter_{{$item->id}}">
                                    <i class="icon-trash"></i>
                                </button>
                                <!-- Modal -->
                                <div class="modal fade" id="deleteJobSkillModalCenter_{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="deleteJobSkillModalCenter_{{$item->id}}Title" aria-hidden="true">
                                    <div class="modal-sm modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">Confirm Deletion ?</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="{{route('skills.destroy',$item->id)}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <div class="modal-body">
                                                    <label for="">Are you sure you want to delete this job skill?</label>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Confirm</button>
                                                </div>
                                            </form>                      
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection