<?php

namespace App\Conversations;

use BotMan\BotMan\Messages\Conversations\Conversation;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Outgoing\Question;
use VMA\Admin\Model\Product;
use BotMan\BotMan\Messages\Attachments\Image;
use BotMan\BotMan\Messages\Outgoing\OutgoingMessage;
use BotMan\BotMan\Middleware\ApiAi;


class TourInforOptionConversation extends Conversation
{
    /**
     * First question
     */
    /**
     * First question
     */
    protected $name;
    protected $email;
    protected $ask;
    public $product;
    public function askReason()
    {

        $this->ask('Hello! What is your nam?', function (Answer $answer) {
            // Save result
            $this->name = $answer->getText();

            $this->say('Nice to meet you ' . $this->name);
//            $this->askEmail();
            $this->askRequire();

        });
    }

    public function askRequire()
    {
        $this->ask('What do you want to us about our tour ?', function (Answer $answer) {
            $this->ask = $answer->getText();
//            $require = $this->ask;
            $check = $this->checkRequire($answer->getText());
//            $this->say($check);
            $this->bot->startConversation(new StopConversation());
        });

    }

    public function checkRequire($require)
    {
        $check = [];
        $this->product = new Product();
        $product = $this->product->search($require)->first();
        if(isset($check)){
            $attachment = new Image(url('images/product').'/'.$product->image);
            $message = OutgoingMessage::create("You mean that you want to ask about product ".$product->name.'? your product infor is:name'.$product->name.' ;price:'.$product->price.'; description:'.$product->description)
                ->withAttachment($attachment);

            // Reply message object
            $this->bot->reply($message);
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
