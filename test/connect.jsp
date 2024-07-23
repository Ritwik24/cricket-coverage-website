<%@ page import = "java.sql.*"%>
<%
String firstname = request.getParameter("fname");
String lastname = request.getParameter("lname");
String email = request.getParameter("email");
String password = request.getParameter("password");
String state = request.getParameter("state");
String mobile = request.getParameter("mobile");

try{
    Class.forName("com.mysql.jdbc.Driver");
    Connection conn = DriverManager.getConnection("jdbc:mysql://localhost:3306/test","root","1234");
    PreparedStatement ps = conn.prepareStatement("insert into registration(firstName, lastName, email, password, state, mobile) values(?,?,?,?,?,?);");
    ps.setString(1,firstname);
    ps.setString(2,lastname);
    ps.setString(3,email);
    ps.setString(4,password);
    ps.setString(5,state);
    ps.setString(6,mobile);
    int x = ps.executeUpdate();
    response.sendRedirect("index.html");

}catch(Exception e){
    out.println(e);
}

%>
