<?php

use Core\Session;

if (Session::has("user")) {
    redirect("/dashboard");
} else {
    redirect("/login");
}
