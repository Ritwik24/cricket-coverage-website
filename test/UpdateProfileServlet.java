import java.io.IOException;
import javax.servlet.ServletException;
import javax.servlet.http.Cookie;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import java.net.URLEncoder;


public class UpdateProfileServlet extends HttpServlet {
    protected void doPost(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
        // Retrieve values from the form
        String favPlayer = request.getParameter("favPlayer");
        String favTeam = request.getParameter("favTeam");

        // Update cookies with new values
        Cookie favPlayerCookie = new Cookie("favPlayer", URLEncoder.encode(favPlayer, "UTF-8"));
        Cookie favTeamCookie = new Cookie("favTeam", URLEncoder.encode(favTeam, "UTF-8"));
        favPlayerCookie.setMaxAge(3600); // Set cookie expiration time (1 hour)
        favTeamCookie.setMaxAge(3600); // Set cookie expiration time (1 hour)
        response.addCookie(favPlayerCookie);
        response.addCookie(favTeamCookie);

        // Redirect back to profile page
        response.sendRedirect("profile.jsp");
    }
}

