@extends('layouts.backend')

@section('content')
<div class="row">
    <div class="col-xl-4 col-lg-12">
        <div class="row">
           <div class="col-xl-6 col-md-3 col-sm-6">
              <!-- Card -->
              <div class="card mb-30">
                 <div class="state2">
                       <p class="font-14 mb-1">Live Users</p>
                       <h2>{{$live_users}} Online</h2>
                 </div>
              </div>
              <!-- End Card -->
           </div>
           <div class="col-xl-6 col-md-3 col-sm-6">
              <!-- Card -->
              <div class="card mb-30">
                 <div class="state2 style--two">
                       <p class="font-14 mb-1">Returning Visitors for: {{ now()->format('F') }}</p>
                       <h2>{{ $visitors[1]['sessions'] ?? ' ' }}</h2>
                 </div>
              </div>
              <!-- End Card -->
           </div>
           <div class="col-xl-6 col-md-3 col-sm-6">
              <!-- Card -->
              <div class="card mb-30">
                 <div class="state2 style--three">
                       <p class="font-14 mb-1"> Most Visited:  {{ strstr($pages['pageTitle'], '|', true) }}</p>
                       <h2>{{ $pages['pageViews'] }}</h2>
                 </div>
              </div>
              <!-- End Card -->
           </div>
           <div class="col-xl-6 col-md-3 col-sm-6">
              <!-- Card -->
              <div class="card mb-30">
                 <div class="state2 style--four">
                       <p class="font-14 mb-1">New Visitors for: {{ now()->format('F') }}</p>
                       <h2>{{ $visitors[0]['sessions'] }}</h2>
                 </div>
              </div>
              <!-- End Card -->
           </div>
        </div>
     </div>
</div>
<div class="row">

    <div class="col-xl-8 col-12">
        <!-- Card -->

        <div class="card mb-30">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        {!! $chart->container() !!}
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <x-browser-chart />
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- End Card -->
</div>
<div class="row">

    <div class="col-xl-8 col-12">
        <!-- Card -->

        <div class="card mb-30">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                    <div style="padding:63% 0 0 0; position:relative;"><iframe src="https://app.databox.com/datawall/fb4a55404ea669a3f443a3c0d3b848d8060d79551?i" style="position:absolute; top:0; left:0; width:100%; height:100%;" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe></div>

                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- End Card -->
</div>
{{ $chart->script() }}
@endsection
