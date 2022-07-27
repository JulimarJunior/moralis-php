<?php
    header('Content-Type: application/json; charset=utf-8');

    require_once('src/Request.php');
    require_once('src/NFT.php');

    $token = 'PqSEV1LSRzksxadkFj9SdL1OTZkhfCUKu1rk4X5YiezCVLz027Gh51LQue5E7zGq';
    $nft   = new Moralis\NFT($token);

    $address = '0x9eEF696409a1f0dDC34aEDBa1364bE31336f963e';
    $options = [
        'chain'  => 'matic',
        'format' => 'decimal'
    ];
    
    $nfts = $nft->getNFTs($address, $options);

    echo json_encode($nfts);