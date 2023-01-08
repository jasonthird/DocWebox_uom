
<html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
        rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="../css/doctor_profile_view.css">

    </head>
    <body >
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
                <div class="col-sm-9 col-md-8 col-lg-8 mx-auto ">
                <div class="card border-0 shadow rounded-3 m-5">
                    <div class="card-body text-center p-3 m-1 ">
                        <h3 class="card-title">Doctor Test</h3>
                        <p>
                            <img src="../img/profile.png">
                            <h5>Thessaloniki</h5>
                            <h5>6958451254</h5>
                            <h5>test@gmail.com</h5>
                            <h5>Cardiology</h5>
                            <h6>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</h6>

                        </p>
                        <div class="light card-body">
                            <div class="calendar">
                                <div class="calendar-header">
                                    <span class="month-picker" id="month-picker">April</span>
                                    <div class="year-picker">
                                        <span class="year-change" id="prev-year">
                                            <pre><</pre>
                                        </span>
                                        <span id="year">2022</span>
                                        <span class="year-change" id="next-year">
                                            <pre>></pre>
                                        </span>
                                    </div>
                                </div>
                                <div class="calendar-body">
                                    <div class="calendar-week-day">
                                        <div>Sun</div>
                                        <div>Mon</div>
                                        <div>Tue</div>
                                        <div>Wed</div>
                                        <div>Thu</div>
                                        <div>Fri</div>
                                        <div>Sat</div>
                                    </div>
                                    <div class="calendar-days"></div>
                                </div>
                            
                                <div class="month-list"></div>
                            </div>
                                        </div>
                                        </div>


                            <div class="d-grid gap-2 col-3 mx-auto">
                            <button class="btn btn-primary" type="button">Submit Appointment</button>
                        </div>
                        </div>
    <script src="../js/calendar.js"></script>

        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>