<?php

if ($_SESSION["user"] ?? false) {
    header("Location: /dashboard");
} else {
    header("Location: /login");
}
