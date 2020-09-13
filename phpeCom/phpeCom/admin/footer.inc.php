<footer>
   <p>Copyright &copy;<?php echo date('Y') ?> KCROASTERS<p>
</footer>
</section>
</main>
<script>
   // Product image full screen
   let products = document.querySelectorAll(".product-image-wrap")
   let fsImg = document.querySelector("#fullscreen-image")
   // TO remove
   fsImg ? fsImg.addEventListener('click', () => {
      fsImg.removeChild(fsImg.childNodes[0])
      fsImg.style.display = 'none'
   }) : null;
   // To Add
   products ? products.forEach(product => {
      product.addEventListener('click', () => {
         fsImg.style.display = 'block'
         let img = document.createElement('img')
         img.src = product.children[0].src;
         fsImg.appendChild(img)
      })
   }) : null;

   // Ham Menu
   let ham = document.querySelector(".ham")
   let nav = document.querySelector('#main-nav')
   let userinfo = document.querySelector('.welcome')
   ham.addEventListener('click', () => {
      if (nav.classList.contains('close') && userinfo.classList.contains('close')) {
         nav.classList.remove('close');
         userinfo.classList.remove('close');
         nav.classList.add('open');
         userinfo.classList.add('open');
      } else {
         nav.classList.remove('open');
         userinfo.classList.remove('open');
         nav.classList.add('close');
         userinfo.classList.add('close');
      }
   })
</script>
</body>

</html>