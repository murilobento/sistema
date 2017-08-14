@extends('layouts.app')

@section('content')
<div class="be-content">
        <div class="main-content container-fluid">                
          <!--Basic forms-->
          <div class="row">
              <div class="col-xs-12 col-md-6 col-lg-3">
                        <div class="widget widget-tile">
                          <div id="spark1" class="chart sparkline"></div>
                          <div class="data-info">
                            <div class="desc">R$ em vendas no dia</div>
                            <div class="value"><span class="indicator "></span><span data-toggle="counter" data-end="12" class="number">0</span>
                            </div>
                          </div>
                        </div>
            </div>
            <div class="col-xs-12 col-md-6 col-lg-3">
                        <div class="widget widget-tile">
                          <div id="spark2" class="chart sparkline"></div>
                          <div class="data-info">
                            <div class="desc">New Users</div>
                            <div class="value"><span class="indicator indicator-equal mdi mdi-chevron-right"></span><span data-toggle="counter" data-end="113" class="number">0</span>
                            </div>
                          </div>
                        </div>
            </div>            
            <div class="col-xs-12 col-md-6 col-lg-3">
                        <div class="widget widget-tile">
                          <div id="spark3" class="chart sparkline"></div>
                          <div class="data-info">
                            <div class="desc">Impressions</div>
                            <div class="value"><span class="indicator indicator-positive mdi mdi-chevron-up"></span><span data-toggle="counter" data-end="532" class="number">0</span>
                            </div>
                          </div>
                        </div>
            </div>
            <div class="col-xs-12 col-md-6 col-lg-3">
                        <div class="widget widget-tile">
                          <div id="spark4" class="chart sparkline"></div>
                          <div class="data-info">
                            <div class="desc">Downloads</div>
                            <div class="value"><span class="indicator indicator-negative mdi mdi-chevron-down"></span><span data-toggle="counter" data-end="113" class="number">0</span>
                            </div>
                          </div>
                        </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12">
              <div class="panel panel-default panel-border-color panel-border-color-primary">
                <div class="panel-heading panel-heading-divider">Home<span class="panel-subtitle">Bem vindo ao sistema!</span></div>
                <div class="panel-body">

                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla suscipit rhoncus dolor eu ultricies. Suspendisse potenti. Quisque ut mi blandit, efficitur quam vitae, hendrerit nulla. Aliquam nibh mauris, fringilla id neque sit amet, elementum placerat magna. Maecenas a ante condimentum, pulvinar nisl non, commodo tellus. Aenean ultrices lacus a aliquet posuere. Vivamus sit amet convallis lectus, sit amet dapibus turpis. Mauris mauris erat, fermentum ac faucibus ut, consequat non augue. Aliquam tristique massa nibh. Pellentesque scelerisque, metus id accumsan bibendum, arcu nunc porttitor sapien, ut ullamcorper nulla nunc nec enim. Vestibulum eu tempus mi. Nulla pharetra ante non venenatis fermentum.</p>

                    <p>Aenean aliquam enim elementum interdum dictum. Quisque sit amet orci in quam commodo tempor. Quisque blandit dolor at blandit egestas. Interdum et malesuada fames ac ante ipsum primis in faucibus. Mauris sapien leo, placerat vulputate gravida sit amet, hendrerit eget libero. Donec imperdiet dui ut felis imperdiet consequat. Nam nec elementum ipsum, non malesuada metus. Phasellus mollis ante quis ullamcorper sodales. In in lacus at turpis consequat cursus. Maecenas scelerisque facilisis posuere. Fusce venenatis cursus libero, id efficitur enim vestibulum in. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Donec elit elit, faucibus ut porttitor non, rhoncus vitae purus. Cras at orci volutpat, accumsan libero a, tincidunt est.</p>

                    <p>Sed imperdiet vitae augue non ultrices. Nam tempor luctus tempus. Phasellus vel dolor eu felis aliquam fringilla a vel sapien. Cras nisl leo, hendrerit non pharetra ac, aliquam in nisi. Mauris gravida malesuada neque eleifend hendrerit. Nunc dictum nisi vitae erat imperdiet placerat vel nec tellus. Fusce vel sapien aliquam, feugiat tortor eget, dictum lectus. Vestibulum maximus mollis nisl sed pharetra. Praesent vestibulum sit amet tellus id laoreet. Duis eget nibh et quam fringilla condimentum. Nulla vitae pellentesque nulla.</p>
                  
                </div>
              </div>
            </div>            
          </div>
          <!--Basic Elements-->     
        </div>
      </div> 
@endsection
