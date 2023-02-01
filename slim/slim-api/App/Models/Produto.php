<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

/*
O ideal é sempre nomear as classes no SINGULAR, pois o Eloquent já faz a correção para o PLURAL. Ex.:
ROTA                ====      CLASSE
produtos.php        ====      Produto
carrinho_compras    ====      CarrinhoCompra
...
*/
class Produto extends Model{

    protected $fillable = [

        "titulo", "descricao", "preco", "fabricante", "updated_at", "created_at"
    ];
}