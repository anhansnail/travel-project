<?php

namespace App\Conversations;

use BotMan\BotMan\Messages\Conversations\Conversation;
use BotMan\BotMan\Messages\Incoming\Answer;
use VMA\Admin\Model\Contact;
use VMA\Admin\Services\CommonService;

class ContactOptionConversation extends Conversation
{

    /**
     * First question
     */
    public $name;
    public $email;
    public $phone;
    public $subject;
    public $message;
    public function askReason()
    {

        $this->ask('Hello! What is your name?', function (Answer $answer) {
            // Save result
            $this->name = $answer->getText();
            $this->askEmail();
        });
    }


    public function askEmail()
    {
        $this->ask('Hi ' . $this->name . ' what is your email?', function (Answer $answer) {
            // Save result
            $this->email = $answer->getText();

            $this->askPhone();
        });
    }

    public function askPhone()
    {
        $this->ask('what is your phone?', function (Answer $answer) {
            // Save result
            $this->phone = $answer->getText();

            $this->askSubject();
        });
    }

    public function askSubject()
    {
        $this->ask(' what is your subject?', function (Answer $answer) {
            // Save result
            $this->subject = $answer->getText();

            $this->askMessage();
        });
    }

    public function askMessage()
    {
        $this->ask(' what is your message?', function (Answer $answer) {
            // Save result
            $this->message = $answer->getText();

            $ques = "Hi " . $this->name . ' your contact have message is "' . $this->message . '"' . ' do you want to send contact?';
            $this->askResult($ques);
        });
    }

    public function askResult($ques)
    {
        $this->createContact();
        $this->say('Thanks for your contact to us!');

//        $question = Question::create($ques)
//            ->fallback('Unable to ask question')
//            ->callbackId('yes_no_question')
//            ->addButtons([
//                Button::create('Yes')->value('yes'),
//                Button::create('No')->value('no'),
//                Button::create('Create Other Contact')->value('other'),
//            ]);
//
//        return $this->bot->ask($question, function (Answer $answer) {
//            if ($answer->isInteractiveMessageReply()) {
//                $value = $answer->getValue();
//                switch ($value) {
//                    case 'yes':
//                        $this->createContact();
//                        $this->say('Thanks for your contact to us!');
//                        break;
//                    case 'no':
//                        $this->stopsConversation('We will come soon!thanks for your interested');
//                        break;
//                    case 'other':
//                        $this->bot->startConversation(new ContactOptionConversation());
//                        break;
//                }
//            }
//        });
    }

//create contact
    public function createContact()
    {
        $contact = new Contact();
        $contact->name = $this->name;
        $contact->email = $this->email;
        $contact->phone = $this->phone;
        $contact->subject = $this->subject;
        $contact->content = $this->message;
        $contact->save();
        $send = app(CommonService::class)->sendMailContact($this->email, $this->name, 'client::mail.mail_contact', 'client.contact', 'Contact Mail');
    }

    /**
     * Start the conversation
     */
    public function run()
    {
        $this->askReason();
    }
}
