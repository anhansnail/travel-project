<?php

namespace App\Conversations;

use BotMan\BotMan\Messages\Conversations\Conversation;
use BotMan\BotMan\Messages\Incoming\Answer;
use VMA\Admin\Model\Question_answer;


class QAndAConversation extends Conversation
{
    /**
     * First question
     */
    protected $firstname;
    protected $email;
    protected $ask;
    public $__q_and_a;
    public function askReason()
    {

        $this->ask('Hello! What is your firstname?', function (Answer $answer) {
            // Save result
            $this->firstname = $answer->getText();

            $this->say('Nice to meet you ' . $this->firstname);
//            $this->askEmail();
            $this->askRequire();

        });
    }

    public function askRequire()
    {
        $this->ask('May i have you about any question ?', function (Answer $answer) {
            $this->ask = $answer->getText();
//            $require = $this->ask;
            $check = $this->checkRequire($answer->getText());
            $this->say($check);
            $this->bot->startConversation(new StopConversation());
        });

    }

    public function checkRequire($require)
    {
        $check = [];
        $this->__q_and_a = new Question_answer();
        $check = $this->__q_and_a->search($require)->first();
        if(isset($check)){
            return "You mean that you want to ask ".$check->question.'? your answer is:'.$check->answer;
        }else{
            return "Sorry, We couldn't found your answer, please ask other question!";
        }
    }

    public function askEmail()
    {
        $this->ask('One more thing - what is your email?', function (Answer $answer) {
            // Save result
            $this->email = $answer->getText();

            $this->say('Great - that is all we need, ' . $this->firstname);
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
