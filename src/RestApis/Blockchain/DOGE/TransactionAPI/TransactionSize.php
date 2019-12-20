<?php


namespace RestApis\Blockchain\DOGE\TransactionAPI;


use Common\Response;
use RestApis\Blockchain\DOGE\Common;
use RestApis\Blockchain\DOGE\Snippets\Fee;
use RestApis\Blockchain\DOGE\Snippets\Input;
use RestApis\Blockchain\DOGE\Snippets\Output;

class TransactionSize extends Common
{

    protected $network;

    /**
     * @param $network string
     * @param $inputs Input
     * @param $outputs Output
     * @param $fee Fee
     * @param $data string
     * @param $locktime integer
     * @return \stdClass
     */

    public function calculate($network, Input $inputs, Output $outputs, Fee $fee, $locktime = null, $data = null)
    {
        $this->network = $network;
        return (new Response(
            $this->request([
                'method' => 'POST',
                'params' =>  [
                    'inputs' => $inputs->get(),
                    'outputs' => $outputs->get(),
                    'fee' => $fee->get(),
                    'data' => $data,
                    'locktime' => $locktime,
                ]
            ])
        ))->get();
    }

    protected function getEndPoint()
    {
        return $this->endpoint . '/' . $this->network . '/txs/size';
    }
}
