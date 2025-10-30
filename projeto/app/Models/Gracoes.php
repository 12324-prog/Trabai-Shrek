<?php

    namespace App\Models;
    use Illuminate\Support\Facades\DB;
    use Illuminate\Database\Eloquent\Model;

    class Pedidos extends Model {

        public $nome;

        public $celular;

        public function listarGarcoes(){

            $listaGarcoesDoBanco = DB::select('SELECT * FROM garcoes ORDER BY cod_garcom DESC');

            return $listaGarcoesDoBanco;

        }

public function atualizarGarcoes($id) {
    return DB::update('UPDATE garcoes SET
        nome = ?,
        celular = ?
        WHERE cod_garcom = ?',
        [
            $this->nome,
            $this->celular,
            $id
        ]
    );
}


        public function buscarGarcoes($cod_garcom){

            $GarcoesDoBanco = DB::select('SELECT * FROM garcoes WHERE cod_garcom = ?',[$cod_garcom]);

            return $GarcoesDoBanco;

        }

        public function gravar (){
            DB::insert('INSERT INTO garcoes 
                (nome,
                celular)
                VALUES (?,?)', 
                [ 
                    $this->nome,
                    $this->celular
                ]
            );
        }

        public function apagar ($cod_garcom)
        {
            DB::delete('DELETE FROM garcoes WHERE cod_garcom = ?', [$cod_garcom]);
        }

        public function trigger_apagar()
        {
            DB::unprepared('DROP TRIGGER IF EXISTS delete_garcoes');

            DB::unprepared(
                'CREATE TRIGGER delete_garcoes
                BEFORE DELETE ON garcoes
                FOR EACH ROW
                BEGIN
                    DELETE FROM itens_pedido 
                    WHERE (cod_garcom = OLD.cod_garcom);
                END
            ');
        }     
    }

?>