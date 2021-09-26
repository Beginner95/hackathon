
@extends('layouts/contentLayoutMaster')

@section('title', 'Общие показатели')

@section('vendor-style')
  {{-- vendor css files --}}
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/charts/apexcharts.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/extensions/toastr.min.css')) }}">
@endsection
@section('page-style')
  {{-- Page css files --}}
  <link rel="stylesheet" href="{{ asset(mix('css/base/pages/dashboard-ecommerce.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/charts/chart-apex.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/extensions/ext-component-toastr.css')) }}">
@endsection

@section('content')
<!-- Dashboard Ecommerce Starts -->
<section id="dashboard-ecommerce">
  <div class="row match-height">


    <!-- Statistics Card -->
    <div class="col-xl-12 col-md-10 col-12">
      <div class="card card-statistics">
        <div class="card-header">
          <h4 class="card-title">Данные в системе</h4>
          <div class="d-flex align-items-center">
            <p class="card-text font-small-2 me-25 mb-0">Дата последнего обновления 3 часа назад</p>
          </div>
        </div>
        <div class="card-body statistics-body">
          <div class="row">
            <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
              <div class="d-flex flex-row">
                <div class="avatar bg-light-primary me-2">
                  <div class="avatar-content">
                    <i data-feather="trending-up" class="avatar-icon"></i>
                  </div>
                </div>
                <div class="my-auto">
                  <h4 class="fw-bolder mb-0">{{ $sonkos->count() }}</h4>
                  <p class="card-text font-small-3 mb-0"><a href="{{ route('sonko.index') }}">СОНКО</a></p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
              <div class="d-flex flex-row">
                <div class="avatar bg-light-info me-2">
                  <div class="avatar-content">
                    <i data-feather="user" class="avatar-icon"></i>
                  </div>
                </div>
                <div class="my-auto">
                  <h4 class="fw-bolder mb-0">{{ $users_count }}</h4>
                  <p class="card-text font-small-3 mb-0">Пользователей в системе</p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-sm-0">
              <div class="d-flex flex-row">
                <div class="avatar bg-light-danger me-2">
                  <div class="avatar-content">
                    <i data-feather="box" class="avatar-icon"></i>
                  </div>
                </div>
                <div class="my-auto">
                  <h4 class="fw-bolder mb-0">{{ $destitutes_count }}</h4>
                    <p class="card-text font-small-3 mb-0"><a href="{{ route('destitute.index') }}">Нуждающихся семей</a></p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12">
              <div class="d-flex flex-row">
                <div class="avatar bg-light-success me-2">
                  <div class="avatar-content">
                    <i data-feather="dollar-sign" class="avatar-icon"></i>
                  </div>
                </div>
                <div class="my-auto">
                  <h4 class="fw-bolder mb-0">377 000 Р.</h4>
                  <p class="card-text font-small-3 mb-0">Последний рассход</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--/ Statistics Card -->
  </div>

  <div class="row match-height">
    <!-- Revenue Report Card -->
    <div class="col-lg-12 col-12">
      <div class="card card-revenue-budget">
        <div class="row mx-0">
          <div class="col-md-8 col-12 revenue-report-wrapper">
            <div class="d-sm-flex justify-content-between align-items-center mb-3">
              <h4 class="card-title mb-50 mb-sm-0">Статистика нуждающихся</h4>
              <div class="d-flex align-items-center">
                <div class="d-flex align-items-center me-2">
                  <span class="bullet bullet-primary font-small-3 me-50 cursor-pointer"></span>
                  <span>Обратилось в СОНКО</span>
                </div>
                <div class="d-flex align-items-center ms-75">
                  <span class="bullet bullet-warning font-small-3 me-50 cursor-pointer"></span>
                  <span>Были удаления из списа СОНКО</span>
                </div>
              </div>
            </div>
            <div id="revenue-report-chart"></div>
          </div>
          <div class="col-md-4 col-12 budget-wrapper">
            <div class="btn-group">
              <button
                type="button"
                class="btn btn-outline-primary btn-sm dropdown-toggle budget-dropdown"
                data-bs-toggle="dropdown"
                aria-haspopup="true"
                aria-expanded="false"
              >
                2021
              </button>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="#">2020</a>
                <a class="dropdown-item" href="#">2019</a>
                <a class="dropdown-item" href="#">2018</a>
              </div>
            </div>
            <h2 class="mb-25">92,324 Р.</h2>
            <div class="d-flex justify-content-center">
              <span class="fw-bolder me-25">Ощий рассход:</span>
              <span>25,855,800</span>
            </div>
            <div id="budget-chart"></div>
          </div>
        </div>
      </div>
    </div>
    <!--/ Revenue Report Card -->
  </div>

  <div class="row match-height">
    <!-- Company Table Card -->
    <div class="col-lg-8 col-12">
      <div class="card card-company-table">
        <div class="card-body p-0">
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th>СОНКО</th>
                  <th>ТЕЛЕФОН</th>
                  <th>КОЛ-ВО РАБОТНИКОВ</th>
                  <th>КОЛ-ВО СЕМЕЙ В УЧЕТЕ</th>
                  <th>ДИНАМИКА</th>
                </tr>
              </thead>
              <tbody>
              @foreach ($sonkos as $sonko)
                <tr>
                  <td>
                    <div class="d-flex align-items-center">
                      <div>
                        <div class="fw-bolder">{{ $sonko->title }}</div>
                        <div class="font-small-2 text-muted">{{ $sonko->email }}</div>
                      </div>
                    </div>
                  </td>
                  <td>
                    <div class="d-flex align-items-center">
                      <div class="avatar bg-light-primary me-1">
                        <div class="avatar-content">
                          <i data-feather="monitor" class="font-medium-3"></i>
                        </div>
                      </div>
                      <span>{{ $sonko->phone }}</span>
                    </div>
                  </td>
                  <td class="text-nowrap">
                    <div class="d-flex flex-column">
                      <span class="fw-bolder mb-25">{{ $sonko->workers }}</span>
                    </div>
                  </td>
                  <td>{{ $sonko->destitutes->count() }}</td>
                  <td>
                    <div class="d-flex align-items-center">
                      <span class="fw-bolder me-1">68%</span>
                      <i data-feather="trending-down" class="text-danger font-medium-1"></i>
                    </div>
                  </td>
                </tr>
              @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <!--/ Company Table Card -->

    <!-- Browser States Card -->
    <div class="col-lg-4 col-md-6 col-12">
      <div class="card card-browser-states">
        <div class="card-header">
          <div>
            <h4 class="card-title">Гос органы</h4>
            <p class="card-text font-small-2">Counter August 2020</p>
          </div>
          <div class="dropdown chart-dropdown">
            <i data-feather="more-vertical" class="font-medium-3 cursor-pointer" data-bs-toggle="dropdown"></i>
            <div class="dropdown-menu dropdown-menu-end">
              <a class="dropdown-item" href="#">Last 28 Days</a>
              <a class="dropdown-item" href="#">Last Month</a>
              <a class="dropdown-item" href="#">Last Year</a>
            </div>
          </div>
        </div>
        <div class="card-body">
          <div class="browser-states">
            <div class="d-flex">
              <img
                src="{{asset('images/icons/google-chrome.png')}}"
                class="rounded me-1"
                height="30"
                alt="Google Chrome"
              />
              <h6 class="align-self-center mb-0">Google Chrome</h6>
            </div>
            <div class="d-flex align-items-center">
              <div class="fw-bold text-body-heading me-1">54.4%</div>
              <div id="browser-state-chart-primary"></div>
            </div>
          </div>
          <div class="browser-states">
            <div class="d-flex">
              <img
                src="{{asset('images/icons/mozila-firefox.png')}}"
                class="rounded me-1"
                height="30"
                alt="Mozila Firefox"
              />
              <h6 class="align-self-center mb-0">Mozila Firefox</h6>
            </div>
            <div class="d-flex align-items-center">
              <div class="fw-bold text-body-heading me-1">6.1%</div>
              <div id="browser-state-chart-warning"></div>
            </div>
          </div>
          <div class="browser-states">
            <div class="d-flex">
              <img
                src="{{asset('images/icons/apple-safari.png')}}"
                class="rounded me-1"
                height="30"
                alt="Apple Safari"
              />
              <h6 class="align-self-center mb-0">Apple Safari</h6>
            </div>
            <div class="d-flex align-items-center">
              <div class="fw-bold text-body-heading me-1">14.6%</div>
              <div id="browser-state-chart-secondary"></div>
            </div>
          </div>
          <div class="browser-states">
            <div class="d-flex">
              <img
                src="{{asset('images/icons/internet-explorer.png')}}"
                class="rounded me-1"
                height="30"
                alt="Internet Explorer"
              />
              <h6 class="align-self-center mb-0">Internet Explorer</h6>
            </div>
            <div class="d-flex align-items-center">
              <div class="fw-bold text-body-heading me-1">4.2%</div>
              <div id="browser-state-chart-info"></div>
            </div>
          </div>
          <div class="browser-states">
            <div class="d-flex">
              <img src="{{asset('images/icons/opera.png')}}" class="rounded me-1" height="30" alt="Opera Mini" />
              <h6 class="align-self-center mb-0">Opera Mini</h6>
            </div>
            <div class="d-flex align-items-center">
              <div class="fw-bold text-body-heading me-1">8.4%</div>
              <div id="browser-state-chart-danger"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--/ Browser States Card -->

    <!-- Goal Overview Card -->
    <div class="col-lg-4 col-md-6 col-12">
      <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h4 class="card-title">Goal Overview</h4>
          <i data-feather="help-circle" class="font-medium-3 text-muted cursor-pointer"></i>
        </div>
        <div class="card-body p-0">
          <div id="goal-overview-radial-bar-chart" class="my-2"></div>
          <div class="row border-top text-center mx-0">
            <div class="col-6 border-end py-1">
              <p class="card-text text-muted mb-0">Completed</p>
              <h3 class="fw-bolder mb-0">786,617</h3>
            </div>
            <div class="col-6 py-1">
              <p class="card-text text-muted mb-0">In Progress</p>
              <h3 class="fw-bolder mb-0">13,561</h3>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--/ Goal Overview Card -->

    <!-- Transaction Card -->
    <div class="col-lg-4 col-md-6 col-12">
      <div class="card card-transaction">
        <div class="card-header">
          <h4 class="card-title">Transactions</h4>
          <div class="dropdown chart-dropdown">
            <i data-feather="more-vertical" class="font-medium-3 cursor-pointer" data-bs-toggle="dropdown"></i>
            <div class="dropdown-menu dropdown-menu-end">
              <a class="dropdown-item" href="#">Last 28 Days</a>
              <a class="dropdown-item" href="#">Last Month</a>
              <a class="dropdown-item" href="#">Last Year</a>
            </div>
          </div>
        </div>
        <div class="card-body">
          <div class="transaction-item">
            <div class="d-flex">
              <div class="avatar bg-light-primary rounded float-start">
                <div class="avatar-content">
                  <i data-feather="pocket" class="avatar-icon font-medium-3"></i>
                </div>
              </div>
              <div class="transaction-percentage">
                <h6 class="transaction-title">Wallet</h6>
                <small>Starbucks</small>
              </div>
            </div>
            <div class="fw-bolder text-danger">- $74</div>
          </div>
          <div class="transaction-item">
            <div class="d-flex">
              <div class="avatar bg-light-success rounded float-start">
                <div class="avatar-content">
                  <i data-feather="check" class="avatar-icon font-medium-3"></i>
                </div>
              </div>
              <div class="transaction-percentage">
                <h6 class="transaction-title">Bank Transfer</h6>
                <small>Add Money</small>
              </div>
            </div>
            <div class="fw-bolder text-success">+ $480</div>
          </div>
          <div class="transaction-item">
            <div class="d-flex">
              <div class="avatar bg-light-danger rounded float-start">
                <div class="avatar-content">
                  <i data-feather="dollar-sign" class="avatar-icon font-medium-3"></i>
                </div>
              </div>
              <div class="transaction-percentage">
                <h6 class="transaction-title">Paypal</h6>
                <small>Add Money</small>
              </div>
            </div>
            <div class="fw-bolder text-success">+ $590</div>
          </div>
          <div class="transaction-item">
            <div class="d-flex">
              <div class="avatar bg-light-warning rounded float-start">
                <div class="avatar-content">
                  <i data-feather="credit-card" class="avatar-icon font-medium-3"></i>
                </div>
              </div>
              <div class="transaction-percentage">
                <h6 class="transaction-title">Mastercard</h6>
                <small>Ordered Food</small>
              </div>
            </div>
            <div class="fw-bolder text-danger">- $23</div>
          </div>
          <div class="transaction-item">
            <div class="d-flex">
              <div class="avatar bg-light-info rounded float-start">
                <div class="avatar-content">
                  <i data-feather="trending-up" class="avatar-icon font-medium-3"></i>
                </div>
              </div>
              <div class="transaction-percentage">
                <h6 class="transaction-title">Transfer</h6>
                <small>Refund</small>
              </div>
            </div>
            <div class="fw-bolder text-success">+ $98</div>
          </div>
        </div>
      </div>
    </div>
    <!--/ Transaction Card -->
  </div>
</section>
<!-- Dashboard Ecommerce ends -->
@endsection

@section('vendor-script')
  {{-- vendor files --}}
  <script src="{{ asset(mix('vendors/js/charts/apexcharts.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/extensions/toastr.min.js')) }}"></script>
@endsection
@section('page-script')
  {{-- Page js files --}}
  <script src="{{ asset(mix('js/scripts/pages/dashboard-ecommerce.js')) }}"></script>
@endsection
