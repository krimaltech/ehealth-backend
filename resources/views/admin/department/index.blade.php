@extends('admin.master')
@section('header')
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Departments</span></h4>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{ route('home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <span class="breadcrumb-item active">Departments</span>
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
            <a href="{{ route('department.create') }}" type="button" class="btn btn-primary">
                Add Doctor Department
            </a>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-hover datatable-colvis-basic">
                <thead>
                    <tr>
                        <th>S.N.</th>
                        <th>Icon</th>
                        <th>Department</th>
                        <th>Department(Nepali)</th>
                        <th>Symptoms</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($department as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            @if ($item->image == null)
                                <td>Upload Image</td>
                            @else
                                <td><img src="{{ $item->image_path }}" height="100" width="120"
                                        alt="" class="rounded-circle" /></td>
                            @endif
                            <td>{{ $item->department }}</td>
                            <td>{{ $item->department_nepali }}</td>
                            <td>

                                <ul>
                                    @if ($item->symptoms != null)
                                        @if ($item->symptoms != 'null')
                                            @foreach ($item->symptoms as $abc)
                                                @foreach ($symptoms as $symptom_id)
                                                    @if ($symptom_id->id == $abc)
                                                        <li>{{ $symptom_id->name }}</li>
                                                    @endif
                                                @endforeach
                                            @endforeach
                                        @endif
                                    @endif

                                    {{-- @for ($i = 0; $i < count(json_decode($item->symptoms)); $i++)
                                        @foreach ($symptoms as $symptom_id)
                                            @php
                                                dd($item->symptoms[$i]);
                                            @endphp
                                            <li>{{ $item->symptoms[$i] }}</li>
                                            @if ($symptom_id->id == $item->symptoms[$i])
                                                <li>{{ $symptom_id->name }}</li>
                                            @endif
                                        @endforeach
                                    @endfor --}}
                                </ul>
                            </td>
                            <td>
                                <a href="{{ route('department.edit', $item->id) }}" class="btn btn-primary px-4"><i
                                        class="icon-pen mr-1"></i> Edit Department</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
