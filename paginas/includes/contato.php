<section title="Contato Telecom" id="contato">
	<div class="container">
      <div class="row">
         <div class="text-center">
            <div class="titulo">
               <h2>Entre em Contato</h2>
            </div>
         </div>
      </div>
      <div class="row text-center">
         <div class="col-md-7">
            <form action="http://localhost:8080/mensagem" class="contact-form" method="post">
               <div class="row">
                  <div class="col-md-6">
                     <input type="text" placeholder="Nome" name="nome" required>
                     <?php if(!empty($_SESSION['nome_vazio'])){
                        echo "<small style='color:#f00;'>".$_SESSION['nome_vazio']."</small>";
                        unset($_SESSION['nome_vazio']);}?>
                     </div>
                     <div class="col-md-6">
                        <input type="text" placeholder="Email" name="email" required>
                        <?php if(!empty($_SESSION['email_vazio'])){
                           echo "<small style='color:#f00;'>".$_SESSION['email_vazio']."</small>";
                           unset($_SESSION['email_vazio']);}?>
                        </div>
                        <div class="col-md-12">
                           <input type="text" placeholder="Motivo do Contato" name="motivo" required>
                           <?php if(!empty($_SESSION['motivo_vazio'])){
                              echo "<small style='color:#f00;'>".$_SESSION['motivo_vazio']."</small>";
                              unset($_SESSION['motivo_vazio']);}?>
                        </div>
                        <div class="col-md-12">
                           <textarea placeholder="Sua Mensagem" cols="30" rows="10" name="mensagem" required></textarea>
                           <?php if(!empty($_SESSION['mensagem_vazio'])){
                              echo "<small style='color:#f00;'>".$_SESSION['mensagem_vazio']."</small>";
                              unset($_SESSION['mensagem_vazio']);}?>
                              <button title="Enviar a mensagem para Telecom" class="enviar btn btn-block">ENVIAR MENSAGEM</button>

                              <?php 
                                 if(!empty($_SESSION['email_enviado'])){
                                    echo "<p class='text-center h2' style='color: #01ad01; '>".$_SESSION['email_enviado']."</p>";
                                    unset($_SESSION['email_enviado']);
                                 }else{
                                    if(!empty($_SESSION['email_erro'])){
                                       echo "<p class='text-center h2' style='color: #f00; '>".$_SESSION['email_erro']."</p>";
                                       unset($_SESSION['email_erro']);
                                    }
                                 }  
                              ?>
                           </div>
                        </div>
                     </form>
                  </div>
                  <div class="col-md-4">
                     <div class="info">
                        <i class="fas fa-map-marker-alt"></i>
                        <h3>Endereço</h3>
                        <p>Estrada do Tinguazinho, Nº 33, Nova Iguaçu - RJ</p>
                     </div>
                     <div class="info">
                        <i class="fas fa-phone"></i>
                        <h3>Telefone</h3>
                        <p>(21) 3759-4285 | 4117-1128 | 98177-7865</p>
                     </div>
                     <div class="info">
                        <i class="fas fa-envelope-open-text"></i>
                        <h3>Email</h3>
                     </div>
                  </div>
               </div>
            </div>
         </section>