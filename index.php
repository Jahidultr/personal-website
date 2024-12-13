<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';

include("./php/conf.php");
$msg = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Collect data from POST request
    if (isset($_POST['name']) && isset($_POST['message'])) {
        $name = trim($_POST['name']);
        $message = trim($_POST['message']);

        $mail = new PHPMailer(true);

        try {
            // Server settings
            $mail->isSMTP();                                      // Send using SMTP
            $mail->Host = 'smtp.gmail.com';                       // Set the SMTP server
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = 'feeling2point0@gmail.com';             // SMTP username
            $mail->Password = 'fgsrrusfeszmmqjs';                // SMTP password (use app password for Gmail)
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;   // Enable TLS encryption
            $mail->Port = 587;                                    // TCP port to connect to

            // Recipients
            $mail->setFrom('jahidulislamdiu02@gmail.com', 'Jahidul');
            $mail->addAddress('jahidulislamdiu02@gmail.com', 'Jahidul'); // Add a recipient

            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = $name. ' sent message';
            $mail->Body = $message;
            $mail->AltBody = $message;

            $mail->send();
            $msg = 'Email has been sent successfully!';
        } catch (Exception $e) {
            $msg = "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }





        $name = mysqli_real_escape_string($conn, $name);
        $message = mysqli_real_escape_string($conn, $message);

        // SQL query to insert data into `portfolio_data` table
        $sql = "INSERT INTO portfolio_data (name, message) VALUES ('$name', '$message')";

        // Execute the query
        if (mysqli_query($conn, $sql)) {
            $msg = "Message and email sent successfully!";
        } else {
            $msg = "Error: " . $sql . "<br>" . mysqli_error($conn);
        }

        // Close the database connection
        mysqli_close($conn);
    } else {
        $msg = "Name or message field is missing!";
    }
}
?> 

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personal Portfolio</title>
    <link rel="stylesheet" href="style.css">

</head>

<body>
    <nav class="navbar">
        <div class="logo">Jahid<span>ul</span>.</div>
        <button class="menu-button">☰</button>
        <div class="nav-links">
            <a href="#home">HOME</a>
            <a href="#education">Education</a>
            <a href="#service">SERVICE</a>
            <a href="#Project">PROJECT</a>
            <a href="#resume">RESUME</a>
            <a href="#contact">CONTACT</a>

        </div>
    </nav>

    <section id="home" class="hero">

        <div class="hero-content">
            <p class="welcome">Hello, Welcome</p>
            <h1>I'm Jahidul Islam</h1>
            <p>"Hi, I’m a dedicated Flutter developer with a passion for building seamless, high-performing
                cross-platform
                applications. I specialize in creating intuitive user interfaces, implementing efficient state
                management, and ensuring
                smooth API integrations. My goal is to deliver apps that not only meet client expectations but also
                provide an
                exceptional user experience. Let’s turn ideas into impactful digital solutions together!",</p>
            <a href="#contact" class="cta-button">Contact us</a>
        </div>
        <div class="hero-image">
            <img src="./assets/images/ostad.png" alt="Profile Image">
        </div>
    </section>
    <div class="container" data-animate="slideIn">
        <h1 class="title">Educa<span>tion</span></h1>
        <div class="timeline">
            <div class="card">
                <h2>Secondary School Certificate (SSC)</h2>
                <p>Bagmara B S High School and College</p>
                <p><strong>GPA: </strong>4.65</p>
            </div>
            <div class="card">
                <h2>Higher Secondary Certificate (HSC)</h2>
                <p>Bagmara B S High School and College</p>
                <p><strong>GPA: </strong>4.85</p>
            </div>
            <div class="card">
                <h2>Bachelor of Science in Computer Science and Engineering</h2>
                <p>Dhaka International University</p>
                <p><strong>CGPA: </strong>3.84</p>
            </div>
        </div>
    </div>
    <!--Skills -->
    <section class="experiences" id="experiences" data-animate="slideIn">
        <div class="experiences-header">
            <h2 class="experiences-title">My <span>Skills</span></h2>
            <p class="experiences-description">"My experience includes developing cross-platform mobile apps with
                Flutter and Dart, and building responsive websites
                using HTML, CSS, and JavaScript. I focus on creating intuitive UIs, optimizing performance, and
                integrating APIs for
                seamless user experiences."
            </p>
        </div>

        <div class="experiences-grid">
            <div class="experience-card">
                <div class="experience-date">Jnu 2020-2022</div>
                <h3 class="experience-title">Android App Development</h3>
                <div class="experience-tool">Java</div>
                <p class="experience-description">"Developed and maintained high-quality Android applications using
                    Java, following clean coding practices and
                    object-oriented programming principles. Gained hands-on experience in designing intuitive user
                    interfaces, implementing
                    custom views, and managing app lifecycles.</p>
            </div>
            <div class="experience-card">
                <div class="experience-date">June-2002 - 2020</div>
                <h3 class="experience-title">Android & ISO Development</h3>
                <div class="experience-tool">Flutter || Dart </div>
                <p class="experience-description">"Skilled Flutter developer with expertise in building high-quality
                    Android and iOS apps. Proficient in creating
                    intuitive UIs, implementing state management, integrating APIs, and optimizing performance.
                    Committed to delivering
                    scalable and user-friendly solutions with clean code practices."</p>
            </div>
            <div class="experience-card">
                <div class="experience-date">May-2022 - 2024</div>
                <h3 class="experience-title">Web Development</h3>
                <div class="experience-tool">HTML || CSS || JavaScript</div>
                <p class="experience-description">"Proficient in creating responsive and interactive websites using
                    HTML, CSS, and JavaScript. Skilled in crafting clean
                    layouts, adding dynamic functionality, and optimizing for performance, accessibility, and
                    cross-browser compatibility."</p>
            </div>
        </div>
    </section>

    <div class="container" data-animate="slideIn" id="Project">
        <!-- Header Section -->
        <header>
            <h1>My <span class="highlight" data-animate="slideIn">Projects</span></h1>
            <p class="subtitle">
                "Sharing my journey and insights in software development, focusing on web technologies,
                mobile development, and best practices. Here you'll find articles about Flutter, Dart,
                HTML, CSS, and JavaScript development."
            </p>
        </header>

        <!-- project Posts Grid -->
        <div class="blog-grid ">
            <article class="blog-card">
                <img src="./assets/images/projectwork.png" alt="Blog post cover" class="blog-image">
                <div class="blog-content">
                    <div class="blog-meta">
                        <span class="date">May 15, 2024</span>
                        <a href="https://github.com/Jahidultr/task" target="_blank" rel="noopener noreferrer"
                            class="github-link">View Projects </a>
                    </div>
                    <h2>Task management application</h2>
                    <p>
                        Exploring different state management solutions in Flutter and their practical applications...
                    </p>
                    <a href="https://github.com/Jahidultr/task" class="read-more">View on GitHub →</a>
                </div>
            </article>

            <!-- project Post Card 2 -->
            <article class="blog-card">
                <img src="./assets/images/responsive.png" alt="Blog post cover" class="blog-image">
                <div class="blog-content">
                    <div class="blog-meta">
                        <span class="date">May 05, 2024</span>
                        <a href="https://github.com/Jahidultr/responsivedesign" target="_blank"
                            rel="noopener noreferrer" class="github-link">View Projects</a>
                    </div>
                    <h2>Responsive Design </h2>
                    <p>
                        Best practices for creating responsive and web mobile-friendly ui using Flutter...
                    </p>
                    <a href="https://github.com/Jahidultr/responsivedesign" class="read-more">View on GitHub →</a>
                </div>
            </article>

            <!-- project Post Card 3 -->
            <article class="blog-card">
                <img src="./assets/images/google_Maps.jpg" alt="Blog post cover" class="blog-image">
                <div class="blog-content">
                    <div class="blog-meta">
                        <span class="date">dec 5, 2024</span>
                        <a href="https://github.com/Jahidultr/GoogleMaps" target="_blank" rel="noopener noreferrer"
                            class="github-link">View Projects</a>
                    </div>
                    <h2>Live Location Traking </h2>
                    <p>
                        Essential tips and tricks for building live location traking Android Iso applications with
                        Flutter...
                    </p>
                    <a href="https://github.com/Jahidultr/GoogleMaps" class="read-more">View on GitHub →</a>
                </div>
            </article>
        </div>
    </div>



    <!-- Add this section after the about section  services -->
    <section id="service" class="services" data-animate="slideIn">
        <div class="services-header">
            <h2 class="services-title">My <span>Service</span></h2>
            <p class="services-description">"We provide professional app development for Android, iOS, and web platforms, ensuring seamless user experiences. Our web development expertise covers HTML, CSS, and JavaScript. Additionally, we specialize in solving coding challenges with efficient and creative solutions."
</p>
        </div>

        <div class="services-grid">
            <div class="service-card">
                <div class="service-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink"
                        width="512" height="512" x="0" y="0" viewBox="0 0 24 24"
                        style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                        <g>
                            <path
                                d="M20.578 5H16V2.556C16 1.698 15.302 1 14.444 1H3.556C2.698 1 2 1.698 2 2.556v18.888C2 22.302 2.698 23 3.556 23h10.888c.858 0 1.556-.698 1.556-1.556V19h4.578c.784 0 1.422-.638 1.422-1.422V6.422C22 5.638 21.362 5 20.578 5zM21 6.422V7h-4.972a.35.35 0 0 1-.317-.196L15.309 6h5.269c.233 0 .422.189.422.422zM11.691 2l-.5 1H6.809l-.5-1zm2.753 20H3.556A.557.557 0 0 1 3 21.444V21h12v.444a.557.557 0 0 1-.556.556zM15 20H3V2.556C3 2.25 3.25 2 3.556 2h1.635l.862 1.724A.5.5 0 0 0 6.5 4h5a.5.5 0 0 0 .447-.276L12.809 2h1.635c.307 0 .556.25.556.556V5H8.422C7.638 5 7 5.638 7 6.422v11.156C7 18.362 7.638 19 8.422 19H15zm5.578-2H8.422A.422.422 0 0 1 8 17.578V6.422C8 6.189 8.189 6 8.422 6h5.769l.625 1.25c.231.463.696.75 1.212.75H21v9.578a.422.422 0 0 1-.422.422z"
                                fill="#000000" opacity="1" data-original="#000000" class=""></path>
                            <path
                                d="M10.146 11.854c.194.194.513.194.707 0s.194-.513 0-.707l-.646-.647.646-.646a.5.5 0 0 0-.707-.707l-1 1a.5.5 0 0 0 0 .707zM12.276 11.947a.502.502 0 0 0 .671-.224l1-2c.123-.245.022-.548-.224-.671s-.548-.022-.671.224l-1 2a.503.503 0 0 0 .224.671zM15.146 11.854a.502.502 0 0 0 .707 0l1-1a.5.5 0 0 0 0-.707l-1-1a.5.5 0 0 0-.707.707l.646.646-.646.646a.505.505 0 0 0 0 .708zM9.5 15h5a.5.5 0 0 0 0-1h-5a.5.5 0 0 0 0 1zM18.5 16h-9a.5.5 0 0 0 0 1h9a.5.5 0 0 0 0-1z"
                                fill="#000000" opacity="1" data-original="#000000" class=""></path>
                            <circle cx="12.5" cy="7.5" r=".5" fill="#000000" opacity="1" data-original="#000000"
                                class=""></circle>
                            <circle cx="10.5" cy="7.5" r=".5" fill="#000000" opacity="1" data-original="#000000"
                                class=""></circle>
                        </g>
                    </svg>
                </div>
                <h3 class="service-title"> App Development</h3>
                <p class="service-description">Android, ISO, Web</p>
            </div>

            <div class="service-card">
                <div class="service-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                </div>
                <h3 class="service-title">Web Development</h3>
                <p class="service-description">HTML CSS JavaScript </p>
            </div>

            <div class="service-card">
                <div class="service-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink"
                        width="512" height="512" x="0" y="0" viewBox="0 0 64 64"
                        style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                        <g>
                            <path
                                d="M4.24 57.44v3.2c0 .87.71 1.59 1.59 1.59h31.72c.87 0 1.59-.71 1.59-1.59v-3.17l3.22-17.68c.08-.46-.04-.94-.35-1.3-.3-.36-.74-.57-1.21-.57h-1.33c-.39-1.39-.92-3.15-1.48-4.42-1.28-2.87-7.26-3.88-10.69-4.22a1.11 1.11 0 0 1-.47-.17c-.27-.18-.44-.49-.44-.84v-2.69c3.26-2.64 3.52-7.72 3.53-8.57.35-.77 2.41-5.54 1.9-8.48-.46-2.67-2.22-3.62-2.95-3.9-.27-.89-1.5-3.16-6.95-2.84-6.51.37-9.51 6.06-9.82 7.97-.3 1.82 1.21 7.18 1.38 7.79 0 .01.01.01.02.02.14 1.84.76 5.81 3.51 8.01v2.68a1.001 1.001 0 0 1-.88 1c-3.46.34-9.44 1.35-10.72 4.22-.44 1-.94 2.49-1.47 4.42H2.61c-.47 0-.92.21-1.22.58-.3.36-.42.84-.33 1.29l3.21 17.65zm33.3 3.77H5.83c-.31 0-.57-.26-.57-.57v-2.72h32.86v2.72c0 .31-.26.57-.57.57zM25.47 30.02c-.08.08-.16.15-.24.23-.07.06-.13.12-.2.18-.09.07-.18.13-.27.2-.07.05-.14.11-.21.15-.09.06-.2.11-.29.17-.07.04-.15.09-.22.12-.11.05-.22.09-.32.14-.08.03-.15.07-.23.09-.12.04-.24.07-.35.1-.08.02-.15.05-.22.06-.13.03-.27.05-.41.07-.07 0-.13.03-.2.03a6.28 6.28 0 0 1-1.24 0c-.05 0-.09-.02-.14-.02-.16-.02-.31-.04-.46-.08-.08-.02-.15-.04-.22-.06-.12-.03-.24-.06-.36-.1-.08-.03-.16-.07-.24-.1-.1-.04-.21-.08-.31-.13-.09-.04-.17-.1-.26-.14-.09-.05-.17-.09-.26-.14-.08-.05-.16-.12-.24-.18s-.16-.11-.23-.17-.14-.13-.21-.2-.15-.13-.22-.21c-.06-.06-.11-.13-.17-.2-.07-.08-.14-.16-.21-.25.31-.36.49-.83.49-1.33v-1.99s.06.03.09.04c.09.05.18.08.27.12.23.11.47.21.71.29.11.04.23.07.35.11.24.07.5.12.75.17.11.02.22.04.34.06.37.05.75.08 1.15.08s.78-.03 1.15-.08c.12-.01.23-.04.34-.06.26-.04.51-.1.75-.17.12-.03.24-.07.35-.11.24-.08.48-.18.71-.29.09-.04.19-.08.28-.13.03-.02.06-.03.09-.04v1.99c0 .5.18.96.49 1.32a2 2 0 0 1-.19.22l-.18.21zM13.1 9.93c.23-1.47 2.93-6.77 8.87-7.12.34-.02.67-.03.97-.03 4.63 0 4.97 2.21 4.98 2.3.02.21.18.39.39.44.08.02 2.05.54 2.5 3.18.27 1.55-.32 3.79-.9 5.5v-.5c0-3.35-2.12-5.7-2.21-5.8a.463.463 0 0 0-.39-.16c-.15 0-.29.08-.38.19-.45.57-2.06.73-3.76.9-1 .1-2.13.21-3.26.42-3.34.64-5.12 2.74-5.2 2.82a.53.53 0 0 0-.11.21l-.67 2.98c-.47-1.93-.99-4.4-.83-5.35zm1.4 7.43 1.07-4.71c.36-.38 1.93-1.89 4.53-2.39 1.08-.2 2.19-.31 3.17-.41 1.72-.17 3.14-.31 3.99-.87.55.75 1.64 2.51 1.64 4.72v3.19c0 .06-.04 5.59-3.33 8.04-1.05.79-2.35 1.19-3.88 1.19s-2.82-.4-3.87-1.19c-2.67-1.97-3.21-5.93-3.31-7.58zM6.32 33.91c1.14-2.56 7.86-3.42 9.9-3.62.17-.02.33-.06.48-.12 1.01 1.36 2.53 2.21 4.24 2.41.24.03.49.04.74.04s.5-.01.74-.04c.08 0 .16-.03.24-.04.16-.02.32-.05.48-.08.09-.02.17-.05.26-.08.15-.04.29-.08.43-.13.09-.03.18-.07.26-.11.13-.05.27-.1.4-.17.09-.04.17-.1.25-.14.12-.07.25-.13.37-.21.08-.05.16-.12.24-.18.11-.08.23-.16.33-.25.08-.07.15-.14.23-.21.1-.09.2-.18.3-.28.07-.08.14-.17.21-.25.08-.1.17-.19.25-.29.15.06.32.1.49.12 2.03.2 8.74 1.06 9.88 3.62.41.93.88 2.31 1.36 4.01H4.97c.49-1.75.95-3.1 1.35-4.01zm-4.17 5.23a.58.58 0 0 1 .44-.21h38.2a.572.572 0 0 1 .56.67L38.2 56.89H5.17l-3.15-17.3a.58.58 0 0 1 .12-.46z"
                                fill="#000000" opacity="1" data-original="#000000" class=""></path>
                            <path
                                d="M21.68 51.49c1.6 0 3.09-.96 3.64-2.34.42-1.05.29-2.24-.35-3.18-.69-1.02-1.89-1.61-3.29-1.61s-2.6.59-3.29 1.61c-.64.94-.77 2.13-.35 3.18.55 1.38 2.05 2.34 3.64 2.34zm-2.45-4.95c.51-.75 1.38-1.16 2.45-1.16s1.94.41 2.45 1.16c.45.66.54 1.49.25 2.23-.4 1-1.51 1.7-2.7 1.7s-2.3-.7-2.7-1.7c-.29-.74-.2-1.57.25-2.23zM37.83 27.23c.45.45 1.05.7 1.69.7s1.24-.25 1.69-.7.7-1.05.7-1.69-.25-1.24-.7-1.69l-2.67-2.67 2.67-2.67c.45-.45.7-1.05.7-1.69s-.25-1.24-.7-1.69c-.9-.9-2.48-.9-3.39 0l-4.37 4.37c-.93.93-.93 2.45 0 3.39l4.37 4.37zm-3.65-7.03 4.37-4.37c.26-.26.61-.4.97-.4a1.37 1.37 0 0 1 .97 2.34l-3.03 3.03c-.2.2-.2.52 0 .72l3.03 3.03c.26.26.4.61.4.97s-.14.71-.4.97c-.52.52-1.43.52-1.95 0l-4.37-4.37c-.54-.54-.54-1.41 0-1.95zM53.85 25.54c0 .64.25 1.24.7 1.69s1.05.7 1.69.7 1.24-.25 1.69-.7l4.37-4.37c.93-.93.93-2.45 0-3.39l-4.37-4.37c-.9-.91-2.48-.9-3.39 0-.45.45-.7 1.05-.7 1.69s.25 1.24.7 1.69l2.67 2.67-2.67 2.67c-.45.45-.7 1.05-.7 1.69zm1.42-.97 3.03-3.03c.2-.2.2-.52 0-.72l-3.03-3.03c-.26-.26-.4-.61-.4-.97a1.37 1.37 0 0 1 2.34-.97l4.37 4.37c.54.54.54 1.41 0 1.95l-4.37 4.37c-.52.52-1.43.52-1.95 0-.26-.26-.4-.61-.4-.97s.14-.71.4-.97zM45.89 27.85c.34.17.71.26 1.08.26.46 0 .91-.13 1.29-.39.54-.33.92-.88 1.05-1.5l1.85-8.67a2.39 2.39 0 0 0-1.84-2.84 2.39 2.39 0 0 0-2.84 1.84l-1.83 8.56c-.24 1.13.27 2.26 1.24 2.75zm-.24-2.54 1.83-8.56c.14-.65.71-1.09 1.35-1.09.09 0 .19 0 .29.03.74.16 1.22.89 1.06 1.64L48.33 26c-.08.35-.29.66-.61.86-.41.27-.91.3-1.36.08-.55-.27-.84-.96-.7-1.63z"
                                fill="#000000" opacity="1" data-original="#000000" class=""></path>
                        </g>
                    </svg>
                </div>
                <h3 class="service-title">Coding</h3>
                <p class="service-description">Problem solvers </p>
            </div>
        </div>
    </section>


    <!-- contact -->
    <section id="contact" class="contact" data-animate="slideIn">
        <div class="contact-header">
            <h2 class="contact-title">Contact <span>Me</span></h2>
            <p class="contact-description">"Feel free to reach out if you have any questions, want to collaborate, or
                just want to say hi! I’m always open to
                exciting opportunities."</p>
        </div>

        <div class="contact-content">
            <div class="contact-info">
                <div class="contact-item">
                    <span class="contact-label">Address</span>
                    <span class="contact-text">Dhaka,Bangladesh </span>
                </div>
                <div class="contact-item">
                    <span class="contact-label">Phone</span>
                    <span class="contact-text">+8801819244379</span>
                </div>
                <div class="contact-item">
                    <span class="contact-label">E mail</span>
                    <span class="contact-text">jahidulislamdiu02@gmail.com</span>
                </div>
                <div class="contact-item">
                    <span class="contact-label">Website</span>
                    <span class="contact-text">www.abc.xyz.com</span>
                </div>
            </div>

            <form class="contact-form" method="post">
                <p id="msg">
                    <?php echo $msg; ?>
                </p>
                <input type="text" class="form-input" placeholder="Name" name="name" onclick="hide()" required>
                <textarea class="form-textarea" name="message" placeholder="Message" onclick="hide()"
                    required></textarea>
                <button type="submit" class="cta-button">Contact us</button>
            </form>
        </div>
    </section>

    <footer class="footer">
        <div class="footer-logo">About<span style="color: #ffc107;">Me</span>.</div>
        <p class="footer-text">"Feel free to reach out if you have any questions, want to collaborate, or just want to
            say hi! I’m always open to
            exciting opportunities."</p>
        <div class="social-links">
            <a href=https://www.facebook.com/jahid.islam.52090 class="social-link">
                <svg width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                    <path
                        d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z" />
                </svg>
            </a>
            <a href="https://x.com/Jahidul_Islam02" class="social-link">
                <svg width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                    <path
                        d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z" />
                </svg>
            </a>
            <a href="https://www.linkedin.com/in/app-developer-jahidul/" class="social-link">
                <svg width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                    <path
                        d="M4.98 3.5c0 1.381-1.11 2.5-2.48 2.5s-2.48-1.119-2.48-2.5c0-1.38 1.11-2.5 2.48-2.5s2.48 1.12 2.48 2.5zm.02 4.5h-5v16h5v-16zm7.982 0h-4.968v16h4.969v-8.399c0-4.67 6.029-5.052 6.029 0v8.399h4.988v-10.131c0-7.88-8.922-7.593-11.018-3.714v-2.155z" />
                </svg>
            </a>
            <a href="https://www.instagram.com/jr_jahidul_/" class="social-link">
                <svg width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                    <path
                        d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
                </svg>
        </div>
    </footer>

    <script>
        // Mobile menu toggle
        const menuButton = document.querySelector('.menu-button');
        const navLinks = document.querySelector('.nav-links');

        menuButton.addEventListener('click', () => {
            navLinks.classList.toggle('active');
        });

        // Smooth scroll for navigation links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth'
                    });
                    // Close mobile menu if open
                    navLinks.classList.remove('active');
                }
            });
        });
        function hide() {
            document.getElementById("msg").style.display = "none";
        }

        // Navbar scroll effect
    </script>
    <script src="./js/main.js"></script>
</body>

</html>