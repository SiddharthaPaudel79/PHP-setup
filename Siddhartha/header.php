<?php
include 'header.php';
?>
<h2>
    welcome
</h2>
<p> This is the home page content</p>
<?php include 'folder.php';  ?>
<header>
    <h1>My site</h1>
    <nav>
        <a href = "index.php">Home</a>
        <a href = "about.php">About</a>
    </nav>
    <footer>
        <?php echo date('Y')?> My site
</footer>