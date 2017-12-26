<?php require_once("session.php"); ?>

<?php require_once("functions.php"); ?>

<?php connect_db(); ?>

<?php add_news($link); ?>

<?php include_once("includes/header.php"); ?>

<?php login_reg_url(); ?>

<?php get_message($report); ?>

<?php include_once("/forms/add_news_form.html"); ?>

<?php include_once("includes/footer.php"); ?>