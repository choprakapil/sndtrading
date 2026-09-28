<?php
// Entrypoint for Vercel Serverless Function
chdir(dirname(__DIR__));
require_once dirname(__DIR__) . '/router.php';
