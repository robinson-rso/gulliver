    <form role="form" action="index.php" method="post" >
    <div class="col-lg-6">
      <div class="form-group">
        <label for="InputName">Nome</label>
        <div class="input-group">
          <input type="text" class="form-control" name="InputNome" id="InputNome" required>
          <span class="input-group-addon"></span></div>
      </div>
      <div class="form-group">
        <label for="InputEmail">Email</label>
        <div class="input-group">
          <input type="email" class="form-control" id="InputEmail" name="InputEmail" required  >
          <span class="input-group-addon"></span></div>
      </div>
      <div class="form-group">
        <label for="InputMessage">Mensagem</label>
        <div class="input-group">
          <textarea name="InputMensagem" id="InputMensagem" class="form-control" rows="5" required></textarea>
          <span class="input-group-addon"></span></div>
      </div>
      <input type="submit" name="contato" id="enviar" value="Enviar" class="btn btn-info pull-right">
    </div>
  </form>