<?php
    class Pages extends Controller {
        public function __construct()
        {
            
        }

        public function index(){
            $data = [
                'title'=> 'PartiPro',
            ];

            $this->view('pages/index', $data);
        }

        public function about(){
            $data = [ 
                'title' => 'PartiPro',
                'title2' => 'À propos de ma site',
                'description' => 'Un système d’information pour la gestion des participations aux événements (regroupés en catégories) qui peuvent être de deux types : ouverts ou fermés.',
                'build' => 'PHP-Javascript-jQuery-Ajax sur un modèle MVC personnalisé'
            ];
            $this->view('pages/about', $data);
           
        }

    }