@extends('layouts.master')
@section('title' , 'الصفحة الرئيسية')
@section('content')
@if ($errors->any())
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <h4 class="alert-heading text-center">Error!</h4>
    <hr>
    <ul class="list-unstyled mb-0">
        @foreach ($errors->all() as $error)
            <li class="text-danger">
                <i class="fas fa-exclamation-circle mr-2"></i>
                {{ $error }}
            </li>
        @endforeach
    </ul>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
    <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="col-12">
          <div class="row align-items-center mb-2">
            <div class="col">
              <h2 class="h5 page-title">Welcome!</h2>
            </div>
            <div class="col-auto">
              <form class="form-inline">
                <div class="form-group d-none d-lg-inline">
                  <label for="reportrange" class="sr-only">Date Ranges</label>
                  <div id="reportrange" class="px-2 py-2 text-muted">
                    <span class="small"></span>
                  </div>
                </div>
                <div class="form-group">
                  <button type="button" class="btn btn-sm"><span class="fe fe-refresh-ccw fe-16 text-muted"></span></button>
                  <button type="button" class="btn btn-sm mr-2"><span class="fe fe-filter fe-16 text-muted"></span></button>
                </div>
              </form>
            </div>
          </div>
          <!-- info small box -->
          <div class="row">
            <div class="col-md-4 mb-4">
              <div class="card shadow">
                <div class="card-body">
                  <div class="row align-items-center">
                    <div class="col">
                      <span class="h2 mb-0">35</span>
                      <p class="small text-muted mb-0" style="font-weight: bold;">حساب الشهر</p>
                    </div>
                    <div class="col-auto">
                      <span class="fe fe-32 fe-shopping-bag text-muted mb-0"></span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4 mb-4">
              <div class="card shadow">
                <div class="card-body">
                  <div class="row align-items-center">
                    <div class="col">
                      <span class="h2 mb-0">40</span>
                      <p class="small text-muted mb-0" style="font-weight: bold;"> عربونات الشهر</p>
                    </div>
                    <div class="col-auto">
                        <span class="fe fe-32 fe-clipboard text-muted mb-0"></span>
                      </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4 mb-4">
              <div class="card shadow">
                <div class="card-body">
                  <div class="row align-items-center">
                    <div class="col">
                      <span class="h2 mb-0">2</span>
                      <p class="small text-muted mb-0" style="font-weight: bold;">الفواتير</p>
                    </div>
                    <div class="col-auto">
                      <span class="fe fe-32 fe-shopping-cart text-muted mb-0"></span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div> <!-- end section -->

          <!-- widgets -->
          <div class="row">
            <div class="col-md-4 mb-4">
              <div class="card shadow">
                <div class="card-body">
                  <div class="row align-items-center">
                    <div class="col">
                      <small class="text-muted mb-1">حساب الاسبوع</small>
                      <h3 class="card-title mb-0">100</h3>
                      <p class="small text-muted mb-0"><span class="fe fe-arrow-up fe-12 text-success"></span><span>37.7% Last week</span></p>
                    </div>
                    <div class="col-4 text-right">
                      <span class="inlinebar"></span>
                    </div>
                  </div> <!-- /. row -->
                </div> <!-- /. card-body -->
              </div> <!-- /. card -->
            </div> <!-- /. col -->
            <div class="col-md-4 mb-4">
              <div class="card shadow">
                <div class="card-body">
                  <div class="row align-items-center">
                    <div class="col">
                      <small class="text-muted mb-1">عربونات الاسبوع</small>
                      <h3 class="card-title mb-0">30</h3>
                      <p class="small text-muted mb-0"><span class="fe fe-arrow-down fe-12 text-danger"></span><span>-18.9% Last week</span></p>
                    </div>
                    <div class="col-4 text-right">
                      <span class="inlineline"></span>
                    </div>
                  </div> <!-- /. row -->
                </div> <!-- /. card-body -->
              </div> <!-- /. card -->
            </div> <!-- /. col -->
            <div class="col-md-4 mb-4">
              <div class="card shadow">
                <div class="card-body">
                  <div class="row align-items-center">
                    <div class="col">
                      <small class="text-muted mb-1">Conversion</small>
                      <h3 class="card-title mb-0">68</h3>
                      <p class="small text-muted mb-0"><span class="fe fe-arrow-up fe-12 text-warning"></span><span>+1.9% Last week</span></p>
                    </div>
                    <div class="col-4 text-right">
                      <span class="inlinepie"></span>
                    </div>
                  </div> <!-- /. row -->
                </div> <!-- /. card-body -->
              </div> <!-- /. card -->
            </div> <!-- /. col -->
          </div> <!-- end section -->
          <div class="row">
            <div class="col-md-6 col-xl-3 mb-4">
              <div class="card shadow">
                <div class="card-header">
                  <span class="card-title">Today</span>
                  <a class="float-right small text-muted" href="#!"><i class="fe fe-more-vertical fe-12"></i></a>
                </div>
                <div class="card-body my-n2">
                  <div class="d-flex">
                    <div class="flex-fill">
                      <h4 class="mb-0">120</h4>
                    </div>
                    <div class="flex-fill text-right">
                      <p class="mb-0 small">+20%</p>
                      <p class="text-muted mb-0 small">last week</p>
                    </div>
                  </div>
                </div> <!-- .card-body -->
              </div> <!-- .card -->
            </div> <!-- .col -->
            <div class="col-md-6 col-xl-3 mb-4">
              <div class="card shadow mb-4">
                <div class="card-header">
                  <span class="card-title">Yesterday</span>
                  <a class="float-right small text-muted" href="#!"><span>+1.8%</span></a>
                </div>
                <div class="card-body my-n1">
                  <div class="d-flex">
                    <div class="flex-fill">
                      <h4 class="mb-0">2068</h4>
                    </div>
                    <div class="flex-fill text-right">
                      <span class="sparkline inlinebar"></p>
                    </div>
                  </div>
                </div> <!-- .card-body -->
              </div> <!-- .card -->
            </div> <!-- .col -->
            <div class="col-md-6 col-xl-3 mb-4">
              <div class="card shadow">
                <div class="card-body">
                  <div class="row align-items-center my-1">
                    <div class="col">
                      <h4 class="mb-0">15%</h4>
                      <p class="small text-muted mb-0">Cpu Usage</p>
                    </div>
                    <div class="col-5">
                      <div id="gauge1" class="gauge-container"></div>
                    </div>
                  </div>
                </div> <!-- .card-body -->
              </div> <!-- .card -->
            </div> <!-- .col -->
            <div class="col-md-6 col-xl-3 mb-4">
              <div class="card shadow">
                <div class="card-body">
                  <div class="row align-items-center my-1">
                    <div class="col">
                      <h4 class="mb-0">65%</h4>
                      <p class="small text-muted mb-0">Ram Usage</p>
                    </div>
                    <div class="col-5">
                      <div id="gauge2" class="gauge-container"></div>
                    </div>
                  </div>
                </div> <!-- .card-body -->
              </div> <!-- .card -->
            </div> <!-- .col -->
          </div>
          <!-- info small box -->
          <div class="row">
            <div class="col-md-4 mb-4">
              <div class="card shadow">
                <div class="card-body">
                  <div class="row align-items-center">
                    <div class="col">
                      <span class="h2 mb-0">40</span>
                      <p class="small text-muted mb-0" style="font-weight: bold;">حساب الشهر</p>
                    </div>
                    <div class="col-auto">
                      <span class="fe fe-32 fe-shopping-bag text-muted mb-0"></span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4 mb-4">
              <div class="card shadow">
                <div class="card-body">
                  <div class="row align-items-center">
                    <div class="col">
                      <span class="h2 mb-0">45</span>
                      <p class="small text-muted mb-0" style="font-weight: bold;"> عربونات الشهر</p>
                    </div>
                    <div class="col-auto">
                        <span class="fe fe-32 fe-clipboard text-muted mb-0"></span>
                      </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4 mb-4">
              <div class="card shadow">
                <div class="card-body">
                  <div class="row align-items-center">
                    <div class="col">
                      <span class="h2 mb-0">3</span>
                      <p class="small text-muted mb-0" style="font-weight: bold;">الفواتير</p>
                    </div>
                    <div class="col-auto">
                      <span class="fe fe-32 fe-shopping-cart text-muted mb-0"></span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div> <!-- end section -->

          {{-- <div class="mb-2 align-items-center">
            <div class="card shadow mb-4">
              <div class="card-body">
                <div class="row mt-1 align-items-center">
                  <div class="col-12 col-lg-4 text-left pl-4">
                    <p class="mb-1 small text-muted">Balance</p>
                    <span class="h3">$12,600</span>
                    <span class="small text-muted">+20%</span>
                    <span class="fe fe-arrow-up text-success fe-12"></span>
                    <p class="text-muted mt-2"> Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui </p>
                  </div>
                  <div class="col-6 col-lg-2 text-center py-4">
                    <p class="mb-1 small text-muted">Today</p>
                    <span class="h3">$2600</span><br />
                    <span class="small text-muted">+20%</span>
                    <span class="fe fe-arrow-up text-success fe-12"></span>
                  </div>
                  <div class="col-6 col-lg-2 text-center py-4 mb-2">
                    <p class="mb-1 small text-muted">Goal Value</p>
                    <span class="h3">$260</span><br />
                    <span class="small text-muted">+6%</span>
                    <span class="fe fe-arrow-up text-success fe-12"></span>
                  </div>
                  <div class="col-6 col-lg-2 text-center py-4">
                    <p class="mb-1 small text-muted">Completions</p>
                    <span class="h3">26</span><br />
                    <span class="small text-muted">+20%</span>
                    <span class="fe fe-arrow-up text-success fe-12"></span>
                  </div>
                  <div class="col-6 col-lg-2 text-center py-4">
                    <p class="mb-1 small text-muted">Conversion</p>
                    <span class="h3">6%</span><br />
                    <span class="small text-muted">-2%</span>
                    <span class="fe fe-arrow-down text-danger fe-12"></span>
                  </div>
                </div>
                <div class="chartbox mr-4">
                  <div id="areaChart"></div>
                </div>
              </div> <!-- .card-body -->
            </div> <!-- .card -->
          </div> --}}
          <div class="row items-align-baseline">
            <div class="col-md-12 col-lg-4">
              <div class="card shadow eq-card mb-4">
                <div class="card-body mb-n3">
                  <div class="row items-align-baseline h-100">
                    <div class="col-md-6 my-3">
                      <p class="mb-0"><strong class="mb-0 text-uppercase text-muted">Earning</strong></p>
                      <h3>$2,562</h3>
                      <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    </div>
                    <div class="col-md-6 my-4 text-center">
                      <div lass="chart-box mx-4">
                        <div id="radialbarWidget"></div>
                      </div>
                    </div>
                    <div class="col-md-6 border-top py-3">
                      <p class="mb-1"><strong class="text-muted">Cost</strong></p>
                      <h4 class="mb-0">108</h4>
                      <p class="small text-muted mb-0"><span>37.7% Last week</span></p>
                    </div> <!-- .col -->
                    <div class="col-md-6 border-top py-3">
                      <p class="mb-1"><strong class="text-muted">Revenue</strong></p>
                      <h4 class="mb-0">1168</h4>
                      <p class="small text-muted mb-0"><span>-18.9% Last week</span></p>
                    </div> <!-- .col -->
                  </div>
                </div> <!-- .card-body -->
              </div> <!-- .card -->
            </div> <!-- .col -->
            <div class="col-md-12 col-lg-4">
              <div class="card shadow eq-card mb-4">
                <div class="card-body">
                  <div class="chart-widget mb-2">
                    <div id="radialbar"></div>
                  </div>
                  <div class="row items-align-center">
                    <div class="col-4 text-center">
                      <p class="text-muted mb-1">Cost</p>
                      <h6 class="mb-1">$1,823</h6>
                      <p class="text-muted mb-0">+12%</p>
                    </div>
                    <div class="col-4 text-center">
                      <p class="text-muted mb-1">Revenue</p>
                      <h6 class="mb-1">$6,830</h6>
                      <p class="text-muted mb-0">+8%</p>
                    </div>
                    <div class="col-4 text-center">
                      <p class="text-muted mb-1">Earning</p>
                      <h6 class="mb-1">$4,830</h6>
                      <p class="text-muted mb-0">+8%</p>
                    </div>
                  </div>
                </div> <!-- .card-body -->
              </div> <!-- .card -->
            </div> <!-- .col -->
            <div class="col-md-12 col-lg-4">
              <div class="card shadow eq-card mb-4">
                <div class="card-body">
                  <div class="d-flex mt-3 mb-4">
                    <div class="flex-fill pt-2">
                      <p class="mb-0 text-muted">Total</p>
                      <h4 class="mb-0">108</h4>
                      <span class="small text-muted">+37.7%</span>
                    </div>
                    <div class="flex-fill chart-box mt-n2">
                      <div id="barChartWidget"></div>
                    </div>
                  </div> <!-- .d-flex -->
                  <div class="row border-top">
                    <div class="col-md-6 pt-4">
                      <h6 class="mb-0">108 <span class="small text-muted">+37.7%</span></h6>
                      <p class="mb-0 text-muted">Cost</p>
                    </div>
                    <div class="col-md-6 pt-4">
                      <h6 class="mb-0">1168 <span class="small text-muted">-18.9%</span></h6>
                      <p class="mb-0 text-muted">Revenue</p>
                    </div>
                  </div> <!-- .row -->
                </div> <!-- .card-body -->
              </div> <!-- .card -->
            </div> <!-- .col-md -->
          </div> <!-- .row -->
          <div class="row">
            <!-- Recent Activity -->
            <div class="col-md-12 col-lg-4 mb-4">
              <div class="card timeline shadow">
                <div class="card-header">
                  <strong class="card-title">Recent Activity</strong>
                  <a class="float-right small text-muted" href="#!">View all</a>
                </div>
                <div class="card-body" data-simplebar style="height:355px; overflow-y: auto; overflow-x: hidden;">
                  <h6 class="text-uppercase text-muted mb-4">Today</h6>
                  <div class="pb-3 timeline-item item-primary">
                    <div class="pl-5">
                      <div class="mb-1"><strong>@Brown Asher</strong><span class="text-muted small mx-2">Just create new layout Index, form, table</span><strong>Tiny Admin</strong></div>
                      <p class="small text-muted">Creative Design <span class="badge badge-light">1h ago</span>
                      </p>
                    </div>
                  </div>
                  <div class="pb-3 timeline-item item-warning">
                    <div class="pl-5">
                      <div class="mb-3"><strong>@Hester Nissim</strong><span class="text-muted small mx-2">has upload new files to</span><strong>Tiny Admin</strong></div>
                      <div class="row mb-3">
                        <div class="col"><img src="./assets/products/p1.jpg" alt="..." class="img-fluid rounded"></div>
                        <div class="col"><img src="./assets/products/p2.jpg" alt="..." class="img-fluid rounded"></div>
                        <div class="col"><img src="./assets/products/p3.jpg" alt="..." class="img-fluid rounded"></div>
                        <div class="col"><img src="./assets/products/p4.jpg" alt="..." class="img-fluid rounded"></div>
                      </div>
                      <p class="small text-muted">Front-End Development <span class="badge badge-light">1h ago</span>
                      </p>
                    </div>
                  </div>
                  <div class="pb-3 timeline-item item-success">
                    <div class="pl-5">
                      <div class="mb-3"><strong>@Kelley Sonya</strong><span class="text-muted small mx-2">has commented on</span><strong>Advanced table</strong></div>
                      <div class="card d-inline-flex mb-2">
                        <div class="card-body bg-light py-2 px-3 small rounded"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer dignissim nulla eu quam cursus placerat. Vivamus non odio ullamcorper, lacinia ante nec, blandit leo. </div>
                      </div>
                      <p class="small text-muted">Back-End Development <span class="badge badge-light">1h ago</span>
                      </p>
                    </div>
                  </div>
                  <h6 class="text-uppercase text-muted mb-4">Yesterday</h6>
                  <div class="pb-3 timeline-item item-warning">
                    <div class="pl-5">
                      <div class="mb-3"><strong>@Fletcher Everett</strong><span class="text-muted small mx-2">created new group for</span><strong>Tiny Admin</strong></div>
                      <ul class="avatars-list mb-3">
                        <li>
                          <a href="#!" class="avatar avatar-sm">
                            <img alt="..." class="avatar-img rounded-circle" src="./assets/avatars/face-1.jpg">
                          </a>
                        </li>
                        <li>
                          <a href="#!" class="avatar avatar-sm">
                            <img alt="..." class="avatar-img rounded-circle" src="./assets/avatars/face-4.jpg">
                          </a>
                        </li>
                        <li>
                          <a href="#!" class="avatar avatar-sm">
                            <img alt="..." class="avatar-img rounded-circle" src="./assets/avatars/face-3.jpg">
                          </a>
                        </li>
                      </ul>
                      <p class="small text-muted">Front-End Development <span class="badge badge-light">1h ago</span>
                      </p>
                    </div>
                  </div>
                  <div class="pb-3 timeline-item item-success">
                    <div class="pl-5">
                      <div class="mb-3"><strong>@Bertha Ball</strong><span class="text-muted small mx-2">has commented on</span><strong>Advanced table</strong></div>
                      <div class="card d-inline-flex mb-2">
                        <div class="card-body bg-light py-2 px-3"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer dignissim nulla eu quam cursus placerat. Vivamus non odio ullamcorper, lacinia ante nec, blandit leo. </div>
                      </div>
                      <p class="small text-muted">Back-End Development <span class="badge badge-light">1h ago</span>
                      </p>
                    </div>
                  </div>
                  <div class="pb-3 timeline-item item-danger">
                    <div class="pl-5">
                      <div class="mb-3"><strong>@Lillith Joseph</strong><span class="text-muted small mx-2">has upload new files to</span><strong>Tiny Admin</strong></div>
                      <div class="row mb-3">
                        <div class="col"><img src="./assets/products/p4.jpg" alt="..." class="img-fluid rounded"></div>
                        <div class="col"><img src="./assets/products/p1.jpg" alt="..." class="img-fluid rounded"></div>
                        <div class="col"><img src="./assets/products/p2.jpg" alt="..." class="img-fluid rounded"></div>
                      </div>
                      <p class="small text-muted">Front-End Development <span class="badge badge-light">1h ago</span>
                      </p>
                    </div>
                  </div>
                </div> <!-- / .card-body -->
              </div> <!-- / .card -->
            </div> <!-- / .col-md-6 -->
            <!-- Striped rows -->
            <div class="col-md-12 col-lg-8">
              <div class="card shadow">
                <div class="card-header">
                  <strong class="card-title">Recent Data</strong>
                  <a class="float-right small text-muted" href="#!">View all</a>
                </div>
                <div class="card-body my-n2">
                  <table class="table table-striped table-hover table-borderless">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Date</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>2474</td>
                        <th scope="col">Brown, Asher D.</th>
                        <td>Ap #331-7123 Lobortis Avenue</td>
                        <td>13/09/2020</td>
                        <td>
                          <div class="dropdown">
                            <button class="btn btn-sm dropdown-toggle more-vertical" type="button" id="dr1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <span class="text-muted sr-only">Action</span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dr1">
                              <a class="dropdown-item" href="#">Edit</a>
                              <a class="dropdown-item" href="#">Remove</a>
                              <a class="dropdown-item" href="#">Assign</a>
                            </div>
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td>2786</td>
                        <th scope="col">Leblanc, Yoshio V.</th>
                        <td>287-8300 Nisl. St.</td>
                        <td>04/05/2019</td>
                        <td>
                          <div class="dropdown">
                            <button class="btn btn-sm dropdown-toggle more-vertical" type="button" id="dr2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <span class="text-muted sr-only">Action</span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dr2">
                              <a class="dropdown-item" href="#">Edit</a>
                              <a class="dropdown-item" href="#">Remove</a>
                              <a class="dropdown-item" href="#">Assign</a>
                            </div>
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td>2747</td>
                        <th scope="col">Hester, Nissim L.</th>
                        <td>4577 Cras St.</td>
                        <td>04/06/2019</td>
                        <td>
                          <div class="dropdown">
                            <button class="btn btn-sm dropdown-toggle more-vertical" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <span class="text-muted sr-only">Action</span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right">
                              <a class="dropdown-item" href="#">Edit</a>
                              <a class="dropdown-item" href="#">Remove</a>
                              <a class="dropdown-item" href="#">Assign</a>
                            </div>
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td>2639</td>
                        <th scope="col">Gardner, Leigh S.</th>
                        <td>P.O. Box 228, 7512 Lectus Ave</td>
                        <td>04/08/2019</td>
                        <td>
                          <div class="dropdown">
                            <button class="btn btn-sm dropdown-toggle more-vertical" type="button" id="dr4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <span class="text-muted sr-only">Action</span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dr4">
                              <a class="dropdown-item" href="#">Edit</a>
                              <a class="dropdown-item" href="#">Remove</a>
                              <a class="dropdown-item" href="#">Assign</a>
                            </div>
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td>2238</td>
                        <th scope="col">Higgins, Uriah L.</th>
                        <td>Ap #377-5357 Sed Road</td>
                        <td>04/01/2019</td>
                        <td>
                          <div class="dropdown">
                            <button class="btn btn-sm dropdown-toggle more-vertical" type="button" id="dr5" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <span class="text-muted sr-only">Action</span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dr5">
                              <a class="dropdown-item" href="#">Edit</a>
                              <a class="dropdown-item" href="#">Remove</a>
                              <a class="dropdown-item" href="#">Assign</a>
                            </div>
                          </div>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div> <!-- Striped rows -->
          </div> <!-- .row-->
        </div> <!-- .col-12 -->
      </div> <!-- .row -->
    </div> <!-- .container-fluid -->
@endsection
@section('script')
<script src="/js/jquery.min.js"></script>
<script src="/js/popper.min.js"></script>
<script src="/js/moment.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="/js/simplebar.min.js"></script>
<script src='/js/daterangepicker.js'></script>
<script src='/js/jquery.stickOnScroll.js'></script>
<script src="/js/tinycolor-min.js"></script>
<script src="/js/config.js"></script>
<script src="/js/d3.min.js"></script>
<script src="/js/topojson.min.js"></script>
<script src="/js/datamaps.all.min.js"></script>
<script src="/js/datamaps-zoomto.js"></script>
<script src="/js/datamaps.custom.js"></script>
<script src="/js/Chart.min.js"></script>
<script>
  /* defind global options */
  Chart.defaults.global.defaultFontFamily = base.defaultFontFamily;
  Chart.defaults.global.defaultFontColor = colors.mutedColor;
</script>
<script src="/js/gauge.min.js"></script>
<script src="/js/jquery.sparkline.min.js"></script>
<script src="/js/apexcharts.min.js"></script>
<script src="/js/apexcharts.custom.js"></script>
<script src='/js/jquery.mask.min.js'></script>
<script src='/js/select2.min.js'></script>
<script src='/js/jquery.steps.min.js'></script>
<script src='/js/jquery.validate.min.js'></script>
<script src='/js/jquery.timepicker.js'></script>
<script src='/js/dropzone.min.js'></script>
<script src='/js/uppy.min.js'></script>
<script src='/js/quill.min.js'></script>
<script>
  $('.select2').select2(
  {
    theme: 'bootstrap4',
  });
  $('.select2-multi').select2(
  {
    multiple: true,
    theme: 'bootstrap4',
  });
  $('.drgpicker').daterangepicker(
  {
    singleDatePicker: true,
    timePicker: false,
    showDropdowns: true,
    locale:
    {
      format: 'MM/DD/YYYY'
    }
  });
  $('.time-input').timepicker(
  {
    'scrollDefault': 'now',
    'zindex': '9999' /* fix modal open */
  });
  /** date range picker */
  if ($('.datetimes').length)
  {
    $('.datetimes').daterangepicker(
    {
      timePicker: true,
      startDate: moment().startOf('hour'),
      endDate: moment().startOf('hour').add(32, 'hour'),
      locale:
      {
        format: 'M/DD hh:mm A'
      }
    });
  }
  var start = moment().subtract(29, 'days');
  var end = moment();

  function cb(start, end)
  {
    $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
  }
  $('#reportrange').daterangepicker(
  {
    startDate: start,
    endDate: end,
    ranges:
    {
      'Today': [moment(), moment()],
      'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
      'Last 7 Days': [moment().subtract(6, 'days'), moment()],
      'Last 30 Days': [moment().subtract(29, 'days'), moment()],
      'This Month': [moment().startOf('month'), moment().endOf('month')],
      'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
    }
  }, cb);
  cb(start, end);
  $('.input-placeholder').mask("00/00/0000",
  {
    placeholder: "__/__/____"
  });
  $('.input-zip').mask('00000-000',
  {
    placeholder: "____-___"
  });
  $('.input-money').mask("#.##0,00",
  {
    reverse: true
  });
  $('.input-phoneus').mask('(000) 000-0000');
  $('.input-mixed').mask('AAA 000-S0S');
  $('.input-ip').mask('0ZZ.0ZZ.0ZZ.0ZZ',
  {
    translation:
    {
      'Z':
      {
        pattern: /[0-9]/,
        optional: true
      }
    },
    placeholder: "___.___.___.___"
  });
  // editor
  var editor = document.getElementById('editor');
  if (editor)
  {
    var toolbarOptions = [
      [
      {
        'font': []
      }],
      [
      {
        'header': [1, 2, 3, 4, 5, 6, false]
      }],
      ['bold', 'italic', 'underline', 'strike'],
      ['blockquote', 'code-block'],
      [
      {
        'header': 1
      },
      {
        'header': 2
      }],
      [
      {
        'list': 'ordered'
      },
      {
        'list': 'bullet'
      }],
      [
      {
        'script': 'sub'
      },
      {
        'script': 'super'
      }],
      [
      {
        'indent': '-1'
      },
      {
        'indent': '+1'
      }], // outdent/indent
      [
      {
        'direction': 'rtl'
      }], // text direction
      [
      {
        'color': []
      },
      {
        'background': []
      }], // dropdown with defaults from theme
      [
      {
        'align': []
      }],
      ['clean'] // remove formatting button
    ];
    var quill = new Quill(editor,
    {
      modules:
      {
        toolbar: toolbarOptions
      },
      theme: 'snow'
    });
  }
  // Example starter JavaScript for disabling form submissions if there are invalid fields
  (function()
  {
    'use strict';
    window.addEventListener('load', function()
    {
      // Fetch all the forms we want to apply custom Bootstrap validation styles to
      var forms = document.getElementsByClassName('needs-validation');
      // Loop over them and prevent submission
      var validation = Array.prototype.filter.call(forms, function(form)
      {
        form.addEventListener('submit', function(event)
        {
          if (form.checkValidity() === false)
          {
            event.preventDefault();
            event.stopPropagation();
          }
          form.classList.add('was-validated');
        }, false);
      });
    }, false);
  })();
</script>
<script>
  var uptarg = document.getElementById('drag-drop-area');
  if (uptarg)
  {
    var uppy = Uppy.Core().use(Uppy.Dashboard,
    {
      inline: true,
      target: uptarg,
      proudlyDisplayPoweredByUppy: false,
      theme: 'dark',
      width: 770,
      height: 210,
      plugins: ['Webcam']
    }).use(Uppy.Tus,
    {
      endpoint: 'https://master.tus.io/files/'
    });
    uppy.on('complete', (result) =>
    {
      console.log('Upload complete! We’ve uploaded these files:', result.successful)
    });
  }
</script>
<script src="/js/apps.js"></script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-56159088-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];

  function gtag()
  {
    dataLayer.push(arguments);
  }
  gtag('js', new Date());
  gtag('config', 'UA-56159088-1');
</script>
@endsection
