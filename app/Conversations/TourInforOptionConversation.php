<?php

namespace App\Conversations;

use BotMan\BotMan\Messages\Conversations\Conversation;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Outgoing\Question;

class TourInforOptionConversation extends Conversation
{
    /**
     * First question
     */
    public function askReason()
    {
        $question = Question::create("Welcome my dear come to Minh Anh chatbot , and what do you want to ask about tour??")
            ->fallback('Unable to ask question')
            ->callbackId('ask_reason')
            ->addButtons([
                Button::create('Viet Nam Infomations')->value('vn_info'),
                Button::create('Tour Informations')->value('tour_info'),
                Button::create('Q&A')->value('q_and_a'),
                Button::create('Contact')->value('contact'),
            ]);

        return $this->bot->ask($question, function (Answer $answer) {
//            dd($answer->getValue());
            if ($answer->isInteractiveMessageReply()) {
                $value = $answer->getValue();
                switch ($value) {
                    case 'vn_info':
                        break;
                    case 'tour_info':
                        break;
                    case 'q_and_a':
                        $this->bot->startConversation(new QAndAConversation());
                        break;
                    case 'contatct':
                        break;
                }
            }
        });
    }

    /**
     * Start the conversation
     */
    public function run()
    {
        $this->askReason();
    }
}
