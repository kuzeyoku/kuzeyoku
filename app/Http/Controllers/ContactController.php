<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Enums\StatusEnum;
use App\Http\Requests\ContactRequest;
use App\Http\Requests\EducationRequest;

class ContactController extends Controller
{

    public function index()
    {
        return view('contact');
    }

    public function education()
    {
        $educationTypes = [0 => __("front/education.education_type_0"), 1 => __("front/education.education_type_1"), 2 => __("front/education.education_type_2")];
        return view('education.index', compact("educationTypes"));
    }

    public function educationSend(EducationRequest $request)
    {
        if (!$this->recaptcha($request)) {
            return back()
                ->withInput()
                ->withError(__("front/contact.recaptcha_error"));
        }

        $data = [
            "name" => "Sistem",
            "phone" => "Sistem",
            "email" => "Sistem",
            "subject" => "Eğitim Başvurusu",
            "message" => view("education.mail", ["data" => $request->validated()])->render(),
            "user_agent" => $request->userAgent(),
            "ip" => $request->ip(),
        ];


        if (Message::Create($data)) {
            return back()
                ->withSuccess(__("front/education.send_success"));
        }
        return back()
            ->withInput()
            ->withError(__("front/education.send_error"));
    }

    public function send(ContactRequest $request)
    {
        if (!$this->recaptcha($request)) {
            return back()
                ->withInput()
                ->withError(__("front/contact.recaptcha_error"));
        }
        $data = array_merge($request->validated(), ["user_agent" => $request->userAgent(), "ip" => $request->ip()]);

        if (Message::Create($data)) {
            return back()
                ->withSuccess(__("front/contact.send_success"));
        }

        return back()
            ->withInput()
            ->withError(__("front/contact.send_error"));
    }

    private function recaptcha($request)
    {
        if (config("setting.recaptcha.status") === StatusEnum::Active->value) {
            $response = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . config("setting.recaptcha.secret_key") . '&response=' . $request->{"g-recaptcha-response"});

            if (($recaptcha = json_decode($response)) && $recaptcha->success && $recaptcha->score >= 0.5) {
                return true;
            }

            return false;
        }

        return true;
    }
}
