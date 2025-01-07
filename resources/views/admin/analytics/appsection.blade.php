<div class="card-body app-section" style="display:none">
    <ul class="nav nav-tabs top-tab" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="app-overview-tab" data-toggle="tab" href="#app-overview" role="tab"
                aria-controls="app-overview" aria-selected="true"><i class="icon-spinner3 mr-1"></i>Overview</a>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <!--app section-->
        <div class="tab-pane fade show active" id="app-overview" role="tabpanel" aria-labelledby="app-overview-tab">
            @include('admin.analytics.app.opens.appchart')
        </div>
    </div>        
</div>