<?php require_once("session.php"); ?>
<?php //session_start(); ?>

<?php require_once("functions.php"); ?>

<?php connect_db(); ?>

<?php include_once("includes/header.php"); ?>

<?php login_reg_url(); ?>

<?php add_news_url(); ?>

<?php get_news(); ?>

<?php include_once("includes/footer.php"); ?>