@extends('admin.master')
@section('header')
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">View</span> - Vacancy</h4>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{route('home')}}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <a href="{{ route('vacancy.index') }}" class="breadcrumb-item">Vacancy</a>
                    <span class="breadcrumb-item active">View</span>
                </div>

                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>
    </div>
    <!-- /page header -->
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <h5 style="font-weight: 600">
                {{$vacancy->job_title}}            
                <span class="badge badge-pill badge-info">
                    Views : {{$vacancy->visits->count()}}
                </span>
            </h5>
            <p class=" mb-0"><b>Job Type:</b> {{$vacancy->job_type}} | <b>No. of Vacancies:</b>  {{$vacancy->no_of_vacancy}} | <b>Experience:</b> {{$vacancy->experience}}</p>
            <p class="mb-0" ><b>Salary:</b> {{$vacancy->salary}} @if($vacancy->salary_range != null)| <b>Salary Range:</b>  {{$vacancy->salary_range}} @endif | <b>Education Level:</b>  {{$vacancy->education_level}} </p>
            <p class="mb-0" ><b>Job Deadline:</b> {{$vacancy->job_deadline}} | <b>Job Location:</b>  {{$vacancy->job_location}} </p>
            <p class="" ><b>Status: </b>
                @if ($vacancy->status ==  1)
                    <span class="badge badge-pill badge-success">Active</span>
                @else
                    <span class="badge badge-pill badge-danger">Inactive</span>
                @endif      
            </p>
            <hr>
            <p class="mt-3"><b>Google Form Link:</b> <a href="{{$vacancy->form_link}}" target="_blank">{{$vacancy->form_link}}</a></p>
            <hr>
            <p class="mt-3"><b>SEO</b></p>
            <p class=" mb-0"><b>Keyword:</b> {{$vacancy->seo_keyword}}</p>
            <p class=" mb-0"><b>Description:</b> {{$vacancy->seo_description}}</p>
            <hr>
            <div class="my-4 bg-light card-body">
                <h5 style="font-weight:600">Job Skills</h5>
                @foreach ($vacancy->vacancyskill as $item)
                    <span class="badge badge-info">{{$item->skill->skill}}</span>
                @endforeach
            </div>

            @if ($vacancy->job_description)
            <div class="my-4 bg-light card-body">
                <h5 style="font-weight:600">Job Description</h5>
                <p>{!!$vacancy->job_description!!}</p>
            </div>
            @endif
            @if ($vacancy->job_responsibility)
            <div class="my-4 bg-light card-body">
                <h5 style="font-weight:600">Job Responsibilities</h5>
                <p>{!!$vacancy->job_responsibility!!}</p>
            </div>
            @endif
            @if ($vacancy->job_requirements)
            <div class="mt-4 bg-light card-body">
                <h5 style="font-weight:600">Job Requirements </h5>
                <p>{!!$vacancy->job_requirements!!}</p>
            </div>
            @endif
        </div>
    </div>
@endsection