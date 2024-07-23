import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import javax.servlet.http.HttpSession;
import java.io.IOException;
import java.io.PrintWriter;


public class WelcomeServlet extends javax.servlet.http.HttpServlet {
    protected void doGet(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        response.setContentType("text/html");
        PrintWriter out = response.getWriter();

        HttpSession session = request.getSession();
        if (session != null) {
            String sessionId = session.getId();
            String username = (String) session.getAttribute("username");

            out.println("<html><body>");
            out.println("<h1>Welcome, " + username + "</h1>");
            out.println("<p>Session ID: " + sessionId + "</p>");
            out.println("</body></html>");
        } else {
            out.println("<html><body>");
            out.println("<h1>No session found</h1>");
            out.println("</body></html>");
        }
    }
}
