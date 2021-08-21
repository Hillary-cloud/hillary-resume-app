<?php
 //Get Heroku ClearDB connection information
 $cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));
 $cleardb_server = $cleardb_url["host"];
 $cleardb_username = $cleardb_url["user"];
 $cleardb_password = $cleardb_url["pass"];
 $cleardb_db = substr($cleardb_url["path"],1);
 $active_group = 'default';
 $query_builder = TRUE;
 // Connect to DB
 $conn = mysqli_connect($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db);
 
if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $query = "INSERT INTO `myresume`(name,email,message) VALUES ('$name','$email','$message')";
    $mysqli_query = mysqli_query($conn,$query) or die(mysqli_error($conn));

    if ($mysqli_query==true) {
        $_SESSION['status'] = "Your message has been sent successfully";
    }else {
        mysqli_error();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css" />
    <script src="bootstrap/js/bootstrapjquery.js"></script>
    <script src="bootstrap/js/bootstrap.js"></script>
    <title>my resume</title>
</head>
<body>
    <style>
        a:hover {
            font-size: 15px;
        }
    </style>
</head>

<body>
    <div class="container-fluid bg-dark">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <nav class="navbar-brand text-warning">OBIORA HILLARY CHIJIOKE</nav>
            <button class="navbar-toggler bg-secondary"  type="button" data-toggle="collapse" data-target="#mynavbarasupportedcontent">
            <span class=" navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="mynavbarasupportedcontent">
                <ul class="navbar-nav pull-left ml-5">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#skills">Skills</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contactus">Contact Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="https://twitter.com/ObioraHillary?t=krcBGiXFkzGg3kxBYhs26A&s=09">Twitter</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="https://www.linkedin.com/in/obi-larry-33ab11216">Linkedin</a>
                    </li>
                </ul>
                </div>
        </nav>
        <div class="row  ">
            <div class=" mt-2 col-lg-9 col-md-9 col-sm-12 col-xs-12">
                <div class="card ">
                        <div class="card-body text-light bg-dark">
                            <h1 class="text-secondary">Obiora Hillary Chijioke</h1>
                            <em>Odim gate,University of Nigeria,Nsukka  Nsukka  Enugu,410001  +2348147078588  obicj97@gmail.com</em><hr>
                                <img src="hillary.jpg" class="img-fluid rounded mx-auto d-block" alt="Responsive image" width="150px">
                            <h3 class="text-secondary">CAREER OBJECTIVE</h3>
                            <p>Hard-working developer with two year of experience and a proven knowledge of cellular communications, programming and web development. Aiming to leverage my skills to successfully fill the Backend web engineer role at your company.</p><hr>
                            <h3 class="text-secondary">EXPERIENCE</h3>
                            <p>Centre for Distance & e-leaning,University of Nigeria, Nsukka.</p>
                            <em>Web developer, Oct 2019 - July 2021.</em>
                            <ul>Manage a group of developers as the team leader.</ul>
                            <ul>Share functionalities to each team member.</ul>
                            <ul>Add new features to projects.</ul>
                            <ul>supervise completed works.</ul><hr>
                            <h3 class="text-secondary">EDUCATION</h3>
                            <p>University of Nigeria,Nsukka Enugu state.</p>
                            <em>Bachelor of Science (B.S) Computer Science (Expected graduation July 2022).</em>
                            <ul>Relevant Coursework: Mathematics.</ul><hr>
                            <h3 class="text-secondary">ADDITIONAL SKILLS</h3>
                            <ul>Good communication skill.</ul>
                            <ul>Good reasoning skill.</ul>
                            <ul>Efficient and reliable.</ul>
                            <ul>Management skill.</ul>
                            <ul>Leadership skill.</ul>
                        </div>
                    </div>
            </div>

            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <a name="skills"></a> 
            <h2 class="text-center text-primary mb-0">Professional skills</h2><br>
                <ul class="nav flex-column nav-pills">
                    <li class="text-light text-center  ">
                        <p>HTML </p>
                        <hr>
                        <p>CSS</p>
                        <hr>
                        <p>Bootstrap</p>
                        <hr>
                        <p>PHP</p>
                        <hr>
                        <p>Javascript</p>
                        <hr>
                        <p>MYSQL database</p>
                        <hr>
                        <p>Laravel</p>
                    </li><hr class="bg-light">
                </ul>
                <?php 
                    if(isset($_SESSION['status'])){
                        ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <?php echo $_SESSION['status']; ?>
                            </div>

                        <?php
                    }
                ?>
                <h4 class="text-primary"><strong><a name="contactus"></a> Leave us a message</strong></h4><hr>
                 <form class="text-light" action="" method="post">
                    <label for="">Full Name</label><br>
                    <input type="text" class="form-control" placeholder="Fullname" name="name" required><br>
                    <label for="">Email</label><br>
                    <input type="text"  class="form-control" placeholder="Email" name="email" required><br>
                    <label for="">Message</label><br>
                    <textarea name="message"  class="form-control" id="" cols="30" rows="5" placeholder="Enter your message" required></textarea><br><br>
                    <button class="btn btn-success" name="submit">SEND</button>
                 </form><hr>
                 <a  href="https://zuri.team"><p>Tasked by:</p><img src="zuri.png"  style="width:100px; height:100px"alt=""></a>
                 
            </div>
        </div>
        <br><hr class="text-light">
        <div class="row text-center bg-dark text-light">
            <p>&copy : Ceejay 2021</p>
        </div>
    </div>

</body>
</html>