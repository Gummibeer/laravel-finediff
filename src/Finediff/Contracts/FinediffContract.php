<?php

namespace Gummibeer\Finediff\Contracts;

interface FinediffContract
{
    public function getHtmlByStrings($stringOne, $stringTwo, $granularity);

    public function getHtmlByOpCode($stringOne, $opCode, $granularity);

    public function getTextByStrings($stringOne, $stringTwo, $granularity);

    public function getTextByOpCode($stringOne, $opCode, $granularity);

    public function getOpCode($stringOne, $stringTwo, $granularity);
}
