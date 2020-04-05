@extends('layouts.Admin')

@section('content_Admin')
    <!---Cards-->
    <section>
        <header class="container-fluid">
            <div class="col-xl-10 col-lg-9 col-md-8 ml-auto row pt-md-5 mt-2 text-dark">
                <h2 class="">Status</h2>
            </div>
        </header>

        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
                    <div class="row pt-md-5 mt-md-3 mb-1">

                        <!---Card 1 BEGIN-->
                        <div class="col-xl-3 col-sm-6 p-2">
                            <div class="card card-common">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <i class="fas fa-shopping-cart fa-3x text-info"></i>
                                        <div class="text-right text-dark">
                                            <h3 class='h5'>Sales</h3>
                                            <h3>$10,000.00</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer text-dark">
                                    <i class="fas fa-spinner fa-pulse text-info mr-3"></i>
                                    <span>Updating</span>
                                </div>
                            </div>
                        </div>
                        <!---Card 1 END-->


                        <!---Card 2 BEGIN-->
                        <div class="col-xl-3 col-sm-6 p-2">
                            <div class="card card-common">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <i class="fas fa-money-bill-alt fa-3x text-success"></i>
                                        <div class="text-right text-dark">
                                            <h3 class='h5'>Expenses</h3>
                                            <h3>$6000.00</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer text-dark">
                                    <i class="fas fa-spinner fa-pulse text-success mr-3"></i>
                                    <span>Updating</span>
                                </div>
                            </div>
                        </div>
                        <!---Card 2 END-->


                        <!---Card 3 BEGIN-->
                        <div class="col-xl-3 col-sm-6 p-2">
                            <div class="card card-common">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <i class="fas fa-users fa-3x text-warning"></i>
                                        <div class="text-right text-dark">
                                            <h3 class='h5'>Users</h3>
                                            <h3>3,000.00</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer text-dark">
                                    <i class="fas fa-spinner fa-pulse text-warning mr-3"></i>
                                    <span>Updating</span>
                                </div>
                            </div>
                        </div>
                        <!---Card 3 END-->


                        <!---Card 4 BEGIN-->
                        <div class="col-xl-3 col-sm-6 p-2">
                            <div class="card card-common">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <i class="fas fa-chart-line fa-3x text-danger"></i>
                                        <div class="text-right text-dark">
                                            <h3 class='h5'>Visitors</h3>
                                            <h3>2,000.00</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer text-dark">
                                    <i class="fas fa-spinner fa-pulse text-danger mr-3"></i>
                                    <span>Updating</span>
                                </div>
                            </div>
                        </div>
                        <!---Card 4 END-->

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!---End of Cards-->


    <!--tables-->
    <section class='mt-5'>

        <header class="container-fluid">
            <div class="col-xl-10 col-lg-9 col-md-8 ml-auto row align-items-center">
                <h2>Relatórios</h2>
            </div>
        </header>

        <div class="container-fluid mt-5">
            <div class="row mb-5">
                <div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
                    <div class="row align-items-center">

                        <!---Table 1 BEGIN-->
                        <div class="col-xl-6 col-12 mb-4 mb-xl-0">
                            <h3 class="text-dark text-center mb-3"> Staff Salary </h3>
                            <table class="table table-striped bg-light text-center">
                                <thead>
                                    <tr class="text-dark">
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Salary</th>
                                        <th>Date</th>
                                        <th>Contact</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr>
                                        <th>1</th>
                                        <td>Jade</td>
                                        <td>$6000</td>
                                        <td>10-09-2019</td>
                                        <td><button type="button" class="btn btn-danger btn-sm">Message</button></td>
                                    </tr>

                                    <tr>
                                        <th>2</th>
                                        <td>Jane</td>
                                        <td>$5000</td>
                                        <td>10-09-2019</td>
                                        <td><button type="button" class="btn btn-danger btn-sm">Message</button></td>
                                    </tr>

                                    <tr>
                                        <th>3</th>
                                        <td>Elon</td>
                                        <td>$7000</td>
                                        <td>10-09-2019</td>
                                        <td><button type="button" class="btn btn-danger btn-sm">Message</button></td>
                                    </tr>

                                    <tr>
                                        <th>4</th>
                                        <td>Dave</td>
                                        <td>$9000</td>
                                        <td>10-09-2019</td>
                                        <td><button type="button" class="btn btn-danger btn-sm">Message</button></td>
                                    </tr>
                                </tbody>
                            </table>

                            <!---Pagination-->
                            <nav class="color">
                                <ul class="pagination justify-content-center">

                                    <li class="page-item">
                                        <a href="#" class="page-link py-2 px-3">
                                            <span>&laquo;</span>
                                        </a>
                                    </li>

                                    <li class="page-item active">
                                        <a href="#" class="page-link py-2 px-3">
                                            1
                                        </a>
                                    </li>

                                    <li class="page-item">
                                        <a href="#" class="page-link py-2 px-3">
                                            2
                                        </a>
                                    </li>

                                    <li class="page-item">
                                        <a href="#" class="page-link py-2 px-3">
                                            3
                                        </a>
                                    </li>

                                    <li class="page-item">
                                        <a href="#" class="page-link py-2 px-3">
                                            <span>&raquo;</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                            <!---End of Pagination-->
                        </div>
                        <!---Table 1 END-->


                        <!---Table 2 BEGIN-->
                        <div class="col-xl-6 col-12">
                            <h3 class="text-dark text-center mb-3">Recent Payments</h3>
                            <table class="table table-color  table-hover">
                                <thead>
                                    <tr class="text-dark">
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Price</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr>
                                        <th>1</th>
                                        <td>Mike</td>
                                        <td>$6000</td>
                                        <td>10-09-2019</td>
                                        <td><span class="badge badge-success w-75 py-2">Approved</span></td>
                                    </tr>

                                    <tr>
                                        <th>2</th>
                                        <td>Mark</td>
                                        <td>$6000</td>
                                        <td>10-09-2019</td>
                                        <td><span class="badge badge-success w-75 py-2">Approved</span></td>
                                    </tr>

                                    <tr>
                                        <th>3</th>
                                        <td>David</td>
                                        <td>$6000</td>
                                        <td>10-09-2019</td>
                                        <td><span class="badge badge-danger w-75 py-2">Pending</span></td>
                                    </tr>

                                    <tr>
                                        <th>4</th>
                                        <td>William</td>
                                        <td>$6000</td>
                                        <td>10-09-2019</td>
                                        <td><span class="badge badge-danger w-75 py-2">Pending</span></td>
                                    </tr>
                                </tbody>
                            </table>

                            <nav>
                                <ul class="pagination justify-content-center">

                                    <li class="page-item">
                                        <a href="#" class="page-link py-2 px-3">
                                            <span>Previous</span>
                                        </a>
                                    </li>

                                    <li class="page-item active">
                                        <a href="#" class="page-link py-2 px-3">
                                            1
                                        </a>
                                    </li>

                                    <li class="page-item">
                                        <a href="#" class="page-link py-2 px-3">
                                            2
                                        </a>
                                    </li>

                                    <li class="page-item">
                                        <a href="#" class="page-link py-2 px-3">
                                            3
                                        </a>
                                    </li>

                                    <li class="page-item">
                                        <a href="#" class="page-link py-2 px-3">
                                            <span>Next</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                        <!---Table 2 END-->

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End of table-->
@endsection






