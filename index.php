<?php

require_once "vendor/autoload.php";

use Phpfastcache\Helper\Psr16Adapter;

$instagram = \InstagramScraper\Instagram::withCredentials(new \GuzzleHttp\Client(), 'techkangipul', 'Fikriqwerty23', new Psr16Adapter('Files'));
$instagram->login();
$account = $instagram->getAccountById(3);
$account = $instagram->getAccount('kevin');

$json = [
    'id' => $account->getId(),
    'username' => $account->getUsername(),
    'full_name' => $account->getFullName(),
    'biography' => $account->getBiography(),
    'profile_picture_url' => $account->getProfilePicUrl(),
    'external_link' => $account->getExternalUrl(),
    'number_published_posts' => $account->getMediaCount(),
    'number_followers' => $account->getFollowsCount(),
    'number_follows' => $account->getFollowedByCount(),
    'is_private' => $account->isPrivate(),
    'is_verified' => $account->isVerified()
];

header('content-type: application/json');
echo json_encode($json);
