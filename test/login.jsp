<%@ page import="java.sql.*" %>
<%
String email = request.getParameter("email");
String password = request.getParameter("password");

try {
    Class.forName("com.mysql.jdbc.Driver");
    Connection conn = DriverManager.getConnection("jdbc:mysql://localhost:3306/test", "root", "1234");
    PreparedStatement ps = conn.prepareStatement("SELECT * FROM registration WHERE email=? AND password=?");
    ps.setString(1, email);
    ps.setString(2, password);
    ResultSet rs = ps.executeQuery();

    if (rs.next()) {
        // User authenticated, redirect to dashboard or home page
        session.setAttribute("email", email);
        response.sendRedirect("http://localhost/search/cricscore.php");
    } else {
        // Invalid credentials, show error message
        out.println("Invalid email or password");
    }
} catch (Exception e) {
    out.println(e);
}
%>
