        $(document).ready(function () {
            // evento de "submit"
            $("#b_enviar").click(function (e) {
                // parar o envio para que possamos faze-lo manualmente.
                e.preventDefault();
                // captura o formulário
                var form = $('#caixa')[0];
                // cria um FormData {Object}
                var data = new FormData(form);
               // console.log(data);
                // processar
                $.ajax({
                    type: "POST",
                    url: "http://localhost/nsi/antigo/aluno.php", //acerte o caminho para seu script php
                    data: data,
                    processData: false, // impedir que o jQuery tranforma a "data" em querystring
                    contentType: false, // desabilitar o cabeçalho "Content-Type"
                    //cache: false, // desabilitar o "cache"
                    // manipular o sucesso da requisição
                }).done(function(retorno){
                    console.log(retorno);
                    retorno = parseInt(retorno);  
                    
                    
                    if(retorno==1)
                      {
                        //modal("Formulário enviado com sucesso");
                        $("#myModalSucess").modal('show');
                         console.log();
                        $(':input','#caixa')
                          .not(':button, :submit, :reset, :hidden')
                          .val('')
                          .removeAttr('checked')
                          .removeAttr('selected');
                      }
                       else
                      {
                        //modal("erro ao enviar formulário");
                        $("#myModalError").modal('show'); 
                           

                      }
                    
                   
                });
            });
        });