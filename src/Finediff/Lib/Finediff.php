<?php

namespace Gummibeer\Finediff\Lib;

use cogpowered\FineDiff\Diff;
use cogpowered\FineDiff\Granularity\Character;
use cogpowered\FineDiff\Granularity\Paragraph;
use cogpowered\FineDiff\Granularity\Sentence;
use cogpowered\FineDiff\Granularity\Word;
use cogpowered\FineDiff\Render\Html;
use cogpowered\FineDiff\Render\Text;
use Gummibeer\Finediff\Contracts\FinediffContract;

class Finediff implements FinediffContract
{
    public function getOpCode($stringOne, $stringTwo, $granularity = 'word')
    {
        return $this->getEngine($granularity)->getOpcodes($stringOne, $stringTwo);
    }

    public function getHtmlByOpCode($stringOne, $opCode, $granularity = 'word')
    {
        return $this->getRenderer('html')->process($stringOne, $opCode);
    }

    public function getHtmlByStrings($stringOne, $stringTwo, $granularity = 'word')
    {
        $opCode = $this->getOpCode($stringOne, $stringTwo);

        return $this->getHtmlByOpCode($stringOne, $opCode, $granularity);
    }

    public function getTextByOpCode($stringOne, $opCode, $granularity = 'word')
    {
        return $this->getRenderer('text')->process($stringOne, $opCode);
    }

    public function getTextByStrings($stringOne, $stringTwo, $granularity = 'word')
    {
        $opCode = $this->getOpCode($stringOne, $stringTwo);

        return $this->getTextByOpCode($stringOne, $opCode, $granularity);
    }

    protected function getRenderer($type)
    {
        switch ($type) {
            case 'text':
                return new Text();
                break;
            case 'html':
                return new Html();
                break;
            default:
                return new Html();
                break;
        }
    }

    protected function getEngine($granularity)
    {
        return new Diff($this->getGranularity($granularity));
    }

    protected function getGranularity($granularity)
    {
        switch ($granularity) {
            case 'character':
                return new Character();
                break;
            case 'word':
                return new Word();
                break;
            case 'sentence':
                return new Sentence();
                break;
            case 'paragraph':
                return new Paragraph();
                break;
            default:
                return new Word();
                break;
        }
    }
}
