<!doctype html>
<html lang="pt-br">
    <head>
        <title>Admin - Gamer Shopping</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <script src="https://kit.fontawesome.com/c0fc838bea.js" crossorigin="anonymous"></script>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="admin_assets/css/admin.css">
    </head>

    <body>
        <header>
            <!---Nav bar-->
            <nav class="navbar navbar-expand-md navbar-light">
                <button class="navbar-toggler ml-auto mb-2 bg-light" type="button" data-toggle="collapse" data-target="#navbar"> <span class="navbar-toggler-icon"></span> </button>

                <div class="collapse navbar-collapse" id="navbar">
                    <div class="container-fluid">
                        <div class="row">
                            <!---Sidebar-->
                            <div class=" col-xl-2 col-lg-3 col-md-4 sidebar fixed-top">

                                <a href="#" class="navbar-brand text-white d-block  mx-auto text-center py-3 mb-4"><i class="fas fa-cannabis text-light fa-3x"></i></a>

                                <div class="bottom-border pb-3">
                                    <img src="admin_assets/images/john.png" alt="Imagem do perfil" width="50" class="rounded-circle mr-3">
                                    <a href="#" class="text-white ">{{ Auth::user()->name }}</a>
                                </div>

                                <ul class="navbar-nav flex-column mt-4">
                                    <li class="nav-item"><a href="#" class="nav-link text-white p-3 mb-2 current"> <i class="fas fa-home text-light fa-lg mr-3"></i> Home</a></li>

                                    <li class="nav-item"><a href="#" class="nav-link text-white p-3 mb-2 sidebar-link"><i class="fas fa-user text-light fa-lg mr-3"></i> Profile</a></li>

                                    <li class="nav-item"><a href="#" class="nav-link text-white p-3 mb-2 sidebar-link"><i class="fas fa-envelope text-light fa-lg mr-3"></i> inbox</a></li>

                                    <li class="nav-item"><a href="#" class="nav-link text-white p-3 mb-2 sidebar-link"><i class="fas fa-shopping-cart text-light fa-lg mr-3"></i> Sales</a></li>

                                    <li class="nav-item"><a href="#" class="nav-link text-white p-3 mb-2 sidebar-link"><i class="fas fa-wrench text-light fa-lg mr-3"></i> Settings</a></li>
                                </ul>
                            </div>
                            <!---end of side bar-->
                            <!---Top Nav-->

                            <div class="col-xl-10 col-lg-9 col-md-8 ml-auto top-bar fixed-top py-2 top-nav">
                                <div class="row align-item-center">

                                    <div class="col-md-4">
                                        <h1 class="text-light text-uppercase mb-0 h4">Gamer Shopping</h1>
                                    </div>

                                    <div class="col-md-5">
                                        <form>
                                            <div class="input-group">
                                                <input type="text" class="form-control search-input" placeholder="search">
                                                <button type="button" class="btn btn-white search-button">
                                                    <i class="fas fa-search text-dark"></i>
                                                </button>
                                            </div>
                                        </form>
                                    </div>

                                    <div class="col-md-3">
                                        <ul class="navbar-nav">
                                            <li class="nav-item icon-parent"><a href="#" class="nav-link icon-bullet"> <i class="fas fa-comments text-light fa-lg"></i></a>
                                            <li class="nav-item icon-parent"><a href="#" class="nav-link icon-bullet"><i class="fas fa-bell text-light fa-lg"></i></a>
                                            <li class="nav-item ml-md-auto"><a href="#" class="nav-link" data-toggle="modal" data-target="#sign-out"> <i class="fas fa-sign-out-alt text-danger fa-lg"></i></a>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!--End of Top Nav-->
                        </div>
                    </div>
                </div>
            </nav>
        </header>
        <!--End of Navbar-->

        <main>

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

            <!---Modal-->
            <div class="modal" id="sign-out">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <span class="modal-title">Signout</span>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            press the button
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-success" data-dismiss="modal"> Leave </button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal"> Cancel </button>
                        </div>
                    </div>
                </div>
            </div>
            <!---End of Modal-->
        </main>

        <footer class="container-fluid">
            <div class="row">
                <div class="col-xl-10 col-lg-9 col-md-8 ml-auto mt-3 bd-bottom">
                    <div class="row border-top pt-3">
                    </div>
                    <div class="col-lg-6 text-center text-success">
                        <p>&copy; Copyright. Senac 2020 - Sistemas para Internet - Projeto integrador 3</p>
                    </div>
                </div>
            </div>
        </footer>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
