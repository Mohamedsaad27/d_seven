@extends('layouts.dashboard.layout')

@section('content')
    
    <div class="row">
        <div class="col-12 mb-4">
            
        </div>
        <div class="col-12 col-sm-6 col-xl-4 mb-4">
            <div class="card border-0 shadow">
                <div class="card-body">
                    <div class="row d-block d-xl-flex align-items-center">
                        <div
                            class="col-12 col-xl-5 text-xl-center mb-3 mb-xl-0 d-flex align-items-center justify-content-xl-center">
                            <div class="icon-shape icon-shape-primary rounded me-4 me-sm-0">
                                <svg class="icon" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z">
                                    </path>
                                </svg>
                            </div>
                            <div class="d-sm-none">
                                <h2 class="h5">Category</h2>
                                <h3 class="fw-extrabold mb-1">100</h3>
                            </div>
                        </div>
                        <div class="col-12 col-xl-7 px-xl-0">
                            <div class="d-none d-sm-block">
                                <h2 class="h6 text-gray-400 mb-0">Schools</h2>
                                <h3 class="fw-extrabold mb-2">100</h3>
                            </div>
                            <small class="d-flex align-items-center text-gray-500">
                                2022-01-01 - 2022-12-31,
                                <svg class="icon icon-xxs text-gray-500 ms-2 me-1" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zM4.332 8.027a6.012 6.012 0 011.912-2.706C6.512 5.73 6.974 6 7.5 6A1.5 1.5 0 019 7.5V8a2 2 0 004 0 2 2 0 011.523-1.943A5.977 5.977 0 0116 10c0 .34-.028.675-.083 1H15a2 2 0 00-2 2v2.197A5.973 5.973 0 0110 16v-2a2 2 0 00-2-2 2 2 0 01-2-2 2 2 0 00-1.668-1.973z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                Egypt
                            </small>
                            <div class="small d-flex mt-1">
                                <div>Since last month <svg class="icon icon-xs text-success" fill="currentColor"
                                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z"
                                            clip-rule="evenodd"></path>
                                    </svg><span class="text-success fw-bolder">99%</span></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-xl-4 mb-4">
            <div class="card border-0 shadow">
                <div class="card-body">
                    <div class="row d-block d-xl-flex align-items-center">
                        <div
                            class="col-12 col-xl-5 text-xl-center mb-3 mb-xl-0 d-flex align-items-center justify-content-xl-center">
                            <div class="icon-shape icon-shape-secondary rounded me-4 me-sm-0">
                                <svg class="icon" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M10 2a4 4 0 00-4 4v1H5a1 1 0 00-.994.89l-1 9A1 1 0 004 18h12a1 1 0 00.994-.89l-1-9A1 1 0 0015 7h-1V6a4 4 0 00-4-4zm2 5V6a2 2 0 10-4 0v1h4zm-6 3a1 1 0 112 0 1 1 0 01-2 0zm7-1a1 1 0 100 2 1 1 0 000-2z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <div class="d-sm-none">
                                <h2 class="fw-extrabold h5">Organizations</h2>
                                <h3 class="mb-1">50</h3>
                            </div>
                        </div>
                        <div class="col-12 col-xl-7 px-xl-0">
                            <div class="d-none d-sm-block">
                                <h2 class="h6 text-gray-400 mb-0">Organizations</h2>
                                <h3 class="fw-extrabold mb-2">50</h3>
                            </div>
                            <small class="d-flex align-items-center text-gray-500">
                                2022-01-01 - 2022-12-31,
                                <svg class="icon icon-xxs text-gray-500 ms-2 me-1" fill="currentColor"
                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zM4.332 8.027a6.012 6.012 0 011.912-2.706C6.512 5.73 6.974 6 7.5 6A1.5 1.5 0 019 7.5V8a2 2 0 004 0 2 2 0 011.523-1.943A5.977 5.977 0 0116 10c0 .34-.028.675-.083 1H15a2 2 0 00-2 2v2.197A5.973 5.973 0 0110 16v-2a2 2 0 00-2-2 2 2 0 01-2-2 2 2 0 00-1.668-1.973z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                Egypt
                            </small>
                            <div class="small d-flex mt-1">
                                <div>Since last month <svg class="icon icon-xs text-danger" fill="currentColor"
                                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd"></path>
                                    </svg><span class="text-danger fw-bolder">49%</span></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-xl-4 mb-4">
            <div class="card border-0 shadow">
                <div class="card-body">
                    <div class="row d-block d-xl-flex align-items-center">
                        <div
                            class="col-12 col-xl-5 text-xl-center mb-3 mb-xl-0 d-flex align-items-center justify-content-xl-center">
                            <div class="icon-shape icon-shape-tertiary rounded me-4 me-sm-0">
                                <svg class="icon" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M3 3a1 1 0 000 2v8a2 2 0 002 2h2.586l-1.293 1.293a1 1 0 101.414 1.414L10 15.414l2.293 2.293a1 1 0 001.414-1.414L12.414 15H15a2 2 0 002-2V5a1 1 0 100-2H3zm11 4a1 1 0 10-2 0v4a1 1 0 102 0V7zm-3 1a1 1 0 10-2 0v3a1 1 0 102 0V8zM8 9a1 1 0 00-2 0v2a1 1 0 102 0V9z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <div class="d-sm-none">
                                <h2 class="fw-extrabold h5">Students</h2>
                                <h3 class="mb-1">25</h3>
                            </div>
                        </div>
                        <div class="col-12 col-xl-7 px-xl-0">
                            <div class="d-none d-sm-block">
                                <h2 class="h6 text-gray-400 mb-0">Students</h2>
                                <h3 class="fw-extrabold mb-2">25</h3>
                            </div>
                            <small class="text-gray-500">
                                2022-01-01 - 2022-12-31,
                                <svg class="icon icon-xxs text-success" fill="currentColor"
                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <span class="text-success fw-bolder">24%</span>
                            </small>
                            <div class="small d-flex mt-1">
                                <div>Since last month <svg class="icon icon-xs text-success" fill="currentColor"
                                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z"
                                            clip-rule="evenodd"></path>
                                    </svg><span class="text-success fw-bolder">23%</span></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-xl-8">
            <div class="row">
                <div class="col-12 mb-4">
                    <div class="card border-0 shadow">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h2 class="fs-5 fw-bold mb-0">Page visits</h2>
                                </div>
                                <div class="col text-end">
                                    <a href="#" class="btn btn-sm btn-primary">See all</a>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table align-items-center table-flush">
                                <thead class="thead-light">
                                    <tr>
                                        <th class="border-bottom" scope="col">Page name</th>
                                        <th class="border-bottom" scope="col">Page Views</th>
                                        <th class="border-bottom" scope="col">Page Value</th>
                                        <th class="border-bottom" scope="col">Bounce rate</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th class="text-gray-900" scope="row">
                                            /demo/admin/index.html
                                        </th>
                                        <td class="fw-bolder text-gray-500">
                                            3,225
                                        </td>
                                        <td class="fw-bolder text-gray-500">
                                            $20
                                        </td>
                                        <td class="fw-bolder text-gray-500">
                                            <div class="d-flex">
                                                <svg class="icon icon-xs text-danger me-2" fill="currentColor"
                                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M5.293 7.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 5.414V17a1 1 0 11-2 0V5.414L6.707 7.707a1 1 0 01-1.414 0z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                                42,55%
                                            </div>
                                        </td>
                                    </tr>
                                   
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-xxl-6 mb-4">
                    <div class="card border-0 shadow">
                        <div class="card-header border-bottom d-flex align-items-center justify-content-between">
                            <h2 class="fs-5 fw-bold mb-0">Team members</h2>
                            <a href="#" class="btn btn-sm btn-primary">See all</a>
                        </div>
                        <div class="card-body">
                            <ul class="list-group list-group-flush list my--3">
                                <li class="list-group-item px-0">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <!-- Avatar -->
                                            <a href="#" class="avatar">
                                                <img class="rounded" alt="Image placeholder"
                                                    src="../../assets/img/team/profile-picture-1.jpg">
                                            </a>
                                        </div>
                                        <div class="col-auto ms--2">
                                            <h4 class="h6 mb-0">
                                                <a href="#">Chris Wood</a>
                                            </h4>
                                            <div class="d-flex align-items-center">
                                                <div class="bg-success dot rounded-circle me-1"></div>
                                                <small>Online</small>
                                            </div>
                                        </div>
                                        <div class="col text-end">
                                            <a href="#"
                                                class="btn btn-sm btn-secondary d-inline-flex align-items-center">
                                                <svg class="icon icon-xxs me-2" fill="currentColor" viewBox="0 0 20 20"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                                Invite
                                            </a>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item px-0">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <!-- Avatar -->
                                            <a href="#" class="avatar">
                                                <img class="rounded" alt="Image placeholder"
                                                    src="../../assets/img/team/profile-picture-2.jpg">
                                            </a>
                                        </div>
                                        <div class="col-auto ms--2">
                                            <h4 class="h6 mb-0">
                                                <a href="#">Jose Leos</a>
                                            </h4>
                                            <div class="d-flex align-items-center">
                                                <div class="bg-warning dot rounded-circle me-1"></div>
                                                <small>In a meeting</small>
                                            </div>
                                        </div>
                                        <div class="col text-end">
                                            <a href="#"
                                                class="btn btn-sm btn-secondary d-inline-flex align-items-center">
                                                <svg class="icon icon-xxs me-2" fill="currentColor" viewBox="0 0 20 20"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                                Message
                                            </a>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item px-0">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <!-- Avatar -->
                                            <a href="#" class="avatar">
                                                <img class="rounded" alt="Image placeholder"
                                                    src="../../assets/img/team/profile-picture-3.jpg">
                                            </a>
                                        </div>
                                        <div class="col-auto ms--2">
                                            <h4 class="h6 mb-0">
                                                <a href="#">Bonnie Green</a>
                                            </h4>
                                            <div class="d-flex align-items-center">
                                                <div class="bg-danger dot rounded-circle me-1"></div>
                                                <small>Offline</small>
                                            </div>
                                        </div>
                                        <div class="col text-end">
                                            <a href="#"
                                                class="btn btn-sm btn-secondary d-inline-flex align-items-center">
                                                <svg class="icon icon-xxs me-2" fill="currentColor" viewBox="0 0 20 20"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                                Message
                                            </a>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item px-0">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <!-- Avatar -->
                                            <a href="#" class="avatar">
                                                <img class="rounded" alt="Image placeholder"
                                                    src="../../assets/img/team/profile-picture-4.jpg">
                                            </a>
                                        </div>
                                        <div class="col-auto ms--2">
                                            <h4 class="h6 mb-0">
                                                <a href="#">Neil Sims</a>
                                            </h4>
                                            <div class="d-flex align-items-center">
                                                <div class="bg-danger dot rounded-circle me-1"></div>
                                                <small>Offline</small>
                                            </div>
                                        </div>
                                        <div class="col text-end">
                                            <a href="#"
                                                class="btn btn-sm btn-secondary d-inline-flex align-items-center">
                                                <svg class="icon icon-xxs me-2" fill="currentColor" viewBox="0 0 20 20"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                                Message
                                            </a>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-xxl-6 mb-4">
                    <div class="card border-0 shadow">
                        <div class="card-header border-bottom d-flex align-items-center justify-content-between">
                            <h2 class="fs-5 fw-bold mb-0">Progress track</h2>
                            <a href="#" class="btn btn-sm btn-primary">See tasks</a>
                        </div>
                        <div class="card-body">
                            <!-- Project 1 -->
                            <div class="row mb-4">
                                <div class="col-auto">
                                    <svg class="icon icon-sm text-gray-500" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"></path>
                                        <path fill-rule="evenodd"
                                            d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <div class="col">
                                    <div class="progress-wrapper">
                                        <div class="progress-info">
                                            <div class="h6 mb-0">Rocket - SaaS Template</div>
                                            <div class="small fw-bold text-gray-500"><span>75 %</span></div>
                                        </div>
                                        <div class="progress mb-0">
                                            <div class="progress-bar bg-success" role="progressbar" aria-valuenow="75"
                                                aria-valuemin="0" aria-valuemax="100" style="width: 75%;"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-xl-4">
            <div class="col-12 px-0 mb-4">
                <div class="card border-0 shadow">
                    <div class="card-header d-flex flex-row align-items-center flex-0 border-bottom">
                        <div class="d-block">
                            <div class="h6 fw-normal text-gray mb-2">Total orders</div>
                            <h2 class="h3 fw-extrabold">452</h2>
                            <div class="small mt-2">
                                <span class="fas fa-angle-up text-success"></span>
                                <span class="text-success fw-bold">18.2%</span>
                            </div>
                        </div>
                        
                    </div>
                    <div class="card-body p-2">
                        <div class="ct-chart-ranking ct-golden-section ct-series-a"></div>
                    </div>
                </div>
            </div>
            <div class="col-12 px-0 mb-4">
               
            </div>
            <div class="col-12 px-0">
                <div class="card border-0 shadow">
                    <div class="card-body">
                        <h2 class="fs-5 fw-bold mb-1">Acquisition</h2>
                        <p>Tells you where your visitors originated from, such as search engines, social networks or
                            website referrals.</p>
                        <div class="d-block">
                            <div class="d-flex align-items-center me-5">
                                <div class="icon-shape icon-sm icon-shape-danger rounded me-3">
                                    <svg fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M3 3a1 1 0 000 2v8a2 2 0 002 2h2.586l-1.293 1.293a1 1 0 101.414 1.414L10 15.414l2.293 2.293a1 1 0 001.414-1.414L12.414 15H15a2 2 0 002-2V5a1 1 0 100-2H3zm11 4a1 1 0 10-2 0v4a1 1 0 102 0V7zm-3 1a1 1 0 10-2 0v3a1 1 0 102 0V8zM8 9a1 1 0 00-2 0v2a1 1 0 102 0V9z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <div class="d-block">
                                    <label class="mb-0">Bounce Rate</label>
                                    <h4 class="mb-0">33.50%</h4>
                                </div>
                            </div>
                         
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  

   
@endsection
