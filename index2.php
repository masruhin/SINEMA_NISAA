<?php
session_start();
include 'includes/config.php';
?>
<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <meta name="keywords"
      content="Sinema lifecodess,portfolio,lifecodes, Sinema, lifecodess,personal portfolio lifecodes, portfolio design, portfolio website, personal portfolio" /> -->
    <meta name="description" content="Selamat Datang di SINEMA" />
    <!-- Custom CSS -->
    <link rel="stylesheet" href="./assests/css/style.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
      integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
      crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Favicon -->
    <link id='favicon' rel="shortcut icon" href="./assests/images/favicon.png" type="image/x-png">
    <title>SINEMA | Sistem Informasi Kerjasama</title>
  </head>

  <body oncontextmenu="return false">

    <!-- pre loader -->
    <div class="loader-container">
      <img draggable="false" src="./assests/images/preloader.gif" alt="">
    </div>

    <!-- navbar starts -->
    <header>
      <a href="/Portfolio" class="logo"><i class="fab fa-node-js"></i> Masruhin</a>

      <div id="menu" class="fas fa-bars"></div>
      <nav class="navbar">
        <ul>
          <li><a class="active" href="#home">Home</a></li>
          <li><a href="#about">About</a></li>
          <li><a href="#skills">Skills</a></li>
          <li><a href="#education">Education</a></li>
          <li><a href="#work">Work</a></li>
          <li><a href="#experience">Experience</a></li>
          <li><a href="#contact">Contact</a></li>
          <?php 
          if (!empty($_SESSION)) {?>
          <li><a href="#logout">Keluar</a></li>
          <?php } else { ?>
          <li><a href="login.php">Login / Daftar Akun</a></li>
          <?php } ?>
        </ul>
      </nav>
    </header>
    <!-- navbar ends -->


    <!-- hero section starts -->
    <section class="home" id="home">
      <div id="particles-js"></div>

      <div class="content">
        <h3>Selamat Datang,<br />SINEMA <span></span></h3>
        <p><span class="typing-text"></span></p>
        <a href="#about" class="btn"><span>Tentang</span>
          <i class="fas fa-arrow-circle-down"></i>
        </a>
        <div class="socials">
          <ul class="social-icons">
            <!-- <li><a class="linkedin" href="https://www.linkedin.com/in/mas-ruhin-0a6a00150/" target="_blank"><i
                  class="fab fa-linkedin"></i></a></li> -->
            <li><a class="github" href="#" target="_blank"><i class="fab fa-github"></i></a></li>
            <li><a class="twitter" href="#" target="_blank"><i class="fab fa-twitter"></i></a></li>
            <li><a class="telegram" href="#" target="_blank"><i class="fab fa-telegram-plane"></i></a></li>
            <li><a class="instagram" href="#"><i class="fab fa-instagram" target="_blank"></i></a></li>
            <!-- <li><a class="dev" href="#" target="_blank"><i class="fab fa-dev"></i></a></li> -->
          </ul>
        </div>

      </div>
      <div class="image">
        <img draggable="false" class="tilt" src="./assests/images/hero.png" alt="">
      </div>
    </section>
    <!-- hero section ends -->


    <!-- about section starts -->
    <section class="about" id="about">
      <h2 class="heading"><i class="fas fa-user-alt"></i> Tentang <span>Sinema</span></h2>
      <div class="row">
        <div class="image">
          <img draggable="false" class="tilt" src="img/bhamada.jpg" alt="" style="height: 550px; width:800px;">
        </div>
        <div class="content">
          <h3>SINEMA</h3>
          <span class="tag">Sistem Informasi Kerjasama</span>
          <p>Merupakan sistem informasi kerjasama, berfungsi sebagai pusat informasi, komunikasi dan proses pengusulan
            yang berkaitan dengan kerjasama baik itu kerjasama luar negeri maupun dalam negeri.</p>
          <!-- <div class="box-container">
            <div class="box">
              <p><span> age: </span> 26</p>
              <p><span> phone : </span> +62 2323-679-226</p>
            </div>
            <div class="box">
              <p><span> email : </span> masruhin15201029@gmail.com</p>
              <p><span> place : </span> Jakarta, Indonesia</p>
            </div>
          </div> -->

          <!-- <div class="resumebtn">
            <a href="#" class="btn"><span>Resume</span>
              <i class="fas fa-chevron-right"></i>
            </a>
          </div> -->
        </div>
      </div>
    </section>
    <!-- about section ends -->

    <!-- skills section starts -->
    <section class="skills" id="skills">

      <h2 class="heading"><i class="fas fa-laptop-code"></i> Skills & <span>Abilities</span></h2>

      <div class="container">
        <div class="row">
          <div class="col">

            <div class="bar">
              <div class="info">
                <i class="fab fa-html5">
                  <span>HTML</span></i>
                <span>98%</span>
              </div>
              <div class="line html"></div>
            </div>

            <div class="bar">
              <div class="info">
                <i class="fab fa-css3-alt">
                  <span>CSS</span></i>
                <span>92%</span>
              </div>
              <div class="line css"></div>
            </div>

            <div class="bar">
              <div class="info">
                <i class="fab fa-js-square">
                  <span>Javascript</span></i>
                <span>82%</span>
              </div>
              <div class="line javascript"></div>
            </div>

            <div class="bar">
              <div class="info">
                <i class="fas fa-code">
                  <span>jQuery</span></i>
                <span>73%</span>
              </div>
              <div class="line jquery"></div>
            </div>

            <div class="bar">
              <div class="info">
                <i class="fab fa-php">
                  <span>PHP</span></i>
                <span>84%</span>
              </div>
              <div class="line php"></div>
            </div>

            <div class="bar">
              <div class="info">
                <i class="fas fa-database">
                  <span>MySQL</span></i>
                <span>97%</span>
              </div>
              <div class="line mysql"></div>
            </div>

            <div class="bar">
              <div class="info">
                <i class="fab fa-react">
                  <span>ReactJS</span></i>
                <span>55%</span>
              </div>
              <div class="line reactjs"></div>
            </div>
          </div>

          <div class="col">
            <div class="bar">
              <div class="info">
                <i class="fab fa-java">
                  <span>Java</span></i>
                <span>60%</span>
              </div>
              <div class="line java"></div>
            </div>

            <div class="bar">
              <div class="info">
                <i class="fab fa-laravel">
                  <span>Laravel</span></i>
                <span>80%</span>
              </div>
              <div class="line python"></div>
            </div>

            <div class="bar">
              <div class="info">
                <i class="fab fa-codepen">
                  <span>Codeigniter</span></i>
                <span>70%</span>
              </div>
              <div class="line android"></div>
            </div>

            <div class="bar">
              <div class="info">
                <i class="fab fa-node-js">
                  <span>NodeJS</span></i>
                <span>70%</span>
              </div>
              <div class="line nodejs"></div>
            </div>

            <div class="bar">
              <div class="info">
                <i class="fas fa-code-branch">
                  <span>Git & GitHub | VCS</span></i>
                <span>88%</span>
              </div>
              <div class="line vcs"></div>
            </div>

            <div class="bar">
              <div class="info">
                <i class="fab fa-wordpress-simple">
                  <span>Wordpress | CMS</span></i>
                <span>96%</span>
              </div>
              <div class="line cms"></div>
            </div>

            <div class="bar">
              <div class="info">
                <i class="fas fa-server">
                  <span>AWS Cloud</span></i>
                <span>65%</span>
              </div>
              <div class="line firebase"></div>
            </div>

          </div>
        </div>
      </div>
    </section>
    <!-- skills section ends -->


    <!-- education section starts -->
    <section class="education" id="education">

      <h1 class="heading"><i class="fas fa-graduation-cap"></i> My <span>Education</span></h1>

      <p class="qoute">Education is not the learning of facts, but the training of the mind to think.</p>

      <div class="box-container">

        <div class="box">
          <div class="image">
            <img draggable="false" src="./assests/images/educat/stmik.jpg" alt="">
          </div>
          <div class="content">
            <h3>Bachelor of Engineering in Information Technology </h3>
            <p>STMIK Swadharma / ITB Swadharma | Jakarta</p>
            <h4>2015-2019 | Completed</h4>
          </div>
        </div>

        <div class="box">
          <div class="image">
            <img draggable="false" src="./assests/images/educat/dicoding.png" alt="">
          </div>
          <div class="content">
            <h3>Cloud Practitioner Essentials</h3>
            <p>DIcoding | certificated</p>
            <h4>11 September 2021 | Completed</h4>
          </div>
        </div>

      </div>
    </section>
    <!-- education section ends -->


    <!-- work project section starts -->
    <section class="work" id="work">

      <h2 class="heading"><i class="fas fa-laptop-code"></i> Projects <span>Made</span></h2>

      <div class="box-container">

        <div class="box tilt">
          <img draggable="false" src="./assests/images/projects/portfolio1.PNG" alt="" />
          <div class="content">
            <div class="tag">
              <h3>Portfolio Website</h3>
            </div>
            <div class="desc">
              <p>Personal portfolio website. Don't need much info about it, just scroll down. You're here only!</p>
              <div class="btns">
                <a href="#" class="btn" target="_blank"><i class="fas fa-eye"></i> View</a>
                <a href="https://github.com/Masruhin-sable/Portfolio-Website" class="btn" target="_blank">Code <i
                    class="fas fa-code"></i></a>
              </div>
            </div>
          </div>
        </div>

        <div class="box tilt">
          <img draggable="false" src="./assests/images/projects/jspro.PNG" alt="" />
          <div class="content">
            <div class="tag">
              <h3>JavaScript Projects Website</h3>
            </div>
            <div class="desc">
              <p>This website is specially build to showcase all major web projects. All my web based projects are in
                it.</p>
              <div class="btns">
                <a href="https://Masruhin-sable.github.io/JavaScript-Projects" class="btn" target="_blank"><i
                    class="fas fa-eye"></i> View</a>
                <a href="https://github.com/Masruhin-sable/JavaScript-Projects" class="btn" target="_blank"><i
                    class="fas fa-code"></i> Code</a>
              </div>
            </div>
          </div>
        </div>

        <div class="box tilt">
          <img draggable="false" src="./assests/images/projects/dtc.jpg" alt="" />
          <div class="content">
            <div class="tag">
              <h3>Webview App</h3>
            </div>
            <div class="desc">
              <p>It's an web app which uses web view component for displaying content elearning employee Mercedes-Benz
                Indonesia. This app provides many different features.</p>
              <div class="btns">
                <a href="https://transformationindonesia.com/" class="btn" target="_blank"><i class="fas fa-eye"></i>
                  View</a>
                <a href="https://transformationindonesia.com/" class="btn" target="_blank">Code <i
                    class="fas fa-code"></i></a>
              </div>
            </div>
          </div>
        </div>

        <div class="box tilt">
          <img draggable="false" src="./assests/images/projects/farmarin.jpg" alt="" />
          <div class="content">
            <div class="tag">
              <h3>Point of Sales, Pharmacy</h3>
            </div>
            <div class="desc">
              <p>Point Of Sales pharmacy web based on PHP and MySQL database. Made with HTML, CSS, JavaScript and
                backend with PHP.</p>
              <div class="btns">
                <a href="https://transformationindonesia.com/apotekfarmarin" class="btn" target="_blank"><i
                    class="fas fa-eye"></i> View</a>
                <a href="https://transformationindonesia.com/apotekfarmarin" class="btn" target="_blank">Code <i
                    class="fas fa-code"></i></a>
              </div>
            </div>
          </div>
        </div>

        <div class="box tilt">
          <img draggable="false" src="./assests/images/projects/diplip.jpg" alt="" />
          <div class="content">
            <div class="tag">
              <h3>Issue Tracker</h3>
            </div>
            <div class="desc">
              <p>It provides the feature to Assign Issue Car Manufactured in Mercedes-Benz With The Auto Generated Id By
                Using ChartJS. Uses Local Storage.</p>
              <div class="btns">
                <a href="https://transformationindonesia.com/appconformity" class="btn" target="_blank"><i
                    class="fas fa-eye"></i> View</a>
                <a href="https://transformationindonesia.com/appconformity" class="btn" target="_blank">Code <i
                    class="fas fa-code"></i></a>
              </div>
            </div>
          </div>
        </div>

        <!-- <div class="box tilt">
      <img draggable="false" src="./assests/images/projects/basicbank.PNG" alt="" />
      <div class="content">
        <div class="tag">
        <h3>Basic Banking App</h3>
        </div>
        <div class="desc">
          <p>It's an android app which uses SQLite to store user accounts data. It provides feature to simply transact amount.</p>
          <div class="btns">
             <a href="https://epjlp.jakarta.go.id/" class="btn" target="_blank"><i class="fas fa-eye"></i> View</a>
            <a href="https://epjlp.jakarta.go.id/" class="btn" target="_blank">Code <i class="fas fa-code"></i></a>
          </div>
        </div>
      </div>
    </div> -->

      </div>

      <div class="viewall">
        <a href="#" class="btn"><span>View All</span>
          <i class="fas fa-arrow-right"></i>
        </a>
      </div>

    </section>
    <!-- work project section ends -->

    <!-- experience section starts -->
    <section class="experience" id="experience">

      <h2 class="heading"><i class="fas fa-briefcase"></i> Experience </h2>

      <div class="timeline">

        <div class="container left">
          <div class="content">
            <div class="tag">
              <h2>Mercedes-Benz Indonesia</h2>
            </div>
            <div class="desc">
              <h3>Fullstack Web Developer</h3>
              <p>January 2021 - June 2021 </p>
            </div>
          </div>
        </div>

        <div class="container right">
          <div class="content">
            <div class="tag">
              <h2>Diskominfotik</h2>
            </div>
            <div class="desc">
              <h3>Website Developer</h3>
              <p>January 2020 - December 2020</p>
            </div>
          </div>
        </div>

        <div class="container left">
          <div class="content">
            <div class="tag">
              <h2>Panin Bank Tbk</h2>
            </div>
            <div class="desc">
              <h3>IT Support</h3>
              <p>February 2016 – December 2019</p>
            </div>
          </div>
        </div>

        <!-- <div class="container right">
      <div class="content">
        <div class="tag">
          <h2>Frshr Technologies</h2>
        </div>
        <div class="desc">
            <h3>Wordpress Developer | Internship</h3>
            <p>April 2021 - April 2021</p>
        </div>
      </div>
    </div>

    <div class="container left">
      <div class="content">
        <div class="tag">
          <h2>WonderingBlog</h2>
        </div>
        <div class="desc">
            <h3>Web Development & SEO | Internship</h3>
            <p>March 2021 - April 2021</p>
        </div>
      </div>
    </div> -->
      </div>

      <div class="morebtn">
        <a href="/#" class="btn"><span>View All</span>
          <i class="fas fa-arrow-right"></i>
        </a>
      </div>

      </div>

    </section>
    <!-- experience section ends -->

    <!-- contact section starts -->
    <section class="contact" id="contact">

      <h2 class="heading"><i class="fas fa-headset"></i> Get in <span>Touch</span></h2>

      <div class="container">
        <div class="content">
          <div class="image-box">
            <img draggable="false" src="./assests/images/contact1.png" alt="">
          </div>
          <form action="#">

            <div class="form-group">
              <div class="field">
                <input type="text" name="name" placeholder="Name" required>
                <i class='fas fa-user'></i>
              </div>
              <div class="field">
                <input type="text" name="email" placeholder="Email" required>
                <i class='fas fa-envelope'></i>
              </div>
              <div class="field">
                <input type="text" name="phone" placeholder="Phone">
                <i class='fas fa-phone-alt'></i>
              </div>
              <div class="message">
                <textarea placeholder="Message" name="message" required></textarea>
                <i class="fas fa-comment-dots"></i>
              </div>
            </div>
            <div class="button-area">
              <button type="submit" title="Sorry! This service hasn't active yet. Till then have live chat.">
                Submit <i class="fa fa-paper-plane"></i></button>
            </div>
          </form>
        </div>
      </div>
    </section>
    <!-- contact section ends -->


    <!-- footer section starts -->
    <section class="footer">

      <div class="box-container">

        <div class="box">
          <h3>Masruhin's Portfolio</h3>
          <p>Thank you for visiting my personal portfolio website. Connect with me over socials. <br /> <br /> Please
            wait for a while all major projects will be listed soon. Till then keep visiting. Connect with me over live
            chat!</p>
        </div>

        <div class="box">
          <h3>quick links</h3>
          <a href="#home"><i class="fas fa-chevron-circle-right"></i> home</a>
          <a href="#about"><i class="fas fa-chevron-circle-right"></i> about</a>
          <a href="#skills"><i class="fas fa-chevron-circle-right"></i> skills</a>
          <a href="#education"><i class="fas fa-chevron-circle-right"></i> education</a>
          <a href="#work"><i class="fas fa-chevron-circle-right"></i> work</a>
          <a href="#experience"><i class="fas fa-chevron-circle-right"></i> experience</a>
        </div>

        <div class="box">
          <h3>contact info</h3>
          <p> <i class="fas fa-phone"></i>+62 2323-679-226</p>
          <p> <i class="fas fa-envelope"></i>masruhin15201029@gmail.com</p>
          <p> <i class="fas fa-map-marked-alt"></i> Jakarta, Indonesia</p>
          <div class="share">

            <a href="#" class="fab fa-linkedin" target="_blank"></a>
            <a href="#" class="fab fa-github" target="_blank"></a>
            <a href="#" class="fas fa-envelope" target="_blank"></a>
            <a href="#" class="fab fa-twitter" target="_blank"></a>
            <a href="#" class="fab fa-telegram-plane" target="_blank"></a>
          </div>
        </div>
      </div>

      <h1 class="credit">Designed with <i class="fa fa-heart pulse"></i> by <a
          href="https://www.linkedin.com/in/Masruhin-sable"> Masruhin</a></h1>

    </section>
    <!-- footer section ends -->


    <!-- scroll top btn -->
    <a href="#home" class="fas fa-angle-up" id="scroll-top"></a>
    <!-- scroll back to top -->


    <!-- ==== ALL MAJOR JAVASCRIPT CDNS STARTS ==== -->
    <!-- jquery cdn -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
      integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
      crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- typed.js cdn -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/typed.js/2.0.5/typed.min.js"
      integrity="sha512-1KbKusm/hAtkX5FScVR5G36wodIMnVd/aP04af06iyQTkD17szAMGNmxfNH+tEuFp3Og/P5G32L1qEC47CZbUQ=="
      crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- particle.js links -->
    <script src="./assests/js/particles.min.js"></script>
    <script src="./assests/js/app.js"></script>

    <!-- vanilla tilt.js links -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vanilla-tilt/1.7.0/vanilla-tilt.min.js"
      integrity="sha512-SttpKhJqONuBVxbRcuH0wezjuX+BoFoli0yPsnrAADcHsQMW8rkR84ItFHGIkPvhnlRnE2FaifDOUw+EltbuHg=="
      crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- scroll reveal anim -->
    <script src="https://unpkg.com/scrollreveal"></script>
    <!-- ==== ALL MAJOR JAVASCRIPT CDNS ENDS ==== -->

    <script src="./assests/js/script.js"></script>

  </body>

</html>
