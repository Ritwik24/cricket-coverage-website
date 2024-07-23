<%@ page import="java.sql.*, java.io.*" %>
<%@ page language="java" contentType="text/html; charset=UTF-8" pageEncoding="UTF-8"%>
<%@ page import="java.net.URLEncoder" %>
<%@ page import="java.net.URLDecoder" %>
<%@ page import="jakarta.servlet.http.Cookie" %>
<%
    // Retrieve favorite player and team from cookies
    String favPlayer = "";
    String favTeam = "";
    Cookie[] cookies = request.getCookies();
    if (cookies != null) {
        for (Cookie cookie : cookies) {
            if (cookie.getName().equals("favPlayer")) {
                favPlayer = URLDecoder.decode(cookie.getValue(), "UTF-8");
            } else if (cookie.getName().equals("favTeam")) {
                favTeam = URLDecoder.decode(cookie.getValue(), "UTF-8");
            }
        }
    }
%>
<!DOCTYPE html>
<html>
<head>
    <title>Profile Page</title>
    <link rel="stylesheet" href="styles.css">
    <style>
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
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color:  #f0e0d1;
        }
        .container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
        }
        h2 {
            margin-top: 0;
            color: #333;
        }
        form {
            margin-top: 20px;
        }
        label {
            font-weight: bold;
        }
        input[type="text"] {
            width: 100%;
            padding: 8px;
            margin-top: 6px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        .fantasy {
            background-color: blue; 
            border: none;
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 8px 2px;
            cursor: pointer;
            border-radius: 8px;
            transition-duration: 0.4s;
        }

        fantasy:hover {
            background-color: #45a049; /* Darker Green */
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
    <div class="container">
        <h2>Profile</h2>
        <%
            String sess = (String) session.getAttribute("email");
            if (sess != null) {
                // User is logged in, retrieve user information from the database
                String firstName = "";
                String lastName = "";
                String email = "";
                String state = "";
                String mobile = "";

                try {
                    Class.forName("com.mysql.jdbc.Driver");
                    Connection conn = DriverManager.getConnection("jdbc:mysql://localhost:3306/test", "root", "1234");
                    PreparedStatement ps = conn.prepareStatement("SELECT * FROM registration WHERE email=?");
                    ps.setString(1, sess);
                    ResultSet rs = ps.executeQuery();

                    if (rs.next()) {
                        firstName = rs.getString("firstName");
                        lastName = rs.getString("lastName");
                        email = rs.getString("email");
                        state = rs.getString("state");
                        mobile = rs.getString("mobile");
                    }
                } catch (Exception e) {
                    e.printStackTrace();
                }

                // Display user information
                %>
                <p><strong>First Name:</strong> <%= firstName %></p>
                <p><strong>Last Name:</strong> <%= lastName %></p>
                <p><strong>Email:</strong> <%= email %></p>
                <p><strong>State:</strong> <%= state %></p>
                <p><strong>Mobile:</strong> <%= mobile %></p>
                <%
            } else {
                // User is not logged in, redirect to the index page
                response.sendRedirect("index.html");
            }
        %>

        <form action="updateProfile" method="post">
        <label for="favPlayer">Favorite Player:</label>
        <input type="text" id="favPlayer" name="favPlayer" value="<%= favPlayer %>" <% if (!favPlayer.isEmpty()) { %>readonly<% } %>><br>

        <label for="favTeam">Favorite Team:</label>
        <input type="text" id="favTeam" name="favTeam" value="<%= favTeam %>" <% if (!favTeam.isEmpty()) { %>readonly<% } %>><br>

        <input type="submit" value="Save">
    </form>

        <form action="logout" method="post">
            <input type="submit" value="Logout">
        </form>
        <button onclick="window.location.href = 'buildteam.html';" class="fantasy">Fantasy Centre</button>
    </div>
</body>
</html>
