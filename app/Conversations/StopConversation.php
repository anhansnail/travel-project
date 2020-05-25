<?php

namespace App\Conversations;

use BotMan\BotMan\Messages\Conversations\Conversation;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Incoming\IncomingMessage;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Outgoing\Question;

class StopConversation extends Conversation
{
    /**
     * First question
     */
    public function askReason()
    {
        $question = Question::create("Do you want to continue to ask?")
            ->fallback('Unable to ask question')
            ->callbackId('yes_no_question')
            ->addButtons([
                Button::create('Yes')->value('yes'),
                Button::create('No')->value('no'),
            ]);

        return $this->bot->ask($question, function (Answer $answer) {
//            dd($answer->getValue());
            if ($answer->isInteractiveMessageReply()) {
                $value = $answer->getValue();
                switch ($value) {
                    case 'yes':
                        $this->bot->startConversation(new ChatbotOptionConversation());
                        break;
                    case 'no':
                        $this->say("Goodbye!");
//                        $this->stopsConversation();
                        break;
                }
            }
        });
    }


    public function stopsConversation(IncomingMessage $message)
    {
        if ($message->getText() == 'stop') {
            return true;
        }

        return false;
    }


    public function skipsConversation(IncomingMessage $message)
    {
        if ($message->getText() == 'pause') {
            return true;
        }

        return false;
    }


    /**
     * Start the conversation
     */
    public function run()
    {
        $this->askReason();

    }
}
