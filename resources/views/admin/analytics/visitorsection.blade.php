<div class="card-body visitor-section border-top">
    <ul class="nav nav-tabs top-tab mt-3" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="overview-tab" data-toggle="tab" href="#overview" role="tab"
                aria-controls="overview" aria-selected="true"><i class="icon-spinner3 mr-1"></i>Overview</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="vacancy-tab" data-toggle="tab" href="#vacancy" role="tab" aria-controls="vacancy"
                aria-selected="false"><i class="icon-menu3 mr-1"></i>Vacancy</a>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <!--visitor section-->
        <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview-tab">
            @include('admin.analytics.web.visitor.visitorchart')
        </div>
        <!--vacancy section-->
        <div class="tab-pane fade" id="vacancy" role="tabpanel" aria-labelledby="vacancy-tab">
            <div class="row">
                <div class="col-md-3">
                    <div class="nav flex-column nav-pills h-100 bg-white" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        @foreach ($vacancies->take(1) as $item)
                            <a class="nav-link active" id="v-pills-{{$item->id}}-tab" data-toggle="pill" href="#v-pills-{{$item->id}}"
                                role="tab" aria-controls="v-pills-{{$item->id}}"
                                aria-selected="true">{{ $item->job_title }} <span class="badge badge-light ml-2">{{$item->views}}</span></a>
                        @endforeach
                        @foreach ($vacancies->skip(1) as $item)
                            <a class="nav-link" id="v-pills-{{$item->id}}-tab" data-toggle="pill" href="#v-pills-{{$item->id}}"
                                role="tab" aria-controls="v-pills-{{$item->id}}" aria-selected="false">{{ $item->job_title }} <span class="badge badge-light ml-2">{{$item->views}}</span></a>
                        @endforeach
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="tab-content card h-100" id="v-pills-tabContent">
                        @foreach ($vacancies->take(1) as $item)
                            <div class="tab-pane fade show active" id="v-pills-{{$item->id}}" role="tabpanel"
                                aria-labelledby="v-pills-{{$item->id}}-tab">
                                <div class="card-body">
                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="daily-{{$item->id}}-tab" data-toggle="tab" href="#daily-{{$item->id}}" role="tab"
                                                aria-controls="daily-{{$item->id}}" aria-selected="true">Today</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="weekly-{{$item->id}}-tab" data-toggle="tab" href="#weekly-{{$item->id}}" role="tab"
                                                aria-controls="weekly-{{$item->id}}" aria-selected="false">This Week</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="monthly-{{$item->id}}-tab" data-toggle="tab" href="#monthly-{{$item->id}}" role="tab"
                                                aria-controls="monthly-{{$item->id}}" aria-selected="false">This Month</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="yearly-{{$item->id}}-tab" data-toggle="tab" href="#yearly-{{$item->id}}" role="tab"
                                                aria-controls="yearly-{{$item->id}}" aria-selected="false">This Year</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="all-{{$item->id}}-tab" data-toggle="tab" href="#all-{{$item->id}}" role="tab"
                                                aria-controls="all-{{$item->id}}" aria-selected="false">All</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content" id="myTabContent">
                                        <div class="tab-pane fade show active" id="daily-{{$item->id}}" role="tabpanel" aria-labelledby="daily-{{$item->id}}-tab">
                                            <div class="row">
                                                <div class="col-md-4 mb-3">
                                                    <div class="text-center py-3 border bg-white" style="border-color:#3366CC !important;border-radius:20px">
                                                        <h6 class="mb-0" style="color:#3366CC"><i class="icon-users mr-1"></i>Overall Visits</h6>
                                                        <p class="numbers">{{  $item->daily_visits->sum('total') }}</p>
                                                        @if($item->dailyTotalPecent > 0)
                                                            <p class="text-success">+ {{$item->dailyTotalPecent}}%</p>
                                                        @elseif($item->dailyTotalPecent < 0)
                                                            <p class="text-danger">{{$item->dailyTotalPecent}}%</p>
                                                        @else
                                                            <p class="text-secondary">{{$item->dailyTotalPecent}}%</p>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mb-3">
                                                    <div class="text-center py-3 border bg-white" style="border-color:#DC3912 !important;border-radius:20px">
                                                        <h6 class="mb-0" style="color:#DC3912"><i class="icon-users mr-1"></i>New Visitors</h6>
                                                        <p class="numbers">{{ $item->daily_visits->sum('new') }}</p>
                                                        @if($item->dailyNewPecent > 0)
                                                            <p class="text-success">+ {{$item->dailyNewPecent}}%</p>
                                                        @elseif($item->dailyNewPecent < 0)
                                                            <p class="text-danger">{{$item->dailyNewPecent}}%</p>
                                                        @else
                                                            <p class="text-secondary">{{$item->dailyNewPecent}}%</p>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mb-3">
                                                    <div class="text-center py-3 border bg-white" style="border-color:#FF9900 !important;border-radius:20px">
                                                        <h6 class="mb-0" style="color:#FF9900"><i class="icon-users mr-1"></i>Returning Visitors</h6>
                                                        <p class="numbers">{{  $item->daily_visits->sum('return') }}</p>
                                                        @if($item->dailyReturnPecent > 0)
                                                            <p class="text-success">+ {{$item->dailyReturnPecent}}%</p>
                                                        @elseif($item->dailyReturnPecent < 0)
                                                            <p class="text-danger">{{$item->dailyReturnPecent}}%</p>
                                                        @else
                                                            <p class="text-secondary">{{$item->dailyReturnPecent}}%</p>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- @include('admin.analytics.web.vacancy.dailychart',['id' => $item["id"],'chartId' => 'chart'.$item["id"], 'chartTitle' => $item["job_title"], 'chartData' => $item["daily_visits"]]) --}}
                                        </div>
                                        <div class="tab-pane fade" id="weekly-{{$item->id}}" role="tabpanel" aria-labelledby="weekly-{{$item->id}}-tab">
                                            <div class="row">
                                                <div class="col-md-4 mb-3">
                                                    <div class="text-center py-3 border bg-white" style="border-color:#3366CC !important;border-radius:20px">
                                                        <h6 class="mb-0" style="color:#3366CC"><i class="icon-users mr-1"></i>Overall Visits</h6>
                                                        <p class="numbers">{{  $item->weekly_visits->sum('total') }}</p>
                                                        @if($item->weeklyTotalPecent > 0)
                                                            <p class="text-success">+ {{$item->weeklyTotalPecent}}%</p>
                                                        @elseif($item->weeklyTotalPecent < 0)
                                                            <p class="text-danger">{{$item->weeklyTotalPecent}}%</p>
                                                        @else
                                                            <p class="text-secondary">{{$item->weeklyTotalPecent}}%</p>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mb-3">
                                                    <div class="text-center py-3 border bg-white" style="border-color:#DC3912 !important;border-radius:20px">
                                                        <h6 class="mb-0" style="color:#DC3912"><i class="icon-users mr-1"></i>New Visitors</h6>
                                                        <p class="numbers">{{ $item->weekly_visits->sum('new') }}</p>
                                                        @if($item->weeklyNewPecent > 0)
                                                            <p class="text-success">+ {{$item->weeklyNewPecent}}%</p>
                                                        @elseif($item->weeklyNewPecent < 0)
                                                            <p class="text-danger">{{$item->weeklyNewPecent}}%</p>
                                                        @else
                                                            <p class="text-secondary">{{$item->weeklyNewPecent}}%</p>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mb-3">
                                                    <div class="text-center py-3 border bg-white" style="border-color:#FF9900 !important;border-radius:20px">
                                                        <h6 class="mb-0" style="color:#FF9900"><i class="icon-users mr-1"></i>Returning Visitors</h6>
                                                        <p class="numbers">{{  $item->weekly_visits->sum('return') }}</p>
                                                        @if($item->weeklyReturnPecent > 0)
                                                            <p class="text-success">+ {{$item->weeklyReturnPecent}}%</p>
                                                        @elseif($item->weeklyReturnPecent < 0)
                                                            <p class="text-danger">{{$item->weeklyReturnPecent}}%</p>
                                                        @else
                                                            <p class="text-secondary">{{$item->weeklyReturnPecent}}%</p>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            @include('admin.analytics.web.vacancy.weeklychart',['id' => $item["id"],'chartId' => 'chart'.$item["id"], 'chartTitle' => $item["job_title"], 'chartData' => $item["weekly_visits"]])
                                        </div>
                                        <div class="tab-pane fade" id="monthly-{{$item->id}}" role="tabpanel" aria-labelledby="monthly-{{$item->id}}-tab">
                                            <div class="row">
                                                <div class="col-md-4 mb-3">
                                                    <div class="text-center py-3 border bg-white" style="border-color:#3366CC !important;border-radius:20px">
                                                        <h6 class="mb-0" style="color:#3366CC"><i class="icon-users mr-1"></i>Overall Visits</h6>
                                                        <p class="numbers">{{  $item->monthly_visits->sum('total') }}</p>
                                                        @if($item->monthlyTotalPecent > 0)
                                                            <p class="text-success">+ {{$item->monthlyTotalPecent}}%</p>
                                                        @elseif($item->monthlyTotalPecent < 0)
                                                            <p class="text-danger">{{$item->monthlyTotalPecent}}%</p>
                                                        @else
                                                            <p class="text-secondary">{{$item->monthlyTotalPecent}}%</p>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mb-3">
                                                    <div class="text-center py-3 border bg-white" style="border-color:#DC3912 !important;border-radius:20px">
                                                        <h6 class="mb-0" style="color:#DC3912"><i class="icon-users mr-1"></i>New Visitors</h6>
                                                        <p class="numbers">{{ $item->monthly_visits->sum('new') }}</p>
                                                        @if($item->monthlyNewPecent > 0)
                                                            <p class="text-success">+ {{$item->monthlyNewPecent}}%</p>
                                                        @elseif($item->monthlyNewPecent < 0)
                                                            <p class="text-danger">{{$item->monthlyNewPecent}}%</p>
                                                        @else
                                                            <p class="text-secondary">{{$item->monthlyNewPecent}}%</p>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mb-3">
                                                    <div class="text-center py-3 border bg-white" style="border-color:#FF9900 !important;border-radius:20px">
                                                        <h6 class="mb-0" style="color:#FF9900"><i class="icon-users mr-1"></i>Returning Visitors</h6>
                                                        <p class="numbers">{{  $item->monthly_visits->sum('return') }}</p>
                                                        @if($item->monthlyReturnPecent > 0)
                                                            <p class="text-success">+ {{$item->monthlyReturnPecent}}%</p>
                                                        @elseif($item->monthlyReturnPecent < 0)
                                                            <p class="text-danger">{{$item->monthlyReturnPecent}}%</p>
                                                        @else
                                                            <p class="text-secondary">{{$item->monthlyReturnPecent}}%</p>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            @include('admin.analytics.web.vacancy.monthlychart',['id' => $item["id"],'chartId' => 'chart'.$item["id"], 'chartTitle' => $item["job_title"], 'chartData' => $item["monthly_visits"]])
                                        </div>
                                        <div class="tab-pane fade" id="yearly-{{$item->id}}" role="tabpanel" aria-labelledby="yearly-{{$item->id}}-tab">
                                            <div class="row">
                                                <div class="col-md-4 mb-3">
                                                    <div class="text-center py-3 border bg-white" style="border-color:#3366CC !important;border-radius:20px">
                                                        <h6 class="mb-0" style="color:#3366CC"><i class="icon-users mr-1"></i>Overall Visits</h6>
                                                        <p class="numbers">{{  $item->yearly_visits->sum('total') }}</p>
                                                        @if($item->yearlyTotalPecent > 0)
                                                            <p class="text-success">+ {{$item->yearlyTotalPecent}}%</p>
                                                        @elseif($item->yearlyTotalPecent < 0)
                                                            <p class="text-danger">{{$item->yearlyTotalPecent}}%</p>
                                                        @else
                                                            <p class="text-secondary">{{$item->yearlyTotalPecent}}%</p>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mb-3">
                                                    <div class="text-center py-3 border bg-white" style="border-color:#DC3912 !important;border-radius:20px">
                                                        <h6 class="mb-0" style="color:#DC3912"><i class="icon-users mr-1"></i>New Visitors</h6>
                                                        <p class="numbers">{{ $item->yearly_visits->sum('new') }}</p>
                                                        @if($item->yearlyNewPecent > 0)
                                                            <p class="text-success">+ {{$item->yearlyNewPecent}}%</p>
                                                        @elseif($item->yearlyNewPecent < 0)
                                                            <p class="text-danger">{{$item->yearlyNewPecent}}%</p>
                                                        @else
                                                            <p class="text-secondary">{{$item->yearlyNewPecent}}%</p>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mb-3">
                                                    <div class="text-center py-3 border bg-white" style="border-color:#FF9900 !important;border-radius:20px">
                                                        <h6 class="mb-0" style="color:#FF9900"><i class="icon-users mr-1"></i>Returning Visitors</h6>
                                                        <p class="numbers">{{  $item->yearly_visits->sum('return') }}</p>
                                                        @if($item->yearlyReturnPecent > 0)
                                                            <p class="text-success">+ {{$item->yearlyReturnPecent}}%</p>
                                                        @elseif($item->yearlyReturnPecent < 0)
                                                            <p class="text-danger">{{$item->yearlyReturnPecent}}%</p>
                                                        @else
                                                            <p class="text-secondary">{{$item->yearlyReturnPecent}}%</p>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            @include('admin.analytics.web.vacancy.yearlychart',['id' => $item["id"],'chartId' => 'chart'.$item["id"], 'chartTitle' => $item["job_title"], 'chartData' => $item["yearly_visits"]])
                                        </div>
                                        <div class="tab-pane fade" id="all-{{$item->id}}" role="tabpanel" aria-labelledby="all-{{$item->id}}-tab">
                                            <div class="row">
                                                <div class="col-md-4 mb-3">
                                                    <div class="text-center py-3 border bg-white" style="border-color:#3366CC !important;border-radius:20px">
                                                        <h6 class="mb-0" style="color:#3366CC"><i class="icon-users mr-1"></i>Overall Visits</h6>
                                                        <p class="numbers">{{  $item->all_visits->sum('total') }}</p>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mb-3">
                                                    <div class="text-center py-3 border bg-white" style="border-color:#DC3912 !important;border-radius:20px">
                                                        <h6 class="mb-0" style="color:#DC3912"><i class="icon-users mr-1"></i>New Visitors</h6>
                                                        <p class="numbers">{{ $item->all_visits->sum('new') }}</p>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mb-3">
                                                    <div class="text-center py-3 border bg-white" style="border-color:#FF9900 !important;border-radius:20px">
                                                        <h6 class="mb-0" style="color:#FF9900"><i class="icon-users mr-1"></i>Returning Visitors</h6>
                                                        <p class="numbers">{{  $item->all_visits->sum('return') }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                            @include('admin.analytics.web.vacancy.allchart',['id' => $item["id"],'chartId' => 'chart'.$item["id"], 'chartTitle' => $item["job_title"], 'chartData' => $item["all_visits"]])
                                        </div>
                                    </div>   
                                </div>                                    
                            </div>
                        @endforeach
                        @foreach ($vacancies->skip(1) as $item)
                            <div class="tab-pane fade" id="v-pills-{{$item->id}}" role="tabpanel"
                            aria-labelledby="v-pills-{{$item->id}}-tab">
                                <div class="card-body">
                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="daily-{{$item->id}}-tab" data-toggle="tab" href="#daily-{{$item->id}}" role="tab"
                                                aria-controls="daily-{{$item->id}}" aria-selected="true">Today</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="weekly-{{$item->id}}-tab" data-toggle="tab" href="#weekly-{{$item->id}}" role="tab"
                                                aria-controls="weekly-{{$item->id}}" aria-selected="false">This Week</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="monthly-{{$item->id}}-tab" data-toggle="tab" href="#monthly-{{$item->id}}" role="tab"
                                                aria-controls="monthly-{{$item->id}}" aria-selected="false">This Month</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="yearly-{{$item->id}}-tab" data-toggle="tab" href="#yearly-{{$item->id}}" role="tab"
                                                aria-controls="yearly-{{$item->id}}" aria-selected="false">This Year</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="all-{{$item->id}}-tab" data-toggle="tab" href="#all-{{$item->id}}" role="tab"
                                                aria-controls="all-{{$item->id}}" aria-selected="false">All</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content" id="myTabContent">
                                        <div class="tab-pane fade show active" id="daily-{{$item->id}}" role="tabpanel" aria-labelledby="daily-{{$item->id}}-tab">
                                            <div class="row">
                                                <div class="col-md-4 mb-3">
                                                    <div class="text-center py-3 border bg-white" style="border-color:#3366CC !important;border-radius:20px">
                                                        <h6 class="mb-0" style="color:#3366CC"><i class="icon-users mr-1"></i>Overall Visits</h6>
                                                        <p class="numbers">{{  $item->daily_visits->sum('total') }}</p>
                                                        @if($item->dailyTotalPecent > 0)
                                                            <p class="text-success">+ {{$item->dailyTotalPecent}}%</p>
                                                        @elseif($item->dailyTotalPecent < 0)
                                                            <p class="text-danger">{{$item->dailyTotalPecent}}%</p>
                                                        @else
                                                            <p class="text-secondary">{{$item->dailyTotalPecent}}%</p>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mb-3">
                                                    <div class="text-center py-3 border bg-white" style="border-color:#DC3912 !important;border-radius:20px">
                                                        <h6 class="mb-0" style="color:#DC3912"><i class="icon-users mr-1"></i>New Visitors</h6>
                                                        <p class="numbers">{{ $item->daily_visits->sum('new') }}</p>
                                                        @if($item->dailyNewPecent > 0)
                                                            <p class="text-success">+ {{$item->dailyNewPecent}}%</p>
                                                        @elseif($item->dailyNewPecent < 0)
                                                            <p class="text-danger">{{$item->dailyNewPecent}}%</p>
                                                        @else
                                                            <p class="text-secondary">{{$item->dailyNewPecent}}%</p>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mb-3">
                                                    <div class="text-center py-3 border bg-white" style="border-color:#FF9900 !important;border-radius:20px">
                                                        <h6 class="mb-0" style="color:#FF9900"><i class="icon-users mr-1"></i>Returning Visitors</h6>
                                                        <p class="numbers">{{  $item->daily_visits->sum('return') }}</p>
                                                        @if($item->dailyReturnPecent > 0)
                                                            <p class="text-success">+ {{$item->dailyReturnPecent}}%</p>
                                                        @elseif($item->dailyReturnPecent < 0)
                                                            <p class="text-danger">{{$item->dailyReturnPecent}}%</p>
                                                        @else
                                                            <p class="text-secondary">{{$item->dailyReturnPecent}}%</p>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- @include('admin.analytics.web.vacancy.dailychart',['id' => $item["id"],'chartId' => 'chart'.$item["id"], 'chartTitle' => $item["job_title"], 'chartData' => $item["daily_visits"]]) --}}
                                        </div>
                                        <div class="tab-pane fade" id="weekly-{{$item->id}}" role="tabpanel" aria-labelledby="weekly-{{$item->id}}-tab">
                                            <div class="row">
                                                <div class="col-md-4 mb-3">
                                                    <div class="text-center py-3 border bg-white" style="border-color:#3366CC !important;border-radius:20px">
                                                        <h6 class="mb-0" style="color:#3366CC"><i class="icon-users mr-1"></i>Overall Visits</h6>
                                                        <p class="numbers">{{  $item->weekly_visits->sum('total') }}</p>
                                                        @if($item->weeklyTotalPecent > 0)
                                                            <p class="text-success">+ {{$item->weeklyTotalPecent}}%</p>
                                                        @elseif($item->weeklyTotalPecent < 0)
                                                            <p class="text-danger">{{$item->weeklyTotalPecent}}%</p>
                                                        @else
                                                            <p class="text-secondary">{{$item->weeklyTotalPecent}}%</p>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mb-3">
                                                    <div class="text-center py-3 border bg-white" style="border-color:#DC3912 !important;border-radius:20px">
                                                        <h6 class="mb-0" style="color:#DC3912"><i class="icon-users mr-1"></i>New Visitors</h6>
                                                        <p class="numbers">{{ $item->weekly_visits->sum('new') }}</p>
                                                        @if($item->weeklyNewPecent > 0)
                                                            <p class="text-success">+ {{$item->weeklyNewPecent}}%</p>
                                                        @elseif($item->weeklyNewPecent < 0)
                                                            <p class="text-danger">{{$item->weeklyNewPecent}}%</p>
                                                        @else
                                                            <p class="text-secondary">{{$item->weeklyNewPecent}}%</p>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mb-3">
                                                    <div class="text-center py-3 border bg-white" style="border-color:#FF9900 !important;border-radius:20px">
                                                        <h6 class="mb-0" style="color:#FF9900"><i class="icon-users mr-1"></i>Returning Visitors</h6>
                                                        <p class="numbers">{{  $item->weekly_visits->sum('return') }}</p>
                                                        @if($item->weeklyReturnPecent > 0)
                                                            <p class="text-success">+ {{$item->weeklyReturnPecent}}%</p>
                                                        @elseif($item->weeklyReturnPecent < 0)
                                                            <p class="text-danger">{{$item->weeklyReturnPecent}}%</p>
                                                        @else
                                                            <p class="text-secondary">{{$item->weeklyReturnPecent}}%</p>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            @include('admin.analytics.web.vacancy.weeklychart',['id' => $item["id"],'chartId' => 'chart'.$item["id"], 'chartTitle' => $item["job_title"], 'chartData' => $item["weekly_visits"]])
                                        </div>
                                        <div class="tab-pane fade" id="monthly-{{$item->id}}" role="tabpanel" aria-labelledby="monthly-{{$item->id}}-tab">
                                            <div class="row">
                                                <div class="col-md-4 mb-3">
                                                    <div class="text-center py-3 border bg-white" style="border-color:#3366CC !important;border-radius:20px">
                                                        <h6 class="mb-0" style="color:#3366CC"><i class="icon-users mr-1"></i>Overall Visits</h6>
                                                        <p class="numbers">{{  $item->monthly_visits->sum('total') }}</p>
                                                        @if($item->monthlyTotalPecent > 0)
                                                            <p class="text-success">+ {{$item->monthlyTotalPecent}}%</p>
                                                        @elseif($item->monthlyTotalPecent < 0)
                                                            <p class="text-danger">{{$item->monthlyTotalPecent}}%</p>
                                                        @else
                                                            <p class="text-secondary">{{$item->monthlyTotalPecent}}%</p>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mb-3">
                                                    <div class="text-center py-3 border bg-white" style="border-color:#DC3912 !important;border-radius:20px">
                                                        <h6 class="mb-0" style="color:#DC3912"><i class="icon-users mr-1"></i>New Visitors</h6>
                                                        <p class="numbers">{{ $item->monthly_visits->sum('new') }}</p>
                                                        @if($item->monthlyNewPecent > 0)
                                                            <p class="text-success">+ {{$item->monthlyNewPecent}}%</p>
                                                        @elseif($item->monthlyNewPecent < 0)
                                                            <p class="text-danger">{{$item->monthlyNewPecent}}%</p>
                                                        @else
                                                            <p class="text-secondary">{{$item->monthlyNewPecent}}%</p>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mb-3">
                                                    <div class="text-center py-3 border bg-white" style="border-color:#FF9900 !important;border-radius:20px">
                                                        <h6 class="mb-0" style="color:#FF9900"><i class="icon-users mr-1"></i>Returning Visitors</h6>
                                                        <p class="numbers">{{  $item->monthly_visits->sum('return') }}</p>
                                                        @if($item->monthlyReturnPecent > 0)
                                                            <p class="text-success">+ {{$item->monthlyReturnPecent}}%</p>
                                                        @elseif($item->monthlyReturnPecent < 0)
                                                            <p class="text-danger">{{$item->monthlyReturnPecent}}%</p>
                                                        @else
                                                            <p class="text-secondary">{{$item->monthlyReturnPecent}}%</p>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            @include('admin.analytics.web.vacancy.monthlychart',['id' => $item["id"],'chartId' => 'chart'.$item["id"], 'chartTitle' => $item["job_title"], 'chartData' => $item["monthly_visits"]])
                                        </div>
                                        <div class="tab-pane fade" id="yearly-{{$item->id}}" role="tabpanel" aria-labelledby="yearly-{{$item->id}}-tab">
                                            <div class="row">
                                                <div class="col-md-4 mb-3">
                                                    <div class="text-center py-3 border bg-white" style="border-color:#3366CC !important;border-radius:20px">
                                                        <h6 class="mb-0" style="color:#3366CC"><i class="icon-users mr-1"></i>Overall Visits</h6>
                                                        <p class="numbers">{{  $item->yearly_visits->sum('total') }}</p>
                                                        @if($item->yearlyTotalPecent > 0)
                                                            <p class="text-success">+ {{$item->yearlyTotalPecent}}%</p>
                                                        @elseif($item->yearlyTotalPecent < 0)
                                                            <p class="text-danger">{{$item->yearlyTotalPecent}}%</p>
                                                        @else
                                                            <p class="text-secondary">{{$item->yearlyTotalPecent}}%</p>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mb-3">
                                                    <div class="text-center py-3 border bg-white" style="border-color:#DC3912 !important;border-radius:20px">
                                                        <h6 class="mb-0" style="color:#DC3912"><i class="icon-users mr-1"></i>New Visitors</h6>
                                                        <p class="numbers">{{ $item->yearly_visits->sum('new') }}</p>
                                                        @if($item->yearlyNewPecent > 0)
                                                            <p class="text-success">+ {{$item->yearlyNewPecent}}%</p>
                                                        @elseif($item->yearlyNewPecent < 0)
                                                            <p class="text-danger">{{$item->yearlyNewPecent}}%</p>
                                                        @else
                                                            <p class="text-secondary">{{$item->yearlyNewPecent}}%</p>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mb-3">
                                                    <div class="text-center py-3 border bg-white" style="border-color:#FF9900 !important;border-radius:20px">
                                                        <h6 class="mb-0" style="color:#FF9900"><i class="icon-users mr-1"></i>Returning Visitors</h6>
                                                        <p class="numbers">{{  $item->yearly_visits->sum('return') }}</p>
                                                        @if($item->yearlyReturnPecent > 0)
                                                            <p class="text-success">+ {{$item->yearlyReturnPecent}}%</p>
                                                        @elseif($item->yearlyReturnPecent < 0)
                                                            <p class="text-danger">{{$item->yearlyReturnPecent}}%</p>
                                                        @else
                                                            <p class="text-secondary">{{$item->yearlyReturnPecent}}%</p>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            @include('admin.analytics.web.vacancy.yearlychart',['id' => $item["id"],'chartId' => 'chart'.$item["id"], 'chartTitle' => $item["job_title"], 'chartData' => $item["yearly_visits"]])
                                        </div>
                                        <div class="tab-pane fade" id="all-{{$item->id}}" role="tabpanel" aria-labelledby="all-{{$item->id}}-tab">
                                            <div class="row">
                                                <div class="col-md-4 mb-3">
                                                    <div class="text-center py-3 border bg-white" style="border-color:#3366CC !important;border-radius:20px">
                                                        <h6 class="mb-0" style="color:#3366CC"><i class="icon-users mr-1"></i>Overall Visits</h6>
                                                        <p class="numbers">{{  $item->all_visits->sum('total') }}</p>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mb-3">
                                                    <div class="text-center py-3 border bg-white" style="border-color:#DC3912 !important;border-radius:20px">
                                                        <h6 class="mb-0" style="color:#DC3912"><i class="icon-users mr-1"></i>New Visitors</h6>
                                                        <p class="numbers">{{ $item->all_visits->sum('new') }}</p>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mb-3">
                                                    <div class="text-center py-3 border bg-white" style="border-color:#FF9900 !important;border-radius:20px">
                                                        <h6 class="mb-0" style="color:#FF9900"><i class="icon-users mr-1"></i>Returning Visitors</h6>
                                                        <p class="numbers">{{  $item->all_visits->sum('return') }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                            @include('admin.analytics.web.vacancy.allchart',['id' => $item["id"],'chartId' => 'chart'.$item["id"], 'chartTitle' => $item["job_title"], 'chartData' => $item["all_visits"]])
                                        </div>
                                    </div> 
                                </div>                                   
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>        
</div>