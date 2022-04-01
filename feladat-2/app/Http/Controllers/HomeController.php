<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function production()
    {
        $conn = mysqli_connect('localhost','root','asd123','cs_beugro',3306);
        $queryProduction = "SELECT * FROM production";
        $queryProducts = "SELECT * FROM products";
        $Productionrows = $conn->query($queryProduction);
        $Productrows = $conn->query($queryProducts);
        return view('production',['Productionrows'=>$Productionrows, 'Productsrows'=>$Productrows]);
    }

    public function about(){
        return view('about');
    }

    public function center(){
        return view('center');
    }

    public function delete($id){
        $conn = mysqli_connect('localhost','root','asd123','cs_beugro',3306);
        $query = "DELETE FROM production WHERE id = $id";
        $conn->query($query);
        return redirect('production');
    }
}
