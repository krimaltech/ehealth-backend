
<style>
    .chart_container {
        width: 100%;
        height: 400px;
    }

    .numbers {
        font-size: 30px;
        font-weight: 700;
        margin-bottom: 0;
    }

    .top-tab {
        background-color: white;
    }

    .top-tab .nav-link {
        border: none;
    }

    .top-tab .nav-link.active {
        border: none;
        border-bottom: 3px solid #063b9d;
        color: #063b9d;
    }

    #vacancy .nav-pills{
        border: 1px solid #ddd;
    }

    #vacancy .nav-pills .nav-link{
        border-radius: 0;
        border-bottom: 1px solid #ddd;
    }

    #vacancy .nav-pills .nav-link.active{
        background-color: #063b9d;
    }

    @media (max-width: 767px) {
        .chart_container {
            height: 300px;
        }
    }

    @media (max-width: 480px) {
        .chart_container {
            height: 200px;
        }
    }
</style>
<div class="card">
    <div class="card-header d-flex align-items-center justify-content-between">
        <h5 style="display:inline-block;font-weight:600;border-bottom:3px solid #063b9d;">Analytics</h5>
        <div class="custom-control custom-switch text-right">
            <span class="mr-2">Web</span>
            <input type="checkbox" class="custom-control-input" id="toggle">
            <label class="custom-control-label" for="toggle"></label>
            <span>App</span>
        </div>
    </div>

    @include('admin.analytics.visitorsection')
    @include('admin.analytics.appsection')
</div>


<script>
    $('#toggle').change(function(){
        let value = $(this).prop('checked');        
        if(value == true){
            $('.app-section').css('display','block');
            $('.visitor-section').css('display','none');
        }else{
            $('.app-section').css('display','none');
            $('.visitor-section').css('display','block');
        }
    })
</script>
