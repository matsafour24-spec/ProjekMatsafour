<?php

namespace App\Controllers\Guru;

use CodeIgniter\Controller;

class PortofolioController extends Controller
{
    public function pdf()
    {
        // GET /guru/portofolio/pdf
        // Generate PDF dilakukan di fase berikutnya (service)
        return view('guru/portofolio/pdf', [
            'title' => 'Portofolio PDF'
        ]);
    }
}
