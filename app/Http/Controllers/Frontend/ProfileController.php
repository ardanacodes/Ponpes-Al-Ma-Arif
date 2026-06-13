<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Inertia\Inertia;

class ProfileController extends Controller
{
    public function sejarah()
    {
        return Inertia::render('Frontend/Profile/Sejarah');
    }

    public function visiMisi() 
    {
        return Inertia::render('Frontend/Profile/VisiMisi');
    }

    public function motoPondok() 
    {
        return Inertia::render('Frontend/Profile/MotoPondok');
    }

    public function pancaJiwa() 
    {
        return Inertia::render('Frontend/Profile/PancaJiwa');
    }
} // Kurung kurawal penutup class harus berada di paling bawah