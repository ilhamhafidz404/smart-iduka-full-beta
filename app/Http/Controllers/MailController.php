<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\MyTestMail;

class MailController extends Controller
{
    public function sendEmail()
    {
    	$isi = [
    		'title' => 'INI ADALAH JUDUL',
    		'body' => 'INI ADALAH BAGIAN UTAMANYA'
    	];

    	Mail::to("muhammadalhiqny@gmail.com")->send(new MyTestMail($isi));
    	return 'Email berhasil dikirim';
    }
}
