<?php
namespace App\Interface;
interface BaseInterfcae
{
    public function index();
    public function store(array $data);
    public function update($id, array $data);
    public function destroy($id);
}