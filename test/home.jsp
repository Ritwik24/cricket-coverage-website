<%@ page language="java" contentType="text/html; charset=UTF-8" pageEncoding="UTF-8" %>
<%@ page import="java.io.*,java.util.*,java.sql.*" %>
<%
// Check if the user is logged in
String email = (String) session.getAttribute("email");
if (email == null) {
    // User is not logged in, redirect to login page
    response.sendRedirect("login.jsp");
}
%>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criclytics</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            background-color: #f0e0d1; /* Set your desired background color here */
        }
        .profile-icon {
            position: absolute;
            top: 10px; 
            left: 15px; 
        }
        .profile-icon img {
            width: 35px; 
            height: 35px; 
            border-radius: 50%; 
        }
    </style>
</head>
<body>
<header>
        <nav>
            <div class="container1">
                <nav>
                    <ul class="nav navbar-nav">
                    <li class="profile-icon">
                        <a class="profile-link" href="http://localhost:8080/test/profile.jsp">
                            <img src="profile-icon.jpg" alt="Profile Icon">
                        </a>
                        </li>
                        <li>
                            <a class="page-scroll" href="http://localhost/search/cricscore.php">HOME</a>
                        </li>
                        <li>
                            <a class="page-scroll" href="http://localhost/search/currmatches.php">MATCHES</a>
                        </li>
                        <li>
                            <a class="page-scroll" href="http://localhost/search/player_search.html">PLAYERS</a>
                        </li>
                        <li>
                            <a class="page-scroll" href="http://localhost/search/ipl.php">IPL</a>
                        </li>
                        <li>
                            <a class="page-scroll" href="http://localhost:8080/test/glossary.html">GLOSSARY</a>
                        </li>
                        <li>
                            <a class="page-scroll" href="http://localhost:8080/test/about.html">ABOUT</a>
                        </li>
                        <li>
                            <a class="page-scroll" href="http://localhost/search/admin.php">ADMIN PORTAL</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </nav>
    </header>
    <main>
        <section class="featured">
            <h2>Featured Matches</h2>
            <!-- Featured match cards will go here -->
        </section>
        <section class="news">
            <h2>Latest News</h2>
            <!-- News articles will go here -->
        </section>
    </main>
    <footer>
        <p>&copy; 2024 Criclytics</p>
    </footer>
</body>
</html>
