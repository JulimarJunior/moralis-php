<?php
    namespace Moralis;

    class NFT {
        private $request;

        function __construct($token) {
            $this->request = new Request($token);
        }

        function getNFTs($address, $options) {
            $url  = "https://deep-index.moralis.io/api/v2/$address/nft";
            $nfts = $this->request->get($url, $options);

            if($nfts['result']) {
                foreach($nfts['result'] as $key => $nft) {
                    $nfts['result'][$key]['metadata'] = json_decode($nft['metadata'], true);
                }
            }
                
            return $nfts;
        }
    }