<?php

class UsersStaticWebPageGenerator
{
    /**
     * UsersStaticWebPageGenerator constructor.
     */
    public function __construct()
    {
    }

    public function generateFile(array $users)
    {
        $f = fopen("html/users.html", 'w');
        fwrite($f, "<!doctype html>");
        fwrite($f, "<html lang=\"en\">");
        fwrite($f, "<head>");
        fwrite($f, "<meta charset=\"utf-8\">");
        fwrite($f, "<meta name=\"viewport\" content=\"width=device-width, initial-scale=1, shrink-to-fit=no\">");

        fwrite($f, "<title>User biographies</title>");

        fwrite($f, "<!-- Bootstrap core CSS -->");
        fwrite($f,
            "<link rel=\"stylesheet\" href=\"https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css\" integrity=\"sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4\" crossorigin=\"anonymous\">");

        fwrite($f, "<!-- Custom styles for this template -->");
        fwrite($f, "<link href=\"assets/cover.css\" rel=\"stylesheet\">");
        fwrite($f, "</head>");

        fwrite($f, "<body class=\"text-center\">");

        fwrite($f, "<div class=\"cover-container d-flex w-100 h-100 p-3 mx-auto flex-column\">");
        fwrite($f, "<header class=\"masthead mb-auto\">");
        fwrite($f, "<div class=\"inner\">");
        fwrite($f, "<h3 class=\"masthead-brand\">Users Biography</h3>");
        fwrite($f, "<nav class=\"nav nav-masthead justify-content-center\">");
        fwrite($f, "<a class=\"nav-link active\" href=\"#\">Home</a>");
        fwrite($f, "<a class=\"nav-link\" href=\"#\">Features</a>");
        fwrite($f, "<a class=\"nav-link\" href=\"#\">Contact</a>");
        fwrite($f, "</nav>");
        fwrite($f, "</div>");
        fwrite($f, "</header>");

        fwrite($f, "<main role=\"main\" class=\"inner cover\">");
        foreach ($users as $user) {
            fwrite($f, "<h1 class=\"cover-heading\">" . $user->getName()."</h1>\n");
            fwrite($f, "<p class=\"lead\">" . $user->getBiography() . "</p>\n");
        }
        fwrite($f, "</main>");

        fwrite($f, "<footer class=\"mastfoot mt-auto\">");
        fwrite($f, "<div class=\"inner\">");
        fwrite($f,
            "<p>Sprout class kata created by Codium <a href=\"https://twitter.com/CodiumTeam\">@CodiumTeam</a>. Cover template for <a href=\"https://getbootstrap.com/\">Bootstrap</a>, by <a href=\"https://twitter.com/mdo\">@mdo</a>.</p>");
        fwrite($f, "</div>");
        fwrite($f, "</footer>");
        fwrite($f, "</div>");

        fwrite($f, "<!-- Bootstrap core JavaScript");
        fwrite($f, "        ================================================== -->");
        fwrite($f, "<!-- Placed at the end of the document so the pages load faster -->");
        fwrite($f,
            "<script src=\"https://code.jquery.com/jquery-3.3.1.slim.min.js\" integrity=\"sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo\" crossorigin=\"anonymous\"></script>");
        fwrite($f,
            "<script src=\"https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js\" integrity=\"sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ\" crossorigin=\"anonymous\"></script>");
        fwrite($f,
            "<script src=\"https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js\" integrity=\"sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm\" crossorigin=\"anonymous\"></script>");
        fwrite($f, "</body>");
        fwrite($f, "</html>");

        fclose($f);
    }
}