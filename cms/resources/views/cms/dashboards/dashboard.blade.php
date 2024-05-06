@extends('cms.layouts.masterpage')

@section('title', 'Dashboard')
@section('top-styles')
<link href="{{ url('') }}/assets/css/dashboard/dash_1.css" rel="stylesheet" type="text/css" />
<style type="text/css">
    @media (max-width: 800px) {
        #div_small{
            display: none;
        }
    }
    .currentMonth {
      color: #e95f2b;
      font-size: 20px;
      font-variant-caps: small-caps;
    }

</style>
@endsection
@section('header')
  @parent
@endsection

@section('leftside')
  @parent
@endsection
@section('content')
<!-- Start content -->
<!--  BEGIN CONTENT AREA  -->
<div id="content" class="main-content">
    <div class="layout-px-spacing">

        <div class="row layout-top-spacing ml-2">
            <p>Welcome <b> {{Auth::user()->name}} ! </b></p>
        </div>
        
        <div class="row layout-top-spacing">

            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
                <div class="widget widget-card-four">
                    <div class="widget-content">
                        <div class="w-header">
                            <div class="w-info">
                                <h6 class="value">Service Sale</h6>
                            </div>
                        </div>


                        <div class="w-content">

                            <div class="w-info">
                                <p class="value">{!! $processings !!} <!--<span>this week</span> --> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trending-up"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline><polyline points="17 6 23 6 23 12"></polyline></svg></p>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
                <div class="widget widget-card-four">
                    <div class="widget-content">
                        <div class="w-header">
                            <div class="w-info">
                                <h6 class="value">Number Of Activties Active</h6>
                            </div>
                        </div>


                        <div class="w-content">

                            <div class="w-info">
                                <p class="value">{!! $activity !!} <!--<span>this week</span> --> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trending-up"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline><polyline points="17 6 23 6 23 12"></polyline></svg></p>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
                <div class="widget widget-card-four">
                    <div class="widget-content">
                        <div class="w-header">
                            <div class="w-info">
                                <h6 class="value">Number Of Visas Active</h6>
                            </div>
                        </div>


                        <div class="w-content">

                            <div class="w-info">
                                <p class="value">{!! $visa !!} <!--<span>this week</span> --> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trending-up"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline><polyline points="17 6 23 6 23 12"></polyline></svg></p>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12 layout-spacing">
                <div class="widget widget-card-four">
                    <div class="widget-content">
                        <div class="w-header">
                            <div class="w-info">
                                <h6 class="value">Blogs</h6>
                            </div>
                        </div>


                        <div class="w-content">

                            <div class="w-info">
                                <p class="value">{!! $blogs !!} <!--<span>this week</span> --> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trending-up"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline><polyline points="17 6 23 6 23 12"></polyline></svg></p>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12 layout-spacing">
                <div class="widget widget-card-four">
                    <div class="widget-content">
                        <div class="w-header">
                            <div class="w-info">
                                <h6 class="value">Contant Inquiry</h6>
                            </div>
                        </div>


                        <div class="w-content">

                            <div class="w-info">
                                <p class="value">{!! $contacts !!} <!--<span >this week</span>-->  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trending-up"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline><polyline points="17 6 23 6 23 12"></polyline></svg></p>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12 layout-spacing">
                <div class="widget widget-card-four">
                    <div class="widget-content">
                        <div class="w-header">
                            <div class="w-info">
                                <h6 class="value">Product Inquiry</h6>
                            </div>
                        </div>


                        <div class="w-content">

                            <div class="w-info">
                                <p class="value">{!! $enquiry !!} <!--<span >this week</span>-->  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trending-up"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline><polyline points="17 6 23 6 23 12"></polyline></svg></p>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12 layout-spacing">
                <div class="widget widget-card-four">
                    <div class="widget-content">
                        <div class="w-header">
                            <div class="w-info">
                                <h6 class="value">Feedback</h6>
                            </div>
                        </div>

                        <div style="display: flex;justify-content: space-between;padding: 0px 50px;">
                            <div class="w-content">
                                <div class="w-info">
                                    <p class="value" style="color: green;">{!! $liked !!}</p>
                                </div>                            
                            </div>

                            <div class="w-content">
                                <div class="w-info">
                                    <p class="value">{!! $disliked !!}</p>
                                </div>                            
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
                <div class="widget widget-card-four">
                    <div class="widget-content">
                        <div class="w-header">
                            <div class="w-info">
                                <h6 class="value">Amount Received (Current Date <span class="currentMonth">{!! $currentDate !!}</span>)</h6>
                            </div>
                        </div>


                        <div class="w-content">

                            <div class="w-info">
                                <p class="value">{!! number_format($daysaleammount, 2) !!} <!--<span >this week</span>-->  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trending-up"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline><polyline points="17 6 23 6 23 12"></polyline></svg></p>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
                <div class="widget widget-card-four">
                    <div class="widget-content">
                        <div class="w-header">
                            <div class="w-info">
                                <h6 class="value">Amount Received (Current Month <span class="currentMonth">{!! $currentMonth !!}</span>)</h6>
                            </div>
                        </div>


                        <div class="w-content">

                            <div class="w-info">
                                <p class="value">{!! number_format($monthsaleammount, 2) !!} <!--<span >this week</span>-->  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trending-up"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline><polyline points="17 6 23 6 23 12"></polyline></svg></p>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
                <div class="widget widget-card-four">
                    <div class="widget-content">
                        <div class="w-header">
                            <div class="w-info">
                                <h6 class="value">Total Service Sale (Approved)</h6>
                            </div>
                        </div>


                        <div class="w-content">

                            <div class="w-info">
                                <p class="value">{!! number_format($allsaleammount, 2) !!} <!--<span >this week</span>-->  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trending-up"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline><polyline points="17 6 23 6 23 12"></polyline></svg></p>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                <div class="widget widget-card-four">
                    <div class="widget-content">
                        <div class="w-header">
                            <div class="w-info">
                                <h6 class="value">Service Sale (Current Month <span class="currentMonth">{!! $currentMonth !!}</span>)</h6>
                            </div>
                        </div>
                        <div id="uniqueVisits"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div>
<!--  END CONTENT AREA  -->
@endsection


@section('bottom-mid-scripts')

@endsection

@section('bottom-bot-scripts')
<script type="text/javascript">
    try {
  var d_1options1 = {
    chart: {
      height: 350,
      type: 'line',
      toolbar: {
        show: false,
      }
    },
    plotOptions: {
      bar: {
          horizontal: false,
          columnWidth: '50%',
      },
    },
    legend: {
      offsetX: 0,
      offsetY: -10,
    },
    colors: ['#e95f2b', '#805dca'],
    
    series: [{
      name: 'Service Sale',
      type: 'column',
      data: {!! json_encode($values) !!}
    }, ],

    stroke: {
      show: true,
      curve: 'smooth',
      width: [0, 4],
      lineCap: 'square'
    },
    // title: {
    //   text: 'Traffic Sources'
    // },
    // labels: ['01 Jan 2001', '02 Jan 2001', '03 Jan 2001', '04 Jan 2001', '05 Jan 2001', '06 Jan 2001', '07 Jan 2001', '08 Jan 2001', '09 Jan 2001', '10 Jan 2001', '11 Jan 2001', '12 Jan 2001'],
    xaxis: {
      // type: 'datetime'montheng
      categories: {!! json_encode($montheng) !!} ,
    },
    yaxis: [{
      title: {
        text: 'Service Sale',
      },
  
    },],

    responsive: [{
      breakpoint: 576,
      options: {
        yaxis: [{
          title: {
            text: undefined,
          },
      
        }, {
          opposite: true,
          title: {
            text: undefined
          }
        }],
      },
    }]
  
  }

  var d_1C_3 = new ApexCharts(
      document.querySelector("#uniqueVisits"),
      d_1options1
  );
  d_1C_3.render();
  } catch(e) {
// statements
console.log(e);
}

</script>

    <!-- <script src="{{ url('') }}/assets/js/dashboard/dash_1.js"></script> -->
@endsection


    
    