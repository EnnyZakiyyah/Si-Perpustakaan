<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Category;
use App\Models\Katalog;
use Illuminate\Http\Request;

class KatalogController extends Controller
{
    public function index()
    {
        $title = '';
        if (request('category')) {
            $catergory = Category::firstWhere('slug', request('category'));
            $title = ' in '. $catergory->name;
        }

        if (request('author')) {
            $author = Author::firstWhere('username', request('author'));
            $title = ' by '. $author->name;
        }

        return view('home.sirkulasi.penelusuran-katalog', [
            "title" => "Sirkulasi" . $title,
            // "katalogs" => Katalog::all()
            "katalogs" => Katalog::latest()->filter(request(['search', 'category', 'author']))->paginate(6)->withQueryString()
        ]);
    }

    public function show(Katalog $katalog)
    {
        return view('home.detil.detil-penelusuran-katalog', [
            "title" => "Perpustakaan | Sirkulasi",
            "katalog" => $katalog
        ]);
    }
}
