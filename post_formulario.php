        <div>
            <div>
                <div>
                    <?php
                        include '../includes/valida_login.php';
                        require_once '../includes/funcoes.php';
                        require_once '../core/conexao_mysql.php';
                        require_once '../core/sql.php';
                        require_once '../core/mysql.php';

                        foreach($_GET as $indice => $dado) {
                            $$indice = limparDados($dado);
                        }

                        if(!empty($id)) {
                            $id = (int)$id;

                            $criterio = [
                                ['id_publicacao', '=', $id]
                            ];

                            $retorno = buscar(
                                'publicacacao',
                                ['*'],
                                $criterio
                            );

                            $entidade = $retorno[0];
                        }
                    ?>
                    <form method="post" action="../core/post_repositorio.php"  enctype="multipart/form-data">
                        <input  type="hidden" name="acao"
                                value="<?php echo empty($id) ? 'insert' : 'update' ?>">
                        <input  type="hidden" name="id_publicacao"
                                value="<?php echo $entidade['id_publicacao'] ?? '' ?>">
                        <div class="container1">
                            <div class="post-titulo">
                                <input  type="text"
                                        require="required" id="titulo" name="titulo" placeholder="Título"
                                        value="<?php echo $entidade['titulo'] ?? ''?>">
                            </div>
                            <div class="post-textarea">
<textarea type="text" require="required" id="texto" name="texto" rows="5" placeholder="Texto (opcional)" style="max-height: 200px; max-width: 100%;">
<?php echo $entidade['texto'] ?? ''?>
</textarea>
                            </div>
                        </div>
                        <div class="post-button">
                            <button type="submit">Postar</button>
                        </div>
                        <div class="">
                            <input  type="file" 
                                    id="foto" 
                                    name="foto[]" 
                                    accept="image/*" multiple="multiple" 
                                    />
                        </div>  
                    </form>
                </div>
            </div>
        </div>