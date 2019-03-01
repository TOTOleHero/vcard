<?php

declare(strict_types=1);

namespace JeroenDesloovere\VCard\Parser\Property;

use JeroenDesloovere\VCard\Property\NodeInterface;
use JeroenDesloovere\VCard\Property\Telephone;
use JeroenDesloovere\VCard\Property\Parameter\Type;

final class TelephoneParser extends PropertyParser implements NodeParserInterface
{
    public function parseVcfString(string $value, array $parameters = []): NodeInterface
    {
        $telephone = new Telephone(str_replace('tel:', '', $value));
        
        if (array_key_exists(Type::getNode(), $parameters)) {
            $telephone->setType($parameters[Type::getNode()]);
        }
        
        return $telephone;
    }
}
