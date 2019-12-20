<?php

namespace RestApis\Blockchain\ETC\TransactionApi;

use Common\Response;
use RestApis\Blockchain\ETC\Common;

class TransactionsIndexByBlockHash extends Common {

    protected $network;
    protected $blockHash;
    protected $txIndex;

    /**
     * @param $network string
     * @param $blochHash integer
     * @param $txIndex integer
     * @return \stdClass
     */

    public function get($network, $blochHash, $txIndex)
    {
        $this->network = $network;
        $this->blockHash = $blochHash;
        $this->txIndex = $txIndex;

        $params = [];
        return (new Response(
            $this->request([
                'method' => 'GET',
                'params' => $params
            ])
        ))->get();
    }

    protected function getEndPoint()
    {
        return $this->endpoint . '/' . $this->network . '/txs/block/' . $this->blockHash . '/' . $this->txIndex;
    }

}
