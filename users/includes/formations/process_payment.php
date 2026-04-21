<?php

require_once '../../../includes/stripe-php/init.php';

include '../../../includes/config.inc.php';
include '../../../includes/db.inc.php';

@session_start();

include $arrConfig['dir_site'] . "/users/userverification.php";

\Stripe\Stripe::setApiKey($stripe['secret_key']);

$userID = $_SESSION['user']['id'];
$formationID = $_POST['formation_id'];
$formation = my_query("SELECT * FROM formations WHERE id = $formationID")[0];

// Criar uma nova sessão de checkout
$session = \Stripe\Checkout\Session::create([
    'payment_method_types' => ['card'],
    'line_items' => [[
        'price_data' => [
            'currency' => 'eur',
            'product_data' => [
                'name' => $formation['name'],
                'description' => $formation['description'],
                'images' => [$formation['image']],
            ],
            'unit_amount' => $formation['unit_price'],
        ],
        'quantity' => 1,
    ]],
    'mode' => 'payment',
    'success_url' => $arrConfig['url_site'] . '/users/formations/success.php?session_id={CHECKOUT_SESSION_ID}&formation_id=' . $formationID,
    'cancel_url' => $arrConfig['url_site'] . '/users/formations/cancel.php',
]);

header("Location: " . $session->url);
