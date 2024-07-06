<?php
namespace App\Models;

class PanierModel{
    public $fournisseur=null;
    public array $articles=[];
    public $total=0;

    public function addArticle($article,$fournisseur,$qteAppro) {
        $montantArticle=$this->montantArticle($article["prixAppro"],$qteAppro);
        $key=$this->articleExist($article);
        if ($key!=-1) {
            $this->articles[$key]["qteAppro"]+=$qteAppro;
            $this->articles[$key]["montantArticle"]+=$montantArticle;
        }else{
            $article["qteAppro"]=$qteAppro;
            $article["montantArticle"]=$montantArticle;
            $this->articles[]=$article;
        }
        $this->fournisseur=$fournisseur;
        $this->total+=$montantArticle;
    }

    public function montantArticle($prix,$qteAppro) {
        return $prix *$qteAppro;
    }

    public function articleExist($article) : int {
        foreach ($this->articles as $key => $value) {
            if ($value["id_article"]==$article["id_article"]){
                return $key;
            } 
        }
        return -1;
    }

    public function clear($article) : void {
        $this->articles=[];
        $this->total=0;
        $this->fournisseurs=null;
    }
}