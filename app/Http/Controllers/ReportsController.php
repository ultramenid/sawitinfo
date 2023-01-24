<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportsController extends Controller
{
    public function cmsreports(){
        $title = 'reports - sawitinfo';
        $nav = 'reports';
        return view('backends.reports', compact('title', 'nav'));
    }

    public function addreports(){
        $title = 'add reports - sawitinfo';
        $nav = 'reports';
        return view('backends.addreports', compact('title', 'nav'));
    }

    public function edit($id){
        $id = $id;
        $title = 'edit reports - sawitinfo';
        $nav = 'reports';
        return view('backends.editreports', compact('title', 'nav', 'id'));
    }
}
