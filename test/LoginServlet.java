import jakarta.servlet.*;
import jakarta.servlet.http.*;
import java.io.IOException;

public class LoginServlet extends javax.servlet.http.HttpServlet {
    protected void doPost(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        String username = request.getParameter("username");
        // Authenticate user here (not shown)

        // Create a session and store the username
        HttpSession session = request.getSession();
        session.setAttribute("username", username);

        response.sendRedirect("welcome");
    }
}
