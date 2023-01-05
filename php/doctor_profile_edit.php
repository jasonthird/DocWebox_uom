
<html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
        rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="../css/login.css">

    </head>
    <body>
    <header>
            <div class="header" class="d-flex justify-content-end">
                <h3 class="d-flex justify-content-end">
                <div class="btn-group">
                <button type="button" class="btn btn-info">Hello, Username</button>
                <button type="button" class="btn btn-info dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                    <span class="visually-hidden">Toggle Dropdown</span>
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Profile</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="#">Logout</a></li>
                </ul>
                </div>
            </div>
        </header>
        <div class="container-float">
            <div class="row">
                <div class="col-sm-9 col-md-7 col-lg-5 mx-auto ">
                <div class="card border-0 shadow rounded-3 m-5">
                    <div class="card-body text-center p-3 m-1 ">
                        <h3 class="card-title">Edit Profile</h3>
                        <form>
                        <div class="form-floating m-3">
                            <input type="text" class="form-control" id="floatingInput" placeholder="username">
                            <label for="floatingInput">User1</label>
                        </div>
                        <div class="form-floating m-3">
                            <input type="email" class="form-control" id="floatingInput" placeholder="email">
                            <label for="floatingInput">test@gmail.com</label>
                        </div>
                        <div class="form-floating m-3">
                            <input type="text" class="form-control" id="floatingInput" placeholder="telephone">
                            <label for="floatingInput">6958741254</label>
                        </div>
                        <div class="form-floating m-3">
                            <input type="text" class="form-control" id="floatingInput" placeholder="category">
                            <label for="floatingInput">Cardiology</label>
                        </div>
                        <div class="form-floating m-3">
                            <select class="form-control" >
                                <option>--City--</option>
                                <option selected>Thessaloniki</option>
                                <option>Athens</option>
                                <option>Patra</option>
                                <option>Ioannina</option>
                            </select>
                        </div>
                        <div class="form-floating m-3">
                            <input type="textarea" class="form-control" id="floatingInput" placeholder="category">
                            <label for="floatingInput">bio</label>
                        </div>
                        <div class="d-grid gap-2 col-6 mx-auto">
                            <button class="btn btn-primary" type="button">Save Changes</button>
                        </div>
                </div>
                </div>
        </div>

    
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>