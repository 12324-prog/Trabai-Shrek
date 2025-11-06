<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Clientes extends Model {

    public $cod_cliente;
    public $nome;
    public $endereco;
    public $numero;
    public $bairro;
    public $cod_cidade;
    public $celular;

    // Listar todos os clientes
    public function listarClientes() {
        $listaClientes = DB::select(
            'SELECT * FROM clientes as cl JOIN (SELECT cod_cidade, nome as nome_cidade FROM cidades) as ci ON (cl.cod_cidade = ci.cod_cidade) 
            ORDER BY cod_cliente DESC');
        return $listaClientes;
    }

    // Buscar cliente específico
    public function buscarCliente($cod_cliente) {
        $cliente = DB::select('SELECT * FROM clientes WHERE cod_cliente = ?', [$cod_cliente]);
        return $cliente[0];
    }

    // Inserir novo cliente
    public function gravar() {
        DB::insert('INSERT INTO clientes 
            (nome, endereco, numero, bairro, cod_cidade, celular)
            VALUES (?,?,?,?,?,?)',
            [
                $this->nome,
                $this->endereco,
                $this->numero,
                $this->bairro,
                $this->cod_cidade,
                $this->celular
            ]
        );
    }

    // Atualizar dados de um cliente
    public function atualizar($id) {
        return DB::update('UPDATE clientes SET
            nome = ?,
            endereco = ?,
            numero = ?,
            bairro = ?,
            cod_cidade = ?,
            celular = ?
            WHERE cod_cliente = ?',
            [
                $this->nome,
                $this->endereco,
                $this->numero,
                $this->bairro,
                $this->cod_cidade,
                $this->celular,
                $id
            ]
        );
    }

    // Apagar cliente
    public function apagar($cod_cliente) {
        DB::delete('DELETE FROM clientes WHERE cod_cliente = ?', [$cod_cliente]);
    }

    // Trigger: ao apagar cliente, também apaga pedidos e itens_pedido relacionados
    public function trigger_apagar() {
        DB::unprepared('DROP TRIGGER IF EXISTS cliente_delete');

        DB::unprepared('
            CREATE TRIGGER cliente_delete
            BEFORE DELETE ON clientes
            FOR EACH ROW
            BEGIN
                DELETE FROM itens_pedido
                WHERE cod_pedido IN (
                    SELECT cod_pedido FROM pedidos WHERE cod_cliente = OLD.cod_cliente
                );

                DELETE FROM pedidos
                WHERE cod_cliente = OLD.cod_cliente;
            END
        ');
    }
}

?>
