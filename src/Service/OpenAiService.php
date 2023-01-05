<?php

namespace App\Service;

use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Orhanerday\OpenAi\OpenAi;

class OpenAiService 
{
    public function __construct(
        ParameterBagInterface $parameterBag
    ){
    }

    public function getManga(string $style): string
    {
        $open_ai_key = $this->parameterBag->get('OPENAI_API_KEY');
        $open_ai = new OpenAi($open_ai_key);

        $complete = $open_ai->completion([
            'model' => 'text-davinci-003',
            'prompt' => 'Donne moi le top 10 des mangas qui correspondent au style suivant: '.$style,
            'temperature' => 0,
            'max_tokens' => 150,
            'frequency_penalty' => 0.5,
            'presence_penalty' => 0,
        ]);

        dd($complete);

        return 'history';
    }
}