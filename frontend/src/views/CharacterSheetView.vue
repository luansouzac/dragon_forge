<template>
  <div class="row g-4">
    <div class="col-md-8">
      <div class="card bg-dark text-white border-secondary p-3">
        <div class="row g-0">
          <div class="col-md-4 text-center">
            <div class="bg-black rounded-circle d-flex align-items-center justify-content-center mx-auto" style="width: 150px; height: 150px;">
              <span class="text-white-50">Imagem</span>
            </div>
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <h1 class="display-5">Gael, o Bárbaro</h1>
              <p class="lead text-white-50">Humano Guerreiro, Nível 7</p>
              <hr>
              <p><strong>Personalidade:</strong> Corajoso e impulsivo, sempre o primeiro a entrar na briga para proteger seus amigos.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <div class="col-md-4">
      <div class="card bg-dark text-white border-secondary">
        <div class="card-header fs-5">Atributos</div>
        <ul class="list-group list-group-flush">
          <li class="list-group-item bg-transparent text-white d-flex justify-content-between"><strong>Força:</strong> <span>18 (+4)</span></li>
          <li class="list-group-item bg-transparent text-white d-flex justify-content-between"><strong>Destreza:</strong> <span>14 (+2)</span></li>
          <li class="list-group-item bg-transparent text-white d-flex justify-content-between"><strong>Constituição:</strong> <span>16 (+3)</span></li>
        </ul>
      </div>
    </div>
  </div>
</template>

<style scoped>
  .border-secondary {
    border-color: rgba(0, 44, 255, 0.3) !important;
  }
</style>