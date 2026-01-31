<?php
// Header modernisé: Tailwind + Font Awesome
if (!isset($_SESSION)) {
    session_start();
}
?>
<!-- Skip link for accessibility -->
<a href="#main-content" class="skip-link sr-only">Aller au contenu</a>
<header class="bg-white shadow">
  <nav role="navigation" aria-label="Navigation principale" class="container mx-auto px-4 py-3 flex items-center justify-between">
    <div class="flex items-center space-x-4">
      <a href="/" class="flex items-center space-x-2 text-gray-800 hover:text-gray-900">
        <img src="/assets/img/logo.jpg" alt="Logo" class="h-8 w-8 rounded"/>
        <span class="font-semibold text-lg">Receita</span>
      </a>
      <div class="hidden md:flex items-center space-x-3">
        <?php if(isset($_SESSION['prenom'])): ?>
          <a href="/assets/admin/recettes" class="text-gray-600 hover:text-gray-900 flex items-center gap-2"><i class="fas fa-utensils"></i><span>Recettes</span></a>
          <a href="/assets/admin/ingredients" class="text-gray-600 hover:text-gray-900 flex items-center gap-2"><i class="fas fa-carrot"></i><span>Ingrédients</span></a>
        <?php endif; ?>
      </div>
    </div>

    <div class="flex items-center space-x-4">
      <div id="gtranslate-widget" class="mr-2"></div>
      <div class="relative">
        <?php if(isset($_SESSION['prenom'])): ?>
          <button class="flex items-center space-x-2 p-2 rounded hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2" id="user-menu-btn" aria-haspopup="true" aria-expanded="false" aria-controls="user-menu">
            <img src="/assets/img/user.png" alt="Avatar de <?php echo htmlspecialchars($_SESSION['prenom']); ?>" loading="lazy" class="h-8 w-8 rounded-full"/>
            <span class="hidden sm:inline text-gray-700"><?php echo htmlspecialchars($_SESSION['prenom']); ?></span>
            <i class="fas fa-chevron-down text-gray-500"></i>
          </button>
          <div id="user-menu" class="hidden absolute right-0 mt-2 w-40 bg-white border rounded shadow py-1" role="menu">
            <a class="block px-3 py-2 text-sm text-gray-700 hover:bg-gray-50" href="/assets/admin/profil"><i class="fas fa-user mr-2"></i>Profil</a>
            <a class="block px-3 py-2 text-sm text-gray-700 hover:bg-gray-50" href="/assets/scripts/logout"><i class="fas fa-sign-out-alt mr-2"></i>Se déconnecter</a>
          </div>
        <?php else: ?>
          <a href="/assets/pages/login" class="px-4 py-2 bg-indigo-700 text-white rounded hover:bg-indigo-800 flex items-center gap-2"><i class="fas fa-sign-in-alt"></i><span>Connexion</span></a>
        <?php endif; ?>
      </div>
      <button class="md:hidden p-2 rounded border focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2" id="mobile-menu-btn" aria-expanded="false" aria-controls="mobile-menu" aria-label="Afficher le menu"><i class="fas fa-bars"></i></button>
    </div>
  </nav>
  <div id="mobile-menu" class="hidden md:hidden bg-white border-t">
    <div class="px-4 py-3 space-y-1">
      <?php if(isset($_SESSION['prenom'])): ?>
        <a href="/assets/admin/recettes" class="block text-gray-700">Recettes</a>
        <a href="/assets/admin/ingredients" class="block text-gray-700">Ingrédients</a>
        <a href="/assets/admin/profil" class="block text-gray-700">Profil</a>
        <a href="/assets/scripts/logout" class="block text-gray-700">Se déconnecter</a>
      <?php else: ?>
        <a href="/assets/pages/login" class="block text-gray-700">Connexion</a>
      <?php endif; ?>
    </div>
  </div>
</header>

<script>
(function(){
  var mobileBtn = document.getElementById('mobile-menu-btn');
  if(mobileBtn){
    mobileBtn.addEventListener('click', function(){
      var el = document.getElementById('mobile-menu');
      var expanded = this.getAttribute('aria-expanded') === 'true';
      this.setAttribute('aria-expanded', expanded ? 'false' : 'true');
      if(el.classList.contains('hidden')) el.classList.remove('hidden'); else el.classList.add('hidden');
    });
  }
  var userBtn = document.getElementById('user-menu-btn');
  if(userBtn){
    userBtn.addEventListener('click', function(e){
      e.preventDefault();
      var el = document.getElementById('user-menu');
      var expanded = this.getAttribute('aria-expanded') === 'true';
      this.setAttribute('aria-expanded', expanded ? 'false' : 'true');
      if(el.classList.contains('hidden')) el.classList.remove('hidden'); else el.classList.add('hidden');
    });
  }
})();
</script> 

  

