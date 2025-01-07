<div class="d-flex align-items-center justify-content-between">
    <div></div>
    <div class="custom-control custom-switch text-right">
        <span class="mr-2">Android</span>
        <input type="checkbox" class="custom-control-input" id="platform-toggle">
        <label class="custom-control-label" for="platform-toggle"></label>
        <span>iOS</span>
    </div>
</div>

<div class="visitors android-section">
    <h5 style="font-weight:600" class="mb-3">Android Analytics</h5>
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="androiddaily-tab" data-toggle="tab" href="#androiddaily" role="tab"
                aria-controls="androiddaily" aria-selected="true">Today</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="androidweekly-tab" data-toggle="tab" href="#androidweekly" role="tab"
                aria-controls="androidweekly" aria-selected="false">This Week</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="androidmonthly-tab" data-toggle="tab" href="#androidmonthly" role="tab"
                aria-controls="androidmonthly" aria-selected="false">This Month</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="androidyearly-tab" data-toggle="tab" href="#androidyearly" role="tab"
                aria-controls="androidyearly" aria-selected="false">This Year</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="androidall-tab" data-toggle="tab" href="#androidall" role="tab"
                aria-controls="androidall" aria-selected="false">All</a>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="androiddaily" role="tabpanel" aria-labelledby="androiddaily-tab">
            <div class="row">
                <div class="col-md-3 mb-3">
                    <div class="text-center py-3 border bg-white"
                        style="border-color:#3366CC !important;border-radius:20px">
                        <h5 class="mb-0" style="color:#3366CC"><i class="icon-users mr-1"></i>App Installs</h5>
                        <p class="numbers">{{ $dailyAndroidApps->sum('install') }}</p>
                        @if($androidPercent['dailyAndroidInstallPercent'] > 0)
                            <p class="text-success">+ {{$androidPercent['dailyAndroidInstallPercent']}}%</p>
                        @elseif($androidPercent['dailyAndroidInstallPercent'] < 0)
                            <p class="text-danger">{{$androidPercent['dailyAndroidInstallPercent']}}%</p>
                        @else
                            <p class="text-secondary">{{$androidPercent['dailyAndroidInstallPercent']}}%</p>
                        @endif
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="text-center py-3 border bg-white"
                        style="border-color:#DC3912 !important;border-radius:20px">
                        <h5 class="mb-0" style="color:#DC3912"><i class="icon-users mr-1"></i>Total App Opens</h5>
                        <p class="numbers">{{ $dailyAndroidApps->sum('total') }}</p>
                        @if($androidPercent['dailyAndroidTotalPercent'] > 0)
                            <p class="text-success">+ {{$androidPercent['dailyAndroidTotalPercent']}}%</p>
                        @elseif($androidPercent['dailyAndroidTotalPercent'] < 0)
                            <p class="text-danger">{{$androidPercent['dailyAndroidTotalPercent']}}%</p>
                        @else
                            <p class="text-secondary">{{$androidPercent['dailyAndroidTotalPercent']}}%</p>
                        @endif
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="text-center py-3 border bg-white"
                        style="border-color:#378805 !important;border-radius:20px">
                        <h5 class="mb-0" style="color:#378805"><i class="icon-users mr-1"></i>New App Opens</h5>
                        <p class="numbers">{{ $dailyAndroidApps->sum('new') }}</p>
                        @if($androidPercent['dailyAndroidNewPercent'] > 0)
                            <p class="text-success">+ {{$androidPercent['dailyAndroidNewPercent']}}%</p>
                        @elseif($androidPercent['dailyAndroidNewPercent'] < 0)
                            <p class="text-danger">{{$androidPercent['dailyAndroidNewPercent']}}%</p>
                        @else
                            <p class="text-secondary">{{$androidPercent['dailyAndroidNewPercent']}}%</p>
                        @endif
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="text-center py-3 border bg-white"
                        style="border-color:#FF9900 !important;border-radius:20px">
                        <h5 class="mb-0" style="color:#FF9900"><i class="icon-users mr-1"></i>Returning App Opens</h5>
                        <p class="numbers">{{ $dailyAndroidApps->sum('return') }}</p>
                        @if($androidPercent['dailyAndroidReturnPercent'] > 0)
                            <p class="text-success">+ {{$androidPercent['dailyAndroidReturnPercent']}}%</p>
                        @elseif($androidPercent['dailyAndroidReturnPercent'] < 0)
                            <p class="text-danger">{{$androidPercent['dailyAndroidReturnPercent']}}%</p>
                        @else
                            <p class="text-secondary">{{$androidPercent['dailyAndroidReturnPercent']}}%</p>
                        @endif
                    </div>
                </div>
            </div>
            {{-- <div class="card">
                <div class="card-body">
                    <div class="chart_container" id="androiddaily_analytics_chart"></div>
                </div>
            </div> --}}
        </div>
        <div class="tab-pane fade" id="androidweekly" role="tabpanel" aria-labelledby="androidweekly-tab">
            <div class="row">
                <div class="col-md-3 mb-3">
                    <div class="text-center py-3 border bg-white"
                        style="border-color:#3366CC !important;border-radius:20px">
                        <h5 class="mb-0" style="color:#3366CC"><i class="icon-users mr-1"></i>App Installs</h5>
                        <p class="numbers">{{ $weeklyAndroidApps->sum('install') }}</p>
                        @if($androidPercent['weeklyAndroidInstallPercent'] > 0)
                            <p class="text-success">+ {{$androidPercent['weeklyAndroidInstallPercent']}}%</p>
                        @elseif($androidPercent['weeklyAndroidInstallPercent'] < 0)
                            <p class="text-danger">{{$androidPercent['weeklyAndroidInstallPercent']}}%</p>
                        @else
                            <p class="text-secondary">{{$androidPercent['weeklyAndroidInstallPercent']}}%</p>
                        @endif
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="text-center py-3 border bg-white"
                        style="border-color:#DC3912 !important;border-radius:20px">
                        <h5 class="mb-0" style="color:#DC3912"><i class="icon-users mr-1"></i>Total App Opens</h5>
                        <p class="numbers">{{ $weeklyAndroidApps->sum('total') }}</p>
                        @if($androidPercent['weeklyAndroidTotalPercent'] > 0)
                            <p class="text-success">+ {{$androidPercent['weeklyAndroidTotalPercent']}}%</p>
                        @elseif($androidPercent['weeklyAndroidTotalPercent'] < 0)
                            <p class="text-danger">{{$androidPercent['weeklyAndroidTotalPercent']}}%</p>
                        @else
                            <p class="text-secondary">{{$androidPercent['weeklyAndroidTotalPercent']}}%</p>
                        @endif
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="text-center py-3 border bg-white"
                        style="border-color:#378805 !important;border-radius:20px">
                        <h5 class="mb-0" style="color:#378805"><i class="icon-users mr-1"></i>New App Opens</h5>
                        <p class="numbers">{{ $weeklyAndroidApps->sum('new') }}</p>
                        @if($androidPercent['weeklyAndroidNewPercent'] > 0)
                            <p class="text-success">+ {{$androidPercent['weeklyAndroidNewPercent']}}%</p>
                        @elseif($androidPercent['weeklyAndroidNewPercent'] < 0)
                            <p class="text-danger">{{$androidPercent['weeklyAndroidNewPercent']}}%</p>
                        @else
                            <p class="text-secondary">{{$androidPercent['weeklyAndroidNewPercent']}}%</p>
                        @endif
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="text-center py-3 border bg-white"
                        style="border-color:#FF9900 !important;border-radius:20px">
                        <h5 class="mb-0" style="color:#FF9900"><i class="icon-users mr-1"></i>Returning App Opens</h5>
                        <p class="numbers">{{ $weeklyAndroidApps->sum('return') }}</p>
                        @if($androidPercent['weeklyAndroidReturnPercent'] > 0)
                            <p class="text-success">+ {{$androidPercent['weeklyAndroidReturnPercent']}}%</p>
                        @elseif($androidPercent['weeklyAndroidReturnPercent'] < 0)
                            <p class="text-danger">{{$androidPercent['weeklyAndroidReturnPercent']}}%</p>
                        @else
                            <p class="text-secondary">{{$androidPercent['weeklyAndroidReturnPercent']}}%</p>
                        @endif
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="chart_container" id="androidweekly_analytics_chart"></div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="androidmonthly" role="tabpanel" aria-labelledby="androidmonthly-tab">
            <div class="row">
                <div class="col-md-3 mb-3">
                    <div class="text-center py-3 border bg-white"
                        style="border-color:#3366CC !important;border-radius:20px">
                        <h5 class="mb-0" style="color:#3366CC"><i class="icon-users mr-1"></i>App Installs</h5>
                        <p class="numbers">{{ $monthlyAndroidApps->sum('install') }}</p>
                        @if($androidPercent['monthlyAndroidInstallPercent'] > 0)
                            <p class="text-success">+ {{$androidPercent['monthlyAndroidInstallPercent']}}%</p>
                        @elseif($androidPercent['monthlyAndroidInstallPercent'] < 0)
                            <p class="text-danger">{{$androidPercent['monthlyAndroidInstallPercent']}}%</p>
                        @else
                            <p class="text-secondary">{{$androidPercent['monthlyAndroidInstallPercent']}}%</p>
                        @endif
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="text-center py-3 border bg-white"
                        style="border-color:#DC3912 !important;border-radius:20px">
                        <h5 class="mb-0" style="color:#DC3912"><i class="icon-users mr-1"></i>Total App Opens</h5>
                        <p class="numbers">{{ $monthlyAndroidApps->sum('total') }}</p>
                        @if($androidPercent['monthlyAndroidTotalPercent'] > 0)
                            <p class="text-success">+ {{$androidPercent['monthlyAndroidTotalPercent']}}%</p>
                        @elseif($androidPercent['monthlyAndroidTotalPercent'] < 0)
                            <p class="text-danger">{{$androidPercent['monthlyAndroidTotalPercent']}}%</p>
                        @else
                            <p class="text-secondary">{{$androidPercent['monthlyAndroidTotalPercent']}}%</p>
                        @endif
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="text-center py-3 border bg-white"
                        style="border-color:#378805 !important;border-radius:20px">
                        <h5 class="mb-0" style="color:#378805"><i class="icon-users mr-1"></i>New App Opens</h5>
                        <p class="numbers">{{ $monthlyAndroidApps->sum('new') }}</p>
                        @if($androidPercent['monthlyAndroidNewPercent'] > 0)
                            <p class="text-success">+ {{$androidPercent['monthlyAndroidNewPercent']}}%</p>
                        @elseif($androidPercent['monthlyAndroidNewPercent'] < 0)
                            <p class="text-danger">{{$androidPercent['monthlyAndroidNewPercent']}}%</p>
                        @else
                            <p class="text-secondary">{{$androidPercent['monthlyAndroidNewPercent']}}%</p>
                        @endif
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="text-center py-3 border bg-white"
                        style="border-color:#FF9900 !important;border-radius:20px">
                        <h5 class="mb-0" style="color:#FF9900"><i class="icon-users mr-1"></i>Returning App Opens</h5>
                        <p class="numbers">{{ $monthlyAndroidApps->sum('return') }}</p>
                        @if($androidPercent['monthlyAndroidReturnPercent'] > 0)
                            <p class="text-success">+ {{$androidPercent['monthlyAndroidReturnPercent']}}%</p>
                        @elseif($androidPercent['monthlyAndroidReturnPercent'] < 0)
                            <p class="text-danger">{{$androidPercent['monthlyAndroidReturnPercent']}}%</p>
                        @else
                            <p class="text-secondary">{{$androidPercent['monthlyAndroidReturnPercent']}}%</p>
                        @endif
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="chart_container" id="androidmonthly_analytics_chart"></div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="androidyearly" role="tabpanel" aria-labelledby="androidyearly-tab">
            <div class="row">
                <div class="col-md-3 mb-3">
                    <div class="text-center py-3 border bg-white"
                        style="border-color:#3366CC !important;border-radius:20px">
                        <h5 class="mb-0" style="color:#3366CC"><i class="icon-users mr-1"></i>App Installs</h5>
                        <p class="numbers">{{ $yearlyAndroidApps->sum('install') }}</p>
                        @if($androidPercent['yearlyAndroidInstallPercent'] > 0)
                            <p class="text-success">+ {{$androidPercent['yearlyAndroidInstallPercent']}}%</p>
                        @elseif($androidPercent['yearlyAndroidInstallPercent'] < 0)
                            <p class="text-danger">{{$androidPercent['yearlyAndroidInstallPercent']}}%</p>
                        @else
                            <p class="text-secondary">{{$androidPercent['yearlyAndroidInstallPercent']}}%</p>
                        @endif
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="text-center py-3 border bg-white"
                        style="border-color:#DC3912 !important;border-radius:20px">
                        <h5 class="mb-0" style="color:#DC3912"><i class="icon-users mr-1"></i>Total App Opens</h5>
                        <p class="numbers">{{ $yearlyAndroidApps->sum('total') }}</p>
                        @if($androidPercent['yearlyAndroidTotalPercent'] > 0)
                            <p class="text-success">+ {{$androidPercent['yearlyAndroidTotalPercent']}}%</p>
                        @elseif($androidPercent['yearlyAndroidTotalPercent'] < 0)
                            <p class="text-danger">{{$androidPercent['yearlyAndroidTotalPercent']}}%</p>
                        @else
                            <p class="text-secondary">{{$androidPercent['yearlyAndroidTotalPercent']}}%</p>
                        @endif
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="text-center py-3 border bg-white"
                        style="border-color:#378805 !important;border-radius:20px">
                        <h5 class="mb-0" style="color:#378805"><i class="icon-users mr-1"></i>New App Opens</h5>
                        <p class="numbers">{{ $yearlyAndroidApps->sum('new') }}</p>
                        @if($androidPercent['yearlyAndroidNewPercent'] > 0)
                            <p class="text-success">+ {{$androidPercent['yearlyAndroidNewPercent']}}%</p>
                        @elseif($androidPercent['yearlyAndroidNewPercent'] < 0)
                            <p class="text-danger">{{$androidPercent['yearlyAndroidNewPercent']}}%</p>
                        @else
                            <p class="text-secondary">{{$androidPercent['yearlyAndroidNewPercent']}}%</p>
                        @endif
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="text-center py-3 border bg-white"
                        style="border-color:#FF9900 !important;border-radius:20px">
                        <h5 class="mb-0" style="color:#FF9900"><i class="icon-users mr-1"></i>Returning App Opens</h5>
                        <p class="numbers">{{ $yearlyAndroidApps->sum('return') }}</p>
                        @if($androidPercent['yearlyAndroidReturnPercent'] > 0)
                            <p class="text-success">+ {{$androidPercent['yearlyAndroidReturnPercent']}}%</p>
                        @elseif($androidPercent['yearlyAndroidReturnPercent'] < 0)
                            <p class="text-danger">{{$androidPercent['yearlyAndroidReturnPercent']}}%</p>
                        @else
                            <p class="text-secondary">{{$androidPercent['yearlyAndroidReturnPercent']}}%</p>
                        @endif
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="chart_container" id="androidyearly_analytics_chart"></div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="androidall" role="tabpanel" aria-labelledby="androidall-tab">
            <div class="row">
                <div class="col-md-3 mb-3">
                    <div class="text-center py-3 border bg-white"
                        style="border-color:#3366CC !important;border-radius:20px">
                        <h5 class="mb-0" style="color:#3366CC"><i class="icon-users mr-1"></i>App Installs</h5>
                        <p class="numbers">{{ $androidApps->sum('install') }}</p>
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="text-center py-3 border bg-white"
                        style="border-color:#DC3912 !important;border-radius:20px">
                        <h5 class="mb-0" style="color:#DC3912"><i class="icon-users mr-1"></i>Total App Opens</h5>
                        <p class="numbers">{{ $androidApps->sum('total') }}</p>
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="text-center py-3 border bg-white"
                        style="border-color:#378805 !important;border-radius:20px">
                        <h5 class="mb-0" style="color:#378805"><i class="icon-users mr-1"></i>New App Opens</h5>
                        <p class="numbers">{{ $androidApps->sum('new') }}</p>
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="text-center py-3 border bg-white"
                        style="border-color:#FF9900 !important;border-radius:20px">
                        <h5 class="mb-0" style="color:#FF9900"><i class="icon-users mr-1"></i>Returning App Opens</h5>
                        <p class="numbers">{{ $androidApps->sum('return') }}</p>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="chart_container" id="androidanalytics_chart"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="visitors ios-section" style="display:none">
    <h5 style="font-weight:600" class="mb-3">iOS Analytics</h5>
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="iosdaily-tab" data-toggle="tab" href="#iosdaily" role="tab"
                aria-controls="iosdaily" aria-selected="true">Today</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="iosweekly-tab" data-toggle="tab" href="#iosweekly" role="tab"
                aria-controls="iosweekly" aria-selected="false">This Week</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="iosmonthly-tab" data-toggle="tab" href="#iosmonthly" role="tab"
                aria-controls="iosmonthly" aria-selected="false">This Month</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="iosyearly-tab" data-toggle="tab" href="#iosyearly" role="tab"
                aria-controls="iosyearly" aria-selected="false">This Year</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="iosall-tab" data-toggle="tab" href="#iosall" role="tab"
                aria-controls="iosall" aria-selected="false">All</a>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="iosdaily" role="tabpanel" aria-labelledby="iosdaily-tab">
            <div class="row">
                <div class="col-md-3 mb-3">
                    <div class="text-center py-3 border bg-white"
                        style="border-color:#3366CC !important;border-radius:20px">
                        <h5 class="mb-0" style="color:#3366CC"><i class="icon-users mr-1"></i>App Installs</h5>
                        <p class="numbers">{{ $dailyIosApps->sum('install') }}</p>
                        @if($iosPercent['dailyIosInstallPercent'] > 0)
                            <p class="text-success">+ {{$iosPercent['dailyIosInstallPercent']}}%</p>
                        @elseif($iosPercent['dailyIosInstallPercent'] < 0)
                            <p class="text-danger">{{$iosPercent['dailyIosInstallPercent']}}%</p>
                        @else
                            <p class="text-secondary">{{$iosPercent['dailyIosInstallPercent']}}%</p>
                        @endif
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="text-center py-3 border bg-white"
                        style="border-color:#DC3912 !important;border-radius:20px">
                        <h5 class="mb-0" style="color:#DC3912"><i class="icon-users mr-1"></i>Total App Opens</h5>
                        <p class="numbers">{{ $dailyIosApps->sum('total') }}</p>
                        @if($iosPercent['dailyIosTotalPercent'] > 0)
                            <p class="text-success">+ {{$iosPercent['dailyIosTotalPercent']}}%</p>
                        @elseif($iosPercent['dailyIosTotalPercent'] < 0)
                            <p class="text-danger">{{$iosPercent['dailyIosTotalPercent']}}%</p>
                        @else
                            <p class="text-secondary">{{$iosPercent['dailyIosTotalPercent']}}%</p>
                        @endif
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="text-center py-3 border bg-white"
                        style="border-color:#378805 !important;border-radius:20px">
                        <h5 class="mb-0" style="color:#378805"><i class="icon-users mr-1"></i>New App Opens</h5>
                        <p class="numbers">{{ $dailyIosApps->sum('new') }}</p>
                        @if($iosPercent['dailyIosNewPercent'] > 0)
                            <p class="text-success">+ {{$iosPercent['dailyIosNewPercent']}}%</p>
                        @elseif($iosPercent['dailyIosNewPercent'] < 0)
                            <p class="text-danger">{{$iosPercent['dailyIosNewPercent']}}%</p>
                        @else
                            <p class="text-secondary">{{$iosPercent['dailyIosNewPercent']}}%</p>
                        @endif
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="text-center py-3 border bg-white"
                        style="border-color:#FF9900 !important;border-radius:20px">
                        <h5 class="mb-0" style="color:#FF9900"><i class="icon-users mr-1"></i>Returning App Opens</h5>
                        <p class="numbers">{{ $dailyIosApps->sum('return') }}</p>
                        @if($iosPercent['dailyIosReturnPercent'] > 0)
                            <p class="text-success">+ {{$iosPercent['dailyIosReturnPercent']}}%</p>
                        @elseif($iosPercent['dailyIosReturnPercent'] < 0)
                            <p class="text-danger">{{$iosPercent['dailyIosReturnPercent']}}%</p>
                        @else
                            <p class="text-secondary">{{$iosPercent['dailyIosReturnPercent']}}%</p>
                        @endif
                    </div>
                </div>
            </div>
            {{-- <div class="card">
                <div class="card-body">
                    <div class="chart_container" id="iosdaily_analytics_chart"></div>
                </div>
            </div> --}}
        </div>
        <div class="tab-pane fade" id="iosweekly" role="tabpanel" aria-labelledby="iosweekly-tab">
            <div class="row">
                <div class="col-md-3 mb-3">
                    <div class="text-center py-3 border bg-white"
                        style="border-color:#3366CC !important;border-radius:20px">
                        <h5 class="mb-0" style="color:#3366CC"><i class="icon-users mr-1"></i>App Installs</h5>
                        <p class="numbers">{{ $weeklyIosApps->sum('install') }}</p>
                        @if($iosPercent['weeklyIosInstallPercent'] > 0)
                            <p class="text-success">+ {{$iosPercent['weeklyIosInstallPercent']}}%</p>
                        @elseif($iosPercent['weeklyIosInstallPercent'] < 0)
                            <p class="text-danger">{{$iosPercent['weeklyIosInstallPercent']}}%</p>
                        @else
                            <p class="text-secondary">{{$iosPercent['weeklyIosInstallPercent']}}%</p>
                        @endif
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="text-center py-3 border bg-white"
                        style="border-color:#DC3912 !important;border-radius:20px">
                        <h5 class="mb-0" style="color:#DC3912"><i class="icon-users mr-1"></i>Total App Opens</h5>
                        <p class="numbers">{{ $weeklyIosApps->sum('total') }}</p>
                        @if($iosPercent['weeklyIosTotalPercent'] > 0)
                            <p class="text-success">+ {{$iosPercent['weeklyIosTotalPercent']}}%</p>
                        @elseif($iosPercent['weeklyIosTotalPercent'] < 0)
                            <p class="text-danger">{{$iosPercent['weeklyIosTotalPercent']}}%</p>
                        @else
                            <p class="text-secondary">{{$iosPercent['weeklyIosTotalPercent']}}%</p>
                        @endif
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="text-center py-3 border bg-white"
                        style="border-color:#378805 !important;border-radius:20px">
                        <h5 class="mb-0" style="color:#378805"><i class="icon-users mr-1"></i>New App Opens</h5>
                        <p class="numbers">{{ $weeklyIosApps->sum('new') }}</p>
                        @if($iosPercent['weeklyIosNewPercent'] > 0)
                            <p class="text-success">+ {{$iosPercent['weeklyIosNewPercent']}}%</p>
                        @elseif($iosPercent['weeklyIosNewPercent'] < 0)
                            <p class="text-danger">{{$iosPercent['weeklyIosNewPercent']}}%</p>
                        @else
                            <p class="text-secondary">{{$iosPercent['weeklyIosNewPercent']}}%</p>
                        @endif
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="text-center py-3 border bg-white"
                        style="border-color:#FF9900 !important;border-radius:20px">
                        <h5 class="mb-0" style="color:#FF9900"><i class="icon-users mr-1"></i>Returning App Opens</h5>
                        <p class="numbers">{{ $weeklyIosApps->sum('return') }}</p>
                        @if($iosPercent['weeklyIosReturnPercent'] > 0)
                            <p class="text-success">+ {{$iosPercent['weeklyIosReturnPercent']}}%</p>
                        @elseif($iosPercent['weeklyIosReturnPercent'] < 0)
                            <p class="text-danger">{{$iosPercent['weeklyIosReturnPercent']}}%</p>
                        @else
                            <p class="text-secondary">{{$iosPercent['weeklyIosReturnPercent']}}%</p>
                        @endif
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="chart_container" id="iosweekly_analytics_chart"></div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="iosmonthly" role="tabpanel" aria-labelledby="iosmonthly-tab">
            <div class="row">
                <div class="col-md-3 mb-3">
                    <div class="text-center py-3 border bg-white"
                        style="border-color:#3366CC !important;border-radius:20px">
                        <h5 class="mb-0" style="color:#3366CC"><i class="icon-users mr-1"></i>App Installs</h5>
                        <p class="numbers">{{ $monthlyIosApps->sum('install') }}</p>
                        @if($iosPercent['monthlyIosInstallPercent'] > 0)
                            <p class="text-success">+ {{$iosPercent['monthlyIosInstallPercent']}}%</p>
                        @elseif($iosPercent['monthlyIosInstallPercent'] < 0)
                            <p class="text-danger">{{$iosPercent['monthlyIosInstallPercent']}}%</p>
                        @else
                            <p class="text-secondary">{{$iosPercent['monthlyIosInstallPercent']}}%</p>
                        @endif
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="text-center py-3 border bg-white"
                        style="border-color:#DC3912 !important;border-radius:20px">
                        <h5 class="mb-0" style="color:#DC3912"><i class="icon-users mr-1"></i>Total App Opens</h5>
                        <p class="numbers">{{ $monthlyIosApps->sum('total') }}</p>
                        @if($iosPercent['monthlyIosTotalPercent'] > 0)
                            <p class="text-success">+ {{$iosPercent['monthlyIosTotalPercent']}}%</p>
                        @elseif($iosPercent['monthlyIosTotalPercent'] < 0)
                            <p class="text-danger">{{$iosPercent['monthlyIosTotalPercent']}}%</p>
                        @else
                            <p class="text-secondary">{{$iosPercent['monthlyIosTotalPercent']}}%</p>
                        @endif
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="text-center py-3 border bg-white"
                        style="border-color:#378805 !important;border-radius:20px">
                        <h5 class="mb-0" style="color:#378805"><i class="icon-users mr-1"></i>New App Opens</h5>
                        <p class="numbers">{{ $monthlyIosApps->sum('new') }}</p>
                        @if($iosPercent['monthlyIosNewPercent'] > 0)
                            <p class="text-success">+ {{$iosPercent['monthlyIosNewPercent']}}%</p>
                        @elseif($iosPercent['monthlyIosNewPercent'] < 0)
                            <p class="text-danger">{{$iosPercent['monthlyIosNewPercent']}}%</p>
                        @else
                            <p class="text-secondary">{{$iosPercent['monthlyIosNewPercent']}}%</p>
                        @endif
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="text-center py-3 border bg-white"
                        style="border-color:#FF9900 !important;border-radius:20px">
                        <h5 class="mb-0" style="color:#FF9900"><i class="icon-users mr-1"></i>Returning App Opens</h5>
                        <p class="numbers">{{ $monthlyIosApps->sum('return') }}</p>
                        @if($iosPercent['monthlyIosReturnPercent'] > 0)
                            <p class="text-success">+ {{$iosPercent['monthlyIosReturnPercent']}}%</p>
                        @elseif($iosPercent['monthlyIosReturnPercent'] < 0)
                            <p class="text-danger">{{$iosPercent['monthlyIosReturnPercent']}}%</p>
                        @else
                            <p class="text-secondary">{{$iosPercent['monthlyIosReturnPercent']}}%</p>
                        @endif
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="chart_container" id="iosmonthly_analytics_chart"></div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="iosyearly" role="tabpanel" aria-labelledby="iosyearly-tab">
            <div class="row">
                <div class="col-md-3 mb-3">
                    <div class="text-center py-3 border bg-white"
                        style="border-color:#3366CC !important;border-radius:20px">
                        <h5 class="mb-0" style="color:#3366CC"><i class="icon-users mr-1"></i>App Installs</h5>
                        <p class="numbers">{{ $yearlyIosApps->sum('install') }}</p>
                        @if($iosPercent['yearlyIosInstallPercent'] > 0)
                            <p class="text-success">+ {{$iosPercent['yearlyIosInstallPercent']}}%</p>
                        @elseif($iosPercent['yearlyIosInstallPercent'] < 0)
                            <p class="text-danger">{{$iosPercent['yearlyIosInstallPercent']}}%</p>
                        @else
                            <p class="text-secondary">{{$iosPercent['yearlyIosInstallPercent']}}%</p>
                        @endif
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="text-center py-3 border bg-white"
                        style="border-color:#DC3912 !important;border-radius:20px">
                        <h5 class="mb-0" style="color:#DC3912"><i class="icon-users mr-1"></i>Total App Opens</h5>
                        <p class="numbers">{{ $yearlyIosApps->sum('total') }}</p>
                        @if($iosPercent['yearlyIosTotalPercent'] > 0)
                            <p class="text-success">+ {{$iosPercent['yearlyIosTotalPercent']}}%</p>
                        @elseif($iosPercent['yearlyIosTotalPercent'] < 0)
                            <p class="text-danger">{{$iosPercent['yearlyIosTotalPercent']}}%</p>
                        @else
                            <p class="text-secondary">{{$iosPercent['yearlyIosTotalPercent']}}%</p>
                        @endif
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="text-center py-3 border bg-white"
                        style="border-color:#378805 !important;border-radius:20px">
                        <h5 class="mb-0" style="color:#378805"><i class="icon-users mr-1"></i>New App Opens</h5>
                        <p class="numbers">{{ $yearlyIosApps->sum('new') }}</p>
                        @if($iosPercent['yearlyIosNewPercent'] > 0)
                            <p class="text-success">+ {{$iosPercent['yearlyIosNewPercent']}}%</p>
                        @elseif($iosPercent['yearlyIosNewPercent'] < 0)
                            <p class="text-danger">{{$iosPercent['yearlyIosNewPercent']}}%</p>
                        @else
                            <p class="text-secondary">{{$iosPercent['yearlyIosNewPercent']}}%</p>
                        @endif
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="text-center py-3 border bg-white"
                        style="border-color:#FF9900 !important;border-radius:20px">
                        <h5 class="mb-0" style="color:#FF9900"><i class="icon-users mr-1"></i>Returning App Opens</h5>
                        <p class="numbers">{{ $yearlyIosApps->sum('return') }}</p>
                        @if($iosPercent['yearlyIosReturnPercent'] > 0)
                            <p class="text-success">+ {{$iosPercent['yearlyIosReturnPercent']}}%</p>
                        @elseif($iosPercent['yearlyIosReturnPercent'] < 0)
                            <p class="text-danger">{{$iosPercent['yearlyIosReturnPercent']}}%</p>
                        @else
                            <p class="text-secondary">{{$iosPercent['yearlyIosReturnPercent']}}%</p>
                        @endif
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="chart_container" id="iosyearly_analytics_chart"></div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="iosall" role="tabpanel" aria-labelledby="iosall-tab">
            <div class="row">
                <div class="col-md-3 mb-3">
                    <div class="text-center py-3 border bg-white"
                        style="border-color:#3366CC !important;border-radius:20px">
                        <h5 class="mb-0" style="color:#3366CC"><i class="icon-users mr-1"></i>App Installs</h5>
                        <p class="numbers">{{ $iosApps->sum('install') }}</p>
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="text-center py-3 border bg-white"
                        style="border-color:#DC3912 !important;border-radius:20px">
                        <h5 class="mb-0" style="color:#DC3912"><i class="icon-users mr-1"></i>Total App Opens</h5>
                        <p class="numbers">{{ $iosApps->sum('total') }}</p>
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="text-center py-3 border bg-white"
                        style="border-color:#378805 !important;border-radius:20px">
                        <h5 class="mb-0" style="color:#378805"><i class="icon-users mr-1"></i>New App Opens</h5>
                        <p class="numbers">{{ $iosApps->sum('new') }}</p>
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="text-center py-3 border bg-white"
                        style="border-color:#FF9900 !important;border-radius:20px">
                        <h5 class="mb-0" style="color:#FF9900"><i class="icon-users mr-1"></i>Returning App Opens</h5>
                        <p class="numbers">{{ $iosApps->sum('return') }}</p>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="chart_container" id="iosanalytics_chart"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="{{asset('global_assets/linechart/loader.js')}}"></script>
<!--Android-->
    <!--All App Installs and Opens-->
    <script>
        $('#androidall-tab').on('shown.bs.tab', function (e) {
            // Get the chart container element
            var chartContainer = document.getElementById('androidanalytics_chart');

            // Resize the chart container
            var newWidth = chartContainer.offsetWidth;
            var newHeight = chartContainer.offsetHeight;

            // Create the chart data and options
            var data = google.visualization.arrayToDataTable([
                ['Date', 'App Installs', 'Total App Opens', 'New App Opens', 'Returning App Opens'],
                @if(count($androidApps) > 0)
                    @foreach ($androidApps as $item)
                        ['{{\Carbon\Carbon::parse($item['date'])->format("M d, Y")}}', {{ $item['install'] }}, {{ $item['total'] }},{{ $item['new'] }},
                            {{ $item['return'] }}
                        ],
                    @endforeach
                @else
                    ['No data available', 0, 0, 0, 0]
                @endif
            ]);

            var options = {
                title: 'App Installs and Opens Analytics',
                colors: ['#3366CC', '#DC3912', '#378805', '#FF9900'],
                pointSize: 5,
                legend: {
                    position: 'bottom'
                },
                vAxis: {
                    title: 'Installs and Opens',
                    minValue: 0,
                    format: '0'
                },
                chartArea: {
                    left: '5%',
                    top: '10%',
                    width: '90%',
                    height: '80%'
                },
                chartMargins: {
                    left: 0,
                    right: 0
                },
            };

            // Create the chart
            var chart = new google.visualization.LineChart(chartContainer);

            // Draw the chart
            chart.draw(data, options);
        });
    </script>
    <!--Weekly visitors-->
    <script>
        $('#androidweekly-tab').on('shown.bs.tab', function (e) {
            // Get the chart container element
            var chartContainer = document.getElementById('androidweekly_analytics_chart');

            // Resize the chart container
            var newWidth = chartContainer.offsetWidth;
            var newHeight = chartContainer.offsetHeight;

            // Create the chart data and options
            var data = google.visualization.arrayToDataTable([
                ['Date', 'App Installs', 'Total App Opens', 'New App Opens', 'Returning App Opens'],
                @if(count($weeklyAndroidApps) > 0)
                    @foreach ($weeklyAndroidApps as $item)
                        ['{{\Carbon\Carbon::parse($item['date'])->format("M d, Y")}}', {{ $item['install'] }}, {{ $item['total'] }},{{ $item['new'] }},
                            {{ $item['return'] }}
                        ],
                    @endforeach
                @else
                    ['No data available', 0, 0, 0, 0]
                @endif
            ]);

            var options = {
                title: 'App Installs and Opens Analytics (Weekly Stats)',
                colors: ['#3366CC', '#DC3912', '#378805', '#FF9900'],
                pointSize: 5,
                legend: {
                    position: 'bottom'
                },
                vAxis: {
                    title: 'Installs and Opens',
                    minValue: 0,
                    format: '0'
                },
                chartArea: {
                    left: '5%',
                    top: '10%',
                    width: '90%',
                    height: '80%'
                },
                chartMargins: {
                    left: 0,
                    right: 0
                },
            };

            // Create the chart
            var chart = new google.visualization.LineChart(chartContainer);

            // Draw the chart
            chart.draw(data, options);
        });
    </script>
    <!--Monthly visitors-->
    <script>
        $('#androidmonthly-tab').on('shown.bs.tab', function (e) {
            // Get the chart container element
            var chartContainer = document.getElementById('androidmonthly_analytics_chart');

            // Resize the chart container
            var newWidth = chartContainer.offsetWidth;
            var newHeight = chartContainer.offsetHeight;

            // Create the chart data and options
            var data = google.visualization.arrayToDataTable([
                ['Date', 'App Installs', 'Total App Opens', 'New App Opens', 'Returning App Opens'],
                @if(count($monthlyAndroidApps) > 0)
                    @foreach ($monthlyAndroidApps as $item)
                        ['{{\Carbon\Carbon::parse($item['date'])->format("M d, Y")}}', {{ $item['install'] }}, {{ $item['total'] }},{{ $item['new'] }},
                            {{ $item['return'] }}
                        ],
                    @endforeach
                @else
                    ['No data available', 0, 0, 0, 0]
                @endif
            ]);

            var options = {
                title: 'App Installs and Opens Analytics (Monthly Stats)',
                colors: ['#3366CC', '#DC3912', '#378805', '#FF9900'],
                pointSize: 5,
                legend: {
                    position: 'bottom'
                },
                vAxis: {
                    title: 'Installs and Opens',
                    minValue: 0,
                    format: '0'
                },
                chartArea: {
                    left: '5%',
                    top: '10%',
                    width: '90%',
                    height: '80%'
                },
                chartMargins: {
                    left: 0,
                    right: 0
                },
            };

            // Create the chart
            var chart = new google.visualization.LineChart(chartContainer);

            // Draw the chart
            chart.draw(data, options);
        });
    </script>
    <!--Yearly visitors-->
    <script>
        $('#androidyearly-tab').on('shown.bs.tab', function (e) {
            // Get the chart container element
            var chartContainer = document.getElementById('androidyearly_analytics_chart');

            // Resize the chart container
            var newWidth = chartContainer.offsetWidth;
            var newHeight = chartContainer.offsetHeight;

            // Create the chart data and options
            var data = google.visualization.arrayToDataTable([
                ['Date', 'App Installs', 'Total App Opens', 'New App Opens', 'Returning App Opens'],
                @if(count($yearlyAndroidApps) > 0)
                    @foreach ($yearlyAndroidApps as $item)
                        ['{{\Carbon\Carbon::parse($item['date'])->format("M d, Y")}}', {{ $item['install'] }}, {{ $item['total'] }},{{ $item['new'] }},
                            {{ $item['return'] }}
                        ],
                    @endforeach
                @else
                    ['No data available', 0, 0, 0, 0]
                @endif
            ]);

            var options = {
                title: 'App Installs and Opens Analytics (Yearly Stats)',
                colors: ['#3366CC', '#DC3912', '#378805', '#FF9900'],
                pointSize: 5,
                legend: {
                    position: 'bottom'
                },
                vAxis: {
                    title: 'Installs and Opens',
                    minValue: 0,
                    format: '0'
                },
                chartArea: {
                    left: '5%',
                    top: '10%',
                    width: '90%',
                    height: '80%'
                },
                chartMargins: {
                    left: 0,
                    right: 0
                },
            };

            // Create the chart
            var chart = new google.visualization.LineChart(chartContainer);

            // Draw the chart
            chart.draw(data, options);
        });
    </script>
<!--Android-->

<!--IOS-->
    <!--All App Installs and Opens-->
    <script>
        $('#iosall-tab').on('shown.bs.tab', function (e) {
            // Get the chart container element
            var chartContainer = document.getElementById('iosanalytics_chart');

            // Resize the chart container
            var newWidth = chartContainer.offsetWidth;
            var newHeight = chartContainer.offsetHeight;

            // Create the chart data and options
            var data = google.visualization.arrayToDataTable([
                ['Date', 'App Installs', 'Total App Opens', 'New App Opens', 'Returning App Opens'],
                @if(count($iosApps) > 0)
                    @foreach ($iosApps as $item)
                        ['{{\Carbon\Carbon::parse($item['date'])->format("M d, Y")}}', {{ $item['install'] }}, {{ $item['total'] }},{{ $item['new'] }},
                            {{ $item['return'] }}
                        ],
                    @endforeach
                @else
                    ['No data available', 0, 0, 0, 0]
                @endif
            ]);

            var options = {
                title: 'App Installs and Opens Analytics',
                colors: ['#3366CC', '#DC3912', '#378805', '#FF9900'],
                pointSize: 5,
                legend: {
                    position: 'bottom'
                },
                vAxis: {
                    title: 'Installs and Opens',
                    minValue: 0,
                    format: '0'
                },
                chartArea: {
                    left: '5%',
                    top: '10%',
                    width: '90%',
                    height: '80%'
                },
                chartMargins: {
                    left: 0,
                    right: 0
                },
            };

            // Create the chart
            var chart = new google.visualization.LineChart(chartContainer);

            // Draw the chart
            chart.draw(data, options);
        });
    </script>
    <!--Weekly visitors-->
    <script>
        $('#iosweekly-tab').on('shown.bs.tab', function (e) {
            // Get the chart container element
            var chartContainer = document.getElementById('iosweekly_analytics_chart');

            // Resize the chart container
            var newWidth = chartContainer.offsetWidth;
            var newHeight = chartContainer.offsetHeight;

            // Create the chart data and options
            var data = google.visualization.arrayToDataTable([
                ['Date', 'App Installs', 'Total App Opens', 'New App Opens', 'Returning App Opens'],
                @if(count($weeklyIosApps) > 0)
                    @foreach ($weeklyIosApps as $item)
                        ['{{\Carbon\Carbon::parse($item['date'])->format("M d, Y")}}', {{ $item['install'] }}, {{ $item['total'] }},{{ $item['new'] }},
                            {{ $item['return'] }}
                        ],
                    @endforeach
                @else
                    ['No data available', 0, 0, 0, 0]
                @endif
            ]);

            var options = {
                title: 'App Installs and Opens Analytics (Weekly Stats)',
                colors: ['#3366CC', '#DC3912', '#378805', '#FF9900'],
                pointSize: 5,
                legend: {
                    position: 'bottom'
                },
                vAxis: {
                    title: 'Installs and Opens',
                    minValue: 0,
                    format: '0'
                },
                chartArea: {
                    left: '5%',
                    top: '10%',
                    width: '90%',
                    height: '80%'
                },
                chartMargins: {
                    left: 0,
                    right: 0
                },
            };

            // Create the chart
            var chart = new google.visualization.LineChart(chartContainer);

            // Draw the chart
            chart.draw(data, options);
        });
    </script>
    <!--Monthly visitors-->
    <script>
        $('#iosmonthly-tab').on('shown.bs.tab', function (e) {
            // Get the chart container element
            var chartContainer = document.getElementById('iosmonthly_analytics_chart');

            // Resize the chart container
            var newWidth = chartContainer.offsetWidth;
            var newHeight = chartContainer.offsetHeight;

            // Create the chart data and options
            var data = google.visualization.arrayToDataTable([
                ['Date', 'App Installs', 'Total App Opens', 'New App Opens', 'Returning App Opens'],
                @if(count($monthlyIosApps) > 0)
                    @foreach ($monthlyIosApps as $item)
                        ['{{\Carbon\Carbon::parse($item['date'])->format("M d, Y")}}', {{ $item['install'] }}, {{ $item['total'] }},{{ $item['new'] }},
                            {{ $item['return'] }}
                        ],
                    @endforeach
                @else
                    ['No data available', 0, 0, 0, 0]
                @endif
            ]);

            var options = {
                title: 'App Installs and Opens Analytics (Monthly Stats)',
                colors: ['#3366CC', '#DC3912', '#378805', '#FF9900'],
                pointSize: 5,
                legend: {
                    position: 'bottom'
                },
                vAxis: {
                    title: 'Installs and Opens',
                    minValue: 0,
                    format: '0'
                },
                chartArea: {
                    left: '5%',
                    top: '10%',
                    width: '90%',
                    height: '80%'
                },
                chartMargins: {
                    left: 0,
                    right: 0
                },
            };

            // Create the chart
            var chart = new google.visualization.LineChart(chartContainer);

            // Draw the chart
            chart.draw(data, options);
        });
    </script>
    <!--Yearly visitors-->
    <script>
        $('#iosyearly-tab').on('shown.bs.tab', function (e) {
            // Get the chart container element
            var chartContainer = document.getElementById('iosyearly_analytics_chart');

            // Resize the chart container
            var newWidth = chartContainer.offsetWidth;
            var newHeight = chartContainer.offsetHeight;

            // Create the chart data and options
            var data = google.visualization.arrayToDataTable([
                ['Date', 'App Installs', 'Total App Opens', 'New App Opens', 'Returning App Opens'],
                @if(count($yearlyIosApps) > 0)
                    @foreach ($yearlyIosApps as $item)
                        ['{{\Carbon\Carbon::parse($item['date'])->format("M d, Y")}}', {{ $item['install'] }}, {{ $item['total'] }},{{ $item['new'] }},
                            {{ $item['return'] }}
                        ],
                    @endforeach
                @else
                    ['No data available', 0, 0, 0, 0]
                @endif
            ]);

            var options = {
                title: 'App Installs and Opens Analytics (Yearly Stats)',
                colors: ['#3366CC', '#DC3912', '#378805', '#FF9900'],
                pointSize: 5,
                legend: {
                    position: 'bottom'
                },
                vAxis: {
                    title: 'Installs and Opens',
                    minValue: 0,
                    format: '0'
                },
                chartArea: {
                    left: '5%',
                    top: '10%',
                    width: '90%',
                    height: '80%'
                },
                chartMargins: {
                    left: 0,
                    right: 0
                },
            };

            // Create the chart
            var chart = new google.visualization.LineChart(chartContainer);

            // Draw the chart
            chart.draw(data, options);
        });
    </script>
<!--IOS-->

<script>
    $('#platform-toggle').change(function(){
        let value = $(this).prop('checked');        
        if(value == true){
            $('.ios-section').css('display','block');
            $('.android-section').css('display','none');
        }else{
            $('.ios-section').css('display','none');
            $('.android-section').css('display','block');
        }
    })
</script>
