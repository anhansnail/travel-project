<?php

namespace App\Conversations;

use BotMan\BotMan\Messages\Attachments\Image;
use BotMan\BotMan\Messages\Conversations\Conversation;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Outgoing\OutgoingMessage;
use BotMan\BotMan\Messages\Outgoing\Question;
use Exception;
use VMA\Admin\Model\Product;


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

        $this->ask('Hello! ', function (Answer $answer) {
            // Save result
//            $this->name = $answer->getText();

//            $this->say('Nice to meet you ' . $this->name);
//            $this->askEmail();
            $this->askRequire();

        });
    }

    public function askRequire()
    {
        $this->ask('What do you want to ask about our tour ?', function (Answer $answer) {
//            $this->ask = $answer->getText();
//            $require = $this->ask;
            $check = $this->checkRequire($answer->getText());
        });

    }

    public function checkRequire($require)
    {
        $product = [];
        $this->product = new Product();
        try {

            $product = $this->product->search($require)->get();
        if (isset($product)) {
            $buttons = [];
            foreach ($product as $p) {
                $button = Button::create($p->name)->value($p->id);
                $buttons[] = $button;
            }
            $question = Question::create("Chose you want?")
                ->fallback('Unable to ask question')
                ->callbackId('ask_reason')
                ->addButtons($buttons);;
            return $this->bot->ask($question, function (Answer $answer) {

                if ($answer->isInteractiveMessageReply()) {
                    $value = $answer->getValue();
                    $product = Product::find($value);
                    $attachment = new Image(url('images/product') . '/' . $product->image);
                    $message = OutgoingMessage::create("You mean that you want to ask about product " . $product->name . '? your product infor is:name' . $product->name . ' ;price:' . $product->price . '; description:' . $product->description)
                        ->withAttachment($attachment);
                    //reply
                    $this->bot->reply($message);
//after, book or quit
                    $ques = Question::create("Do you want to book this tour?")
                        ->fallback('question')
                        ->callbackId('ask')
                        ->addButtons([Button::create('Yes')->value('yes'), Button::create('No')->value('no')]);
                    return $this->bot->ask($ques, function (Answer $answer) use ($product) {

                        if ($answer->isInteractiveMessageReply()) {
                            $value = $answer->getValue();
                            switch ($value) {
                                case 'yes':
                                    app(new BookingConversation())->addBooking($product);
                                    break;
                                case 'no':
//                        $this->stopsConversation('Bye!');
                                    $this->bot->reply('Bye!');
                                    break;
                            }
                        }
                    });
                }
            });

        } else {
            return "Sorry, We couldn't found your answer, please ask other question!";
        }}catch (Exception $exception){
            return "Sorry, We couldn't found your service, ask again";
        }
    }

    public function askBooking($product)
    {
        $ques = Question::create("Do you want to book this tour?")
            ->fallback('question')
            ->callbackId('ask')
            ->addButtons([Button::create('Yes')->value('yes'), Button::create('No')->value('no')]);
        return $this->bot->ask($ques, function (Answer $answer) {

            if ($answer->isInteractiveMessageReply()) {
                $value = $answer->getValue();
                switch ($value) {
                    case 'yes':
                        break;
                    case 'no':
//                        $this->stopsConversation('Bye!');
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
