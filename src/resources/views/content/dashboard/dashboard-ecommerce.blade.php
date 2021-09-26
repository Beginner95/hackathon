
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
            <p class="card-text font-small-2">По данным которых проводится сверка</p>
          </div>
        </div>
        <div class="card-body">
          <div class="browser-states">
            <div class="d-flex">
              <img
                src="{{asset('images/logo/egiso.jpg')}}"
                class="rounded me-1"
                height="30" width="30"
                alt="egiso"
              />
              <h6 class="align-self-center mb-0">ЕГИСО</h6>
            </div>
          </div>
          <div class="browser-states">
            <div class="d-flex">
              <img
                src="{{asset('images/logo/fns.jpg')}}"
                class="rounded me-1"
                height="30" width="30"
                alt="fns"
              />
              <h6 class="align-self-center mb-0">ФНС</h6>
            </div>
          </div>
          <div class="browser-states">
            <div class="d-flex">
              <img
                src="{{asset('images/logo/fssp.png')}}"
                class="rounded me-1"
                height="30" width="30"
                alt="фссп"
              />
              <h6 class="align-self-center mb-0">ФССП</h6>
            </div>
          </div>
          <div class="browser-states">
            <div class="d-flex">
              <img
                src="{{asset('images/logo/mvd.png')}}"
                class="rounded me-1"
                height="30"
                width="30"
                alt="МВД"
              />
              <h6 class="align-self-center mb-0">МВД</h6>
            </div>
          </div>
          <div class="browser-states">
            <div class="d-flex">
              <img src="{{asset('images/logo/pfr.bmp')}}" class="rounded me-1" height="30" width="30" alt="PFR" />
              <h6 class="align-self-center mb-0">ПФР</h6>
            </div>
          </div>
            <div class="browser-states">
                <div class="d-flex">
                    <img src="{{asset('images/logo/zags.jpeg')}}" class="rounded me-1" height="30" width="30" alt="ЗАГС" />
                    <h6 class="align-self-center mb-0">ЗАГС</h6>
                </div>
            </div>
        </div>
      </div>
    </div>
    <!--/ Browser States Card -->
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
