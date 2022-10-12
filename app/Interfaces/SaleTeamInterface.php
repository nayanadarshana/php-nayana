<?php

namespace App\Interfaces;

use Illuminate\Http\Request;

interface SaleTeamInterface
{
    public function index(Request $request);

    public function store(Request $request);

    public function update(Request $request, $id);

    public function delete($id);

    public function edit($id);
}
