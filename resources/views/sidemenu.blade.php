<div class="mb" id="mb">
   <label id="responsive-nav" for="hamburger">
   <i class="fas fa-bars fa-2x"></i>
   </label>
   <input type="checkbox" id="hamburger" />
   <nav class="navigation" id="nav">
      <a href="{{ url('/admin/user') }}" >Gestion de mes Informations</a>
      <hr>
      <a href="{{ url('/admin/projets') }}">Gestion de mes Projets </a>
      <hr>
      <a href="{{ url('/admin/experiences') }}"> Gestion des expériences</a>
      <hr>
      <a href="{{ url('/admin/formations') }}"> Gestion des Formations</a>
   </nav>
</div>