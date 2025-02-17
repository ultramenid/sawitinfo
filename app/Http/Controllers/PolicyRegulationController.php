<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PolicyRegulationController extends Controller
{
    public function index(){
        $title = 'Policy & Regulation - Sawitinfo';
        $nav = 'policyregulation';
        return view('backends.policyregulation', compact('title', 'nav'));
    }

    public function edit($id){
        $title = 'Edit Policy & Regulation - Sawitinfo';
        $nav = 'policyregulation';
        $id = $id;
        return view('backends.editpolicyregulation', compact('title', 'nav', 'id'));

    }
    public function add(){
        $title = 'Add Policy & Regulation - Sawitinfo';
        $nav = 'policyregulation';
        return view('backends.addpolicyregulation', compact('title', 'nav'));
    }
}
