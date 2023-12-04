@extends('template.layout')

@section('content')
    <div class="d-flex flex-wrap justify-content-between">
        <div class="card mb-3 bg-success text-white overflow-hidden" style="width: 280px">
            <div class="d-flex align-items-stretch h-100">
                <div class="col-md-4 my-icon-index">
                    <div class="img-fluid rounded-start h-100 d-flex align-items-center justify-content-center">
                        <i class="bi bi-buildings my-icon"></i>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">Company</h5>
                        <span class="card-text">
                            Total company:
                        </span>
                        <span class="fs-3 d-block"><strong>{{ count($companys) }}</strong></span>
                        <p class="card-text">
                        <small>Status Partner</small>
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mb-3 bg-danger text-white overflow-hidden" style="width: 280px">
            <div class="d-flex align-items-stretch h-100">
                <div class="col-md-4 my-icon-index">
                    <div class="img-fluid rounded-start h-100 d-flex align-items-center justify-content-center">
                        <i class="bi bi-person-circle my-icon"></i>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">Employee</h5>
                        <span class="card-text">
                            Total employee:
                        </span>
                        <span class="fs-3 d-block"><strong>{{ count($employees) }}</strong></span>
                        <p class="card-text">
                        <small>Status Active</small>
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mb-3 bg-info text-white overflow-hidden" style="width: 280px">
            <div class="d-flex align-items-stretch h-100">
                <div class="col-md-4 my-icon-index">
                    <div class="img-fluid rounded-start h-100 d-flex align-items-center justify-content-center">
                        <i class="bi bi-thermometer-half my-icon"></i>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">Temperature</h5>
                        <span class="card-text">
                            Current temperature:
                        </span>
                        <span class="fs-3 d-block"><strong>30&#8451;</strong></span>
                        <p class="card-text">
                        <small>Status Active</small>
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mb-3 bg-warning text-white overflow-hidden" style="width: 280px">
            <div class="d-flex align-items-stretch h-100">
                <div class="col-md-4 my-icon-index">
                    <div class="img-fluid rounded-start h-100 d-flex align-items-center justify-content-center">
                        <i class="bi bi-brightness-high my-icon"></i>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">Weather</h5>
                        <span class="card-text">
                            Current weather:
                        </span>
                        <span class="fs-3 d-block"><strong>Sunny</strong></span>
                        <p class="card-text">
                        <small>Status Active</small>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <main class="d-block">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="h2">Chart</h1>
          <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
              <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
              <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
            </div>
            <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
              <span data-feather="calendar"></span>
              This week
            </button>
          </div>
        </div>
  
        <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas>
    </main>
@endsection