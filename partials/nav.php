<?php
require_once(__DIR__ . "/../lib/functions.php");
//Note: this is to resolve cookie issues with port numbers
$domain = $_SERVER["HTTP_HOST"];
if (strpos($domain, ":")) {
    $domain = explode(":", $domain)[0];
}
$localWorks = true; //some people have issues with localhost for the cookie params
//if you're one of those people make this false

//this is an extra condition added to "resolve" the localhost issue for the session cookie
if (($localWorks && $domain == "localhost") || $domain != "localhost") {
    session_set_cookie_params([
        "lifetime" => 60 * 60,
        "path" => "$BASE_PATH",
        //"domain" => $_SERVER["HTTP_HOST"] || "localhost",
        "domain" => $domain,
        "secure" => true,
        "httponly" => true,
        "samesite" => "lax"
    ]);
}
session_start();


?>
<!-- include css and js files -->
<link rel="stylesheet" href="<?php echo get_url('/../styles.css'); ?>">
<script src="<?php echo get_url('helpers.js'); ?>"></script>

<h1>
    Steven's Simple Bank
</h1>
<nav>
    <table> 
        <td>
            <button>
                <a href="<?php echo get_url('/../index.php'); ?>"> Home </a>
            </button>
        </td>
        <td>
            <?php if (is_logged_in()) : ?>
                <button><a href="<?php echo get_url('home.php'); ?>">Home</a></button>
                <button><a href="<?php echo get_url('profile.php'); ?>">Profile</a></button>
            <?php endif; ?>
        </td>
        <td> 
            <?php if (!is_logged_in()) : ?>
                <button><a href="<?php echo get_url('login.php'); ?>">Login</a></button>
                <button><a href="<?php echo get_url('register.php'); ?>">Register</a></button>
            <?php endif; ?>
        </td>
        <td>
           <?php if (has_role("Admin")) : ?>
                <button><a href="<?php echo get_url('admin/create_role.php'); ?>">Create Role</a></button>
                <button><a href="<?php echo get_url('admin/list_roles.php'); ?>">List Roles</a></button>
                <button><a href="<?php echo get_url('admin/assign_roles.php'); ?>">Assign Roles</a></button>
            <?php endif; ?> 
        </td>
        <td>
            <?php if (is_logged_in()) : ?>
                <button><a href="<?php echo get_url('logout.php'); ?>">Logout</a></button>
            <?php endif; ?>
        </td>
    </table>
</nav>