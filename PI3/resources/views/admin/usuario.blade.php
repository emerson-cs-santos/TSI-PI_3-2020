@extends('layouts.Admin')

@section('content_Admin')

    <!--tables-->
    <section class='mt-5'>

        <header class="container-fluid">
            <div class="col-xl-10 col-lg-9 col-md-8 ml-auto row align-items-center">
                <h2>Usuarios</h2>
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
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End of table-->
@endsection






