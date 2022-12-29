<html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
        rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="../css/contact.css">

    </head>
    <body>
    <header>
      <nav>
        <ul>
          <li><a href="../index.html">Home</a></li>
          <li><a href="about.php">About</a></li>
          <li><a href="#">Contact</a></li>
          <li><a href="login.php">LOGIN</a></li>
        </ul>
      </nav>
    </header>
        <div class="container">
        <p>
            Contact us!
        </p>
        
        <form>
            <div class="form-group">
                <label for="exampleFormControlInput1">Name</label>
                <input name="name" class="form-control" id="exampleFormControlInput1">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Email address</label>
                <input name="email" type="email" class="form-control" id="exampleFormControlInput1">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Subject</label>
                <input name="subject" class="form-control" id="exampleFormControlInput1">
            </div>

            <div class="form-group">
                <label for="exampleFormControlTextarea1">Message</label>
                <textarea name="message" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Send</button>
        </form>
        </div>
        <footer>
      <nav>
        <ul>
          <li><p>Copyright 2022</p></li>
          <li><p></p></li>
          <li><p></p></li>
          <li><a href="#">LOGOUT</a></li>
        </ul>
      </nav>
      
    </footer>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    </body>
</html>