<?php
class ParcelaController extends Controller
{
    public function __construct()
    {
        $this->parcelaModel = $this->model('ParcelaModel');
    }

    public function index(){
        
    }
    public function listarparcela(){
        $dados =[
            'parcelas' => $this->parcelaModel->selectAll()
        ];
        $this->view('parcela/listarparcelas', $dados);
    }
}