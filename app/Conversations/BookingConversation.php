<?php

namespace App\Conversations;

use BotMan\BotMan\Messages\Attachments\Image;
use BotMan\BotMan\Messages\Conversations\Conversation;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Outgoing\OutgoingMessage;
use BotMan\BotMan\Messages\Outgoing\Question;
use Exception;
use Illuminate\Support\Facades\Validator;
use VMA\Admin\Model\Booking;
use VMA\Admin\Model\Product;
use VMA\Admin\Services\CommonService;

//use Illuminate\Validation\Validator;
class BookingConversation extends Conversation
{
    /**
     * First question
     */
    public $customer_name;
    public $customer_email;
    public $customer_phone;
    public $people;
    public $note;
    public $product;
    public $booking;

    public function askReason()
    {
        $question = Question::create("Which one do you need?")
            ->fallback('Unable to ask question')
            ->callbackId('ask_reason')
            ->addButtons([
                Button::create('Booking Services')->value('booking'),
                Button::create('Check Booking')->value('check'),
            ]);

        return $this->ask($question, function (Answer $answer) {
            if ($answer->isInteractiveMessageReply()) {
                $value = $answer->getValue();
                switch ($value) {
                    case 'booking':
                        $this->askName();
                        break;
                    case 'check':
                        $this->checkBooking();
                        break;
                }
            }
        });
    }

    public function checkBooking()
    {
        $this->ask('Text your mail here', function (Answer $answer) {
            $email = $answer->getText();
            $this->checkBookingEmail($email);
        });

    }

    public function checkBookingEmail($email)
    {
        $booking = new Booking();
        $service = $booking->where('customer_email', $email)->where('status', 'confirmed')->first();
        $this->say('Your booking was confirmed!');
    }

    public function askService()
    {
        $this->ask('What service do you want to ?', function (Answer $answer) {
//            $this->ask = $answer->getText();
            $this->checkRequire($answer->getText());
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
                    ->fallback('asked')
                    ->callbackId('reason_1')
                    ->addButtons($buttons);

                $data = [
                    'customer_name' => $this->customer_name,
                    'customer_email' => $this->customer_email,
                    'customer_phone' => $this->customer_phone,
                    'people' => $this->people,
                    'note' => $this->note
                ];
                $this->bot->ask($question, function (Answer $answer) use ($product, $data) {
                    if ($answer->isInteractiveMessageReply()) {
                        $value = $answer->getValue();
                        $product = Product::find($value);
                        $attachment = new Image(url('images/product') . '/' . $product->image);
                        $message = OutgoingMessage::create($data['customer_name'] . " You mean that you want to ask about product " . $product->name . '? your product infor is:name' . $product->name . ' ;price:' . $product->price . '; description:' . $product->description . '.And You\'re gonna book this tour? Please say "yes" if you want it, Thanks! ')
                            ->withAttachment($attachment);
//                        reply
                        $this->ask($message, function (Answer $answer) use ($product, $data) {
                            $data['product_id'] = $product->id;
                            if ($answer->getValue() == 'yes') {
//                                    $this->booking = new Booking();
//                                    $this->booking->createItem($data);
//                                dd($data);
                                $model = new Booking();
                                $model->product_id = $data["product_id"];
                                $model->customer_name = $data["customer_name"];
                                $model->customer_email = $data["customer_email"];
                                $model->customer_phone = $data["customer_phone"];
                                $model->people = $data["people"];
                                $model->note = $data["note"];

                                //gửi mail
                                $service = new CommonService();
                                try {
                                    $service->sendMailBooking(
                                        $data["customer_email"],
                                        $data["customer_name"],
                                        'client::mail.mail_booking',
                                        'client.contact',
                                        'Confirm Booking Mail', $product, $data);
                                    $model->status = 'mailed';

                                } catch (Exception $exception) {
                                    $this->say($exception);
                                }

                                $id = $model->save();
                                $this->say('We got it, please check your email, thanks to believed us!');
                            }


                        });//after, book or quit
                    }
                });

            } else {
                return "Sorry, We couldn't found your answer, please ask other question!";
            }
        } catch (Exception $exception) {
            return "Sorry, We couldn't found your service, ask again";
        }
    }


    public function askName()
    {

        $this->ask('What is your name?', function (Answer $answer) {

            $this->customer_name = $answer->getText();
            $this->bot->userStorage()->save([
                'name' => $answer->getText(),
            ]);
            $this->say('Nice to meet you ' . $answer->getText());
            $this->askEmail();
        });
    }

    public function askEmail()
    {
        $this->ask('What is your email?', function (Answer $answer) {
            $this->customer_email = $answer->getText();

            $validator = Validator::make(['email' => $answer->getText()], [
                'email' => 'email',
            ]);

            if ($validator->fails()) {
                return $this->say('That doesn\'t look like a valid email. Please enter a valid email.');
            }

            $this->bot->userStorage()->save([
                'email' => $answer->getText(),
            ]);

            $this->askMobile();
        });
    }

    public function askMobile()
    {
        $this->ask('Great. What is your mobile?', function (Answer $answer) {
            $this->customer_phone = $answer->getText();

            $this->bot->userStorage()->save([
                'mobile' => $answer->getText(),
            ]);

            $this->askPerson();
        });
    }

    public function askPerson()
    {
        $this->ask('How many pepole?', function (Answer $answer) {
            $this->people = $answer->getText();

            $this->bot->userStorage()->save([
                'mobile' => $answer->getText(),
            ]);

            $this->askDate();
        });
    }

    public function askDate()
    {
        $this->ask('When you want to get?', function (Answer $answer) {
            $this->note = $answer->getText();

            $this->bot->userStorage()->save([
                'note' => $answer->getText(),
            ]);
            $this->askService();
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
